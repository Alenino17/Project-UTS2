<?php

require_once "admin/dbkoneksi.php";

$sql = "SELECT * FROM product";
$produks = $dbh->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>KitchenStoreID</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--enable mobile device-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--fontawesome css-->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!--bootstrap css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--animate css-->
    <link rel="stylesheet" href="css/animate-wow.css">
    <!--main css-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/slick.min.css">
    <!--responsive css-->
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
    <header id="header" class="top-head">
        <!-- Static navbar -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-sm-12 left-rs">
                        <div class="navbar-header">
                            <button type="button" id="top-menu" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <form class="navbar-form navbar-left web-sh">
                            <div class="form">
                                <input type="text" class="form-control"
                                    placeholder="Cari Produk Dapur Anda disini.....">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="right-nav">
                            <div class="login-sr">
                                <div class="login-signup">
                                    <ul>
                                        <li><a class="custom-b" href="admin/login/login.php">Login</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="nav-b hidden-xs">
                                <div class="nav-box">
                                    <ul>
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="#about">About</a></li>
                                        <li><a href="produk.php">Shop</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.container-fluid -->
        </nav>
    </header>
    <!-- Modal -->
    <div class="modal fade lug" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Change</h4>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>
                            <a href="#"><img src="images/flag-up-1.png" alt="" /> United States</a>
                        </li>
                        <li>
                            <a href="#"><img src="images/flag-up-2.png" alt="" /> France </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="sidebar" class="top-nav">
        <ul id="sidebar-nav" class="sidebar-nav">
            <li><a href="#">Help</a></li>
            <li><a href="howitworks.php">How it works</a></li>
            <li><a href="#">chamb for Business</a></li>
        </ul>
    </div>
    <div class="page-content-product">
        <div class="main-product">
            <div class="container">
                <div class="row clearfix">
                    <div class="find-box">
                        <h1>Temukan Produk Dapur atau <br> Produk Masakan Kalian di sini</h1>
                        <h4>Carilah dengan benar dan teliti.</h4>
                        <div class="product-sh">
                            <div class="col-sm-6">
                                <div class="form-sh">
                                    <input type="text" placeholder="Carilah Sesuatu yang Anda Sukai">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-sh">
                                    <?php
                                    $sql = "SELECT * FROM product";
                                    $produk = $dbh->query($sql);
                                    ?>
                                    <select class="selectpicker">
                                        <option type="hidden">=== Pilih ===</option>
                                        <?php foreach ($produk as $row) : ?>
                                        <option><?= $row['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-sh"> <a class="btn" href="#">Search</a> </div>
                            </div>
                            <p>Atau cukup <a href="#product"> Klik disini </a> dan dapatkan Inspirasi!</p>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <h1 style="color: #fff; text-align: center; margin-top: 5px; margin-bottom: 50px;" id="product">
                        Produk Produk
                        Kami</h1>
                    <?php foreach ($produks as $row) { ?>
                    <div class="col-lg-3 col-sm-6 col-md-3">
                        <a href="detail.php?id=<?= $row['id'] ?>">
                            <div class="box-img">
                                <h4> <?= $row['name'] ?> </h4>
                                <img src="images/wajan.png" alt="" />
                                <div class="price">
                                    <h4>Rp. <?= number_format($row['purchase_price'], 2, ',', '.') ?></h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    <div class="categories_link" id="about">
                        <a href="#">Selebihnya.....</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cat-main-box">
        <div class="container">
            <div class="row panel-row">
                <div class="col-md-4 col-sm-6 wow fadeIn" data-wow-delay="0.0s">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="images/xpann-icon.jpg" class="icon-small" alt="">
                            <h4>Keuntungan di dapatkan</h4>
                            <p>
                                Keuntungan membeli di KitchenStoreID adalah Anda juga dapat
                                memperoleh diskon dan promo menarik yang tersedia di toko online ini.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="images/create-icon.jpg" class="icon-small" alt="">
                            <h4>Menyediakan berbagai Macam Peralatan Dapur</h4>
                            <p>toko online yang menyediakan berbagai macam peralatan dapur dari brand-brand terkenal
                                seperti Tefal, Philips, dan banyak lagi.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 wow fadeIn hidden-sm" data-wow-delay="0.4s">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="images/get-icon.jpg" class="icon-small" alt="">
                            <h4>Menawarkan Layanan Pelanggan</h4>
                            <p>Jika Anda memiliki pertanyaan atau masalah dengan produk yang Anda beli, Anda dapat
                                menghubungi tim customer service.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="products">
        <div class="main-products">
            <h2>PRODUK YANG TREN KITCHENSTORE.ID</h2>
            <div class="product-slidr">
                <div class="slider">
                    <?php

                    $sql = "SELECT * FROM product";
                    $produk = $dbh->query($sql);

                    ?>
                    <?php foreach ($produk as $row) { ?>
                    <div>
                        <div class="prod-box">
                            <div class="prod-i">
                                <img src="images/tr1.png" alt="#" />
                            </div>
                            <div class="prod-dit clearfix">
                                <div class="dit-t clearfix">
                                    <div class="left-ti">
                                        <h4><?= $row['name'] ?></h4>
                                        <p>By <span>Beko</span> under <span>Lights</span></p>
                                    </div>
                                    <a href="#">Rp. <?= number_format($row['purchase_price'], 2, ',', '.') ?></a>
                                </div>
                                <div class="dit-btn clearfix">
                                    <a class="wis" href="detail.php?id=<?= $row['id'] ?>"><i class="fa fa-star"
                                            aria-hidden="true"></i>
                                        Detail </a>
                                    <a class="thi" href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Buy</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="footer-top clearfix">
                        <div class="col-md-2 col-sm-6">
                            <h2>
                                Bergabung Bersama
                            </h2>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-box">
                                <input type="text" placeholder="Enter yopur e-mail" />
                                <button>Continue</button>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="help-box-f">
                                <h4>Pertanyaan? Hubungi kami di +62812 1180 6001 untuk bantuan</h4>
                                <p>Penyiapan mudah - tanpa biaya pembayaran - hingga 100 produk gratis</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer-link-box clearfix">
                        <div class="col-md-6 col-sm-6">
                            <div class="left-f-box">
                                <div class="col-sm-4">
                                    <h2>SELL ON chamb</h2>
                                    <ul>
                                        <li><a href="#">Create account</a></li>
                                        <li><a href="howitworks.php">How it works suppliers</a></li>
                                        <li><a href="pricing.php">Pricing</a></li>
                                        <li><a href="#">FAQ for Suppliers</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-4">
                                    <h2>BUY ON chamb</h2>
                                    <ul>
                                        <li><a href="#">Create account</a></li>
                                        <li><a href="#">How it works buyers</a></li>
                                        <li><a href="#">Categories</a></li>
                                        <li><a href="#">FAQ for buyers</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-4">
                                    <h2>COMPANY</h2>
                                    <ul>
                                        <li><a href="about-us.php">About chamb</a></li>
                                        <li><a href="#">Contact us</a></li>
                                        <li><a href="#">Press</a></li>
                                        <li><a href="#">Careers</a></li>
                                        <li><a href="#">Terms of use</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="right-f-box">
                                <h2>INDUSTRIES</h2>
                                <ul class="col-sm-4">
                                    <li><a href="#">Textiles</a></li>
                                    <li><a href="#">Furniture</a></li>
                                    <li><a href="#">Leather</a></li>
                                    <li><a href="#">Agriculture</a></li>
                                    <li><a href="#">Food & drinks</a></li>
                                </ul>
                                <ul class="col-sm-4">
                                    <li><a href="#">Office</a></li>
                                    <li><a href="#">Decoratives</a></li>
                                    <li><a href="#">Electronics</a></li>
                                    <li><a href="#">Machines</a></li>
                                    <li><a href="#">Building</a></li>
                                </ul>
                                <ul class="col-sm-4">
                                    <li><a href="#">Cosmetics</a></li>
                                    <li><a href="#">Health</a></li>
                                    <li><a href="#">Jewelry</a></li>
                                    <li><a href="#">See all here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <p>
                        <h5>KitchenStoreID</h5> All Rights
                        Reserved. Muhammad Bintang Alenino © 2023</p>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-inline socials">
                            <li>
                                <a href="">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--main js-->
    <script src="js/jquery-1.12.4.min.js"></script>
    <!--bootstrap js-->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/wow.min.js"></script>
    <!--custom js-->
    <script src="js/custom.js"></script>
</body>

</html>