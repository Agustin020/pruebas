const form = document.getElementById('formulario');
const dni = document.getElementById('dni');
const nombre = document.getElementById('nombre');
const apellido = document.getElementById('apellido');
const correo = document.getElementById('correo');
const username = document.getElementById('username');
const pass = document.getElementById('pass');
const domicilio = document.getElementById('domicilio');
const codPostal = document.getElementById('codPostal');
const departamento = document.getElementById('departamento');
const fechaNac = document.getElementById('fechaNac');
const lugarNac = document.getElementById('lugarNac');
const cel = document.getElementById('cel');

const formElements = {
    dni: false,
    name: false,
    apellido: false,
    correo: false,
    username: false,
    pass: false,
    domicilio: true, //TRUE porque no son obligatorios
    codPostal: true,
    departamento: false,
    fechaNac: true,
    lugarNac: true,
    celular: false,
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

    if (name.length < 3) {
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

    if (apellido.length < 3) {
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

domicilio.addEventListener('input', (e) => {
    e.target.value = e.target.value.replace('  ', ' ');
    const domicilio = e.target.value;

    if (domicilio.length === 0) {
        document.getElementById('domicilioError').innerHTML = '';
        formElements.domicilio = true;
    }
    else if (domicilio.length < 4) {
        document.getElementById('domicilioError').innerHTML = 'El domicilio debe tener más de 4 caracteres';
        formElements.domicilio = false;
    } else {
        document.getElementById('domicilioError').innerHTML = '';
        formElements.domicilio = true;
    }
});

codPostal.addEventListener('input', (e) => {
    const numero = /^[0-9]+$/;
    if (!numero.test(e.target.value)) {
        e.target.value = e.target.value.substring(0, e.target.value.length - 1);
    }

    const codPostal = e.target.value;

    if (codPostal.length === 0) {
        document.getElementById('codPostalError').innerHTML = '';
        formElements.codPostal = true;
    }
    else if (codPostal.length < 4) {
        document.getElementById('codPostalError').innerHTML = 'El código postal debe tener 4 dígitos';
        formElements.codPostal = false;
    } else {
        document.getElementById('codPostalError').innerHTML = '';
        formElements.codPostal = true;
    }
});

departamento.addEventListener('change', (e) => {
    const departamento = e.target.value;

    if (departamento === '') {
        document.getElementById('departamentoError').innerHTML = 'Debe seleccionar una opción';
        formElements.departamento = false;
    } else {
        document.getElementById('departamentoError').innerHTML = '';
        formElements.departamento = true;
    }
});

/*fechaNac.addEventListener('input', (e) => {
    const fechaNac = e.target.value;

    if(fechaNac > '2004-12-31'){
        document.getElementById('fechaNacError').innerHTML = 'No debe ser mayor a 31/12/2004';
        formElements.fechaNac = false;
    }else{
        document.getElementById('fechaNacError').innerHTML = '';
        formElements.fechaNac = true;
    }

    if(fechaNac.length === 0){
        document.getElementById('fechaNacError').innerHTML = '';
        formElements.fechaNac = true;
    }
    
});*/

lugarNac.addEventListener('input', (e) => {
    e.target.value = e.target.value.replace('  ', ' ');
    const lugarNac = e.target.value;

    if (lugarNac.length === 0) {
        document.getElementById('lugarNacError').innerHTML = '';
        formElements.lugarNac = true;
    }
    else if (lugarNac.length < 4) {
        document.getElementById('lugarNacError').innerHTML = 'El lugar de nacimiento debe tener más de 4 caracteres';
        formElements.lugarNac = false;
    } else {
        document.getElementById('lugarNacError').innerHTML = '';
        formElements.lugarNac = true;
    }
});

cel.addEventListener('input', (e) => {
    const numero = /^[0-9]+$/;
    if(!numero.test(e.target.value)){
        e.target.value = e.target.value.substring(0, e.target.value - 1);
    }

    const cel = e.target.value;

    if(cel.length < 10){
        document.getElementById('celError').innerHTML = 'El número de celular debe tener 10 dígitos';
        formElements.celular = false;
    }else{
        document.getElementById('celError').innerHTML = '';
        formElements.celular = true;
    }

});

//Formulario invalido o vacio
//---------------------------

dni.addEventListener('invalid', (e) => {
    e.preventDefault();
    e.target.setCustomValidity('');

    if (e.target.value.length === 0) {
        document.getElementById('dniError').innerHTML = 'Este campo es obligatorio';
        formElements.dni = false;
    }

    formElements.dni = false;

});


nombre.addEventListener('invalid', (e) => {
    e.preventDefault();
    e.target.setCustomValidity("");

    if (e.target.value.length === 0) {
        document.getElementById('nombreError').innerHTML = 'Este campo es obligatorio';
    }

    formElements.name = false;
});

apellido.addEventListener('invalid', (e) => {
    e.preventDefault();
    e.target.setCustomValidity("");

    if (e.target.value.length === 0) {
        document.getElementById('apellidoError').innerHTML = 'Este campo es obligatorio';
    }

    formElements.apellido = false;

});

correo.addEventListener('invalid', (e) => {
    e.preventDefault();
    e.target.setCustomValidity("");

    if (e.target.value.length === 0) {
        document.getElementById('correoError').innerHTML = 'Este campo es obligatorio';
    }

    formElements.correo = false;
});

username.addEventListener('invalid', (e) => {
    e.preventDefault();
    e.target.setCustomValidity('');

    if (e.target.value.length === 0) {
        document.getElementById('userError').innerHTML = 'Este campo es obligatorio';
    }

    formElements.username = false;

});

pass.addEventListener('invalid', (e) => {
    e.preventDefault();
    e.target.setCustomValidity("");

    if (e.target.value.length === 0) {
        document.getElementById('passError').innerHTML = 'Este campo es obligatorio';
    }

    formElements.pass = false;
});

departamento.addEventListener('invalid', (e) => {
    e.preventDefault();
    e.target.setCustomValidity('');

    if (e.target.value === '') {
        document.getElementById('departamentoError').innerHTML = 'Este campo es obligatorio';
        formElements.departamento = false;
    }
    formElements.departamento = false;
});

cel.addEventListener('invalid', (e) => {
    e.preventDefault();
    e.target.setCustomValidity('');

    if(e.target.value.length === 0){
        document.getElementById('celError').innerHTML = 'Este campo es obligatorio';
        
    }
    formElements.celular = false;

});

