
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>MTransfert | Login</title>
  <link rel="stylesheet" href="<?php echo e(asset('vendors/mdi/css/materialdesignicons.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('vendors/feather/feather.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('vendors/base/vendor.bundle.base.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
  <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.png')); ?>" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <h4>MTransfert</h4>

              <?php if(session()->has('error') || session()->has('message')): ?>
                <div style="background: #f4f7fa; width: 100%; -webkit-flex-grow: 1; flex-grow: 1;">
                    <?php if(session()->has('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top:20px;">
                            <h5 class="text-danger">Attention !</h5>
                            <p><?php echo session()->get('error'); ?></p>
                            <button type="button" class="btn btn-sm btn-close btn-danger" data-dismiss="alert" aria-label="Close">
                                Fermer
                            </button>
                        </div>
                        <?php Session::forget("error"); ?>
                    <?php elseif(session()->has('message')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top:20px;">
                            <h5 class="text-success">Félicitations !</h5>
                            <p><?php echo session()->get('message'); ?></p>
                            <button type="button" class="btn btn-sm btn-close btn-success" data-dismiss="alert" aria-label="Close">
                                Fermer
                            </button>
                        </div>
                        <?php session()->forget('message'); ?>
                    <?php endif; ?>
                </div>
              <?php endif; ?>

              <h6 class="font-weight-light">Veuillez-vous connecter pour continuer</h6>
              <form class="pt-3" method="POST" action="<?php echo e(route('request_login')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                  <label for="login">Identifiant</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" autocomplete="new-password" class="form-control form-control-lg border-left-0" name="login" id="login" placeholder="Identifiant">
                  </div>
                </div>

                <div class="form-group">
                  <label for="password">Mot de passe</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" autocomplete="new-password" class="form-control form-control-lg border-left-0" name="password" id="password" placeholder="Mot de passe">
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" name="remember_token">
                      Rester connecté
                    </label>
                  </div>
                </div>
                <div class="my-3">
                  <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">
                    Connexion
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">
              Copyright MTransfert © 2021-<?php echo e(now()->format("Y")); ?> | Tout droits réservés
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo e(asset('vendors/base/vendor.bundle.base.js')); ?>"></script>
  <script src="<?php echo e(asset('js/off-canvas.js')); ?>"></script>
  <script src="<?php echo e(asset('js/hoverable-collapse.js')); ?>"></script>
  <script src="<?php echo e(asset('js/template.js')); ?>"></script>
</body>

</html>
<?php /**PATH /var/www/html/m-transfert-laravel/resources/views/backend/pages/auth/login.blade.php ENDPATH**/ ?>