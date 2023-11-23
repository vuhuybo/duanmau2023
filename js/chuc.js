
function detail_pro(id){
    document.querySelector(".modal").style = "display:flex;"
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if(xmlhttp.readyState === 4){
        var a = this.responseText;
        b = json_parse(a);
        $('.namedetail').html(b.name);
        $('.pricedetail').html(formatMoney(parseInt(b.price)));
        $('.imgdetail').attr('src','upload/'+b.img);
        var c = json_parse(b.mota);
        $.each(c,function(key,value){
          if(parseInt(key) < 4){
            if(parseInt(key) % 2 === 0){
              var newRow = $("<tr>");
              var cell1 = $("<td>").text(value.name);
              var cell2 = $("<td>").text(value.value);
              newRow.append(cell1, cell2);
            }else{
              var newRow = $("<tr>").addClass('tr');
              var cell1 = $("<td>").text(value.name);
              var cell2 = $("<td>").text(value.value);
              newRow.append(cell1, cell2);
            }
            $('.table_detailpro').append(newRow);
          }
        })
        var d = json_parse(b.soluong);
        console.log(d);
        $.each(d,function(key,value){
          var newOption = $("<option>").attr('value',value.color).text(value.color);
          $('.select_color_detailpro').append(newOption);
        })
        $('.them_cart').attr('href','index.php?act=addcart&idpro='+b.id+'&from=home');
      }
    };
    xmlhttp.open("GET", "./index.php?act=sp&id=" + id, true);
    xmlhttp.send();
}
function undetail_pro(){
    $('.modal').css('display','none');
    $('.table_detailpro').empty();
    $('.select_color_detailpro').empty();
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
$('.change-address').on('click',function(){
  console.log('1');
  $('.address-checked').css('display','block');
})
$('.cancel-address').on('click',function(){
  console.log('1.1');
  $('.address-checked').css('display','none');
})
$('.add-address').on('click',function(){
  console.log('2');
  $('.address-checked').css('display','none');
  $('.add-address-checked').css('display','block');
})
$('.back-address1').on('click',function(){
  console.log('3');
  $('.add-address-checked').css('display','none');
  $('.address-checked').css('display','block');
})

$('.back-address2').on('click',function(){
  console.log('6');
  $('.update-address-checked').css('display','none');
  $('.address-checked').css('display','block');
})
function update_address(id){
  $('.update-address-checked').css('display','block');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        var a = this.responseText;
        b = json_parse(a);
        $('.form_update_address').attr('action','view/address/update_address.php?id_address='+ b.id)
        $('.name_update-address').attr('value',b.name);
        $('.tel_update-address').attr('value',b.tel);
        $('.tinh_update-address').attr('value',b.tinh);
        $('.detail_location_update-address').attr('value',b.detail_location);
    };
    xmlhttp.open("GET", "./view/address/update_address.php?id=" + id, true);
    xmlhttp.send();
}

function change_address(){
  const inp = $('input[name="check-address"]:checked');
  const labl = inp.next('label');
  const name = labl.find('p').eq(0).text();
  const id = labl.attr('data-id');
  const tel = labl.find('p').eq(1).text();
  const location = labl.find('p').eq(2).text();
  

  $('.address-name').html(name);
  $('.tel-bill').html(tel);
  $('.address-id').attr('value',id);
  $('.location').html(location);
  console.log('1');
}
$('.count_cart').change( function(){
  console.log('change count');
  var xmlhttp = new XMLHttpRequest();
  id_pro = $(this).attr('data-idpro');
  count_cart = $(this).val();
  console.log(count_cart);
  console.log(id_pro);
  xmlhttp.onreadystatechange = function() {
  };
  xmlhttp.open("GET", "./index.php?act=addcart&count_cart="+count_cart +"&idpro=" + id_pro, true);
  xmlhttp.send();
})

$('.delete-address').on('click', function(){
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
        window.open('view/address/delete_address.php?id=' + $(this).attr('data-id'))
      }
    })
})
$('.info_user-hoso').on('click',function(){
  $('.right_info-info').css('display','block');
  $('.right_info-address').css('display','none');
  $('.right_info-orders').css('display','none');
})
$('.info_user-diachi').on('click',function(){
  $('.right_info-info').css('display','none');
  $('.right_info-orders').css('display','none');
  $('.right_info-address').css('display','block');
})
$('.info_user-orders').on('click',function(){
  $('.right_info-info').css('display','none');
  $('.right_info-address').css('display','none');
  $('.right_info-orders').css('display','block');
})
// $('.count_page').attr('page');
$('.index_page').each(function (){
  if($(this).attr('data-page') == $('.count_page').attr('page')){
    $(this).addClass('page_active');
  }
});
$('.delete_order').on('click',function(){
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
      window.open('index.php?act=delete_order&id_order=' + $(this).attr('data-id'))
    }
  })
})
$('.step0').slice(0,$('#progressbar').attr('count_status')).each(function(){
  $(this).addClass('active');
  var a = $('#progressbar').attr('date_status');
})
// xử lí số lượng trong chi tiết sản phẩm
$('.detail_pro-color').on('change',function(){
  var color  = $(this).val() ;
   var a = $('.count_pro_cart').attr('data-quatyti');
   var b = JSON.parse(a);
   $.each(b,function(key,value){
    if( value.color === color ){
      $('.count_pro_cart').attr('max',value.quatyti)
    }
   })
})
$('.btn_add_input').on('click',function(){
  var div1 = $("<div>").addClass("input_input-container");
  $(this).before(div1);
  var input1 = $("<input>").attr("type", "text").attr("placeholder", "Nhập màu").addClass("custom-input").attr("name", "color[]").css('margin-bottom','5px');
  var input2 = $("<input>").attr("type", "text").attr("placeholder", "Nhập số lượng").addClass("custom-input").attr("name", "soluong[]");

  div1.append(input1, input2);  

})
$('.add_form_info').on('click',function(){
  var div1 = $("<div>").addClass("item_input").css('margin','0 0 10px 0');
  $(this).before(div1);
  var input1 = $("<input>").attr("type", "text").attr("placeholder", "Nhập tên trường thông tin").attr("name", "info_pro[]").css('margin-bottom','5px');
  var input2 = $("<input>").attr("type", "text").attr("placeholder", "Nhập thông tin").attr("name", "description_sp[]");

  div1.append(input1, input2);  

})



