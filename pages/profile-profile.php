<?php
$user_id = $_SESSION['user_id'];
$userask = $db->prepare("SELECT * FROM users WHERE user_id=:id");
$userask->execute(array('id' => $user_id));
while ($userfetch = $userask->fetch(PDO::FETCH_ASSOC)) {
    $user_name = $userfetch["user_name"];
    $user_nick = $userfetch["user_nick"];
    $user_mail = $userfetch["user_mail"];
    $user_status = $userfetch["user_status"];
    $user_role = $userfetch["user_role"];
    $user_image = $userfetch["user_image"];
    $user_time = $userfetch["user_time"];

    //Resim Yolunu Çekiyor
    $post_thumbnail_id = $user_image;
    $imageask = $db->prepare("SELECT * FROM images WHERE image_id=:id");
    $imageask->execute(array('id' => $post_thumbnail_id));
    while ($imagefetch = $imageask->fetch(PDO::FETCH_ASSOC)) {
        $image_id = $imagefetch["image_id"];
        $image_title = $imagefetch["image_title"];
        $image_link = $imagefetch["image_link"];
    }
}

?>
<div class="m-3">
    <div class="row">
        <div class="col-lg-3 text-center">
            <div class="mb-3 d-flex justify-content-center">
                <?php
                if (isset($image_link)) {
                    echo '<img class="img-thumbnail" style="height: 150px;" src="' . $image_link . '" />';
                } else {
                    echo '<i class="bi bi-person-fill-x h1 me-2"></i>';
                }
                ?>
            </div>
        </div>
        <div class="col-lg-9">
            <table class="table text-white">
                </thead>
                <tbody>

                    <tr>
                        <td>Kullanıcı Adı</td>
                        <td><?php echo $user_nick; ?></td>
                    </tr>

                    <tr>
                        <td>Gerçek Adı</td>
                        <td><?php echo $user_name; ?></td>
                    </tr>

                    <tr>
                        <td>E Postası</td>
                        <td><?php echo $user_mail; ?></td>
                    </tr>

                    <tr>
                        <td>Profil Durumu</td>
                        <td>
                            <?php
                            switch ($user_status) {
                                case "approved":
                                    echo "Onaylanmış Profil";
                                    break;
                                case "pending":
                                    echo "Onay Bekliyor";
                                    break;
                            }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td>Yetkisi</td>
                        <td><?php echo $user_role; ?></td>
                    </tr>

                    <tr>
                        <td>Üyelik Tarihi</td>
                        <td><?php echo $user_time; ?></td>
                    </tr>

                    <tr>
                        <td>Üyeliği Sil</td>
                        <?php
                        if ($optionfetch["option_default_author"] == $user_id) {
                            echo '<td><a href="" class="btn btn-sm btn-outline-info" disabled">Silinemez</a>';
                        } else {
                            echo '<td><a href="./admin/functions/user-delete.php?user_id=' . $user_id . '&status=delete" class="btn btn-sm btn-outline-info" onclick="showAlert()">ÜYELİĞİ SİL</a>';
                        }
                        ?>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    function showAlert() {
        alert("Üyelik Kalıcı olarak silinsin mi?");
    }
</script>