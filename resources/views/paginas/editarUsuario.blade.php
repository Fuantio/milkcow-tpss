@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Editar usuario') }}</div>
                    <div class="card-body">

                        @foreach ($usuario as $persona)
                        <form method="POST" action="{{ url('/')}}/usuarios/{{$persona['id']}}">
                            @method('PUT')
                            @csrf


                                
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$persona['name']}}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{$persona['last_name']}}" required autocomplete="last_name" autofocus>

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="identificacion" class="col-md-4 col-form-label text-md-right">{{ __('identificación') }}</label>

                                <div class="col-md-6">
                                    <input id="identificacion" type="identificacion" class="form-control @error('identificacion') is-invalid @enderror" name="identificacion" value="{{$persona['identificacion']}}" required autocomplete="identificacion">

                                    @error('identificacion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        
                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Genero')}}</label>
                                <div class="col-md-6">
                    
                                    <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                                            <option value="Masculino" @if ($persona['genero'] == 'Masculino'){{ 'selected' }}@endif>Masculino</option>
                                            <option value="Femenino" @if ($persona['genero'] == 'Femenino'){{ 'selected' }}@endif>Femenino</option>
                                            <option value="Otro" @if ($persona['genero'] == 'otro'){{ 'selected' }}@endif>Otro</option>
                                    </select>
                                        @error('genero')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$persona['email']}}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                                <div class="form-group row">
                                    <label for="celphone" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>
                                    <div class="col-md-6">
                                        <input id="celphone" type="celphone" class="form-control @error('celphone') is-invalid @enderror" name="celphone" value="{{ $persona['celphone'] }}" required autocomplete="celphone">

                                        @error('celphone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="type_user" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de usuario')}}</label>
                                    <div class="col-md-6">
                                        <select name="type_user" id="type_user" class="form-control @error('type_user') is-invalid @enderror">
                                            <option value="Pasante" @if ($persona['type_user'] == 'Pasante'){{ 'selected' }}@endif>Pasante</option>
                                            <option value="Aprendiz" @if ($persona['type_user'] == 'Aprendiz'){{'selected' }}@endif>Aprendiz</option>
                                            <option value="Instructor" @if ($persona['type_user'] == 'Instructor'){{'selected' }}@endif>Instructor (a)</option>
                                        </select>    
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="type_user" class="col-md-4 col-form-label text-md-right"></label>
                                    <div class="col-md-6 offset-md4">
                                     
                                    <button type="submit" class="btn btn-primary">{{__('ACTUALIZAR')}}</button> 
                                    </div>
                                </div>    
                        </form>
                        @endforeach 
                    </div>         
                </div>
            </div>
        </div>
    </div>
@endsection
