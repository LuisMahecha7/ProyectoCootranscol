// Verificar si el usuario ha cerrado sesión (o no está logueado)
/*if (sessionStorage.getItem('usuarioAutenticado') === 'false') {
    // Prevenir que el usuario vuelva atrás al presionar el botón "Atrás" en el navegador
    if (window.history && window.history.pushState) {
        window.history.pushState('forward', null, './login.php');
        window.onpopstate = function () {
            window.location.href = './login.php'; // Redirigir al login si se intenta ir atrás
        };
    }
}*/

function logout() {
    // Ocultar el contenido principal y mostrar el spinner
    document.querySelector('.main-content').style.display = 'none';
    document.getElementById('spinner-container').style.display = 'flex';

    // Esperar 2 segundos antes de redirigir
    setTimeout(function() {
        // Realizar la redirección después de 2 segundos
        window.location.href = './login.php';
    }, 2000); // 2000 milisegundos = 2 segundos
}
