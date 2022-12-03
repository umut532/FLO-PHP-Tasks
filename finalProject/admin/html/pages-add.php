<?php include ("header.php");?>
<div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
                <a href="deneme.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Anasayfa</div>
                </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Sayfa İşlemleri</span>
            </li>

            <li class="menu-item">
                <a href="pages.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-bookmark-alt"></i>
                <div data-i18n="Analytics">Tüm Sayfalar</div>
                </a>
            </li>
            
            <li class="menu-item active">
                <a href="pages-add.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-bookmark-alt-plus"></i>
                <div data-i18n="Analytics">Sayfa Ekle</div>
                </a>
            </li>
        </ul>
      </li>
    </ul>
  </aside>
<?php include("nav.php")?>

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-sm-12">
                   
            <form action="pages-add" method="post" enctype="multipart/form-data">
            
               
                <div class="col-md-7">
                  <div class="card mb-7">
                    <h5 class="card-header">Sayfa Ekle</h5>
                    <div class="card-body">
                      <div class="form-floating">
                        <input
                          type="text"
                          class="form-control"
                          name="pageName"
                          aria-describedby="floatingInputHelp"
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
                        />
                        <label for="floatingInput">Sayfa Açıklaması</label>
                      </div>

                      <br> 

                      <div class="mb-12">
                          <label class="form-label" for="basic-default-message">Sayfa İçeriği</label>
                          <textarea
                            id="basic-default-message"
                            class="form-control"
                            placeholder="Sayfa İçeriği...";
                            name="contents"
                          ></textarea>
                        </div>

                        <div class="card-body demo-vertical-spacing demo-only-element">
                            <div class="input-group">

                                <label class="input-group-text" for="inputGroupFile01">Resim Yükle</label>
                                <input type="file" name="resim" class="form-control" />

                            </div>
                        </div>
                            <div class="card mb-12">
                                <input class="btn btn-primary" name="submit" type="submit" value="Ekle"> </div>
                                
                            </div>

                            <?php 
include_once("../config/config.php");
include ("class.php");

   $add = new service();
   
    if (isset($_POST["submit"])) {
    $pageName = $_POST["pageName"];
    $pageTitle = $_POST["pageTitle"];
    $description = $_POST["description"];
    $contents = $_POST["contents"];
    move_uploaded_file($_FILES["resim"]["tmp_name"],"resimler/" . $_FILES["resim"]["name"]);			
    $fileName=$_FILES["resim"]["name"];
    
      if (empty($pageName)) {
            echo "
            <div class='col-sm-11'>
            <br>
                <div style='margin-left: 30px;' class='alert alert-danger alert-dismissible' role='alert'>
                        Sayfa adı boş bırakılamaz - Lütfen bir sayfa adı girin!
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            </div>
            ";
         
      }
      elseif (empty($description)) {
            echo "
            <div class='col-sm-11'>
            <br>
                <div style='margin-left: 30px;' class='alert alert-danger alert-dismissible' role='alert'>
                        Sayfa açıklaması boş bırakılamaz - Lütfen sayfa açıklamasını girin!
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            </div>
            ";
      }
      elseif (empty($pageTitle)) {
            echo "
            <div class='col-sm-11'>
            <br>
                <div style='margin-left: 30px;' class='alert alert-danger alert-dismissible' role='alert'>
                        Sayfa başlığı boş bırakılamaz - Lütfen bir sayfa başlığı girin!
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            </div>
            ";
      }
      elseif (empty($contents)) {
            echo "
            <div class='col-sm-11'>
            <br>
                <div style='margin-left: 30px;'class='alert alert-danger alert-dismissible' role='alert'>
                        Sayfa içeriği boş bırakılamaz - Lütfen sayfa içeriği girin!
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            </div>
            ";
      }
      elseif (empty($fileName)) {
        echo "
          <div class='col-sm-11'>
          <br>
              <div style='margin-left: 30px;' class='alert alert-danger alert-dismissible' role='alert'>
                  Lütfen Bir resim seçiniz!
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>
          </div>";
      }
      else{
        $add->addPage($pageName,$pageTitle,$description,$contents,$fileName);
      }

    }

?>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php include("footer.php") ?>
      </div>
    </div>
                 
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
    

