<?php $__env->startSection('content'); ?>

<div class="demo">
    <div class="container">
    	<div class="text-center">
    		<h1 class="title-plan">Escolha o plano</h1>
    	</div>
        <div class="row">
            <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 col-sm-6">
                    <div class="pricingTable">
                        <div class="pricing-content">
                            <div class="pricingTable-header">
                                <h3 class="title"><?php echo e($plan->name); ?></h3>
                            </div>
                            <div class="inner-content">
                                <div class="price-value">
                                    <span class="currency">R$</span>
                                    <span class="amount"><?php echo e(number_format($plan->price, 0, ',', '.')); ?></span>
                                    <span class="duration">Por Mês</span>
                                </div>
                                <ul>
                                    <?php $__currentLoopData = $plan->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($detail->name); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                        <div class="pricingTable-signup">
                            <a href="#">Assinar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Conecta-Desarrollo\Documents\laravel\5.8\larafood\resources\views/site/index.blade.php ENDPATH**/ ?>