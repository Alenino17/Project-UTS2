<?php

require_once 'admin/dbkoneksi.php';

$_id = $_GET['id'];
$sql = "SELECT * FROM product WHERE id = ?";

$st = $dbh->prepare($sql);
$st->execute([$_id]);

$produk = $st->fetch();

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
                                        <li><a href="about.php">About</a></li>
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
    <div class="page-content-product">
        <div class="main-product">
            <div class="container">
                <div class="row clearfix">
                    <h1 style="color: #fff; text-align: center; margin-top: 60px; margin-bottom: 50px;" id="product">
                        Produk Produk
                        Kami</h1>
                    <div class="col-lg-7 col-sm-12 col-md-12" style="margin-left: 230px;">
                        <a href="admin/login/login.php">
                            <div class="box-img">
                                <h4> <?= $produk['name'] ?> </h4>
                                <img src="images/wajan.png" alt="" width="30%" />
                                <div class="price">
                                    <h4>Rp. <?= number_format($produk['purchase_price'], 2, ',', '.') ?></h4>
                                </div>
                                <div class="deskrisi" style="color: #fff; margin: 30px;">
                                    <h3>Deskripsi</h5>
                                        <p style="text-align: justify; margin-top: 20px;">
                                            Peralatan dapur adalah alat-alat yang digunakan untuk memasak, memotong,
                                            mengiris,
                                            mengukur, menyajikan dan membersihkan bahan makanan di dapur.Peralatan dapur
                                            biasanya terbuat dari bahan yang tahan panas, tahan air dan mudah
                                            dibersihkan seperti logam, plastik, kayu dan kaca.
                                        </p>
                                </div>
                            </div>
                        </a>
                    </div>
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
                        Reserved. Company Name © 2023</p>
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