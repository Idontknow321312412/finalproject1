<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css"  rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/order.css') }}">
    <title>Restaurant</title>
</head>
<body>
    @include('partials.navbar3')
          <div class="top-c">

          </div>
          <div class="content-c">
            <div class="content-header">
                <label class="restaurant">Restaurant</label>
                <img src="{{ asset('assets/images/delivery-man.png') }}" class="shipping-icon">
                <label class="shipping-price">2.00€</label>
            </div>
            <p class="order-header">YOUR ORDER</p>
            <form method="post" class="order-form" id="orderForm" action="https://formspree.io/f/xpzvpdkr">
            <div class="order-c">


                <ul id="order-items2"></ul>
            </div>


            <div class="green-line"></div>
            <div class="total-c">
                <div class="shipping-amount">
                    <label class="shipping-price-o">Shipping:</label>
                    <label class="shipping-price-a">€2.00</label><br>
                </div>
                <div class="total-amount">
                    <label class="total-o">TOTAL:</label>
                    <span class="total-price" id="total-price">€
                        <span id="total">
                            0
                        </span>
                    </span>
                </div>
            </div>
            
            <input type="text" placeholder="Enter your location" class="location"><br>
                <input type="number" placeholder="Enter your phone number" class="phone-nr">
            <div class="center-items">
                <input type="submit" value="ORDER NOW" class="submit-order" onclick="submitOrder()" style="cursor: pointer">
            </div>
            </form>
          </div>
            <script>
                // Retrieve cart data from localStorage
const cartData = JSON.parse(localStorage.getItem('cartData')) || [];

// Function to display cart items on the order page
function displayOrderItems() {
    const orderItemsElement = document.getElementById('order-items2');

    // Add items to the list
    cartData.forEach(item => {
        const listItem = document.createElement('li');

        // Create container for cart item
        const itemContainer = document.createElement('div');
        itemContainer.classList.add('cart-item-container');

        // Create div for item name
        const nameDiv = document.createElement('div');
        nameDiv.classList.add('item-name2');
        nameDiv.textContent = item.name;
        itemContainer.appendChild(nameDiv);

        // Create div for item price
        const priceDiv = document.createElement('div');
        priceDiv.classList.add('item-price2');
        priceDiv.textContent = `€${item.price.toFixed(2)}`;
        itemContainer.appendChild(priceDiv);

        listItem.appendChild(itemContainer);
        orderItemsElement.appendChild(listItem);
    });
}

// Function to handle the "Confirm Order" button click
function confirmOrder() {
    // Perform any actions needed to confirm the order
    alert('Order confirmed!');

    // Clear the cart data from localStorage
    localStorage.removeItem('cartData');

    // Redirect back to the main page
    window.location.href = "{{ route('order') }}";
}

// Function to update the total
function updateTotal() {
    const totalSpan = document.getElementById('total-price');
    const shippingCost = 2.00; // You can adjust this value as needed

    // Calculate the total price from the cartData
    const totalPrice = cartData.reduce((acc, item) => acc + item.price, 0);

    // Add shipping cost to the total
    const totalPriceWithShipping = totalPrice + shippingCost;

    // Update the total price in the span
    totalSpan.textContent = `€${totalPriceWithShipping.toFixed(2)}`;
}

// Display cart items on page load
window.onload = function () {
    displayOrderItems();
    updateTotal();
};

// Add an event listener to the form
document.getElementById('orderForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent the default form submission
    submitOrder(); // Call the submitOrder function
    displayOrderItems(); // Display the cart items again after form submission
});
// Replace the existing submitOrder function
// Replace the existing submitOrder function
function submitOrder() {
    const form = document.getElementById('orderForm');
    const location = form.querySelector('.location').value;
    const phone_number = form.querySelector('.phone-nr').value;

    // Create a FormData object to send form data
    const formData = new FormData(form);
    
    // Append cartData, location, and phone_number to FormData
    formData.append('cart_data', JSON.stringify(cartData));
    formData.append('location', location);
    formData.append('phone_number', phone_number);

    // Send the form data to Formspree endpoint
    fetch('https://formspree.io/f/xpzvpdkr', {
        method: 'POST',
        body: formData,
        headers: {
            'Accept': 'application/json'
        },
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        // Assuming you want to clear the cart and redirect after successful submission
        localStorage.removeItem('cartData');
        window.location.href = "{{ route('order') }}";
    })
    .catch(error => {
        console.error('Error submitting order:', error);
        alert('There was an error submitting your order. Please try again.');
    });
}


            </script>
                
          
          @include('partials.footer')
        </div>
        </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</html>