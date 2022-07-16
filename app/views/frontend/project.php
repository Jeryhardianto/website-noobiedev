  
  
  <div class="main main-raised section mt-5 my-5 mb-2 no-border-radius" style="top: 4rem;">
    <div class="container">
      <!-- konten 1 -->
      <div class="text-center">
        <h2 class="title font-size-title">OUR FEATURED PROJECTS.</h2>
        <div class="row mb-5 my-4">
        <?php 
            foreach ($data['project'] as $pr): 
              $namaProject = $pr['nama_project'];
              $gambar      = $pr['gambar'];
              $id          = $pr['id'];
              
              
              ?>
            <div class="col-md-6 col-12 mb-4">
                <a href="<?= BASEURL ?>/_project/_detail_project/<?= $id ?>">
                    <div class="project-body">            
                        <img class="w-100 img-project" src="<?= BASEURL ?>/assets/upload/<?= $gambar ?>" alt="">
                        <div class="overlay-project">
                            <div class="text-project">
                                    <h5><?= $namaProject ?></h5>
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