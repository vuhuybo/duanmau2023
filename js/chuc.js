var album=[];
for(var i=0;i<4;i++){
    album[i]=new Image();
    album[i].src="./access/img/slide"+i+".jpg";
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
function detail_pro(id){
    document.querySelector(".modal").style = "display:flex;"
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        var a = this.responseText;
        b = json_parse(a);
        $('.namedetail').html(b.name);
        $('.pricedetail').html(formatMoney(parseInt(b.price)));
    };
    xmlhttp.open("GET", "./index.php?act=sp&id=" + id, true);
    xmlhttp.send();
}
function undetail_pro(){
    $('.modal').css('display','none');
    // document.querySelector(".modal").style = "display:none;"
}

  function json_parse(str){
    return JSON.parse(str);
  }
  function formatMoney(number) {
    return number.toLocaleString('en-US', { style: 'currency', currency: 'USD' });
    }