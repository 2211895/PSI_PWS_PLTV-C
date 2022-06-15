let x = 0;
function HideNavBar(){
    if (x==0)
    {
        document.getElementById("buttons").style.width = "3%" ;
        var text =  document.getElementsByClassName("NavText");
        var i;
        for (i=0; i<text.length; i++)
        {
            text[i].style.display = "none";
        }

        var button = document.getElementById("hideNavBar");
        button.style.transform = "rotate(90deg)";

        x = 1;
    }
    else {
        document.getElementById("buttons").style.width = "20%" ;
        var text =  document.getElementsByClassName("NavText");
        var i;
        for (i=0; i<text.length; i++)
        {
            text[i].style.display = "inline";
        }

        var button = document.getElementById("hideNavBar");
        button.style.transform = "rotate(0deg)";
        x = 0;
    }

}