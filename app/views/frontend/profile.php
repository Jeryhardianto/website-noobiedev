  <?php
    foreach ($data['profile'] as $pr) {
       $profile = $pr['profile'];
         $gambar = $pr['gambar'];
    }

  ?>
  
  <div class="main section" id="profile">
    <div class="container section">
      <!-- konten 1 -->
      <div class="section text-center">
        <div class="row mb-5 my-4 text-profile">
            <div class="col-md-5 col-12">
                <img class="w-100" src="<?= BASEURL ?>/assets/upload/<?= $gambar ?>" alt="">
            </div>
            <div class="col-md-7 col-12">
                <p class="mt-auto my-auto position-relative mx-2">
                  <?= $profile ?>
                </p>
            </div>
        </div>
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