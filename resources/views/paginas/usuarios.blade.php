@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-group col-md-4">
        <h3>Buscar Usuario/s</h3>
        <input v-model="textoUsuario" type="text" class="form-control" v-on:keyup="buscarUsuario">
    </div>

    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">

                <div class="card-header">{{ __('Listado de usuarios') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">NOMBRE</th>
                                <th>APELLIDOS</th>
                                <th>IDENTIFICACION</th>
                                <th>GENERO</th>
                                <th align="left">CORREO</th>
                                <th>TELEFONO</th>
                                <th>TIPO DE USUARIO</th>
                                @auth
                                <th>ACCIONES</th>
                                @endauth
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr v-for="(fila_usuario, index) in usuarios" v-show="index >= desdeUsuarios && index < hastaUsuarios">

                                <td>@{{fila_usuario.name}}</td>
                                <td>@{{fila_usuario.last_name}}</td>
                                <td>@{{fila_usuario.identificacion}}</td>
                                <td>@{{fila_usuario.gender}}</td>
                                <td>@{{fila_usuario.email}}</td>
                                <td>@{{fila_usuario.celphone}}</td>
                                <td>@{{fila_usuario.type_user}}</td>
                                <td>

                                @auth
                                    <div class="btn-group">
                                        <a class="btn btn-primary" v-bind:href="'http://127.0.0.1:8000/usuarios/'+fila_usuario.id">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        
                                        @if (Auth::user()->type_user == 'Instructor')

                                        <a class="btn btn-danger" hrerf="#" v-on:click="eliminarUsuario(fila_usuario.id)">
                                            <i class="bi bi-trash-fill"></i>
                                            
                                        @endif
                                        
                                @endauth
                            </tr>

                        </tbody>
                    </table>

                    <nav aria-label="page navigation example ">
                        <ul class="pagination">
                            <li v-bind:class="ocultarMostrarAnteriorUsuarios">
                                <a v-on:click="anterior" class="page-link" href="#" aria-label="previus">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li v-for="(pagina, index) in paginasUsuarios" v-bind:class="botones[index]">
                                <a class="page-link" href="#" v-on:click="paginarUsuario(pagina)">@{{pagina}}</a>
                            </li>
                            <li v-if="paginasUsuarios == 1 " class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                            <li v-else v-bind:class="ocultarMostrarSiguienteUsuarios">
                                <a v-on:click="siguiente" class="page-link" href="#" aria-label="Next">
                                    <span aria-hiden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection