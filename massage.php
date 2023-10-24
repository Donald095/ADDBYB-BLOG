<?php
if(isset($_SESSION['massage']))
{
    ?>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <?= $_SESSION['massage'];?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
</div>
    
<?php 
unset($_SESSION['massage']);
}

?>