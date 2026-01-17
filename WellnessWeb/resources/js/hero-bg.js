import DarkVeil from './DarkVeilBg.js';

export function initHeroBackground() {
  const darkVeilCanvas = document.getElementById('darkVeilCanvas');

  if (!darkVeilCanvas) {
    console.error('Hero background canvas not found');
    return;
  }

  // Initialize DarkVeil effect
  const cleanupDarkVeil = DarkVeil({
    hueShift: 340,
    noiseIntensity: 0.015,
    scanlineIntensity: 0.08,
    speed: 1.8,
    scanlineFrequency: 0.3,
    warpAmount: 2.5,
    resolutionScale: 1,
    canvas: darkVeilCanvas
  });

  // Return cleanup function
  return () => {
    cleanupDarkVeil();
  };
}
