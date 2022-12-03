<?php 

include("../config/config.php");
include_once("class.php");

    $id=$_GET["id"];   
    $sql = $conn->query("SELECT * FROM pages WHERE id=$id" ,PDO::FETCH_ASSOC);
    
    foreach ($sql as $value) {
        $pageName = $value["page_name"];
        $pageTitle = $value["page_title"];
        $description = $value["description"];
        $contents = $value["contents"];
        $state = $value["state"];
        $pagePhoto = $value["file_name"];
    } 
    
    if (isset($_POST["submit"])) {
      
        $getPageName = $_POST["pageName"];
        $getPageTitle = $_POST["pageTitle"];
        $getDescription = $_POST["description"];
        $getState = $_POST["state"];

        $sql = $conn->prepare("update pages set page_name=?, page_title=? ,description=?  where id=$id");
        $update = $sql->execute(array($getPageName, $getPageTitle, $getDescription));

       
        if ($update) {
            echo "Güncellendi";
            header("Location:pages.php");
        }
        else{
            echo "Bir sorun meydana geldi!";
        }
      }

?>

<?php include ("header.php");?>
<div class="menu-inner-shadow"></div>

            <ul class="menu-inner  py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
                <a href="pages.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-arrow-back"></i>
                <div data-i18n="Analytics">Geri Dön</div>
                </a>
            </li>
        </ul>
      </li>
    </ul>
  </aside>
<?php include("nav.php")?>
        <!-- PAGE -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-sm-12">
                   
        <form action="" method="post" enctype="multipart/form-data">
        
            
            <div class="col-md-12">
              <div class="card mb-7">
                <h5 class="card-header"><?php echo $pageName." Sayfasını Güncelliyorsun"; ?></h5>
                <div class="card-body">
                  <div class="form-floating">
                    <input
                      type="text"
                      class="form-control"
                      name="pageName"
                      aria-describedby="floatingInputHelp"
                      value="<?php echo $pageName; ?>"
                    />
                    <label for="floatingInput">Sayfa İsmi</label>
                  </div>

                  <br>      
                  <div class="form-floating">
                    <input
                      type="text"
                      class="form-control"
                      name="pageTitle"
                      aria-describedby="floatingInputHelp"
                      value="<?php echo $pageTitle; ?>"
                    />
                    <label for="floatingInput">Sayfa Başlığı</label>
                  </div>
                  <br>
                  <div class="form-floating">
                    <input
                      type="text"
                      class="form-control"
                      name="description"
                      aria-describedby="floatingInputHelp"
                      value="<?php echo $description; ?>"
                    />
                    <label for="floatingInput">Sayfa Açıklaması</label>
                  </div>
                  <br>
                  <div class="card mb-12">
                      <input class="btn btn-info" name="submit" type="submit" value="Güncelle"> </div>
                      
                  </div>
                    </div>
                </div>
            </div>
        </form>
        
        </div>
        <?php include("footer.php");
        $pagePhotoLocation ="../html/resimler/".$pagePhoto;
        ?>
        
        </div>
      </div>

            <div class="col-md-6 col-lg-4 mb-3">
              <div class="card h-100">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $pageTitle ?></h5>
                  <h6 class="card-subtitle text-muted"><?php echo $description ?></h6>
                </div>
                <img class="img-fluid" src="<?php echo $pagePhotoLocation ?>" alt="Sayfa Resmi" />
                <div class="card-body">
                  <p class="card-text"><?php echo $contents ?></p>
                  
                </div>
              </div>
            </div>
 
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>
    <script src="../assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
    

<?php 


?>