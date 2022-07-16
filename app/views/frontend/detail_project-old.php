<?php
foreach ($data['project'] as $prj) {
    $namaProject = $prj['nama_project'];
    $descripsi   = $prj['deskripsi'];
}

foreach ($data['detail_project'] as $dp) {
    $gambarD[] = $dp['foto'];
}


?>
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
                  $no = 0;
                  foreach ($data['detail_project'] as $dp) :
                        
                        $id          = $dp['id'];
                        $namaDP      = $dp['nama_project'];
                        $foto        = $dp['foto'];
                     
                  ?>
                        <div class="col-md-6 col-12 my-3 mt-5">
                            <a href="" data-toggle="modal" data-target="#exampleModal" id="myModal"
                                data-nama="<?= $namaDP ?>" data-foto="<?= $foto ?>">
                                <div class="project-body">
                                    <img class="w-100 img-project" src="<?= BASEURL?>/assets/upload/<?= $foto ?>">
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

            <!-- modal -->

            <div class="modal fade" data-backdrop="false" data-keyboard="false" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="namaDP"></h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
                        </div>
                        <div class="modal-body">
                            <img class="img-project" id="foto">
                        </div>

                    </div>
                </div>
            </div>

            <!-- modal end -->


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