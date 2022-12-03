<?php 
    include("admin/config/config.php");
    $sql = $conn->query("SELECT * FROM pages" ,PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="./admin/assets"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title><title>ssss</title></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="./admin/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="./admin/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="./admin/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="./admin/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="./admin/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="./admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="./admin/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="./admin/assets/js/config.js"></script>
  </head>
    
<body>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<select class="form-select" multiple aria-label="multiple select example">
<div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="javascript:void(0)">link1</a>
                      </li>
                      
                      <li class="nav-item dropdown">
                        <a
                          class="nav-link dropdown-toggle"
                          href="javascript:void(0)"
                          id="navbarDropdown"
                          role="button"
                          data-bs-toggle="dropdown"
                          aria-expanded="false"
                        >
                          Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        
                        <?php 
                        echo '<div class="dropdown-menu> aria-labelledby=""';
                        foreach ($sql as $value) {
                            if ($value["state"] == 1) {
                            echo " <li><a class='dropdown-item' href='page.php?id=".$value["id"]."'>".$value["page_name"]."</a></li>";
                            }
                        }
                        echo '</div>';
                        ?>
                    
                        </ul>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="javascript:void(0)">link2</a>
                      </li>
                      </li>
                     
                    </ul>
                   
                  </div>
</select>
<head>
  <title></title>
</head>

<body>
<select id="tst" >
<option>option</option>
<option>option</option>
<option>option</option>
<option>option</option>
<option>option</option>
<option>option</option>
<option>option</option>
<option>option</option>
<option>option</option>
<option>option</option>
</select>

<select id="tst" >
<input type="button" name="" value="Open" onclick="document.getElementById('tst').size='10';"/>
<input type="button" name="" value="Close" onclick="document.getElementById('tst').size='1';"/>

</body>

</html>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
                <div class="container-fluid">
                  
                  <a class="nav-link active" href="dnem.php">Anasayfa</a>
                  <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                  >
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="javascript:void(0)">link1</a>
                      </li>
                      
                      <li class="nav-item dropdown">
                        <a
                          class="nav-link dropdown-toggle"
                          href="javascript:void(0)"
                          id="navbarDropdown"
                          role="button"
                          data-bs-toggle="dropdown"
                          aria-expanded="false"
                        >
                          Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        
                        <?php 
                        echo '<div class="dropdown-menu> aria-labelledby=""';
                        foreach ($sql as $value) {
                            if ($value["state"] == 1) {
                            echo " <li><a class='dropdown-item' href='page.php?id=".$value["id"]."'>".$value["page_name"]."</a></li>";
                            }
                        }
                        echo '</div>';
                        ?>
                    
                        </ul>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="javascript:void(0)">link2</a>
                      </li>
                      </li>
                     
                    </ul>
                   
                  </div>
                </div>
              </nav>


              </body>
              <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="./admin/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="./admin/assets/vendor/libs/popper/popper.js"></script>
    <script src="./admin/assets/vendor/js/bootstrap.js"></script>
    <script src="./admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="./admin/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="./admin/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</html>
