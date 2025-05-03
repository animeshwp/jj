<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>জীবনজয়ী</title>
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">  

    <link rel="icon" type="image/svg+xml" href="<?= base_url();?>/default.svg">
    <link rel="apple-touch-icon" sizes="192x92" href="<?= base_url();?>/favicons/favicon-192x192.png">
    <link rel="icon" type="image/png" sizes="192x92" href="<?= base_url();?>/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url();?>/favicons/favicon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url();?>/favicons/favicon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url();?>/favicons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url();?>/favicons/favicon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url();?>/favicons/favicon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url();?>/favicons/favicon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url();?>/favicons/favicon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url();?>/favicons/favicon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url();?>/favicons/favicon-180x180.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url();?>/favicons/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url();?>/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="36x36" href="<?= base_url();?>/favicons/favicon-36x36.png">
    <link rel="icon" type="image/png" sizes="48x48" href="<?= base_url();?>/favicons/favicon-48x48.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url();?>/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="128x128" href="<?= base_url();?>/favicons/favicon-128x128.png">
    <link rel="icon" type="image/png" sizes="512x512" href="<?= base_url();?>/favicons/favicon-512x512.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link rel="preconnect" href="<?= base_url();?>/https://fonts.googleapis.com" />
    <link rel="preconnect" href="<?= base_url();?>/https://fonts.gstatic.com" crossorigin="" />
    <link
      href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@100..900&amp;display=swap"
      rel="stylesheet"
    />
    <link href="<?= base_url();?>/css/view/style.css" rel="stylesheet" />
   
  </head>
  <body>
    <div class="menu-search">
      <div class="pc-section">
        <div class="hero pc">
          <img src="view/img/hero.png" alt="" class="img-fluid" />
        </div>
        <div class="btn-menu">
          <a href="<?= base_url('/category/detail/'). category_info_acc_to_id($menu->loc_1)->slug; ?>">
            <span type="button" class="tree-menu btn1-pc btn btn-danger">
              <?= category_info_acc_to_id($menu->loc_1)->title; ?>
            </span></a
          >
          <a href="<?= base_url('/category/detail/'). category_info_acc_to_id($menu->loc_2)->slug; ?>"
            ><span type="button" class="tree-menu btn2-pc btn btn-danger">
              <?= category_info_acc_to_id($menu->loc_2)->title; ?>
            </span></a
          >
          <a href="<?= base_url('/category/detail/'). category_info_acc_to_id($menu->loc_3)->slug; ?>"
            ><span type="button" class="tree-menu btn3-pc btn btn-info">
              <?= category_info_acc_to_id($menu->loc_3)->title; ?>
            </span></a
          >
          <a href="<?= base_url('/category/detail/'). category_info_acc_to_id($menu->loc_4)->slug; ?>"
            ><span type="button" class="tree-menu btn4-pc btn btn-info">
              <?= category_info_acc_to_id($menu->loc_4)->title; ?>
            </span></a
          >
          <a href="<?= base_url('/category/detail/'). category_info_acc_to_id($menu->loc_5)->slug; ?>"
            ><span type="button" class="tree-menu btn5-pc btn btn-warning">
              <?= category_info_acc_to_id($menu->loc_5)->title; ?>
            </span></a
          >
          <a href="<?= base_url('/category/detail/'). category_info_acc_to_id($menu->loc_6)->slug; ?>"
            ><span type="button" class="tree-menu btn6-pc btn btn-success">
              <?= category_info_acc_to_id($menu->loc_6)->title; ?>
            </span></a
          >
          <a href="<?= base_url('/category/detail/'). category_info_acc_to_id($menu->loc_7)->slug; ?>"
            ><span type="button" class="tree-menu btn7-pc btn btn-success">
              <?= category_info_acc_to_id($menu->loc_7)->title; ?>
            </span></a
          >
          <a href="<?= base_url('/category/detail/'). category_info_acc_to_id($menu->loc_8)->slug; ?>"
            ><span type="button" class="tree-menu btn8-pc btn btn-warning">
              <?= category_info_acc_to_id($menu->loc_8)->title; ?>
            </span></a
          >
          <a href="<?= base_url('/category/detail/'). category_info_acc_to_id($menu->loc_9)->slug; ?>"
            ><span type="button" class="tree-menu btn9-pc btn btn-primary">
              <?= category_info_acc_to_id($menu->loc_9)->title; ?>
            </span></a
          >
          <a href="<?= base_url('/category/detail/'). category_info_acc_to_id($menu->loc_10)->slug; ?>"
            ><span type="button" class="tree-menu btn10-pc btn btn-primary">
              <?= category_info_acc_to_id($menu->loc_10)->title; ?>
            </span></a>

          <a href="<?= base_url('/category/detail/'). category_info_acc_to_id($menu->loc_11)->slug; ?>"
            ><span type="button" class="tree-menu btn11-pc btn btn-primary">
              <?= category_info_acc_to_id($menu->loc_11)->title; ?>
            </span></a>

          <a href="<?= base_url('/category/detail/'). category_info_acc_to_id($menu->loc_12)->slug; ?>"
            ><span type="button" class="tree-menu btn12-pc btn btn-primary">
              <?= category_info_acc_to_id($menu->loc_12)->title; ?>
            </span></a>
            
        </div>
      </div>

      <div class="phone-section">
        <div class="hero phon">
          <img src="view/img/phon.png" alt="" class="img-fluid" />
        </div>
        <div class="btn-menu">
          <a href="<?= base_url('/category/detail/'). category_info_acc_to_id($menu->loc_1)->slug; ?>">
            <span type="button" class="tree-menu btn1-phon btn btn-danger">
              <?= category_info_acc_to_id($menu->loc_1)->title; ?>
            </span></a
          >
          <a href="<?= base_url('/category/detail/'). category_info_acc_to_id($menu->loc_2)->slug; ?>"
            ><span type="button" class="tree-menu btn2-phon btn btn-danger">
              <?= category_info_acc_to_id($menu->loc_2)->title; ?>
            </span></a
          >
          <a href="<?= base_url('/category/detail/'). category_info_acc_to_id($menu->loc_3)->slug; ?>"
            ><span type="button" class="tree-menu btn3-phon btn btn-info">
              <?= category_info_acc_to_id($menu->loc_3)->title; ?>
            </span></a
          >
          <a href="<?= base_url('/category/detail/'). category_info_acc_to_id($menu->loc_4)->slug; ?>"
            ><span type="button" class="tree-menu btn4-phon btn btn-info">
              <?= category_info_acc_to_id($menu->loc_4)->title; ?>
            </span></a
          >
          <a href="<?= base_url('/category/detail/'). category_info_acc_to_id($menu->loc_5)->slug; ?>"
            ><span type="button" class="tree-menu btn5-phon btn btn-warning">
              <?= category_info_acc_to_id($menu->loc_5)->title; ?>
            </span></a
          >
          <a href="<?= base_url('/category/detail/'). category_info_acc_to_id($menu->loc_6)->slug; ?>"
            ><span type="button" class="tree-menu btn6-phon btn btn-success">
              <?= category_info_acc_to_id($menu->loc_6)->title; ?>
            </span></a
          >
          <a href="<?= base_url('/category/detail/'). category_info_acc_to_id($menu->loc_7)->slug; ?>"
            ><span type="button" class="tree-menu btn7-phon btn btn-success">
              <?= category_info_acc_to_id($menu->loc_7)->title; ?>
            </span></a
          >
          <a href="<?= base_url('/category/detail/'). category_info_acc_to_id($menu->loc_8)->slug; ?>"
            ><span type="button" class="tree-menu btn8-phon btn btn-warning">
              <?= category_info_acc_to_id($menu->loc_8)->title; ?>
            </span></a
          >
          <a href="<?= base_url('/category/detail/'). category_info_acc_to_id($menu->loc_9)->slug; ?>"
            ><span type="button" class="tree-menu btn9-phon btn btn-primary">
              <?= category_info_acc_to_id($menu->loc_9)->title; ?>
            </span></a>
          <a href="<?= base_url('/category/detail/'). category_info_acc_to_id($menu->loc_10)->slug; ?>"
            ><span type="button" class="tree-menu btn10-phon btn btn-info">
              <?= category_info_acc_to_id($menu->loc_10)->title; ?>
            </span></a>

          <a href="<?= base_url('/category/detail/'). category_info_acc_to_id($menu->loc_11)->slug; ?>"
            ><span type="button" class="tree-menu btn11-phon btn btn-info">
              <?= category_info_acc_to_id($menu->loc_11)->title; ?>
            </span></a>

            <a href="<?= base_url('/category/detail/'). category_info_acc_to_id($menu->loc_12)->slug; ?>"
            ><span type="button" class="tree-menu btn12-phon btn btn-info">
              <?= category_info_acc_to_id($menu->loc_12)->title; ?>
            </span></a>
        </div>
      </div>

      <div class="tree-home">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <nav class="navbar navbar-dark fixed-top">
                <div class="container-fluid">
                  <a class="navbar-brand" href="<?= base_url();?>">
                    <img src="view/img/jj_logo.svg" alt="logo" class="img-fluid" width="200" /> </a>
                  <form class="d-flex mt-3 serch-btn" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-success" type="submit">
                      <i class="bi bi-search"></i>
                    </button>
                  </form>
                  <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasDarkNavbar"
                    aria-controls="offcanvasDarkNavbar"
                    aria-label="Toggle navigation"
                  >
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div
                    class="offcanvas offcanvas-end text-bg-dark"
                    tabindex="-1"
                    id="offcanvasDarkNavbar"
                    aria-labelledby="offcanvasDarkNavbarLabel"
                  >
                    <div
                      class="offcanvas-header"
                      style="border-bottom: 2px solid"
                    >
                      <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"> জীবনজয়ী </h5>
                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close" ></button>
                    </div>
                    <div class="offcanvas-body">
                      <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <?php foreach (categories() as $category) { ?>
                        <li class="nav-item">
                          <a class="nav-link" href="<?= base_url('/category/detail/');?><?= $category->slug; ?>" ><?= $category->title; ?></a>
                        </li> 
                        <?php }?>                       

                                              
                      </ul>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
        <p style="" class="d-flex justify-content-center menu-search">সর্বস্বত্ব সংরক্ষিত ©<?= date('Y');?> জীবনজয়ী</p>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" ></script>
  </body>
</html>