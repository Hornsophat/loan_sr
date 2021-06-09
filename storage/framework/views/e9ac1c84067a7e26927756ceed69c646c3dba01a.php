
    <div class="modal fade bd-example-modal-lg" id="loanScheduleModal" tabindex="-1" role="dialog" aria-labelledby="loanScheduleModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loanScheduleModalLabel"><?php echo e(__('item.payment_schedule')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-nowrap">
                            <thead class="badge-primary">
                                <tr>
                                    <th><?php echo e(__('item.no')); ?></th>
                                    <th><?php echo e(__('item.date')); ?></th>
                                    <th><?php echo e(__('item.number_of_days_to_penalty')); ?></th>
                                    <th><?php echo e(__('item.currency')); ?></th>
                                    <th class="text-center"><?php echo e(__("item.balance")); ?></th>
                                      <th><?php echo e(__("item.late_paid")); ?></th>
                                    <th><?php echo e(__("item.total_amount_to_be_paid")); ?></th>
                                    <th><?php echo e(__("item.interest_amount")); ?></th>
                                    <th><?php echo e(__('item.amount')); ?></th>
                                    <th><?php echo e(__('item.total_amount')); ?></th>
                                    <th><?php echo e(__('item.principle_balance')); ?></th>
                                    <th class="text-center"><?php echo e(__("item.amount_paid")); ?></th>
                                    <th><?php echo e(__('item.payment_status')); ?></th>
                                    <th class="text-center"><?php echo e(__('item.function')); ?></th>
                                </tr>
                            </thead>
                            <tbody id="contentloanScheduleModal" style="height: 90%; overflow-y: auto;">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><?php echo e(__('item.close')); ?></button>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="contractModal" tabindex="-1" role="dialog" aria-labelledby="contractModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg" role="document" style="max-width: 860px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contractModalLabel"><?php echo e(__('item.contract')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="contractContentModal" style="position: relative; margin:auto; padding:5px; width: 100%;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><?php echo e(__('item.close')); ?></button>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="scheduleModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg" role="document" style="max-width: 950px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scheduleModalLabel"><?php echo e(__('item.schedule')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="scheduleContentModal" style="position: relative; min-height: 800px; margin:auto;padding:5px;width:100%;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><?php echo e(__('item.close')); ?></button>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel"><?php echo e(__('item.payment')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-nowrap">
                            <thead class="badge-primary">
                                <tr>
                                    <th><?php echo e(__('item.no')); ?></th>
                                    <th><?php echo e(__('item.code')); ?></th>
                                    <th><?php echo e(__('item.date')); ?></th>
                                    <th><?php echo e(__('item.amount')); ?></th>
                                    <th><?php echo e(__('item.function')); ?></th>
                                </tr>
                            </thead>
                            <tbody id="contentPaymentModal">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><?php echo e(__('item.close')); ?></button>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="changeAddressModal" tabindex="-1" role="dialog" aria-labelledby="changeAddressModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeAddressModalLabel">Change Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="min-height: 300px;">
                    <form action="<?php echo e(route('sale_item.change_address')); ?>" method="POST" id="frmChangeAddress" enctype="multipart/form-data" accept-charset="UTF-8">
                        <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/>
                        <input type="hidden" name="sale_item_id" value="<?php echo e($sale->id); ?>">
                        <div class="table-responsive">
                            <table class="table table-nowrap">
                                <thead class="badge-primary">
                                    <tr>
                                        <th></th>
                                        <th><?php echo e(__('item.province')); ?></th>
                                        <th><?php echo e(__('item.district')); ?></th>
                                        <th><?php echo e(__('item.commune')); ?></th>
                                        <th><?php echo e(__('item.village')); ?></th>
                                    </tr>
                                </thead>
                                <tbody id="contentchangeAddressModal">
                                    <?php if(!empty($land)): ?>
                                        <?php
                                            $land_province = $land->eProvince;
                                            $land_district = $land->eDistrict;
                                            $land_commune =  $land->eCommune;
                                            $land_village =  $land->eVillage;
                                        ?>
                                        <tr>
                                            <td><input type="radio" name="other_address" value="" <?php if(is_null($sale->land_address_id)): ?> checked <?php endif; ?>></td>
                                            <td>
                                                <?php if(!empty($land_province)): ?>
                                                    <?php echo e($land_province->province_kh_name); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if(!empty($land_district)): ?>
                                                <?php echo e($land_district->district_namekh); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if(!empty($land_commune)): ?>
                                                <?php echo e($land_commune->commune_namekh); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if(!empty($land_village)): ?>
                                                <?php echo e($land_village->village_namekh); ?>

                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if($land_address!==[]): ?>
                                        <?php $__currentLoopData = $land_address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><input type="radio" name="other_address" value=<?php echo e($address->id); ?> <?php if(!is_null($sale->land_address_id) && $sale->land_address_id==$address->id): ?> checked <?php endif; ?>></td>
                                                <td><?php echo e($address->province_name); ?></td>
                                                <td><?php echo e($address->district_name); ?></td>
                                                <td><?php echo e($address->commune_name); ?></td>
                                                <td><?php echo e($address->village_name); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><?php echo e(__('item.close')); ?></button>
                    <button type="button" class="btn btn-sm btn-primary" onclick="changeAddress()">Save changes</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="changePartnerModal" tabindex="-1" role="dialog" aria-labelledby="changePartnerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePartnerModalLabel">Change Partner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="contentChangePartnerModal" style="min-height: 300px;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><?php echo e(__('item.close')); ?></button>
                    <button type="button" class="btn btn-sm btn-primary" onclick="changePartner()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
