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
              <?php //  print_r($edit_subcontent);?>
              
              <!--begin::Col-->
              <div class="col-md-12">
                <!--begin::Different Height-->
                <div class="card card-secondary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-sub_cat"><label for="validationCustom04" class="form-label">Add Sub-Category</label></div></div>
                  <!--end::Header-->
                  <form action="<?php echo base_url('admin/category/update_subcategory/'.$edit_subcontent->id)?>" method="post">
                  <!--begin::Body-->
                  <div class="card-body">Sub-Category<code>*</code>
                    <div class="mb-3">                        
                      <input type="text" name="data[sub_cat]" class="form-control" id="sub_cat" required placeholder="Sub-Category" value="<?= $edit_subcontent->sub_cat;?>" />
                    </div>                                           
                  </div>
                  <div class="card-body">Slug<code>*</code>
                    <div class="mb-3">                        
                      <input type="text" name="data[slug]" class="form-control" id="title" required placeholder="Write in English" value="<?= $edit_subcontent->slug;?>" />
                    </div>                                           
                  </div>

                  <div class="card-body">Category<code>*</code>                    
                      <select class="form-select" id="validationCustom04" name="data[cat_id]">
                        <option selected disabled value="">Choose Category...</option>
                        <?php foreach (categories() as $category) { ?>
                        <option value="<?php echo $category->id;?>" <?=  ($category->id == $edit_subcontent->cat_id)? "selected":""; ?> ><?php echo $category->title;?></option> <?php } ?>
                      </select>
                  </div>
                             
                
                  <div class="card-body">       
                    <div class="input-group">                      
                      <div class="mb-3 form-check">
                        <input type="radio" name="data[status]" value="1" <?= ($edit_subcontent->status==1)?"checked":"";?> class="form-check-input" id="exampleCheck1" checked>
                        <label class="form-check-label" for="exampleCheck1">Active</label>
                      </div>
                      <div class="mb-3 form-check">
                        <input  type="radio" name="data[status]" value="0" <?= ($edit_subcontent->status==0)?"checked":"";?> class="form-check-input" id="exampleCheck2" style="margin-left: 20px;">
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

