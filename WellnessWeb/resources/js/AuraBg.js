import { Renderer, Program, Mesh, Color, Triangle } from "ogl";

const VERT = `#version 300 es
in vec2 position;
void main() {
  gl_Position = vec4(position, 0.0, 1.0);
}
`;

const FRAG = `#version 300 es
precision highp float;

uniform float uTime;
uniform float uAmplitude;
uniform vec3 uColorStops[3];
uniform vec2 uResolution;
uniform float uBlend;
uniform float uFlipY;

out vec4 fragColor;

vec3 permute(vec3 x) {
  return mod(((x * 34.0) + 1.0) * x, 289.0);
}

float snoise(vec2 v){
  const vec4 C = vec4(
      0.211324865405187, 0.366025403784439,
      -0.577350269189626, 0.024390243902439
  );
  vec2 i  = floor(v + dot(v, C.yy));
  vec2 x0 = v - i + dot(i, C.xx);
  vec2 i1 = (x0.x > x0.y) ? vec2(1.0, 0.0) : vec2(0.0, 1.0);
  vec4 x12 = x0.xyxy + C.xxzz;
  x12.xy -= i1;
  i = mod(i, 289.0);

  vec3 p = permute(
      permute(i.y + vec3(0.0, i1.y, 1.0))
    + i.x + vec3(0.0, i1.x, 1.0)
  );

  vec3 m = max(
      0.5 - vec3(
          dot(x0, x0),
          dot(x12.xy, x12.xy),
          dot(x12.zw, x12.zw)
      ), 
      0.0
  );
  m = m * m;
  m = m * m;

  vec3 x = 2.0 * fract(p * C.www) - 1.0;
  vec3 h = abs(x) - 0.5;
  vec3 ox = floor(x + 0.5);
  vec3 a0 = x - ox;
  m *= 1.79284291400159 - 0.85373472095314 * (a0*a0 + h*h);

  vec3 g;
  g.x  = a0.x  * x0.x  + h.x  * x0.y;
  g.yz = a0.yz * x12.xz + h.yz * x12.yw;
  return 130.0 * dot(m, g);
}

struct ColorStop {
  vec3 color;
  float position;
};

#define COLOR_RAMP(colors, factor, finalColor) {              \
  int index = 0;                                            \
  for (int i = 0; i < 2; i++) {                               \
     ColorStop currentColor = colors[i];                    \
     bool isInBetween = currentColor.position <= factor;    \
     index = int(mix(float(index), float(i), float(isInBetween))); \
  }                                                         \
  ColorStop currentColor = colors[index];                   \
  ColorStop nextColor = colors[index + 1];                  \
  float range = nextColor.position - currentColor.position; \
  float lerpFactor = (factor - currentColor.position) / range; \
  finalColor = mix(currentColor.color, nextColor.color, lerpFactor); \
}

void main() {
  vec2 uv = gl_FragCoord.xy / uResolution;
  uv.y = mix(uv.y, 1.0 - uv.y, uFlipY);
  
  vec3 rampColor = mix(mix(uColorStops[0], uColorStops[1], smoothstep(0.0, 0.5, uv.x)), uColorStops[2], smoothstep(0.5, 1.0, uv.x));
  
  float height1 = snoise(vec2(uv.x * 2.0 + uTime * 0.1, uTime * 0.25)) * 0.5 * uAmplitude;
  float height2 = snoise(vec2(uv.x * 3.0 - uTime * 0.15, uTime * 0.3 + 10.0)) * 0.4 * uAmplitude;
  float height3 = snoise(vec2(uv.x * 1.5 + uTime * 0.08, uTime * 0.2 + 20.0)) * 0.6 * uAmplitude;
  
  float height = height1 + height2 * 0.7 + height3 * 0.5;
  height = exp(height * 0.8);
  
  float wave1 = (uv.y * 2.0 - height + 0.2);
  float wave2 = (uv.y * 2.0 - height + 0.6);
  float wave3 = (uv.y * 2.0 - height - 0.2);
  
  float intensity1 = 0.6 * wave1;
  float intensity2 = 0.5 * wave2;
  float intensity3 = 0.7 * wave3;
  
  float alpha1 = smoothstep(0.20 - uBlend * 0.5, 0.20 + uBlend * 0.5, intensity1);
  float alpha2 = smoothstep(0.20 - uBlend * 0.5, 0.20 + uBlend * 0.5, intensity2);
  float alpha3 = smoothstep(0.20 - uBlend * 0.5, 0.20 + uBlend * 0.5, intensity3);
  
  float combinedIntensity = (intensity1 * alpha1 + intensity2 * alpha2 * 0.8 + intensity3 * alpha3 * 0.6);
  float combinedAlpha = max(max(alpha1, alpha2 * 0.8), alpha3 * 0.6);
  
  vec3 auroraColor = combinedIntensity * rampColor;
  fragColor = vec4(auroraColor * combinedAlpha, combinedAlpha);
}
`;

export default function Aurora({
  colorStops = ["#5227FF", "#7cff67", "#5227FF"],
  amplitude = 1.0,
  blend = 0.5,
  flipY = 0.0,
  speed = 1.0,
  canvas
}) {
  const renderer = new Renderer({
    alpha: true,
    premultipliedAlpha: true,
    antialias: true,
    canvas
  });
  const gl = renderer.gl;
  gl.clearColor(0, 0, 0, 0);
  gl.enable(gl.BLEND);
  gl.blendFunc(gl.ONE, gl.ONE_MINUS_SRC_ALPHA);

  const parent = canvas.parentElement;

  function resize() {
    if (!parent) return;
    const width = parent.offsetWidth;
    const height = parent.offsetHeight;
    renderer.setSize(width, height);
    if (program) {
      program.uniforms.uResolution.value = [width, height];
    }
  }
  window.addEventListener("resize", resize);

  const geometry = new Triangle(gl);
  if (geometry.attributes.uv) {
    delete geometry.attributes.uv;
  }

  const colorStopsArray = colorStops.map((hex) => {
    const c = new Color(hex);
    return [c.r, c.g, c.b];
  });

  const program = new Program(gl, {
    vertex: VERT,
    fragment: FRAG,
    uniforms: {
      uTime: { value: 0 },
      uAmplitude: { value: amplitude },
      uColorStops: { value: colorStopsArray },
      uResolution: { value: [parent.offsetWidth, parent.offsetHeight] },
      uBlend: { value: blend },
      uFlipY: { value: flipY },
    },
  });

  const mesh = new Mesh(gl, { geometry, program });

  let animateId = 0;
  const update = (t) => {
    animateId = requestAnimationFrame(update);
    program.uniforms.uTime.value = t * 0.001 * speed * 0.1;
    renderer.render({ scene: mesh });
  };
  animateId = requestAnimationFrame(update);

  resize();

  return () => {
    cancelAnimationFrame(animateId);
    window.removeEventListener("resize", resize);
    gl.getExtension("WEBGL_lose_context")?.loseContext();
  };
}
