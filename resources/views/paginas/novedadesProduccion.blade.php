@extends('layouts.app')

@section('content')
<div class="container">

    <div class="form-group col-md-4">

        <h3>Buscar Novedad por fecha:</h3>
        <input v-model="fecha_novedad_produccion" type="date" class="form-control" v-on:change="buscarNovedades">

    </div>

    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(' Novedades De Producción') }}</div>

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
                                <th scope="col">USUARIO</th>
                                <th scope="col">VACA</th>
                                <th scope="col">OBSERVACION</th>
                                <th scope="col">FECHA</th>
                                <th scope="col">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>


                            <tr v-for="(novedad, index) in arregloNovedadesProduccion" v-show="index >= desdeNP && index < hastaNP">
                                <th scope="row">@{{ novedad.id_novedad_produccion }}</th>
                                <td>@{{ novedad.name }}</td>
                                <td>@{{ novedad.nombre }}</td>
                                <td>@{{ novedad.observaciones }}</td>
                                <td>@{{ novedad.fecha }}</td>

                                <td>
                                    <a v-bind:href="'http://127.0.0.1:8000/novedadesProduccion/' + novedad.id_novedad_produccion">Editar</a>
                                    @if(Auth::user()->type_user == 'Instructor')
                                    <a href="#" v-on:click="eliminarNovedadProduccion(novedad.id_novedad_produccion)">Eliminar</a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">

                        <li v-bind:class="ocultarMostrarAnteriorNP">

                            <a v-on:click="anterior" class="page-link" href="#" aria-label="Previous">

                                <span aria-hidden="true">&laquo;</span>

                            </a>
                        </li>

                        <li v-for="(pagina, index) in paginasNP" v-bind:class="botonesNP[index]">

                            <a class="page-link" href="#" v-on:click="paginarNP(pagina)">@{{ pagina }}</a>

                        </li>

                        <li v-if="paginasNP == 1 " class="page-item disabled">

                            <a class="page-link" href="#" aria-label="Next">

                                <span aria-hidden="true">&raquo;</span>

                            </a>

                        </li>

                        <li v-else v-bind:class="ocultarMostrarSiguienteNP">

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
@endsection
@endif