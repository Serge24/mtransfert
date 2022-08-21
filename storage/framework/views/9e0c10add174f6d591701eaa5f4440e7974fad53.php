<?php $__env->startSection('title', 'Liste des utilisateurs'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <div class="row">
    <div class="col-sm-12 mb-4 mb-xl-0 grid-margin stretch-card" style="margin-left:10px; margin-bottom:25px">
      <h4 class="font-weight-bold text-dark">Liste des utilisateurs</h4>
    </div>
  </div>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        
        <p class="card-description text-right">
          <a href="<?php echo e(route('admin_users.create')); ?>" class="btn btn-info btn-icon-text">
            <i class="mdi mdi-plus btn-icon-prepend"></i>
            Ajouter
          </a>
        </p>
        <div class="table-responsive">
          <table class="table table-hover data-table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Genre</th>
                <th>N° Compte</th>
                <th>Type</th>
                <th>Etat</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td></td>
                  <td><?php echo e($user->name); ?></td>
                  <td><?php echo e($user->gender ==='F'?'Féminin':'Masculin'); ?></td>
                  <td><?php echo e($user->no_account); ?></td>
                  <?php if($user->role_level == 2): ?>
                      <td class="text-success" style="font-weight:bolder"> Admin</td>
                    <?php else: ?>
                      <?php if($user->role_level == 1): ?>
                        <td class="text-info" style="font-weight:bolder">Gest.</i></td>
                      <?php else: ?>
                        <td class="text-warning" style="font-weight:bolder">User</i></td>
                      <?php endif; ?>
                  <?php endif; ?>
                  <td>
                    <?php if($user->status === 'INACTIVE'): ?>
                      <label class="badge badge-danger" style="font-weight:bolder">INACTIF</label>
                    <?php else: ?>
                      <label class="badge badge-success" style="font-weight:bolder">ACTIF</label>
                    <?php endif; ?>
                  </td>
                  <td>
                    <a href="<?php echo e(route('admin_users.edit',$user)); ?>" class="btn btn-success btn-sm btn-icon-text">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <a href="<?php echo e(route('admin_users.show',$user)); ?>" class="btn btn-info btn-sm btn-icon-text">
                      <i class="mdi mdi-eye"></i>
                    </a>
                    <a href="<?php echo e(route('admin_users.destroy',$user)); ?>" class="btn btn-danger btn-sm btn-icon-text">
                      <i class="mdi mdi-trash-can"></i>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/m-transfert-laravel/resources/views/backend/pages/users/index.blade.php ENDPATH**/ ?>