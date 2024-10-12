let asideLinks = document.querySelectorAll(".asideNav ul li a");
let bodyId = document.querySelector("body").id;

for (let link of asideLinks) {

    if(link.dataset.active == bodyId){
        link.classList.add("active")
    }
}

var logOutBtn =document.getElementById('logOut');

        logOutBtn.addEventListener("click", () => {
            window.location.href = "/yara/TaskSystem/pages/login.php";
        })

