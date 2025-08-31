<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Sukhanzar Foundation</title>
    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="description" content="Sukhanzar Foundation ek adabi platform hai jahan shayari aur poets ki roohani duniya ko sanjha kiya jata hai. Ghazal, nazm, sher-o-shayari aur adab se judi har ek khoobsurat tehreer yahan paaiye. Developed by Parvez Ahmad(+91 9027945064)" />


    <link rel="icon" type="image/png" href="assets/images/Sukhanzar Logo (Black)[1].png" style="width:10px;height:10px;">
    <link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/magnific-popup/magnific-popup.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/sticky-icon/stickyicon.css">
    <link rel="stylesheet" type="text/css" href="assets/css/demo1.min.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.min.css">
    

    <!-- dashboard -->
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .bbtn
        {
            border:1px solid black;
            border-radius:10px;
            padding:10px;
            margin-top:17px;
        }
 .bbtn {
    transition: all 1s ease;
}


.bbtn:hover {
    color: #ee089c;
    font-size: 14px;
}
.fa-regular
{
    font-size:30px;
} 
    </style>
    <!-- dashboard end -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7RXWSG1XTJ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag("js", new Date());

  gtag("config", "G-7RXWSG1XTJ");
</script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QEQCCDT98X">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-QEQCCDT98X');
    </script>

    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "Organics Feed Pvt Ltd",


            "logo": "https://www.organicsfeed.com/asset/image/logo/logo.jpg",

            "sameAs": [
                "",
                "https://www.facebook.com/organicsfeed1\/",
                "https://www.instagram.com/organicsfeed/\/",
            ],
            "url": "https://www.organicsfeed.com"
        }
    </script>



    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "WebSite",
            "name": "Organics Feed Pvt Ltd",
            "url": "https://www.organicsfeed.com/",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "https://www.organicsfeed.com/?q={search_term_string}",
                "query-input": "required name=search_term_string"
            }
        }
    </script>





</head>

<body class="home">
    <div class="page-wrapper">
        <header class="header header-border">
            <div class="header-top">
                <div class="container-fluid">
                    <div class="header-left">
                        <p class="welcome-msg">
                            <marquee>Sukhanzar Foundation Contact Sartaz Alam +91 9690300527  &nbsp &nbsp &nbsp                                                                                                                               Developed By Parvez Ahmad(9027945064)</marquee>
                        </p>
                    </div>
                    <div class="header-right hny">

                        <a href="contact.php" class="contact d-lg-show"><i class="d-icon-map"></i>Contact</a>
                        <a href="help.php" class="help d-lg-show"><i class="d-icon-info"></i> Need Help</a>
                        <a href="check_status.php" class="help d-lg-show"><i class="d-icon-info"></i>Check Your Slots</a>


                    </div>
                </div>
            </div>
            <div class="header-middle sticky-header fix-top sticky-content has-center" style="padding: 1px;">
                <div class="container-fluid">
                    <div class="header-left">
                        <a href="#" class="mobile-menu-toggle">
                            <i class="d-icon-bars2"></i>
                        </a>
                        <!-- Mobile Menu Toggle -->

                        <nav class="main-nav">
                            <ul class="menu">
                                <li class="active"> <a href="poets_list.php">Poets</a></li>
                                <li><a href="javascript:;">Sher & Shayari</a>
                                    <ul>

                                        <li><a href="#">Categories</a>
                                            <ul>

                                                <li><a href="urdu_shaiyari_list.php">Urdu Shayari</a></li>
        <?php
    include 'config.php';

    $res = $conn->query("SELECT id, shayari_name FROM shayari_collection ORDER BY shayari_name ASC");
    while ($row = $res->fetch_assoc()) {
        echo '<li><a href="shayari_list.php?id='.$row['id'].'">'.htmlspecialchars($row['shayari_name']).'</a></li>';
    }

    // DO NOT close connection here if you need $conn later
    // $conn->close();
    ?>
                                         </ul>
                                            

    

                                        </li>
                                        <li><a href="sher.php">Sher</a>
                                        </li>

                                    </ul>
                                    

                                </li>
                                <li>
                                    <a href="javascript:;">Events & Shows</a>
                                    <ul>
                                        <li><a href="https://sukhanzarfoundation.com/booking.php">Open Mics</a></li>
                                        <li class="dropdown">
  <a href="javascript:void(0);">Curated</a>
  <ul class="submenu">
    <li><a href="https://sukhanzarfoundation.com/sher.php" title="sher & ghazal">Sher & Ghazal</a></li>
    <li><a href="nazam_list.php">Nazam</a></li>
    <li><a href="urdu_shaiyari_list.php" title="urdu collection">Urdu Poets Collection</a></li>
    <li><a href="#" >shayari Collection</a></li>
  </ul>
</li>

                                        <li><a href="javascript:void(o);"title="Currently No Specail Events">Specail Events</a></li>



                                        <!-- <ul>
                                                <li><a href="javascript:void(o);">Error 404-1</a></li>
                                                <li><a href="javascript:void(o);">Error 404-2</a></li>
                                                <li><a href="javascript:void(o);">Error 404-3</a></li>
                                                <li><a href="javascript:void(o);">Error 404-4</a></li>
                                            </ul> -->
                                </li>

                            </ul>
                            </li>
                            <li><a href="blog_list.php">Blogs</a> </li>
                            <li><a href="ghzal_list.php">Gazal</a> </li>
                            <li><a href="nazam_list.php">Nazam</a> </li>
                           <!-- <li><a href="#fe/index2.php">Feature Events</a> </li>-->
                            
                            </ul>
                        </nav>
                    </div>
                    <!-- End of Header Left -->

                    <div class="header-center">
                        <a href="index.php" class="logo mr-0">
                            <img src="assets/images/Sukhanzar Logo (Black)[1].png" alt="logo" width="154" height="43" />
                        </a>
                        <!-- End Logo -->
                    </div>
                    <!-- End of Header Center -->

                    <div class="header-right">
                        <div class="header-search hs-simple">
                            <form action="search_redirect.php" method="GET"  class="input-wrapper" style="margin-left: 55px;">
                                <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search for, Ghazal & Shaer Nazam..." required="">
                                <button class="btn btn-search" type="submit" title="submit-button">
                                    <i class="d-icon-search"></i>
                                </button>
                            </form>
                        </div>
                        

                        <!-- End of Menu -->

                        <!-- <div class="header-search hs-toggle">
                            <a href="#" class="search-toggle" title="search">
                                <i class="d-icon-search"></i>
                            </a>
                            <form action="#" class="input-wrapper">
                                <input type="text" class="form-control" name="search" autocomplete="off"
                                    placeholder="Search your keyword..." required />
                                <button class="btn btn-search" type="submit" title="submit-button">
                                    <i class="d-icon-search"></i>
                                </button>
                            </form>
                        </div> -->
                        <!-- End of Header Search -->

                        <a class="logins" href="booking.php"  title="Book Your Slot ">
                            <p class="bbtn">Book Your Slot</p>
                        </a>
                                                <a class="logins" href="submit-poetry.php"  title="Book Your Slot ">
                            <p class="bbtn">Submit Poetry</p>
                        </a> 
                        <a href="signup.php" title="user register"><i class="fa-regular fa-circle-user"></i></a>
                        
  



                        <!-- End of Login -->
                       
            <!-- End of Header Middle -->
        </header>
        <!-- End of Header -->
        <script>
    function changeLanguage(lang) {
        alert("Language changed to: " + lang); 
        // TODO: Replace this with real language switch logic
    }
</script>




