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
            <div class="col-lg-8 mt-3">
                <div class="row">
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                    ?>

                        <div class="col-6 col-lg-2 mt-3" style="height: 300px;">
                            <div class="card bg-dark border-info custom-card">
                                <img src="https://cdn.myanimelist.net/images/anime/8/77831.jpg" class="card-img-top rounded-bottom-corners" style="height: 150px;">
                                <div class="card-body p-2">
                                    <b class="clamp-text"> Bölüm: 3</b>
                                    <i class="clamp-text">Kono Suba rashii Sekai ni Shukufuku wo!</i>
                                </div>
                                <div class="card-footer p-2">
                                    02/03/2024
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







        <br>
        <br>
        <br>
        <br>
        <br>
        <br>


































        <br>
        <br>
        <br>
        <br>
        <br>
        <br>