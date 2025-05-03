<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">All Notice</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Notice</li>
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
                    <div class="callout callout-info alert"> For detailed documentation of Form visit <a href=" "
                            target="_blank" rel="noopener noreferrer" class="callout-link"> Bootstrap Form </a> </div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-12 col-md-12">
                    <!--begin::Col-->
                    <div class="col-xl-8 col-md-8">
                        <!--begin::Quick Example-->
                        <div class="card card-primary card-outline mb-4">
                            <!--begin::Header-->
                            <div class="card-header">
                                <div class="card-title"><label for="title" class="form-label">Notice
                                        Title</label><code>*</code></div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <form method="post" action="<?php echo base_url('admin/notice/update/'.$enotice->id);?>"
                                enctype='multipart/form-data'>
                                <!--begin::Body-->
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div class=""> <input type="text" name="data[notice_title]" class="form-control"
                                                id="title" value="<?php echo $enotice->notice_title; ?>" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card-header">
                                        <div class="card-title"><label for="post_contents">Date</label><code>*</code>
                                        </div>
                                        <div class="mb-3"> <input type="date" name="data[notice_date]"
                                                class="form-control" id="title"
                                                value="<?php echo $enotice->notice_date; ?>" required /> </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card-header">
                                        <div class="card-title"><label for="post_contents">&nbsp;</label><code>*</code>
                                        </div>
                                        <div class="form-check"> <input class="form-check-input" type="radio"
                                                name="data[status]" id="gridRadios1" value="1"
                                                <?= ($enotice->status ==1)?"checked":""; ?>> <label
                                                class="form-check-label" for="gridRadios1"> Published </label> </div>
                                        <div class="form-check"> <input class="form-check-input" type="radio"
                                                name="data[status]" id="gridRadios1" value="0"
                                                <?= ($enotice->status ==0)?"checked":""; ?>> <label
                                                class="form-check-label" for="gridRadios1"> Draft </label> </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card-footer"> <input type="submit"
                                            class="btn btn-primary btn-lg btn-block" name="Save" value="Update"> </div>
                                </div>
                        </div>
                        <!--end::Input Group-->
                    </div>
                    <!--end::Col-->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">All Notices</h3>
                        </div> <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Notice Head</th>
                                        <th>Date</th>
                                        <th style="width: 40px">Status</th>
                                    </tr>
                                </thead>
                                <tbody> <?php foreach ( $notices as $notice ): ?> <tr class="align-middle">
                                        <td><a href="<?php  echo base_url('admin/notice/editnotice/'.$notice->id)?>"><i
                                                    class="fa-regular fa-pen-to-square"></i></a></td>
                                        <td> <?php  echo $notice->notice_title; ?> </td>
                                        <td width="12%">
                                            <?php  echo en2bnNumber(mdate("%d-%m-%Y %H:%i:%s", strtotime($notice->created_at)));?>
                                        </td>
                                        <td><span
                                                class="badge text-bg-success"><?php echo ($notice->status==1)? "Published":"Draft";?></span>
                                        </td>
                                    </tr> <?php  endforeach ?> </tbody>
                            </table>
                        </div> <!-- /.card-body -->
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