<div class="col-lg-9">
    <div class="card bg-dark text-white">
        <div class="card-body">
            <div class="card-header">
                <i class="bi bi-grid me-1"></i>
                REKLAM ELEMANI EKLE
            </div>
            <div class="card-body">
                <form action="./functions/ads-add.php" method="POST">

                    <div class="mb-3">
                        <input type="number" class="form-control bg-dark text-white" name="order_row" placeholder="Öğenin sırasını giriniz." required>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="order_name" placeholder="Öğenin adını giriniz." required>
                    </div>

                    <div class="mb-3">
                        <select class="form-select bg-dark text-white" name="order_ads">
                            <option value="in-header">Adsene Otomatik</option>
                            <option value="under-header">Header Altı</option>
                            <option value="top-footer">Footer Üstü</option>
                            <option value="top-comments">Yorum Üstü</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control bg-dark text-white" rows="7" name="order_content" placeholder="Reklam Kodları"></textarea>
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" name="ads_add">Kaydet & Yayınla</button>
                    </div>

                </form>
            </div>
            <div class="card-footer">
                HTML ve diğer kodlar kabul edilir. Dikkatli ekleyiniz.
            </div>
        </div>
    </div>
</div>