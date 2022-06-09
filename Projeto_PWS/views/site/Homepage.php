<?php
?>

<link rel = "stylesheet" href = "public/css/Homepage.css" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--<script src="public/js/NavBar.js"></script> !-->
<script>
    let x = 0;
    function HideNavBar(){
        if (x==0)
        {
            document.getElementById("buttons").style.width = "3%" ;
            var text =  document.getElementsByClassName("NavText");
            var i;
            for (i=0; i<text.length; i++)
            {
                text[i].style.visibility = "hidden";
            }

            x = 1;
        }
        else {
            document.getElementById("buttons").style.width = "30%" ;
            var text =  document.getElementsByClassName("NavText");
            var i;
            for (i=0; i<text.length; i++)
            {
                text[i].style.visibility = "visible";
            }
            x = 0;
        }

    }
</script>
<div id="buttons" >

    <button type="button" onclick="HideNavBar()" id="hideNavBar"><i class="fa-solid fa-bars"></i></button>
    <br> <br> <br>
<a href="router.php?c=login&a=logout"
    role="button"><i class="fa-solid fa-arrow-right-from-bracket"></i> <span class="NavText"> Logout</span></a>

<?php
if($_SESSION['role']!=3){
    echo '
        <a href="router.php?c=users&a=index"
         role="button"><i class="fa-solid fa-user"></i><span class="NavText">Users</span> </a>
        <a href="router.php?c=empresas&a=index"
         role="button"><i class="fa-solid fa-building"></i> <span class="NavText"> Empresas</span></a>
        <a href="router.php?c=ivas&a=index"
         role="button"><i class="fa-solid fa-percent"></i><span class="NavText"> Ivas</span></a>
        <a href="router.php?c=produtos&a=index"
         role="button"><i class="fa-solid fa-cart-shopping"></i> <span class="NavText">Produtos</span></a>
        <a href="router.php?c=faturas&a=index"
         role="button"><i class="fa-solid fa-clock-rotate-left"></i><span class="NavText"> Histórico de faturas</span></a>
        <a href="router.php?c=faturas&a=create"
         role="button"><i class="fa-solid fa-file-circle-plus"></i> <span class="NavText">Nova fatura</span></a>';
}
else
    echo '<a href="router.php?c=faturas&a=cliente&id=' . $_SESSION['userId'] . '"
        class="btn btn-info" role="button">Minhas faturas</a>';
?>
</div>