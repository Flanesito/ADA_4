const formulario = document.querySelector("#form-contacto");

formulario.addEventListener("submit", (event)=>{
    event.preventDefault(); // Evita que la pagina se recargue

    // 1. Seleccionamos los 5 controles del formulario
    const nombre = document.querySelector("#nombre");
    const correo = document.querySelector("#correo");
    const motivo = document.querySelector("#motivo");
    const mensaje = document.querySelector("#mensaje");
    const confirmar = document.querySelector("#confirmar");

    // 2. Verificamos que no esten vacios
    if (nombre.value === "" || correo.value === "" || motivo.value === "" || mensaje.value === "") {
        alert("Por favor, completa todos los campos de texto.");
        return;
    }

    if (!confirmar.checked) {
        alert("Debes marcar la casilla de confirmacion.");
        return;
    }

    alert("¡Formulario enviado correctamente!");
    // Si estamos en XAMPP (localhost), enviamos los datos a guardar_contacto.php
    if (window.location.hostname === "localhost" || window.location.hostname === "127.0.0.1") {
        formulario.submit();
    } else {
        // Si estamos en GitHub Pages, solo limpiamos el formulario y mostramos un mensaje de éxito
        formulario.reset();
        alert("¡Formulario enviado correctamente! (Simulación en GitHub Pages)");
    }    
});