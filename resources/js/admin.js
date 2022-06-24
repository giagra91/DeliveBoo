const { isEmpty } = require('lodash');
const { default: Swal } = require('sweetalert2');

require('./bootstrap');

const deleteForms = document.querySelectorAll('.delete-form');


deleteForms.forEach(form => {
    form.addEventListener('submit', function(e) {
        let self = this;
        Swal.fire({
            text: 'Vuoi eliminare il Piatto?',
            denyButton: 'No',
            icon: 'error',
            showCancelButton: true,
            showConfirmButton: true
        }).then(
            function(isConfirm){
                if(isConfirm.isConfirmed){
                    self.submit();
                    Swal.fire({
                        title :'Cancellato!',
                        text: 'Il piatto è stato cancellato.',
                        icon :'success',
                        timer: 2000,
                    })
                }

            }
        )
        e.preventDefault();


    })
})








