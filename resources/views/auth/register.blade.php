@extends('layouts.app')

@section('content')
<div class="container">
    <div  id="errors">

    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name*') }}</label>

                            <div class="col-md-6">
                                <input id="name" form-title="name" type="text" class="my-form form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address*') }}</label>

                            <div class="col-md-6">
                                <input id="email" form-title="email" type="email" class="my-form form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address*</label>

                            <div class="col-md-6">
                                <input id="address" form-title="address" type="text" class="my-form form-control" name="address" value="{{ old('address') }}" required autocomplete="address">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image_url" class="col-md-4 col-form-label text-md-right">Image</label>

                            <div class="col-md-6">
                                <input id="image_url" type="file" class="form-control" name="image_url" value="{{ old('image_url') }}" autocomplete="image_url">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">Logo</label>

                            <div class="col-md-6">
                                <input id="logo" type="file" class="form-control" name="logo" value="{{ old('logo') }}" autocomplete="logo">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vat_number" class="col-md-4 col-form-label text-md-right">Vat Number*</label>

                            <div class="col-md-6">
                                <input id="vat_number" form-title="vat_number" type="text" class="my-form form-control" name="vat_number" value="{{ old('vat_number') }}" required autocomplete="vat_number">
                                @error('vat_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                            <div class="col-md-6">
                                <input id="password" form-title="password" type="password" class=" my-form form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" form-title="confirm_password" type="password" class="my-form form-control" name="password_confirmation" required autocomplete="new-password">
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
                                    <span class="badge rounded-pill mb-3">{{$cookingType->name}}</span>
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
    <script src="{{asset("js/admin.js")}}"></script>
@endsection
