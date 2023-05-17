const menuBar = document.querySelector('.menu-bar');
const menuLinks = document.querySelector('.menu-links');

menuBar.addEventListener('click', () => {
    menuLinks.classList.toggle('show');
});