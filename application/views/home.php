
    <section class="border-bottom border-light py-8 py-lg-10">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12 col-lg-6 order-md-1 pr-xl-0 mb-7 mb-lg-0">
                    <p class="mb-3 fs-18" data-aos="zoom-in"><?php echo trans('one-platform-for-all-doctors') ?></p>
                    <h1 data-aos="fade-left" data-aos-delay="150" class="display-4 font-weight-bold mb-4"><?php echo html_escape(settings()->site_title) ?></h1>
                    <p data-aos="fade-left" data-aos-delay="250" class="fs-18 text-muted line-height-md mb-4 mb-lg-4"><?php echo html_escape(settings()->description) ?></p>
                    <div>
                        <a href="<?php echo base_url('register') ?>" class="btn btn-primary mr-2" data-aos="fade-left" data-aos-delay="300"><?php echo trans('get-started') ?></a>

                        <?php if ($this->session->userdata('logged_in') != TRUE): ?>
                            <?php if (settings()->trial_days != 0): ?>
                                <a href="<?php echo base_url('register?trial=start') ?>" class="btn btn-outline-primary mr-2" data-aos="fade-left" data-aos-delay="400"><?php echo settings()->trial_days; ?> <?php echo trans('days-free-trial') ?></a>
                            <?php endif ?>
                        <?php endif ?>
                    </div>
                </div>

                <div class="col-md-12 col-lg-6 order-md-1">
                    <div class="banner-img" data-aos="zoom-in" data-aos-delay="100">
                        <img src="<?php echo base_url(settings()->hero_img) ?>" class="text-right" alt="Hero Image">
                    </div>
                </div>
           
            </div>
        </div>
    </section>


    <!-- Workflow -->
    <?php if (settings()->enable_workflow == 1): ?>
    <section class="py-6">
        <div class="container">

            <div class="w-md-80 w-lg-50 text-center mx-auto mb-8 mb-lg-10" data-aos="fade-up">
                <span class="badge badge-secondary-soft badge-pill mb-3"><?php echo trans('workflow') ?></span>
                <h1 class="text-dark font-weight-bold mx-auto mb-1"><?php echo trans('workflow-title') ?></h2>
            </div>

            <?php if (!empty($workflows)): ?>
                <div class="row">
                    <?php $w=1; foreach ($workflows as $workflow): ?>
                        <div class="col-md-4 mb-7 mb-md-0" data-aos="zoom-in-up" data-aos-delay="150">
                            <div class="text-center m-2 py-8 px-4 <?php if($w==2){echo "shadow-workflow brd-10";} ?>">
                                <div class="mb-5 workflow-img bg-light"><img class="display-5" src="<?php echo base_url($workflow->image) ?>" alt="Image"></div>

                                <p class="mb-3 font-weight-bold fs-18 text-dark mx-auto w-lg-80"><?php echo html_escape($workflow->title) ?></p>
                                <p class="text-muted mx-auto w-lg-90"><?php echo html_escape($workflow->details) ?></p>
                            </div>
                        </div>
                    <?php $w++; endforeach ?>
                </div>
            <?php else: ?>
                <div class="row">
                
                    <div class="col-md-4 mb-7 mb-md-0" data-aos="zoom-in-up" data-aos-delay="150">
                        <div class="text-center">
                            <div class="mb-5 workflow-img"><img class="display-5" src="<?php echo base_url() ?>assets/front/img/plan.svg" alt="..."></div>
                            <h5><?php echo trans('choose-plan') ?></h5>
                            <p class="mb-0 mx-auto w-95 w-lg-85 display-9 line-height-lg"><?php echo trans('choose-your-confortable-plan') ?></p>
                        </div>
                    </div>

                    <div class="col-md-4 mb-7 mb-md-0" data-aos="zoom-in-up" data-aos-delay="200">
                        <div class="text-center">
                            <div class="mb-5 workflow-img"><img class="display-5" src="<?php echo base_url() ?>assets/front/img/payment.svg" alt="..."></div>
                            <h5><?php echo trans('get-paid') ?></h5>
                            <p class="mb-0 mx-auto w-95 w-lg-85 display-9 line-height-lg"><?php echo trans('get-paid-title') ?></p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="text-center" data-aos="zoom-in-up" data-aos-delay="250">
                            <div class="mb-5 workflow-img"><img class="display-5" src="<?php echo base_url() ?>assets/front/img/work.svg" alt="..."></div>
                            <h5><?php echo trans('start-working') ?></h5>
                            <p class="mb-0 mx-auto w-95 w-lg-85 display-9 line-height-lg"><?php echo trans('start-working-title') ?></p>
                        </div>
                    </div>

                </div>
            <?php endif ?>


        </div>
    </section>
    <?php endif; ?>
    <!-- End Workflow -->


    <!-- features -->
    <?php if (!empty($features)): ?>
        <section class="pt-8 pt-md-5 pt-xl-0 mt-9">

            <div class="w-md-80 w-lg-40 text-center mx-auto mb-8 mb-lg-10" data-aos="fade-up">
                <span class="badge badge-secondary-soft badge-pill mb-3"><?php echo trans('features') ?></span>
                <h1 data-aos="fade-up display-3"><?php echo trans('a-smarter-way-to-manage-your-practice-prescriptions-appointments-and-patient-care') ?></h1>
            </div>

            <div class="container">
                <?php $i=1; foreach ($features as $feature): ?>
                    <div class="row align-items-center justify-content-center mt-6 mb-6" data-aos="fade-<?php if ($i % 2 == 0){echo 'left';}else{echo 'right';} ?>">
                        <?php if ($i % 2 == 0): ?>
                            <div class="col-10 col-sm-9 col-md-6 col-lg-7 text-center pr-md-5 pr-lg-10 mb-5 mb-md-0">
                                <img src="<?php echo base_url($feature->image) ?>" class="screen-one" alt="Feature Image">
                            </div>

                            <div class="col-md-6 col-lg-5">
                                <h4 class="h3 mb-4"><?php echo html_escape($feature->name); ?></h4>
                                <p class="lead mb-6"><?php echo html_escape($feature->details); ?></p>
                            </div>
                        <?php else: ?>
                            <div class="col-md-6 col-lg-5 order-2 order-md-1">
                                <h4 class="h3 mb-4"><?php echo html_escape($feature->name); ?></h4>
                                <p class="lead mb-6"><?php echo html_escape($feature->details); ?></p>
                            </div>

                            <div class="col-10 col-sm-9 col-md-6 col-lg-7 text-center mb-5 mb-md-0 pl-md-5 pl-lg-10 order-1 order-md-2">
                                <img src="<?php echo base_url($feature->image) ?>" class="screen-one" alt="Feature Image">
                            </div>
                        <?php endif ?>
                    </div>
                <?php $i++; endforeach; ?>
            </div>
        </section>
    <?php endif; ?>
    <!-- features -->


    <section class="zindex-low resultbg py-8 pb-10">
        <div class="container z0">
            <div class="w-md-80 w-lg-80 text-center mx-auto mb-6" data-aos="fade-up">
                <h1 class="display-5 font-weight-bold mx-auto mt-0 w-lg-70 text-dblue"><?php echo trans('a-platform-that-engineered-for-success') ?></h1>
            </div>

            <div class="row">
                <div class="col-md-4" data-aos="zoom-in-up" data-aos-delay="150">
                    <div class="text-center m-2 py-6 px-4 round-2 resultitem">
                        <p class="text-muted"><?php echo trans('empowered-by') ?></p>
                        <h1 class="mb-2 display-2 mx-auto text-dblue font-weight-bold"><?php echo shortend_number($count_users) ?></h1>
                        <p class="mb-2 fs-20 mx-auto text-dark"><?php echo trans('doctors') ?></p>
                    </div>
                </div>

                <div class="col-md-4" data-aos="zoom-in-up" data-aos-delay="150">
                    <div class="text-center m-2 py-6 px-4 round-2 resultitem">
                        <p class="text-muted"><?php echo trans('we-have-scheduled-over') ?></p>
                        <h1 class="mb-2 display-2 mx-auto text-dblue font-weight-bold"><?php echo shortend_number($count_bookings) ?></h1>
                        <p class="mb-2 fs-20 mx-auto text-dark"><?php echo trans('bookings') ?></p>
                    </div>
                </div>

                <div class="col-md-4" data-aos="zoom-in-up" data-aos-delay="150">
                    <div class="text-center m-2 py-6 px-4 round-2 resultitem">
                        <p class="text-muted"><?php echo trans('we-have-generated-over') ?></p>
                        <h1 class="mb-2 display-2 mx-auto text-dblue font-weight-bold"><?php echo shortend_number($count_prescriptions) ?></h1>
                        <p class="mb-2 fs-20 mx-auto text-dark"><?php echo trans('prescriptions') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Blog -->
    <?php if (settings()->enable_blog == 1 && !empty($posts)): ?>
        <section class="bg-light pt-6">
            <div class="container">
                <div class="w-md-80 w-lg-50 text-center mx-auto mb-8 mb-lg-10" data-aos="fade-up">
                    <span class="badge badge-secondary-soft badge-pill mb-3"><?php echo trans('blogs') ?></span>
                    <h1 data-aos="fade-up display-3"><?php echo trans('learn-more-empower-yourself') ?></h1>
                </div>

                <div class="row">
                    <?php $p=1; foreach ($posts as $post): ?>
                        <?php include'include/blog_post_item.php'; ?>
                    <?php $p++; endforeach ?>
                </div>
            </div>
        </section>
    <?php endif ?>
    <!-- End Blog -->



    <section class="pt-6 get_started">
        <div class="container">
            <div class="row justify-content-center">
            <div class="text-center col-md-6 mb-5 mt-5 mb-lg-7 mt-0 mt-lg-5 mt-xl-0">
                <h3 data-aos="fade-up" class="h1 mb-2 mt-4 text-light font-weight-normal"><?php echo trans('start-using') ?> <?php echo html_escape(settings()->site_name) ?> <?php echo trans('account') ?></h3>
                <p data-aos="fade-up" data-aos-delay="150" class="text-light"><?php echo trans('home-intro-desc') ?></p>
                <a data-aos="fade-up" data-aos-delay="250" href="<?php echo base_url('register') ?>" class="badge badge-light badge-pill py-3"><?php echo trans('get-started') ?> <i class="fas fa-long-arrow-alt-right"></i></a>
            </div>
            </div>
        </div>
    </section>