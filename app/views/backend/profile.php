<div class="page-wrapper">
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title mt-3">Profile</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                Profile
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

        <div class="row">
            <div class="col-md-12">
                <form action="">
                    <div class="card custom-border-top box-card">
                        <div class="card-body">

                            <table class="table" id="exa5">
                                <thead>
                                    <tr>
                                        <th width="20%">No</th>
                                        <th width="50%">Profile</th>
                                        <th width="50%">Gambar</th>
                                        <th width="30%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                if (count($data['profile'])) {
                                    $count = 1;
                                    foreach ($data['profile'] as $ts) {

                                       echo "
                                            <tr>
                                                <td width='20%'>".$count++."</td>
                                                <td width='30%' style='text-align:justify'>".$ts['profile']."</td>
                                                <td width='20%'><img src='".BASEURL."/assets/upload/".$ts['gambar']."' width='100'></td>
                                                <td width='30%'>
                                                    <a href='".BASEURL."/profile/profile_edit/".$ts['id']."' class='btn btn-warning btn-sm'><i class='fa fa-pencil-alt'></i> Edit</a>
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