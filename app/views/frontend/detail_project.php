<?php
foreach ($data['project'] as $prj) {
    $namaProject = $prj['nama_project'];
    $descripsi   = $prj['deskripsi'];
}

foreach ($data['detail_project'] as $dp) {
    $gambarD[] = $dp['foto'];
}


?>
   <!-- modal -->
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content bg-transparent">
                <div class="bg-transparent">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="material-icons">clear</i> </button>
                </div>
                <div>
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <ol class="carousel-indicators">
                        <?php
                        $slidetom = 0;
                    foreach ($data['detail_project'] as $dp) :
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
                        for($i=0; $i < count($data['detail_project']); $i++){
                                $cekmin[] = $data['detail_project'][$i]['id'];
                                $dp[] = $data['detail_project'][$i];
                           }
                         $ck = min($cekmin);
                        for($i = 0; $i < count($dp); $i++){
                            if($ck){
                          ?>

                            <div class="carousel-item active">
                                <img class="w-100 img-modal" src="<?= BASEURL?>assets/upload/<?= $dp[$i]['foto'] ?>" alt="">
                                <div class="carousel-caption d-none d-md-block">
                                    <h4>
                                        <?= $dp[$i]['nama_project'] ?>
                                    </h4>
                                </div>
                            </div>
                       <?php 
                                }else{
                        ?>
                            <div class="carousel-item">
                                <img class="w-100 img-modal" src="<?= BASEURL?>assets/upload/<?= $dp[$i]['foto'] ?>" alt="">
                                <div class="carousel-caption d-none d-md-block">
                                    <h4>
                                    <?= $dp[$i]['nama_project'] ?>
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
            </div>
        </div>
    </div>
    <!-- modal end -->
<div class="main section">
    <div class="container">
        <!-- konten 1 -->
        <div class="section">
            <div class="row mb-5">
                <div class="col-md-12 col-12">
                    <h2 class="title font-size-title my-n3 text-center"><?= $namaProject ?></h2>
                    <p class="mt-auto my-auto position-relative text-justify" style="font-size: 12pt;">
                        <?= $descripsi ?>
                    </p>
                </div>
                <div class="col-md-12 col-12 mt-4">
                    <a href="<?= BASEURL ?>/_project" style="font-size: 14pt;">
                        <span class="material-icons">
                            arrow_back
                        </span>
                        Back to project page
                    </a>
                </div>
            </div>
          <!-- gambar upload -->
          <div class="container mt-5 my-4">
                    <!-- konten 1 -->
                    <div class="text-center" id="modals">
                        <h3 class="title">GALERY</h3>
                        <div class="row mb-5 my-4">
                        <?php
                        $slideto = 0;
                        foreach ($data['detail_project'] as $dp) :
                                    
                                    $id          = $dp['id'];
                                    $namaDP      = $dp['nama_project'];
                                    $foto        = $dp['foto'];
                     
                         ?>
                            <div class="col-md-6 col-12 my-3">
                                <a href="#" data-toggle="modal" data-target="#myModal">
                                    <div class="project-body">
                                        <img class="w-100 img-project" src="<?= BASEURL?>/assets/upload/<?= $foto ?>" data-target="#carouselExampleIndicators" data-slide-to="<?= $slideto++  ?>">
                                        <div class="overlay-project">
                                        <div class="text-project">
                                            <h5><?= $namaDP ?></h5>
                                        </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- end konten -->
                </div>
                <!-- end gambar -->


            <?php
            foreach ($data['video'] as $vd) {
                $url      = $vd['url'];
            }
            ?>
            <!-- Video -->
            <div class="row mb-5">
                <div class="col-md-12 col-12">
                    <h2 class="title font-size-title my-n3 text-center">VIDEO</h2>
                    <iframe class="d-block w-100" width="1080" height="600" src="<?= $url ?>"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
            <!-- video end -->

        </div>
        <!-- end konten 1 -->
    </div>
    <a href="https://wa.me/6281340202483" target="_blank">
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