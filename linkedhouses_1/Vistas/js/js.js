function validarFormulario() {
    return validarEmail() && validarContra();
}

function validarEmail() {
    var email = document.getElementById("email").value;
    var patron = /^[a-zA-Z0-9._%+-]+@(gmail\.com|hotmail\.com)$/;

    if (!patron.test(email)) {
        alert("Por favor ingrese un correo válido que termine en @gmail.com o @hotmail.com");
        return false;
    }

    return true;
}

function validarContra() {
    var contra = document.getElementById('contra').value;
    var confirmarContra = document.getElementById('confirmarContra').value;

    if (contra !== confirmarContra) {
        alert('Las contraseñas no coinciden.');
        return false;
    }

    return true;
}
