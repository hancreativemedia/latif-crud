import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

function toggleModal(modalID) {
    const modal = document.getElementById(modalID);
    modal.classList.toggle('hidden');
}

// window.onscroll = function () {
//     const navUser = document.getElementById('navUser');
//     if (window.pageYOffset > 50) {
//         navUser.classList.remove("-top-52");
//         navUser.classList.add("top-0");
//     } else {
//         navUser.classList.remove("top-0");
//         navUser.classList.add("-top-52");
//     }
// }
