<?php
$namaProject    = $data['project'][0]['nama_project'];
$deskripsi      = $data['project'][0]['deskripsi'];
$gambar         = $data['project'][0]['gambar'];

?>

<div class="page-wrapper">
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title mt-3">Form Edit Project</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                Form Edit Project
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
                    <form class="form-horizontal" action="<?= BASEURL ?>/project/_proses_edit_project" method="post"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h4 class="card-title">Project</h4>
                                    <div class="form-group row">
                                        <label for="namaproject"
                                            class="col-sm-2 text-end control-label col-form-label">Project</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="namaproject" name="namaproject"
                                                value="<?= $namaProject ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="deskripsi"
                                            class="col-sm-2 text-end control-label col-form-label">Deskripsi</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="5" placeholder="Ketik Disini"
                                                id="deskripsi" name="deskripsi"> <?= $deskripsi ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <label class="col-sm-12 col-form-label">Foto</label>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="file" id="gambarDProject" name="EditGambar"
                                                    onchange="previewDProject();" />
                                            </div>
                                            <div class="col-sm-6">
                                                <img id="gambarDProjectPrev"
                                                    src="<?= BASEURL ?>/assets/upload/<?= $gambar ?>"
                                                    alt="image preview" width="300" />
                                                <input type="text" hidden name="fotoPrev" value="<?= $gambar ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <input type="hidden" name="idproject" value="<?= $data['idprojectx']  ?>">

                                <button type="submit" name="editProject" value="editProject"
                                    class="btn btn-success float-right mb-4 mr-2">Submit</button>
                                <a href="<?= BASEURL ?>/project"
                                    class="btn btn-danger float-right mb-4 mr-2">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>