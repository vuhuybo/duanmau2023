
function detail_pro(id){
    document.querySelector(".modal").style = "display:flex;"
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        var a = this.responseText;
        b = json_parse(a);
        $('.namedetail').html(b.name);
        $('.pricedetail').html(formatMoney(parseInt(b.price)));
        $('.imgdetail').attr('src','upload/'+b.img);
        // console.log('1');
        var des = (b.mota).split('.')
        $('.des_manhinh').html(des[0]);
        $('.des_chip').html(des[1]);
        $('.des_bonho').html(des[2]);
        $('.des_pin').html(des[3]);
        console.log(b.id);
        $('.them_cart').attr('href','index.php?act=addcart&idpro='+b.id+'&from=home');
        console.log(des[0]);
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
    return number.toLocaleString('vi', { style: 'currency', currency: 'VND' });
    }
$('.xoasp').on('click', function(){
        Swal.fire({
            background: '#fff',
            title: 'Bạn có chắc muốn xóa?',
            text: "Bạn sẽ không thể lấy lại!",
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
            background: '#fff',
            title: 'Bạn có chắc muốn xóa?',
            text: "Bạn sẽ không thể lấy lại!",
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
        totalprice +=  parseInt(count.value) * parseInt(price.getAttribute('value'));
    }
    document.querySelector(".total_price").textContent = formatMoney(totalprice) ;
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
        totalprice +=  parseInt(count.value) * parseInt(price.getAttribute('value'));
    }
    document.querySelector(".total_price").textContent = formatMoney(totalprice);
})
$('.xoacmt').on('click', function(){
    Swal.fire({
        background: '#fff',
        title: 'Bạn có chắc muốn xóa?',
        text: "Bạn sẽ không thể lấy lại!",
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
$('.xoacart').on('click', function(){
  Swal.fire({
      background: '#fff',
      title: 'Bạn có chắc muốn xóa?',
      text: "Bạn sẽ không thể lấy lại!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.open('view/xoaspcart.php?idpro=' + $(this).attr('data-idpro')+'&iduser='+$(this).attr('data-iduser'))
      }
    })
})
