 <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Update Post</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> <a href="<?php echo base_url('admin/news/list');?>">All Post</a></li>
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
                  For detailed documentation of Form visit
                  <a href=" " target="_blank" rel="noopener noreferrer" class="callout-link" > Bootstrap Form </a>
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
                  <form method="post" action="<?php echo base_url('admin/news/updatenews/'.$postContent->post_id);?>" enctype='multipart/form-data'>
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <input placeholder="Top Subtitle" type="text" name="data[top_subtitle]" class="form-control" id="title" value="<?php echo $postContent->top_subtitle; ?>" />
                      </div>                                           
                    </div>
                    <!-- Main Title  Start -->
                    <div class="card-body">
                      <div class="mb-3">
                        <input placeholder="News Title" type="text" name="data[post_title]" class="form-control" id="title" value="<?php echo $postContent->post_title; ?>" />
                      </div>                                           
                    </div>
                    <!-- Main Title End -->

                    <div class="card-body">
                      <div class="mb-3">
                        <input placeholder="Bottom Subtitle" type="text" name="data[bottom_subtitle]" class="form-control" id="title" value="<?php echo $postContent->bottom_subtitle; ?>"/>
                      </div>                                           
                    </div>
                   
                    <!--end::Body-->  
                  <div class="card-header"><div class="card-title"><label>Post Summery</label><code>*</code></div></div>

                   <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <textarea type="text" rows="3" name="data[post_summary]" class="form-control" required placeholder=" 100 charecter Limit" ><?php echo $postContent->post_summary; ?></textarea>
                      </div>                                           
                    </div>
                    <!--end::Body-->                
                  
                  <!--end::Form-->
                
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title"><label for="post_content">Post Content</label><code>*</code></div></div>
                  <!--end::Header-->
                  <!--begin::Body-->
                  <div class="card-body">       
                    <div class="input-group">                      
                      <textarea id="summernote"  rows="20" name="data[post_content]" id="" class="form-control" ><?php echo $postContent->post_content; ?></textarea>
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
                  <div class="card-header"><div class="card-title"><label for="validationCustom04" class="form-label">Category</label><code>*</code></div></div>
                  <!--end::Header-->
                  <!--begin::Body-->
                  
                  <div class="card-body">                    
                    <select class="form-control" id="validationCustom04" name="data[cat_id]">
                      <option selected disabled value="">Choose...</option>
                      <?php foreach (categories() as $category) { ?>
                      <option value="<?= $category->id;?>"  <?=  ($category->id == $postContent->cat_id)? "selected":""; ?> ><?php echo $category->title;?></option>                           
                      <?php } ?>
                    </select>
                  </div>                
                </div>
                <!--end::Different Width-->
                <!--end::Body-->
                 
                <div class="card card-info card-outline mb-4">
                <!--begin::Header-->
                  <div class="card-header"><div class="card-title"><label class="form-label">Sub Category</label><i>*</i></div></div>
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
                 
                <div class="card card-info card-outline mb-4">
                <!--begin::Header-->
                  <div class="card-header"><div class="card-title"><label>Athor's Information</label><code>*</code></div></div>
                  <!--end::Header-->
                  <!--begin::Body-->
                  <div class="card-body">  
                    <input placeholder="Author's Name" type="text" name="data[authorName]" class="form-control" id="title" value="<?php echo $postContent->authorName; ?>" required />
                  </div>

                  <div class="card-body">  
                    <input placeholder="Location" type="text" name="data[authorLocation]" class="form-control" id="title" value="<?php echo $postContent->authorLocation; ?>" required />
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
                          <td><label for="Drafted" class="form-label ms-4 me-2"> Drafted:</label> <input id="Drafted" <?= ($postContent->post_status==0)? "checked":""; ?>  type="radio" name="data[post_status]" value="0" ></td>
                          <td><label for="Published" class="form-label ms-4 me-2">Published:</label> <input id="Published" <?= ($postContent->post_status==1)? "checked":""; ?> type="radio" name="data[post_status]" value="1" > </td>
                          <td><label for="un-Published" class="form-label ms-4 me-2">Un-Published:</label> <input id="un-Published" <?= ($postContent->post_status==2)? "checked":""; ?> type="radio" name="data[post_status]" value="2" > </td>
                        </tr>
                      </table>
                  </div>
                </div>
               
                <!--end::Body-->

                <div class="card card-info card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title"><label class="form-label">Image</label></div> &nbsp; (<code>1024px X 650px</code>)</div>
                  <!--end::Header-->

                  <div class="card-body">
                    <!--begin::Row-->
                    <div class="row mb-3">
                      <!--begin::Col-->
                      <div class="col-md-12">                           
                        <input type="file" name="post_image" class="form-control" /><br/><br/> 
                        <textarea type="text" rows="3" name="data[image_caps]" class="form-control" placeholder="Feature Image Caption" ><?= $postContent->image_caps;?></textarea>                        
                      </div>                     
                    </div>                 
                  </div> 

                  
               
                <!--end::Body-->
                <!--begin::Form Validation-->
                 
                  <!--begin::Header-->
                   <!--end::Header-->
                  <!--begin::Form-->
                
                    <!--begin::Body-->
                   
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer col-12">
                      <input class="btn btn-primary btn-lg btn-block" type="submit" value="Save">
                    </div>
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
                  <!--begin::JavaScript-->
                  
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