<?php $__env->startSection('content'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Permisos disponibles para el perfil <?php echo e($profile->name); ?></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo e(route('admin.index')); ?>">Inicio</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?php echo e(route('profiles.index')); ?>">Perfiles</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="<?php echo e(route('profiles.permissions', $profile->id)); ?>">Permisos de <?php echo e($profile->name); ?> </a>
            </li>
            <li class="breadcrumb-item active">
                <a href="<?php echo e(route('profiles.permissions.available',$profile->id)); ?>">Vincular permisos para <?php echo e($profile->name); ?></a>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">                    
                    <div class="table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
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
                                    <button class="btn btn-success btn-xs btn_list_options" type="submit" style="border-top-left-radius: 5px !important;border-top-right-radius: 5px !important;margin-top: -5px">Filtrar</button>
                                </div>
                            </form> 

                            <table class="table table-striped table-bordered table-hover dataTable"
                                id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 2px">#</th> 
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Name: activate to sort column ascending"
                                            style="width: 299px;">Nombre</th>   
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="<?php echo e(route('profiles.permissions.attach', $profile->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="permissions[]" value="<?php echo e($permission->id); ?>">
                                            </td>
                                            <td><?php echo e($permission->name); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td colspan="500">
                                                <button class="btn btn-primary " type="submit"><i class="fa fa-check"></i>&nbsp;Vincular</button>
                                            </td>
                                        </tr>
                                    </form>
                                </tbody>
                            </table>
                            <?php if(isset($filters)): ?>
                                <?php echo $permissions-> appends($filters)->links(); ?> <!-- appends envia variable en la paginacion-->
                            <?php else: ?>
                                <?php echo $permissions-> links(); ?>    
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('tema.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Conecta-Desarrollo\Documents\laravel\5.8\larafood\resources\views/admin/pages/profiles/permissions/available.blade.php ENDPATH**/ ?>