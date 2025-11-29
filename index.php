<?php
include 'include/function.php';



$skills = data_read("skills", 2);
$services = data_read("services", 2);
$auto_writes = data_read("auto_writes", 2);
$portfolios = data_read("portfolios", 1);
$count = 1;

// test($col, $val);
// print_r($auto_write['field_count']);
// foreach ($auto_write as $data) {
//     echo $count;
//     echo $data['auto_write_title'];
//     echo "<br>";
//     $count++;
// }
// die();

?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Fighter || Home 01</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="asset/frontend/img/favicon.ico">

    <!-- ALL CSS 
		============================================ -->

    <!-- BOOTSTRAP CSS
		============================================ -->
    <link rel="stylesheet" href="asset/frontend/css/bootstrap.min.css">

    <!-- MAIN MENU CSS
		============================================ -->
    <link rel="stylesheet" href="asset/frontend/css/meanmenu.min.css">

    <!-- ANIMATE CSS
		============================================ -->
    <link rel="stylesheet" href="asset/frontend/css/animate.css">

    <!-- OWL CURSOLE CSS
		============================================ -->
    <link rel="stylesheet" href="asset/frontend/css/owl.carousel.css">

    <!-- OWL THEME CSS
		============================================ -->
    <link rel="stylesheet" href="asset/frontend/css/owl.theme.css">

    <!-- VENOBOX CSS
		============================================ -->
    <link rel="stylesheet" href="asset/frontend/venobox/venobox.css">

    <!-- OWL TRANSITION CSS
		============================================ -->
    <link rel="stylesheet" href="asset/frontend/css/owl.transitions.css">

    <!-- FONT AWESOME  CSS
		============================================ -->
    <link rel="stylesheet" href="asset/frontend/css/font-awesome.min.css">
    <!-- FONT themify  CSS
		============================================ -->
    <link rel="stylesheet" href="asset/frontend/css/themify-icons.css">
    <!-- FONT animated  CSS
		============================================ -->
    <link rel="stylesheet" href="asset/frontend/css/animated-text.css">
    <!-- FONT elements  CSS
		============================================ -->
    <link rel="stylesheet" href="asset/frontend/css/elements.css">

    <!-- STYLE CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">

    <!-- RESPONSIVE CSS
		============================================ -->
    <link rel="stylesheet" href="asset/frontend/css/responsive.css">

    <!-- MORDANIZER JS
		============================================ -->
    <script src="asset/frontend/js/vendor/modernizr-2.8.3.min.js"></script>

    <style>
        .slider_area {
            background: url(upload/banner/<?= settings_data_read('banner') ?>);
            background-size: cover;
            background-position: center center;
            position: relative;
        }
    </style>

</head>

