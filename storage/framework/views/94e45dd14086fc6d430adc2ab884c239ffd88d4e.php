<?php $__env->startSection('title',"Add Employee"); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('back-end/css/bootstrap-fileinput-4.4.7.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<main class="app-content">
		<div class="app-title">
	        <ul class="app-breadcrumb breadcrumb side">
	          	<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
	          	<li class="breadcrumb-item"><?php echo e(__('item.employee')); ?></li>
	          	<li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.edit_employee')); ?></a></li>
	        </ul>
      	</div>
        <div class="col-lg-12">
            <?php echo $__env->make('flash/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          	<div class="panel-body bg-white rounded overflow_hidden p-4">
          		<h3 class="text-dark mb-4"><?php echo e(__('item.edit_employee')); ?></h3><hr/>

                <form action="<?php echo e(route('updateEmployee', $employee->id)); ?>" method="POST" class="row form-horizontal" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <!-- First name -->
                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('first_name') ? ' has-error' : ''); ?>">
                        <label for="first_name" class="control-label col-lg-3 p-0"><?php echo e(__('item.first_name')); ?><span class="required">*</span> </label>
                        <div class="col-lg-9 p-0">
                            <input type="text" name="first_name" class="form-control" value="<?php echo e(old('first_name')?old('first_name'): $employee->first_name); ?>" required autofocus>
                            <?php if($errors->has('first_name')): ?>
    	                        <span class="help-block text-danger">
    	                            <strong><?php echo e($errors->first('first_name')); ?></strong>
    	                        </span> 
    	                    <?php endif; ?>
                        </div>
                    </div>
                    <!-- Lastname -->
                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('last_name') ? ' has-error' : ''); ?>">
                        <label for="lastname" class="control-label col-lg-3 p-0"><?php echo e(__('item.last_name')); ?><span class="required">*</span></label>
                        <div class="col-lg-9 p-0">
                            <input type="text" name="last_name" class="form-control" value="<?php echo e(old('last_name')?old('last_name'):$employee->last_name); ?>" required>
                            <?php if($errors->has('last_name')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('last_name')); ?></strong>
                                </span> 
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- Position -->
                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('id_card') ? ' has-error' : ''); ?>">
                        <label for="position" class="control-label col-lg-3 p-0"><?php echo e(__('item.id_card')); ?><span class="required">*</span> </label>
                        <div class="col-lg-9 p-0">
                            <input type="text" name="id_card" class="form-control" value="<?php echo e(old('id_card')?old('id_card'):$employee->id_card); ?>" required>
                            <?php if($errors->has('id_card')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('id_card')); ?></strong>
                                </span> 
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Salary -->
                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('salary') ? ' has-error' : ''); ?>">
                        <label for="position" class="control-label col-lg-3 p-0"><?php echo e(__('item.salary')); ?> : </label>
                        <div class="col-lg-9 p-0">
                            <input type="text" name="salary" class="form-control" value="<?php echo e(old('salary')?old('salary'):$employee->salary); ?>">
                            <?php if($errors->has('salary')): ?>
                                <span class="help-block text-danger">
                                <strong><?php echo e($errors->first('salary')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    
                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('position') ? ' has-error' : ''); ?>">
                        <label for="position" class="control-label col-lg-3 p-0"><?php echo e(__('item.position')); ?><span class="required">*</span> </label>
                        <div class="col-lg-9 p-0">
                            <div class="input-group mb-3">
                                <?php echo e(Form::select('position', $position, $employee->position_id ?? '', ['class' => 'form-control', 'id' => 'select-position', 'required'] )); ?>

                              <div class="input-group-prepend">
                                <label class="input-group-text input-group-text-position" for="position"><i class="fa fa-plus"></i></label>
                              </div>
                            </div>
                            <?php if($errors->has('position')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('position')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    
                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('department') ? ' has-error' : ''); ?>">
                        <label for="department" class="control-label col-lg-3 p-0"><?php echo e(__('item.department')); ?><span class="required">*</span> </label>
                        <div class="col-lg-9 p-0">
                            <div class="input-group mb-3">
                                <?php echo e(Form::select('department', $department, $employee->department_id ?? '', ['class' => 'form-control', 'id' => 'select-department', 'required'] )); ?>

                              <div class="input-group-prepend">
                                <label class="input-group-text input-group-text-department" for="department"><i class="fa fa-plus"></i></label>
                              </div>
                            </div>
                            <?php if($errors->has('department')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('department')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>


                    <!-- Age -->
                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('age') ? ' has-error' : ''); ?>">
                        <label for="age" class="control-label col-lg-3 p-0"><?php echo e(__('item.age')); ?> </label>
                        <div class="col-lg-9 p-0">
                            <input type="number" name="age" class="form-control" value="<?php echo e(old('age')?old('age'):$employee->age); ?>" min="0" max="100">
                            <?php if($errors->has('age')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('age')); ?></strong>
                                </span> 
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- Sex -->
                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('sex') ? ' has-error' : ''); ?>">
                        <label for="sex" class="control-label col-lg-3 p-0"><?php echo e(__('item.sex')); ?></label>
                        <div class="col-lg-9 p-0">
                            <select class="form-control" name="sex">
                            <option value="">-- <?php echo e(__('item.select')); ?> --</option>
                            <option value="1" <?php echo e(old("sex") ==1? "selected":($employee->sex==1?"selected":"")); ?>><?php echo e(__('item.male')); ?></option>
                            <option value="2" <?php echo e(old("sex") ==2? "selected":($employee->sex==2?"selected":"")); ?>><?php echo e(__('item.female')); ?></option>
                        </select>
                            <?php if($errors->has('sex')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('sex')); ?></strong>
                                </span> 
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- Country -->
                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('country') ? ' has-error' : ''); ?>">
                        <label for="department" class="control-label col-lg-3 p-0"><?php echo e(__('item.country')); ?><span class="required">*</span></label>
                        <div class="col-lg-9 p-0">
                            <select name="country" class="form-control" required>
                                <option value="">-- <?php echo e(__('item.select')); ?> --</option>
                                <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>" <?php echo e(old("country") == $value->id?"selected":($employee->country_id == $value->id ?"selected":"")); ?>><?php echo e($value->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('country')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('country')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- Nationality -->
                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('nationality') ? ' has-error' : ''); ?>">
                        <label for="nationality" class="control-label col-lg-3 p-0"><?php echo e(__('item.nationality')); ?></label>
                        <div class="col-lg-9 p-0">
                            <input type="text" name="nationality" class="form-control" value="<?php echo e(old('nationality')?old('nationality'):$employee->nationality); ?>">
                            <?php if($errors->has('nationality')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('nationality')); ?></strong>
                                </span> 
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('sale_type') ? ' has-error' : ''); ?>">
                        <label for="sale_type" class="control-label col-lg-3 p-0"><?php echo e(__('item.sale_type')); ?><span class="required">*</span> </label>
                        <div class="col-lg-1 p-0 text-center">
                         <input type="checkbox" name="check_sale" id="check_sale" class="checkbox"/>
                        </div>
                        <div class="col-lg-8 p-0">
                            <div class="input-group mb-3">
                                <?php echo e(Form::select('sale_type', $sale_type, $employee->sale_type, ['class' => 'form-control select-sale-type', 'required', 'id' => 'sale_type', 'disabled'] )); ?>

                              <div class="input-group-prepend">
                                <label class="input-group-text input-group-text-sale_type" for="sale_type"><i class="fa fa-plus"></i></label>
                              </div>
                            </div>
                            <?php if($errors->has('sale_type')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('sale_type')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('identity') ? ' has-error' : ''); ?>">
                        <label for="identity" class="control-label col-lg-3 p-0"><?php echo e(__('item.identity_number')); ?><span class="required">*</span> </label>
                        <div class="col-lg-9 p-0">
                            <input type="text" name="identity" class="form-control" value="<?php echo e(old('identity')?old('identity'):$employee->identity); ?>" required>
                            <?php if($errors->has('identity')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('identity')); ?></strong>
                                </span> 
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('dob') ? ' has-error' : ''); ?>">
                        <label for="fax" class="control-label col-lg-3 p-0"><?php echo e(__('item.dob')); ?> : </label>
                        <div class="col-lg-9 p-0">
                            <input type="date" name="dob" class="form-control dateISO" value="<?php echo e(old("dob")); ?>">
                            <?php if($errors->has('dob')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('dob')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>                    
                    
                    <!-- Place of Birth -->
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <h5><?php echo e(__('item.pob')); ?></h5>
                            <hr>
                        </div>
                    </div>
                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('pob_province') ? ' has-error' : ''); ?>">
                        <label for="pob_province" class="control-label col-lg-3 p-0"><?php echo e(__('item.province')); ?></label>
                        <div class="col-lg-9 p-0">
                            <select name="pob_province" class="form-control" id="pob_province">
                                <option value=>-- <?php echo e(__('item.select')); ?> --</option>
                                <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->province_id); ?>" <?php if($value->province_id==$employee->pob_province): ?> selected <?php endif; ?>><?php echo e($value->province_kh_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('pob_province')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('pob_province')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('pob_district') ? ' has-error' : ''); ?>">
                        <label for="pob_district" class="control-label col-lg-3 p-0"><?php echo e(__('item.district')); ?></label>
                        <div class="col-lg-9 p-0">
                            <select name="pob_district" class="form-control" id="pob_district" <?php if(!$employee->pob_district): ?> disabled <?php endif; ?>>
                                <option value=>-- <?php echo e(__('item.select')); ?> --</option>
                                <?php $__currentLoopData = $pob_districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->dis_id); ?>" <?php if($value->dis_id==$employee->pob_district): ?> selected <?php endif; ?>><?php echo e($value->district_namekh); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('pob_district')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('pob_district')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('pob_commune') ? ' has-error' : ''); ?>">
                        <label for="pob_commune" class="control-label col-lg-3 p-0"><?php echo e(__('item.commune')); ?></label>
                        <div class="col-lg-9 p-0">
                            <select name="pob_commune" class="form-control" id="pob_commune" <?php if(!$employee->pob_commune): ?> disabled <?php endif; ?>>
                                <option value=>-- <?php echo e(__('item.select')); ?> --</option>
                                <?php $__currentLoopData = $pob_communes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->com_id); ?>" <?php if($value->com_id==$employee->pob_commune): ?> selected <?php endif; ?>><?php echo e($value->commune_namekh); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('pob_commune')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('pob_commune')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('pob_village') ? ' has-error' : ''); ?>">
                        <label for="pob_village" class="control-label col-lg-3 p-0"><?php echo e(__('item.village')); ?></label>
                        <div class="col-lg-9 p-0">
                            <select name="pob_village" class="form-control" id="pob_village" <?php if(!$employee->pob_village): ?> disabled <?php endif; ?>>
                                <option value=>-- <?php echo e(__('item.select')); ?> --</option>
                                <?php $__currentLoopData = $pob_villages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->vill_id); ?>" <?php if($value->vill_id==$employee->pob_village): ?> selected <?php endif; ?>><?php echo e($value->village_namekh); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('pob_village')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('pob_village')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- Contact -->
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <h5>Contact</h5>
                            <hr>
                        </div>
                    </div>
                    <!-- Phone1 -->
                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('phone1') ? ' has-error' : ''); ?>">
                        <label for="phone1" class="control-label col-lg-3 p-0"><?php echo e(__('item.phone1')); ?><span class="required">*</span></label>
                        <div class="col-lg-9 p-0">
                            <input type="text" name="phone1" class="form-control" value="<?php echo e(old('phone1')?old('phone1'):$employee->phone1); ?>" required>
                            <?php if($errors->has('phone1')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('phone1')); ?></strong>
                                </span> 
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Phone2 -->
                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('phone2') ? ' has-error' : ''); ?>">
                        <label for="phone1" class="control-label col-lg-3 p-0"><?php echo e(__('item.phone2')); ?></label>
                        <div class="col-lg-9 p-0">
                            <input type="text" name="phone2" class="form-control" value="<?php echo e(old('phone2')?old('phone2'):$employee->phone2); ?>">
                            <?php if($errors->has('phone2')): ?>
                                <span class="help-block text-danger">
                                <strong><?php echo e($errors->first('phone2')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <label for="email" class="control-label col-lg-3 p-0"><?php echo e(__('item.email')); ?><span class="required">*</span></label>
                        <div class="col-lg-9 p-0">
                            <input type="email" name="email" class="form-control" value="<?php echo e(old('email')?old('email'):$employee->email); ?>" required>
                            <?php if($errors->has('email')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span> 
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- Fax -->
                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('fax') ? ' has-error' : ''); ?>">
                        <label for="fax" class="control-label col-lg-3 p-0"><?php echo e(__('item.fax')); ?></label>
                        <div class="col-lg-9 p-0">
                            <input type="text" name="fax" class="form-control" value="<?php echo e(old('fax')?old('fax'):$employee->fax); ?>">
                            <?php if($errors->has('fax')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('fax')); ?></strong>
                                </span> 
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <h5><?php echo e(__('item.address')); ?></h5>
                            <hr>
                        </div>
                    </div>
                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('province') ? ' has-error' : ''); ?>">
                        <label for="province" class="control-label col-lg-3 p-0"><?php echo e(__('item.province')); ?><span class="required">*</span></label>
                        <div class="col-lg-9 p-0">
                            <select name="province" class="form-control" id="province" required>
                                <option value=>-- <?php echo e(__('item.select')); ?> --</option>
                                <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->province_id); ?>" <?php if($value->province_id==$employee->province): ?> selected <?php endif; ?>><?php echo e($value->province_kh_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('province')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('province')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('district') ? ' has-error' : ''); ?>">
                        <label for="district" class="control-label col-lg-3 p-0"><?php echo e(__('item.district')); ?><span class="required">*</span></label>
                        <div class="col-lg-9 p-0">
                            <select name="district" class="form-control" id="district" required <?php if(!$employee->district): ?> disabled <?php endif; ?>>
                                <option value=>-- <?php echo e(__('item.select')); ?> --</option>
                                <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->dis_id); ?>" <?php if($value->dis_id==$employee->district): ?> selected <?php endif; ?>><?php echo e($value->district_namekh); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('district')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('district')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('commune') ? ' has-error' : ''); ?>">
                        <label for="commune" class="control-label col-lg-3 p-0"><?php echo e(__('item.commune')); ?><span class="required">*</span></label>
                        <div class="col-lg-9 p-0">
                            <select name="commune" class="form-control" id="commune" required <?php if(!$employee->commune): ?> disabled <?php endif; ?>>
                                <option value=>-- <?php echo e(__('item.select')); ?> --</option>
                                <?php $__currentLoopData = $communes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->com_id); ?>" <?php if($value->com_id==$employee->commune): ?> selected <?php endif; ?>><?php echo e($value->commune_namekh); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('commune')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('commune')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('village') ? ' has-error' : ''); ?>">
                        <label for="village" class="control-label col-lg-3 p-0"><?php echo e(__('item.village')); ?><span class="required">*</span></label>
                        <div class="col-lg-9 p-0">
                            <select name="village" class="form-control" id="village" required <?php if(!$employee->village): ?> disabled <?php endif; ?>>
                                <option value=>-- <?php echo e(__('item.select')); ?> --</option>
                                <?php $__currentLoopData = $villages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->vill_id); ?>" <?php if($value->vill_id==$employee->village): ?> selected <?php endif; ?>><?php echo e($value->village_namekh); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('village')): ?>
                                <span class="help-block text-danger">
                                    <strong><?php echo e($errors->first('village')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Profile -->
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <h5>Profile Image</h5>
                            <hr>
                        </div>
                    </div>
                    <div class="col-lg-6 form-group d-lg-flex align-items-center<?php echo e($errors->has('profile') ? ' has-error' : ''); ?>">
                        <label for="profile" class="control-label col-lg-3 p-0"><?php echo e(__('item.profile')); ?> : </label>
                        <div class="col-lg-9 p-0">
                            <input id="profile" type="file" name="profile" class="form-control" value="<?php echo e(old('profile')); ?>" accept=".jpg,.jpeg,.png">
                            <?php if($errors->has('profile')): ?>
                                <span class="help-block text-danger">
                                <strong><?php echo e($errors->first('profile')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- Submit Form -->
                    <div class="col-lg-12">
                        <input type="submit" value="<?php echo e(__('item.save')); ?>" name="btnSave" class="btn btn-primary float-right">
                    </div>
                </form>
            </div>
        </div>

	</main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('back-end/js/plugins/bootstrap-fileinput-4.4.7.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('back-end/js/plugins/bootstrap-fileinput-4.4.7-fa-theme.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('back-end/js/initFileInput.js')); ?>"></script>
    <script type="text/javascript">
        $('#select-department ,#country ,#province, #district, #commune, #village, #pob_province, #pob_district, #pob_commune, #pob_village').select2();
        $(document).ready(function() {
            callFileInput('#profile', 1, 5120, ["jpg" , "jpeg" , "png"]);

            $("#check_sale").click(function() {
                // this function will get executed every time the #home element is clicked (or tab-spacebar changed)
                if($(this).is(":checked")) // "this" refers to the element that fired the event
                {
                    $("#sale_type").removeAttr('disabled');
                }else{
                    $("#sale_type").val("").trigger("change");
                    $("#sale_type").attr('disabled', 'disabled');
                }
            });
        }); 

        $(document).on('change', '#province', function(){
            $('#village').html("<option value>-- <?php echo e(__('item.select')); ?> --</option>");
            $('#village').attr('disabled', 'disabled');
            $('#commune').html("<option value>-- <?php echo e(__('item.select')); ?> --</option>");
            $('#commune').attr('disabled', 'disabled');
            var province = $('#province option:selected').val();
            if(!province || province==0){
                return 0;
            }
            $.ajax({
                url:'<?php echo e(route("get_districts")); ?>',
                type:'get',
                data:{province:province},
                success:function(data){
                    $('#district').removeAttr('disabled');
                    $('#district').html(data.option);
                }
            });
        });
        $(document).on('change', '#district', function(){
            $('#village').html("<option value>-- <?php echo e(__('item.select')); ?> --</option>");
            $('#village').attr('disabled', 'disabled');
            var district = $('#district option:selected').val();
            if(!district || district==0){
                return 0;
            }
            $.ajax({
                url:'<?php echo e(route("get_communes")); ?>',
                type:'get',
                data:{district:district},
                success:function(data){
                    $('#commune').removeAttr('disabled');
                    $('#commune').html(data.option);
                }
            });
        });
        $(document).on('change', '#commune', function(){
            var commune = $('#commune option:selected').val();
            if(!commune || commune==0){
                return 0;
            }
            $.ajax({
                url:'<?php echo e(route("get_villages")); ?>',
                type:'get',
                data:{commune:commune},
                success:function(data){
                    $('#village').removeAttr('disabled');
                    $('#village').html(data.option);
                }
            });
        });


        // =========== Place Of Bith =========
        $(document).on('change', '#pob_province', function(){
            $('#pob_village').html("<option value>-- <?php echo e(__('item.select')); ?> --</option>");
            $('#pob_village').attr('disabled', 'disabled');
            $('#pob_commune').html("<option value>-- <?php echo e(__('item.select')); ?> --</option>");
            $('#pob_commune').attr('disabled', 'disabled');
            var province = $('#pob_province option:selected').val();
            if(!province || province==0){
                return 0;
            }
            $.ajax({
                url:'<?php echo e(route("get_districts")); ?>',
                type:'get',
                data:{province:province},
                success:function(data){
                    $('#pob_district').removeAttr('disabled');
                    $('#pob_district').html(data.option);
                }
            });
        });
        $(document).on('change', '#pob_district', function(){
            $('#pob_village').html("<option value>-- <?php echo e(__('item.select')); ?> --</option>");
            $('#pob_village').attr('disabled', 'disabled');
            var district = $('#pob_district option:selected').val();
            if(!district || district==0){
                return 0;
            }
            $.ajax({
                url:'<?php echo e(route("get_communes")); ?>',
                type:'get',
                data:{district:district},
                success:function(data){
                    $('#pob_commune').removeAttr('disabled');
                    $('#pob_commune').html(data.option);
                }
            });
        });
        $(document).on('change', '#pob_commune', function(){
            var commune = $('#pob_commune option:selected').val();
            if(!commune || commune==0){
                return 0;
            }
            $.ajax({
                url:'<?php echo e(route("get_villages")); ?>',
                type:'get',
                data:{commune:commune},
                success:function(data){
                    $('#pob_village').removeAttr('disabled');
                    $('#pob_village').html(data.option);
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>