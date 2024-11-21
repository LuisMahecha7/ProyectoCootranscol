document.addEventListener("DOMContentLoaded", function() {
    const successMessage = document.getElementById('successMessage');
    
    // Verificamos si el mensaje fue seleccionado correctamente
    if (successMessage) {
        console.log("Mensaje encontrado:", successMessage.textContent); // Mostrar el contenido del mensaje
        
        setTimeout(() => {
            console.log("Cambiando opacidad a 0");
            successMessage.style.opacity = '0'; // Cambiar la opacidad a 0
            successMessage.style.transition = 'opacity 0.5s ease'; // Asegurarte que la transición esté presente
            
            setTimeout(() => {
                console.log("Ocultando el mensaje");
                successMessage.style.display = 'none'; // Ocultar el mensaje después de la transición
            }, 500); // Esperar la duración de la transición
        }, 3000); // Esperar 3 segundos antes de empezar a desaparecer
    } else {
        console.log("No se encontró el mensaje de éxito.");
    }
});




