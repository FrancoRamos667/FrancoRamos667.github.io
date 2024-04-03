document.addEventListener('DOMContentLoaded', function () {
    const eye = document.querySelector('.toggle-password');
    const password = document.getElementById('contraseña');

    eye.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
});
