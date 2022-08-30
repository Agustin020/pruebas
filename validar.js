const form = document.getElementById('formulario');
const dni = document.getElementById('dni');
const nombre = document.getElementById('nombre');
const apellido = document.getElementById('apellido');
const correo = document.getElementById('correo');
const username = document.getElementById('username');
const pass = document.getElementById('pass');

const formElements = {
    dni: false,
    name: false,
    apellido: false,
    correo: false,
    username: false,
    pass: false,
}

form.addEventListener('submit', (e) => {
    e.preventDefault();
    const formValues = Object.values(formElements);
    const valid = formValues.findIndex((value) => value == false);
    if (valid === -1) {
        form.submit();
    } else {
        alert('Verificar los errores');
    }
})

dni.addEventListener('input', (e) => {
    const numero = /^[0-9]+$/;
    if (!numero.test(e.target.value)) {
        e.target.value = e.target.value.substring(0, e.target.value.length - 1);
    }

    const dni = e.target.value;

    if (dni.length < 7 || dni.length === '') {
        document.getElementById('dniError').innerHTML = 'El DNI debe tener entre 7 u 8 caracteres';
        formElements.dni = false;
    } else {
        document.getElementById('dniError').innerHTML = '';
        formElements.dni = true;
    }

});

nombre.addEventListener('input', (e) => {
    e.target.value = e.target.value.replace('  ', ' ');

    const name = e.target.value;

    if (name.length < 3 || name.length === 0) {
        document.getElementById('nombreError').innerHTML = 'El nombre debe tener más de 3 caracteres';
        formElements.name = false;
    } else {
        document.getElementById('nombreError').innerHTML = '';
        formElements.name = true;
    }

});

apellido.addEventListener('input', (e) => {
    e.target.value = e.target.value.replace('  ', ' ');
    const apellido = e.target.value;

    if (apellido.length < 3 || apellido.length === 0) {
        document.getElementById('apellidoError').innerHTML = 'El nombre debe tener más de 3 caracteres';
        formElements.apellido = false;
    } else {
        document.getElementById('apellidoError').innerHTML = '';
        formElements.apellido = true;
    }

});


correo.addEventListener('change', (e) => {
    const email = e.target;
    if (email.checkValidity()) {
        console.log('change');
        document.getElementById('correoError').innerHTML = '';
        formElements.correo = true;
    }
});


username.addEventListener('input', (e) => {
    e.target.value = e.target.value.replace('  ', ' ');
    const username = e.target.value;

    if (username.length < 4 || username.length === 0) {
        document.getElementById('userError').innerHTML = 'El nombre de usuario debe tener más de 4 caracteres';
        formElements.username = false;
    } else {
        document.getElementById('userError').innerHTML = '';
        formElements.username = true;
    }
});

pass.addEventListener('input', (e) => {
    e.target.value = e.target.value.replace('  ', ' ');
    const password = e.target.value;

    if (password.length < 8 || password.length === 0) {
        document.getElementById('passError').innerHTML = 'La contraseña debe tener más de 8 caracteres';
        formElements.pass = false;
    } else {
        document.getElementById('passError').innerHTML = '';
        formElements.pass = true;
    }
});


//Formulario invalido o vacio
//---------------------------
nombre.addEventListener('invalid', (e) => {
    e.preventDefault();
    e.target.setCustomValidity("");

    if (e.target.value.length === 0) {
        document.getElementById('nombreError').innerHTML = 'Este campo es obligatorio';
    } else {
        document.getElementById('nombreError').innerHTML = 'El nombre debe tener más de 3 caracteres';
    }

    formElements.name = false;
});

correo.addEventListener('invalid', (e) => {
    e.preventDefault();
    e.target.setCustomValidity("");

    if (e.target.value.length === 0) {
        document.getElementById('correoError').innerHTML = 'Este campo es obligatorio';
    } else {
        document.getElementById('correoError').innerHTML = 'Correo Incorrecto';
    }

    formElements.correo = false;
});

pass.addEventListener('invalid', (e) => {
    e.preventDefault();
    e.target.setCustomValidity("");

    if (e.target.value.length === 0) {
        document.getElementById('passError').innerHTML = 'Este campo es obligatorio';
    } else {
        document.getElementById('passError').innerHTML = 'La contraseña debe tener más de 8 caracteres';
    }

    formElements.pass = false;
});
