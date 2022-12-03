<?php 
    include("admin/config/config.php");
    include("admin/html/class.php");
    
    $getId = $_GET["id"];
    if ($getId) {
      
        $sql = $conn->query("SELECT * FROM pages" ,PDO::FETCH_ASSOC);
        $list = $conn->query("SELECT * FROM pages ORDER BY id=$getId" ,PDO::FETCH_ASSOC);
        foreach ($list as $value) {
            $dbId = $value["id"];
            $pageName = $value["page_name"];
            $pageTitle = $value["page_title"];
            $description = $value["description"];
            $contents = $value["contents"];
            $state = $value["state"];
            $pagePhoto = $value["file_name"];
            $date = $value["date"];
            $viewing = $value["viewing"];
        } 
        if ($state) {
            $test = new service();
            $baslik = $test->replace_tr($pageTitle);
            $pagePhotoLocation ="./admin/html/resimler/".$pagePhoto;
        
            $viewing = $viewing + 1;
            $update = $conn->query("UPDATE pages set viewing=$viewing where id=$dbId");
        }
        else {
            header("location:index.php");
        }
    }
    else {
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html class="no-js" lang="tr">
<head>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <!--- basic page needs
    ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $pageName; ?></title>
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
    <link rel='stylesheet' href='css/style.css' >
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

                <li style="margin-bottom: -15px;" class="current"><a href="index.php" title="">
                    <a href="" title="">Haberler</a>
                </li>
                    <?php 
                        echo '<ul class="private">';

                            foreach ($sql as $value) {
                                if ($value["state"] == 1) {

                                        if ($value["id"] == $getId) {
                                            echo "<li class='current' style='margin-bottom: -10px;' ><a href='page.php?id=".$value["id"]."' title=''>".$value["page_name"]."</a></li>";

                                        }
                                        
                                        if ($value["id"] != $getId) {
                                            echo "<li style='margin-bottom: -10px;' ><a href='page.php?id=".$value["id"]."' title=''>".$value["page_name"]."</a></li>";
                                        }

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

       
        <div class="s-content content">
            <main class="row content__page">
                
                <article class="column large-full entry format-standard">
                
                    <div class="content__page-header entry__header">
                        <h1 style="font-size: 1.8em; margin-bottom : 2.4rem; margin-top: -30px;" class="display-1 entry__title"> <?php echo $baslik; ?>
                        </h1>
                        <ul class="entry__header-meta margin-bottom : 1px;;">
                           <div style="text-align: left;">
                            <li class="date"> <?php echo $description; ?> </li>
                          
                            </div>
                        </ul>
                    </div> 

                    <div class="entry__content">

                    <div class="entry__content">

                        <p style="font-size: 15px; text-align: right; margin-top: -30px; " class="opacity" > 
                            <i style="font-size: 15px;  opacity: 0.5;" class='bx bx-calendar'> Yayınlanma tarihi : <?php echo $date;?></i>
                        </p>

                        <p>
                        <center style="margin-top: -65px;">
                            <img src="  <?php echo $pagePhotoLocation;?>" 
                                srcset="<?php echo $pagePhotoLocation;?> 1400w, 
                                        <?php echo $pagePhotoLocation;?> 1000w, 
                                        <?php echo $pagePhotoLocation;?> 500w" 
                                    sizes="(max-width: 5000px) 100vw, 2000px" alt=""> 
                        </center>
                        </p>

                    </div>
                        <p style="font-size: 1.6rem; margin-top: -30px;" >
                            <?php echo $contents;?> 
                        </p>
                    <br>
                    <div class="entry__content">
                        <p style="font-size: 15px; text-align: right; margin-top: -30px; " class="opacity" > 
                            <i style="font-size: 16px;  opacity: 0.7;" class='bx bxs-book-reader'> <?php echo $viewing;?> kez okundu</i>
                        </p>
                    <p>   
                    </div>
                </article> 

                <div style="margin-top: -50px;" class="comments-wrap">

                    <div id="comments" class="column large-12">
                  
                        <ol class="commentlist">
        
                            <li class="depth-1 comment">
        
                                <div class="comment__avatar">
                                    <img class="avatar" src="images/avatars/user-01.jpg" alt="" width="50" height="50">
                                </div>
        
                                <div style="margin-top: -50px;" class="comment__content">
        
                                    <div class="comment__info">
                                        <div class="comment__author">Itachi Uchiha</div>
        
                                        <div class="comment__meta">
                                            <div class="comment__time">April 30, 2019</div>
                                            <div class="comment__reply">
                                                <a class="comment-reply-link" href="#0">Reply</a>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="comment__text">
                                    <p>Adhuc quaerendum est ne, vis ut harum tantas noluisse, id suas iisque mei. Nec te inani ponderum vulputate,
                                    facilisi expetenda has et. Iudico dictas scriptorem an vim, ei alia mentitum est, ne has voluptua praesent.</p>
                                    </div>
        
                                </div>
        
                            </li> <!-- end comment level 1 -->
        
                            <li class="thread-alt depth-1 comment">
        
                                <div class="comment__avatar">
                                    <img class="avatar" src="images/avatars/user-04.jpg" alt="" width="50" height="50">
                                </div>
        
                                <div class="comment__content">
        
                                    <div class="comment__info">
                                        <div class="comment__author">John Doe</div>
        
                                        <div class="comment__meta">
                                            <div class="comment__time">April 30, 2019</div>
                                            <div class="comment__reply">
                                                <a class="comment-reply-link" href="#0">Reply</a>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="comment__text">
                                    <p>Sumo euismod dissentiunt ne sit, ad eos iudico qualisque adversarium, tota falli et mei. Esse euismod
                                    urbanitas ut sed, et duo scaevola pericula splendide. Primis veritus contentiones nec ad, nec et
                                    tantas semper delicatissimi.</p>
                                    </div>
        
                                </div>
        
                                <ul class="children">
        
                                    <li class="depth-2 comment">
        
                                        <div class="comment__avatar">
                                            <img class="avatar" src="images/avatars/user-03.jpg" alt="" width="50" height="50">
                                        </div>
        
                                        <div class="comment__content">
        
                                            <div class="comment__info">
                                                <div class="comment__author">Kakashi Hatake</div>
        
                                                <div class="comment__meta">
                                                    <div class="comment__time">April 29, 2019</div>
                                                    <div class="comment__reply">
                                                        <a class="comment-reply-link" href="#0">Reply</a>
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="comment__text">
                                                <p>Duis sed odio sit amet nibh vulputate
                                                cursus a sit amet mauris. Morbi accumsan ipsum velit. Duis sed odio sit amet nibh vulputate
                                                cursus a sit amet mauris</p>
                                            </div>
        
                                        </div>
        
                                        <ul class="children">
        
                                            <li class="depth-3 comment">
        
                                                <div class="comment__avatar">
                                                    <img class="avatar" src="images/avatars/user-04.jpg" alt="" width="50" height="50">
                                                </div>
        
                                                <div class="comment__content">
        
                                                    <div class="comment__info">
                                                        <div class="comment__author">John Doe</div>
        
                                                        <div class="comment__meta">
                                                            <div class="comment__time">April 29, 2019</div>
                                                            <div class="comment__reply">
                                                                <a class="comment-reply-link" href="#0">Reply</a>
                                                            </div>
                                                        </div>
                                                    </div>
        
                                                    <div class="comment__text">
                                                    <p>Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est
                                                    etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
                                                    </div>
        
                                                </div>

                                            </li>

                                        </ul>

                                    </li>

                                </ul>

                            </li> 
        
                            <li class="depth-1 comment">
        
                                <div class="comment__avatar">
                                    <img class="avatar" src="images/avatars/user-02.jpg" alt="" width="50" height="50">
                                </div>
        
                                <div class="comment__content">
        
                                    <div class="comment__info">
                                        <div class="comment__author">Shikamaru Nara</div>
        
                                        <div class="comment__meta">
                                            <div class="comment__time">April 26, 2019</div>
                                            <div class="comment__reply">
                                                <a class="comment-reply-link" href="#0">Reply</a>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="comment__text">
                                    <p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem.</p>
                                    </div>
                                </div>
                            </li> 
                        </ol>
                    </div> 

                    <div style="margin-top: -20px;" class="column large-12 comment-respond">
                     
                        <div id="respond">
            
                            <h3 class="h2">Yorum ekle </h3>
            
                            <form style="margin-top: -70px;" name="contactForm" id="contactForm" method="post" action="" autocomplete="off">
                                <fieldset>
            
                                    <div class="form-field">
                                        <input name="cName" id="cName" class="full-width" placeholder="İsmin" value="" type="text">
                                    </div>
            
                                    <div class="message form-field">
                                        <textarea name="cMessage" id="cMessage" class="full-width" placeholder="Mesajın"></textarea>
                                    </div>
            
                                    <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large full-width" value="Yorum yap" type="submit">
            
                                </fieldset>
                            </form> 
            
                        </div>
                   
            
                    </div>
            
                </div>
            </main>

        </div> 

        <div style="margin-top: -120px;"></div>
        <?php include("footer.php") ?>

    </div> 
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>
</html>
