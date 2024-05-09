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
       // Sayfalama için sayfa durum denetimi
       if (empty($_GET["page"])) {
        $page = 1;
    } else {
        $page = $_GET["page"];
    }

    // Sayfalama Değerleri
    $limit = 20; // Bir sayfada gösterilecek elemanı belirliyor.
    $start_limit = ($page * $limit) - $limit;

    // Post Sayısı bulucu.
    $count = 0;
    $imageask = $db->prepare("SELECT * FROM images");
      $imageask->execute(array());
      while ($imagefetch = $imageask->fetch(PDO::FETCH_ASSOC)) {
        $count++;
    }
    // Post sayısı kullanılarak sayfa sayısı bulundu
    $page_count = ceil($count / $limit);
    
      $imageask = $db->prepare("SELECT * FROM images ORDER BY image_id DESC LIMIT $start_limit,$limit");
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
    <nav class="d-flex justify-content-center mt-3 mb-3">
            <?php
            //Öncesi sayfası
            if ($page > 1) {
                $newpage = $page - 1;
                echo '<a href="?page='.$newpage.'" class="btn btn-sm btn-outline-secondary text-white ms-1" style="text-decoration: none;"><i class="bi bi-arrow-bar-left me-2"></i>Öncesi</a>';
            }
            // Sayfa Gösterici
            echo '<a href="" class="btn btn-sm btn-outline-dark text-white disabled ms-1" style="text-decoration: none;">Sayfa ' . $page . '</a>';

            //Öncesi sayfası
            if ($page<$page_count) {
                $newpage = $page+1;
                echo '<a href="?page='.$newpage.'" class="btn btn-sm btn-outline-secondary text-white ms-1" style="text-decoration: none;"><i class="bi bi-arrow-bar-right me-2"></i>Sonrası</a>';
            }
            ?>
        </nav>
        

    <script>
      function indir(dosyaAdi) {
        var downloadLink = document.createElement('a');
        downloadLink.href = dosyaAdi;
        downloadLink.download = dosyaAdi;
        downloadLink.click();
      }
    </script>