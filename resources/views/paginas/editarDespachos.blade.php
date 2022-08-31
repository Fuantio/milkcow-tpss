@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Despacho') }}</div>

                <div class="card-body">
                    @foreach ($despachos as $despacho)
                    <form method="POST" action="{{url('/') }}/despachos/{{$despacho['id_despacho']}}">

                        @method('PUT')

                        @csrf

                        <div class="form-group row">
                            <label for="id_despacho" class="col-md-4 col-form-label text-md-right">{{ __('ID') }}</label>

                            <div class="col-md-6">
                                <input id="id_despacho" type="text" class="form-control @error('id_despacho') is-invalid @enderror" name="id_despacho" value="{{ $despacho['id_despacho'] }}" required autocomplete="id_despacho" autofocus readonly>

                                @error('id_despacho')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <label for="id_destino" class="col-md-4 col-form-label text-md-right">{{ __('DESTINO') }}</label>

                            <div class="col-md-6">
                                <select name="id_destino" id="id_destino" class="form-control @error('id_destino') id-invalid @enderror">

                                    @foreach ($destinos as $destino)

                                    <option value="{{ $destino['id_destino'] }}" @if($destino['id_destino']==$despacho['id_despacho']) selected @endif>{{ $destino['destino'] }}</option>

                                    @endforeach

                                </select>


                                @error('DESTINO')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cantidad" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad') }}</label>
                            <div class="col-md-6">
                                <input id="cantidad" type="text" class="form-control @error('cantidad') is-invalid @enderror" name="cantidad" value="{{ $despacho['cantidad'] }}" require autocomplete="cantidad" autofocus >

                                @error('cantidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('Fecha produccion') }}</label>
                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" value="{{ $despacho['fecha'] }}"  required autocomplete="fecha" autofocus>

                                @error('fecha ')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="id_responsable" class="col-md-4 col-form-label text-md-right">{{ __('Responsable') }}</label>

                            <div class="col-md-6">

                                <select name="id_responsable" id="id_responsable" class="form-control @error('id_responsable') id-invalid @enderror">

                                    @foreach ($usuarios as $usuario)


                                    <option value="{{ $usuario['id'] }}" @if($usuario['id']==$despacho['id_responsable']) selected @endif>{{ $usuario['name'] }}</option>

                                    @endforeach

                                </select>
                                @error('Responsable')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection