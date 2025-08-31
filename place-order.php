<?php include('includes/header.php') ?>

<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="funds-success-message-container">
                    <div class="funds-checkmark-text-container">
                        <div class="funds-checkmark-container">
                            <svg class="funds-checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                <circle class="funds-checkmark-circle" cx="26" cy="26" r="25" fill="none" />
                                <path class="funds-checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                            </svg>

                            <div class="funds-display-on-ie">
                                <svg class="funds-ie-checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                    <circle class="funds-ie-checkmark-circle" cx="26" cy="26" r="25" fill="none" />
                                    <path class="funds-ie-checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                </svg>
                            </div>
                        </div>


                    </div>



                </div>
                <div class="invoice p-5 text-center    ">
                    <h5 class="text-center mt-7 mb-3">Your order Confirmed!</h5> <span class="font-weight-bold d-block  mb-3 ">Hello, there</span> <span>Your order has been confirmed and will be shipped in next two to three days!</span>


                    <hr>
                    <div class="payment border-top mt-5 mb-3 border-bottom table-responsive">



                        <table class="table table-borderless mt-5">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted mb-5">Order Date</span> <span>12 Jan,2018</span> </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted mb-5">Order No</span> <span>MT12332345</span> </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted mb-5">Payment</span> <span><img src="https://img.icons8.com/color/48/000000/mastercard.png" width="20" style="margin-left: 160px; " /></span> </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted mb-5">Shiping Address</span> <span>414 Advert Avenue, NY,USA</span> </div>
                                    </td>
                                </tr>

                            </tbody>

                        </table>
                    </div>
                    <hr>
                    <!-- <div class="order-btn">
                        <a href="index.php"><button type="submit" class="btn btn-light btn-order" style="border-radius: 45px;">Continue shopping</button></a>
                    </div> -->


                    <!--  <table> -->





                    <div class="container mt-10 mt-7 mb-2">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 pr-lg-4">
                                <table class="shop-table cart-table">
                                    <thead>
                                        <tr>
                                            <th><span>Product</span></th>
                                            <th></th>
                                            <th><span>Price</span></th>
                                            <th><span style="margin-left: 25px;">quantity</span></th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="product-thumbnail">
                                                <figure>
                                                    <a href="javascript:void(0);">
                                                        <img src="assets/images/shop/7.jpg" width="100" height="100"
                                                            alt="product">
                                                    </a>
                                                </figure>
                                            </td>
                                            <td class="product-name">
                                                <div class="product-name-section">
                                                    <a href="javascript:void(0);">Converse Training Shoes</a>
                                                </div>
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="amount">Rs. 129.99</span>
                                            </td>
                                            <td class="product-quantity">
                                                <div class="input-group" style="margin-left:65px;">
                                                    <!-- <button class="quantity-minus d-icon-minus"></button> -->
                                                    <input class="quantity" type="number" min="1"
                                                        max="1000000">
                                                    <!-- <button class="quantity-plus d-icon-plus"></button> -->
                                                </div>
                                            </td>
                                            <td class="product-price">
                                                <span class="amount">Rs. 129.99</span>
                                            </td>
                                            <!-- <td class="product-close">
                                            <a href="javascript:void(0);" class="product-remove" title="Remove this product">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </td> -->
                                        </tr>
                                        <tr>
                                            <td class="product-thumbnail">
                                                <figure>
                                                    <a href="javascript:void(0);">
                                                        <img src="assets/images/shop/8.jpg" width="100" height="100"
                                                            alt="product">
                                                    </a>
                                                </figure>

                                            </td>
                                            <td class="product-name">
                                                <div class="product-name-section">
                                                    <a href="javascript:void(0);">Women Beautiful Headgear</a>
                                                </div>
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="amount">Rs. 98.00</span>
                                            </td>
                                            <td class="product-quantity">
                                                <div class="input-group" style="margin-left:65px;">
                                                    <!-- <button class="quantity-minus d-icon-minus"></button> -->
                                                    <input class="quantity" type="number" min="1"
                                                        max="1000000">
                                                    <!-- <button class="quantity-plus d-icon-plus"></button> -->
                                                </div>
                                            </td>
                                            <td class="product-price">
                                                <span class="amount">Rs. 98.00</span>
                                            </td>
                                            <!-- <td class="product-close">
                                            <a href="javascript:void(0);" class="product-remove" title="Remove this product">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </td> -->
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- --------------- -->

                            </div>


                            <aside class="col-lg-4 sticky-sidebar-wrapper">
                                <div class="sticky-sidebar" data-sticky-options="{'bottom': 20}">
                                    <div class="summary mb-4">
                                        <h3 class="summary-title text-left">Cart Totals</h3>
                                        <table class="shipping">
                                            <tr class="summary-subtotal">
                                                <td>
                                                    <h4 class="summary-subtitle">Subtotal</h4>
                                                </td>
                                                <td>
                                                    <p class="summary-subtotal-price">Rs. 426.99</p>
                                                </td>
                                            </tr>

                                            <table class="total">
                                                <tr class="summary-subtotal">
                                                    <td>
                                                        <h4 class="summary-subtitle">Total</h4>
                                                    </td>
                                                    <td>
                                                        <p class="summary-total-price ls-s">Rs. 426.99</p>
                                                    </td>
                                                </tr>
                                            </table>
                                            <a href="checkout.php" class="btn btn-dark btn-rounded btn-checkout mt-4">Details</a>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
















                    <hr>
                    <!-- <table> -->
                    <!-- <div class="row ">
                        <div class="col-lg-6 ">
                            <div class="product border-bottom table-responsive">
                                <table class="table table-borderless ">
                                    <thead>
                                        <tr>
                                            <th>Product</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td width="20%"> <img src="https://i.imgur.com/u11K1qd.jpg" width="90"> </td>
                                            <td width="60%" class="text-center"> <span class="font-weight-bold ">Men's Sports cap</span>
                                                <div class="product-qty"> <span class="d-block text-black">Quantity:1</span> <span class="text-black">Color:Dark</span> </div>
                                            </td>
                                            <td width="20%" class="text-center">
                                                <div class="text-right"> <span class="font-weight-bold">$67.50</span> </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%"> <img src="https://i.imgur.com/SmBOua9.jpg" width="70"> </td>
                                            <td width="60%" class="text-center"> <span class="font-weight-bold">Men's Collar T-shirt</span>
                                                <div class="product-qty"> <span class="d-block text-black">Quantity:1</span> <span class="text-black">Color:Orange</span> </div>
                                            </td>
                                            <td width="20%">
                                                <div class="text-right"> <span class="font-weight-bold">$77.50</span> </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row d-flex justify-content-end">
                                <div class="col-md-5">
                                    <table class="table table-border">

                                        <tbody class="totals">
                                            <tr>
                                                <td>
                                                    <div class="text-left"> <span class="text-muted">Subtotal</span> </div>
                                                </td>
                                                <td>
                                                    <div class="text-right"> <span>$168.50</span> </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="text-left"> <span class="text-muted">Shipping Fee</span> </div>
                                                </td>
                                                <td>
                                                    <div class="text-right"> <span>$22</span> </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="text-left"> <span class="text-muted">Tax Fee</span> </div>
                                                </td>
                                                <td>
                                                    <div class="text-right"> <span>$7.65</span> </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="text-left"> <span class="text-muted">Discount</span> </div>
                                                </td>
                                                <td>
                                                    <div class="text-right"> <span class="text-success">$168.50</span> </div>
                                                </td>
                                            </tr>
                                            <tr class="border-top border-bottom">
                                                <td>
                                                    <div class="text-left"> <span class="font-weight-bold">Subtotal</span> </div>
                                                </td>
                                                <td>
                                                    <div class="text-right"> <span class="font-weight-bold">$238.50</span> </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <p class="mt-5">We will be sending shipping confirmation email when the item shipped successfully!</p>




                </div>
               
               

            </div>

            <div >
                <div class="cart-actions mt-8 mb-6 pt-4  ">
                    <a href="index.php" class="btn btn-dark btn-md btn-rounded  mr-4 mb-4 mx-auto"><i
                            class="d-icon-arrow-left"></i>Continue Shopping</a>

                </div>
                </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>