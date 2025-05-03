<section class="others-category" style="margin-top:70px;">
    <div class="container">
        <?php
        // echo "<pre>";
        // print_r($single_post); ?>
        <div class="row">
            <div class="col-md-8">
                <div class="blog-details">
                    <h4 class="text-danger">
                        <?= !empty(($single_post->top_subtitle)) ? $single_post->top_subtitle : "<br>"; ?>
                    </h4>
                    <h1><?= $single_post->post_title; ?></h1>
                    <h6><?= !empty(($single_post->bottom_subtitle)) ? $single_post->bottom_subtitle : "<br>"; ?></h6>
                    <ul>
                        <li><b> <?= $single_post->authorName; ?></b>&nbsp; <?= $single_post->authorLocation; ?>
                            <span>|</span>
                        </li>

                        <?php if (strtotime($single_post->created_at) == strtotime($single_post->updated_at) or $single_post->updated_at == null) { ?>
                            <li><i class="bi bi-calendar-week" style="margin-right: 5px;"></i>&nbsp; প্রকাশ :
                                <?php // en2bnNumber(date("d M Y", strtotime($single_post->updated_at))); ?>
                                <?php // en2bnNumber(date("g:i A", strtotime($single_post->updated_at))); ?>
                                <?php echo en2bnNumber(mdate("%d %M %Y %H:%i", strtotime($single_post->created_at))); ?>

                            </li>
                        <?php } else { ?>
                            <li id="created_at" style="cursor: pointer;">
                                <i class="bi bi-calendar-week" style="margin-right: 5px;"></i>&nbsp; প্রকাশ :
                                <?php echo en2bnNumber(mdate("%d %M %Y %H:%i", strtotime($single_post->created_at))); ?>
                                <?php // en2bnNumber(date("d M Y H:i:s", strtotime($single_post->created_at))); ?>
                                <?php // en2bnNumber(date("g:i A", strtotime($single_post->created_at))); ?>
                                <span class="bi bi-arrow-down-short"></span>
                            </li>
                            <li id="updated_at" style="display: none; cursor: pointer;"><i class="bi bi-calendar-week"
                                    style="margin-right: 5px;"></i>&nbsp; আপডেট :
                                <?php // en2bnNumber(date("d M Y", strtotime($single_post->updated_at))); ?>
                                <?php // en2bnNumber(date("g:i A", strtotime($single_post->updated_at))); ?>
                                <?php echo en2bnNumber(mdate("%d %M %Y %H:%i", strtotime($single_post->updated_at))); ?>
                            </li>

                        <?php } ?>

                    </ul>

                    <div class="blog-details-img-add">
                        <?php if (!empty($single_post->post_image)) { ?>
                            <img src="<?php echo base_url('uploads') ?>/<?= $single_post->post_image; ?>"
                                alt="<?= $single_post->title; ?>" class="img-fluid">
                            <div class="image-caps">
                                <?= $single_post->image_caps; ?>
                            </div>

                        <?php } ?>

                    </div>
                    <div class="blog-info mt-4">
                        <?= $single_post->post_content; ?>
                        <br>

                        <div class="rating mb-4">
                            <h5>ক্যাটাগরি: <?= $single_post->title; ?></h5>
                            <p>
                            <div class="rating" style="margin-left: 10px;">
                                <span class="bi bi-star-fill star" style="color: #FFC500;" data-value="1">&nbsp;</span>
                                <span class="bi bi-star-fill star" style="color: #FFC500;" data-value="2">&nbsp;</span>
                                <span class="bi bi-star-fill star" style="color: #FFC500;" data-value="3">&nbsp;</span>
                                <span class="bi bi-star-fill star" style="color: #FFC500;" data-value="4">&nbsp;</span>
                                <span class="bi bi-star-fill star" style="color: #FFC500;" data-value="5">&nbsp;</span>
                            </div>
                            <p id="rating-result"></p> &nbsp; রেটিং:
                            <?= en2bnNumber(get_average_rating($single_post->post_id)); ?>
                            </p>

                        </div>
                        <div style="margin-left: 20px;" class="sharethis-inline-share-buttons mt-4 mb-4"></div>
                    </div>
                    <div class="blog-details-img-add">
                        <img src="<?php echo base_url(); ?>/uploads/ads1.png" alt=""
                            class="img-fluid rounded mx-auto d-block">
                    </div>
                </div>
                <div class="latest-post mt-4">
                    <h1>এই বিভাগের আরও পোস্ট</h1>
                    <div class="row mt-2">
                        <?php // print_r($latest_post); ?>
                        <?php foreach ($latest_post as $cpost): ?>

                            <div class="col-md-4 col-sm-4">
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
                                        <li> <?= $cpost->authorName; ?><span>|</span></li>
                                        <li> <?php // var_dump($cpost->created_at) ?> <i
                                                class="bi bi-calendar-week"></i>&nbsp;<?php echo en2bnNumber(mdate("%d-%m-%Y", strtotime($cpost->created_at))); ?>
                                        </li>
                                    </ul>
                                    <div class="rating">
                                        <h5>ক্যাটাগরি: <?= $cpost->title; ?></h5>
                                        <p><i
                                                class="bi bi-star-fill"></i><?= en2bnNumber(get_average_rating($cpost->post_id)); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="more-reed">
                    <h1>সর্বশেষ </h1>

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
                                        <li><b> <?= $cpost->authorName; ?></b>&nbsp;<?= $cpost->authorLocation; ?> </li>
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

                    <div class="gap" style="margin: 60px 0px;"></div>

                    <h1>সবচেয়ে পঠিত</h1>
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

                    <div class="more-reed-single">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="add-blog">
                                    <img src="<?php echo base_url('uploads') ?>/ads4.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="blog-jorip">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="jorip">
                                    <h2>আজকের জরিপ 01</h2>
                                    <p>আপনি কোন সাহিত্যিকের কবিতা বা রচনা রোমান্টিক আন্দোলনের সঙ্গে সম্পর্কিত মনে
                                        করেন? </p>


                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ok" value=""
                                            id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            কবি রবীন্দ্রনাথ ঠাকুর
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ok" value=""
                                            id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            কবি কালীপ্রসন্ন সিংহ
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ok" value=""
                                            id="flexCheckChecked1">
                                        <label class="form-check-label" for="flexCheckChecked1">
                                            কবি গোবিন্দচন্দ্র দে
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ok" value=""
                                            id="flexCheckChecked2">
                                        <label class="form-check-label" for="flexCheckChecked2">
                                            কাউকেই না
                                        </label>
                                    </div>
                                    <button type="button" class="btn btn-primary">মতামত প্রদান</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.querySelectorAll('.star').forEach(star => {
        star.addEventListener('click', function () {
            let rating = this.getAttribute('data-value');
            document.getElementById('rating-result').innerText = `You rated this ${rating} stars!`;

            // Send rating to the server (AJAX)
            fetch('<?= base_url('post/rating'); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `rating=${rating}`
            }).then(response => response.text()).then(data => console.log(data));
        });
    });
</script>


<script>
    const postId = <?= $single_post->post_id; ?>; // Replace with dynamic post ID

    document.querySelectorAll('.star').forEach(star => {
        star.addEventListener('click', function () {
            let rating = this.getAttribute('data-value');
            document.getElementById('rating-result').innerText = `আপনি ${rating} রেটিং দিয়েছেন!`;

            fetch('<?= base_url("post/rating") ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `post_id=${postId}&rating=${rating}`
            }).then(response => response.json()).then(data => {
                //alert(data.message);
                loadAverageRating();
            });
        });
    });

    function loadAverageRating() {
        fetch('<?= base_url("post/get_average/") ?>' + postId)
            .then(response => response.json())
            .then(data => {
                document.getElementById("avg-rating").innerText = data.average || "No ratings yet";
            });
    }

    loadAverageRating();

    $(document).ready(function () {
        $('#toggleBtn').click(function () {
            $('#myDiv').toggle();
        });
    });
</script>