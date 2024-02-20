<?php
if($optionfetch["option_respect"]=="yes"){
    $respect = "checked";
}else{
    $respect = "";
}

?>
<div class="col-lg-9">
    <div class="card bg-dark text-white">
        <div class="card-header">
            <i class="bi bi-question-circle me-1"></i>
            Destek Merkezi
        </div>
        <div class="card-body">
            <p>
                İndirme, Kurulum ya da Güncelleme için yardıma mı ihtiyacınız var?
            </p>
            <p>
                Rehberimizi okuyun <a class="btn btn-sm btn-outline-info ms-2" href="https://sosyalseyler.com/24-sosyal-seyler-yazilimi" target="_blank">Rehber</a>
            </p>
            <hr>
            <p>
                Bizimle İletişime Geçmek mi istiyorsunuz?
            </p>
            <p>
                İletişim Formunu Kullanın <a class="btn btn-sm btn-outline-info ms-2" href="https://sosyalseyler.com/message" target="_blank">İletişim</a>
            </p>
            <hr>
            <p>
                Yazılıma destek mi olmak istiyorsun?
            </p>
            <ul class="list">
                <li class="list-item">İndirn, Kurun ve Deneyin</li>
                <li class="list-item">Deneyimlerinizi biizmle ve çevrenizle paylaşın</li>
                <li class="list-item">Yazılımı arkadaşlarınıza önerin</li>
                <li class="list-item">Takipte kalın</li>
            </ul>
            <hr>
            <p>
                Yazılımın yayılmasına yardımcı olmak ister misiniz?
            </p>
            <p>
                Aşağıda ki kutucuk sitenizin altında bir imza linki görünmesini sağlar. Bu özelliği kapatmayarak yazılımın çok daha fazla kişiye ulaşmasını sağlayabilirsiniz. Sizin için çok önemli değilse lütfen kapatmayın.
            </p>
            <form action="./functions/option-update.php" method="POST">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" name="option_respect" <?php echo $respect;?>>
                    <label class="form-check-label">İmza Linki Aç/Kapa</label>
                    <button type="submit" class="btn btn-sm btn-outline-info ms-2" name="option_respect_option">Ayarı Kaydet</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>