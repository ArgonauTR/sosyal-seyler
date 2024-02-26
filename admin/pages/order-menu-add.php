<div class="col-lg-9">
    <div class="card bg-dark text-white">
        <div class="card-body">
            <div class="card-header">
                <i class="bi bi-grid me-1"></i>
                MENÜ EKLE
            </div>
            <div class="card-body">
                <form action="./functions/menu-add.php" method="POST">

                    <div class="mb-3">
                        <input type="number" class="form-control bg-dark text-white" name="order_row" placeholder="Öğenin sırasını giriniz." required>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="order_name" placeholder="Öğenin adını giriniz." required>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control bg-dark text-white" name="order_link" placeholder="Öğenin linkini giriniz" required>
                    </div>

                    <div class="mb-3">
                        <select class="form-select bg-dark text-white" name="order_status">
                            <option value="top-menu">Üst Menü</option>
                            <option value="footer-menu">Alt Menü</option>
                        </select>
                    </div>

                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary" name="menu_add">Kaydet & Yayınla</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>