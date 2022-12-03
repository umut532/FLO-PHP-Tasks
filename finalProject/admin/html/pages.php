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

            <li class="menu-item active">
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
        <h5 class="card-header">Sayfalar Tablosu</h5>
          <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                  <tr>
                    <th>Sayfa İSMİ</th>
                    <th>Görüntülenme</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;TARİH</th>
                    <th>&nbsp;Durum</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; İşlemler</th> 
                  </tr>
                </thead>

                <tbody class="table-border-bottom-0">
                  <tr>
                      <?php include ("class.php");
                          $list = new service();
                          $list->list();
                      ?>
                  </tr>
                </tbody>
            </table>
          </div>
        </div>
            
      </div>
    </div>
  </div>
        <?php include("footer.php") ?>
        
  </div>
  </div> 

    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
