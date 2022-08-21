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
            <a href="<?php echo e(route('admin_users.index')); ?>">
              <i class="fa fa-gift"></i> Utilisateurs
            </a>
          </li>
          <li class="breadcrumb-item active">
            <i class="fa fa-pencil-alt"></i><?php echo e($user->name); ?> &lt; <?php echo e($user->no_account); ?> &gt;
          </li>
        </ol>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-3 grid-margin stretcdh-card">
      <div class="card">
        <div class="card-body">
          <img src="/images/users/<?php echo e(($user->gender === 'M')?'male.png':'female.png'); ?>" alt="" height="180px" style="display:block; margin:auto">
          <table style="font-size:18px;margin-top:20px;">
            <tr>
              <td>Nom</td>
              <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
              <td><?php echo e($user->name); ?></td>
            </tr>
            <tr>
              <td>Numéro</td>
              <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
              <td><?php echo e($user->no_account); ?></td>
            </tr>
            <tr>
              <td>Sexe</td>
              <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
              <td><?php echo e(($user->gender === 'M')?'Homme':'Femme'); ?></td>
            </tr>
            <tr>
              <td>Type</td>
              <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
              <td><?php echo e(userinfo($user)->level); ?></td>
            </tr>
            <tr>
              <td>Etat</td>
              <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
              <td><?php echo e(($user->status === 'ACTIVE')?'Actif':'Innactif'); ?></td>
            </tr>
          </table>

          <a href="<?php echo e(route('admin_users.edit', $user)); ?>" class="btn btn-info" style="margin-top:15px; margin-left: auto; margin-right: auto; display: block">
            <i class="mdi mdi-pencil btn-icon-append"></i>
            Modifier
          </a>
        </div>
      </div>
    </div>

    <div class="col-lg-9 grid-margin stretch-card">
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
                    <td style="font-weight:bolder">
                      <?php
                          $conversion_rate = $transaction->computed_rate;
                      ?>
                      1 <?php echo e(strtoupper($conversion_rate["from"])); ?> =&gt; <?php echo e(to_fixed($conversion_rate["val"])); ?> <?php echo e(strtoupper($conversion_rate["to"])); ?> <br/> <br/>
                      1 <?php echo e(strtoupper($conversion_rate["to"])); ?> =&gt; <?php echo e((to_fixed(1/$conversion_rate["val"], 3))); ?> <?php echo e(strtoupper($conversion_rate["from"])); ?>

                    </td>
                    <td>
                      <a href="<?php echo e(route('admin_users.edit_transaction',["user_id"=>$user->id, "id"=>$transaction->id])); ?>" class="btn btn-success btn-sm btn-icon-text">
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

<?php echo $__env->make('backend/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/m-transfert-laravel/resources/views/backend/pages/users/show.blade.php ENDPATH**/ ?>