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
              <div class="col-xl-12 col-md-12">
                <div class="card mb-4">
                  <div class="card-header"><h3 class="card-title">Home Page Menu Settings</h3></div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Title</th>
                          <th>Postion</th>
                          <th>Active</th>                          
                        </tr>
                      </thead>
                      <tbody>
                        <form action="<?= base_url('admin/options/saveit')?>" method="post" >
                        <?php foreach (categories() as $category ): ?>                        
                        <tr class="align-middle">
                          <td>&nbsp;</td>
                          <td><?= $category->title;?> <input type="hidden" name="data[catId][]" value="<?= $category->id;?>" /></td>
                          <td>
                            <select name="data[cat_loc][]" class="form-select">
                              <option selected disabled>...</option>
                              <?php foreach (homeMenu() as $key=>$position) {?>                               
                              <option <?php echo  set_select('data[cat_loc][]', $key); ?> value="<?= $key;?>"><?= $position; ?></option>
                             <?php } ?>
                            </select>
                          </td>
                          <td>
                            <select name="data[status][]" class="form-select">
                              <option selected disabled>...</option>
                              <option value="yes" <?php echo  set_select('data[status][]', "yes", 'selected'); ?> >Yes</option>
                              <option value="no" <?php echo  set_select('data[status][]', "no", 'selected'); ?>>No</option>
                            </select>
                          </td>
                        </tr> 
                        <?php endforeach ?> 
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
