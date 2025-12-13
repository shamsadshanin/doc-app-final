<?php if (isset($is_cdomain) && $is_cdomain == true): ?>
    <?php $site_url = settings()->site_url.'/';?>
<?php else: ?>
    <?php $site_url = base_url();?>
<?php endif; ?>

<!-- check profile access -->


    <?php include'include/profile_header.php'; ?>


    <section class="p-0 mb-5">
       <div class="container-fluid">
          <div class="row p-0">
             <div class="col-md-12 p-0">
                 <?php if (empty($user->image)): ?>
                    <?php $user_image = base_url('assets/images/avatar.png') ?>
                <?php else: ?>
                    <?php $user_image = base_url($user->image) ?>
                <?php endif ?>

                <?php if (!empty($user->banner)) {
                    $bannerimg = $user->banner;
                } else {
                    $bannerimg = 'assets/front/img/default.jpg';
                }
                ?>

                <div class="bg-cover overlay overlay-black overlay-30" style="background-image:url(<?php echo base_url($bannerimg) ?>)">
                </div>
             </div>
          </div>
       </div>
       <div class="container">
          <div class="row">
             <div class="col-md-8">
                <div class="d-flex justify-content-between">
                   <div class="mr-3">
                      <div class="mentor-profile-img pull-left" style="background-image: url(<?php echo $user_image; ?>)">
                        <?php if ($user->is_verified == 1): ?>
                         <span class="verified-pbadge text-primary">
                            <img width="40px" src="<?php echo base_url('assets/images/approved.png') ?>">
                         </span>
                         <?php endif ?>

                         <div class="inactive_icon_profile d-none">
                            <p><i class="bi bi-circle-fill "></i></p>
                         </div>
                      </div>
                   </div>
                   <div class="media-body pt-3">
                      <h2 class="text-dark mb-0 font-weight-bold"><?php echo html_escape($user->name) ?></h2>
                      
                      <p class="font-weight-light text-dark fs-18 mb-1"> <?php echo ucfirst($user->specialist) ?> 
                         <span class="fw-600"><?php echo trans('specialist') ?></span>
                      </p>

                      <p class="font-weight-light fs-14 mb-1"> <?php echo ($user->degree) ?></p>


                      <ul class="list-unstyled social-icon2 mb-0">
                        <?php if (!empty($user->facebook)) : ?>
                            <li class="mr-3 fs-12"><a target="_blank" href="<?= prep_url($user->facebook) ?>"><i class="bi bi-facebook fs-20"></i></a></li>
                        <?php endif ?>

                        <?php if (!empty($user->twitter)) : ?>
                            <li class="mr-3 fs-12"><a target="_blank" href="<?= prep_url($user->twitter) ?>"><i class="bi bi-twitter fs-20"></i></a></li>
                        <?php endif ?>

                        <?php if (!empty($user->linkedin)) : ?>
                            <li class="mr-3 fs-12"><a target="_blank" href="<?= prep_url($user->linkedin) ?>"><i class="bi bi-linkedin fs-20"></i></a></li>
                        <?php endif ?>

                        <?php if (!empty($user->instagram)) : ?>
                            <li class="mr-3 fs-12"><a target="_blank" href="<?= prep_url($user->instagram) ?>"><i class="bi bi-instagram fs-20"></i></a></li>
                        <?php endif ?>
                    </ul>


                   </div>
                </div>
             </div>
             
          </div>
          <div class="row mt-8">
             <div class="col-md-12">
                <div class="tab-card-header">
                   <ul class="nav nav-tabs card-header-tabs bbm-1 pb-0" id="myTab" role="tablist">
                      <li class="nav-item">
                         <a class="nav-link active" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true"><?php echo trans('overview') ?></a>
                      </li>
                      <li class="nav-item">
                         <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="false"><?php echo trans('reviews') ?> 
                         <span class="fs-12"></span>
                         </a>
                      </li>
                   </ul>
                </div>
             </div>

             <div class="tab-content mt-5" id="myTabContent" style="width: 100%">
                <div class="tab-pane fade show active" id="one" role="tabpanel" aria-labelledby="one-tab">
                   <div class="row">
                      <div class="col-md-6">
                         <p class="pl-2 mb-5"><?php echo html_escape($user->about_me) ?>
                         </p>
                         
                         <!-- experience -->
                         <?php if (!empty($experiences)): ?>
                         <div class="sidebar-info mb-5 mt-0 pl-2">
                            <div class="d-flex justify-content-start">
                               <p class="font-weight-light text-dark fs-20 mb-2 fw-600"><?php echo trans('experiences') ?> </p>
                            </div>
                            <div class="sidebar-item shadow-lg">
                                <?php $e=1; foreach ($experiences as $experience): ?>
                                    <div class="sidebar-item-row d-flex justify-content-between align-items-center">
                                      <div class="d-flex justify-content-end">
                                         <div class="mr-3 sidebar-icon">
                                            <i class="bi bi-archive"></i>
                                         </div>
                                         <div class="sidebar-item-info">
                                            <p class="mb-0 mt-0 sidebar-item-title text-dark fs-15"><?php echo html_escape($experience->title) ?><span class="text-muted fs-12 ml-2"> (<?php echo html_escape($experience->years) ?>)</span></p>
                                            <p class="fs-12 pr-1"><?php echo html_escape($experience->details) ?></p>
                                         </div>
                                      </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                         </div>
                         <?php endif ?>

                      

                         <!-- educations -->
                         <?php if (!empty($educations)): ?>
                         <div class="sidebar-info mb-5 mt-0 pl-2">
                            <div class="d-flex justify-content-start">
                               <p class="font-weight-light text-dark fs-20 mb-2 fw-600"><?php echo trans('educations') ?></p>
                            </div>
                            
                            <?php foreach ($educations as $education): ?>
                                <div class="sidebar-item mb-3 shadow-lg">
                                   <div class="sidebar-item-row d-flex justify-content-start align-items-center">
                                      <div class="mr-3 sidebar-icon">
                                         <i class="bi bi-mortarboard"></i>
                                      </div>
                                      <div class="sidebar-item-info">
                                         <p class="mb-0 mt-0 sidebar-item-title text-dark fs-15"><?php echo html_escape($education->title) ?> (<?php echo html_escape($education->years) ?>)</p>

                                         <p class="mb-0 sidebar-item-info text-muted fs-13"><?php echo html_escape($education->details) ?></p>
                                      </div>
                                   </div>
                                </div>
                            <?php endforeach ?>
                         </div>
                         <?php endif ?>

                      </div>




                      <div class="col-md-6">
                         <div class="sidebar-item right-overview shadow-lg br-10 ml-md-5">
                            
                            <div class="row pl-2">

                                <div class="col-md-12">
                                    <h5 class="pl-4 pt-5 fw-600"><i class="bi bi-info-circle"></i> <?php echo trans('booking-availability') ?></h5>

                                    <?php $days = get_days(); ?>
                                    <ul class="list-group p-3">
                                        <?php $i=1; foreach ($days as $day): ?>

                                            <?php foreach ($my_days as $asnday): ?>
                                                <?php if ($asnday['day'] == $i) {
                                                    $check = 'check';
                                                    break;
                                                  } else {
                                                    $check = 'times not';
                                                  }
                                                ?>
                                            <?php endforeach ?>


                                            <li class="list-group-item blur d-flex justify-content-between align-items-center py-2">
                                                <span>
                                                    <span class="text-dark fs-16"><?php echo trans($day) ?> </span>
                                                    
                                                </span>

                                                <span>
                                                    <?php if ($check == 'check'): ?>
                                                        <span class="fs-20"><i class="bi bi-x-circle text-danger"></i> </span>
                                                    <?php else: ?>
                                                        <span class="fs-20"><i class="bi bi-check-circle text-success"></i> </span>
                                                    <?php endif ?>
                                                </span>
                                            </li> 
                                        <?php  $i++; endforeach ?>
                                    
                                    </ul>
                                </div>

                                <div class="col-md-12 pl-0"><div class="divider"></div></div>

                                <div class="col-md-12">
                                    <h5 class="pl-4 mb-0 fw-600"><i class="bi bi-calendar2-check"></i> <?php echo trans('book-appointment') ?></h5>

                                    <form class="pl-2" id="booking_form" method="post" action="<?php echo base_url('profile/book_appointment/'.$user->slug); ?>"  autocomplete="off">
                                        <div class="step1 p-3">

                                            <?php if (count($chambers) > 1): ?>
                                                <div class="form-group">
                                                    <label for="chamber" class="text-dark"><?php echo trans('chambers') ?> <span class="text-danger">*</span></label>
                                                    <select class="form-control" name="chamber" required="required">
                                                        <?php foreach ($chambers as $chamber): ?>
                                                            <option value="<?php echo html_escape($chamber->id) ?>"><?php echo html_escape($chamber->name) ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            <?php else: ?>
                                                <input type="hidden" class="mb-4" name="chamber" value="<?php echo $chambers[0]->id ?>">
                                            <?php endif ?>

                                            <div class="form-group">
                                                <label for="chamber" class="text-dark"> <?php echo trans('appointment-type') ?> <span class="text-danger">*</span></label>
                                                <select class="form-control" id="app_type" name="type" required="required">
                                                      <option value=""><?php echo trans('select-type') ?></option>
                                                      <?php if (evisit_settings($user->id)->status == 1): ?>
                                                        <option value="1"><?php echo trans('online-consultation') ?></option>
                                                      <?php endif ?>
                                                      <option value="2"><?php echo trans('offline') ?></option>
                                                  
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label class="text-dark"><?php echo trans('date') ?> <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control datepicker" id="datepicker" name="date" autocomplete="off">
                                            </div>

                                            <div class="form-group">
                                              <div class="col-md-12 p-0 text-center" id="load_data">
                                              </div>
                                            </div>

                                            <?php if (isset(evisit_settings($user->id)->price) && evisit_settings($user->id)->price != 0): ?>
                                            <p class="text-dark mb-2">
                                                <?php echo trans('consultation-fee') ?>: <?php echo currency_symbol($user->currency); ?><?php echo evisit_settings($user->id)->price; ?>
                                                    
                                            </p class="text-dark">
                                            <?php endif ?>

                                            <button type="submit" class="btn btn-primary w-100 confirm_step mb-3"><?php echo trans('continue') ?></button>
                                        </div>

                                        <div class="step2" style="display: none;">
                                            <div class="cards tab-card">
                                              <div class="card-header tab-card-header mb-6 pt-0">
                                                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                                  <li class="nav-item">
                                                      <a class="nav-link active click_new" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true"><i class="fa fa-user-plus"></i> <?php echo trans('new-registration') ?></a>
                                                  </li>
                                                  <li class="nav-item click_old">
                                                      <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false"> <?php echo trans('already-have-account') ?></a>
                                                  </li>
                                                </ul>
                                              </div>

                                              <div class="tab-content px-3" id="myTabContent">
                                                
                                                <div class="tab-pane fade show active mt-3" id="one" role="tabpanel" aria-labelledby="one-tab">
                                                  <div class="form-group">
                                                      <label class="text-dark"><?php echo trans('name') ?> </label>
                                                      <input type="text" class="form-control" name="name">
                                                  </div>

                                                  <div class="form-group">
                                                      <label class="text-dark"><?php echo trans('email') ?> <span class="text-danger">*</span></label>
                                                      <input type="text" class="form-control" name="email">
                                                  </div>

                                                  <div class="form-group">
                                                      <label class="text-dark"><?php echo trans('password') ?> <span class="text-danger">*</span></label>
                                                      <input type="password" class="form-control" name="new_password" autocomplete="off">
                                                  </div>

                                                  <div class="form-group">
                                                      <label class="text-dark"><?php echo trans('phone') ?> <span class="text-danger">*</span></label>
                                                      <input type="text" class="form-control" name="mobile">
                                                  </div>            
                                                </div>

                                                <div class="tab-pane fade mt-3" id="two" role="tabpanel" aria-labelledby="two-tab">
                                                  <div class="form-group">
                                                      <label class="text-dark"><?php echo trans('username') ?> <small>(<?php echo trans('email-or-mobile') ?>)</small> <span class="text-danger">*</span></label>
                                                      <input type="text" class="form-control" name="user_name">
                                                  </div>

                                                  <div class="form-group">
                                                      <label class="text-dark"><?php echo trans('password') ?> <span class="text-danger">*</span></label>
                                                      <input type="password" class="form-control" name="password">
                                                  </div>             
                                                </div>
                                              </div>
                                            </div>

                                            <div class="row p-3 px-5 justify-content-between">

                                              <?php if (settings()->enable_captcha == 1 && settings()->captcha_site_key != ''): ?>
                                                  <div class="g-recaptcha pull-left" data-sitekey="<?php echo html_escape(settings()->captcha_site_key); ?>"></div>
                                              <?php endif ?>

                                              <!-- csrf token -->
                                              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">


                                              <input type="hidden" class="check_patient" name="check_patient" value="0">
                                              <input type="hidden" name="id" value="<?php echo html_escape(md5($user->id)) ?>">
                                              <button type="button" class="btn btn-light-secondary mt-5 back_step"><i class="fas fa-long-arrow-alt-left"></i> <?php echo trans('back') ?> </button>
                                              <button type="submit" class="btn btn-primary mt-5 booking_btn"> <i class="fas fa-calendar-check"></i> <?php echo trans('book-appointment') ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                               <!-- <div class="col-md-6 col-xs-12">
                                  <div class="sidebar-item-row d-flex justify-content-start align-items-center">
                                     <div class="mr-3 esidebar-icon bg-danger-soft">
                                        <i class="bi bi-view-list"></i>
                                     </div>
                                     <div class="sidebar-item-info">
                                        <p class="mb-0 mt-0 sidebar-item-title fs-18">12</p>
                                        <p class="mb-0 sidebar-item-info text-muted">Completed Consultations</p>
                                     </div>
                                  </div>
                               </div>

                               <div class="col-md-6 col-xs-12">
                                  <div class="sidebar-item-row d-flex justify-content-start align-items-center">
                                     <div class="mr-3 esidebar-icon bg-success-soft">
                                        <i class="bi bi-clock"></i>
                                     </div>
                                     <div class="sidebar-item-info">
                                        <p class="mb-0 mt-0 sidebar-item-title fs-18">335 </p>
                                        <p class="mb-0 sidebar-item-info text-muted">Total Patients</p>
                                     </div>
                                  </div>
                               </div>

                               <div class="col-md-6 col-xs-12 d-none">
                                  <div class="sidebar-item-row d-flex justify-content-start align-items-center">
                                     <div class="mr-3 esidebar-icon bg-nprimary-soft">
                                        <i class="bi bi-person-fill-check"></i>
                                     </div>
                                     <div class="sidebar-item-info">
                                        <p class="mb-0 mt-0 sidebar-item-title fs-18">71%</p>
                                        <p class="mb-0 sidebar-item-info text-muted">Average Attendence <span class="pl-1" data-toggle="tooltip" data-placement="bottom" data-title="Total attendance (logged in) on this site divided by the total days since joining" data-original-title="" title=""><i class="bi bi-info-circle"></i></span></p>
                                     </div>
                                  </div>
                               </div>
                               
                               <div class="col-md-6 col-xs-12">
                                  <div class="sidebar-item-row d-flex justify-content-start align-items-center">
                                     <div class="mr-3 esidebar-icon bg-warning-soft">
                                        <i class="bi bi-mortarboard"></i>
                                     </div>
                                     <div class="sidebar-item-info">
                                        <p class="mb-0 mt-0 sidebar-item-title fs-18">
                                           8 Years       
                                        </p>
                                        <p class="mb-0 sidebar-item-info text-muted">Experience</p>
                                     </div>
                                  </div>
                               </div> -->


                            </div>

                         </div>
                      </div>
                   </div>
                </div>

                <div class="tab-pane fade" id="three" role="tabpanel" aria-labelledby="three-tab">
                   <div class="row px-3">

                        <?php $total_rating_user = total_rating_user($user->id); ?>
                        <?php $total_user = get_total_user($user->id) ?>
                        
                        <?php //if (!empty($rating)): ?>
                            <?php $average = get_average_rating($user->id) ?>
                            <?php if ($average != 0): ?>
                            
                                <div class="col-md-6">
                                    <div class="rating-block">
                                        <h5><?php echo trans('average-rating') ?></h5>
                                        <h2 class="bold"><?php echo $average; ?><small>/5</small></h2>
                                         <?php for($i = 1; $i <= 5; $i++):?>
                                            <?php 
                                                if ( round($average - .25) >= $i) {
                                                    $star = "";
                                                } elseif (round($average + .25) >= $i) {
                                                    $star = "-half-o";
                                                } else {
                                                    $star = "-o";
                                                }
                                            ?>
                                            <i class="fa fa-star<?php echo $star;?> fa-2x text-warning"></i> 
                                        <?php endfor;?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    
                                    <h5><?php echo trans('ratings-by-users') ?></h5>
                                    
                                    <div class="d-flex justify-content-start">
                                        <div class="d-flex justify-content-start mr-2">
                                            <span class="fs-18"> 5 </span> <i class="fa fa-star text-warning pt-1"></i>
                                        </div>
                                        <div class="pull-left" style="width:180px;">
                                            <div class="progress" style="height:9px; margin:8px 0;">
                                              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width:  <?php echo count_all_same_ratings($user->id,5)/$total_user*100; ?>%">
                                                <span class="sr-only"></span>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="pull-right" style="margin-left:10px;"><?php echo count_all_same_ratings($user->id,5) ?></div>
                                    </div>

                                    <div class="d-flex justify-content-start">
                                        <div class="d-flex justify-content-start mr-2">
                                            <span class="fs-18"> 4 </span> <i class="fa fa-star text-warning pt-1"></i>
                                        </div>
                                        <div class="pull-left" style="width:180px;">
                                            <div class="progress" style="height:9px; margin:8px 0;">
                                              <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo count_all_same_ratings($user->id,4)/$total_user*100; ?>%">
                                                <span class="sr-only"></span>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="pull-right" style="margin-left:10px;"><?php echo count_all_same_ratings($user->id,4) ?></div>
                                    </div>

                                    <div class="d-flex justify-content-start">
                                        <div class="d-flex justify-content-start mr-2">
                                            <span class="fs-18"> 3 </span> <i class="fa fa-star text-warning pt-1"></i>
                                        </div>
                                        <div class="pull-left" style="width:180px;">
                                            <div class="progress" style="height:9px; margin:8px 0;">
                                              <div class="progress-bar progress-bar-secondary" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo count_all_same_ratings($user->id,3)/$total_user*100; ?>%">
                                                <span class="sr-only"></span>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="pull-right" style="margin-left:10px;"><?php echo count_all_same_ratings($user->id,3) ?></div>
                                    </div>

                                    <div class="d-flex justify-content-start">
                                        <div class="d-flex justify-content-start mr-2">
                                            <span class="fs-18"> 2 </span> <i class="fa fa-star text-warning pt-1"></i>
                                        </div>
                                        <div class="pull-left" style="width:180px;">
                                            <div class="progress" style="height:9px; margin:8px 0;">
                                              <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo count_all_same_ratings($user->id,2)/$total_user*100; ?>%">
                                                <span class="sr-only"></span>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="pull-right" style="margin-left:10px;"><?php echo count_all_same_ratings($user->id,2) ?></div>
                                    </div>

                                    <div class="d-flex justify-content-start">
                                        <div class="d-flex justify-content-start mr-2">
                                            <span class="fs-18"> 1 </span> <i class="fa fa-star text-warning pt-1"></i>
                                        </div>
                                        <div class="pull-left" style="width:180px;">
                                            <div class="progress" style="height:9px; margin:8px 0;">
                                              <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo count_all_same_ratings($user->id,1)/$total_user*100; ?>%">
                                                <span class="sr-only"></span>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="pull-right" style="margin-left:10px;"><?php echo count_all_same_ratings($user->id,1) ?></div>
                                    </div>
                          
                                </div>  

                            <?php else: ?>
                                <div class="col-sm-12 text-center">
                                    <?php echo trans('no-data-found') ?>
                                </div>
                            <?php endif ?>
                        <?php //endif ?>

                    </div>          
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <hr/>
                            <div class="review-block">
                                <?php foreach ($ratings as $rating): ?>
                                    <div class="d-flex justify-content-start align-items-center">
                                        <div class="col-md-222">
                                            <?php if (empty($rating->patient_thumb)): ?>
                                                <?php 

                                                $patient_name = get_by_id($rating->patient_id,'patientses')->name;
                                                $nameParts = explode(" ", trim($patient_name));
                                                $count = count($nameParts);

                                                if ($count === 1) {
                                                    $short_name =  strtoupper(substr($nameParts[0], 0, 1) .' '. substr($nameParts[0], -1, 1));
                                                } else {
                                                   $short_name = strtoupper(substr($nameParts[0], 0, 1) . substr($nameParts[$count - 1], 0, 1));
                                                }

                                            ?>

                                            <div class="bg-lightg mr-3">
                                                <div class="text-avatar"><?php echo trim($short_name) ?></div>
                                            </div>

                                            <?php else: ?>
                                                <?php $avatar = $rating->patient_thumb; ?>
                                                <img src="<?php echo base_url($avatar) ?>" class="img-thumbnail">
                                            <?php endif ?>
                                        </div>
                                        <div class="col-md-1022 pl-0">
                                            <?php for($i = 1; $i <= 5; $i++):?>
                                                <?php 
                                                if($i > $rating->rating){
                                                    $star = '-o';
                                                }else{
                                                    $star = '';
                                                }
                                                ?>
                                                <i class="fa fa-star<?php echo $star;?> text-warning"></i> 
                                            <?php endfor;?>

                                            <div class="review-block-name"><a class="text-dark font-weight-bold" href="#"><?php echo $rating->patient_name ?></a></div>
                                            <div class="review-block-description"><?php echo $rating->feedback ?></div>
                                            <div class="review-block-date"><?php echo my_date_show($rating->created_at) ?></div>
                                        </div>
                                    </div><hr/>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
          </div>

         
       </div>
    </section>


