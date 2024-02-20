<?php
$postask = $db->prepare("SELECT * FROM posts WHERE post_status='publish' ORDER BY rand() LIMIT 1");
$postask->execute(array());
while ($postfetch = $postask->fetch(PDO::FETCH_ASSOC)) {
    $link = $postfetch["post_link"];
    header("Location: $link");
}

?>

<body class="bg-dark text-white">
    <div class="container">
        <div class="text-center mt-5 mb-5">
            <p>
                Rastgele bir içeriğe yönlendiriliyorsunuz.<br>
                Lütfen bekleyin.
            </p>
            <p>
                <a class="btn btn-outline-primary text-white mt-4" href="<?php echo $link; ?>">
                    <i class="bi bi-shuffle me-1"></i>
                    Hemen Yönlendir
                </a>
            <p>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>