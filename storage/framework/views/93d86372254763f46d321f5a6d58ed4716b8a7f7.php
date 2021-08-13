<?php if($errors->any()): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="position: absolute; top: 65px; right: 20px; z-index:9999">
            <div class="toast toast1 toast-bootstrap fade panel-warning show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header panel-heading" style="padding: 5px">
                    <i class="fa fa-info-circle"> </i>
                    <strong class="mr-auto m-l-sm">Aviso</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="toast-body">
                    <?php echo e($error); ?>

                </div>
            </div>
        </div>  
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(session('message')): ?>
    <div style="position: absolute; top: 65px; right: 20px; z-index:9999">
        <div class="toast toast1 toast-bootstrap fade panel-info show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header panel-heading" style="padding: 5px">
                <i class="fa fa-info-circle"> </i>
                <strong class="mr-auto m-l-sm">Aviso</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="toast-body">
                <?php echo e(session('message')); ?>

            </div>
        </div>
    </div>        
<?php endif; ?>

<?php if(session('error')): ?>
    <div style="position: absolute; top: 65px; right: 20px; z-index:9999">
        <div class="toast toast1 toast-bootstrap fade panel-danger show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header panel-heading" style="padding: 5px">
                <i class="fa fa-info-circle"> </i>
                <strong class="mr-auto m-l-sm">Aviso</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="toast-body">
                <?php echo e(session('error')); ?>

            </div>
        </div>
    </div>        
<?php endif; ?><?php /**PATH C:\Users\Conecta-Desarrollo\Documents\laravel\5.8\larafood\resources\views/admin/includes/alerts.blade.php ENDPATH**/ ?>