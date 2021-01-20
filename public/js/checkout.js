/* Set rates + misc */
var taxRate = 0.05;
var shippingRate = 15.00; 
var fadeTime = 300;


/* Assign actions */
$('.product-quantity input').change( function() {
  updateQuantity(this);
});

$('.product-removal button').click( function() {
  console.log($(this).attr('data-id'));
  //拿到購物車產品ID
  var id =$(this).attr('data-id');
  var qty =parseInt(this.previousSibling.previousSibling.value);
  var _token =document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  //建立表單
  var formData = new FormData;
  //存入資料庫
  formData.append('id',id);
  formData.append('qty',qty);
  formData.append('_token',_token);

  console.log(formData);

  fetch('/dal_cart', {
      method:'POST',
      body:formData,
  })
  .then(function (response){
      return response.text()
  })
  .catch(function (error){
      console.log('錯誤:',error);
  })
  .then(function(data){
      //回傳的資料
      if(data == "false"){
          //fales(代表找不到產品)
          alert('找不到該項產品');
      }else{
          //車子有多少數量的商品
          $('.shopping_cart .qty').text(data);
      }
      console.log('成功:',data);
  });


  // removeItem(this);
});


/* Recalculate cart */
function recalculateCart()
{
  var subtotal = 0;
  
  /* Sum up row totals */
  $('.product').each(function () {
    subtotal += parseFloat($(this).children('.product-line-price').text());
  });
  
  /* Calculate totals */
  var tax = subtotal * taxRate;
  var shipping = (subtotal > 0 ? shippingRate : 0);
  var total = subtotal + tax + shipping;
  
  /* Update totals display */
  $('.totals-value').fadeOut(fadeTime, function() {
    $('#cart-subtotal').html(subtotal.toFixed(2));
    $('#cart-tax').html(tax.toFixed(2));
    $('#cart-shipping').html(shipping.toFixed(2));
    $('#cart-total').html(total.toFixed(2));
    if(total == 0){
      $('.checkout').fadeOut(fadeTime);
    }else{
      $('.checkout').fadeIn(fadeTime);
    }
    $('.totals-value').fadeIn(fadeTime);
  });
}


/* Update quantity */
function updateQuantity(quantityInput)
{
  /* Calculate line price */
  var productRow = $(quantityInput).parent().parent();
  var price = parseFloat(productRow.children('.product-price').text());
  var quantity = $(quantityInput).val();
  var linePrice = price * quantity;
  
  /* Update line price display and recalc cart totals */
  productRow.children('.product-line-price').each(function () {
    $(this).fadeOut(fadeTime, function() {
      $(this).text(linePrice.toFixed(2));
      recalculateCart();
      $(this).fadeIn(fadeTime);
    });
  });  
}


/* Remove item from cart */
function removeItem(removeButton)
{
  /* Remove row from DOM and recalc cart total */
  var productRow = $(removeButton).parent().parent();
  productRow.slideUp(fadeTime, function() {
    productRow.remove();
    recalculateCart();
  });
}