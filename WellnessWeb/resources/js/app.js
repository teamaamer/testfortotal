import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Initialize hero background effects
import { initHeroBackground } from './hero-bg.js';

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initHeroBackground);
} else {
    initHeroBackground();
}
