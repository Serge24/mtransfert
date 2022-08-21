<?php $__env->startSection('title', "Modification d'un utilsateur"); ?>

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
                            <i class="fa fa-pencil-alt"></i>Création d'un utilisateur
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 grid-margin stretcdh-card">
                <div class="card">
                    <div class="card-body">
                        <img src="/images/users/male.png" alt="" height="180px" style="display:block; margin:auto">
                    </div>
                </div>
            </div>

            <div class="col-lg-9 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" action="<?php echo e(route('admin_users.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Nom complet</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Nom complet" />
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="no_account">Numéro de compte</label>
                                        <input type="no_account" name="no_account" class="form-control" id="no_account"
                                            autocomplete="new-password" placeholder="Numéro de compte">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="sale_point_id">Point de transfert associé</label>
                                        <select name="sale_point_id" id="sale_point_id" class="form-control select2">
                                            <option value="-1">TOUS LES POINTS</option>
                                            <?php $__currentLoopData = $sale_points; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($point->id); ?>"><?php echo e(strtoupper($point->name)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="role_level">Type d'utilisateur</label>
                                        <select name="role_level" id="role_level" class="form-control select2">
                                            <option value="0">User</option>
                                            <option value="1">Gestionnaire</option>
                                            <option value="2">Administrateur</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="locale">Langue</label>
                                        <select name="locale" id="locale" class="form-control select2">
                                            <option value="fr_FR">Français</option>
                                            <option value="en_EN">Anglais</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="gender">Sexe</label>
                                        <select name="gender" id="gender" class="form-control select2">
                                            <option value="M">Masculin</option>
                                            <option value="F">Feminin</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="login">Login</label>
                                        <input type="text" autocomplete="new-password" class="form-control"
                                            name="login" id="login" placeholder="Login">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="password">Mot de passe</label>
                                        <input type="password" autocomplete="new-password" class="form-control"
                                            name="password" id="password" placeholder="Password" />
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="passwordConfirm">Confirmer le mot de passe</label>
                                        <input type="password" autocomplete="new-password" class="form-control"
                                            name="passwordConfirm" id="passwordConfirm" placeholder="Password" />
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-check form-check-flat form-check-success">
                                        <label class="form-check-label" for="status">
                                            <input type="checkbox" name="status" id="status" value="ACTIVE"
                                                class="form-check-input" checked />
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

<?php echo $__env->make('backend/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/m-transfert-laravel/resources/views/backend/pages/users/create.blade.php ENDPATH**/ ?>