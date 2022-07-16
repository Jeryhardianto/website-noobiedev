<div class="page-wrapper">
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title mt-3">Form Tambah Video</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                Form Tambah Video
                            </li>
                        </ol>
                    </nav>
                </div>
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
                    <form class="form-horizontal" action="<?= BASEURL ?>/video/_proses_tambah_video" method="post"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h4 class="card-title">Tambah Video</h4>
                                    <div class="form-group row">
                                        <label for="lokasi"
                                            class="col-sm-2 text-end control-label col-form-label">Lokasi</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="lokasi" name="lokasi"
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
                                        <th>Lokasi</th>
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
                                                <td>".$ts['lokasi']."</td>
                                                <td>
                                                    <iframe class='d-block w-100' width='300' height='300' src='".$ts['url']."' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
                                                </td>
                                                <td>
                                                    <a href='".BASEURL."/video/edit_video/".$ts['id']."' class='btn btn-warning btn-sm'><i class='fa fa-pencil-alt'></i> Edit</a> ||
                                                    <a href='".BASEURL."/video/delete_edit_video/".$ts['id']."' class='btn btn-danger btn-sm' ><i class='fa fa-trash'></i> Hapus</a>
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