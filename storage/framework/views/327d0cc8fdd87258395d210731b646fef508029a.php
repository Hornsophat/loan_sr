<?php $__env->startSection('title',"List Customer"); ?>
<?php $__env->startSection('content'); ?>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><?php echo e(__('item.customer')); ?></li>
                <li class="breadcrumb-item active"><a href="#"><?php echo e(__('item.view_customer')); ?></a></li>
            </ul>
        </div>

        
        <div class="row">
            <div class="col-md-12">
                <?php echo $__env->make('flash/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="tile">
                    <div class="tile-body">
                        <a href="<?php echo e(route('editCustomer', $customer->id)); ?>" class="btn btn-small btn-success"><?php echo e(__('item.edit_customer')); ?></a>
                        <hr/>

                        <table class="table table-hover">
                            <tr>
                                <td><?php echo e(__('item.profile')); ?></td>
                                <td>
                                    <?php
                                        $url = asset('/images/default/no_image.png');
                                        if($customer->profile != null && file_exists(public_path($customer->profile)))
                                            $url = asset('public'.$customer->profile);
                                    ?>
                                    <img src="<?php echo e($url); ?>"  alt="Missing Image" width="150px"/>

                                </td>
                            </tr>
                            <tr>
                                <td><?php echo e(__('item.id')); ?></td>
                                <td><?php echo e($customer->customer_no); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo e(__('item.first_name')); ?> (Kh)</td>
                                <td><?php echo e($customer->first_name); ?></td>
                            </tr>

                            <tr>
                                <td><?php echo e(__('item.last_name')); ?> (Kh)</td>
                                <td><?php echo e($customer->last_name); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo e(__('item.first_name')); ?> (En)</td>
                                <td><?php echo e($customer->first_name_en); ?></td>
                            </tr>

                            <tr>
                                <td><?php echo e(__('item.last_name')); ?> (En)</td>
                                <td><?php echo e($customer->last_name_en); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo e(__('item.age')); ?></td>
                                <td><?php echo e($customer->age); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo e(__('item.sex')); ?></td>
                                <td><?php echo e(gender($customer->sex)); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo e(__('item.identity_number')); ?></td>
                                <td><?php echo e($customer->identity); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo e(__('item.identity_set_date')); ?></td>
                                <td><?php echo e(date('d-m-Y', strtotime($customer->identity_set_date))); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo e(__('item.country')); ?></td>
                                <td><?php echo e(!is_null($customer->countries)?$customer->countries->name:""); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo e(__('item.nationality')); ?></td>
                                <td><?php echo e($customer->nationality); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo e(__('item.phone1')); ?></td>
                                <td><?php echo e($customer->phone1); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo e(__('item.phone2')); ?></td>
                                <td><?php echo e($customer->phone2); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo e(__('item.email')); ?></td>
                                <td><?php echo e($customer->email); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo e(__('តួនាទី')); ?></td>
                                <td><?php echo e($customer->fax); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo e(__('item.dob')); ?></td>
                                <td><?php echo e($customer->dob); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo e(__('item.pob')); ?></td>
                                <td>
                                    <?php echo e(isset($customer->pobProvince->province_kh_name)?$customer->pobProvince->province_kh_name:''); ?>,
                                    <?php echo e(isset($customer->pobDistrict->district_namekh)?$customer->pobDistrict->district_namekh:''); ?>,
                                    <?php echo e(isset($customer->pobCommune->commune_namekh)?$customer->pobCommune->commune_namekh:''); ?>,
                                    <?php echo e(isset($customer->pobVillage->village_namekh)?$customer->pobVillage->village_namekh:''); ?>

                                </td>
                            </tr>
                            <tr>
                                <td><?php echo e(__('item.address')); ?></td>
                                <td>
                                    <?php echo e(isset($customer->eProvince->province_kh_name)?$customer->eProvince->province_kh_name:''); ?>,
                                    <?php echo e(isset($customer->eDistrict->district_namekh)?$customer->eDistrict->district_namekh:''); ?>,
                                    <?php echo e(isset($customer->eCommune->commune_namekh)?$customer->eCommune->commune_namekh:''); ?>,
                                    <?php echo e(isset($customer->eVillage->village_namekh)?$customer->eVillage->village_namekh:''); ?>

                                </td>
                            </tr>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('back-end/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>