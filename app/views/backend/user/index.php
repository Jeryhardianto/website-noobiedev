
<div class="page-wrapper">
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title mt-3">Edit Profile</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <!-- <li class="breadcrumb-item active" aria-current="page">
                                Form Edit Project
                            </li> -->
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
             <div class="card">
                <div class="card-body">
                  <!-- <h4 class="card-title mb-0">Recent Posts</h4> -->
                  <div class="card mb-3" style="max-width: 540px;">
                   <div class="row no-gutters">
                       <div class="col-md-4">
                       <img src="<?= BASEURL ?>/assets/backend/images/user.png" width="100%" alt="...">
                       </div>
                       <div class="col-md-8">
                           <?php 
                           foreach ($data['userprofile'] as $pr) {
                               $id          = $pr['id'];
                               $username    = $pr['username'];
                               $email       = $pr['email'];
                           }
                           ?>
                       <div class="card-body">
                           <h5 class="card-title">Username : <?= $username?></h5>
                           <h5 class="card-title">Email : <?= $email?></h5>
                           <br>
                           <br>
                           <br>
                           <a href="<?= BASEURL ?>/userprofile/editprofie/<?= $id ?>" class="btn btn-primary">Edit</a>
                           <a href="<?= BASEURL ?>/userprofile/resetpass/<?= $id ?>" class="btn btn-primary">Reset Password</a>
                       </div>
                       </div>
                   </div>
                   </div>
                </div>
              </div>
        </div>
    </div>