<?php
?>
<br>
<br>

<a href="router.php?c=login&a=logout"
   class="btn btn-info" role="button">Logout</a>

<?php
if($_SESSION['role']!=3){
    echo '
        <a href="router.php?c=users&a=index"
        class="btn btn-info" role="button">Users</a>
        <a href="router.php?c=empresas&a=index"
        class="btn btn-info" role="button">Empresas</a>
        <a href="router.php?c=ivas&a=index"
        class="btn btn-info" role="button">Ivas</a>
        <a href="router.php?c=produtos&a=index"
        class="btn btn-info" role="button">Produtos</a>';
}
?>
<br>
<br>