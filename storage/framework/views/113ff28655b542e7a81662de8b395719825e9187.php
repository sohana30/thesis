

<?php $__env->startSection('content'); ?>
    <div class="profile-card" style="margin-top: 40px; margin-bottom: -20px;">
        <div class="image-container">
            <img src="<?php echo e(asset($profile->image)); ?>" width="100%">
            <div class="title" style="background-color: #1b1e21; padding: 10px; margin-left: -15px;">
                <h2><?php echo e($profile->fName); ?> <?php echo e($profile->lName); ?></h2>
            </div>
        </div>
        <div class="main-container">
            <p style="font-size: smaller;"><i class="fa fa-clock-o info"></i>
                <?php echo e(date('D - F, j, Y', strtotime($profile->updated_at))); ?> at
                <?php echo e(date('(h:i a)', strtotime($profile->updated_at))); ?>

            </p>
            <hr>
            <p>
                <div class="row">
                    <div class="col-md-1">
                        <i class="fa fa-mars info"></i>
                    </div>
                    <div class="col-md-10">
                        <?php echo e($profile->gender); ?>

                    </div>
                    <div class="col-md-1">
                        <a href="" data-toggle="modal" tabindex="-1" data-target="#editInfo">
                            <i class="fa fa-edit"></i>
                        </a>

                        <div class="modal fade" id="editInfo" tabindex="-1" role="dialog" aria-labelledby="editInfoTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <b class="modal-title" id="editInformationTitle">Edit User Information</b>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="form-group contacts" method="post" action="<?php echo e(route('editInfo', ['id' => $profile->id])); ?>" role="form" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label for="image" class="col-4 col-form-label">Picture(<span class="text-danger">*</span>):</label>
                                                <div class="col-md-6">
                                                    <div class="_5k_5">
                                                        <span class="_5k_4" datatype="selectors" id="u_0_19">
                                                            <span id="image">
                                                                <input type="file" name="image" accept="image/*">
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <img src="<?php echo e(asset($profile->image)); ?>" width="40" height="40">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="fName" class="col-4 col-form-label">First Name(<span class="text-danger">*</span>):</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control <?php echo e($errors->has('fName') ? ' is-invalid' : ''); ?>" name="fName" placeholder="First Name" value="<?php echo e($profile->fName); ?>" required>
                                                    <?php if($errors->has('fName')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong id="fNameValid"><?php echo e($errors->first('fName')); ?></strong>
                                                </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="lName" class="col-4 col-form-label">Last Name(<span class="text-danger">*</span>):</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control <?php echo e($errors->has('lName') ? ' is-invalid' : ''); ?>" name="lName" placeholder="Last Name" value="<?php echo e($profile->lName); ?>" required>
                                                    <?php if($errors->has('lName')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong id="lNameValid"><?php echo e($errors->first('lName')); ?></strong>
                                                </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="gender" class="col-4 col-form-label">Gender:</label>
                                                <div class="col-8">
                                                    <div class="_5k_5">
                                                        <span class="_5k_4" datatype="selectors" id="u_0_19">
                                                            <span id="gender">
                                                                <select class="_5dba" aria-label="Gender" title="Gender" name="gender" style="padding: 5px;">
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                    
                                                                </select>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="pNumber" class="col-4 col-form-label">Phone Number(<span class="text-danger">*</span>):</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control pNumber <?php echo e($errors->has('pNumber') ? ' is-invalid' : ''); ?>" name="pNumber" value="<?php echo e($profile->pNumber); ?>" placeholder="Phone Number" required>
                                                    <?php if($errors->has('pNumber')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong id="pNumberValid"><?php echo e($errors->first('pNumber')); ?></strong>
                                                </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="email" class="col-4 col-form-label">Email(<span class="text-danger">*</span>):</label>
                                                <div class="col-md-8">
                                                    <input type="email" class="form-control email <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" placeholder="Email" value="<?php echo e($profile->email); ?>" required>
                                                    <?php if($errors->has('email')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong id="emailValid"><?php echo e($errors->first('email')); ?></strong>
                                                </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="job" class="col-4 col-form-label">Department(<span class="text-danger">*</span>):</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control <?php echo e($errors->has('job') ? ' is-invalid' : ''); ?>" name="program" placeholder="Department" value="<?php echo e($profile->job); ?>" required>
                                                    <?php if($errors->has('program')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong id="jobValid"><?php echo e($errors->first('program')); ?></strong>
                                                </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="city" class="col-4 col-form-label">Country(<span class="text-danger">*</span>):</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control <?php echo e($errors->has('country') ? ' is-invalid' : ''); ?>" name="country" placeholder="City or Country" value="<?php echo e($profile->country); ?>" required>
                                                    <?php if($errors->has('city')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong id="cityValid"><?php echo e($errors->first('country')); ?></strong>
                                                </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="about" class="col-4 col-form-label">About(<span class="text-danger">*</span>):</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control <?php echo e($errors->has('about') ? ' is-invalid' : ''); ?>" name="about" placeholder="About Contact" required><?php echo e($profile->about); ?></textarea>
                                                    <?php if($errors->has('about')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong id="aboutValid"><?php echo e($errors->first('about')); ?></strong>
                                                </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-success">Update Information</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </p>
            <p><i class="fa fa-briefcase info"></i> <?php echo e($profile->job); ?></p>
            <p><i class="fa fa-home info"></i> <?php echo e($profile->city); ?></p>
            <p>
                <div class="row">
                    <div class="col-md-1">
                        <i class="fa fa-envelope info"></i>
                    </div>
                    <div class="col-md-11">
                        <?php echo e($profile->email); ?>

                        
                    </div>
                </div>
            </p>
            <p><i class="fa fa-phone info"></i> <?php echo e($profile->pNumber); ?>

                
            </p>
            <p>
                <div class="row">
                    <div class="col-md-1">
                        <i class="fa fa-info info"></i>
                    </div>
                    <div class="col-md-11">
                        <?php echo e($profile->about); ?>

                    </div>
                </div>
            </p>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/Sohana/Desktop/Sohana_Thesis/resources/views/profile.blade.php ENDPATH**/ ?>