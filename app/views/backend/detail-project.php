<div class="page-wrapper">
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title mt-3">Form Tambah Detail Project <?= $data['project'][0]['nama_project'] ?></h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                Form Tambah Detail Project
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
                    <form class="form-horizontal" action="<?= BASEURL ?>/project/_proses_tambah" method="post"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h4 class="card-title">Tambah Detail Project</h4>
                                    <div class="form-group row">
                                        <label for="judul"
                                            class="col-sm-2 text-end control-label col-form-label">Judul</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="judul" name="judul"
                                                placeholder="Ketik Disini" required />
                                        </div>
                                    </div>

                                    <!--                                    <div class="form-group row">-->
                                    <!--                                        <label for="deskripsi"-->
                                    <!--                                               class="col-sm-2 text-end control-label col-form-label">Deskripsi</label>-->
                                    <!--                                        <div class="col-sm-10">-->
                                    <!--                                          <textarea class="form-control" rows="5" placeholder="Ketik Disini"-->
                                    <!--                                                    id="deskripsi" name="deskripsi" required></textarea>-->
                                    <!--                                        </div>-->
                                    <!--                                    </div>-->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <label class="col-sm-12 col-form-label">Foto</label>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="file" id="gambarDProject" name="gambarDProject"
                                                    onchange="previewDProject();" required />
                                            </div>
                                            <div class="col-sm-6">
                                                <img id="gambarDProjectPrev"
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
                                <input type="hidden" name="idproject" value="<?= $data['idproject']  ?>">
                                <button type="submit" name="Dproject" value="Dproject"
                                    class="btn btn-success float-right mb-4 mr-2">Submit</button>
                                <a href="<?= BASEURL ?>/project"
                                    class="btn btn-danger float-right mb-4 mr-2">Kembali</a>
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

                            <table class="table" id="exa6">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                if (count($data['Dproject'])) {
                                    $count = 1;
                                    foreach ($data['Dproject'] as $ts) {

                                       echo "
                                    
                                            <tr>
                                                <td>".$count++."</td>
                                                <td>".$ts['nama_project']."</td>
                                                <td><img src='".BASEURL."/assets/upload/".$ts['foto']."' width='100'></td>
                                                <td>
                                                    <a href='".BASEURL."/project/project_detail_edit/".$ts['id']."' class='btn btn-warning btn-sm'><i class='fa fa-pencil-alt'></i> Edit</a> ||
                                                    <a href='".BASEURL."/project/project_detail_delete/".$ts['id']."' class='btn btn-danger btn-sm' ><i class='fa fa-trash'></i> Hapus</a>
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



    <!-- Ini Untuk Video -->

    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Konten -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card custom-border-top box-card">
                    <form class="form-horizontal" action="<?= BASEURL ?>/project/_proses_tambah_video" method="post"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h4 class="card-title">Tambah Video Project</h4>
                                    <div class="form-group row">
                                        <label for="nama_video"
                                            class="col-sm-2 text-end control-label col-form-label">Nama Video</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama_video" name="nama_video"
                                                placeholder="Ketik Disini" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="url" class="col-sm-2 text-end control-label col-form-label">Url Video</label>
                                        <div class="col-sm-10">
                                            <textarea type='url' name="url" id="url" cols="70" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <input type="hidden" name="idproject" value="<?= $data['idproject']  ?>">
                                <button type="submit" name="AddVideo" value="AddVideo"
                                    class="btn btn-success float-right mb-4 mr-2">Submit</button>
                                <a href="<?= BASEURL ?>/project"
                                    class="btn btn-danger float-right mb-4 mr-2">Kembali</a>
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

                            <table class="table" id="exa6">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Video</th>
                                        <th>Video</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                if (count($data['video'])) {
                                    $count = 1;
                                    foreach ($data['video'] as $ts) {
                                        
                                       echo "
                                    
                                            <tr>
                                                <td>".$count++."</td>
                                                <td>".$ts['nama_video']."</td>
                                                <td>
                                                    <iframe class='d-block w-100' width='300' height='300' src='".$ts['url']."' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
                                                </td>
                                                <td>
                                                    <a href='".BASEURL."/project/edit_video/".$ts['id']."/".$ts['id_project']."' class='btn btn-warning btn-sm'><i class='fa fa-pencil-alt'></i> Edit</a> ||
                                                    <a href='".BASEURL."/project/delete_edit_video/".$ts['id']."/".$ts['id_project']."' class='btn btn-danger btn-sm' ><i class='fa fa-trash'></i> Hapus</a>
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