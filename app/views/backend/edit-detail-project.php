<?php
$idproject = $data['iddetailproject'][0]['id_project'];

$namaProject = $data['iddetailproject'][0]['nama_project'];
$foto = $data['iddetailproject'][0]['foto'];

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
                    <form class="form-horizontal" action="<?= BASEURL ?>/project/_proses_edit_detail_project"
                        method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h4 class="card-title">Project</h4>
                                    <div class="form-group row">
                                        <label for="judul"
                                            class="col-sm-2 text-end control-label col-form-label">Judul</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="judul" name="judul"
                                                value="<?= $namaProject ?>" required />
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
                                                <input type="file" id="gambarDProject" name="EditgambarDProject"
                                                    onchange="previewDProject();" />
                                            </div>
                                            <div class="col-sm-6">
                                                <img id="gambarDProjectPrev"
                                                    src="<?= BASEURL ?>/assets/upload/<?= $foto ?>" alt="image preview"
                                                    width="300" />
                                                <input type="text" hidden name="fotoPrev" value="<?= $foto ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <input type="hidden" name="iddetailproject" value="<?= $data['iddetailprojectx']  ?>">
                                <input type="hidden" name="idproject" value="<?= $idproject ?>">

                                <button type="submit" name="editDetailProject" value="editDetailProject"
                                    class="btn btn-success float-right mb-4 mr-2">Submit</button>
                                <a href="<?= BASEURL ?>/project/detail_project/<?= Session::get('idproject') ?>"
                                    class="btn btn-danger float-right mb-4 mr-2">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>