@extends('layouts.app')

@section('content')
<div class="container " >
    <div  id="errors">

    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 p-4">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name*') }}</label>

                            <div class="col-md-8">
                                <div class="input-group input-group-static mb-4">
                                    <input id="name" form-title="name" type="text" class="my-form form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address*') }}</label>

                            <div class="col-md-8">
                                <div class="input-group input-group-static mb-4">
                                    <input id="email" form-title="email" type="email" class="my-form form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address*</label>

                            <div class="col-md-8">
                                <div class="input-group input-group-static mb-4">
                                    <input id="address" form-title="address" type="text" class="my-form form-control" name="address" value="{{ old('address') }}" required autocomplete="address">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image_url" class="col-md-4 col-form-label text-md-right">Image</label>

                            <div class="col-md-8">
                                <div class="input-group input-group-static mb-4">
                                    <input id="image_url" type="file" class="btn bg-gradient-primary w-auto me-2" name="image_url" value="{{ old('image_url') }}" autocomplete="image_url">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">Logo</label>

                            <div class="col-md-8">
                                <div class="input-group input-group-static mb-4">
                                    <input id="logo" type="file" class="btn bg-gradient-primary w-auto me-2  " name="logo" value="{{ old('logo') }}" autocomplete="logo">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vat_number" class="col-md-4 col-form-label text-md-right">Vat Number*</label>

                            <div class="col-md-8">
                                <div class="input-group input-group-static mb-4">
                                    <input id="vat_number" form-title="vat_number" type="text" class="my-form form-control" name="vat_number" value="{{ old('vat_number') }}" required autocomplete="vat_number">
                                    @error('vat_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                            <div class="col-md-8">
                                <div class="input-group input-group-static mb-4">
                                    <input id="password" form-title="password" type="password" class=" my-form form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>

                            <div class="col-md-8">
                                <div class="input-group input-group-static mb-4">
                                    <input id="password-confirm" form-title="confirm_password" type="password" class="my-form form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <h5>Tipologia*</h5>
                        </div>
                        <div class="col w-75 mx-auto d-flex flex-wrap">

                        @foreach ($cookingTypes as $cookingType)
                            <div class="form-check">
                                <input
                                class="form-check-input my-types"
                                type="checkbox"
                                form-title="cooking_types"
                                value="{{ $cookingType->id }}"
                                name="cooking_types[]"
                                >
                                <label class="form-check-label" for="flexCheckDefault">
                                    <span class="badge rounded-pill mb-3 text-dark">{{$cookingType->name}}</span>
                                </label>
                            </div>
                        @endforeach
                        @error('cooking_types')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="register-button">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
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

        const types = document.querySelectorAll(".my-types");
        const keys = Object.keys(form);
        let errors = {};
        let error_messages = document.getElementById("errors");

        let checkedTypes = false;
        function checkErrors(){
            error_messages.innerHTML = "";
            if (form.name == "") errors.name = "Il nome non è valido.";
            if (!form.email.trim() &&
            !form.email.match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) errors.email = "La mail non è valida.";
            if (!form.address.trim()) errors.address = "L'indirizzo non è valido.";
            if (!form.vat_number.trim()) errors.vat_number = "La partita IVA non è valida.";
            if (!form.password.trim()) errors.password = "La password non può essere vuota.";
            if (!form.confirm_password.trim()) errors.confirm_password = "La conferma della password non può essere vuota.";
            if(!checkedTypes) errors.cooking_types = "Devi selezionare almeno una categoria.";
            if (Object.keys(errors).length !== 0){
                for (const error in errors) {
                    error_messages.classList.add("alert", "alert-danger");
                    error_messages.innerHTML += errors[error] + "<br>";
                    console.log(errors[error])
                }
            }
        }
        const registerBtn = document.getElementById("register-button");
        registerBtn.addEventListener("click", function(){

            const input = document.querySelectorAll(".my-form");
            for (let i = 0; i < input.length; i++) {
                if(types[i].checked){
                    checkedTypes = true;
                    console.log(checkedTypes);
                }
                let key = keys[i];
                if (input[i].getAttribute("form-title") == key){
                    form[key] = input[i].value;
                }
            }
            checkErrors();
        })
    </script>
    <script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
@endsection
