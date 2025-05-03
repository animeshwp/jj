 <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Options</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Options</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row g-4">   
            <div class="col-12">
                <div class="callout callout-info alert">
                  For detailed documentation of Form visit
                  <a href=" " target="_blank" rel="noopener noreferrer" class="callout-link" > Bootstrap Form </a>
                </div>
              </div>
              <!--end::Col-->       
              <!--begin::Col-->
              <div class="col-xl-4 col-md-4">
                <div class="card mb-4">
                  <div class="card-header"><h3 class="card-title">Home Page Menu Settings</h3></div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <?php //print_r($menu);
                    
                    ?>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Position</th>
                          <th>Menu Name</th>
                        </tr>
                      </thead>
                      <form action="<?= base_url('admin/options/saveit')?>" method="post" >
                      <tbody>
                        <tr class="align-middle">
                          <td>&nbsp;</td>
                          <td>Light Box 1</td>
                          <td>
                            <select name="data[loc_1]" class="form-select">
                              <option selected disabled>...</option>
                              <?php foreach (categories() as $category ) {?>                               
                              <option <?= ($category->id==$menu->loc_1)? "selected":"";?> value="<?= $category->id; ?>"><?= $category->title; ?></option>
                             <?php } ?>
                            </select>
                          </td>
                        </tr>

                        <tr class="align-middle">
                          <td>&nbsp;</td>
                          <td>Light Box 2</td>
                          <td>
                            <select name="data[loc_2]" class="form-select">
                              <option selected disabled>...</option>
                              <?php foreach (categories() as $category ) {?>                               
                              <option <?= ($category->id==$menu->loc_2)? "selected":"";?> value="<?= $category->id; ?>"><?= $category->title; ?></option>
                             <?php } ?>
                            </select>
                          </td>
                        </tr>

                        <tr class="align-middle">
                          <td>&nbsp;</td>
                          <td>Light Box 3</td>
                          <td>
                            <select name="data[loc_3]" class="form-select">
                              <option selected disabled>...</option>
                              <?php foreach (categories() as $category ) {?>                               
                              <option <?= ($category->id==$menu->loc_3)? "selected":"";?> value="<?= $category->id; ?>"><?= $category->title; ?></option>
                             <?php } ?>
                            </select>
                          </td>
                        </tr>

                        <tr class="align-middle">
                          <td>&nbsp;</td>
                          <td>Light Box 4</td>
                          <td>
                            <select name="data[loc_4]" class="form-select">
                              <option selected disabled>...</option>
                              <?php foreach (categories() as $category ) {?>                               
                              <option <?= ($category->id==$menu->loc_4)? "selected":"";?> value="<?= $category->id; ?>"><?= $category->title; ?></option>
                             <?php } ?>
                            </select>
                          </td>
                        </tr>

                        <tr class="align-middle">
                          <td>&nbsp;</td>
                          <td>Light Box 5</td>
                          <td>
                            <select name="data[loc_5]" class="form-select">
                              <option selected disabled>...</option>
                              <?php foreach (categories() as $category ) {?>                               
                              <option <?= ($category->id==$menu->loc_5)? "selected":"";?> value="<?= $category->id; ?>"><?= $category->title; ?></option>
                             <?php } ?>
                            </select>
                          </td>
                        </tr>

                        <tr class="align-middle">
                          <td>&nbsp;</td>
                          <td>Light Box 6</td>
                          <td>
                            <select name="data[loc_6]" class="form-select">
                              <option selected disabled>...</option>
                              <?php foreach (categories() as $category ) {?>                               
                              <option <?= ($category->id==$menu->loc_6)? "selected":"";?> value="<?= $category->id; ?>"><?= $category->title; ?></option>
                             <?php } ?>
                            </select>
                          </td>
                        </tr>

                        <tr class="align-middle">
                          <td>&nbsp;</td>
                          <td>Light Box 7</td>
                          <td>
                            <select name="data[loc_7]" class="form-select">
                              <option selected disabled>...</option>
                              <?php foreach (categories() as $category ) {?>                               
                              <option <?= ($category->id==$menu->loc_7)? "selected":"";?> value="<?= $category->id; ?>"><?= $category->title; ?></option>
                             <?php } ?>
                            </select>
                          </td>
                        </tr>

                        <tr class="align-middle">
                          <td>&nbsp;</td>
                          <td>Light Box 8</td>
                          <td>
                            <select name="data[loc_8]" class="form-select">
                              <option selected disabled>...</option>
                              <?php foreach (categories() as $category ) {?>                               
                              <option <?= ($category->id==$menu->loc_8)? "selected":"";?> value="<?= $category->id; ?>"><?= $category->title; ?></option>
                             <?php } ?>
                            </select>
                          </td>
                        </tr>

                        <tr class="align-middle">
                          <td>&nbsp;</td>
                          <td>Light Box 9</td>
                          <td>
                            <select name="data[loc_9]" class="form-select">
                              <option selected disabled>...</option>
                              <?php foreach (categories() as $category ) {?>                               
                              <option <?= ($category->id==$menu->loc_9)? "selected":"";?> value="<?= $category->id; ?>"><?= $category->title; ?></option>
                             <?php } ?>
                            </select>
                          </td>
                        </tr>

                        <tr class="align-middle">
                          <td>&nbsp;</td>
                          <td>Light Box 10</td>
                          <td>
                            <select name="data[loc_10]" class="form-select">
                              <option selected disabled>...</option>
                              <?php foreach (categories() as $category ) {?>                               
                              <option <?= ($category->id==$menu->loc_10)? "selected":"";?> value="<?= $category->id; ?>"><?= $category->title; ?></option>
                             <?php } ?>
                            </select>
                          </td>
                        </tr>

                        <tr class="align-middle">
                          <td>&nbsp;</td>
                          <td>Light Box 11</td>
                          <td>
                            <select name="data[loc_11]" class="form-select">
                              <option selected disabled>...</option>
                              <?php foreach (categories() as $category ) {?>                               
                              <option <?= ($category->id==$menu->loc_11)? "selected":"";?> value="<?= $category->id; ?>"><?= $category->title; ?></option>
                             <?php } ?>
                            </select>
                          </td>
                        </tr>

                        <tr class="align-middle">
                          <td>&nbsp;</td>
                          <td>Light Box 12</td>
                          <td>
                            <select name="data[loc_12]" class="form-select">
                              <option selected disabled>...</option>
                              <?php foreach (categories() as $category ) {?>                               
                              <option <?= ($category->id==$menu->loc_12)? "selected":"";?> value="<?= $category->id; ?>"><?= $category->title; ?></option>
                             <?php } ?>
                            </select>
                          </td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                    <p><input class="btn btn-primary btn-lg btn-block" type="submit" value="Save/Update"></p>
                        </form>                       
                  </div>
                </div>
              </div>
              <!--end::Col-->            
            </div>
            <div class="card-header"><div class="card-title">&nbsp;</div></div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->


      <script charset="utf-8" src="<?php echo base_url();?>/js/kindeditor.js"></script>
      <script charset="utf-8" src="<?php echo base_url();?>/js/plugins/code/prettify.js"></script>
 
      <script>
        KindEditor.ready(function(K) {
            var editor1 = K.create('textarea[name="widget_text"]', {
                cssPath : '<?php echo base_url();?>js/plugins/code/prettify.css',
                uploadJson : '<?php echo base_url();?>php/upload_json.php',
                fileManagerJson : '<?php echo base_url();?>php/file_manager_json.php',
                allowFileManager : true,
                afterCreate : function() {
                    var self = this;
                    K.ctrl(document, 13, function() {
                        self.sync();
                        K('form[name=example]')[0].submit();
                    });
                    K.ctrl(self.edit.doc, 13, function() {
                        self.sync();
                        K('form[name=example]')[0].submit();
                    });
                }
            });
            prettyPrint();
        });
    </script>
