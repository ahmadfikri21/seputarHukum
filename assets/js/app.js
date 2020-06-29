const noticeKomentar = document.querySelector(".notice-komentar")
const noticeClose = document.querySelector(".notice-close");

noticeClose.addEventListener("click",closeNotice);

function closeNotice(){
    noticeKomentar.setAttribute("style","display:none;");
}