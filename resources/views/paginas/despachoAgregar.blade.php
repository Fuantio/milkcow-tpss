@if (isset( Auth::user()->name ))
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agregar Despachos') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{url('/') }}/despachos/">

                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Destino:') }}</label>

                            <div class="col-md-6">
                                <select id="id_destino" type="text" class="form-control @error('id_destino') is-invalid @enderror" name="id_destino" required autocomplete="id_destino" autofocus>
                                    <option value="">Seleccione una opción</option>

                                    @foreach($destinos as $destino)
                                    <option value="{{ $destino['id_destino'] }}">{{ $destino['destino'] }}</option>
                                    @endforeach
                                </select>
                                @error('Destino')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cantidad" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad:') }}</label>

                            <div class="col-md-6">
                                <input id="cantidad" type="text" class="form-control @error('cantidad') is-invalid @enderror" name="cantidad" required autocomplete="cantidad" autofocus></input>
                                @error('Cantidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('Fecha:') }}</label>

                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" required autocomplete="fecha" autofocus></input>
                                @error('Fecha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="resposable" class="col-md-4 col-form-label text-md-right">{{ __('Responsable:') }}</label>

                            <div class="col-md-6">
                                <select id="id_responsable" type="text" class="form-control @error('id_responsable') is-invalid @enderror" name="id_responsable" required autocomplete="id_responsable" autofocus>
                                    <option value="">Seleccione una opción</option>

                                    @foreach($responsables as $responsable)
                                    <option value="{{$responsable['id']}}">{{$responsable['name']}}</option>
                                    @endforeach
                                </select>
                                @error('Destino')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6-offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{_('Agregar')}}
                                </button>
                            </div>
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