<?php $page = $_GET['page'] ?>

<nav type="GET">
<ul class="nav nav-pills">
  <li class="nav-item">
    <a <?php echo ($page==1)? "class='nav-link active'": "class='nav-link'" ?> href="index.php?page=1">Tours</a>
  </li>
  <li class="nav-item">
    <a <?php echo ($page==2)? "class='nav-link active'": "class='nav-link'" ?> href="index.php?page=2">Registration</a>
  </li>
  <li class="nav-item">
    <a <?php echo ($page==3)? "class='nav-link active'": "class='nav-link'" ?> href="index.php?page=3">Admin Forms</a>
  </li>

<?php
if(isset($_SESSION['radmin']))
{
?>
   <li class="nav-item">
    <a <?php echo ($page==4)? "class='nav-link active'": "class='nav-link'" ?> href="index.php?page=4">Private</a>
  </li>

<?php
}
?>


</ul>
</nav>