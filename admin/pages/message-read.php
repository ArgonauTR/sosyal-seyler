<div class="col-lg-9">
    <div class="card bg-dark text-white">
        <?php
        $message_id = $_GET["message_id"];
        $messageask = $db->prepare("SELECT * FROM messages WHERE message_id=:id");
        $messageask->execute(array('id' => $message_id));
        while ($messagefetch = $messageask->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <div class="card-body">
                <div class="card-header h3">
                    <?php echo $messagefetch["message_title"] ?>
                </div>
                <div class="card-body">
                <p><?php echo nl2br($messagefetch["message_content"]) ?></p>
                <div class="card-footer">
                <b>Gönderen Adı:</b> <?php echo $messagefetch["message_author_name"] ?><br>
                <b>Gönderen Mail:</b> <?php echo $messagefetch["message_author_mail"] ?><br>
                <b>Gönderim Tarihi:</b> <?php echo $messagefetch["message_time"] ?><br><br>
                <a href="./functions/message-status.php?message_id=<?php echo $messagefetch["message_id"] ?>&status=read" class="btn btn-sm btn-outline-success me-2"><i class="bi bi-eye-slash me-1"></i>Okunmuş Olarak İşaretle</a>
                <a href="./functions/message-status.php?message_id=<?php echo $messagefetch["message_id"] ?>&status=wait" class="btn btn-sm btn-outline-warning"><i class="bi bi-eye me-1"></i>Okunmamış Olarak İşaretle</a>
                </div>
                <?php
            }
                ?>
                </div>
            </div>
    </div>
</div>
</div>