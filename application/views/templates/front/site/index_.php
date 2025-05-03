<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>জীবনজয়ী</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link href="<?= base_url();?>/css/view/style.css" rel="stylesheet" />
    <link rel="preconnect" href="<?= base_url();?>/https://fonts.googleapis.com" />
    <link rel="preconnect" href="<?= base_url();?>/https://fonts.gstatic.com" crossorigin="" />
    <link
      href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@100..900&amp;display=swap"
      rel="stylesheet"
    />
    <style type="text/css">
         * {
      font-family: "Noto Sans Bengali", serif;
      font-optical-sizing: auto;    
      font-style: normal;
      font-variation-settings:
        "wdth" 100;
}
    </style>
  </head>
  <body>
    <div class="menu-search">
      <div class="pc-section">
        <div class="hero pc">
          <img src="view/img/hero.png" alt="" class="img-fluid" />
        </div>
        <div class="btn-menu">
          <a href="<?= base_url('/category/'). category_info_acc_to_id($menu->loc_1)->slug; ?>">
            <button type="button" class="btn1-pc btn btn-danger">
              <?= category_info_acc_to_id($menu->loc_1)->title; ?>
            </button></a
          >
          <a href="<?= base_url('/category/'). category_info_acc_to_id($menu->loc_2)->slug; ?>"
            ><button type="button" class="btn2-pc btn btn-danger">
              <?= category_info_acc_to_id($menu->loc_2)->title; ?>
            </button></a
          >
          <a href="<?= base_url('/category/'). category_info_acc_to_id($menu->loc_3)->slug; ?>"
            ><button type="button" class="btn3-pc btn btn-info">
              <?= category_info_acc_to_id($menu->loc_3)->title; ?>
            </button></a
          >
          <a href="<?= base_url('/category/'). category_info_acc_to_id($menu->loc_4)->slug; ?>"
            ><button type="button" class="btn4-pc btn btn-info">
              <?= category_info_acc_to_id($menu->loc_4)->title; ?>
            </button></a
          >
          <a href="<?= base_url('/category/'). category_info_acc_to_id($menu->loc_5)->slug; ?>"
            ><button type="button" class="btn5-pc btn btn-warning">
              <?= category_info_acc_to_id($menu->loc_5)->title; ?>
            </button></a
          >
          <a href="<?= base_url('/category/'). category_info_acc_to_id($menu->loc_6)->slug; ?>"
            ><button type="button" class="btn6-pc btn btn-success">
              <?= category_info_acc_to_id($menu->loc_6)->title; ?>
            </button></a
          >
          <a href="<?= base_url('/category/'). category_info_acc_to_id($menu->loc_7)->slug; ?>"
            ><button type="button" class="btn7-pc btn btn-success">
              <?= category_info_acc_to_id($menu->loc_7)->title; ?>
            </button></a
          >
          <a href="<?= base_url('/category/'). category_info_acc_to_id($menu->loc_8)->slug; ?>"
            ><button type="button" class="btn8-pc btn btn-warning">
              <?= category_info_acc_to_id($menu->loc_8)->title; ?>
            </button></a
          >
          <a href="<?= base_url('/category/'). category_info_acc_to_id($menu->loc_9)->slug; ?>"
            ><button type="button" class="btn9-pc btn btn-primary">
              <?= category_info_acc_to_id($menu->loc_9)->title; ?>
            </button></a
          >
          <a href="<?= base_url('/category/'). category_info_acc_to_id($menu->loc_10)->slug; ?>"
            ><button type="button" class="btn10-pc btn btn-primary">
              <?= category_info_acc_to_id($menu->loc_10)->title; ?>
            </button></a
          >
          <a href="<?= base_url('/category/'). category_info_acc_to_id($menu->loc_11)->slug; ?>"
            ><button type="button" class="btn11-pc btn btn-primary">
              <?= category_info_acc_to_id($menu->loc_11)->title; ?>
            </button></a
          >
        </div>
      </div>

      <div class="phone-section">
        <div class="hero phon">
          <img src="view/img/phon.png" alt="" class="img-fluid" />
        </div>
        <div class="btn-menu">
          <a href="<?= base_url('/category/'). category_info_acc_to_id($menu->loc_1)->slug; ?>">
            <button type="button" class="btn1-phon btn btn-danger">
              <?= category_info_acc_to_id($menu->loc_1)->title; ?>
            </button></a
          >
          <a href="<?= base_url('/category/'). category_info_acc_to_id($menu->loc_2)->slug; ?>"
            ><button type="button" class="btn2-phon btn btn-danger">
              <?= category_info_acc_to_id($menu->loc_2)->title; ?>
            </button></a
          >
          <a href="<?= base_url('/category/'). category_info_acc_to_id($menu->loc_3)->slug; ?>"
            ><button type="button" class="btn3-phon btn btn-info">
              <?= category_info_acc_to_id($menu->loc_3)->title; ?>
            </button></a
          >
          <a href="<?= base_url('/category/'). category_info_acc_to_id($menu->loc_4)->slug; ?>"
            ><button type="button" class="btn4-phon btn btn-info">
              <?= category_info_acc_to_id($menu->loc_4)->title; ?>
            </button></a
          >
          <a href="<?= base_url('/category/'). category_info_acc_to_id($menu->loc_5)->slug; ?>"
            ><button type="button" class="btn5-phon btn btn-warning">
              <?= category_info_acc_to_id($menu->loc_5)->title; ?>
            </button></a
          >
          <a href="<?= base_url('/category/'). category_info_acc_to_id($menu->loc_6)->slug; ?>"
            ><button type="button" class="btn6-phon btn btn-success">
              <?= category_info_acc_to_id($menu->loc_6)->title; ?>
            </button></a
          >
          <a href="<?= base_url('/category/'). category_info_acc_to_id($menu->loc_7)->slug; ?>"
            ><button type="button" class="btn7-phon btn btn-success">
              <?= category_info_acc_to_id($menu->loc_7)->title; ?>
            </button></a
          >
          <a href="<?= base_url('/category/'). category_info_acc_to_id($menu->loc_8)->slug; ?>"
            ><button type="button" class="btn8-phon btn btn-warning">
              <?= category_info_acc_to_id($menu->loc_8)->title; ?>
            </button></a
          >
          <a href="<?= base_url('/category/'). category_info_acc_to_id($menu->loc_9)->slug; ?>"
            ><button type="button" class="btn9-phon btn btn-primary">
              <?= category_info_acc_to_id($menu->loc_9)->title; ?>
            </button></a
          >
          <a href="<?= base_url('/category/'). category_info_acc_to_id($menu->loc_10)->slug; ?>"
            ><button type="button" class="btn10-phon btn btn-info">
              <?= category_info_acc_to_id($menu->loc_10)->title; ?>
            </button></a
          >
          <a href="<?= base_url('/category/'). category_info_acc_to_id($menu->loc_11)->slug; ?>"
            ><button type="button" class="btn11-phon btn btn-info">
              <?= category_info_acc_to_id($menu->loc_11)->title; ?>
            </button></a
          >
        </div>
      </div>

      <div class="tree-home">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <nav class="navbar navbar-dark fixed-top">
                <div class="container-fluid">
                  <a class="navbar-brand" href="<?= base_url();?>">
                    <img
                      src="view/img/logo.png"
                      alt="logo"
                      class="img-fluid"
                    />
                  </a>
                  <form class="d-flex mt-3 serch-btn" role="search">
                    <input
                      class="form-control me-2"
                      type="search"
                      placeholder="Search"
                      aria-label="Search"
                    />
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
                          <a class="nav-link" href="<?= base_url('/category/');?><?= $category->slug; ?>" ><?= $category->title; ?></a>
                        </li> 
                        <?php }?>                       

                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="<?= base_url();?>/#" >আমাদের সর্ম্পকে</a >
                        </li>                         
                      </ul>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
        <p class="d-flex justify-content-center menu-search">সর্বস্বত্ব সংরক্ষিত ©<?= date('Y');?> জীবনজয়ী</p>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" ></script>
  </body>
</html>
