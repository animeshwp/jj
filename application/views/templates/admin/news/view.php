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
                  <div class="card-header"><h3 class="card-title">Posts</h3></div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Published Date</th>
                          <th style="width: 40px">Status</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php $i=1; foreach ($post_content as $posts ): ?>                        
                        <tr class="align-middle">
                          <td><a href="<?php echo base_url('admin/news/editnews/'.$posts->post_id)?>"><i class="fa-regular fa-pen-to-square"></i></a></td>
                          <td>
                            <?php 
                            echo $posts->post_title;

                            ?>
                            
                          </td>
                          <td width="10%">                            
                            <?php echo category_name_acc_to_id($posts->cat_id)->title;?>                              
                          </td>
                          <td width="12%"><?php echo en2bnNumber(mdate("%d-%m-%Y %H:%i:%s", strtotime($posts->created_at)));?></td>
                          <td><span class="badge text-bg-success"><?php echo ($posts->post_status==1)? "Published":"Draft";?></span></td>
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