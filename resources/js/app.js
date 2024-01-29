import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import '@splidejs/splide/css';
import Splide from '@splidejs/splide';

for (const e of document.querySelectorAll(".splide")) {
    new Splide( e, {
        perPage: 4,
        perMove: 1,
        // height: '360px',
        drag: false,
    } ).mount();
}
for (const e of document.querySelectorAll(".splide_1")) {
    new Splide( e, {
        perPage: 1,
        perMove: 1,
        // height: '360px',
        drag: false,
    } ).mount();
}
