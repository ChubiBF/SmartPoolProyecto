document.getElementById('contactForm').addEventListener('submit', function(event) {
    const telefonoInput = document.getElementById('telefono');
    const telefonoValue = telefonoInput.value;

    // Verificar si el campo de teléfono contiene solo números
    if (!/^\d+$/.test(telefonoValue)) {
        alert('Por favor, ingrese solo números en el campo de teléfono.');
        telefonoInput.focus(); // Enfocar el campo de teléfono
        event.preventDefault(); // Evitar que el formulario se envíe
    }
});