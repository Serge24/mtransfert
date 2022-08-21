<?php $__env->startSection("title", "Détails d'un point de transfert"); ?>

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
                                <i class="fa fa-gift"></i> Points de transfert
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <i class="fa fa-pencil-alt"></i>
                            <select onchange="navigateToPOT(this)" name="" id="" class="form-control">
                                <?php $__currentLoopData = $transfer_points; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e(($pot->id == $transfer_point->id)?"selected":""); ?> value="<?php echo e($pot->id); ?>">
                                        <?php echo e($pot->name); ?> &lt; <?php echo e($pot->contact); ?> &gt;
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 grid-margin stretcdh-card">
                <div class="card">
                    <div class="card-body">
                        <img src="<?php echo e(asset("images/logo.png")); ?>" alt="" height="180px"
                             style="display:block; margin:auto">
                        <table style="font-size:18px;margin-top:20px;">
                            <tr>
                                <td>Nom</td>
                                <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo e($transfer_point->name); ?></td>
                            </tr>
                            <tr>
                                <td>Contact</td>
                                <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo e($transfer_point->contact); ?></td>
                            </tr>
                            <tr>
                                <td>Pays</td>
                                <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo e($transfer_point->country->name); ?></td>
                            </tr>
                            <tr>
                                <td>Gestionnaire</td>
                                <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo e($transfer_point->owner->name); ?></td>
                            </tr>
                            <tr>
                                <td>Etat</td>
                                <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo e(($transfer_point->state === 'LOCAL')?'LOCAL':'DÉLOCALISÉ'); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 grid-margin stretcdh-card">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="pot-users-tab" data-toggle="tab" href="#pot-users"
                                   role="tab" aria-controls="pot-users" aria-selected="true">
                                    Liste des membres
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pot-transactions-tab" data-toggle="tab" href="#pot-transactions"
                                   role="tab" aria-controls="pot-transactions" aria-selected="false">
                                    Liste des transactions
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="pot-users" role="tabpanel"
                                 aria-labelledby="owned-transfer-point-tab">
                                <div class="table-responsive" style="margin-top: 10px">
                                    <table class="table table-hover data-table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nom</th>
                                            <th>Genre</th>
                                            <th>N° Compte</th>
                                            <th>Etat</th>
                                            <?php if(isset($canEdit)): ?>
                                                <th>Options</th>
                                            <?php endif; ?>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $transfer_point->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td></td>
                                                <td><?php echo e($user->name); ?></td>
                                                <td><?php echo e($user->gender ==='F'?'Féminin':'Masculin'); ?></td>
                                                <td><?php echo e($user->no_account); ?></td>
                                                <td>
                                                    <?php if($user->status === 'INACTIVE'): ?>
                                                        <label class="badge badge-danger" style="font-weight:bolder">INACTIF</label>
                                                    <?php else: ?>
                                                        <label class="badge badge-success" style="font-weight:bolder">ACTIF</label>
                                                    <?php endif; ?>
                                                </td>
                                                <?php if(isset($canEdit)): ?>
                                                    <td>
                                                        <a href="<?php echo e(route('admin_users.edit',$user)); ?>"
                                                           class="btn btn-success btn-sm btn-icon-text">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a href="<?php echo e(route('admin_users.show',$user)); ?>"
                                                           class="btn btn-info btn-sm btn-icon-text">
                                                            <i class="mdi mdi-eye"></i>
                                                        </a>
                                                        <a href="<?php echo e(route('admin_users.destroy',$user)); ?>"
                                                           class="btn btn-danger btn-sm btn-icon-text">
                                                            <i class="mdi mdi-trash-can"></i>
                                                        </a>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pot-transactions" role="tabpanel"
                                 aria-labelledby="other-transfer-point-tab">
                                <div class="table-responsive" style="margin-top: 10px">
                                    <table class="table table-hover data-table" data-order='[[0, "desc"]]'>
                                        <thead>
                                        <tr>
                                            <th>REF</th>
                                            <th>Expéditeur</th>
                                            <th>Destinataire</th>
                                            <th>Montant</th>
                                            <th>Etat</th>
                                            <th>Taux de change</th>
                                            <th>Options</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $status = "Envoyé";
                                            $color = "success";
                                        ?>
                                        <?php $__currentLoopData = $transfer_point->transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                <td data-order="<?php echo e($transaction->id); ?>"
                                                    style="font-weight:bolder"><?php echo e($transaction->ref); ?></td>
                                                <td><?php echo e($transaction->payer->name); ?></td>
                                                <td><?php echo e($transaction->payee->name); ?></td>
                                                <td align="right"
                                                    style="font-weight:bolder"><?php echo e($transaction->amount); ?> <?php echo e(strtoupper($transaction->currency["from"])); ?></td>
                                                <td>
                                                    <label class="badge badge-<?php echo e($color); ?>"><?php echo e($status); ?></label>
                                                </td>
                                                <td style="font-weight:bolder">
                                                    <?php
                                                        $conversion_rate = $transaction->computed_rate;
                                                    ?>
                                                    1 XOF =&gt; <?php echo e(strtoupper($conversion_rate["ghs_to_xof"])); ?> GHS<br/>
                                                    <br/>
                                                    1 GHS =&gt; <?php echo e(strtoupper($conversion_rate["xof_to_ghs"])); ?> XOF
                                                </td>
                                                <td>
                                                    <a href="<?php echo e(route('admin_transactions.edit',$transaction->id)); ?>"
                                                       class="btn btn-success btn-sm btn-icon-text">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>
                                                    <a href="<?php echo e(route('admin_transactions.show',$transaction->id)); ?>"
                                                       class="btn btn-info btn-sm btn-icon-text">
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
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        let detailsRoute = '<?php echo e(route("admin_transfer_points.show","__x__")); ?>';
        /*var tabEl = document.querySelector('button[data-bs-toggle="tab"]');
        tabEl.addEventListener('shown.bs.tab', function (event) {
            event.target // newly activated tab
            event.relatedTarget // previous active tab
        })*/

        function navigateToPOT(element){
            location.href = detailsRoute.replace("__x__",element.value);
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/m-transfert-laravel/resources/views/backend/pages/sale_points/show.blade.php ENDPATH**/ ?>