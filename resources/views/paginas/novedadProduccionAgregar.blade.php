@if (isset( Auth::user()->name ))
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro Novedad Producción') }}</div>

                <div class="card-body">



                    <form method="POST" action="{{url('/') }}/novedadesProduccion/">

                        @csrf

                        <div class="form-group row">
                            <label for="ID_Produccion" class="col-md-4 col-form-label text-md-right">{{__('Fecha de la producción')}}</label>
                            <div class="col-md-6">
                                <input id="" v-model="fecha_novedad_produccion" v-on:change="buscarProduccionesParaNovedad" type="date" class="form-control @error('ID_Produccion') is-invalid @enderror" name="fecha" value="" require autocomplete="" autofocus></input>

                                @error('ID_Produccion')

                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="ID_Produccion" class="col-md-4 col-form-label text-md-right">{{ __('Producción') }}</label>
                            <div class="col-md-6">
                                <select name="ID_Produccion" id="ID_Produccion" class="form-control">
                                    <option value="">Seleccione una opción</option>
                                    <!--ponemos el nombre de la vaca para mostrar pero se guarda el id de produccion -->
                                   <option v-for="produccion in arregloProducciones" v-bind:value="produccion.ID_Produccion">@{{ produccion.nombre }} - @{{produccion.jornada}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_usuario" class="col-md-4 col-form-label text-md-right">{{ __('Responsable') }}</label>
                            <div class="col-md-6">
                                <select name="id_usuario" id="id_usuario" class="form-control">
                                    <option value="">Seleccione el responsable</option>
                                    @foreach ($responsables as $responsable)

                                    <option value="{{$responsable['id']}}">{{$responsable['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="observaciones" class="col-md-4 col-form-label text-md-right">{{ __('Observaciones:') }}</label>

                            <div class="col-md-6">
                                <textarea rows="4" id="observaciones"  class="form-control @error('observaciones') is-invalid @enderror" name="observaciones" required autocomplete="cantidad" autofocus></textarea>
                                @error('Observaciones')
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