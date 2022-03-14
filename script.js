document.getElementById('menu').addEventListener('click',function(){
    document.getElementById('menu2').style.display = "flex"; 
    document.getElementById('menu').style.display = "none"; 
    document.getElementById('menubar').style.display = "block";
});
document.getElementById('menu2').addEventListener('click',function(){
    document.getElementById('menu').style.display = "flex";
    document.getElementById('menu2').style.display = "none";
    document.getElementById('menubar').style.display = "none";
});
function myFunction(x) {
    x.classList.toggle("fa-thumbs-down");
}