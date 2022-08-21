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

          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                  Transfert ver l'international
              </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                  Transfert vers le TOGO
              </a>
            </li>
          </ul>
          <?php
              $IntlIndex = 0;
              $TogoIndex = 0;
          ?>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="table-responsive" style="margin-top: 30px">
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
                        <?php $__currentLoopData = $pricelistIntl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pricelistItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $IntlIndex++;
                            ?>
                          <tr>
                            <td data-order="<?php echo e($pricelistItem->start); ?>"><?php echo e($IntlIndex); ?></td>
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
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="table-responsive" style="margin-top: 30px">
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
                        <?php $__currentLoopData = $pricelistTogo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pricelistItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $TogoIndex++;
                            ?>
                          <tr>
                            <td data-order="<?php echo e($pricelistItem->start); ?>"><?php echo e($TogoIndex); ?></td>
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


    var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'))
        triggerTabList.forEach(function (triggerEl) {
        var tabTrigger = new bootstrap.Tab(triggerEl)

        triggerEl.addEventListener('click', function (event) {
            event.preventDefault()
            tabTrigger.show()
        })
    })

    var tabEl = document.querySelector('button[data-bs-toggle="tab"]')
        tabEl.addEventListener('shown.bs.tab', function (event) {
        event.target // newly activated tab
        event.relatedTarget // previous active tab
    })
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/m-transfert-laravel/resources/views/backend/pages/pricelist/index.blade.php ENDPATH**/ ?>