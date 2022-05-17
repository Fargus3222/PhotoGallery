document.querySelector("#add_comment").addEventListener("click",function ()
{

    let text = document.querySelector("#text").value, url = new URL(location.href) , photo_id = url.searchParams.get("id");


    fetch("add_comment.php",
    {
        method: "POST",
        headers:
            {
                "Content-Type": "application/x-www-form-urlencoded"
            },
        body: new URLSearchParams({

            text: text,
            photo_id: photo_id

        })


    })



        .then(async function (resonse)
        {

            let data = await  resonse.text();
            console.log(data);
            data = JSON.parse(data);
            let new_comment_div = document.createElement("div");
            new_comment_div.classList.add("comment");
            let new_comment_autor = document.createElement("p");
            new_comment_autor.classList.add("autor");
            new_comment_autor.innerText = "Author - " + data.Name
            let new_comment_text = document.createElement("p");
            new_comment_text.classList.add("text");
            new_comment_text.innerText = data.Text;
            let new_comment_date = document.createElement("p");
            new_comment_date.classList.add("date");
            new_comment_date.innerText = data.Date_of_post;
            new_comment_div.append(new_comment_autor,new_comment_text,new_comment_date);
            document.querySelector(".comments h2").after(new_comment_div);

            document.querySelector("#text").value = "";


        });





});