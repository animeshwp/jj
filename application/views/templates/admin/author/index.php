 <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Author</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Author</li>
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

              <div class="col-md-7">
                <!--begin::Quick Example-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title"><label for="title" class="form-label">Add Author</label> <code>*</code></div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/author/save')?>">
                    <!--begin::Body-->
                  <div class="card-body">
                     <div class="mb-3">                      
                      <input type="text" name="data[name]" class="form-control" id="title" required placeholder="Author Name" />
                    </div>                                           
                  </div>
                  <!--end::Body-->  

                  <!--begin::Body-->
                  <div class="card-body"><div class="card-title"><label for="title" class="form-label">Slug</label></div>
                    <code>*</code>
                    <div class="mb-3">                        
                      <input type="text" name="data[slug]" class="form-control" id="slug" placeholder="Slug: Write in English" required />
                    </div>                                           
                  </div>
                  <!--end::Body--> 

                  <div class="card-body"> <div class="card-title"><label for="title" class="form-label">Photo</label><code>*</code></div>
                    <!--begin::Row-->
                    <div class="mb-3">
                      <!--begin::Col-->
                                              
                        <input type="file" name="bgimage" class="form-control"/>
                                        
                    </div>                 
                  </div>                
      
                  <div class="card-body"><div class="card-title"><label for="title" class="form-label">About Author</label><code>*</code></div>
                    <div class="input-group">                      
                      <textarea id="summernote" name="data[bio]" placeholder="Category Short Description" class="form-control" aria-label="With textarea"><?= set_value('data[bio]');?></textarea>
                    </div>
                  </div>

                   <div class="card-body"><div class="card-title"><label for="title" class="form-label">Status <code>*</code></label></div>
                    <div class="input-group">                      
                      <div class="mb-3 form-check">
                        <table>
                          <tr>
                            <td><input type="radio" name="data[status]" value="1" class="form-check-input" id="exampleCheck1" checked>
                        <label class="form-check-label" for="exampleCheck1">Active</label></td>
                            <td><input  type="radio" name="data[status]" value="0" class="form-check-input" id="exampleCheck2" style="margin-left: 20px;">
                        <label class="form-check-label" style="margin-left:10px" for="exampleCheck2">Inactive</label></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>

                    <div class="card-footer">
                      <button class="btn btn-primary btn-lg btn-block" style="float:right;" type="submit">Save</button>
                    </div>
               </form>
                </div>
                <!--end::Input Group-->
              </div>
              <!--end::Col-->

              <div class="col-md-5">
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title"><label for="title" class="form-label">Author List</label></div></div>
                  <!--end::Header-->
                  <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th width="40%">Name</th>
                      <th>Picturs</th>
                      <th width="30%">Enrulled Date</th>                          
                      <th style="width: 40px">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ( $authors as $author ): ?>
                    <tr class="align-middle">
                      <td><a href="<?php  echo base_url('admin/author/editauthor/'.$author->id)?>"><i class="fa-regular fa-pen-to-square"></i></a></td>
                      <td> <?php  echo $author->name; ?> </td>
                      <td><img src="<?= base_url('uploads/authors/'.$author->picture);?>" class="rounded container-fluid"  alt="<?php  echo $author->name; ?>" title="<?php  echo $author->name; ?>" />
                      </td>

                      <td width="12%"><?php  echo en2bnNumber(mdate("%d-%m-%Y %H:%i:%s", strtotime($author->created_at)));?></td>
                      <td><span class="badge text-bg-success"><?php echo ($author->status==1)? "Active":"Inactive";?></span></td>
                    </tr> 
                    <?php  endforeach ?>                        
                  </tbody>
                </table>
              </div>

                </div>
              </div>
          
            </div>
            <div class="card-header"><div class="card-title">&nbsp;</div></div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->

