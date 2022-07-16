<?php
$id             = $data['userprofile'][0]['id'];
$username       = $data['userprofile'][0]['username'];
$email          = $data['userprofile'][0]['email'];


?>

<div class="page-wrapper">
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title mt-3">Form Edit Profile</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                Form Edit Profile
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
                    <form class="form-horizontal" action="<?= BASEURL ?>/userprofile/_proses_edit" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h4 class="card-title"></h4>

                                    <div class="form-group row">
                                        <label for="username"
                                            class="col-sm-2 text-end control-label col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="username" name="username"
                                                value="<?= $username ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email"
                                            class="col-sm-2 text-end control-label col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="<?= $email ?>" />
                                        </div>
                                    </div>
                              
                                </div>
                            </div>
                     
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <input type="hidden" name="idprofile" value="<?= $id ?>">
                                <button type="submit" name="editprofile" value="editprofile"
                                    class="btn btn-success float-right mb-4 mr-2">Submit</button>
                                <a href="<?= BASEURL ?>/userprofile"
                                    class="btn btn-danger float-right mb-4 mr-2">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>