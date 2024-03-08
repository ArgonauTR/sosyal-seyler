 <ul class="navbar-nav ms-auto">
     <div class="text-center">
         <ul class="list-inline mb-2 mt-2">

             <li class="list-inline-item me-4">
                 <a class="text-mode text-white" href="index.php" style="text-decoration: none;" title="ANASAYFA">
                     <i class="bi bi-house"></i>
                 </a>
             </li>

             <li class="list-inline-item me-4">
                 <a class="text-mode text-white" href="./process.php?post=post-add" style="text-decoration: none;" title="EKLE">
                     <i class="bi bi-pencil-square"></i>
                 </a>
             </li>

             <li class="list-inline-item me-4">
                 <a class="text-mode text-white" href="/" target="_blank" style="text-decoration: none;" title="SİTEYE GİT">
                     <i class="bi bi-eye"></i>
                 </a>
             </li>

             <li class="list-inline-item me-4">
                 <a class="text-mode text-white" href="option.php" style="text-decoration: none;" title="AYARLAR">
                     <i class="bi bi-gear"></i>
                 </a>
             </li>

         </ul>
     </div>
     <div class="border-bottom mt-2 mb-2 position-relative"></div>
     <li class="nav-item">
         <a class="nav-link" href="index.php">
         <i class="bi bi-bar-chart-fill me-1"></i>
             Anasayfa
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="post.php">
         <i class="bi bi-pencil-square me-1"></i>
             Yazılar
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="category.php">
            <i class="bi bi-grid me-1"></i>
             Kategoriler
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="comment.php">
         <i class="bi bi-chat-left-dots me-1"></i>
             Yorumlar
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="image.php">
         <i class="bi bi-image me-1"></i>
             Resimler
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="user.php">
         <i class="bi bi-person me-1"></i>
             Üyeler
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="message.php">
         <i class="bi bi-envelope me-1"></i>
             Mesajlar
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="order.php">
         <i class="bi bi-grid-1x2 me-1"></i>
             Düzen
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="option.php">
         <i class="bi bi-gear me-1"></i>
             Ayarlar
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="help.php">
         <i class="bi bi-question-square me-1"></i>
             Destek
         </a>
     </li>
     <li class="nav-item dropdown ms-4 mt-2">
         <a class="btn btn-outline-primary nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             <i class="bi bi-person me-1"></i>
             <?php echo $_SESSION["user_nick"]; ?>
         </a>
         <ul class="dropdown-menu">
             <li><a class="dropdown-item" href="/" target="_blank"><i class="bi bi-eye me-1"></i> Siteye Git</a></li>
             <li><a class="dropdown-item" href="../functions/logout.php"><i class="bi bi-power me-1"></i>Güvenli Çıkış</a></li>
         </ul>
     </li>
 </ul>