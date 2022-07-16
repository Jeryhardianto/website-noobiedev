<div class="page-wrapper">
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title mt-3">Contact</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                Contact
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
                                        <th>No</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Telp</th>
                                        <th>Maps</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                if (count($data['contact'])) {
                                    $count = 1;
                                    foreach ($data['contact'] as $ts) {
                                        echo "
                                            <tr>
                                                <td width='10%'>".$count++."</td>
                                                <td width='20%' style='text-align:justify'>".$ts['alamat']."</td>
                                                <td width='20%' style='text-align:justify'>".$ts['email']."</td>
                                                <td width='10%' style='text-align:justify'>".$ts['telp']."</td>
                                                <td width='15%' style='text-align:justify'><iframe class='w-100 h-100 no-border-radius' style='margin-bottom: -10px;' src='".$ts['maps']."'
style='border:0;' allowfullscreen=''></iframe></td>
                                                <td width='15%'><img src='".BASEURL."/assets/upload/".$ts['gambar']."' width='100'></td>
                                                <td width='10%'>
                                                    <a href='".BASEURL."/contact/contact_edit/".$ts['id']."' class='btn btn-warning btn-sm'><i class='fa fa-pencil-alt'></i> Edit</a>
                                                </td>
                                            </tr>";
                                    }
                                } else {
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