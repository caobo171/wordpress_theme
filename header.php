<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato|Pacifico|Roboto+Mono&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/jpg" href="<?php echo get_template_directory_uri() . '/image/logo.jpg' ?>" />
    <?php wp_head(); ?>


</head>

<body class="container">
    <div id="header">
        <div id="banner">
            <a class="logo">
                <img class="img-logo" src="<?php echo get_template_directory_uri() . '/image/logo.jpg' ?>" alt="">
            </a>

            <div id="logo-title">
                <h1>Đông Dược Bảo Nguyên</h1>
            </div>
        </div>

        <!-- Nav bar boostrap -->
        <nav id="navbar" class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link <?php if (get_site_url() . '/' === get_permalink()) echo 'active' ?> " href="<?php echo site_url('') ?>">TRANG CHỦ <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link  <?php if (preg_match('/\/product/', get_permalink()) > 0) echo 'active' ?> " href="<?php echo site_url('product-shop') ?>">SẢN PHẨM</a>
                    <a class="nav-item nav-link  <?php if (preg_match('/\/post/', get_permalink()) > 0) echo 'active' ?>" href="<?php echo site_url('posts') ?>">BÀI VIẾT</a>
                    <a class="nav-item nav-link  <?php if (preg_match('/\/contacts\//', get_permalink()) > 0) echo 'active' ?>" href="<?php echo site_url('contacts') ?>">LIÊN HỆ</a>
                </div>
            </div>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            </form>
        </nav>
    </div>
    <!-- End navbar-->