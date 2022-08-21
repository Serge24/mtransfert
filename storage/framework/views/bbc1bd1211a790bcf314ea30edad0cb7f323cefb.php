<?php $__env->startSection("title", "Détails d'un utilsateur"); ?>

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
              <i class="fa fa-gift"></i> Liste de points de transfert
            </a>
          </li>
        </ol>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-description text-right">
            <a href="<?php echo e(route('admin_transfer_points.create')); ?>" class="btn btn-info">
              <i class="mdi mdi-plus btn-icon-append"></i>
              Ajouter
            </a>
          </p>

          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="owned-transfer-point-tab" data-toggle="tab" href="#owned-transfer-point" role="tab" aria-controls="owned-transfer-point" aria-selected="true">
                  Vos points de points de transfert
              </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="other-transfer-point-tab" data-toggle="tab" href="#other-transfer-point" role="tab" aria-controls="other-transfer-point" aria-selected="false">
                  Autres points de transferts
              </a>
            </li>
          </ul>
          <?php
              $owned = 0;
              $other = 0;
          ?>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="owned-transfer-point" role="tabpanel" aria-labelledby="owned-transfer-point-tab">
                <div class="table-responsive" style="margin-top: 30px">
                    <table class="table table-hover data-table" data-order='[[0, "asc"]]'>
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Contact</th>
                            <th>Gestionnaire</th>
                            <th>Pays</th>
                          <th>Options</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $ownedSalePoints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ownedSalePoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $owned++;
                            ?>
                          <tr>
                            <td data-order="<?php echo e($ownedSalePoint->id); ?>"><?php echo e($owned); ?></td>
                            <td><?php echo e($ownedSalePoint->name); ?></td>
                            <td><?php echo e($ownedSalePoint->contact); ?></td>
                            <td><?php echo e($ownedSalePoint->owner->name); ?></td>
                            <td><?php echo e($ownedSalePoint->country->name); ?></td>
                            <td>
                              <a href="<?php echo e(route('admin_transfer_points.edit',$ownedSalePoint)); ?>" class="btn btn-success btn-sm btn-icon-text">
                                <i class="mdi mdi-pencil"></i>
                              </a>
                              <a href="<?php echo e(route('admin_transfer_points.show',$ownedSalePoint)); ?>" class="btn btn-info btn-sm btn-icon-text">
                                <i class="mdi mdi-eye"></i>
                              </a>
                              <button type="button" onclick="confirmDeletion(<?php echo e($ownedSalePoint); ?>)" data-href="<?php echo e(route('admin_transfer_points.destroy',$ownedSalePoint->code)); ?>" class="btn btn-danger btn-sm btn-icon-text">
                                <i class="fa fa-trash"></i>
                              </button>
                            </td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="other-transfer-point" role="tabpanel" aria-labelledby="other-transfer-point-tab">
                <div class="table-responsive" style="margin-top: 30px">
                    <table class="table table-hover data-table" data-order='[[0, "asc"]]'>
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Contact</th>
                            <th>Gestionnaire</th>
                            <th>Pays</th>
                            <th>Options</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $otherSalePoints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otherSalePoint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $other++;
                            ?>
                          <tr>
                              <td data-order="<?php echo e($otherSalePoint->id); ?>"><?php echo e($owned); ?></td>
                              <td><?php echo e($otherSalePoint->name); ?></td>
                              <td><?php echo e($otherSalePoint->contact); ?></td>
                              <td><?php echo e($otherSalePoint->owner->name); ?></td>
                              <td><?php echo e($otherSalePoint->country->name); ?></td>
                            <td>
                              <a href="<?php echo e(route('admin_transfer_points.edit',$otherSalePoint)); ?>" class="btn btn-success btn-sm btn-icon-text">
                                <i class="mdi mdi-pencil"></i>
                              </a>
                              <a href="<?php echo e(route('admin_transfer_points.show',$otherSalePoint)); ?>" class="btn btn-info btn-sm btn-icon-text">
                                <i class="mdi mdi-eye"></i>
                              </a>
                              <button type="button" onclick="confirmDeletion(<?php echo e($otherSalePoint->id); ?>)" data-href="<?php echo e(route('admin_transfer_points.destroy',$otherSalePoint)); ?>" class="btn btn-danger btn-sm btn-icon-text">
                                <i class="fa fa-trash"></i>
                              </button>
                            </td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script>
    const delete_route = "<?php echo e(route('admin_transfer_points.destroy','__x__')); ?>"
    function confirmDeletion(range_id){
      const confirmed=confirm("Voulez-vous vraiment supprimer cette ligne?");
      if(confirmed){
        location.href = delete_route.replace('__x__', range_id);
      }
    }

    var tabEl = document.querySelector('button[data-bs-toggle="tab"]');
    tabEl.addEventListener('shown.bs.tab', function (event) {
        event.target // newly activated tab
        event.relatedTarget // previous active tab
    })
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/m-transfert-laravel/resources/views/backend/pages/sale_points/index.blade.php ENDPATH**/ ?>