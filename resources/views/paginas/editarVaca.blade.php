@if (isset( Auth::user()->name ))
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Animales') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @foreach($animales as $animal)
                    

                    <form method="POST" action="{{ url('/')}}/animales/{{$animal['Id_animal']}}">
                        @method('PUT')
                        @csrf

                        <div class="form-group row">
                            <label for="Id_animal" class="col-md-4 col-form-label text-md-right">{{ __('ID')}}</label>
                            <div class="col-md-6">
                                <input id="Id_animal" type="text" class="form-control @error('Id_animal') is-invalid @enderror" name="Id_animal" value="{{ $animal['Id_animal']}}" require autocomplete="Id_animal" autofocus readonly>

                                @error('Id_animal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('NOMBRE VACA')}}</label>
                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $animal['nombre']}}" require autocomplete="nombre" autofocus>
                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="placa" class="col-md-4 col-form-label text-md-right">{{ __('PLACA')}}</label>
                        <div class="col-md-6">  
                        <input id="placa" type="text" class="form-control @error('placa') is-invalid @enderror" name="placa" value="{{ $animal['placa']}}" require autocomplete="placa" autofocus>
                        @error('placa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha_de_nacimiento" class="col-md-4 col-form-label text-md-right">{{ __('FECHA DE NACIMIENTO')}}</label>
                            <div class="col-md-6">
                                <input id="fecha_de_nacimiento" type="date" class="form-control @error('fecha_de_nacimiento') is-invalid @enderror" name="fecha_de_nacimiento" value="{{ $animal['fecha_de_nacimiento']}}" require autocomplete="fecha_de_nacimiento" autofocus>

                                @error('fecha_de_nacimiento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('ESTADO')}}</label>
                            <div class="col-md-6">
                                <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror">
                                    <option value="MUERTA" @if ($animal['estado']=='MUERTA' ){{ 'selected' }}@endif>MUERTA</option>
                                    <option value="VIVA" @if ($animal['estado']=='VIVA' ){{ 'selected' }}@endif>VIVA</option>
                                    <option value="VENDIDA" @if ($animal['estado']=='VENDIDA' ){{ 'selected' }}@endif>VENDIDA</option>
                                </select>
                                @error('estado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="raza" class="col-md-4 col-form-label text-md-right">{{ __('RAZA')}}</label>

                            <div class="col-md-6">
                                <select name="raza" id="raza" class="form-control @error('raza') is-invalid @enderror">
                                    @foreach ($razas as $raza)


                                    <option value="{{ $raza['id_raza']}}" @if($raza['id_raza']==$animal['id_raza']){{ 'selected' }}@endif>{{$raza['nom_raza']}}</option>

                                    @endforeach

                                </select>
                                @error('estado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="num_lote" class="col-md-4 col-form-label text-md-right">{{ __('NUMERO LOTE')}}</label>

                            <div class="col-md-6">
                                <select name="id_rebano" id="id_rebano" class="form-control @error('id_rebano') is-invalid @enderror">
                                    @foreach ($rebanos as $rebano)


                                    <option value="{{ $rebano['id_Rebano']}}" @if($rebano['id_rebano']==$animal['id_rebano']){{ 'selected' }}@endif>{{$rebano['num_lote']}}</option>

                                    @endforeach

                                </select>
                                @error('estado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar')}}
                                </button>

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
@endif