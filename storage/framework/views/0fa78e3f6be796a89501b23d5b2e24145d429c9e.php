<?php $__env->startSection('content'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Edit Detail Plan <?php echo e($plan->name); ?></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo e(route('admin.index')); ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?php echo e(route('plans.index')); ?>">Plans</a>
            </li>
            <li class="breadcrumb-item">
                <a href="<?php echo e(route('details.plan.index',$plan->url)); ?>">Detalhes <?php echo e($plan->name); ?></a>
            </li>
            <li class="breadcrumb-item active">
                <a href="<?php echo e(route('details.plan.edit',[$plan->url, $detail->id])); ?>"><b>Edit Detail</b></a> <!-- cuando pasamos dos valores en el route, lo enviamos via array -->
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight ecommerce">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">
                    <form action="<?php echo e(route('details.plan.update',[$plan->url,$detail->id])); ?>" method="POST">
                        <?php echo method_field('PUT'); ?>
                        <?php echo $__env->make('admin.pages.plans.details._partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('tema.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Conecta-Desarrollo\Documents\laravel\5.8\larafood\resources\views/admin/pages/plans/details/edit.blade.php ENDPATH**/ ?>