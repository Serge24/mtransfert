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
            <a href="<?php echo e(route('admin_transactions.index')); ?>">
              <i class="fa fa-gift"></i> Transactions
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
          <h5 class="card-description">
            Liste des transactions
          </h5>
          <div class="table-responsive">
            <table class="table table-hover data-table" data-order='[[0, "desc"]]'>
              <thead>
                <tr>
                  <th>REF</th>
                  <th>Expéditeur</th>
                  <th>Destinataire</th>
                  <th>Montant</th>
                  <th>Etat</th>
                  <th>Date</th>
                  <th>Taux de change</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $status = "Envoyé";
                    $color = "success";
                ?>
                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($transaction->cancellation_reason!==null && strlen($transaction->cancellation_reason)>0): ?>
                        <?php
                            $status = "Annulé";
                            $color = "danger";
                        ?>
                    <?php else: ?>
                        <?php if($transaction->is_validated==1): ?>
                            <?php
                                $status = "Envoyé";
                                $color = "success";
                            ?>
                        <?php else: ?>
                            <?php
                                $status = "En Attente";
                                $color = "info";
                            ?>
                        <?php endif; ?>
                    <?php endif; ?>
                  <tr>
                    <td data-order="<?php echo e($transaction->id); ?>" style="font-weight:bolder"><?php echo e($transaction->ref); ?></td>
                    <td><?php echo e($transaction->payer->name); ?></td>
                    <td><?php echo e($transaction->payee->name); ?></td>
                    <td align="right" style="font-weight:bolder"><?php echo e($transaction->amount); ?> <?php echo e(strtoupper($transaction->currency["from"])); ?></td>
                    <td>
                      <label class="badge badge-<?php echo e($color); ?>"><?php echo e($status); ?></label>
                    </td>
                    <td>
                      <?php echo e($transaction->created_at); ?>

                    </td>
                    <td style="font-weight:bolder">
                        <?php
                            $conversion_rate = $transaction->computed_rate;
                        ?>
                        1 GHS =&gt; <?php echo e(to_fixed($conversion_rate["ghs_to_xof"])); ?> XOF <br/> <br/>
                        1 XOF =&gt; <?php echo e((to_fixed($conversion_rate["xof_to_ghs"], 3))); ?> GHS
                      </td>
                    <td>
                      <a href="<?php echo e(route('admin_transactions.edit',$transaction->id)); ?>" class="btn btn-success btn-sm btn-icon-text">
                        <i class="mdi mdi-pencil"></i>
                      </a>
                      <a href="<?php echo e(route('admin_transactions.show',$transaction->id)); ?>" class="btn btn-info btn-sm btn-icon-text">
                        <i class="mdi mdi-eye"></i>
                      </a>
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

<?php echo $__env->make('backend/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/m-transfert-laravel/resources/views/backend/pages/transactions/index.blade.php ENDPATH**/ ?>