<?php include('includes/header2.php') ?>
<?php include('includes/header.php') ?>
<main class="main">
    <div class="page-content">
        <section class="intro-section">
            <div class="owl-carousel owl-theme row owl-dot-inner owl-dot-white intro-slider animation-slider cols-1 gutter-no" data-owl-options="{
                        'nav': false,
                        'dots': true,
                        'loop': false,
                        'items': 1,
                        'autoplay': false,
                        'autoplayTimeout': 8000
                    }">

<div class="banner">
    <?php
    include 'config.php';
    $sql = "SELECT * FROM banner ORDER BY id DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $index = 0;
        while ($row = $result->fetch_assoc()) {
            $img = 'admin/uploads/banners/' . $row['image'];
            $url = $row['url'];
            $style = ($index === 0) ? 'display:block;' : 'display:none;';
            echo '<div class="slide" style="position:absolute;top:0;left:0;width:100%;height:100%;' . $style . '">';
            if (!empty($url)) {
                echo '<a href="' . $url . '" target="_blank"><img src="' . $img . '" /></a>';
            } else {
                echo '<img src="' . $img . '" />';
            }
            echo '</div>';
            $index++;
        }
    } else {
        echo '<div><img src="assets/images/default-banner.jpg" /></div>';
    }
    $conn->close();
    ?>
</div>


<!-- JavaScript for Rotation -->
<script>
    const slides = document.querySelectorAll('.slide');
    let current = 0;

    setInterval(() => {
        slides[current].style.display = 'none';
        current = (current + 1) % slides.length;
        slides[current].style.display = 'block';
    }, 10000); // 10 seconds
