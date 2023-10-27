
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,500;0,700;1,300;1,500;1,700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="js/chuc.js"></script>
    <script src="js/slide.js"></script>
</head>
<body>
    <div class="container">
        <header>
            <nav>
                <li><a href="index.php?act=home">Home</a></li>
                <li><a href="index.php?act=shopall">Shop all</a></li>
                <li><a href="index.php?act=mobile">Mobile phones</a></li>
                <li><a href="index.php?act=laptop">Laptop</a></li>
                <li><a href="index.php?act=tablet">Tablet</a></li>
            </nav>
            <div class="loginhome">
                <a href="view/logout.php"><?php echo $islogin ?></a>
                <div class="cart" onclick="cart()"><i class="fa-solid fa-cart-shopping"></i></div>
            </div>
        </header>
       