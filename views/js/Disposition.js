var btnTable=document.querySelector('#btnList');
var btnMoz=document.querySelector('#btnMoz');
var moz=document.querySelector("#moz");
var tab=document.querySelector("#tab");
btnMoz.addEventListener("click",function(e){
    if(btnMoz.className.search("active")==-1){
        btnMoz.className=btnMoz.className+" active";
        btnTable.className=btnTable.className.replace("active", " ");
        tab.style.display="none";
        moz.style.display="block";
       }
});
btnTable.addEventListener("click",function(e){
   if(btnTable.className.search("active")==-1){
    btnTable.className=btnTable.className+" active";
    btnMoz.className=btnMoz.className.replace("active", " ");
    tab.style.display="block";
    moz.style.display="none";
   }
});