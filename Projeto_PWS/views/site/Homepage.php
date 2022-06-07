<?php
?>

<link rel = "stylesheet" href = "public/css/Homepage.css" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="public/js/NavBar.js"></script>
<div id="buttons" >
    <button type="button" onclick="HideNavBar()" id="hideNavBar"><i class="fa-solid fa-bars"></i></button>
    <br> <br> <br>
<a href="router.php?c=login&a=logout"
    role="button"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>

<?php
if($_SESSION['role']!=3){
    echo '
        <a href="router.php?c=users&a=index"
         role="button"><i class="fa-solid fa-user"></i> Users</a>
        <a href="router.php?c=empresas&a=index"
         role="button"><i class="fa-solid fa-building"></i> Empresas</a>
        <a href="router.php?c=ivas&a=index"
         role="button"><i class="fa-solid fa-percent"></i> Ivas</a>
        <a href="router.php?c=produtos&a=index"
         role="button"><i class="fa-solid fa-cart-shopping"></i> Produtos</a>
        <a href="router.php?c=faturas&a=index"
         role="button"><i class="fa-solid fa-clock-rotate-left"></i> Histórico de faturas</a>
        <a href="router.php?c=faturas&a=create"
         role="button"><i class="fa-solid fa-file-circle-plus"></i> Nova fatura</a>';
}
else
    echo '<a href="router.php?c=faturas&a=cliente&id=' . $_SESSION['userId'] . '"
        class="btn btn-info" role="button">Minhas faturas</a>';
?>
</div>