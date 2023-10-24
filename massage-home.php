<?php
if(isset($_SESSION['massage-home']))
{
    ?>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <?= $_SESSION['massage-home'];?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
</div>
    
<?php 
unset($_SESSION['massage-home']);
}

?>