<body>

    <!-- Header area -->
    <div class="header_area2 sticker  hidden-xs hidden-sm home-2">
        <div class="container fix pdex">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="index.html"> <img src="asset/frontend/img/logo/logo2.png" alt="" /></a>
                    </div>
                </div>
                <!-- Header Main Menu  Area -->
                <div class="col-md-9 ">
                    <button class="hamburger hamburger--slider" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                    <div class="menu">
                        <ul>
                            <li><a href="#home">Home</a></li>
                            <li><a href="#about">About Me</a></li>
                            <li><a href="#service">Service</a></li>
                            <li><a href="#project">Project</a></li>
                            <li><a href="#team">Team</a></li>
                            <li><a href="#blog">News</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu area -->
    <div class="header_area2 sticker  hidden-lg hidden-md">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="logo">
                        <a href="index.html"><img src="asset/frontend/img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
                <!-- Header Main Menu  Area -->
                <div class="col-md-12">
                    <div class="menu mobile-menu">
                        <nav>
                            <ul>
                                <li><a href="#home">Home</a></li>
                                <li><a href="#about">About Me</a></li>
                                <li><a href="#service">Service</a></li>
                                <li><a href="#project">Project</a></li>
                                <li><a href="#team">Team</a></li>
                                <li><a href="#blog">News</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--slider Area -->
    <div class="slider_area" id="home">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- single slide -->
                    <div class="single_slide">
                        <div class="slider_content">
                            <div class="slider_text">
                                <h2>Welcome To Fighter</h2>
                                <h1 class="cd-headline clip is-full-width">
                                    <span class="cd-words-wrapper">
                                        <?php
                                        foreach ($auto_writes as $data) :
                                        ?>
                                            <b class="<?= ($count == 1) ? "is-visible" : "" ?>"><?= $data['auto_write_title'] ?></b>
                                        <?php
                                            $count++;
                                        endforeach;
                                        ?>
                                    </span>
                                </h1>
                                <div class="slider_readmore">
                                    <a href="#" class="sreadmore">
                                        MY SERVICES
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Feature Area -->
    <div class="feature_area" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single_message">
                        <h1 class="message heading">About Me</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit se do eiusmod tempor incididunt ut labore et dolore mag nasaaliqua.Ut enim ad minim veniam, quis nostrud exe rcitation ullamco laboris </p>
                        <p class="p-2">in voluptate velit esse cillum dolore eu fugiat nulla pariatu Excepteur sint occaecat cupidatat non proident, </p>
                        <a href="#" class="readmore">MY PORTFOLIO</a>
                    </div>
                </div>
                <!--Single Feature Item-->
                <div class="col-md-4 col-sm-6 col-xs-12">

                    <div class="feature_thumb">
                        <img src="upload/about/<?= settings_data_read('about_img') ?>" alt="" />
                    </div>

                </div>
                <!--Single Feature Item-->
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="skill_title">
                        <h1>My Skill</h1>
                    </div>
                    <div class="skill-wrapper">
                        <!-- single progress bar -->
                        <?php foreach ($skills as $skill) : ?>
                            <h5><?= $skill['skill_title'] ?></h5>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuemax="100" style="width: <?= $skill['skill_value'] ?>%;">
                                    <span class="ttop"><?= $skill['skill_value'] ?>%</span>
                                </div>
                            </div>

                        <?php endforeach; ?>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Service Area -->
    <div class="service_area" id="service">
        <div class="container">
            <!-- section title -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section_title">
                        <h1><span class="title">MY SERVICES</span></h1>
                    </div>
                </div>
            </div>
            <div class="row">

                <!-- single service item -->
                <?php
                foreach ($services as $service) :
                ?>
                    <div class="col-md-3 col-sm-6 col-xs-12 ">
                        <div class="single_service">
                            <div class="service_icon">
                                <span class="<?= $service['service_icon'] ?>"></span>
                            </div>
                            <div class="sercive_content">
                                <h2><?= $service['service_title'] ?></h2>
                                <p><?= $service['service_description'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>

            </div>

        </div>
    </div>

    <!--START PORTFOLIO AREA -->
    <div class="portfolio_area" id="project">
        <div class="container">
            <!-- section title -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section_title">
                        <h1><span class="title">MY PORTFOLIO</span></h1>
                    </div>
                </div>
            </div>
            <!-- START PORTFOLIO NAV MENU -->
            <div class="row">

                <div class="col-md-12">
                    <div class="portfolio_nav">
                        <ul class="filter-menu">
                            <li class="current_menu_item" data-filter="*" data-toggle="tooltip" data-placement="top" title="<?= $portfolios->num_rows ?>">All</li>
                            <?php
                            foreach (data_read("portfolio_categories", 1) as $data) :
                                // $explod_name = explode(" ", $data['name']);
                                $id = $data['id'];
                                $count_query = "SELECT COUNT(*) AS count FROM portfolios WHERE category_id = $id";
                                $result = mysqli_query(db(), $count_query);
                                $result_assoc = mysqli_fetch_assoc($result);


                            ?>
                                <!-- <li data-filter=".<?= strtolower($explod_name[0]) ?>" data-toggle="tooltip" data-placement="top" title="05"><?= $data['name'] ?></li> -->
                                <li data-filter=".<?= $data['id'] ?>" data-toggle="tooltip" data-placement="top" title="<?= $result_assoc['count'] ?>"><?= $data['name'] ?></li>
                            <?php
                            endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row prot_image_load">
                <div class="gallery_items">
                    <?php
                    foreach (data_read("portfolios", 1) as $data) :
                    ?>
                        <!-- START SINGLE PORTFOLIO  -->
                        <div class="col-md-3 <?= $data['category_id'] ?>  col-sm-6 col-xs-12 grid-item">
                            <div class="single_portfolio">
                                <div class="single_portfolio_thumb">
                                    <a href="upload/portfolio/<?= $data['img'] ?>" class="venobox_custom" data-gall="myGallery">
                                        <img src="upload/portfolio/<?= $data['img'] ?>" alt="" />
                                        <div class="port_icon">
                                            <span class="ti-plus"></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Coutnter Up Area -->
    <div class="counter_area">
        <div class="container">
            <div class="row">
                <!-- Single Counter Item -->
                <?php
                foreach (data_read('auto_counters', 2) as $data) :
                ?>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="single-counter">
                            <div class="counter-icon">
                                <span class="<?= $data['logo'] ?>"></span>
                            </div>
                            <div class="counter-text">
                                <span class="counterup"><?= $data['value'] ?></span>
                                <p><?= $data['title'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>



            </div>
        </div>
    </div>

    <!-- Team Area -->
    <div class="team_area" id="team">
        <div class="container">
            <!-- section title -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section_title">
                        <h1><span class="title">MY TEAM</span></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="team_wrap">
                    <!-- single team -->
                    <?php
                    foreach (data_read('teams', 1) as $data) :
                    ?>
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="single_team">
                                <div class="team_thumb">
                                    <img src="upload/team/<?= $data['img'] ?>" alt="" />
                                    <div class="team_hover">
                                        <div class="team_hover_icon">
                                            <a href=""><span class="ti-facebook"></span></a>
                                            <?php
                                            if ($data['twitter'] != null) :
                                            ?>
                                                <a href=""><span class="ti-twitter"></span></a>
                                            <?php
                                            endif;
                                            ?>
                                            <?php
                                            if ($data['tumblr'] != null) :
                                            ?>
                                                <a href=""><span class="ti-tumblr"></span></a>
                                            <?php
                                            endif;
                                            ?>
                                            <?php
                                            if ($data['linkedin'] != null) :
                                            ?>
                                                <a href=""><span class="ti-linkedin"></span></a>
                                            <?php
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="team_info">
                                    <h2>Christian Weber <span class="member-role">Manager</span></h2>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="single_team">
                            <div class="team_thumb">
                                <img src="asset/frontend/img/team/1.jpg" alt="" />
                                <div class="team_hover">
                                    <div class="team_hover_icon">
                                        <a href=""><span class="ti-facebook"></span></a>
                                        <a href=""><span class="ti-twitter"></span></a>
                                        <a href=""><span class="ti-tumblr"></span></a>
                                        <a href=""><span class="ti-linkedin"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team_info">
                                <h2>Christian Weber <span class="member-role">Manager</span></h2>
                            </div>
                        </div>
                    </div>
                    <!-- single team -->
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="single_team">
                            <div class="team_thumb">
                                <img src="asset/frontend/img/team/2.jpg" alt="" />
                                <div class="team_hover">
                                    <div class="team_hover_icon">
                                        <a href=""><span class="ti-facebook"></span></a>
                                        <a href=""><span class="ti-twitter"></span></a>
                                        <a href=""><span class="ti-tumblr"></span></a>
                                        <a href=""><span class="ti-linkedin"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team_info">
                                <h2>Noah Collin <span class="member-role">CEO</span></h2>
                            </div>
                        </div>
                    </div>
                    <!-- single team -->
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="single_team">
                            <div class="team_thumb">
                                <img src="asset/frontend/img/team/3.jpg" alt="" />
                                <div class="team_hover">
                                    <div class="team_hover_icon">
                                        <a href=""><span class="ti-facebook"></span></a>
                                        <a href=""><span class="ti-twitter"></span></a>
                                        <a href=""><span class="ti-tumblr"></span></a>
                                        <a href=""><span class="ti-linkedin"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team_info">
                                <h2>Erwan Lebrun <span class="member-role">Founder</span></h2>
                            </div>
                        </div>
                    </div>
                    <!-- single team -->
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="single_team">
                            <div class="team_thumb">
                                <img src="asset/frontend/img/team/4.jpg" alt="" />
                                <div class="team_hover">
                                    <div class="team_hover_icon">
                                        <a href=""><span class="ti-facebook"></span></a>
                                        <a href=""><span class="ti-twitter-alt"></span></a>
                                        <a href=""><span class="ti-tumblr-alt"></span></a>
                                        <a href=""><span class="ti-yahoo"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team_info">
                                <h2>Pierre Marie<span class="member-role">Director</span></h2>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- TESTIMONIAL AREA -->
    <div class="testimonial_area">
        <div class="container">
            <div class="row">
                <div class="testi_cursole cursole-style-testi">
                    <!--SINGLE TESTIMONIAL ITEM -->
                    <div class="col-md-12">
                        <div class="single_testi">
                            <div class="testi_thumb">
                                <img src="asset/frontend/img/testimonial/t1.png" alt="" />
                            </div>
                            <div class="testi_desg">
                                <h3>John Dhow <span>CEO</span></h3>
                            </div>
                            <div class="testi_content">
                                <div class="testi_desc">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incubt consectetur aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--SINGLE TESTIMONIAL ITEM -->
                    <div class="col-md-12">
                        <div class="single_testi">
                            <div class="testi_thumb">
                                <img src="asset/frontend/img/testimonial/t1.png" alt="" />
                            </div>
                            <div class="testi_desg">
                                <h3>Mikel Jack <span>CEO</span></h3>
                            </div>
                            <div class="testi_content">
                                <div class="testi_desc">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incubt consectetur aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--SINGLE TESTIMONIAL ITEM -->
                    <div class="col-md-12">
                        <div class="single_testi">
                            <div class="testi_thumb">
                                <img src="asset/frontend/img/testimonial/t1.png" alt="" />
                            </div>
                            <div class="testi_desg">
                                <h3>John Dhow <span>CEO</span></h3>
                            </div>
                            <div class="testi_content">
                                <div class="testi_desc">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incubt consectetur aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <!-- footer area -->
    <div class="footer_area bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="coppyright">
                        <div class="footer_logo">
                            <img src="asset/frontend/img/logo/logo.png" alt="" />
                        </div>
                        <div class="footer_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc</p>
                        </div>
                        <div class="footer_social_icon">
                            <a href=""><span class="ti-facebook"></span></a>
                            <a href=""><span class="ti-twitter-alt"></span></a>
                            <a href=""><span class="ti-tumblr-alt"></span></a>
                            <a href=""><span class="ti-yahoo"></span></a>
                            <a href=""><span class="ti-linkedin"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->


    <!-- jquery-1.11.3.min js
		============================================ -->
    <script src="asset/frontend/js/vendor/jquery-1.12.0.min.js"></script>

    <!-- Machonary Js
		============================================ -->
    <script src="asset/frontend/js/isotope.pkgd.min.js"></script>

    <!-- bootstrap js
		============================================ -->
    <script src="asset/frontend/js/bootstrap.min.js"></script>

    <!-- Venobox js
		============================================ -->
    <script src="asset/frontend/venobox/venobox.min.js"></script>

    <!-- owl.carousel.min js
		============================================ -->
    <script src="asset/frontend/js/owl.carousel.min.js"></script>

    <!-- Main Menu js
		============================================ -->
    <script src="asset/frontend/js/jquery.meanmenu.min.js"></script>

    <!-- wow js
		============================================ -->
    <script src="asset/frontend/js/wow.min.js"></script>

    <!-- counterup js
		============================================ -->
    <script src="asset/frontend/js/jquery.counterup.min.js"></script>

    <!-- Waypoint  js
		============================================ -->
    <script src="asset/frontend/js/waypoints.min.js"></script>

    <!-- Scroll Up js
		============================================ -->
    <script src="asset/frontend/js/jquery.scrollUp.min.js"></script>

    <!-- Image Loaded  js
		============================================ -->
    <script src="asset/frontend/js/imagesloaded.pkgd.min.js"></script>

    <!-- Nav  js
		============================================ -->
    <script src="asset/frontend/js/nav.js"></script>


    <!-- text animate slider  js
		============================================ -->
    <script src="asset/frontend/js/animated-text.js"></script>

    <!-- main js
		============================================ -->
    <script src="asset/frontend/js/main.js"></script>

</body>

</html>