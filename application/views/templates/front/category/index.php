<section class="adds">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="<?php echo base_url('uploads'); ?>/ads1.png" alt="" class="img-fluid rounded mx-auto d-block">
            </div>
        </div>
    </div>
</section>

<section class="others-category">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="blog-post">
                    <h2 data-bs-toggle="modal" data-bs-target="#searchModal"><?php echo $cat_name->title; ?></h2>
                    <!-- Modal Structure -->
                    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel"
                        style="background: none; border: none;" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5><?php echo $cat_name->title; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        <?php echo $cat_name->sum; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($posts as $post): ?>
                        <div class="col-md-6">
                            <div class="latest-post-single">
                                <?php if (!empty($post->post_image)) { ?>
                                <img src="<?php echo base_url('/uploads/' . $post->post_image); ?>"
                                    alt="<?= $post->title ?>" class="img-fluid">
                                <?php } else { ?>
                                <img src="<?php echo base_url('view/img/jj_image.jpg') ?>" alt="<?= $post->title; ?>"
                                    class="img-fluid">
                                <?php } ?>
                                <a href="<?php echo base_url('/post/detail/') . $post->slug . '/' . $post->post_id; ?>">
                                    <h4><?= $post->post_title; ?></h4>
                                </a>
                                <p>
                                    <?php echo $post->post_summary; ?>
                                </p>
                                <ul>
                                    <li><b> <?= $post->authorName; ?></b><span>|</span></li>
                                    <li><i class="bi bi-calendar-week"></i>
                                        <?= en2bnNumber(date("d M Y", strtotime($post->created_at))); ?></li>
                                </ul>
                                <div class="rating">
                                    <h5> ক্যাটাগরি: <a
                                            href="<?php echo base_url('/category/detail/') . $post->slug; ?>"><?php echo $post->title; ?></a>
                                    </h5>
                                    <p><i
                                            class="bi bi-star-fill"></i><b><?= en2bnNumber(get_average_rating($post->post_id)); ?></b>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <img src="<?php echo base_url('uploads'); ?>/ads.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-md-4">
                <div class="more-reed">
                    <br>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                aria-selected="true">সর্বশেষ</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                aria-selected="false">সর্বাধিক পঠিত</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">

                            <div class="more-reed-single">
                                <div class="row">
                                    <?php foreach ($latest_post as $cpost): ?>
                                    <div class="col-md-5">
                                        <?php if (!empty($cpost->post_image)) { ?>
                                        <img src="<?php echo base_url('/uploads/' . $cpost->post_image); ?>"
                                            alt="<?= $cpost->post_title ?>" class="img-fluid">
                                        <?php } else { ?>
                                        <img src="<?php echo base_url('view/img/jj_image.jpg') ?>"
                                            alt="<?= $cpost->post_title; ?>" class="img-fluid">
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-7">
                                        <a
                                            href="<?php echo base_url('/post/detail/') . $cpost->slug . '/' . $cpost->post_id; ?>">
                                            <p><?= $cpost->post_title; ?></p>
                                        </a>
                                        <ul>
                                            <li><b> <?= $cpost->authorName; ?></b>&nbsp;<?= $cpost->authorLocation; ?>
                                            </li>
                                        </ul>
                                        <div class="rating">
                                            <h5>ক্যাটাগরি: <a href=""> <?= $cpost->title; ?></a> </h5>
                                            <p><i
                                                    class="bi bi-star-fill"></i><?= en2bnNumber(get_average_rating($cpost->post_id)); ?>
                                            </p>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                            <div class="more-reed-single">

                                <?php foreach ($most_viewed as $mvpost) { ?>
                                <?php // print_r($mvpost); ?>

                                <div class="row">
                                    <div class="col-md-5">
                                        <?php if (!empty($mvpost->post_image)) { ?>
                                        <img src="<?php echo base_url('/uploads/' . $mvpost->post_image); ?>"
                                            alt="<?= $mvpost->post_title ?>" class="img-fluid">

                                        <?php } else { ?>
                                        <img src="<?php echo base_url('view/img/jj_image.jpg') ?>"
                                            alt="<?= $mvpost->post_title; ?>" class="img-fluid">
                                        <?php } ?>

                                    </div>
                                    <div class="col-md-7">
                                        <a
                                            href="<?php echo base_url('/post/detail/') . $mvpost->slug . '/' . $mvpost->post_id; ?>">
                                            <p><?= $mvpost->post_title; ?></p>
                                        </a>
                                        <ul>
                                            <li><?= $mvpost->authorName; ?>
                                                <?= !empty($mvpost->authorLocation > 0) ? ", " . $mvpost->authorLocation : ""; ?>
                                            </li>
                                        </ul>
                                        <div class="rating">
                                            <h5><?= $mvpost->title; ?></h5>
                                            <p><i
                                                    class="bi bi-star-fill"></i><?= en2bnNumber(get_average_rating($mvpost->post_id)); ?>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                <?php } ?>
                            </div>

                        </div>
                    </div>

                    <!-- ads -->
                    <div class="more-reed-single">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="add-blog">
                                    <img src="<?= base_url(); ?>/uploads/ads4.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ads -->
                </div>
            </div>
        </div>
    </div>
</section>


<section class="others-category">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="latest-post">
                    <div class="row">
                        <?php
                        if (!empty($postsb))
                            ;
                        foreach ($postsb as $cpost): ?>
                        <div class="col-md-4">
                            <div class="latest-post-single">
                                <?php if (!empty($cpost->post_image)) { ?>
                                <img src="<?php echo base_url('/uploads/' . $cpost->post_image); ?>"
                                    alt="<?= $cpost->title ?>" class="img-fluid">
                                <?php } else { ?>
                                <img src="<?php echo base_url('view/img/jj_image.jpg') ?>" alt="<?= $cpost->title; ?>"
                                    class="img-fluid">
                                <?php } ?>
                                <a
                                    href="<?php echo base_url('/post/detail/') . $cpost->slug . '/' . $cpost->post_id; ?>">
                                    <h4><?= $cpost->post_title; ?></h4>
                                </a>
                                <ul>
                                    <li><b> <?= $cpost->authorName; ?></b><span>|</span></li>
                                    <li><i class="bi bi-calendar-week"></i>
                                        <?= en2bnNumber(date("d M Y", strtotime($cpost->created_at))); ?></li>
                                </ul>
                                <div class="rating">
                                    <h5> ক্যাটাগরি: <a
                                            href="<?php echo base_url('/category/detail/') . $cpost->slug; ?>"><?php echo $cpost->title; ?></a>
                                    </h5>
                                    <p><i
                                            class="bi bi-star-fill"></i><b><?= en2bnNumber(get_average_rating($cpost->post_id)); ?></b>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>

                <div class="col-md-12">
                    <img src="<?php echo base_url('uploads'); ?>/ads1.png" alt="" class="img-fluid">
                </div>

            </div>

            <div class="col-md-4">
                <div class="more-reed">
                    <!-- Survey start -->
                    <div class="blog-jorip">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="jorip">
                                    <h2>আজকের জরিপ 02</h2>
                                    <p>আপনি কোন সাহিত্যিকের কবিতা বা রচনা রোমান্টিক আন্দোলনের সঙ্গে সম্পর্কিত মনে
                                        করেন? </p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ok" value=""
                                            id="flexCheckDefault3">
                                        <label class="form-check-label" for="flexCheckDefault3">
                                            কবি রবীন্দ্রনাথ ঠাকুর
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ok" value=""
                                            id="flexCheckChecked4">
                                        <label class="form-check-label" for="flexCheckChecked4">
                                            কবি কালীপ্রসন্ন সিংহ
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ok" value=""
                                            id="flexCheckChecked5">
                                        <label class="form-check-label" for="flexCheckChecked5">
                                            কবি গোবিন্দচন্দ্র দে
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ok" value=""
                                            id="flexCheckChecked6">
                                        <label class="form-check-label" for="flexCheckChecked6">
                                            কাউকেই না
                                        </label>
                                    </div>
                                    <button type="button" class="btn btn-primary">মতামত প্রদান</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- survey end -->

                    <!-- ads -->
                    <div class="more-reed-single">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="add-blog">
                                    <img src="<?= base_url('uploads'); ?>/ads4.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ads -->
                </div>
            </div>
        </div>
    </div>
</section>