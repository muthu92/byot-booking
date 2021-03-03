
<?php $__env->startSection('content'); ?>
<div class="card bg-secondary border-0 mb-0">
            
            <div class="card-body px-lg-5 py-lg-5 text-center">
            <img src="assets/img/logo.png" />
              <div class="text-center text-muted mb-4">
                <small>Admin Login</small>
              </div>
              <form role="form"  method="post" action="<?php echo e(url('/login/submit')); ?>">
               <?php if($errors->any()): ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <span class="alert-text"><?php echo e($error); ?></span>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
              <?php endif; ?>
			        <?php echo csrf_field(); ?>
					
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" name="email" placeholder="Email" type="email" value="<?php echo e(old('email')); ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" name="password" placeholder="Password" type="password">
                  </div>
                </div>
               
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Sign in</button>
                </div>
              </form>
            </div>
          </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('loginLayout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp7\htdocs\byot-booking\app\Modules/Login/Views/login.blade.php ENDPATH**/ ?>