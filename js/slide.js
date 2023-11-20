var album=[];
for(var i=0;i<4;i++){
    album[i]=new Image();
    album[i].src="/duan1/access/img/slide"+i+".jpg";
}
 var interval=setInterval(slideshow,2000);
index=0;
function slideshow(){
    index++;
    if(index>3){
        index=0;
    }
    document.getElementById("banner").src=album[index].src;
}
function slide_out(){
    document.getElementById("banner").style.animation = "slideleft ease-in-out 0.5s";
}
function next(){
    index++;
    if(index>3){
        index=0;
    }
    document.getElementById("banner").src=album[index].src;
   
}
function pre(){
    index--;
    if(index<0){
        index=3;
    }
    document.getElementById("banner").src=album[index].src;
   
}
console.log('1');