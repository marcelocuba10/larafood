<?php $__env->startSection('content'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Perfiles asociados al permiso <?php echo e($permission->name); ?></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo e(route('admin.index')); ?>">Inicio</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="<?php echo e(route('permissions.index')); ?>">Permisos</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="<?php echo e(route('permissions.profiles', $permission->id)); ?>">perfiles del permiso <?php echo e($permission->name); ?> </a>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">                    
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <a href="<?php echo e(route('permissions.profiles.available',$permission->id)); ?>" class="btn btn-primary btn-xs btn_list_options"><i class="fa fa-plus" aria-hidden="true"></i> Agregar nuevo perfil a este permiso</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="html5buttons">
                                <div class="dt-buttons btn-group flex-wrap">
                                    <button class="btn btn-white btn-sm buttons-csv buttons-html5" tabindex="0"
                                        aria-controls="DataTables_Table_0" type="button"><span>CSV</span></button>
                                    <button class="btn btn-white btn-sm buttons-excel buttons-html5" tabindex="0"
                                        aria-controls="DataTables_Table_0" type="button"><span>Excel</span></button>
                                    <button class="btn btn-white btn-sm buttons-pdf buttons-html5" tabindex="0"
                                        aria-controls="DataTables_Table_0" type="button"><span>PDF</span></button>
                                    <button class="btn btn-white btn-sm buttons-print" tabindex="0"
                                        aria-controls="DataTables_Table_0" type="button"><span>Print</span></button>
                                </div>
                            </div>
                            <div class="dataTables_length" id="DataTables_Table_0_length">
                                <label>
                                    Mostrar 
                                    <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"
                                        class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> 
                                    registros 
                                </label>
                            </div>

                            <form action="<?php echo e(route('profiles.search')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                    <label>Buscar: 
                                        <input type="search" name="filter" class="form-control form-control-sm" value="<?php echo e($filters['filter'] ?? ''); ?>" aria-controls="DataTables_Table_0">
                                    </label>
                                    <button class="btn btn-success btn-xs btn_list_options" type="submit" style="margin-top: -5px">Filtrar</button>
                                </div>
                            </form> 

                            <table class="table table-striped table-bordered table-hover dataTable"
                                id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Name: activate to sort column ascending"
                                            style="width: 299px;">Nombre</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 150px;">Acciones</th>    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="gradeA odd" role="row">
                                        <td><?php echo e($profile->name); ?></td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <a href=" <?php echo e(route('permissions.profiles.detach', [$profile->id, $permission->id])); ?>" class="btn btn-danger btn-xs btn_list_options"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php if(isset($filters)): ?>
                                <?php echo $profiles-> appends($filters)->links(); ?> <!-- appends envia variable en la paginacion-->
                            <?php else: ?>
                                <?php echo $profiles-> links(); ?>    
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('tema.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Conecta-Desarrollo\Documents\laravel\5.8\larafood\resources\views/admin/pages/permissions/profiles/index.blade.php ENDPATH**/ ?>