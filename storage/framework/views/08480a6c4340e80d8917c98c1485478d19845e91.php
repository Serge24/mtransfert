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
              <td><?php echo e(($user->is_manager_acc === 1)?'Admin':'User'); ?></td>
            </tr>
            <tr>
              <td>Etat</td>
              <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
              <td><?php echo e(($user->status === 'ACTIVE')?'Actif':'Innactif'); ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <div class="col-lg-9 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <form class="forms-sample" action="<?php echo e(route('admin_users.update', $user)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="name">Nom complet</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Nom complet" value="<?php echo e($user->name); ?>"/>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="form-group">
                  <label for="no_account">Numéro de compte</label>
                  <input type="no_account" name="no_account" class="form-control" id="no_account" autocomplete="new-password" placeholder="Numéro de compte" value="<?php echo e($user->no_account); ?>">
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label for="role_level">Type d'utilisateur</label>
                  <select name="role_level" id="role_level" class="form-control select2">
                    <option value="0" <?php echo e(($user->role_level==='0')?'selected':''); ?>>User</option>
                    <option value="1" <?php echo e(($user->role_level==='1')?'selected':''); ?>>Gestionnaire</option>
                    <option value="2" <?php echo e(($user->role_level==='2')?'selected':''); ?>>Administrateur</option>
                  </select>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label for="locale">Langue</label>
                  <select name="locale" id="locale" class="form-control select2">
                    <option value="fr_FR" <?php echo e(($user->locale==='fr_FR')?'selected':''); ?>>Français</option>
                    <option value="en_EN" <?php echo e(($user->locale==='en_EN' || !$user->locale)?'selected':''); ?>>Anglais</option>
                  </select>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label for="gender">Sexe</label>
                  <select name="gender" id="gender" class="form-control select2">
                    <option value="M" <?php echo e(($user->gender==='M')?'selected':''); ?>>Masculin</option>
                    <option value="F" <?php echo e(($user->gender==='F')?'selected':''); ?>>Feminin</option>
                  </select>
                </div>
              </div>

              <div class="col-lg-12">
                <div class="form-group">
                  <label for="login">Login</label>
                  <input type="text" class="form-control" name="login" id="login" placeholder="Login" value="<?php echo e($user->login); ?>">
                </div>
              </div>

              <div class="col-lg-12">
                <div class="form-group">
                  <label for="password">Mot de passe  <strong class="text-danger">(Veuiller laisser si inchangé)</strong></label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password"/>
                </div>
              </div>

              <div class="col-lg-12">
                <div class="form-group">
                  <label for="passwordConfirm">Confirmer le mot de passe</label>
                  <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm" placeholder="Password"/>
                </div>
              </div>

              <div class="col-lg-12">
                <div class="form-check form-check-flat form-check-success">
                  <label class="form-check-label" for="status">
                    <input type="checkbox" name="status" id="status" value="ACTIVE" class="form-check-input" <?php echo e(($user->status==='ACTIVE')?'checked':''); ?> />
                    Laisser ce compte actif
                  </label>
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

<?php echo $__env->make('backend/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/m-transfert-laravel/resources/views/backend/pages/users/edit.blade.php ENDPATH**/ ?>