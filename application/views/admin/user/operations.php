
<div class="content-wrapper">

  <!-- Main content -->
  <section class="content container">

    <div class="box add_area <?php if(isset($page_title) && $page_title == "Edit"){echo "d-block";}else{echo "hide";} ?>">
      <div class="box-header with-border">
        <?php if (isset($page_title) && $page_title == "Edit"): ?>
          <h3 class="box-title"><?php echo trans('edit-operation') ?></h3>
          <?php else: ?>
            <h3 class="box-title"><?php echo trans('create-new-operation') ?> </h3>
          <?php endif; ?>

          <div class="box-tools pull-right">
            <?php if (isset($page_title) && $page_title == "Edit"): ?>
              <a href="<?php echo base_url('admin/operation') ?>" class="pull-right btn btn-light-secondary mt-15 btn-sm"><i class="fa fa-angle-left"></i> <?php echo trans('back') ?></a>
              <?php else: ?>
                <a href="#" class="text-right btn btn-light-secondary btn-sm cancel_btn"><i class="fa fa-bars"></i> <?php echo trans('all-operations') ?></a>
              <?php endif; ?>
            </div>
          </div>

          <div class="box-body">
            <form id="cat-form" method="post" enctype="multipart/form-data" class="validate-form" action="<?php echo base_url('admin/operation/add')?>" role="form" novalidate>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label><?php echo trans('title') ?> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" required name="title" value="<?php echo html_escape($operation[0]['title']); ?>" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label><?php echo trans('patient') ?> <span class="text-danger">*</span></label>
                    <select class="form-control" name="patient_id">
                      <option value=""><?php echo trans('select-patient') ?></option>
                      <?php foreach ($patients as $patient): ?>
                        <option value="<?php echo $patient->id ?>"><?php echo $patient->name ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label><?php echo trans('description') ?></label>
                <textarea class="form-control" name="description" rows="6"><?php echo html_escape($operation[0]['description']); ?></textarea>
              </div>

              <input type="hidden" name="id" value="<?php echo html_escape($operation['0']['id']); ?>">
              <!-- csrf token -->
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

              <div class="row m-t-30">
                <div class="col-sm-12">
                  <?php if (isset($page_title) && $page_title == "Edit"): ?>
                    <button type="submit" class="btn btn-primary pull-left"><i class="ficon flaticon-check"></i> <?php echo trans('save-changes') ?></button>
                    <?php else: ?>
                      <button type="submit" class="btn btn-primary pull-left"><i class="ficon flaticon-check"></i> <?php echo trans('save') ?></button>
                    <?php endif; ?>
                  </div>
                </div>

              </form>

            </div>

          </div>


          <?php if (isset($page_title) && $page_title != "Edit"): ?>

            <div class="box list_area">
              <div class="box-header with-border">
                <?php if (isset($page_title) && $page_title == "Edit"): ?>
                  <h3 class="box-title">Edit operation <a href="<?php echo base_url('admin/operation') ?>" class="pull-right btn btn-light-primary mt-15 btn-sm"><i class="fa fa-angle-left"></i> <?php echo trans('back') ?></a></h3>
                  <?php else: ?>
                    <h3 class="box-title"><?php echo trans('all-operations') ?> </h3>
                  <?php endif; ?>

                  <div class="box-tools pull-right">
                   <a href="#" class="pull-right btn btn-light-secondary btn-sm add_btn"><i class="fa fa-plus"></i> <?php echo trans('add-new-operation') ?></a>
                 </div>
               </div>

               <div class="box-body p-0">

                  <div class="col-md-12 col-sm-12 col-xs-12 scroll table-responsive">
                    <table class="table table-hover datatable <?php if(count($operations) > 10){echo "datatable";} ?>">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th><?php echo trans('title') ?></th>
                          <th><?php echo trans('patient') ?></th>
                          <th><?php echo trans('doctor') ?></th>
                          <th><?php echo trans('date') ?></th>
                          <th><?php echo trans('action') ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1; foreach ($operations as $operation): ?>
                        <tr id="row_<?php echo html_escape($operation->id); ?>">

                          <td><?= $i; ?></td>
                          <td><?php echo html_escape($operation->title); ?></td>
                          <td><?php echo html_escape($operation->patient_name); ?></td>
                          <td><?php echo html_escape($operation->doctor_name); ?></td>
                          <td><?php echo my_date_show_time_ago($operation->created_at); ?></td>

                          <td class="actions" width="15%">
                            <a href="<?php echo base_url('admin/operation/edit/'.html_escape($operation->id));?>" class="on-default edit-row" data-placement="top" title="<?php echo trans('edit') ?>"><i class="fa fa-pencil"></i></a> &nbsp; 

                            <a data-val="Category" data-id="<?php echo html_escape($operation->id); ?>" href="<?php echo base_url('admin/operation/delete/'.html_escape($operation->id));?>" class="on-default remove-row delete_item" data-toggle="tooltip" data-placement="top" title="<?php echo trans('delete') ?>"><i class="fa fa-trash-o"></i></a> &nbsp;

                            <a href="<?php echo base_url('admin/operation/view/'.html_escape($operation->id));?>" class="on-default" data-placement="top" title="<?php echo trans('view') ?>"><i class="fa fa-eye"></i></a>
                          </td>
                        </tr>

                        <?php $i++; endforeach; ?>
                      </tbody>
                    </table>
                  </div>

              </div>

            </div>
          <?php endif; ?>

        </section>
      </div>
