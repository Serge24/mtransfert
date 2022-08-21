<?php $__env->startSection('title', "Détails d'une transaction"); ?>

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
                        <li class="breadcrumb-item active">
                            <i class="fa fa-pencil-alt"></i>REF#<?php echo e($transaction->ref); ?>

                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 grid-margin stretcdh-card">
                <div class="card">
                    <div class="card-body">
                        <?php
                            $transaction_rate = $transaction->computed_rate;
                            $currency = $transaction->currency;
                            $status = 'Envoyé';
                            $color = 'success';
                            $validated = $transaction->isValidated == 1 && ($transaction->cancellation_reason == null || strlen($transaction->cancellation_reason) <= 0);
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
                                ?>
                            <?php else: ?>
                                <?php
                                    $status = 'En Attente';
                                    $color = 'info';
                                ?>
                            <?php endif; ?>
                        <?php endif; ?>

                        <img src="/images/logo.png" alt="" height="180px" class="img img-responsive img-thumbnail"
                            style="display:block; margin:auto">
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
                        <button data-toggle="modal" data-target="#attached_picture_modal" class="btn btn-primary"
                            style="display:block; margin:auto">
                            <i class="mdi mdi-image"></i>
                            Preuve de transfert
                        </button>

                        <?php if($validated): ?>
                            <button data-toggle="modal" data-target="#validation_picture_modal" class="btn btn-info"
                                style="display:block; margin-left:auto; margin-right: auto; margin-top: 15px">
                                <i class="mdi mdi-image"></i>
                                Preuve de traitement
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-description text-right">
                            <a href="<?php echo e(route('admin_transactions.edit', $transaction)); ?>" class="btn btn-info">
                                <i class="mdi mdi-pencil btn-icon-append"></i>
                                Modifier
                            </a>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordereds">
                                <tr>
                                    <td>REF</td>
                                    <td>#<?php echo e($transaction->ref); ?></td>
                                </tr>
                                <tr>
                                    <td>MONTANT ENVOYÉ</td>
                                    <td><?php echo e($transaction->amount); ?> <?php echo e(strtoupper($currency['from'])); ?></td>
                                </tr>
                                <tr>
                                    <td>MONTANT À RECEVOIR</td>
                                    <td><?php echo e($transaction->amount); ?> <?php echo e(strtoupper($currency['to'])); ?></td>
                                </tr>
                                <tr>
                                    <td>EXPÉDITEUR</td>
                                    <td><?php echo e(strtoupper($transaction->payer->name)); ?>

                                        <strong>&lt;<?php echo e($transaction->payer->no_account); ?>&gt;</strong></td>
                                </tr>
                                <tr>
                                    <td>DESTINATIARE</td>
                                    <td><?php echo e(strtoupper($transaction->payee->name)); ?>

                                        <strong>&lt;<?php echo e($transaction->payee->no_account); ?>&gt;</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ETAT</td>
                                    <td>
                                        <?php
                                            if ($transaction->cancellation_reason !== null && strlen($transaction->cancellation_reason) > 0) {
                                                $status = 'Annulé';
                                                $color = 'danger';
                                            } elseif ($transaction->isValidated == 1) {
                                                $status = 'Envoyé';
                                                $color = 'success';
                                            } else {
                                                $status = 'En Attente';
                                                $color = 'info';
                                            }
                                        ?>
                                        <label class="badge badge-<?php echo e($color); ?>"><?php echo e($status); ?></label>
                                    </td>
                                </tr>

                                <?php if($transaction->cancellation_reason !== null && strlen($transaction->cancellation_reason) > 0): ?>
                                    <tr>
                                        <td>RAISON D'ANNULATION</td>
                                        <td class="text-danger" style="font-weight:bolder">
                                            <?php echo e($transaction->cancellation_reason); ?>

                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <td>TAUX DE CONVERTION</td>
                                    <td style="font-weight:bolder">
                                        1 GHS =&gt; <?php echo e(to_fixed($transaction_rate["ghs_to_xof"])); ?> XOF
                                        <br /> <br />
                                        1 XOF =&gt; <?php echo e(to_fixed($transaction_rate["xof_to_ghs"])); ?> GHS
                                    </td>
                                </tr>
                                <tr>
                                    <td>DATE DE TRANSACTION</td>
                                    <td style="font-weight:bolder">
                                        <?php echo e($transaction->created_at); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>IMAGE JOINTE</td>
                                    <td>
                                        <img style="border-radius:0 !important;display: block; max-width: 100%; max-height: 100%; width: auto; height: auto;"
                                            src="<?php echo e(asset("images/$transaction->proof_picture")); ?>" alt="" height="400px"
                                            width="300px">
                                    </td>
                                </tr>
                                <tr>
                                    <td>IMAGE APRÈS TRAITEMENT</td>
                                    <?php if($transaction->validationPicture): ?>
                                        <td>
                                            <img style="border-radius:0 !important;display: block; max-width: 100%; max-height: 100%; width: auto; height: auto;"
                                                src="<?php echo e(asset("images/$transaction->validation_picture")); ?>" alt="" height="400px"
                                                width="300px">
                                        </td>
                                    <?php else: ?>
                                        <td style="text-danger">
                                            <strong>
                                                <?php if($transaction->isValidated): ?>
                                                    Aucune image attachée
                                                <?php else: ?>
                                                    Transaction non traité
                                                <?php endif; ?>
                                            </strong>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            </table>

                            <div style="margin-top:10px">
                                <a href="<?php echo e(route('admin_transactions.edit', $transaction)); ?>" class="btn btn-info">
                                    <i class="mdi mdi-pencil btn-icon-append"></i>
                                    Modifier
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="attached_picture_modal" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="proofPictureLabel" aria-hidden="true">
        <form>
            <?php echo csrf_field(); ?>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="proofPictureLabel">PREUVE DE TRANSFERT</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <img alt="Preuve transfert N#<?php echo e($transaction->ref); ?>" src='<?php echo e(asset("images/$transaction->proof_picture")); ?>' alt="" height="100%" width="100%"
                                class="img img-responsive img-thumbnail" style="display:block; margin:auto">
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
        <div id="validation_picture_modal" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="validationPictureLabel" aria-hidden="true">
            <form>
                <?php echo csrf_field(); ?>
                <div class="modal-dialog modal-lg modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="validationPictureLabel">PREUVE DE TRAITEMENT</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <img src="/images/<?php echo e($transaction->validationPicture); ?>" alt="" height="100%" width="100%"
                                    class="img img-responsive img-thumbnail" style="display:block; margin:auto">
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

<?php echo $__env->make('backend/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/m-transfert-laravel/resources/views/backend/pages/transactions/show.blade.php ENDPATH**/ ?>