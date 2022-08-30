const form = document.getElementById('formulario');
const nombre = document.getElementById('nombre');
const correo = document.getElementById('correo');
const btnSubmit = document.getElementById('btnSubmit');

const formElements = {
    name: false,
    correo: false,
}

form.addEventListener('submit', (e) => {
    e.preventDefault();
})

nombre.addEventListener('input', (e) => {
    e.target.value = e.target.value.replace('  ', ' ');
    const name = e.target.value;
    if(name.length < 3){
        document.getElementById('nombreError').innerHTML = 'El nombre debe tener más de 3 caracteres';
        formElements.name = false;
    }else{
        document.getElementById('nombreError').innerHTML = '';
        formElements.name = true;
    }
    if(name.length == 0){
        document.getElementById('nombreError').innerHTML = 'Este campo es obligatorio';
    }
});