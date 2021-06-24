<!-- Model Position -->
    <button type="button" class="btn btn-primary d-none btn-add-position" data-toggle="modal" data-target="#modal-modal-position">
      <?php echo e(__('item.create_position')); ?>

    </button>
    <!-- Modal Position-->
    <div class="modal fade" id="modal-modal-position" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('item.add_position')); ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="error display_message"></div>
            <div class="form-group">
                <?php echo Form::label('positino_title', trans('item.title'))."<span class='star'> *</span>"; ?>

                <?php echo Form::text('positino_title', '', array('class' => 'form-control positino_title')); ?>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-close-position" data-dismiss="modal"><?php echo e(__('item.close')); ?></button>
            <button type="button" class="btn btn-primary btn-save-position" data-url="<?php echo e(route('position.ajax-store')); ?>"><?php echo e(__('item.save')); ?></button>
          </div>
        </div>
      </div>
    </div>

    <!-- Model Department -->
    <button type="button" class="btn btn-primary d-none btn-add-department" data-toggle="modal" data-target="#modal-modal-department">
      <?php echo e(__('item.create_department')); ?>

    </button>
    <!-- Modal Department-->
    <div class="modal fade" id="modal-modal-department" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('item.add_department')); ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="error display_message"></div>
            <div class="form-group">
                <?php echo Form::label('department_title', trans('item.title'))."<span class='star'> *</span>"; ?>

                <?php echo Form::text('department_title', '', array('class' => 'form-control department_title')); ?>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-close-department" data-dismiss="modal"><?php echo e(__('item.close')); ?></button>
            <button type="button" class="btn btn-primary btn-save-department" data-url="<?php echo e(route('department.ajax-store')); ?>"><?php echo e(__('item.save')); ?></button>
          </div>
        </div>
      </div>
    </div>

    <!-- Model Sale Type -->
    <button type="button" class="btn btn-primary d-none btn-add-sale-type" data-toggle="modal" data-target="#modal-modal-sale-type">
      <?php echo e(__('item.create_sale_type')); ?>

    </button>
    <!-- Modal Sale Type-->
    <div class="modal fade" id="modal-modal-sale-type" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('item.add_sale_type')); ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="error display_message"></div>
            <div class="form-group">
                <?php echo Form::label('sale_type_title', trans('item.name'))."<span class='star'> *</span>"; ?>

                <?php echo Form::text('sale_type_title', '', array('class' => 'form-control sale_type_title')); ?>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-close-sale-type" data-dismiss="modal"><?php echo e(__('item.close')); ?></button>
            <button type="button" class="btn btn-primary btn-save-sale-type" data-url="<?php echo e(route('sale-type.ajax-store')); ?>"><?php echo e(__('item.save')); ?></button>
          </div>
        </div>
      </div>
    </div>