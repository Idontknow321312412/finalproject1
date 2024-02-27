<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css"  rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/restaurant.css') }}">
    <title>Document</title>
</head>
<body>
    @include('partials.navbar2')


        <div class="content-c">
            <div class="top-c">
                <img src="{{ asset('assets/images/add-cart.png') }}" class="add-cart-c"  onclick="toggleSidebar2()" id="toggleButton">
            </div>
            <div class="float">

                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var sidebar2 = document.getElementById('sidebar2');
                    var toggleButton = document.getElementById('toggleButton');

                    function closeSidebar2() {
                        if (sidebar2.style.right === '0px') {
                            sidebar2.style.right = '-380px';
                            toggleButton.style.display = 'block';
                        }
                    }

                    function toggleSidebar2() {
                        if (sidebar2.style.right === '0px') {
                            // If the sidebar is open, close it and hide the image
                            sidebar2.style.right = '-380px';
                            toggleButton.style.display = 'block';
                        } else {
                            // If the sidebar is closed, open it and show the image
                            sidebar2.style.right = '0px';
                            toggleButton.style.display = 'none';
                        }
                    }

                    // Attach the event listener to the image
                    if (toggleButton) {
                        toggleButton.onclick = toggleSidebar2;
                    }

                    // Add click event listener to the document body
                    document.body.addEventListener('click', function(event) {
                        // Check if the click is outside the sidebar and the toggleButton
                        if (!sidebar2.contains(event.target) && event.target !== toggleButton) {
                            closeSidebar2();
                        }
                    });
                });
    </script>
    <div id="sidebar2"class="sidebar2">
        <p class="cart-s">YOUR CART</p>
        <div class="cart-items-s">
            <div class="cart-item-s">
                <div class="cart-item-name-s height-c2s">Item name</div>
                <div class="cart-item-price-s height-c2s">1.00€</div>
                <div class="remove-item-s">+</div>
            </div>
            <div class="cart-item-s">
                <div class="cart-item-name-s height-c2s">Item name</div>
                <div class="cart-item-price-s height-c2s">1.00€</div>
                <div class="remove-item-s">+</div>
            </div>
            <div class="cart-item-s">
                <div class="cart-item-name-s height-c2s">Item name</div>
                <div class="cart-item-price-s height-c2s">1.00€</div>
                <div class="remove-item-s">+</div>
            </div>
            <div class="cart-item-s">
                <div class="cart-item-name-s height-c2s">Item name</div>
                <div class="cart-item-price-s height-c2s">1.00€</div>
                <div class="remove-item-s">+</div>
            </div>
            <div class="cart-item-s">
                <div class="cart-item-name-s height-c2s">Item name</div>
                <div class="cart-item-price-s height-c2s">1.00€</div>
                <div class="remove-item-s">+</div>
            </div>
            <div class="cart-item-s">
                <div class="cart-item-name-s height-c2s">Item name</div>
                <div class="cart-item-price-s height-c2s">1.00€</div>
                <div class="remove-item-s">+</div>
            </div>    
            <div class="cart-item-s">
                <div class="cart-item-name-s height-c2s">Item name</div>
                <div class="cart-item-price-s height-c2s">1.00€</div>
                <div class="remove-item-s">+</div>
            </div>
            <div class="cart-item-s">
                <div class="cart-item-name-s height-c2s">Item name</div>
                <div class="cart-item-price-s height-c2s">1.00€</div>
                <div class="remove-item-s">+</div>
            </div>
            <div class="cart-item-s">
                <div class="cart-item-name-s height-c2s">Item name</div>
                <div class="cart-item-price-s height-c2s">1.00€</div>
                <div class="remove-item-s">+</div>
            </div>
            <div class="cart-item-s">
                <div class="cart-item-name-s height-c2s">Item name</div>
                <div class="cart-item-price-s height-c2s">1.00€</div>
                <div class="remove-item-s">+</div>
            </div>
            <div class="cart-item-s">
                <div class="cart-item-name-s height-c2s">Item name</div>
                <div class="cart-item-price-s height-c2s">1.00€</div>
                <div class="remove-item-s">+</div>
            </div>      
            
        </div>
            <div class="green-line">

            </div>
            <span class="total-text-s">
                Total:
            </span>
            <span class="total-price-s">
                15.00€
            </span>
        <button class="add-item-s">ORDER NOW</button>
    </div>

            <div class="restaurant-c">
                <span class="restaurant-name">restaurant</span><br>
                <span class="shipping">2.00€</span>
                <img src="{{ asset('assets/images/delivery-man.png') }}" class="shipping-icon">
            </div>
            {{-- <div class="search-c">
                <form>
                    <input type="search" id="search" placeholder="Search..." class="search">
                </form>
            </div> --}}
                @csrf
            <div class="items-c">
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-12 margins">
                    @foreach($items as $item)
                        <div class="height-c">
                            <label class="item-name" data-item-name="{{ $item->item_name }}" name="item_name">{{ $item->item_name }}</label>
                            <img class="item-image" src='{{ asset("storage/item_pictures/{$item->item_picture}") }}' alt="Item image">
                            <label class="item-price" data-item-price="{{ $item->item_price }}" name="item_price">{{ $item->item_price }}€</label>
                            <button class="add-item" onclick="addToCart('{{ $item->item_name }}', {{ $item->item_price }})">ADD TO CART</button>
                        </div>                            
                    @endforeach
                </div>

                
                
            </div>
            </form>
            
        </div>
        <div class="float-2">
            <div class="cart-c">
                <p class="cart-p">YOUR CART</p>
                <div class="cart-items"> {{-- cart container --}}
                    <ul id="cart-items2"></ul>             
                </div>

                <div class="green-line">

                </div>
                <span class="total-text">
                    TOTAL:
                </span>
                <span class="total-price">€
                    <span id="total">
                        0
                    </span>
                </span>
                <button class="add-item" style="width: 50%;" onclick="orderNow()">ORDER NOW</button>
            </div>            
        </div>
        </div>
        <p></p>
        <!-- ... (your existing HTML code) ... -->

            <script>
                // Cart state
                const cart = [];
                let total = 0;

                // Function to add an item to the cart
                function addToCart(itemName, itemPrice) {
                    cart.push({ name: itemName, price: itemPrice });
                    total += itemPrice;

                    // Update the cart display
                    updateCartDisplay();
                }

                // Function to update the cart display
                function updateCartDisplay() {
                    const cartItemsElement = document.getElementById('cart-items2');
                    const totalElement = document.getElementById('total');

                    // Clear existing items
                    cartItemsElement.innerHTML = '';

                    // Add items to the list
                    cart.forEach(item => {
                        const listItem = document.createElement('li');

                        // Create div for item name
                        const nameDiv = document.createElement('div');
                        nameDiv.textContent = item.name;
                        listItem.appendChild(nameDiv);

                        // Create div for item price
                        const priceDiv = document.createElement('div');
                        priceDiv.textContent = `€${item.price.toFixed(2)}`;
                        listItem.appendChild(priceDiv);

                        cartItemsElement.appendChild(listItem);
                    });

                    // Update total with 2 decimal places
                    totalElement.textContent = total.toFixed(2);
                }
                function orderNow() {
                    // Pass the cart data to the new page
                    localStorage.setItem('cartData', JSON.stringify(cart));
                    // Redirect to the new page
                    window.location.href = "{{ route('order') }}";
                }
            </script>

<!-- ... (rest of your HTML code) ... -->

        <div class="footer-margin">
            
        </div>
        @include('partials.footer')
    </div>
    
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</html>