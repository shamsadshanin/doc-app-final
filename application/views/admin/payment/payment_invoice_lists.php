<div class="content-wrapper">

  <!-- Main content -->
  <section class="content container">

    <div class="box list_area container">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo trans('payments') ?> </h3>
      </div>
    
     
      <div class="col-md-12 col-sm-12 col-xs-12 scroll table-responsive p-0">
          <table class="table table-hover <?php if(count($payments) > 10){echo "datatable";} ?> cushover" id="dg_table">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Transaction Number<?php echo trans('transaction-number') ?></th>
                      <th><?php echo trans('patient') ?></th>
                      <th><?php echo trans('amount') ?></th>
                      <th>Total amount<?php echo trans('total-amount') ?></th>
                      <th><?php echo trans('payment-method') ?></th>
                      <th>Proof<?php echo trans('proof') ?></th>
                      <th><?php echo trans('status') ?></th>
                      <th class="text-right"><?php echo trans('action') ?></th>
                  </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach ($payments as $payment): ?>

                  <?php if ($payment->amount != '0.00'): ?>
                    <tr id="row_<?php echo html_escape($payment->id); ?>">
                        
                        <td><?php echo $i; ?></td>
                        <td>#<?php echo html_escape($payment->puid); ?></td>
                        <td><?php echo get_by_id($payment->patient_id,'patientses')->name; ?></td>
                        <td><?php echo html_escape(settings()->currency_symbol) ?><?php echo html_escape($payment->amount); ?></td>
                        <td><?php echo html_escape(settings()->currency_symbol) ?><?php echo html_escape($payment->total_amount); ?></td>
                        <td><?php echo html_escape($payment->payment_method); ?> </td>
                        
                        <td>
                          <?php if ($payment->payment_method == 'offline' && !empty($payment->proof) && $payment->status == 'pending'): ?>
                            <a class="badge badge-primary" data-toggle="modal" href="#verifyPayment<?php echo $i; ?>">Verify payment</a>
                          <?php endif ?>

                          <?php if ($payment->payment_method == 'offline' && !empty($payment->proof) && $payment->status == 'verified'): ?>
                            <a class="badge badge-primary" target="_blank" href="<?php echo base_url($payment->proof) ?>"><i class="fa fa-eye mr-2"></i>View proof</a>
                          <?php endif ?>
                        </td>
                        
                       
                        <td><?php echo ucfirst($payment->status); ?> </td>
                        
                        <td class="actions" width="25%">
                          <a target="_blank" href="<?php echo base_url('admin/payment/receipt/'.$payment->puid) ?>" class="pull-right btn btn-default btn-sm"><i class="fa fa-eye"></i> <?php echo trans('view') ?></a>
                        </td>
                    </tr>
                  <?php endif ?>
                  
                <?php $i++; endforeach; ?>
              </tbody>
          </table>
      </div>

     
    </div>
    

  </section>
</div>


<?php $k=1; foreach ($payments as $payment): ?>
    <div class="modal fade" id="verifyPayment<?php echo $k ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo trans('update-plan') ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

       
          <div class="modal-body">
            <h5>Verify this payment #<?php echo html_escape($payment->puid) ?></h5>

            <div class="mt-3">
              <a class="badge badge-primary" target="_blank" href="<?php echo base_url($payment->proof) ?>"> <i class="fa fa-eye mr-2"></i> View proof</a>
              <a class="badge badge-primary" href="<?php echo base_url('admin/payment/approve_offline_payment/'.$payment->id) ?>">Verified payment</a>
            </div>
          </div>

        </div>
      </div>
    </div>
<?php $k++; endforeach ?>
