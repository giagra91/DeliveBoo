// / edit food validation


const foodForm = {
    name: "",
    description: "",
    ingredients: "",
    price: "",
};

let formErrors = {};

let form_error_messages = document.getElementById("errors");
let formInputs = document.querySelectorAll('.my-form1');
console.log(formInputs);

function checkFormErrors() {
    form_error_messages.innerHTML = "";

    if (foodForm.name.trim() == "") errors.name = "Il nome non è valido.";

    if (foodForm.description.trim() == "") errors.description = "La descrizione non è valida.";

    if (foodForm.ingredients.trim() == "") errors.ingredients = "Ingredienti non validi.";

    if (isNan(foodForm.price) && foodForm.price <= 0) errors.price = "Il prezzo non è valido.";

    if (foodForm.is_visible != 0 && foodForm.is_visible != 1 ) errors.is_visible = "L'opzione non è corretta";
}

document.getElementById('edit-button').addEventListener('click', function(){
    console.warn('cliccato');
    console.log(formInputs);
    for (let i = 0; i < formInputs.length; i++) {
        console.log(i);
        console.log(formInputs[i].getAttribute('form-title')); 
    } 
});