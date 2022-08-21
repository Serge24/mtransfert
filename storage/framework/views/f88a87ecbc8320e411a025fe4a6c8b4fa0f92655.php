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
            <a href="<?php echo e(route('admin_pricelist.index')); ?>">
              <i class="fa fa-gift"></i> Grille tarifaire
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
            <a href="<?php echo e(route('admin_pricelist.create')); ?>" class="btn btn-info">
              <i class="mdi mdi-plus btn-icon-append"></i>
              Ajouter
            </a>
          </p>
          <div class="table-responsive">
            <table class="table table-hover data-table" data-order='[[0, "asc"]]'>
              <thead>
                <tr>
                  <th>#</th>
                  <th class="text-right">Min (XOF)</th>
                  <th class="text-right">Max (XOF)</th>
                  <th class="text-right">Frais (XOF)</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $pricelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pricelistItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td data-order="<?php echo e($pricelistItem->start); ?>"><?php echo e($pricelistItem->id); ?></td>
                    <td class="text-right"><?php echo e($pricelistItem->start); ?></td>
                    <td class="text-right"><?php echo e($pricelistItem->end); ?></td>
                    <td class="text-right"><?php echo e($pricelistItem->change); ?></td>

                    <td>
                      <a href="<?php echo e(route('admin_pricelist.edit',$pricelistItem)); ?>" class="btn btn-success btn-sm btn-icon-text">
                        <i class="mdi mdi-pencil"></i>
                      </a>
                      <button type="button" onclick="confirmDeletion(<?php echo e($pricelistItem->id); ?>)" data-href="<?php echo e(route('admin_pricelist.destroy',$pricelistItem)); ?>" class="btn btn-danger btn-sm btn-icon-text">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script>
    const delete_route = "<?php echo e(route('admin_pricelist.destroy','__x__')); ?>"
    function confirmDeletion(range_id){
      const confirmed=confirm("Voulez-vous vraiment supprimer cette ligne?");
      if(confirmed){
        location.href = delete_route.replace('__x__', range_id);
      }
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/m-transfert-laravel/resources/views/backend/pages/pricelist/index.blade.php ENDPATH**/ ?>