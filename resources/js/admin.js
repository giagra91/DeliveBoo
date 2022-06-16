const { isEmpty } = require('lodash');

require('./bootstrap');

const deleteForms = document.querySelectorAll('.delete-form');

deleteForms.forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        if ( window.confirm(`Do you want to cancel ${this.getAttribute("dish-title")}?`) ) {
            this.submit();
        }
    })
})

// user register validation

const form = {
    name: "",
    email: "",
    address: "",
    vat_number: "",
    password : "",
    confirm_password: "",
    cooking_types: "",
};

let errors = {};
let error_messages = document.getElementById("errors");
let checkedTypes = [];

function checkErrors(){
    error_messages.innerHTML = "";
    if (form.name == "") errors.name = "Il nome non è valido.";
    if (!form.email.trim() && 
    !form.email.match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) errors.email = "La mail non è valida.";
    if (!form.address.trim()) errors.address = "L'indirizzo non è valido.";
    if (!form.vat_number.trim()) errors.vat_number = "La partita IVA non è valida.";
    if (!form.password.trim()) errors.password = "La password non può essere vuota.";
    if (!form.confirm_password.trim()) errors.confirm_password = "La conferma della password non può essere vuota.";
    if (Object.keys(errors).length !== 0){

        for (const error in errors) {
            error_messages.classList.add("alert", "alert-danger");
            error_messages.innerHTML += errors[error] + "<br>";
            console.log(errors[error])
        }
    } 
}

const types = document.querySelectorAll(".my-types");
// console.log(types.checked)
const keys = Object.keys(form);
// console.warn(keys)
const button = document.getElementById("register-button");
button.addEventListener("click", function(){
    
    const input = document.querySelectorAll(".my-form");
    console.warn(input)
    for (let i = 0; i < input.length; i++) {
        if(types[i].checked){
            checkedTypes.push(types[i]);
        }
        console.log(types[i].checked);
        let key = keys[i];
        console.log(key,input[i].getAttribute("form-title" ));
        if (input[i].getAttribute("form-title") == key){
            form[key] = input[i].value;
        }
    }
    if(checkedTypes.length === 0) errors.cooking_types = "Devi selezionare almeno una categoria.";
    checkErrors();
})




