<style>
  .clamp-text {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
    -webkit-line-clamp: 1;
  }

  .custom-card {
    transition: box-shadow 0.3s, border-color 0.3s;
  }

  .custom-card:hover {
    box-shadow: 0 4px 8px rgba(255, 255, 255, 0.5);
    border-color: #007bff;
  }
</style>

<body class=" bg-dark text-white">
  <div class="container">
    <div class="row align-items-start">
      <?php
      $imageask = $db->prepare("SELECT * FROM images ORDER BY image_id DESC");
      $imageask->execute(array());
      while ($imagefetch = $imageask->fetch(PDO::FETCH_ASSOC)) {
        $image_id = $imagefetch["image_id"];
        $image_title = $imagefetch["image_title"];
        $image_link = $imagefetch["image_link"];
      ?>

        <div class="col-md-3 col-sm-6 mt-4">
          <div class="card border-secondary text-center custom-card">
            <a href="#" class="stretched-link" data-bs-toggle="modal" data-bs-target="<?php echo "#modal" . $image_id; ?>"></a>
            <img src="<?php echo $image_link; ?>" class="img-fluid" alt="<?php echo $image_title; ?>" id="downloadImg">
          </div>
        </div>


        <div class="modal fade" id="<?php echo "modal" . $image_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content  bg-secondary text-white">
              <div class="modal-header">
                <h3 class="modal-title fs-5 clamp-text" id="exampleModalLabel"><?php echo $image_title; ?></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <img src="<?php echo $image_link; ?>" class="img-fluid" alt="<?php echo $image_title; ?>">
              <div class="modal-footer">
                <a href="<?php echo $image_link; ?>" type="button" class="btn btn-secondary" data-bs-dismiss="tooltip" target="_blank">
                  <i class="bi bi-box-arrow-in-up-right me-2"></i>
                  Yeni Sekmede Aç
                </a>
                <a type="button" class="btn btn-secondary" onclick="indir('<?php echo $image_link; ?>')">
                  <i class="bi bi-download me-2"></i>
                  İndir
                </a>
              </div>
            </div>
          </div>
        </div>

      <?php
      }
      ?>
    </div>

    <script>
      function indir(dosyaAdi) {
        var downloadLink = document.createElement('a');
        downloadLink.href = dosyaAdi;
        downloadLink.download = dosyaAdi;
        downloadLink.click();
      }
    </script>