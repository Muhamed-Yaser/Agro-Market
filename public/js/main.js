



// // Cart
let cartIcon = document.querySelector('#cart-icon')
let cart = document.querySelector('.cart')
let closeCart = document.querySelector('#close-cart')

// // Open Cart
cartIcon.addEventListener('click',()=>{
  cart.classList.add('active')
})

// Close Cart
closeCart.addEventListener('click',()=>{
  cart.classList.remove('active')
})

// Cart Working Js
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded',ready)
}else{
  ready()
}

// Making Function
function ready() {
  // Remove Items From Cart
  let removeCartButtons = Array.from(document.getElementsByClassName('cart-remove'));
  // console.log(removeCartButtons);
  removeCartButtons.forEach((removeCartBtn)=>{
    removeCartBtn.addEventListener('click',removeCartItem);
  })

  // Quantity Change
  let quantityInputs = Array.from(document.getElementsByClassName('cart-quantity'));
  // console.log(quantityInput);
  quantityInputs.forEach((quantityInput)=>{
    quantityInput.addEventListener('change',quantityChanged);
  })

  // Add To Cart
  let addCart = document.querySelectorAll('.add-cart');
  addCart.forEach((addCart)=>{
    addCart.addEventListener('click',addCartClicked)
  })

  // Buy Btn Work
  document.querySelector('.btn-buy').addEventListener('click',buyButtonClicked)
}


// Buy Btn
function buyButtonClicked(e) {
  let cartContentDiv = document.querySelector('.cart-content')
  let item = e.target;
  let cartContent = item.parentElement.childNodes[4].nextElementSibling;
  if(cartContent.hasChildNodes() === false){
    alert('Cart Is Empty Already!!')
    return false;
  }
  alert('Your Order Is Placed')
  while (cartContentDiv.hasChildNodes()) {
    cartContentDiv.removeChild(cartContentDiv.firstChild);
  };
  updateTotal()
}


// Remove Items From Cart
function removeCartItem(e) {
  let removeItem = e.target;
  // buttonClicked.parentElement ==> بالكامل div ال
  removeItem.parentElement.remove();
  updateTotal()
}


// quantity Func
function quantityChanged(e) {
  let input = e.target;
  if(isNaN(input.value) || input.value < 0 || input.value <= 0){
    input.value = 1;
  }
  updateTotal()
}

function addCartClicked(e) {
  let itemCartIcon = e.target;
  let shopProducts = itemCartIcon.parentElement.parentElement;
  let title = shopProducts.querySelectorAll('.product-title')[0].innerHTML;
  let price = shopProducts.querySelectorAll('.price')[0].innerHTML;
  let productImg = shopProducts.querySelectorAll('.product-img')[0].src;
  addProductToCart(title,price,productImg);
  updateTotal()
}

function addProductToCart(title,price,productImg){
  var cartShopBox = document.createElement('div');
  cartShopBox.classList.add('cart-box');
  let cartItems = document.querySelector('.cart-content');
  let cartItemsNames = cartItems.querySelectorAll('.cart-product-title');
  for (let i = 0; i < cartItemsNames.length; i++) {
    if(cartItemsNames[i].innerHTML === title){
      alert('You Have Already Add This Item To Cart');
      return false;
    }
  }
  let cartBoxContent =`
    <img src="${productImg}" alt="" class="cart-img">
    <div class="detail-box">
      <div class="cart-product-title">${title}</div>
      <div class="cart-price">${price}</div>
      <input type="number" min="1" value="1" class="cart-quantity">
    </div>
    <i class="ri-delete-bin-fill cart-remove"></i>
  `
  cartShopBox.innerHTML = cartBoxContent;
  cartItems.append(cartShopBox);
  cartShopBox.getElementsByClassName('cart-remove')[0].addEventListener('click',removeCartItem)
  cartShopBox.getElementsByClassName('cart-quantity')[0].addEventListener('change',quantityChanged)
}



// Update Total
function updateTotal() {
  let cartContent = document.querySelector('.cart-content');
  let cartBoxes = Array.from(cartContent.getElementsByClassName('cart-box'));
  document.querySelector('#count').innerHTML = cartBoxes.length;
  let total = 0;
  cartBoxes.forEach((cartBox =>{
    let priceElement = cartBox.getElementsByClassName('cart-price')[0];
    let quantityElement = cartBox.getElementsByClassName('cart-quantity')[0];
    let quantity = quantityElement.value;
    let price = parseFloat(priceElement.innerHTML.replace("$",""))
    total = total + (price * quantity);
  }))

  // If Price Contain Some Cents Value
  total = Math.round(total * 100) / 100; // => لتقريب الناتج ل اقرب عددين عشريين
  document.querySelector('.total-price').innerHTML = '$' + total;
}


// let heartIcon = document.querySelector('#heart-icon')

// // Open Cart
// heartIcon.addEventListener('click',()=>{
//   cart.classList.add('active')
// })

// // Close Cart
// heartIcon.addEventListener('click',()=>{
//   cart.classList.remove('active')
// })

