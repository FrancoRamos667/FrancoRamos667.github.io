// JavaScript para controlar el menú lateral

// Obtener el botón de menú y el menú lateral
const btnOpen = document.getElementById('btn_open');
const menuSide = document.getElementById('menu_side');
const body = document.getElementById('body');

// Agregar evento de clic al botón de menú
btnOpen.addEventListener('click', () => {
    // Alternar la clase 'active' en el menú lateral y en el cuerpo de la página
    menuSide.classList.toggle('active');
    body.classList.toggle('active');
});
