<?php $__env->startSection('content'); ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Detail do Detail Plan <?php echo e($plan->name); ?></h2>
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
                <a href="<?php echo e(route('details.plan.show',[$plan->url, $detail->id])); ?>"><b>show Detail</b></a> <!-- cuando pasamos dos valores en el route, lo enviamos via array -->
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight ecommerce">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">
                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" readonly name="name" class="form-control" placeholder="Enter name" autocomplete="off" value="<?php echo e($detail->name ?? ''); ?>">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group row">
                        <div class="col-sm-4 col-sm-offset-2">
                            <a class="btn btn-white btn-sm" href="<?php echo e(route('details.plan.index', $plan->url)); ?>" >Cancel</a>  
                            <form style="display: inline-table;" method="POST" action="<?php echo e(route('details.plan.delete', [$plan->url, $detail->id])); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('tema.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Conecta-Desarrollo\Documents\laravel\5.8\larafood\resources\views/admin/pages/plans/details/show.blade.php ENDPATH**/ ?>