</script>

                <div class="banner banner-fixed intro-slide2" style="background-color: #dddee0;">
                    <figure>
                        <img src="assets/images/website-banner-(main)-2.png" alt="intro-banner" width="1903" height="630" style="background-color: #d8d9d9;" />
                    </figure>
                   
                </div>
            
            </div>
            <div class="container mt-6 appear-animate">
                <div class="service-list">
                    <div class="owl-carousel owl-theme row cols-lg-3 cols-sm-2 cols-1" data-owl-options="{
                                    'items': 3,
                                    'nav': false,
                                    'dots': false,
                                    'loop': true,
                                    'autoplay': false,
                                    'autoplayTimeout': 5000,
                                    'responsive': {
                                        '0': {
                                            'items': 1
                                        },
                                        '576': {
                                            'items': 2
                                        },
                                        '768': {
                                            'items': 3,
                                            'loop': false
                                        }
                                    }
                                }">
                        <div class="icon-box icon-box-side icon-box1 appear-animate" data-animation-options="{
                                        'name': 'fadeInRightShorter',
                                        'delay': '.3s'
                                    }">
                        <i class="fas fa-hands-helping"></i>
 
                               &nbsp; &nbsp;
                            <div class="icon-box-content">
                                  <h4 class="icon-box-title text-capitalize ls-normal lh-1"><b>25+ Year of Trust and Service</b>
                                </h4>
                                <p class="ls-s lh-1">Sukhanzar Services </p>
                            </div>
                        </div>
                        <div class="icon-box icon-box-side icon-box2 appear-animate" data-animation-options="{
                                        'name': 'fadeInRightShorter',
                                        'delay': '.4s'
                                    }">
                            <i class=" icon-box-icon fas fa-smile-beam"></i>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title text-capitalize ls-normal lh-1"><b>108K Happy Customer Served </b>
                                </h4>
                                <p class="ls-s lh-1">Happy Customer List of Sukhanzar</p>
                            </div>
                        </div>
                        <div class="icon-box icon-box-side icon-box3 appear-animate" data-animation-options="{
                                        'name': 'fadeInRightShorter',
                                        'delay': '.5s'
                                    }">
                        
                            <i class="icon-box-icon fas fa-globe"></i>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title text-capitalize ls-normal lh-1">30+ Country
                                </h4>
                                <p class="ls-s lh-1">Our Branch's</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<section class="pt-10 mt-7 appear-animate" data-animation-options="{'delay': '.3s'}">
    <div class="container-fluid">
        <h2 class="title title-center mb-5">URDU POETRY COLLECTION</h2>
        <div class="row" id="poet-list">
            <?php
            include 'config.php';
            $res = $conn->query("SELECT id, name, image FROM urdu_poetry_category ORDER BY name");
            $count = 0;
            while ($row = $res->fetch_assoc()) {
                $count++;
                ?>
                <div class="col-xs-6 col-lg-2 mb-4 poet-card <?= ($count > 6) ? 'hidden-poet' : ''; ?>">
                    <div class="category category-default1 category-absolute banner-radius overlay-zoom">
                        <a href="poet.php?id=<?= $row['id']; ?>">
                            <figure class="category-media">
                                <img src="./admin/uploads/poets/<?= htmlspecialchars($row['image']); ?>" 
                                     alt="<?= htmlspecialchars($row['name']); ?>" 
                                     width="280" height="280" 
                                     style="background-color:#e8eded; height:230px;" />
                            </figure>
                        </a>
                        <div class="category-content font-weight-bold">
                            <h4 class="category-name font-weight-bold ls-l">
                                <a href="poet.php?id=<?= $row['id']; ?>">
                                    <?= strtoupper(htmlspecialchars($row['name'])); ?>
                                </a>
                            </h4>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- View More Button -->
        <div class="text-center mt-4">
            <button id="viewMoreBtn" class="btn btn-primary px-4 py-2 rounded-lg" style="display:none;">
                View More
            </button>
        </div>
    </div>
</section>
                  <div class="product" style="max-width: 1200px; margin: 30px auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.05); background-color: #fdfdfd;"><?php
include("config.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fetch latest word
$sql = "SELECT * FROM words ORDER BY created_at DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>
    <div>
        <h1 class="title title-center mb-5">WORD OF THE DAY</h1>
        <h2 style="text-align:center; font-size: 28px; margin-bottom: 10px;">
            <?php echo htmlspecialchars($row['title']); ?>
        </h2>
        <p style="text-align:center; color: #666; font-size: 16px; font-style: italic;">
            By <?php echo htmlspecialchars($row['author_name']); ?>
        </p>
        <hr style="margin: 20px 0;">
        <blockquote style="font-size: 18px; color: #333; font-style: italic; text-align: center; margin: 0; white-space: pre-line;">
    <?php echo html_entity_decode($row['content']); ?>
</blockquote>

    </div>
    <?php
} else {
    echo "<p style='text-align:center;'>No word found.</p>";
}
?>

</div>
    <?php
include('config.php');

// Fetch only 3 latest records
$query = "SELECT id, shayari_name, image FROM shayari_collection ORDER BY id DESC LIMIT 3";
$result = mysqli_query($conn, $query);
?>

<section class="banner-group mt-4">
    <div class="container-fluid">
        <h2 style="text-align:center;color:black">SHAYARI COLLECTION</h2>
        <div class="row justify-content-center">

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="banner overlay-zoom banner-fixed banner-radius content-middle appear-animate"
                        data-animation-options="{'name': 'fadeInUp', 'duration': '1s', 'delay': '.2s'}">

                        <a href="shayari_list.php?id=<?php echo $row['id']; ?>" title="<?php echo htmlspecialchars($row['shayari_name']); ?>">
                            <figure>
                                <img src="admin/<?= $row['image'] ?>" alt="<?php echo htmlspecialchars($row['shayari_name']); ?>" width="380" height="207"
                                    style="object-fit: cover; width: 100%; height: 200px; border-radius: 10px;" />
                            </figure>
                        </a>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</section>

        <section class="product-wrapper mt-6 mt-md-10 pt-4 mb-10 pb-2 container-fluid appear-animate" data-animation-options="{
                    'delay': '.6s'
                }">
            <h2 class="title title-center" id="fe/index2.php">Our Featured</h2>
            <div class="owl-carousel owl-theme row cols-2 cols-md-3 cols-lg-4 cols-xl-5" data-owl-options="{
                        'items': 5,
                        'nav': false,
                        'loop': false,
                        'dots': true,
                        'margin': 20,
                        'responsive': {
                            '0': {
                                'items': 2
                            },
                            '768': {
                                'items': 3
                            },
                            '992': {
                                'items': 4
                            },
                            '1200': {
                                'items': 5,
                                'dots': false,
                                'nav': true
                            }
                        }
                    }">
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="javascript:void(o);l">
                            <img src="assets/images/feature/sher.png" alt="Blue Pinafore Denim Dress" width="220" height="245" style="background-color: #f2f3f5;" />
                        </a>
                        <div class="product-action-vertical">
                            <!-- <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a> -->
                            <a href="#" class="btn-product-icon btn-wishlist" title="Sher"><i class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Quick View">Sher</a>
                        </div>
                    </figure>
                    <div class="product-details">

                        <h3 class="product-name">
                            <a href="javascript:void(o);l">Mohobat ke Sher</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:40%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="javascript:void(o);l" class="rating-reviews">( 15 reviews )</a>
                        </div>
                    </div>
                </div>
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="javascript:void(o);l">
                            <img src="assets/images/feature/nashis.png" alt="Blue Pinafore Denim Dress" width="220" height="245" style="background-color: #f2f3f5;" />
                        </a>
                        <div class="product-label-group">
                            <label class="product-label label-new">New</label>
                        </div>
                        <div class="product-action-vertical">
                            <!-- <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a> -->
                            <a href="#" class="btn-product-icon btn-wishlist" title="Nasish"><i class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Quick View">Nasish</a>
                        </div>
                    </figure>
                    <div class="product-details">
                        
                        <h3 class="product-name">
                            <a href="javascript:void(o);l">Sad Nasish</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:20%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="javascript:void(o);l" class="rating-reviews">( 3 reviews )</a>
                        </div>
                    </div>
                </div>
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="javascript:void(o);l">
                            <img src="assets/images/feature/nazam.png" alt="Blue Pinafore Denim Dress" width="220" height="245" style="background-color: #f2f3f5;" />
                        </a>
                        <div class="product-action-vertical">
                            <!-- <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a> -->
                            <a href="#" class="btn-product-icon btn-wishlist" title="Nazam"><i class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Quick View">Nazam</a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <h3 class="product-name">
                            <a href="javascript:void(o);l">Nazam</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:40%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="javascript:void(o);l" class="rating-reviews">( 8 reviews )</a>
                        </div>
                    </div>
                </div>
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="javascript:void(o);l">
                            <img src="assets/images/feature/gazal.png" alt="Blue Pinafore Denim Dress" width="220" height="245" style="background-color: #f2f3f5;" />
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-new">New</span>
                        </div>
                        <div class="product-action-vertical">
                            <!-- <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a> -->
                            <a href="#" class="btn-product-icon btn-wishlist" title="Gazal"><i class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Quick View">Gazal</a>
                        </div>
                    </figure>
                    <div class="product-details">

                        <h3 class="product-name">
                            <a href="javascript:void(o);l">Gazal</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:80%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="javascript:void(o);l" class="rating-reviews">( 11 reviews )</a>
                        </div>
                    </div>
                </div>
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="javascript:void(o);l">
                            <img src="assets/images/feature/shery.png" alt="Blue Pinafore Denim Dress" width="220" height="245" style="background-color: #f2f3f5;" />
                        </a>
                        <div class="product-label-group">
                            <span class="product-label label-sale">New</span>
                        </div>
                        <div class="product-action-vertical">
                            <!-- <a href="#" class="btn-product-icon btn-cart" data-toggle="modal" data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a> -->
                            <a href="#" class="btn-product-icon btn-wishlist" title="Shayari"><i class="d-icon-heart"></i></a>
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-product btn-quickview" title="Quick View">Shayari</a>
                        </div>
                    </figure>
                    <div class="product-details">

                        <h3 class="product-name">
                            <a href="javascript:void(o);l">Shayari</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width:60%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="javascript:void(o);l" class="rating-reviews">( 16 reviews )</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="banner banner-background parallax text-center" data-option="{'offset': -60}" style="background-image: url(assets/images/ban6.jpg); background-size:cover;" style="background-color: #2d2f33;">
            <div class="container">
                <div class="banner-content appear-animate" data-animation-options="{'name': 'blurIn', 'duration': '1s', 'delay': '.2s'}">
                    <h4 class="banner-subtitle text-white font-weight-bold ls-l">
                        Preseanting<span class="d-inline-block label-star bg-white text-primary ml-4 mr-2">Baithak</span>
