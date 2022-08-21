<?php $__env->startSection("title", "Modification d'une transaction"); ?>

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
            <a href="<?php echo e(isset($selectedUser)?route('admin_users.show',$selectedUser):route('admin_transactions.index')); ?>">
              <i class="fa fa-gift"></i> Transactions
            </a>
          </li>
          <li class="breadcrumb-item active">
            <i class="fa fa-pencil-alt"></i>REF#<?php echo e($transaction->ref); ?>

          </li>
        </ol>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-3 col-sm-12 grid-margin stretcdh-card">
      <div class="card">
        <div class="card-body">
            <?php
                $transaction_rate =  $transaction->computed_rate;
                $currency =  $transaction->currency;
                $status =  'Envoyé';
                $color =  'success';
                $validated =  false
            ?>

            <?php if($transaction->cancellation_reason !== null && strlen($transaction->cancellation_reason) > 0): ?>
                <?php
                    $status = 'Annulé';
                    $color = 'danger';
                ?>
            <?php else: ?>
                <?php if($transaction->is_validated == 1): ?>
                    <?php
                        $status = 'Envoyé';
                        $color = 'success';
                        $validated = true;
                    ?>
                <?php else: ?>
                    <?php
                        $status = 'En Attente';
                        $color = 'info';
                    ?>
                <?php endif; ?>
            <?php endif; ?>

          <img src='<?php echo e(asset("images/logo.png")); ?>' alt="" height="180px" class="img img-responsive img-thumbnail" style="display:block; margin:auto">
          <h6 style="font-weight:bolder; margin-top:15px; text-align:center">
            TAUX DE CONVERTION
          </h6>
          <table class="table" style="font-size:16px; font-weight:bolder">
              <tr>
                  <td>1 GHS </td>
                  <td>=&gt;</td>
                  <td><?php echo e(to_fixed($transaction_rate["ghs_to_xof"])); ?> XOF</td>
              </tr>
              <tr>
                  <td>1 XOF </td>
                  <td>=&gt;</td>
                  <td>
                      <?php echo e((to_fixed($transaction_rate["xof_to_ghs"], 3))); ?> GHS
                  </td>
              </tr>
          </table>
          <button data-toggle="modal" data-target="#attached_picture_modal" class="btn btn-primary" style="display:block; margin:auto">
            <i class="mdi mdi-image"></i>
            Preuve de transfert
          </button>

          <?php if($validated): ?>
            <button data-toggle="modal" data-target="#validation_picture_modal" class="btn btn-info" style="display:block; margin-left:auto; margin-right: auto; margin-top: 15px">
              <i class="mdi mdi-image"></i>
              Preuve de traitement
            </button>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="col-lg-9 col-sm-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <form class="forms-sample" enctype="multipart/form-data" method="POST" action="<?php echo e(route('admin_transactions.update', $transaction->id)); ?>">
            <p class="card-description text-right">
              <button type="submit" class="btn btn-success">
                <i class="fa fa-save btn-icon-prepend"></i>
                Sauvegarder
              </button>
            </p>

            <?php echo csrf_field(); ?>
            <div class="row" style="font-size: 18px">
              <h5>
                ETAT DE LA TRANSACTION : <label class="badge badge-<?php echo e($color); ?>"><?php echo e($status); ?></label>
              </h5>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="ref">RÉFÉRENCE <strong class="text-danger">(Non modifiable**)</strong></label>
                  <input type="text" class="form-control disabled" name="ref" id="ref" disabled value="<?php echo e("REF#".$transaction->ref); ?>">
                </div>
              </div>

              <div class="col-lg-6">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="form-group">
                      <label for="amount">MONTANT</label>
                      <input type="text" id="amount" class="form-control" name="amount" placeholder="Montant" value="<?php echo e($transaction->amount); ?>">
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="currency">DEVISE</label>
                      <select class="form-control select2 input-lg" name="currency[from]" id="transaction_currency" style="width:100%">
                        <option value="XOF" <?php echo e((strtoupper($currency["from"]) === "XOF")?'selected':''); ?>>XOF</option>
                        <option value="GHS" <?php echo e((strtoupper($currency["from"]) === "GHS")?'selected':''); ?>>GHS</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="payer_id">EXPÉDITEUR <strong class="text-danger">(Non modifiable**)</strong></label>
                  <select <?php echo e((isset($selectedUser) && ($selectedUser->id === $transaction->payer_id))?'disabled':''); ?> class="form-control select2 input-lg disabled" name="payer_id" id="payer_id" style="width:100%">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($user->id); ?>" <?php echo e(($user->id === $transaction->payer_id)?'selected':''); ?>><?php echo e($user->name); ?> (<?php echo e($user->no_account); ?>)</option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="payee_id">DESTINATAIRE</label>
                  <select <?php echo e((isset($selectedUser) && ($selectedUser->id === $transaction->payee_id))?'disabled':''); ?> class="form-control select2 input-lg" name="payee_id" id="payee_id" style="width:100%">
                    <?php $__currentLoopData = $payees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($payee->id); ?>" <?php echo e(($payee->id === $transaction->payee_id)?'selected':''); ?>><?php echo e($payee->name); ?> (<?php echo e($payee->no_account); ?>)</option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="validationPicture">PREUVE DE TRAITEMENT DE LA TRANSACTION</label>
              <input type="file" name="validationPicture" id="validationPicture" class="file-upload-default">
              <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled placeholder="Veuiller sélectionner une image">
                <span class="input-group-append">
                  <button class="file-upload-browse btn btn-info" type="button">
                    <i class="mdi mdi-image btn-icon-prepend"></i>
                    Téléverser
                  </button>
                </span>
              </div>
            </div>
            <div class="form-group">
              <label for="cancellation_reason">Raison d'annulation</label>
              <textarea placeholder="Motif d'annulation pour rejetter la transaction" class="form-control" id="cancellation_reason" name="cancellation_reason" rows="4"><?php echo e($transaction->cancellation_reason); ?></textarea>
            </div>
            <div class="form-check form-check-success">
              <label class="form-check-label" for="is_validated">
                <input type="checkbox" id="is_validated" name="is_validated" value="1" class="form-check-input" <?php echo e($validated?'checked':''); ?>>
                Valider cette transaction et marquer comme traitée
              </label>
            </div>
            <button type="submit" class="btn btn-success">
              <i class="fa fa-save btn-icon-prepend"></i>
              Sauvegarder
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="attached_picture_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="proofPictureLabel" aria-hidden="true">
  <form>
      <?php echo csrf_field(); ?>
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="proofPictureLabel">PREUVE DE TRANSFERT</h5>
              </div>
              <div class="modal-body">
                  <div class="row">
                    <img alt="Transaction#<?php echo e($transaction->ref); ?>" src='<?php echo e(asset("images/$transaction->proof_picture")); ?>' alt="" height="100%" width="100%" class="img img-responsive img-thumbnail" style="display:block; margin:auto">
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                      <i class="fa fa-ban"></i> Fermer
                  </button>
              </div>
          </div>
      </div>
  </form>
</div>

<?php if($validated): ?>
  <div id="validation_picture_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="validationPictureLabel" aria-hidden="true">
    <form>
        <?php echo csrf_field(); ?>
        <div class="modal-dialog modal-lg modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="validationPictureLabel">PREUVE DE TRAITEMENT</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                      <img src='<?php echo e(asset("images/$transaction->validation_picture")); ?>' alt="" height="100%" width="100%" class="img img-responsive img-thumbnail" style="display:block; margin:auto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                        <i class="fa fa-ban"></i> Fermer
                    </button>
                </div>
            </div>
        </div>
    </form>
  </div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script src="<?php echo e(asset("js/file-upload.js")); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/m-transfert-laravel/resources/views/backend/pages/transactions/edit.blade.php ENDPATH**/ ?>