function getimg(){
 var a=window.location.href.split('#')[1],
 id=a[0].split('=')[1],
 alert("asds");
 src=a[1].split('=')[1],
 img=document.images[0];
 img.id=id;
 img.src=src;	
}
