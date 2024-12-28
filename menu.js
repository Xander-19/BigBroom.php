// HamBurger Menu
const navi = document.querySelector('.navi');
const closeMenu = document.querySelector('.closeMenu');
const openMenu = document.querySelector('.openMenu');

openMenu.addEventListener('click', show);
closeMenu.addEventListener('click', close);

function show() {
    navi.style.display = 'flex';
    navi.style.top = '0';
}

function close() {
    navi.style.top = '-90vh';
}