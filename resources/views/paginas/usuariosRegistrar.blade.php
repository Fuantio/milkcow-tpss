@auth
@if (Auth::user()->type_user == 'Instructor')
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar usuarios') }}</div>

                <div class="card-body">
                        <form method="POST" action="{{ url('/')}}/usuarios/">
                           
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('NOMBRE') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('APELLIDOS') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="" required autocomplete="last_name" autofocus>

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="identificacion" class="col-md-4 col-form-label text-md-right">{{ __('IDENTIFICACIÓN') }}</label>

                                <div class="col-md-6">
                                    <input id="identificacion" type="identificacion" class="form-control @error('identificacion') is-invalid @enderror" name="identificacion" value="" required autocomplete="identificacion">

                                    @error('identificacion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        
                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('GENERO ')}}</label>
                                <div class="col-md-6">
                    
                                    <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                                            <option value>Seleciona uno</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                            <option value="Otro">Otro</option>
                                    </select>
                                        @error('genero')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('CORREO') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                                <div class="form-group row">
                                    <label for="celphone" class="col-md-4 col-form-label text-md-right">{{ __('TELEFONO') }}</label>
                                    <div class="col-md-6">
                                        <input id="celphone" type="celphone" class="form-control @error('celphone') is-invalid @enderror" name="celphone" value="" required autocomplete="celphone">

                                        @error('celphone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="type_user" class="col-md-4 col-form-label text-md-right">{{ __('TIPO DE USUARIO')}}</label>
                                    <div class="col-md-6">
                                        <select name="type_user" id="type_user" class="form-control @error('type_user') is-invalid @enderror">
                                            <option value>Seleciona uno</option>
                                            <option value="Pasante">Pasante</option>
                                            <option value="Aprendiz">Aprendiz</option>
                                            <option value="Instructor">Instructor</option>
                                        </select>    
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('CONTRASEÑA') }}</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" required autocomplete="password">

                                        @error('pasword')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="type_user" class="col-md-4 col-form-label text-md-right"></label>
                                    <div class="col-md-6 offset-md4">
                                     
                                    <button type="submit" class="btn btn-primary">{{__('REGISTRAR')}}</button> 
                                    </div>
                                </div>    
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@endif
@endauth