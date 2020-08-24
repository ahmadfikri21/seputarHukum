const noticeSukses = document.querySelector(".notice");
const noticeClose = document.querySelector(".notice-close");
const currentUrl = window.location.href;
const navbar = document.getElementById("nav-wrap");
const sticky = navbar.offsetTop;

window.onscroll = function(){stickyNav()};

function stickyNav(){
    if(window.pageYOffset >= sticky){
        navbar.classList.add("sticky");
    }else{
        navbar.classList.remove("sticky")
    }
}

if(noticeSukses != null){
    noticeClose.addEventListener("click",closeNotice);

    function closeNotice(){
        noticeSukses.setAttribute("style","display:none;");
        
        const newUrl = new URL(currentUrl);
        const search_param = newUrl.searchParams;
        
        search_param.delete('notice');

        window.location.href = newUrl;
        
    }
}

function preventRightClick(){
    $(document).ready(function(){
        $("body").on("cut copy", function(e){
            e.preventDefault();
        });
        $("body").on("contextmenu", function(e){
            alert("Maaf, anda tidak dapat melakukan klik kanan di halaman ini");
            return false;
        });
    });
}