<?php $__env->startSection("title", "Modification d'une ligne de la grille"); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <div class="row" style="margin-bottom:20px">
    <div class="col-sm-12 mb-4 mb-xl-0 grid-margin stretch-card">
      <div class="page-title-right" style="background-color:white">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item">
            <a href="<?php echo e(route('admin.home')); ?>">
              <i class="fa fa-home"></i> Accueil
            </a>
          </li>
          <li class="breadcrumb-item">
            <a href="<?php echo e(route('admin_pricelist.index')); ?>">
              <i class="fa fa-gift"></i> Grille tarifaire
            </a>
          </li>
          <li class="breadcrumb-item active">
            <i class="fa fa-pencil-alt"></i>Modification d'une ligne
          </li>
        </ol>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <form class="forms-sample" action="<?php echo e(route('admin_pricelist.update', $pricelistItem)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label for="start">Montant minimal</label>
                  <div class="input-group col-xs-12">
                    <input type="number" class="form-control" name="start" id="start" value="<?php echo e($pricelistItem->start); ?>" placeholder="Montant minimal"/>
                    <span class="input-group-append">
                      <button class="btn btn-info" type="button">XOF</button>
                    </span>
                  </div>
                </div>
              </div>

              <div class="col-lg-12">
                <div class="form-group">
                  <label for="end">Montant maximal</label>
                  <div class="input-group col-xs-12">
                    <input type="number" name="end" class="form-control" id="end" value="<?php echo e($pricelistItem->end); ?>" placeholder="Montant maximal">
                    <span class="input-group-append">
                      <button class="btn btn-info" type="button">XOF</button>
                    </span>
                  </div>
                </div>
              </div>

              <div class="col-lg-12">
                <div class="form-group">
                  <label for="change">Frais</label>
                  <div class="input-group col-xs-12">
                    <input type="number" name="change" class="form-control" id="change" value="<?php echo e($pricelistItem->change); ?>" placeholder="Frais">
                    <span class="input-group-append">
                      <button class="btn btn-info" type="button">XOF</button>
                    </span>
                  </div>
                </div>
              </div>

              <div class="col-lg-12">
                <div class="form-check form-check-success">
                    <label class="form-check-label" for="for_togo">
                        <input type="checkbox" id="for_togo" name="for_togo" value="1" class="form-check-input" <?php echo e($pricelistItem->for_togo === 1? "checked":""); ?>>
                        Valable uniquement que pour le TOGO
                    </label>
                </div>
              </div>

            </div>

            <button type="submit" class="btn btn-success mr-2">
              <i class="fa fa-save"></i> Modifier
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/m-transfert-laravel/resources/views/backend/pages/pricelist/edit.blade.php ENDPATH**/ ?>