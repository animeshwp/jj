<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">All Ads</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Ads</li>
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
                    <!--begin::Col-->
                    <div class="col-xl-12 col-md-12">
                        <!--begin::Quick Example-->
                        <div class="card card-primary card-outline mb-4">
                            <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <label class="form-label">Ads Content</label>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <form method="post" action="<?php echo base_url('admin/ads/save');?>"
                                enctype='multipart/form-data'>
                                <!--begin::Body-->
                                <div class="col-md-4">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <label for="ads_info">Ads Infomation</label><code>*</code>
                                        </div>
                                        <div class="mb-6">
                                            <input type="text" name="data[ads_info]" class="form-control" id="ads_info"
                                                value="<?php echo set_value('data[ads_info]'); ?>" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <label for="ads-image">Image</label><code>*</code>
                                        </div>
                                        <div class="mb-6">
                                            <input type="file" name="adsimage" class="form-control" id="ads-image"
                                                required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <label for="startDate">Start Date</label><code>*</code>
                                        </div>
                                        <div class="mb-3">
                                            <input type="date" name="data[startDate]" class="form-control"
                                                id="startDate" value="<?php echo set_value('data[startDate]'); ?>"
                                                required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <label for="endDate">End Date</label><code>*</code>
                                        </div>
                                        <div class="mb-3">
                                            <input type="date" name="data[endDate]" class="form-control" id="endDate"
                                                value="<?php echo set_value('data[endDate]'); ?>" required />
                                        </div>
                                    </div>
                                </div>
                                <!-- Ads Location and Position start -->
                                <div class="col-md-3">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <label for="loc">Location</label><code>*</code>
                                        </div>
                                        <div class="mb-3">
                                            <select class="form-control" name="data[loc]" id="loc">
                                                <option value="">Select Location</option>
                                                <?php foreach (loc() as $key => $value) { ?>
                                                <option value="<?= $key;?>"><?= $value; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <label for="pos">Position</label><code>*</code>
                                        </div>
                                        <div class="mb-3">
                                            <select class="form-control" name="data[pos]" id="pos">
                                                <option value="">Select Position</option>
                                                <?php foreach (ads_pos() as $key => $value) { ?>
                                                <option value="<?= $key; ?>"><?= $value; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Ads Location and Position end -->
                                <div class="col-md-3">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="card-title">
                                                <label>Status</label><code style="margin-right:20px;">*</code>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 mt-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="data[status]"
                                                        id="active" value="1">
                                                    <label class="form-check-label" for="active">Active</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="data[status]"
                                                        id="inactive" value="2">
                                                    <label class="form-check-label" for="inactive">Inactive</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="card-footer">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button class="btn btn-primary me-md-2" type="submit">Save</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!--end::Input Group-->
                    </div>
                    <div class="col-md-12">
                        <!--end::Col-->
                        <div class="card mb-4">
                            <div class="card-header">
                                <label class="form-label">All Ads</label>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered" id="example">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Ads Info</th>
                                            <th>Location</th>
                                            <th>Position</th>
                                            <th>Date</th>
                                            <th style="width: 40px">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($all_ads)) foreach ( $all_ads as $ads ): ?>
                                        <tr class="align-middle">
                                            <td><a href="<?php  echo base_url('admin/ads/editads/'.$ads->id)?>"><i
                                                        class="fa-regular fa-pen-to-square"></i></a></td>
                                            <td><?php  echo $ads->ads_info; ?></td>
                                            <td><?php  echo loc()[$ads->loc]; ?></td>
                                            <td><?php  echo  ads_pos()[$ads->pos]; ?></td>

                                            <td width="12%">
                                                <?php  echo en2bnNumber(mdate("%d-%m-%Y", strtotime($ads->created_at)));?>
                                            </td>
                                            <td><span
                                                    class="badge text-bg-success"><?php echo ($ads->status==1)? "Active":"Inactive";?></span>
                                            </td>
                                        </tr>
                                        <?php  endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <div class="card-header">
                <div class="card-title">&nbsp;</div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->