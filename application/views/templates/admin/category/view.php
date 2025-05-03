 <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">All Categories</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">All Categories</li>
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
              <div class="col-xl-6 col-md-6">
                <div class="card mb-4">
                  <div class="card-header"><h3 class="card-title">Cagtegory</h3></div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Category</th>
                          <th>Slug</th>
                          <th width="25%">Published Date</th>
                          <th style="width:10%">Status</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach ($category as $cats ): ?>                        
                        <tr class="align-middle">
                          <td><a href="<?php echo base_url('admin/category/editcategory/'.$cats->id)?>"><i class="fa-regular fa-pen-to-square"></i></a></td>
                          <td>
                            <?php echo $cats->title; ?>                            
                          </td>
                          <td>                            
                            <?php echo $cats->slug;?>                              
                          </td>
                          <td><?php echo en2bnNumber(mdate("%d-%m-%Y %H:%i:%s", strtotime($cats->created_at)));?></td>
                          <td><span class="badge text-bg-success"><?php echo ($cats->catStatus==1)? "Published":"Draft";?></span></td>
                        </tr> 
                        <?php endforeach ?>                        
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-end">
                      <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <!--end::Col-->    

              <!--begin::Col-->
              <div class="col-xl-6 col-md-6">
                <div class="card mb-4">
                  <div class="card-header"><h3 class="card-title">Sub Category</h3></div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Sub Category</th>
                          <th>Slug</th>
                          <th  width="20%">Category</th>
                          <th>Published Date</th>
                          <th style="width: 10%">Status</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach ($sub_category as $sub_cats ): ?>                        
                        <tr class="align-middle">
                          <td><a href="<?php echo base_url('admin/category/editsubcategory/'.$sub_cats->id)?>"><i class="fa-regular fa-pen-to-square"></i></a></td>
                          <td>
                            <?php echo $sub_cats->sub_cat; ?>                            
                          </td>
                          <td>
                            <?php echo $sub_cats->slug; ?>                            
                          </td>
                          <td>                            
                            <?php echo category_name_acc_to_id($sub_cats->cat_id)->title;?>                              
                          </td>
                          <td width="25%"><?php echo en2bnNumber(mdate("%d-%m-%Y %H:%i:%s", strtotime($sub_cats->created_at)));?></td>
                          <td><span class="badge text-bg-success"><?php echo ($sub_cats->status==1)? "Published":"Draft";?></span></td>
                        </tr> 
                        <?php endforeach ?>                        
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-end">
                      <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
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
