const { isEmpty } = require('lodash');

require('./bootstrap');

const deleteForms = document.querySelectorAll('.delete-form');

deleteForms.forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        if ( window.confirm(`Do you want to cancel ${this.getAttribute("post-title")}?`) ) {
            this.submit();
        }
    })
})

const form = {
    name: "",
    email: "",
    address: "",
    vat_number: "",
    cooking_types: "",
    password : "",
    confirm_password: ""
};

let errors = {};
let error_messages = document.getElementById("errors");

// if (!form.name.trim()) errors.name = "Il nome non è valido.";
// if (!form.email.trim()) errors.email = "La mail non è valida.";
// if (!form.address.trim()) errors.address = "L'indirizzo non è valido.";
// if (!form.vat_number.trim()) errors.vat_number = "La partita IVA non è valida.";
// if (!form.cooking_types.trim()) errors.cooking_types = "Devi selezionare almeno una categoria.";
// if (!form.password.trim()) errors.password = "La password non può essere vuota.";
// if (!form.confirm_password.trim()) errors.confirm_password = "La conferma della password non può essere vuota.";


// console.log(Object.keys(errors).length === 0)
function checkErrors(){
    if (form.name == "") errors.name = "Il nome non è valido.";
    if (!form.email.trim() && 
    !form.email.match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) errors.email = "La mail non è valida.";
    if (!form.address.trim()) errors.address = "L'indirizzo non è valido.";
    if (!form.vat_number.trim()) errors.vat_number = "La partita IVA non è valida.";
    if (!form.cooking_types.trim()) errors.cooking_types = "Devi selezionare almeno una categoria.";
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

const keys = Object.keys(form);
console.warn(keys)
const button = document.getElementById("register-button");
button.addEventListener("click", function(){
    
    const input = document.querySelectorAll(".form-control");
    for (let i = 0; i < input.length; i++) {
        console.table(keys[i])
        let key = keys[i];
        console.log(input[i].getAttribute("form-title") == form.name)
        if (input[i].getAttribute("form-title") == key){
            form[key] = input[i].value;
        }


        
    }
    console.log(form)
    checkErrors();
})



