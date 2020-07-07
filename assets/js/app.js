const noticeSukses = document.querySelector(".notice");
const noticeClose = document.querySelector(".notice-close");

if(noticeSukses != null){
    noticeClose.addEventListener("click",closeNotice);

    function closeNotice(){
        noticeSukses.setAttribute("style","display:none;");
    }
}