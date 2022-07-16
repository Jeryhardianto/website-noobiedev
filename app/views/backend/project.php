<div class="page-wrapper">
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title mt-3">Form Tambah Project</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                Form Tambah Project
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
                    <form class="form-horizontal" action="<?= BASEURL ?>/project/_tambah" method="post"
                          enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h4 class="card-title">Project</h4>
                                    <div class="form-group row">
                                        <label for="namaproject" class="col-sm-2 text-end control-label col-form-label">Nama
                                            Project</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="namaproject" name="namaproject"
                                                   placeholder="Ketik Disini" required/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="deskripsi"
                                               class="col-sm-2 text-end control-label col-form-label">Deskripsi</label>
                                        <div class="col-sm-10">
                                          <textarea class="form-control" rows="5" placeholder="Ketik Disini"
                                                    id="deskripsi" name="deskripsi" required></textarea>
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
                                                <input type="file" id="gambarProject" name="gambarProject"
                                                       onchange="previewProject();" required />
                                            </div>
                                            <div class="col-sm-6">
                                                <img id="gambarProjectPrev"
                                                     src="https://via.placeholder.com/200C/O https://placeholder.com/"
                                                     alt="image preview" width="300" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">

                                <button type="submit" name="project" value="project" class="btn btn-success float-right mb-4 mr-2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="">
                    <div class="card custom-border-top box-card">
                        <div class="card-body">
                            <h4 class="card-title">Preview</h4>

                            <table class="table" id="exa5">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Project</th>
                                    <th>Deskripsi</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (count($data['project'])) {
                                    $count = 1;
                                    foreach ($data['project'] as $ts) {

                                       echo "
                                    
                                            <tr>
                                                <td width='5%'>".$count++."</td>
                                                <td width='15%'>".$ts['nama_project']."</td>
                                                <td width='35%'>".$ts['deskripsi']."</td>
                                                <td width='25%'><img src='".BASEURL."/assets/upload/".$ts['gambar']."' width='100'></td>
                                                <td width='25%'>
                                                    <a href='".BASEURL."/project/detail_project/".$ts['id']."' class='btn btn-warning btn-sm'><i class='fa fa-pencil-alt'></i> Detail Project</a> ||
                                                    <a href='".BASEURL."/project/project_edit/".$ts['id']."' class='btn btn-warning btn-sm'><i class='fa fa-pencil-alt'></i> Edit</a> ||
                                                    <a href='".BASEURL."/project/project_delete/".$ts['id']."' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i> Hapus</a>
                                                </td>
                                            </tr>";

                                    }
                                }else {
                                    echo "<td colspan='6' style='text-align:center'>Data tidak ada</td>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="card-footer">
                            <button type="submit" class="btn btn-success float-right">Submit</button>
                        </div> -->
                    </div>
                </form>
            </div>
        </div>
    </div>