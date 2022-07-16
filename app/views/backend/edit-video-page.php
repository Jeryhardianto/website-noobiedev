<?php
$id           = $data['video'][0]['id'];
$lokasi      = $data['video'][0]['lokasi'];
$url        = $data['video'][0]['url'];

?>

<div class="page-wrapper">
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title mt-3">Form Edit Detail Project</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                Form Edit Detail Project
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Konten -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card custom-border-top box-card">
                    <form class="form-horizontal" action="<?= BASEURL ?>/video/_proses_edit_video"
                        method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h4 class="card-title">Project</h4>
                                    <div class="form-group row">
                                        <label for="lokasi"
                                            class="col-sm-2 text-end control-label col-form-label">Lokasi</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="lokasi" name="lokasi"
                                                value="<?= $lokasi ?>" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <div class="col-md-6">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="url" class="col-sm-2 text-end control-label col-form-label">Url Video</label>
                                        <div class="col-sm-10">
                                            <textarea name="url" id="url" cols="70" rows="10"><?= $url ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <button type="submit" name="editVideo" value="editVideo"
                                    class="btn btn-success float-right mb-4 mr-2">Submit</button>
                                <a href="<?= BASEURL ?>/video"
                                    class="btn btn-danger float-right mb-4 mr-2">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>