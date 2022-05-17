let new_photo_src_input_box = document.querySelector("#new_photo_src");
let new_photo_text_input_box = document.querySelector("#new_photo_text");



document.querySelector("#Show_add_photo").addEventListener("click",function()
{
    document.querySelector("#add_new_photo").classList.add("open");
    console.log("Open add photo menu");    
});

document.querySelector("#cancel").addEventListener("click",function(e)
{
    e.preventDefault();
    document.querySelector("#add_new_photo").classList.remove("open");

    console.log("Close add photo menu");


});

document.querySelectorAll(".photo").forEach(photo =>
{
    photo.addEventListener("click",openphoto);
});