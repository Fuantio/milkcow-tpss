


<?php $__env->startSection('content'); ?>
<div class="card-header">
    <div class="container col col-md-12">
        <div class="form-group col-md-4">
            <h3>Buscar Año/Mes:</h3>
            <input v-model="graficarProduccion" type="month" min="2022-01" class="form-control" v-on:change="buscarMonthYear()">

        </div>
    </div>
</div>

<div id="barchart_month" style="width: 900px; height: 300px;"></div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\frontend\milkcow-tpss\resources\views/paginas/graficas.blade.php ENDPATH**/ ?>