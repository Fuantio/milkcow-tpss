@extends('layouts.app')

@section('content')
<div class="container">

    <div class="form-group col-md-4">
        <h3>Buscar Despacho Por Destino:</h3>
        <input v-model="textoDespachos" type="text" class="form-control" v-on:keyup="buscarDespacho()">
        <h3>Buscar Despacho Por Fecha:</h3>
        <input v-model="fechaDespachos" type="date" class="form-control" v-on:change="buscarDespachoFecha()">
    </div>

    <div class="col-md-11">
        <div class="row justify-content-center">

            <div class="card">
                <div class="card-header">{{ __('DESPACHOS') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">DESTINO</th>
                                <th scope="col">CANTIDAD</th>
                                <th scope="col">FECHA</th>
                                <th scope="col">RESPONSABLE</th>
                                <th colspan="2">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr v-for="(despacho, index) in despachos" v-show="index >= desdeDespacho && index < hastaDespacho">

                                <th scope="row">@{{ despacho.id_despacho }}</th>
                                <td>@{{ despacho.destino }}</td>
                                <td>@{{ despacho.cantidad }}</td>
                                <td>@{{ despacho.fecha }}</td>
                                <td>@{{ despacho.name }}</td>
                                <td>
                                    <div class="btn-group">

                                        <a class="btn btn-primary" v-bind:href="'http://127.0.0.1:8000/despachos/'+ despacho.id_despacho">
                                        <i class="bi bi-pencil-square"></i>
                                        </a> 
                                        @if ( Auth::user()->type_user == 'Instructor')
                                        <a class="btn btn-danger" v-on:click="eliminarDespachos(despacho.id_despacho)">
                                        <i class="bi bi-trash3"></i>
                                        </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <nav aria-label="Page navigation example">
        <ul class="pagination">

            <li v-bind:class="ocultarMostrarAnteriorDespacho">

                <a v-on:click="anterior" class="page-link" href="#" aria-label="Previous">

                    <span aria-hidden="true">&laquo;</span>

                </a>
            </li>

            <li v-for="(pagina, index) in paginasDespacho" v-bind:class="botonesDespacho[index]">

                <a class="page-link" href="#" v-on:click="paginarDespacho(pagina)">@{{ pagina }}</a>

            </li>

            <li v-if="paginasDespacho == 1 " class="page-item disabled">

                <a class="page-link" href="#" aria-label="Next">

                    <span aria-hidden="true">&raquo;</span>

                </a>

            </li>

            <li v-else v-bind:class="ocultarMostrarSiguienteDespacho">

                <a v-on:click="siguiente" class="page-link" href="#" aria-label="Next">

                    <span aria-hidden="true">&raquo;</span>

                </a>
            </li>
        </ul>
    </nav>

            </div>
      

        </div>
        

    </div>
   


</div>
@endsection/