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

              <div class="col-md-6">
                <!--begin::Quick Example-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title"><label for="title" class="form-label">Add Category</label></div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/category/save')?>">
                    <!--begin::Body-->
                  <div class="card-body">
                    <div class="card-title">Category Name</div><code>*</code>
                    <div class="mb-3">                      
                      <input type="text" name="data[title]" class="form-control" id="title" required />
                    </div>                                           
                  </div>
                  <!--end::Body-->  

                  <!--begin::Body-->
                  <div class="card-body">
                    <code>*</code>
                    <div class="mb-3">                        
                      <input type="text" name="data[slug]" class="form-control" id="slug" placeholder="Write in English" required />
                    </div>                                           
                  </div>
                  <!--end::Body--> 

                  <div class="card-body">
                    <!--begin::Row-->
                    <div class="row mb-3">
                      <!--begin::Col-->
                      <div class="col-md-12">                           
                        <input type="file" name="bgimage" class="form-control"/>
                        <div class="valid-feedback">Looks good!</div>
                      </div>                     
                    </div>                 
                  </div>                
      
                  <div class="card-body">       
                    <div class="input-group">                      
                      <textarea id="summernote" name="data[sum]" placeholder="Category Short Description" id="sum" class="form-control" aria-label="With textarea"></textarea>
                    </div>
                  </div>

                   <div class="card-body">       
                    <div class="input-group">                      
                      <div class="mb-3 form-check">
                        <input type="radio" name="data[catStatus]" value="1" class="form-check-input" id="exampleCheck1" checked>
                        <label class="form-check-label" for="exampleCheck1">Active</label>
                      </div>
                      <div class="mb-3 form-check">
                        <input  type="radio" name="data[catStatus]" value="0" class="form-check-input" id="exampleCheck2" style="margin-left: 20px;">
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
              <!--begin::Col-->
              <div class="col-md-6">
                <!--begin::Different Height-->
                <div class="card card-secondary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-sub_cat"><label for="validationCustom04" class="form-label">Add Sub-Category</label></div></div>
                  <!--end::Header-->
                  <form action="<?php echo base_url('admin/category/add_subcategory')?>" method="post">
                  <!--begin::Body-->
                  <div class="card-body"><code>*</code>
                    <div class="mb-3">                        
                      <input type="text" name="data[sub_cat]" class="form-control" id="sub_cat" required placeholder="Sub-Category" value="<?php echo set_value('data[sub_cat]');?>" />
                    </div>                                           
                  </div>
                  <div class="card-body"><code>*</code>
                    <div class="mb-3">                        
                      <input type="text" name="data[slug]" class="form-control" id="title" required placeholder="Write in English" value="<?= set_value('data[slug]');?>" />
                    </div>                                           
                  </div>

                  <div class="card-body"><code>*</code>                    
                      <select class="form-select" id="validationCustom04" name="data[cat_id]">
                        <option selected disabled value="">Choose Category...</option>
                        <?php foreach (categories() as $category) { ?>
                        <option value="<?php echo $category->id;?>" <?php echo  set_select('data[cat_id]', $category->id); ?> ><?php echo $category->title;?></option>                           
                        <?php } ?>
                      </select>
                  </div>
                             
                
                  <div class="card-body">       
                    <div class="input-group">                      
                      <div class="mb-3 form-check">
                        <input type="radio" name="data[status]" value="1" class="form-check-input" id="exampleCheck1" checked>
                        <label class="form-check-label" for="exampleCheck1">Active</label>
                      </div>
                      <div class="mb-3 form-check">
                        <input  type="radio" name="data[status]" value="0" class="form-check-input" id="exampleCheck2" style="margin-left: 20px;">
                        <label class="form-check-label" style="margin-left:10px" for="exampleCheck2">Inactive</label>
                      </div>
                    </div>
                  </div>
               
                  <div class="card-footer">
                      <button class="btn btn-info" type="submit">Save</button>
                    </div>
                    
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
                  <!--begin::JavaScript-->
                  </div>
                  <!--end::JavaScript-->
                
                <!--end::Form Validation-->
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

