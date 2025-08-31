<?php include('includes/header2.php') ?>
<?php include('includes/header.php') ?>
<main class="main">
    <div class="page-header pl-4 pr-4 " style="background-image: url(assets/images/bannerr.png); padding:50px; background-size:cover;">

        <h1 class="page-title font-weight-bold lh-1 text-white text-capitalize text-center">Shop</h1>
        <ul class="breadcrumb sort-tech">
            <li><a href="index.php"><i class="d-icon-home" style=" color:white;"></i></a></li>
            <!-- <li style="margin-left: 1%; color:white;">Categories</li> -->
            <li style="margin-left: 1%; color:white;">Classic Filter</li>
        </ul>
    </div>
    <!-- End PageHeader -->
    <div class="page-content mb-10 pb-6">
        <div class="container">
            <div class="row gutter-lg main-content-wrap">
                <aside
                    class="col-lg-3 sidebar sidebar-fixed sidebar-toggle-remain shop-sidebar sticky-sidebar-wrapper">
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="javascript:void(0);"><i class="d-icon-times"></i></a>
                    <a href="javascript:void(0);" class="sidebar-toggle">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                    <div class="sidebar-content">
                        <div class="sticky-sidebar" data-sticky-options="{'top': 10}">
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">All Categories</h3>
                                <ul class="widget-body filter-items search-ul">
                                    <li><a href="javascript:void(0);">Accessosries</a></li>
                                    <li>
                                        <a href="javascript:void(0);">Bags</a>
                                        <ul>
                                            <li><a href="javascript:void(0);">Backpacks & Fashion Bags</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">Electronics</a>
                                        <ul>
                                            <li><a href="javascript:void(0);">Computer</a></li>
                                            <li><a href="javascript:void(0);">Gaming & Accessosries</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0);">For Fitness</a></li>
                                    <li><a href="javascript:void(0);">Home & Kitchen</a></li>
                                    <li><a href="javascript:void(0);">Men's</a></li>
                                    <li><a href="javascript:void(0);">Shoes</a></li>
                                    <li><a href="javascript:void(0);">Sporting Goods</a></li>
                                    <li><a href="javascript:void(0);">Summer Season's</a></li>
                                    <li><a href="javascript:void(0);">Travel & Clothing</a></li>
                                    <li><a href="javascript:void(0);">Watches</a></li>
                                    <li><a href="javascript:void(0);">Women’s</a></li>
                                </ul>
                            </div>
                            <!-- <div class="widget widget-collapsible">
                                <h3 class="widget-title">Filter by Price</h3>
                                <div class="widget-body mt-3">
                                    <form action="javascript:void(0);">
                                        <div class="filter-price-slider"></div>

                                        <div class="filter-actions">
                                            <div class="filter-price-text mb-4">Price:
                                                <span class="filter-price-range"></span>
                                            </div>
                                            <button type="submit"
                                                class="btn btn-dark btn-filter btn-rounded">Filter</button>
                                        </div>
                                    </form>
                                    End Filter Price Form
                                </div>
                            </div> -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">Size</h3>
                                <ul class="widget-body filter-items">
                                    <li><a href="javascript:void(0);">Extra Large</a></li>
                                    <li><a href="javascript:void(0);">Large</a></li>
                                    <li><a href="javascript:void(0);">Medium</a></li>
                                    <li><a href="javascript:void(0);">Small</a></li>
                                </ul>
                            </div>
                            <!-- <div class="widget widget-collapsible">
                                <h3 class="widget-title">Color</h3>
                                <ul class="widget-body filter-items">
                                    <li><a href="javascript:void(0);">Black</a></li>
                                    <li><a href="javascript:void(0);">Blue</a></li>
                                    <li><a href="javascript:void(0);">Green</a></li>
                                    <li><a href="javascript:void(0);">White</a></li>
                                </ul>
                            </div> -->
                            <!-- <div class="widget widget-collapsible">
                                <h3 class="widget-title">Brands</h3>
                                <ul class="widget-body filter-items">
                                    <li><a href="javascript:void(0);">Cinderella</a></li>
                                    <li><a href="javascript:void(0);">Comedy</a></li>
                                    <li><a href="javascript:void(0);">Rightcheck</a></li>
                                    <li><a href="javascript:void(0);">SkillStar</a></li>
                                    <li><a href="javascript:void(0);">SLS</a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                </aside>
                <div class="col-lg-9 main-content">
                    <nav class="toolbox  sticky-toolbox sticky-content fix-top">
                        <div class="toolbox-left">
                            <div class="toolbox-item toolbox-sort select-box text-dark">
                                <label>Sort By :</label>
                                <select name="orderby" class="form-control">
                                    <option value="default">Default</option>
                                    <option value="popularity" selected="selected">Most Popular</option>
                                    <option value="rating">Average rating</option>
                                    <option value="date">Latest</option>
                                    <option value="price-low">Sort forward price low</option>
                                    <option value="price-high">Sort forward price high</option>
                                    <option value="">Clear custom sort</option>
                                </select>
                            </div>
                        </div>
                        <div class="toolbox-right">
                            <div class="toolbox-item toolbox-show select-box text-dark">
                                <label>Show :</label>
                                <select name="count" class="form-control">
                                    <option value="12">12</option>
                                    <option value="24">24</option>
                                    <option value="36">36</option>
                                </select>
                            </div>
                            <div class="toolbox-item toolbox-layout mr-lg-0">
                                <a href="javascript:void(0);" class="d-icon-mode-list btn-layout"></a>
                                <a href="javascript:void(0);" class="d-icon-mode-grid btn-layout active"></a>
                            </div>
                        </div>
                    </nav>
                    <div class="row cols-2 cols-sm-3 product-wrapper">
                        <div class="product-wrap">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="product-details.php">
                                        <img src="assets/images/shop/13.jpg" alt="product" width="280" height="315">
                                    </a>
                                    <div class="product-label-group">
                                        <label class="product-label label-new">new</label>
                                    </div>
                                    <div class="product-action-vertical">
                                        <!-- <a href="javascript:void(0);" class="btn-product-icon btn-cart" data-toggle="modal"
                                            data-target="javascript:void(0);addCartModal" title="Add to cart"><i
                                                class="d-icon-bag"></i></a> -->
                                        <a href="javascript:void(0);" class="btn-product-icon btn-wishlist"
                                            title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="javascript:void(0);" class="btn-product btn-quickview" title="Quick View">Add to Cart</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="javascript:void(0);">Clothing</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="javascript:void(0);">Coast Pool Comfort Jacket</a>
                                    </h3>
                                    <div class="product-price">
                                        <ins class="new-price">Rs. 199.00</ins><del class="old-price">Rs. 210.00</del>
                                    </div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="javascript:void(0);" class="rating-reviews">( 6 reviews )</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="product-details.php">
                                        <img src="assets/images/shop/1.jpg" alt="product" width="280" height="315">
                                    </a>
                                    <div class="product-action-vertical">
                                        <!-- <a href="javascript:void(0);" class="btn-product-icon btn-cart" data-toggle="modal"
                                            data-target="javascript:void(0);addCartModal" title="Add to cart"><i
                                                class="d-icon-bag"></i></a> -->
                                        <a href="javascript:void(0);" class="btn-product-icon btn-wishlist"
                                            title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="javascript:void(0);" class="btn-product btn-quickview" title="Quick View">Add to Cart</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="javascript:void(0);">bags</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="javascript:void(0);">Fashionable Hooded Coat</a>
                                    </h3>
                                    <div class="product-price">
                                        <span class="price">Rs. 35.00</span>
                                    </div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="javascript:void(0);" class="rating-reviews">( 6 reviews )</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="product-details.php">
                                        <img src="assets/images/shop/16.jpg" alt="product" width="280" height="315">
                                    </a>

                                    <div class="product-label-group">
                                        <label class="product-label label-sale">27% off</label>
                                    </div>
                                    <div class="product-action-vertical">
                                        <!-- <a href="javascript:void(0);" class="btn-product-icon btn-cart" data-toggle="modal"
                                            data-target="javascript:void(0);addCartModal" title="Add to cart"><i
                                                class="d-icon-bag"></i></a> -->
                                        <a href="javascript:void(0);" class="btn-product-icon btn-wishlist"
                                            title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="javascript:void(0);" class="btn-product btn-quickview" title="Quick View">Add to Cart</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="javascript:void(0);">bags</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="javascript:void(0);">Women's Fashion Handbag</a>
                                    </h3>
                                    <div class="product-price">
                                        <span class="price">Rs. 19.00</span>
                                    </div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="javascript:void(0);" class="rating-reviews">( 6 reviews )</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="product-details.php">
                                        <img src="assets/images/shop/4.jpg" alt="product" width="280" height="315">
                                    </a>
                                    <div class="product-action-vertical">
                                        <!-- <a href="javascript:void(0);" class="btn-product-icon btn-cart" data-toggle="modal"
                                            data-target="javascript:void(0);addCartModal" title="Add to cart"><i
                                                class="d-icon-bag"></i></a> -->
                                        <a href="javascript:void(0);" class="btn-product-icon btn-wishlist"
                                            title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="javascript:void(0);" class="btn-product btn-quickview" title="Quick View">Add to Cart</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="javascript:void(0);">Clothing</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="javascript:void(0);">Fashionable Padded Jacket</a>
                                    </h3>
                                    <div class="product-price">
                                        <ins class="new-price">Rs. 98.00</ins><del class="old-price">Rs. 210.00</del>
                                    </div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="javascript:void(0);" class="rating-reviews">( 6 reviews )</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="product-details.php">
                                        <img src="assets/images/shop/14.jpg" alt="product" width="280" height="315">
                                    </a>
                                    <div class="product-action-vertical">
                                        <!-- <a href="javascript:void(0);" class="btn-product-icon btn-cart" data-toggle="modal"
                                            data-target="javascript:void(0);addCartModal" title="Add to cart"><i
                                                class="d-icon-bag"></i></a> -->
                                        <a href="javascript:void(0);" class="btn-product-icon btn-wishlist"
                                            title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="javascript:void(0);" class="btn-product btn-quickview" title="Quick View">Add to Cart</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="javascript:void(0);">bags</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="javascript:void(0);">Cavin Fashion Suede Handbag</a>
                                    </h3>
                                    <div class="product-price">
                                        <ins class="new-price">Rs. 98.00</ins><del class="old-price">Rs. 210.00</del>
                                    </div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="javascript:void(0);" class="rating-reviews">( 6 reviews )</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="product-details.php">
                                        <img src="assets/images/shop/3.jpg" alt="product" width="280" height="315">
                                    </a>
                                    <div class="product-action-vertical">
                                        <!-- <a href="javascript:void(0);" class="btn-product-icon btn-cart" data-toggle="modal"
                                            data-target="javascript:void(0);addCartModal" title="Add to cart"><i
                                                class="d-icon-bag"></i></a> -->
                                        <a href="javascript:void(0);" class="btn-product-icon btn-wishlist"
                                            title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="javascript:void(0);" class="btn-product btn-quickview" title="Quick View">Add to Cart</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="javascript:void(0);">shoes</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="javascript:void(0);">Women's Fashion Hood</a>
                                    </h3>
                                    <div class="product-price">
                                        <ins class="new-price">Rs. 98.00</ins><del class="old-price">Rs. 210.00</del>
                                    </div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="javascript:void(0);" class="rating-reviews">( 6 reviews )</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="product-details.php">
                                        <img src="assets/images/shop/5.jpg" alt="product" width="280" height="315">
                                    </a>
                                    <div class="product-action-vertical">
                                        <!-- <a href="javascript:void(0);" class="btn-product-icon btn-cart" data-toggle="modal"
                                            data-target="javascript:void(0);addCartModal" title="Add to cart"><i
                                                class="d-icon-bag"></i></a> -->
                                        <a href="javascript:void(0);" class="btn-product-icon btn-wishlist"
                                            title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="javascript:void(0);" class="btn-product " title="Quick View">Add to Cart</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="javascript:void(0);">Watches</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="javascript:void(0);">Converse Blue Training Shoes</a>
                                    </h3>
                                    <div class="product-price">
                                        <ins class="new-price">Rs. 98.00</ins><del class="old-price">Rs. 210.00</del>
                                    </div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="javascript:void(0);" class="rating-reviews">( 6 reviews )</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="product-details.php">
                                        <img src="assets/images/shop/12.jpg" alt="product" width="280" height="315">
                                    </a>
                                    <div class="product-action-vertical">
                                        <!-- <a href="javascript:void(0);" class="btn-product-icon btn-cart" data-toggle="modal"
                                            data-target="javascript:void(0);addCartModal" title="Add to cart"><i
                                                class="d-icon-bag"></i></a> -->
                                        <a href="javascript:void(0);" class="btn-product-icon btn-wishlist"
                                            title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="javascript:void(0);" class="btn-product" title="Quick View">Add to Cart</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="javascript:void(0);">Watches</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="javascript:void(0);">Beyond OTP Jacket</a>
                                    </h3>
                                    <div class="product-price">
                                        <ins class="new-price">Rs. 98.00</ins><del class="old-price">Rs. 210.00</del>
                                    </div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="javascript:void(0);" class="rating-reviews">( 6 reviews )</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="product-details.php">
                                        <img src="assets/images/shop/15.jpg" alt="product" width="280" height="315">
                                    </a>
                                    <div class="product-action-vertical">
                                        <!-- <a href="javascript:void(0);" class="btn-product-icon btn-cart" data-toggle="modal"
                                            data-target="javascript:void(0);addCartModal" title="Add to cart"><i
                                                class="d-icon-bag"></i></a> -->
                                        <a href="javascript:void(0);" class="btn-product-icon btn-wishlist"
                                            title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="javascript:void(0);" class="btn-product " title="Quick View">Add to Cart</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="javascript:void(0);">Women’s</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="javascript:void(0);">Fashion Overnight Bag</a>
                                    </h3>
                                    <div class="product-price">
                                        <ins class="new-price">Rs. 98.00</ins><del class="old-price">Rs. 210.00</del>
                                    </div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="javascript:void(0);" class="rating-reviews">( 6 reviews )</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="product-details.php">
                                        <img src="assets/images/shop/7.jpg" alt="product" width="280" height="315">
                                    </a>
                                    <div class="product-action-vertical">
                                        <!-- <a href="javascript:void(0);" class="btn-product-icon btn-cart" data-toggle="modal"
                                            data-target="javascript:void(0);addCartModal" title="Add to cart"><i
                                                class="d-icon-bag"></i></a> -->
                                        <a href="javascript:void(0);" class="btn-product-icon btn-wishlist"
                                            title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="javascript:void(0);" class="btn-product " title="Quick View">Add to Cart</a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="javascript:void(0);">shoes</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="javascript:void(0);">Fashion Brown Suede Shoes</a>
                                    </h3>
                                    <div class="product-price">
                                        <ins class="new-price">Rs. 98.00</ins><del class="old-price">Rs. 210.00</del>
                                    </div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="javascript:void(0);" class="rating-reviews">( 6 reviews )</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="product-details.php">
                                        <img src="assets/images/shop/8.jpg" alt="product" width="280" height="315">
                                    </a>
                                    <div class="product-action-vertical">
                                        <!-- <a href="javascript:void(0);" class="btn-product-icon btn-cart" data-toggle="modal"
                                            data-target="javascript:void(0);addCartModal" title="Add to cart"><i
                                                class="d-icon-bag"></i></a> -->
                                        <a href="javascript:void(0);" class="btn-product-icon btn-wishlist"
                                            title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="javascript:void(0);" class="btn-product" title="Quick View">Add to Cart
                                            </a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="javascript:void(0);">Women’s</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="javascript:void(0);">Men's Fashion Jacket</a>
                                    </h3>
                                    <div class="product-price">
                                        <ins class="new-price">Rs. 98.00</ins><del class="old-price">Rs. 210.00</del>
                                    </div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="javascript:void(0);" class="rating-reviews">( 6 reviews )</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrap">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="product-details.php">
                                        <img src="assets/images/shop/9.jpg" alt="product" width="280" height="315">
                                    </a>
                                    <div class="product-action-vertical">
                                        <!-- <a href="javascript:void(0);" class="btn-product-icon btn-cart" data-toggle="modal"
                                            data-target="javascript:void(0);addCartModal" title="Add to cart"><i
                                                class="d-icon-bag"></i></a> -->
                                        <a href="javascript:void(0);" class="btn-product-icon btn-wishlist"
                                            title="Add to wishlist"><i class="d-icon-heart"></i></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="javascript:void(0);" class="btn-product " title="Quick View">Add to Cart
                                            </a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat">
                                        <a href="javascript:void(0);">electronics</a>
                                    </div>
                                    <h3 class="product-name">
                                        <a href="javascript:void(0);">Fashion Cowboy Hat</a>
                                    </h3>
                                    <div class="product-price">
                                        <ins class="new-price">Rs. 98.00</ins><del class="old-price">Rs. 210.00</del>
                                    </div>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="javascript:void(0);" class="rating-reviews">( 6 reviews )</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav class="toolbox toolbox-pagination">
                        <!-- <p class="show-info">Showing <span>12 of 56</span> Products</p> -->
                        <!-- <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link page-link-prev" href="javascript:void(0);" aria-label="Previous" tabindex="-1"
                                    aria-disabled="true">
                                    <i class="d-icon-arrow-left"></i>Prev
                                </a>
                            </li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="javascript:void(0);">1</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                            <li class="page-item page-item-dots"><a class="page-link" href="javascript:void(0);">6</a></li>
                            <li class="page-item">
                                <a class="page-link page-link-next" href="javascript:void(0);" aria-label="Next">
                                    Next<i class="d-icon-arrow-right"></i>
                                </a>
                            </li>
                        </ul> -->
                    </nav>
                </div>
            </div>
        </div>
    </div>

</main>
<!-- End Main -->

<?php include('includes/footer.php') ?>