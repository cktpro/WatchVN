<?php if (isset($_GET['page'])) {
  $page_now = $_GET['page'];
} else {
  $page_now = 1;
}
?>
<div style="clear: both;">
  <ul class="pagination justify-content-center m-0 p-3">
    <li id="first" class="page-item">
      <a  class="page-link" href="?menu=<?php echo $_GET['menu']; ?>&page=1" tabindex="-1">&laquo;</a>
    </li>
    <?php for ($i = 1; $i <= $_SESSION['so_trang']; $i++) {
    if ($i != $page_now) { ?>
    <li class="page-item"><a class="page-link" href="?menu=<?php echo $_GET['menu']; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
      
    <?php  } else { ?>
      <li class="page-item active"><a class="page-link" href="#"><?php echo $page_now; ?></a></li>
    <?php } ?>
  <?php } ?>
    <li id="last" class="page-item">
      <a  class="page-link" href="?menu=<?php echo $_GET['menu']; ?>&page=<?php echo $_SESSION['so_trang']; ?>">&raquo;</a>
    </li>
  </ul>
</div>
<?php 
if ($page_now == 1) { ?>
  <script>
    $(document).ready(function() {
      $("#first").addClass("disabled");
    });
  </script>
<?php } 
if ($page_now ==$_SESSION['so_trang'] ) { ?>
  <script>
    $(document).ready(function() {
      $("#last").addClass("disabled");
    });
  </script>
<?php }
?>