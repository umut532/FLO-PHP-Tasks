<?php 
    include("admin/config/config.php");
    $sql = $conn->query("SELECT * FROM pages ORDER BY id" ,PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Anasayfa</title>
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
    <link rel="apple-touch-icon" sizes="180x180" href="">
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
                <li class="current"><a href="index.php" title="">Anasayfa</a></li>
                
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
                

                <li class=""><a href="page-contact.php" title="">İletişim</a></li>
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
        


        

        <div class="s-content">
            
            <div class="masonry-wrap">

                <div class="masonry"> 
    
                    <div class="grid-sizer"></div>
    
            <?php 

                $sql2 = $conn->query("SELECT * FROM pages" ,PDO::FETCH_ASSOC);
                foreach ($sql2 as $value) {
                    
            if ($value["state"]) {
                
                $pagePhotoLocation ="./admin/html/resimler/".$value["file_name"];
                
                echo "
                <article class='masonry__brick entry format-standard animate-this'>
    
                <div class='entry__thumb'>
                    <a href='page.php?id=".$value["id"]."' class='entry__thumb-link'>
                        <img src='".$pagePhotoLocation."' 
                    </a>
                </div>
    
                <div style='background: #f6f7f8;' class='entry__text'>
                    <div class='entry__header'>
    
                        <h2 class='entry__title'><a href='page.php?id=".$value["id"]."'>".$value["page_title"]."</a></h2>
    
                        <div style='text-align: left;' class='entry__meta'>
                            <span class='entry__meta-cat'>
                         ".$value["date"]."
                            </span>
                        </div>

                    </div>
                    <div style='margin-top: -18px;' class='entry__excerpt'>
                        <p>
                        ".substr($value["description"], 0, 100)."...<br> <a href='page.php?id=".$value["id"]."'>Devamını okumak için tıklayınız!</a>
                        </p>
                       <p style='font-size: 12px; text-align: right;'> ". $value["viewing"]." kez okundu. </p>
                    </div>
                </div>
            
                </article> <!-- end article -->";
            }
            
        }
        
        ?>
                    </div> <!-- end comment-respond -->
            
                </div> <!-- end comments-wrap -->
            </main>

        </div> <!-- end s-content -->


        <!-- footer
        ================================================== -->
        <?php include("footer.php"); ?>

    </div> <!-- end s-wrap -->


    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>