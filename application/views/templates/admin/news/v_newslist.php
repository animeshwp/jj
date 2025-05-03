 <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">All Post</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">All Post</li>
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
          
              <!--end::Col-->       
              <!--begin::Col-->
              <div class="col-xl-12 col-md-12">
                <div class="card mb-4">
                  <div class="card-header"><h3 class="card-title" style="float:right;"> <a class="btn btn-primary btn-sm" href="<?php echo base_url('admin/news'); ?>">Add Posts</a> </h3></div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 60px">#</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Author</th>
                          <th>Published Date</th>
                          <th style="width: 40px">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1; foreach ($post_content as $posts ): ?>                        
                        <tr class="align-middle">
                          <td>
                            <a style="color: blue;" href="<?php echo base_url('admin/news/editnews/'.$posts->post_id)?>"><i class="fa-regular fa-pen-to-square"></i></a> |
                            <a style="color: red; float:right;" onclick="confirmDelete(<?php echo $posts->post_id;?>)" ><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                          <td> 
                            <?php echo $posts->post_title; ?>
                          </td>
                          <td width="10%">                            
                            <?php echo category_name_acc_to_id($posts->cat_id)->title;?>                              
                          </td>
                          <td width="10%">                            
                            <?php echo $posts->authorName?>                              
                          </td>
                          <td width="12%"><?php echo en2bnNumber(mdate("%d-%m-%Y", strtotime($posts->created_at)));?></td>
                          <td>
                            <?php if ($posts->post_status==1) { ?>
                             <span class="badge text-bg-success">Published</span>
                            <?php }elseif ($posts->post_status == 0) { ?>
                              <span class="badge text-bg-secondary">Draft</span>
                            <?php }else{ ?>
                              <span class="badge text-bg-danger">Un-Published </span>
                            <?php }?>                          
                        </td>
                        </tr> 
                        <?php endforeach ?>                        
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                    <?php echo $links;?>
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

        function confirmDelete(id) {
          if (confirm("Are you sure you want to delete this news item?")) {
              fetch("<?php echo base_url('admin/news/delete/'); ?>", {
                  method: "POST",
                  headers: {
                      "Content-Type": "application/json"
                  },
                  body: JSON.stringify({ id: id }) // Sending JSON data
              })
              .then(response => response.json()) // Convert response to JSON
              .then(data => {
                  if (data.success) {
                      alert("News deleted successfully!");
                      location.reload(); // Reload page after deletion
                  } else {
                      alert("Error: " + data.message);
                  }
              })
              .catch(error => console.error("Error:", error));
          }
      }
    </script>
