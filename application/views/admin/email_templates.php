<div class="content-wrapper">

  <section class="content">


    <div class="container">

      <div class="boxs">
        <div class="box-header with-border pl-30">
          <h3 class="box-title"><i class="flaticon-settings"></i> <?php echo trans('email-template-settings')?></h3>
        </div>

        <div class="box-body">
          <div class="row">
            <div class="col-md-4 mb-3">
              <ul class="nav nav-pills flex-column" id="myTab" role="tablist">

                <?php $i=1; foreach ($templates as $template): ?>
                  <li class="nav-item mt-2">
                    <a class="nav-link <?php if($i==1){echo 'active';} ?> template_email email-template-<?php echo html_escape($template->slug) ?>" data-id="<?php echo html_escape($template->slug) ?>" href="#" ><i class="fa fa-arrow-circle-right"></i><?php echo html_escape($template->title) ?></a>
                  </li>
                <?php $i++; endforeach ?>

              </ul>
            </div>

            <!-- col-md-4 -->
            
              <div class="col-md-8 card">
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/email_templates/add') ?>" role="form" class="form-horizontal pl-20">

                  <div class="email_template_area pt-20">
                    <?php $this->load->view('admin/include/email_template') ?>
                  </div>
                

                  <!-- csrf token -->
                  <input type="hidden" name="slug" value="verification-template" class="template-slug">
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                  <div class="mt-0">
                    <button type="submit" class="btn btn-light-primary btn-lg btn-block mb-50 pull-left"><i class="fa fa-check"></i> <?php echo trans('save-changes') ?></button>
                  </div>
                    
                </form>
              </div>
            
          </div>
        </div>
      </div>

    </div>

  </section>

</div>

