 <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Add Post</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url('admin/news/list');?>">All Post</a></li>
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
                <div class="callout callout-info alert">
                <?php echo validation_errors(); ?>
                </div>
              </div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-xl-8 col-md-8">
                <!--begin::Quick Example-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title"><label for="title" class="form-label">Post Title</label><code>*</code></div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form method="post" action="<?php echo base_url('admin/news/save');?>" enctype='multipart/form-data'>
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <input placeholder="Top Subtitle" type="text" name="data[top_subtitle]" class="form-control" id="title" value="<?php echo set_value('data[top_subtitle]'); ?>" />
                      </div>                                           
                    </div>
                    <!-- Main Title  Start -->
                    <div class="card-body">
                      <div class="mb-3">
                        <input required placeholder="News Title" type="text" name="data[post_title]" class="form-control" id="title" value="<?php echo set_value('data[post_title]'); ?>" />
                      </div>                                           
                    </div>
                    <!-- Main Title End -->

                    <div class="card-body">
                      <div class="mb-3">
                        <input placeholder="Bottom Subtitle" type="text" name="data[bottom_subtitle]" class="form-control" id="title" value="<?php echo set_value('data[bottom_subtitle]'); ?>"/>
                      </div>                                           
                    </div>
                    <!--end::Body-->  
                  <div class="card-header"><div class="card-title"><label for="post_contents">Post Summery</label><code>*</code></div></div>

                   <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <textarea type="text" rows="3" name="data[post_summary]" class="form-control" required placeholder=" 100 charecter Limit" ><?php echo set_value('data[post_summary]'); ?></textarea>
                      </div>                                           
                    </div>
                    <!--end::Body-->                
                  
                  <!--end::Form-->
                
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title"><label for="post_contents">Post Content</label><code>*</code></div></div>
                  <!--end::Header-->
                  <!--begin::Body-->
                  <div class="card-body">       
                    <div class="input-group">                      
                      <textarea id="summernote" rows="15" name="data[post_content]" id="post_contents" class="form-control" required><?php echo set_value('data[post_content]');?></textarea>
                    </div>
                  </div>
                  <!--end::Body-->
                
                </div>
                <!--end::Input Group-->
               
              </div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-xl-4 col-md-4">
                <!--begin::Different Height-->
                <div class="card card-secondary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header">
                    <div class="card-title"><label for="validationCustom04" class="form-label">Category</label><code>*</code>
                    </div>
                  </div>
                  <!--end::Header-->
                  <!--begin::Body-->
                  
                  <div class="card-body">                    
                      <select class="form-control" id="validationCustom04" name="data[cat_id]" required>
                        <option selected disabled value="">Choose Category...</option>
                        <?php foreach (categories() as $category) { ?>
                        <option value="<?php echo $category->id;?>" <?php echo  set_select('data[cat_id]', $category->id); ?> ><?php echo $category->title;?></option>                           
                        <?php } ?>
                      </select>
                  </div> 
                </div>

                <!--end::Body-->
                 
                <div class="card card-info card-outline mb-4">
                <!--begin::Header-->
                  <div class="card-header">
                    <div class="card-title"><label> Sub Category</label><i>*</i></div>
                  </div>
                  <!--end::Header-->
                  <!--begin::Body-->
                  <div class="card-body">                    
                      <select class="form-control"  name="data[subcat_id]">
                        <option selected value="">Choose Category...</option>
                        <?php
                         foreach (subcategories() as $subcategory) { ?>
                        <option value="<?php echo $subcategory->id;?>" <?php echo  set_select('data[subcat_id]', $subcategory->id); ?> ><?php echo $subcategory->sub_cat;?></option>                           
                        <?php } ?>
                      </select>
                  </div>
                </div>
               
                <!--end::Body-->
                <!--end::Body-->
                 
                <div class="card card-info card-outline mb-4">
                <!--begin::Header-->
                  <div class="card-header"><div class="card-title"><label>Athor's Information</label><code>*</code></div></div>
                  <!--end::Header-->
                  <!--begin::Body-->
                  <div class="card-body">  
                    <input placeholder="Author's Name" type="text" name="data[authorName]" class="form-control" id="title" value="<?php echo set_value('data[authorName]'); ?>" required />
                  </div>

                  <div class="card-body">  
                    <input placeholder="Location" type="text" name="data[authorLocation]" class="form-control" id="title" value="<?php echo set_value('data[authorLocation]'); ?>" required />
                  </div>

                </div>
               
                <div class="card card-info card-outline mb-4">
                <!--begin::Header-->
                  <div class="card-header"><div class="card-title"><label> Status</label><code>*</code></div></div>
                  <!--end::Header-->
                  <!--begin::Body-->
                  <div class="card-body">                    
                      <table>
                        <tr>
                          <td><label for="Drafted" class="form-label ms-4 me-2"> Drafted:</label> <input id="Drafted" class="p2" type="radio" name="data[post_status]" value="0" ></td>
                          <td><label for="Published" class="form-label ms-4 me-2">Published:</label> <input id="Published" class="" type="radio" name="data[post_status]" value="1" > </td>
                          <td><label for="unPublished" class="form-label ms-4 me-2">Un-published:</label> <input id="unPublished" class="" type="radio" name="data[post_status]" value="2" > </td>
                        </tr>
                      </table>
                  </div>
                </div>               
                <!--end::Body-->                
                <!--end::Different Width-->
                <!--begin::Form Validation-->
                <div class="card card-info card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title"><label>Feature Image</label></div><code>* (1024px X 650px)</code></div>
                  <!--end::Header-->

                  <div class="card-body">
                    <!--begin::Row-->
                    <div class="row mb-3">
                      <!--begin::Col-->
                      <div class="col-md-12">                           
                        <input type="file" name="post_image" class="form-control" required /><br/><br/> 
                        <textarea type="text" rows="3" name="data[image_caps]" class="form-control" placeholder="Feature Image Caption" > <?= set_value('data[image_caps]')?></textarea>                        
                      </div>                     
                    </div>                 
                  </div>          
                    <div class="card-footer col-12">
                    </div>         
                </div>
                <!--end::Form Validation-->
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Save" />
              </form>
            </form>
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->



      
