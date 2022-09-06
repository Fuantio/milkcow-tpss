<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'MILKCOW-TPS')); ?></title>

    <!-- Scripts -->

    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
        <!-- SCRIPT PARA GRAFICAR FUAN -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
<div id="app">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm" style="background-color: #FF4000;">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <b><?php echo e(config('app.name', 'MIlKCOW-TPS')); ?></b>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <?php if(isset( Auth::user()->name)): ?>
                    <ul class="navbar-nav mr-auto">


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:black;">
                                <b>Animales</b>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="/animales">Lista de animales</a>
                                <a class="dropdown-item" href="/animalesAgregar">Agregar animal</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:black;">
                                <b>Produccion</b>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="/produccion">Tabla</a>
                                <a class="dropdown-item" href="/produccionAgregar">Agregar Produccion</a>
                                <a class="dropdown-item" href="/graficas">Graficos</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:black;">
                                <b>Despachos</b>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="/despachos">Listado de despachos</a>
                                <a class="dropdown-item" href="/despachoAgregar">Agregar envio</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:black;">
                                <b>Novedades</b>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href=""><b>Novedades animal</b></a>
                                <a class="dropdown-item" href="/novedades">Lista de novedades a.</a>
                                <a class="dropdown-item" href="/agregarNovedadAnimal">Agregar novedad a.</a>
                                <a class="dropdown-item" href=""></a>
                                <a class="dropdown-item" href=""><b>Novedades producción</b></a>
                                <a class="dropdown-item" href="/novedadesProduccion">Lista de novedades p.</a>
                                <a class="dropdown-item" href="/novedadProduccionAgregar">Agregar novedad p.</a>
                            </div>
                        </li>
                        <?php if( Auth::user()->type_user == 'Instructor'): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:black;">
                                <b>Usuarios</b>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="/usuarios">Lista de usuarios</a>
                                <a class="dropdown-item" href="/usuariosRegistrar">Registrar usuarios</a>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <?php endif; ?>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>" style="color:black;"><b><?php echo e(__('Ingresar')); ?></b></a>
                            </li>
                             <!-- <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/usuariosRegistrar" style="color:black;"><b><?php echo e(__('Registrarse')); ?></b></a>
                                </li>
                            <?php endif; ?> -->
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color:black;">
                                <b> <?php echo e(Auth::user()->name); ?> </b>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Salir')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>
</html>
<?php /**PATH D:\frontend\milkcow-tpss\resources\views/layouts/app.blade.php ENDPATH**/ ?>