Kalakar ki
                    </h4>
                    <h3 class="banner-title font-weight-bold text-white">Sukhanzar Foundation
                    <br>
                    سخن زر فاؤنڈیشن
                    </h3>
                    <!-- <p class="text-white ls-s">Free shipping on orders over Rs. 99</p> -->
                    <a href="about.php" class="btn btn-primary btn-rounded btn-icon-right">Read More<i class="d-icon-arrow-right"></i></a>
                </div>
            </div>
        </section><?php
include 'config.php';

$sql = "SELECT * FROM blogs ORDER BY date DESC, time DESC LIMIT 6";
$result = mysqli_query($conn, $sql);
?>

<?php
include 'config.php';

$sql = "SELECT * FROM blogs ORDER BY date DESC, time DESC LIMIT 6";
$result = mysqli_query($conn, $sql);
?>

<section class="blog-post-wrapper mt-6 mt-md-10 pt-7 appear-animate" data-animation-options="{'name': 'fadeIn', 'duration': '1s'}">
    <div class="container">
        <h2 class="title title-center">Featured Blogs</h2>
        <div class="owl-carousel owl-theme post-slider row cols-lg-3 cols-sm-2 cols-1" data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "margin": 20,
                        "responsive": {
                            "0": {"items": 1},
                            "576": {"items": 2},
                            "992": {"items": 3, "dots": false}
                        }
                    }'>
            <?php while($row = mysqli_fetch_assoc($result)):
                $day = date('d', strtotime($row['date']));
                $month = strtoupper(date('M', strtotime($row['date'])));
                $short_content = mb_substr(strip_tags($row['content']), 0, 150) . '...';
            ?>
            <div class="blog-post mb-4">
                <article class="post post-frame overlay-zoom">
                    <figure class="post-media">
                        <a href="blog-details.php?id=<?= $row['id'] ?>">
                            <img src="admin/<?= $row['image'] ?>" alt="<?= htmlspecialchars($row['heading']) ?>" width="340" height="206" style="background-color: #f0f0f0;" />
                        </a>
                        <div class="post-calendar">
                            <span class="post-day"><?= $day ?></span>
                            <span class="post-month"><?= $month ?></span>
                        </div>
                    </figure>
                    <div class="post-details">
                        <h4 class="post-title">
                            <a href="blog-details.php?id=<?= $row['id'] ?>"><?= htmlspecialchars($row['heading']) ?></a>
                        </h4>
                        <p class="post-content"><?= $short_content ?></p>
                        <a href="blog-details.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-link btn-underline">Read More<i class="d-icon-arrow-right"></i></a>
                    </div>
                </article>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>


  
   
    </div>
</main>
<?php include('includes/footer.php') ?>




<script>
document.addEventListener("DOMContentLoaded", function() {
    let hiddenPoets = document.querySelectorAll(".hidden-poet");
    let viewMoreBtn = document.getElementById("viewMoreBtn");

    if (hiddenPoets.length > 0) {
        viewMoreBtn.style.display = "inline-block"; // show button only if more than 6 poets exist
    }

    viewMoreBtn.addEventListener("click", function() {
        hiddenPoets.forEach(poet => {
            poet.style.display = "block";
        });
        viewMoreBtn.style.display = "none"; // hide button after showing
    });
});
</script>

<style>
.hidden-poet {
    display: none;
}
</style>
