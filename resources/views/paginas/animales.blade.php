

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-group col-md-4">

        <h3>Buscar Animales:</h3>
        <input v-model="nombre_vaca" type="text" class="form-control" v-on:keyup="buscar_animales">
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li v-bind:class="ocultarMostrarAnteriorVaca">
                <a v-on:click="anterior" class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <li v-for="(pagina, index) in paginasVaca"  v-bind:class="botonesVaca[index]">
                <a class="page-link" href="#" v-on:click="paginar(pagina)">@{{pagina}}</a>
            </li>
            <li v-if="paginasVaca == 1" class="page-item disabled">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
            <li v-else v-bind:class="ocultarMostrarSiguienteVaca">
                <a v-on:click="siguiente" class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>


    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('TABLA ANIMALES') }}</div>


                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    ANIMAL

                                     
                    <table class="table table-success table-striped">

                        <thead>
                            <tr>
                                <th>PLACA</th>
                                <th>NOMBRE VACA</th>
                                <th>FECHA DE NACIMIENTO</th>
                                <th>ESTADO</th>
                                <th>N.LOTE</th>
                                <th>RAZA</th>
                                @Auth
                                <th>ACCIONES</th>
                                @endAuth
                                
                            </tr>
                        </thead>
                        <tbody>

                            <tr v-for="(fila_animal, index) in arregloAnimales" v-show="index >= desdeVaca && index < hastaVaca">


                            
                                <td scope="row">@{{fila_animal.placa}}</td>
                                <td>@{{fila_animal.nombre}}</td>
                                <td>@{{fila_animal.fecha_de_nacimiento}}</td>
                                <td>@{{fila_animal.estado}}</td>
                                <td>@{{fila_animal.num_lote}}</td>
                                <td>@{{fila_animal.nom_raza}}</td>
                                @Auth
                                <td>
                                    <div class="btn-group">

                                        <a class="btn btn-primary" v-bind:href="'http://127.0.0.1:8000/animales/'+fila_animal.Id_animal">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        
                                        @if(Auth::user()->type_user == 'Instructor')
                                        <a class="btn btn-danger" hfef="#" v-on:click="eliminarAnimal(fila_animal.Id_animal)">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        @endif
                                        
                                    </div>
                                </td>
                                @endauth
                            </tr>

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
