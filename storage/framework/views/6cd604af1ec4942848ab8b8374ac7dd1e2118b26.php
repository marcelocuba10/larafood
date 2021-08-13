<?php echo csrf_field(); ?>
<div class="form-group  row"><label class="col-sm-2 col-form-label">* Nombre</label>
    <div class="col-sm-10">
        <input type="text" name="name" class="form-control" placeholder="Enter name" autocomplete="off" value="<?php echo e($profile->name ?? old('name')); ?>">
    </div>
</div>
<div class="form-group  row"><label class="col-sm-2 col-form-label">Descripcion</label>
    <div class="col-sm-10">
        <input type="text" name="description" class="form-control" placeholder="Enter description" autocomplete="off" value="<?php echo e($profile->description ?? old('description')); ?>">
    </div>
</div>
<div class="hr-line-dashed"></div>
<div class="form-group row">
    <div class="col-sm-4 col-sm-offset-2">
        <a class="btn btn-white btn-sm" href="<?php echo e(route('profiles.index')); ?>" >Cancelar</a>
        <button class="btn btn-primary btn-sm" type="submit">Guardar Cambios</button>
    </div>
</div><?php /**PATH C:\Users\Conecta-Desarrollo\Documents\laravel\5.8\larafood\resources\views/admin/pages/profiles/_partials/form.blade.php ENDPATH**/ ?>