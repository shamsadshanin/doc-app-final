<div class="row mb-4 ">
  <div class="col-md-12">
    <div class="form-group">
      <label class="font-weight-bold">Subject</label>
      <input type="text" class="form-control" name="subject" value="<?php if(isset($template->subject)){echo html_escape($template->subject);}  ?>">
    </div>
  </div>

  <div class="col-md-12">
    <div class="form-group">
      <label class="font-weight-bold">Variables</label>
      <p class="bg-light mb-0 varib"><?php if(isset($template->variables)){echo html_escape($template->variables);}  ?></p>
    </div>
  </div>
  
  <div class="col-md-12">
    <div class="form-group mb-1">
        <label class="font-weight-bold">Body</label>
        <textarea id="ckEditor" class="form-control" name="body"><?php if(isset($template->body)){echo html_escape($template->body);}  ?></textarea>
    </div>

    <div class="alert bg-danger-soft brd-4" role="alert">
      <i class="fa fa-info-circle"></i> <?php echo trans('dont-bold-the-variable-names-or-brackets') ?>
    </div>

  </div>
</div>


<script src="<?php echo base_url(); ?>assets/admin/plugins/ckeditor/ckeditor.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
      CKEDITOR.replace('ckEditor', {
          language: 'en'
      });
      CKEDITOR.replace('ckEditor1', {
          language: 'en'
      });
  })
</script>