const btn_search=document.createElement('div');
let list =document.querySelector("#tab1");
let nodata=document.querySelector("#nodata");
let mozaique =document.querySelector("#moz");
 const Alllist =document.querySelector("#table");
function File(_name,_path,_type,_icon,_lastModif,_ext,_size){
    this.name=_name;
    this.path=_path;
    this.type=_type;
    this.icon=_icon;
    this.lastModif=_lastModif;
    this.ext=_ext;
    this.size=_size;
}
 function UI(){

}
UI.prototype.addFileToContainer=function(file){
 
 const list_row=document.createElement('tr');
 const moz_item=document.createElement('div');
 //merge mozaique item with data
 moz_item.className="thumbnail col-sm-2";
 moz_item.style.marginRight="10px";
 moz_item.style.cursor="pointer";
 moz_item.setAttribute("onclick","navigate('"+file.path+"','"+file.type+"')")
 moz_item.innerHTML=`<input type="checkbox" value="">
                    ${getExtImg(file.icon,2)}
                    <div class="caption">
                        <p style="text-align: center">${file.name}</p>
                    </div>`;
//merge list_row item with data
mozaique.appendChild(moz_item);
var finalType;
if(file.size<1024){
    file.size=file.size + "octets";
}else{
    file.size=(file.size/1024) +"Ko";
}
if(file.type=="d"){
    finalType="Folder";
}else{
    finalType=`Fichier ${file.ext}`;
}
list_row.setAttribute("onclick","navigate('"+file.path+"','"+file.type+"')")
list_row.innerHTML=`<td><input type="checkbox" name="" id=""></td>
                    <td scope="row">${getExtImg(file.icon,1)}</td>
                    <td>${file.name}</td>
                    <td>${file.lastModif}</td>
                    <td> ${finalType}</td>
                    <td>${file.size} </td>`;
list.appendChild(list_row);
}
var list_of_data;
(function(){

    $.ajax({
        url:"<?php echo base_url('Web_File_Manager');?>/execute",
        type:"get",
        dataType :"json",
        data:{cmd:"open_user_dir",parmetre:"/"},
        success:function(data){
            list_of_data=data;
            list_of_data.forEach(function(element){
                var ui = new UI();
                ui.addFileToContainer(JSON.parse( element));
            });
            },
        error:function(error){
            console.log(error);
        }
    });
})();


function getExtImg(icon,cont){
    var width;
    if(cont==1){
        width=20;
    }else{
        width=50;
    }
    return `<img src="${document.location.href}/assets/img/ext/${icon}" class='img-responsive' width='${width}px'/>`
}
/*

    function for openFolder
*/
function OpenFolder(path){
    
    $.ajax({
        url:"<?php echo base_url('Web_File_Manager');?>/execute",
        type:"get",
        dataType :"json",
        data:{cmd:"open_dir",parmetre:path},
        success:function(data){
            console.log(data);
            list_of_data=data;
            },
        error:function(error){
            console.log(error);
        }
    });
    list_of_data.forEach(function(element){
        var ui = new UI();
        ui.addFileToContainer(JSON.parse( element));
    });
    if(list_of_data.lenght==0){
        nodata.style.diplay="block";
    }else{
        nodata.style.diplay="none";
    }
}
function navigate(path,type){
  //  alert(path+"  ------ "+type);
    if(type=="d"){
        mozaique.innerHTML="";
        list.innerHTML="";
        OpenFolder(path);
    }else{
        alert("Ce n'est pas un dossier");
    }
}
