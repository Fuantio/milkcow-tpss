@if (isset( Auth::user()->name ))
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Novedad Produccion') }}</div>

                <div class="card-body">

                    @foreach ($novedadesProduccion as $novedad)
                    
    

                    <form method="POST" action="{{url('/') }}/novedadesProduccion/{{$novedad['id_novedad_produccion']}}">

                        @method('PUT')

                        @csrf

                        <div class="form-group row">
                            <label for="id_novedad_produccion" class="col-md-4 col-form-label text-md-right">{{ __('Identificador Novedad') }}</label>

                            <div class="col-md-6">
                                <input id="id_novedad_produccion" type="text" class="form-control @error('id_novedad_produccion') is-invalid @enderror" name="id_novedad_produccion" value="{{ $novedad['id_novedad_produccion'] }}" required autocomplete="id_novedad_produccion" autofocus readonly>

                                @error('id_novedad_produccion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>  
                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('Fecha Producción') }}</label>
                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" value="{{ $novedad['fecha'] }}" required autocomplete="fecha" autofocus readonly>

                                @error('fecha ')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vacas" class="col-md-4 col-form-label text-md-right">{{ __('Vaca') }}</label>
                            <div class="col-md-6">

                                <select name="ID_Produccion" id="ID_Produccion" class="form-control @error('ID_Produccion') id-invalid @enderror">

                                    
                                    @foreach ($producciones as $produccion)
                                    <!--ponemos el nombre de la vaca para mostrar pero se guarda el id de produccion -->
                                    <option value="{{ $novedad['ID_Produccion'] }}" @if($novedad['ID_Produccion']==$produccion['ID_Produccion']) selected @endif>{{ $produccion['nombre'] }}</option>

                                    @endforeach

                                </select>

                                @error('vaca')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="id_responsable" class="col-md-4 col-form-label text-md-right">{{ __('Responsable') }}</label>

                            <div class="col-md-6">

                                <select name="id_usuario" id="id_usuario" class="form-control @error('id_usuario') id-invalid @enderror">

                                    @foreach ($usuarios as $usuario)


                                    <option value="{{ $usuario['id'] }}" @if($usuario['id']==$novedad['id_usuario']) selected @endif>{{ $usuario['name'] }}</option>

                                    @endforeach

                                </select>
                                @error('Responsable')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="observaciones" class="col-md-4 col-form-label text-md-right">{{ __('Observaciones') }}</label>
                            <div class="col-md-6">
                                <textarea id="observaciones" class="form-control @error('observaciones') is-invalid @enderror" name="observaciones" required autocomplete="observaciones" autofocus>{{ $novedad['observaciones'] }}</textarea>

                                @error('observaciones ')
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
@endif