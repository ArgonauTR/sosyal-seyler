<style>
  img {
    max-width: 100%;
    height: auto;
    display: block;
  }
</style>


<?php
$pop_up = "pop-up";
$orderask = $db->prepare("SELECT * FROM orders WHERE order_status=:pop_up");
$orderask->execute(array('pop_up' => $pop_up));
while ($orderfetch = $orderask->fetch(PDO::FETCH_ASSOC)) {
  $order_name = $orderfetch["order_name"];
  $order_content = $orderfetch["order_content"];
}
?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $order_name; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php echo $order_content; ?>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  $(document).ready(function() {
    $('#exampleModal').modal('show');
  });
</script>