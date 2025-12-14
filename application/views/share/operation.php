<div class="row">
    <div class="col-md-12">
        <h3><?php echo trans('operation-details') ?></h3>
        <hr>
        <h4><?php echo html_escape($operation->title) ?></h4>
        <p><?php echo html_escape($operation->description) ?></p>
        <hr>
        <p><strong><?php echo trans('patient') ?>:</strong> <?php echo html_escape($operation->patient_name) ?></p>
        <p><strong><?php echo trans('doctor') ?>:</strong> <?php echo html_escape($operation->doctor_name) ?></p>
        <p><strong><?php echo trans('date') ?>:</strong> <?php echo my_date_show_time_ago($operation->created_at) ?></p>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-12">
        <h4><?php echo trans('media') ?></h4>
        <div class="row">
            <?php foreach ($media as $item): ?>
                <div class="col-md-3">
                    <div class="thumbnail">
                        <a href="<?php echo base_url($item->file_path) ?>" target="_blank">
                            <img src="<?php echo base_url($item->thumb_path) ?>" alt="...">
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
