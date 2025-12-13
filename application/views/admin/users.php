
<div class="content-wrapper">

  <!-- Main content -->
  <section class="content container-fluid">


    <div class="box add_area <?php if(isset($page_title) && $page_title == "Edit"){echo "d-block";}else{echo "hide";} ?>">
      <div class="box-header with-border">
        <?php if (isset($page_title) && $page_title == "Edit"): ?>
          <h3 class="box-title">Edit User<?php echo trans('edit-user') ?></h3>
        <?php else: ?>
          <h3 class="box-title"><?php echo trans('add-new-user') ?> </h3>
        <?php endif; ?>

        <div class="box-tools pull-right">
          <?php if (isset($page_title) && $page_title == "Edit"): ?>
            <?php $required = ''; ?>
            <a href="<?php echo base_url('admin/users') ?>" class="pull-right btn btn-light-secondary btn-sm mt-15"><i class="fa fa-angle-left"></i> <?php echo trans('back') ?></a>
          <?php else: ?>
            <?php $required = 'required'; ?>
            <a href="#" class="text-right btn btn-light-secondary btn-sm cancel_btn"><i class="fa fa-bars"></i> <?php echo trans('users') ?></a>
          <?php endif; ?>
        </div>
      </div>

      <div class="box-body">
        <form id="cat-form" method="post" enctype="multipart/form-data" class="validate-form" action="<?php echo base_url('admin/users/add')?>" role="form" novalidate>

            <div class="form-group">
               <label><?php echo trans('name') ?> <span class="text-danger">*</span></label>
               <input type="text" class="form-control" name="name" value="<?php echo html_escape($user[0]['name']); ?>" <?php echo html_escape($required); ?>>
            </div>

            <div class="form-group">
                <label><?php echo trans('slug') ?> <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="slug" value="<?php echo html_escape($user[0]['slug']); ?>" <?php echo html_escape($required); ?>>
            </div>

            <div class="form-group">
                <label><?php echo trans('email') ?> <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="email" value="<?php echo html_escape($user[0]['email']); ?>" <?php echo html_escape($required); ?>>
            </div>

            <div class="form-group">
                <label><?php echo trans('password') ?> <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password" placeholder="set or reset password"  value="" <?php echo html_escape($required); ?>>
            </div>

            <div class="form-group">
                <label><?php echo trans('plans') ?></label>
                <select class="form-control single_select" name="package" required>
                    <option value=""><?php echo trans('select-plans') ?></option>
                    <?php foreach ($packages as $package): ?>
                        <option value="<?php echo html_escape($package->id) ?>" <?php if(isset($payment->package_id) && $payment->package_id == $package->id){echo 'selected';} ?>><?php echo html_escape($package->name) ?> </option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="form-group">
                <label><?php echo trans('subscription-type') ?></label>
                <div class="radio radio-info radio-inline mt-10">
                  <input type="radio" id="inlineRadio1" value="monthly" name="billing_type" <?php if(isset($payment->billing_type) && $payment->billing_type == 'monthly'){echo 'checked';} ?> required>
                  <label for="inlineRadio1"> <?php echo trans('monthly') ?> </label>
                  &emsp;&emsp;
                  <input type="radio" id="inlineRadio2" value="yearly" name="billing_type" <?php if(isset($payment->billing_type) && $payment->billing_type == 'yearly'){echo 'checked';} ?> required>
                  <label for="inlineRadio2"> <?php echo trans('yearly') ?> </label>
                </div>
            </div>
                    
            <div class="form-group">
                <label>Payment Status</label>
                <div class="radio radio-info radio-inline mt-10">
                  <input type="radio" id="inlineRadio3" value="verified" name="payment_status" <?php if(isset($payment->status) && $payment->status == 'verified'){echo 'checked';} ?> required>
                  <label for="inlineRadio3"> <?php echo trans('verified') ?> </label>
                  &emsp;&emsp;
                  <input type="radio" id="inlineRadio4" value="pending" name="payment_status" <?php if(isset($payment->status) && $payment->status == 'pending'){echo 'checked';} ?> required>
                  <label for="inlineRadio4"> <?php echo trans('pending') ?> </label>
                </div>
            </div>

            <div class="form-group">
                <label><?php echo trans('status') ?></label>
                <div class="radio radio-info radio-inline mt-10">
                  <input type="radio" id="inlineRadio5" value="1" name="status" <?php if(isset($user[0]['status']) && $user[0]['status'] == 1){echo 'checked';} ?> required>
                  <label for="inlineRadio5"> <?php echo trans('active') ?> </label>
                  &emsp;&emsp;
                  <input type="radio" id="inlineRadio6" value="0" name="status" <?php if(isset($user[0]['status']) && $user[0]['status'] == 0){echo 'checked';} ?> required>
                  <label for="inlineRadio6"> <?php echo trans('inactive') ?> </label>
                </div>
            </div>

            <input type="hidden" name="id" value="<?php echo html_escape($user['0']['id']); ?>">
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
        <div class="box-header">
          <?php if (isset($page_title) && $page_title == "Edit"): ?>
            <h3 class="box-title">Edit page <a href="<?php echo base_url('admin/users') ?>" class="pull-right btn btn-light-secondary btn-sm"><i class="fa fa-angle-left"></i> <?php echo trans('back') ?></a></h3>
          <?php else: ?>
            <h3 class="box-title"><?php echo trans('users') ?> </h3>
          <?php endif; ?>

            <div class="box-tools pull-right">
                <a class="pull-right filter-action btn btn-outline-primary text-primary users-filter mt-10"> <i class="fa fa-filter"></i></a>
                <a href="#" class="pull-right btn btn-light-secondary  btn-sm add_btn"><i class="fa fa-plus"></i> <?php echo trans('add-new-user') ?></a>
            </div>

            <div class="filter_popup showFilter">
                <p class="leads mb-3"><?php echo trans('filters') ?></p>

                <form action="<?php echo base_url('admin/users/all_users/all') ?>" class="sort_form" method="get">
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <select name="package" class="form-control sort_package search">
                                <option><?php echo trans('sort-by-packages') ?></option>
                                <option <?php if(isset($_GET['package']) && $_GET['package'] == 'all'){echo "selected";} ?> value="all">All</option>
                                <?php foreach ($packages as $package): ?>
                                    <option <?php if(isset($_GET['package']) && $_GET['package'] == $package->id){echo "selected";} ?> value="<?php echo html_escape($package->id) ?>"><?php echo html_escape($package->name) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <select name="sort" class="form-control sort search">
                                <option><?php echo trans('sort-by-status') ?></option>
                                <option <?php if(isset($_GET['sort']) && $_GET['sort'] == 'all'){echo "selected";} ?> value="all"><?php echo trans('all') ?></option>
                                <option <?php if(isset($_GET['sort']) && $_GET['sort'] == 'verified'){echo "selected";} ?> value="verified"><?php echo trans('verified') ?></option>
                                <option <?php if(isset($_GET['sort']) && $_GET['sort'] == 'pending'){echo "selected";} ?> value="pending"><?php echo trans('pending') ?></option>
                                <option <?php if(isset($_GET['sort']) && $_GET['sort'] == 'expired'){echo "selected";} ?> value="expired"><?php echo trans('expired') ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="Search by name">
                            
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                      <button type="submit" class="btn btn-primary btn-sm btn-block"><?php echo trans('submit') ?></button>
                    </div>

                  </div>
                </form>
            </div>
        </div>

        <div class="box-bodys">
          
          <div class="col-md-12 col-sm-12 col-xs-12 scroll table-responsive">
               <div class="table-responsive">
                    <table class="table table-hover m-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo trans('avatar') ?></th>
                                <th><?php echo trans('name') ?></th>
                                <th><?php echo trans('account-verification') ?></th>
                                <th><?php echo trans('chambers') ?></th>
                                <th><?php echo trans('package') ?></th>
                                <th><?php echo trans('payment-status') ?></th>
                                <th><?php echo trans('account-status') ?></th>
                                <th><?php echo trans('joined') ?></th>
                                <th><?php echo trans('expired') ?></th>
                                <th><?php echo trans('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach ($users as $user): ?>
                                <tr id="row_<?php echo html_escape($user->id) ?>">
                                    <th scope="row"><?php echo html_escape($i) ?></th>
                                    
                                    <?php if ($user->thumb == ''): ?>
                                        <?php $avatar = 'assets/images/avatar.png'; ?> 
                                    <?php else: ?>
                                        <?php $avatar = $user->thumb; ?>
                                    <?php endif ?>
                                    <td><img width="60px" class="img-circle" src="<?php echo base_url($avatar) ?>"></td>

                                    <td>
                                        <p class="mb-0"><?php echo ucfirst($user->name); ?></p>
                                        <p class="mb-2"><?php echo html_escape($user->email); ?></p>
                                        <span>
                                            <p class="small mb-0"><?php echo html_escape($user->specialist) ?></p>
                                            <div class="small degree"><?= $user->degree ?></div>
                                        </span>
                                    </td>
                                    <td>
                                        <?php if ($user->is_verified == 1): ?>
                                            <span class="badge badge-success-soft font-weight-bold"><i class="fa fa-check-circle"></i> <?php echo trans('account-verified'); ?></span>
                                        <?php else: ?>
                                            <?php if (check_user_verification($user->id) == TRUE): ?>
                                                <a href="<?php echo base_url('admin/users/verify/'.$user->id); ?>" class="badge badge-success-soft"><i class="fa fa-check-circle"></i> <?php echo trans('verify-documents') ?></a> <br>
                                            <?php endif ?>

                                            <?php if ($user->is_verified == 0): ?>
                                                <a href="" class="badge badge-danger-soft mt-2"><i class="ficon flaticon-wall-clock"></i> <?php echo trans('pending') ?></a>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <?php foreach ($user->chambers as $chamber): ?>
                                            <p class="small mb-0"><i class="fa fa-angle-right"></i> <?php echo html_escape($chamber->name) ?></p>
                                        <?php endforeach ?>
                                    </td>
                                    
                                    <td>
                                        <span class="badge badge-primary-soft font-weight-bold"><i class="ficon flaticon-package"></i> <?php echo get_by_id(user_payment_details($user->id)->package_id, 'package')->name; ?></span>
                                    </td>
                                    
                                    <td>
                                        <?php $label = ''; ?>
                                        <?php if (user_payment_details($user->id)->status == 'pending'){
                                          $label = 'warning';
                                          $text = '<i class="ficon flaticon-wall-clock"></i> '.user_payment_details($user->id)->status;
                                        }else if(user_payment_details($user->id)->status == 'verified'){ 
                                          $label = 'success';
                                          $text = '<i class="ficon flaticon-check"></i> '.user_payment_details($user->id)->status;
                                        }else{ 
                                          $label = 'danger';
                                          $text = '<i class="ficon flaticon-empty-set-mathematical-symbol"></i>  Expired';
                                        }?>
                                        <span class="badge badge-<?php echo html_escape($label) ?>-soft">
                                            <b><?= $text; ?></b>
                                        </span>
                                    </td>
                                    
                                    <td>
                                      <?php if ($user->status == 1): ?>
                                          <span class="badge badge-success-soft"><b><i class="ficon flaticon-check"></i> <?php echo trans('active') ?></span>
                                      <?php else: ?>
                                        <span class="badge badge-danger-soft"><b><?php echo trans('disabled') ?></span>
                                      <?php endif ?>
                                    </td>

                                    <td><?php echo my_date_show($user->created_at) ?></td>

                                    <td>

                                    <?php if ($user->user_type == 'trial'): ?>
                                        <span class="badge badge-secondary-soft"><b><?php echo date_dif(date('Y-m-d'), $user->trial_expire) ?> <?php echo trans('days-left') ?></b></span>
                                    <?php else: ?>

                                      <?php if ($user->payment_status != 'expire'): ?>
                                          <span class="badge badge-secondary-soft"><b><?php echo date_dif(date('Y-m-d'), $user->payment->expire_on) ?> <?php echo trans('days-left') ?></span>
                                      <?php else: ?>
                                        <span class="badge badge-danger-soft"><b><?php echo get_time_ago($user->payment->expire_on) ?> <?php echo trans('days-left') ?></span>
                                      <?php endif ?>

                                    <?php endif ?>
                                    </td>


                                    <td class="actions" width="12%">
                                        <?php if ($user->status == 1): ?>
                                            <a href="<?php echo base_url('admin/users/status_action/2/'.html_escape($user->id));?>" class="mt-2 on-default deactive-row" data-toggle="tooltip" data-placement="top" title="<?php echo trans('inactive') ?>"><i class="fa fa-times"></i></a> &nbsp;
                                        <?php else: ?>
                                            <a href="<?php echo base_url('admin/users/status_action/1/'.html_escape($user->id));?>" class="mt-2 text-success on-default active-row" data-toggle="tooltip" data-placement="top" title="<?php echo trans('active') ?>"><i class="fa fa-check-circle"></i></a>
                                        <?php endif ?> &nbsp; 

                                        <a data-val="page" data-id="<?php echo html_escape($user->id); ?>" href="<?php echo base_url('admin/users/edit/'.html_escape($user->id));?>" class="mt-2 on-default bg-primary-soft" data-toggle="tooltip" data-placement="top" title="<?php echo trans('edit') ?>"><i class="icon-pencil"></i></a> &nbsp;

                                         <a data-val="page" data-id="<?php echo html_escape($user->id); ?>" href="<?php echo base_url('admin/users/delete/'.html_escape($user->id));?>" class="mt-2 on-default remove-row delete_item" data-toggle="tooltip" data-placement="top" title="<?php echo trans('delete') ?>"><i class="fa fa-trash-o"></i></a> &nbsp;

                                        <!-- <a href="#userModal_<?php echo $user->id ?>" data-toggle="modal" class="text-success on-default active-row"><i class="icon-pencil"></i></a> -->

                                        
                                      </td>
                                </tr>
                            <?php $i++; endforeach ?>
                        </tbody>
                    </table>
            </div>
          </div>

        </div>


      </div>
    <?php endif; ?>
  </section>
</div>



<!-- Modal -->
<?php foreach ($users as $user): ?>
    <div class="modal fade" id="userModal_<?php echo $user->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo trans('update-plan') ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

        <form method="post" enctype="multipart/form-data" class="validate-form" action="<?php echo base_url('admin/users/update_plan')?>" role="form" novalidate>
            <div class="modal-body">
                <input type="hidden" name="user" value="<?php echo html_escape($user->id) ?>">

                <div class="form-group">
                  <select class="form-control single_select" name="package" required>
                      <option value=""><?php echo trans('select-plans') ?></option>
                      <?php foreach ($packages as $package): ?>
                        <option <?php if($package->id == $user->payment->package_id){echo "selected";} ?> value="<?php echo html_escape($package->id) ?>"><?php echo html_escape($package->name) ?> </option>
                      <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group">
                    <label><?php echo trans('subscription-type') ?></label>
                    <div class="radio radio-info radio-inline mt-10">
                      <input type="radio" id="inlineRadio1" value="monthly" name="billing_type" required <?php if($user->payment->billing_type == 'monthly'){echo "checked";} ?>>
                      <label for="inlineRadio1"> <?php echo trans('monthly') ?> </label>
                      &emsp;&emsp;
                      <input type="radio" id="inlineRadio2" value="yearly" name="billing_type" required <?php if($user->payment->billing_type == 'yearly'){echo "checked";} ?>>
                      <label for="inlineRadio2"> <?php echo trans('yearly') ?> </label>
                    </div>
                </div>
                    
                <div class="form-group">
                    <label><?php echo trans('status') ?></label>
                    <div class="radio radio-info radio-inline mt-10">
                      <input <?php if($user->payment->status == 'verified'){echo "checked";} ?> type="radio" id="inlineRadio3" value="verified" name="status" required>
                      <label for="inlineRadio3"> <?php echo trans('verified') ?> </label>
                      &emsp;&emsp;
                      <input <?php if($user->payment->status == 'pending'){echo "checked";} ?> type="radio" id="inlineRadio4" value="pending" name="status" required>
                      <label for="inlineRadio4"> <?php echo trans('pending') ?> </label>
                    </div>
                </div>
                 
                <!-- csrf token -->
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                <div class="row">
                    <div class="col-sm-12 pt-60">
                        <button type="submit" class="btn btn-primary pull-left"><i class="ficon flaticon-check"></i> <?php echo trans('add-payment') ?></button>
                    </div>
                </div>
            </div>
        </form>

        </div>
      </div>
    </div>
<?php endforeach ?>
