
function detail_pro(id){
    document.querySelector(".modal").style = "display:flex;"
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        var a = this.responseText;
        b = json_parse(a);
        $('.namedetail').html(b.name);
        $('.pricedetail').html(formatMoney(parseInt(b.price)));
        $('imgdetail').attr('src','/upload'+b.img);
    };
    xmlhttp.open("GET", "./index.php?act=sp&id=" + id, true);
    xmlhttp.send();
}
function undetail_pro(){
    $('.modal').css('display','none');
}

function json_parse(str){
    return JSON.parse(str);
  }
function formatMoney(number) {
    return number.toLocaleString('en-US', { style: 'currency', currency: 'USD' });
    }
$('.xoasp').on('click', function(){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              window.open('index.php?act=xoasp&id=' + $(this).attr('data-id'))
            }
          })
    })
$('.xoadm').on('click', function(){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              window.open('index.php?act=xoadm&id=' + $(this).attr('data-id'))
            }
          })
    })
$('.cart').on('click',function(){
    var pros = document.querySelectorAll('.cart-sp');
    console.log(pros);
    let totalprice = 0;
    for(const pro of pros){
        const count = pro.querySelector(".count_cart");
        const price = pro.querySelector('.price_cart');
        totalprice +=  parseInt(count.value) * parseInt(price.textContent);
    }
    document.querySelector(".total_price").textContent = totalprice;
})
function cart(){
    var a = document.querySelector(".layout_cart");
    a.style = "display:flex;";
}
function uncart(){
    var a = document.querySelector(".layout_cart");
    a.style = "display:none;";
}
$('.count_cart').on('change',function(){
    var pros = document.querySelectorAll('.cart-sp');
    console.log(pros);
    let totalprice = 0;
    for(const pro of pros){
        const count = pro.querySelector(".count_cart");
        const price = pro.querySelector('.price_cart');
        totalprice +=  parseInt(count.value) * parseInt(price.textContent);
    }
    document.querySelector(".total_price").textContent = totalprice;
})
$('.xoacmt').on('click', function(){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.open('index.php?act=xoacmt&id=' + $(this).attr('data-id'))
        }
      })
})

