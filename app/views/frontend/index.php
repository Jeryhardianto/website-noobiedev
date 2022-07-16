<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= BASEURL ?>/assets/frontend/img/foto/bg-cover.jpg')" id="home">
    <div class="container">
        <div class="row">
            <div class="ml-auto mr-auto">
                <img src="<?= BASEURL ?>/assets/frontend/img/foto/logo-h-white.png" width="100%" style="opacity: 0.85;" alt="" srcset="">
                <h4 class="text-white mb-2 my-2 text-center find-text">FIND US ON</h4>
                <div class="d-flex justify-content-center icon-find">
                    <a href="javascript:;" class="mx-2"><i class="fa fa-facebook text-lg text-white me-4"></i></a>
                    <a href="javascript:;" class="mx-2"><i class="fa fa-instagram text-lg text-white me-4"></i></a>
                    <a href="javascript:;" class="mx-2"><i class="fa fa-twitter text-lg text-white me-4"></i></a>
                    <a href="javascript:;" class="mx-2"><i class="fa fa-envelope text-lg text-white me-4"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main main-section" id="project">
    <div class="container">
        <!-- konten 1 -->
        <div class="section text-center">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto my-2 mb-3">
                    <h2 class="title font-size-title">OUR FEATURED PROJECTS.</h2>
                </div>
                <div class="col-md-11 col-12 ml-auto mr-auto">
                    <!-- conten 1 -->
                    <div class="row my-4">
                        <?php 
                        $pr = count(@$data['projects']);
                        for ($i=0; $i < $pr; $i++) {
                            $namaProject    = @$data['projects'][$i]['nama_project'];
                            $gambar         = @$data['projects'][$i]['gambar'];
                            $deskripsi      = @$data['projects'][$i]['deskripsi'];
                            $deskripsi      = substr($deskripsi, 0, 150);
                            if ($i % 2 == 0) {
                                echo '<div class="col-md-6 col-12">
                                <div class="r-img">
                                    <img src="'. BASEURL.' /assets/upload/'.$gambar.'"  alt="" srcset="">
                                </div>
                                <div class="card no-border-radius r-card">
                                    <div class="card-body">
                                        <h6 class="title">'.$namaProject.'</h6>
                                        <hr>
                                        <p>
                                            '.$deskripsi.'
                                        </p>
                                        <a href="'.BASEURL.'/_project/_detail_project/'.$data['projects'][$i]['id'].'" > 
                                        <span class="material-icons">
                                            trending_flat
                                        </span>
                                        </a>
                                    </div>
                                </div>
                            </div>';
                            }else {
                                echo ' <div class="col-md-6 col-12">
                                <div class="card no-border-radius l-card">
                                    <div class="card-body">
                                        <h6 class="title">'.$namaProject.'E</h6>
                                        <hr>
                                        <p>
                                             '.$deskripsi.'
                                        </p>
                                        <a href="'.BASEURL.'/_project/_detail_project/'.$data['projects'][$i]['id'].'" > 
                                        <span class="material-icons">
                                            trending_flat
                                        </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="l-img">
                                    <img src="'. BASEURL.' /assets/upload/'.$gambar.'"   alt="">
                                </div>
                            </div>';
                            }
                        }

                        ?>
                      
                    </div>
                    <!-- end content -->

                </div>
            </div>
        </div>
    </div>
    <!-- end konten 1 -->
</div>
<div class="content-2 main">
    <div class="container">
        <!-- Konten ke 2 -->
        <div class="section text-center">
            <h2 class="title font-size-title">Here is our team</h2>
            <!--         carousel  -->
            <div id="carousel">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mr-auto ml-auto">
                            <!-- Carousel Card -->
                            <div class="card card-raised card-carousel">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
                                    <ol class="carousel-indicators">
                                        <!-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li> -->
                                        <?php
                                                $slidetom = 0;
                                            foreach ($data['video'] as $dp) :
                                            ?>
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $slidetom++ ?>"></li>
                                        <?php 
                                            endforeach;
                                        ?>
                                    </ol>
                                    <div class="carousel-inner">
                                    <?php 
                                        $cekmin = [];
                                        $dp = [];                        
                                        for($i=0; $i < count($data['video']); $i++){
                                                $cekmin[] = $data['video'][$i]['id'];
                                                $dp[] = $data['video'][$i];
                                        }
                                        $ck = min($cekmin);
                                        for($i = 0; $i < count($dp); $i++){
                                            if($ck){
                                    ?>
                                        <div class="carousel-item active">
                                            <iframe class="d-block w-100" width="1080" height="600" src="<?= $dp[$i]['url'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            <div class="carousel-caption d-none d-md-block">
                                                <h4>
                                                    <i class="material-icons">location_on</i><?= $dp[$i]['lokasi'] ?>
                                                </h4>
                                            </div>
                                        </div>
                                        <?php 
                                            }else{
                                        ?>
                                        <div class="carousel-item">
                                            <iframe class="d-block w-100" width="1080" height="600" src="<?= $dp[$i]['url'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            <div class="carousel-caption d-none d-md-block">
                                                <h4>
                                                    <i class="material-icons">location_on</i> <?= $dp[$i]['lokasi'] ?>
                                                </h4>
                                            </div>
                                        </div>
                                      <?php 
                                            }
                                            $ck =0;
                                       }
                                      ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <i class="material-icons">keyboard_arrow_left</i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <i class="material-icons">keyboard_arrow_right</i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <!-- End Carousel Card -->
                        </div>
                    </div>
                </div>
            </div>
            <!--         end carousel -->
        </div>
        <!-- end konten 2 -->
        <div class="section section-contacts" id="contact">
            <div class="row">
                <div class="col-md-12 ml-auto mr-auto">
                    <h2 class="text-center title font-size-title">Stay In Touch.</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <?php 
                            foreach ($data['contact'] as $ct) {
                                $alamat = $ct['alamat'];
                                $email = $ct['email'];
                                $no_telp = $ct['telp'];
                            }
                            
                            ?>
                            <div class="col-md-4 float-right custom-contact">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="<?= BASEURL ?>/assets/frontend/img/foto/logo-h-scale-down.png" width="70%" alt="">
                                        <hr>
                                        <div>
                                            <a href="#">
                                                <p>
                                                    <?= $alamat ?>
                                                </p>
                                            </a>
                                            <a href="#">
                                                <?= $email ?>
                                            </a>
                                            <br>
                                            <br>
                                            <a href="#">
                                                Tel: <?= $no_telp ?>
                                            </a>
                                        </div>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="container">
                                <img class="bg-contact" src="<?= BASEURL ?>/assets/frontend/img/foto/foto-2.jpg" width="100%" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="">
        <div class="wa-widget">
            <div class="my-2 body-widget">
                    <span class="material-icons">
            whatsapp
            </span>
                <span>
              Whatsapp
            </span>
            </div>
        </div>
    </a>
</div>