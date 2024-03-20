<style>
    img {
        max-width: 100%;
        height: auto;
        display: block;
    }

    .clamp-text {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 1;
    }

    .rounded-bottom-corners {
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.2);
    }

    .custom-card {
        transition: box-shadow 0.3s, border-color 0.3s;
    }

    .custom-card:hover {
        box-shadow: 0 4px 8px rgba(255, 255, 255, 0.5);
    }
</style>

<body class="bg-dark text-white">
    <div class="container">

        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                    ?>

                        <div class="col-12 col-lg-4 mt-3">
                            <div class="card bg-dark border-info custom-card" style="max-height: 3000px;">
                                <div class="card-header text-center">
                                    <b class="clamp-text">Kono Suba rashii Sekai ni Shukufuku wo!</b>
                                </div>
                                <div class="card-body p-2">
                                <div class="row">
                                    <div class="col-6">
                                        <img src="https://cdn.myanimelist.net/images/anime/8/77831.jpg" style="max-height: 200px;">
                                    </div>
                                    <div class="col-6">
                                    <div class="d-grid gap-2">
                                    <button class="btn btn-sm btn-outline-sm text-white border-white custom-card" type="button">Bölüm 4</button>
                                    <button class="btn btn-sm btn-outline-sm text-white border-white custom-card" type="button">Bölüm 3</button>
                                    <button class="btn btn-sm btn-outline-sm text-white border-white custom-card" type="button">Bölüm 2</button>
                                    <button class="btn btn-sm btn-outline-sm text-white border-white custom-card" type="button">Bölüm 1</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>

                        </div>

                    <?php
                    }
                    ?>

                </div>
            </div>
            <?php include 'sidebar.php'; ?>
        </div>