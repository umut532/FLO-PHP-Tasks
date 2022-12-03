<div id="mobile-box">
        <a class="mobile" href="#">MENU</a>
    </div>
    <div class="menu-menu">
        <div class="sidebar1 col-sm-2 col-md-2 col-lg-1 col-xs-12" ng-if="authentication.isAuth" ng-cloak>
            <ul id="nav" ng-cloak>
                <li ng-if="IsUser()"><a ui-sref="dashboard">Dashboard</a></li>
                <li ng-if="IsAdmin()"><a ui-sref="item">Item</a></li>
            </ul>
        </div>
    </div>

    

<article class="masonry__brick entry format-standard animate-this">
    
            <div class='entry__thumb'>
                <a href='page.php?id=".$value["id"]."' class='entry__thumb-link'>
                    <img src='".$pagePhotoLocation."' 
                </a>
            </div>

            <div style='background: #f6f7f8;' class="entry__text">
                <div class="entry__header">

                    <h2 class="entry__title"><a href='page.php?id=".$value["id"]."'>".$value["page_title"]."</a></h2>

                    <div class="entry__meta">
                        <span class="entry__meta-cat">
                            <a href='page.php?id=".$value["id"]."'</a>
                          
                        </span>
                        <span class="entry__meta-date">
                             Yayınlanma tarihi  ".$value["date"]."
                        </span>
                    </div>
                </div>
                <div class="entry__excerpt">
                    <p>
                    ".substr($value["description"], 0, 195)."...<br> Devamını okumak için tıklayınız.
                    </p>
                </div>
            </div>
        
</article> <!-- end article -->


    <div class='entry__thumb'>
        <a href='page.php?id=".$value["id"]."' class='entry__thumb-link'>
            <img src='".$pagePhotoLocation."' 
        </a>
    </div>
    <div style='background: #f6f7f8;'  class='entry__text'>
        <div class='entry__header'>

            <h2 class='entry__title'>
                <a href='page.php?id=".$value["id"]."'>".$value["page_title"]."</a>
            </h2>
            <div class='entry__meta'>
                <span class='entry__meta-cat'>
                    <a href='page.php?id=".$value["id"]."'</a>
                </span>
                <span class='entry__meta-date'>
                        Yayınlanma tarihi  ".$value["date"]."
                </span>
            </div>
        </div>
        <div class='entry__excerpt'>
            <p>
                ".substr($value["description"], 0, 195)."...<br> Devamını okumak için tıklayınız.
            </p>
        </div>
    </div>