@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Registrar') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{url('/')}}/animales/">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="placa" class="col-md-4 col-form-label text-md-right">{{ __('Placa') }}</label>

                            <div class="col-md-6">
                                <input id="placa" type="text" class="form-control @error('placa') is-invalid @enderror" name="placa" value="" required autocomplete="placa" autofocus>

                                @error('placa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="fecha_de_nacimiento" class="col-md-4 col-form-label text-md-right">{{ __('Fecha_de_nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="fecha_de_nacimiento" type="date" class="form-control @error('fecha_de_nacmiento') is-invalid @enderror" name="fecha_de_nacimiento" value="" required autocomplete="fecha_de_nacimiento">

                                @error('fecha de nacimiento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado')}}</label>
                            <div class="col-md-6">
                                <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror">
                                    <option value="MUERTA">MUERTA</option>
                                    <option value="VIVA">VIVA</option>
                                    <option value="VENDIDA">VENDIDA</option>
                                </select>
                                @error('estado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="id_raza" class="col-md-4 col-form-label text-md-right">{{ __('Raza')}}</label>
                            <div class="col-md-6">

                                <select name="id_raza" id="id_raza" class="form-control @error('id_raza') is-invalid @enderror">
                                    @foreach ($razas as $raza)

                                    <option value="{{ $raza['id_raza']}}">{{$raza['nom_raza']}}</option>
                                    
                                    @endforeach
                                </select>
                                @error('raza')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="num_lote" class="col-md-4 col-form-label text-md-right">{{ __('Numero lote')}}</label>
                            <div class="col-md-6">

                                <select name="id_rebano" id="id_rebano" class="form-control @error('id_rebano') is-invalid @enderror">
                                    @foreach ($rebanos as $rebano)


                                    <option value="{{ $rebano['id_rebano']}}">{{$rebano['num_lote']}}</option>

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
                                    {{ __('AGREGAR') }}
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