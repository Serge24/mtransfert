<?php $__env->startSection("title", "Modification d'un utilsateur"); ?>

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
          <li class="breadcrumb-item active">
            <i class="fa fa-pencil-alt"></i>Paramètres
          </li>
        </ol>
      </div>
    </div>
  </div>

  <?php
    $transferAccounts = $setting->transfer_accounts;
  ?>

  <div class="row">
    <div class="col-lg-3 grid-margin stretcdh-card">
      <div class="card">
        <div class="card-body">
          <img src="<?php echo e(asset("images/logo.png")); ?>" alt="" height="180px" style="display:block; margin:auto">
        </div>
      </div>
    </div>

    <div class="col-lg-9 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <form class="forms-sample" action="<?php echo e(route('admin_settings.update')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <h6 style="margin-bottom:20px">
                <strong>Taux de change actuel</strong>
            </h6>
            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="val"> <strong>EQUIVALENCE 1 GHS -&gt; ? CFA </strong> </label>
                  <input type="text" value="<?php echo e($conversions["ghs_to_xof"]); ?>" autocomplete="new-password" class="form-control" name="conversions[ghs_to_xof]" id="val" placeholder="TAUX DE CHANGE">
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label for="val"><strong> EQUIVALENCE 1 CFA -&gt; ? GHS </strong></label>
                  <input type="text" value="<?php echo e($conversions["xof_to_ghs"]); ?>" autocomplete="new-password" class="form-control" name="conversions[xof_to_ghs]" id="val" placeholder="TAUX DE CHANGE">
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                    <label for="default_currency">DEVISE COURANTE</label>
                    <select class="form-control select2" name="default_currency" id="default_currency">
                        <option value="xof" <?php echo e(strtoupper($setting->default_currency) === 'XOF'? 'selected':''); ?>>XOF</option>
                        <option value="ghs" <?php echo e(strtoupper($setting->default_currency) === 'GHS'? 'selected':''); ?>>GHS</option>
                    </select>
                </div>
              </div>
            </div>
            <hr style="border-top: 2px dashed #bbb;"/>

            <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="transfer_accounts_tg">NUMÉRO DE TRANSFERT TOGO</label>
                  <input class="form-control" name="transfer_accounts[TG]" placeholder="NUMÉRO DE TRANSFERT TOGO" value="<?php echo e($transferAccounts["TG"] ?: ''); ?>" />
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label for="transfer_accounts_gh">NUMÉRO DE TRANSFERT GHANA</label>
                  <input class="form-control" name="transfer_accounts[GH]" placeholder="NUMÉRO DE TRANSFERT GHANA" value="<?php echo e($transferAccounts["GH"] ?: ''); ?>" />
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label for="transfer_accounts_bn">NUMÉRO DE TRANSFERT BÉNIN</label>
                  <input class="form-control" name="transfer_accounts[BN]" placeholder="NUMÉRO DE TRANSFERT BÉNIN" value="<?php echo e($transferAccounts["BN"] ?: ''); ?>" />
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

<?php echo $__env->make('backend/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/m-transfert-laravel/resources/views/backend/pages/settings.blade.php ENDPATH**/ ?>