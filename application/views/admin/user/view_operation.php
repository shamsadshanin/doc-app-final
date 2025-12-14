<div class="row">
    <div class="col-md-8">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo trans('operation-details') ?></h3>
            </div>
            <div class="box-body">
                <h4><?php echo html_escape($operation->title) ?></h4>
                <p><?php echo html_escape($operation->description) ?></p>
                <hr>
                <p><strong><?php echo trans('patient') ?>:</strong> <?php echo html_escape($operation->patient_name) ?></p>
                <p><strong><?php echo trans('doctor') ?>:</strong> <?php echo html_escape($operation->doctor_name) ?></p>
                <p><strong><?php echo trans('date') ?>:</strong> <?php echo my_date_show_time_ago($operation->created_at) ?></p>
            </div>
        </div>

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo trans('media') ?></h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <?php foreach ($media as $item): ?>
                        <div class="col-md-3" id="media-<?php echo html_escape($item->id) ?>">
                            <div class="thumbnail">
                                <a href="<?php echo base_url($item->file_path) ?>" target="_blank">
                                    <img src="<?php echo base_url($item->thumb_path) ?>" alt="...">
                                </a>
                                <div class="caption">
                                    <a href="#" class="btn btn-danger btn-xs delete-media" data-id="<?php echo html_escape($item->id) ?>"><?php echo trans('delete') ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo trans('upload-media') ?></h3>
            </div>
            <div class="box-body">
                <form action="<?php echo base_url('admin/operation/upload_media/' . $operation->id) ?>" class="dropzone" id="media-dropzone"></form>
            </div>
        </div>

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo trans('share') ?></h3>
            </div>
            <div class="box-body">
                <div class="input-group">
                    <input type="text" class="form-control" id="share-link" readonly value="<?php echo base_url('share/operation/' . $operation->share_token) ?>">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" id="generate-link"><?php echo trans('regenerate-link') ?></button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    Dropzone.options.mediaDropzone = {
        paramName: "file",
        maxFilesize: 10, // MB
        acceptedFiles: "image/*,application/pdf,.doc,.docx,.xls,.xlsx,.csv,.txt,.zip",
        init: function() {
            this.on("success", function(file, response) {
                location.reload();
            });
        }
    };

    $(document).on('click', '.delete-media', function() {
        var id = $(this).data('id');
        if (confirm('Are you sure you want to delete this media?')) {
            $.ajax({
                url: '<?php echo base_url('admin/operation/delete_media/') ?>' + id,
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    if (response.st == 1) {
                        $('#media-' + id).remove();
                    }
                }
            });
        }
    });

    $(document).on('click', '#generate-link', function() {
        $.ajax({
            url: '<?php echo base_url('admin/operation/generate_share_link/' . $operation->id) ?>',
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                if (response.token) {
                    $('#share-link').val('<?php echo base_url('share/operation/') ?>' + response.token);
                }
            }
        });
    });
</script>
