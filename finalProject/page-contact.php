<?php 
    include("admin/config/config.php");
    $sql = $conn->query("SELECT * FROM pages" ,PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Contact - Typerite</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">

</head>

<body class="ss-bg-white">

    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-fade">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <div id="top" class="s-wrap site-wrapper">

        <!-- site header
        ================================================== -->
        <header class="s-header header">

        <div class="header__top header_nav_private">

                <div style="margin-left: 90px; 
                            margin-top: 0.8rem;" class="header__logo">
                    <a class="site-logo" href="index.php">
                        <img src="images/logo2.png" alt="Homepage">
                    </a>
                </div>
        </div> <!-- end header__top -->
           
            <nav style="margin-left: 20px;" class="header__nav-wrap">
                <ul style="margin-top: -30px;" class="header__nav">
                <li ><a href="index.php" title="">Anasayfa</a></li>

                <li style="margin-bottom: -15px;" class=""><a href="index.php" title="">
                    <a href="" title="">Haberler</a>
                </li>
                    <?php 
                        echo '<ul class="private">';
                        foreach ($sql as $value) {
                            if ($value["state"] == 1) {
                            echo "<li style='margin-bottom: -10px;' ><a href='page.php?id=".$value["id"]."' title=''>".$value["page_name"]."</a></li>";
                            }
                        }
                        echo '</ul>';
                    ?>
                

                <li class="current"><a href="page-contact.php" title="">İletişim</a></li>
                </ul> 

                <ul class="header__social">
                    <li class="ss-facebook">
                        <a href="https://github.com/umut532">
                            <span class="screen-reader-text">Facebook</span>
                        </a>
                    </li>
                    <li class="ss-twitter">
                        <a href="#0">
                            <span class="screen-reader-text">Twitter</span>
                        </a>
                    </li>
                    <li class="ss-dribbble">
                        <a href="#0">
                            <span class="screen-reader-text">Instagram</span>
                        </a>
                    </li>
                    
                </ul>

            </nav> <!-- end header__nav-wrap -->

            <!-- menu toggle -->
            <a href="#0" class="header__menu-toggle">
                <span>Menu</span>
            </a>

        </header> <!-- end s-header -->



        


        <!-- site content
        ================================================== -->
        <div class="s-content content">
            <main class="row content__page">
                
                <section class="column large-full entry format-standard">

                    <div class="media-wrap">
                        <div>
                            <img src="images/thumbs/contact/contact-1000.jpg" srcset="images/thumbs/contact/contact-2000.jpg 2000w, 
                                      images/thumbs/contact/contact-1000.jpg 1000w, 
                                      images/thumbs/contact/contact-500.jpg 500w" sizes="(max-width: 2000px) 100vw, 2000px" alt="">
                        </div>
                    </div>

                   
                 

                    <div style="margin-top: -80px;" class="row">
                        <div class="column large-six tab-full">
                            <h4>Adres</h4>
                            <p>
                            1600 Amphitheatre Parkway<br>
                            Mountain View, CA<br>
                            94043 US
                            </p>
    
                        </div>
    
                        <div class="column large-six tab-full">
                            <h4>İletişim Bilgileri</h4>
                            <p>sayhello@gonews.com<br>
                            info@gonews.com <br>
                            Telefon: +197 543 2345
                            </p>
    
                        </div>
                    </div>

                    <h3 class="h2">Mesaj gönder</h3>
        
                    <form name="contactForm" id="contactForm" method="post" action="" autocomplete="off">
                        <fieldset>
    
                            <div class="form-field">
                                <input name="fullName"  class="full-width" placeholder="Ad Soyad" value="" type="text">
                            </div>
    
                            <div class="form-field">
                                <input name="email"  class="full-width" placeholder="Email" value="" type="email">
                            </div>
    
                            <div class="message form-field">
                                <textarea name="message" class="full-width" placeholder="Mesajın"></textarea>
                            </div>

                            <input name="submit" class="btn btn--primary btn-wide btn--large full-width" value="Mesaj Gönder" type="submit">
    
                        </fieldset>
                    </form> <!-- end form -->

                </section>

            </main>

        </div> <!-- end s-content -->


        <!-- footer
        ================================================== -->
        <footer class="s-footer footer">
            <div class="row">
                <div class="column large-full footer__content">
                    <div class="footer__copyright">
                        <span>© Copyright Typerite 2021</span> 
                        <span>Design by <a href="https://www.styleshout.com/">StyleShout</a></span>
                    </div>
                </div>
            </div>

            <div class="go-top">
                <a class="smoothscroll" title="Back to Top" href="#top"></a>
            </div>
        </footer>

    </div> <!-- end s-wrap -->


    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

<?php 

    if (isset($_POST["submit"])) {
        $fullName = $_POST["fullName"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        if (empty($fullName)){
        }
    
        elseif (empty($email)){

        }
        elseif (empty($message)){

        }
        else {
            $sql = $conn->prepare("INSERT INTO mail VALUES (?,?,?,?)"); 
            $add = $sql->execute(array(NULL,"$fullName","$email","$message"));

        if ($add) {
            echo("<div class='success'><center>Mesaj başarıyla Gönderildi </b></center></div>");
        } 
        else {
            echo("<div class='alert'><center>Kayıt başarısız</b></center></div>");
        }
        }
    }



?>