<?php 
include ("header.php");
include("../config/config.php");
include_once("class.php");

  //"SELECT * FROM pages WHERE id=$id" ,PDO::FETCH_ASSOC
  $sql = $conn->query("SELECT * FROM pages ORDER BY id DESC LIMIT 0,1;" ,PDO::FETCH_ASSOC);

    foreach ($sql as $value) {
        $pageName = $value["page_name"];
        $pageTitle = $value["page_title"];
        $description = $value["description"];
        $contents = $value["contents"];
        $state = $value["state"];
        $pagePhoto = $value["file_name"];
        $date = $value["date"];
        $viewing = $value["viewing"];
    } 
  $sql2 = $conn->query("SELECT * FROM pages ORDER BY id DESC LIMIT 0,2;" ,PDO::FETCH_ASSOC);

    foreach ($sql2 as $value) {
      $pageName2 = $value["page_name"];
      $pageTitle2 = $value["page_title"];
      $description2 = $value["description"];
      $contents2 = $value["contents"];
      $state2 = $value["state"];
      $pagePhoto2 = $value["file_name"];
      $date2 = $value["date"];
      $viewing2 = $value["viewing"];
  } 

  $pagePhotoLocation ="../html/resimler/".$pagePhoto;
  $pagePhotoLocation2 ="../html/resimler/".$pagePhoto2;
    
?>
      <div class="menu-inner-shadow"></div>

                  <ul class="menu-inner py-1">
                  <!-- Dashboard -->
                  <li class="menu-item active">
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
                  
                  <li class="menu-item ">
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
        <div class="row">
          <div class="col-lg-12 mb-4 order-0">
            <div class="card">
              <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                  <div class="card-body">
                    <h5 class="card-title text-primary">Yönetim Paneline Hoşgeldiniz! 🎉</h5>

                    <p class="mb-4"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione dolore quisquam quia ea repudiandae nihil. Repellat, nulla accusantium velit delectus, ab maiores culpa doloremque aperiam explicabo illum magnam, ipsam veniam.
                    </p>

                  </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                  <div class="card-body pb-0 px-0 px-md-4">
                    <img
                      src="../assets/img/illustrations/man-with-laptop-light.png"
                      height="140"
                      alt="View Badge User"
                      data-app-dark-img="illustrations/man-with-laptop-dark.png"
                      data-app-light-img="illustrations/man-with-laptop-light.png"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
            <div class="row">
              <div class="col-6 mb-4">
                      
              </div>
              <div class="col-6 mb-4">
                
              </div>
            </div>
          </div>
   


        <h5 class="pb-1 mb-4">Son Eklenenler</h5>
              <div class="row mb-5">
                <div class="col-md">
                  <div class="card mb-3">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img style="width:100%;height:190px;object-fit:cover;" class="card-img card-img-left" src="<?php echo $pagePhotoLocation ?>" alt="Card image" />
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $pageName ?></h5>
                          <p class="card-text">
                            <?php 
                              if ($state) {
                                echo "Sayfa aktif durumda.";
                              }
                              else {
                                echo "Sayfa pasif durumda.";
                              }  
                            ?>
                          </p>
                          <div class="py-1"> </div>
                          <p class="card-text"><small class="text-muted">Oluşturulma tarihi <?php echo $date; ?></small></p>
                          <p class="card-text"><small class="text-muted">Görüntülenme sayısı <?php echo $viewing; ?></small></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md">
                  <div class="card mb-3">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img style="width:100%;height:190px;object-fit:cover;" class="card-img card-img-left" src="<?php echo $pagePhotoLocation2 ?>" alt="Card image" />
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $pageName2 ?></h5>
                          <p class="card-text">
                            <?php 
                              if ($state2) {
                                echo "Sayfa aktif durumda.";
                              }
                              else {
                                echo "Sayfa pasif durumda.";
                              }  
                            ?>
                          </p>
                          <div class="py-1"> </div>
                          <p class="card-text"><small class="text-muted">Oluşturulma tarihi <?php echo $date2; ?></small></p>
                          <p class="card-text"><small class="text-muted">Görüntülenme sayısı <?php echo $viewing2; ?></small></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
      </div>

      </div>

      <?php include("footer.php") ?>
      
      <script src="../assets/vendor/libs/jquery/jquery.js"></script>
      <script src="../assets/vendor/libs/popper/popper.js"></script>
      <script src="../assets/vendor/js/bootstrap.js"></script>
      <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
      <script src="../assets/vendor/js/menu.js"></script>
      <script src="../assets/js/main.js"></script>
      <script async defer src="https://buttons.github.io/buttons.js"></script>
    </body>
  </html>

