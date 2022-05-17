let header_button = document.querySelector(".mobile_icon");





header_button.addEventListener("click",opne_popup,false);
document.querySelector("#grid").addEventListener("click",close_popup,false);
document.querySelector("header .popup").addEventListener("click",close_popup,false);

function opne_popup()
{

    if(document.querySelector("header").classList.contains("open"))
    {
        close_popup();
    }
    else
    {
        document.querySelector("header").classList.add("open");
        header_button.querySelector("img").src = "openedmenu.png"
        console.log("Open menu");
    }
    
}


function close_popup()
{
    console.log("Close menu");
    header_button.querySelector("img").src = "closedmenu.png"
    document.querySelector("header").classList.remove("open");
}
