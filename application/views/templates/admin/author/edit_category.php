 <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Category</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Category</li>
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
              <!--begin::Col-->
              <div class="col-12">
                <div class="callout callout-info">
                  For detailed documentation of Form visit
                  <a href=" " target="_blank" rel="noopener noreferrer" class="callout-link" > Bootstrap Form </a>
                </div>
              </div>         
              <?php // print_r($edit_content);?>
              <div class="col-md-12">
                <!--begin::Quick Example-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title"><label for="title" class="form-label">Add Category</label></div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/category/update_category/'.$edit_content->id)?>">
                    <!--begin::Body-->

                    <div class="card-body">
                      <div class="card-title">Category Name</div><code>*</code>
                      <div class="mb-3">                      
                        <input type="text" name="data[title]" class="form-control" id="title" required value="<?= $edit_content->title;?>" />
                      </div>                                           
                    </div>
                    <!--end::Body-->  

                    <!--begin::Body-->
                    <div class="card-body">
                      <code>*</code>
                      <div class="mb-3">                        
                        <input type="text" name="data[slug]" class="form-control" id="slug" value="<?= $edit_content->slug;?>" required />
                      </div>                                           
                    </div>
                    <!--end::Body--> 

                  <div class="card-body">
                      <!--begin::Row-->
                      <div class="row mb-3">
                        <!--begin::Col-->
                        <div class="col-md-12">                           
                          <input type="file" name="bgimage" class="form-control"/>
                          <?php if(!empty($edit_content->bgimage)){?>
                          <img width="10%" src="<?= base_url('uploads/'.$edit_content->bgimage)?>" />
                        <?php } ?>
                        </div>                      
                     
                      </div>
                 
                    </div>                
      
                  <div class="card-body">       
                    <div class="input-group">                      
                      <textarea name="data[sum]" placeholder="Category Short Description" id="sum" class="form-control" aria-label="With textarea"><?= $edit_content->sum;?></textarea>
                    </div>
                  </div>

                   <div class="card-body">       
                    <div class="input-group">                      
                      <div class="mb-3 form-check">
                        <input type="radio" name="data[catStatus]" value="1" <?= ($edit_content->catStatus==1)?"checked":"";?> class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1" >Active</label>
                      </div>
                      <div class="mb-3 form-check">
                        <input  type="radio" name="data[catStatus]" value="0" class="form-check-input" id="exampleCheck2" style="margin-left: 20px;" <?= ($edit_content->catStatus==0)?"checked":"";?>>
                        <label class="form-check-label" style="margin-left:10px" for="exampleCheck2">Inactive</label>
                      </div>
                    </div>
                  </div>

                    <div class="card-footer">
                      <button class="btn btn-info" type="submit">Save</button>
                    </div>
                </div>
                <!--end::Input Group-->
               </form>
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

