<?php $__env->startSection("title", "Ajout d'une nouvelle ligne à la grille"); ?>

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
            <a href="<?php echo e(route('admin_transfer_points.index')); ?>">
              <i class="fa fa-gift"></i> Grille tarifaire
            </a>
          </li>
          <li class="breadcrumb-item active">
            <i class="fa fa-pencil-alt"></i>Ajout d'un point de transfert
          </li>
        </ol>
      </div>
    </div>
  </div>

  <div class="row">

    <div class="col-lg-3 grid-margin stretch-card">
        <img src="/images/logo.png" alt="" height="180px" class="img img-responsive img-thumbnail"
        style="display:block;">
    </div>

    <div class="col-lg-9 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <form class="forms-sample" action="<?php echo e(route('admin_transfer_points.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="name">Nom du point de transfert</label>
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nom du point de transfert"/>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="manager">Gestionnaire</label>
                  <div class="input-group col-xs-12">
                      <select name="manager" id="manager" class="form-control select2" style="text-transform: uppercase">
                          <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="contact">Contact</label>
                  <div class="input-group col-xs-12">
                    <input type="text" name="contact" class="form-control" id="contact" placeholder="Contact">
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="country_id">Pays</label>
                  <div class="input-group col-xs-12">
                    <select name="country_id" class="form-control select2" id="country_id" placeholder="Pays">
                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($country->id); ?>"><?php echo e(strtoupper($country->name)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-lg-12">
                <div class="form-check form-check-success">
                    <label class="form-check-label" for="state">
                        <input type="checkbox" id="state" name="state" value="DETACHED" class="form-check-input">
                        Ce point de transfert est délocalisé
                    </label>
                </div>
              </div>

            </div>

            <button type="submit" class="btn btn-success mr-2">
              <i class="fa fa-save"></i> Enregistrer
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/m-transfert-laravel/resources/views/backend/pages/sale_points/create.blade.php ENDPATH**/ ?>