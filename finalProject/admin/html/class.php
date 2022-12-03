<?php 

    class service{
        
        private $DbCon;
        public function __construct()
        {
            // $this->userName = isset($_POST['userName']) ? $_POST['userName'] : null;
            // $this->nationalId = isset($_POST['nationalId']) ? $_POST['nationalId'] : null;
            try {
                $conn = new PDO("mysql:host=localhost;dbname=webservice;charset=utf8", "root", "");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                
            } 
            catch (PDOException $e) {
                exit("Connection failed: " . $e->getMessage());
            }
    
            if ($conn) {
                $this->DbCon = $conn;
                $last_id = $conn->lastInsertId();
            }
        }

        public function date(){
            $date= date("d-m-Y ");
            return $date;
        }

        public function viewing(){
            // $id = 1;
            // $hit = $this->DbCon->prepare("UPDATE pages SET viewing= viewing +1 WHERE id=?");
            // $hit->execute(array($id));

            // $sorgu = $this->DbCon->prepare("SELECT * FROM pages Where viewing=:id");
            // $sorgu->execute(array("id" => $id
            // ));
            // $islem = $sorgu->fetch(PDO::FETCH_ASSOC);
            // echo $islem["viewing"];
        }

        function replace_tr($text) {
            $text = trim($text);
            $search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ');
            $replace = array('c','c','g','g','i','i','o','o','s','s','u','u',' ');
            $new_text = str_replace($search,$replace,$text);
            return $new_text;
        } 

        public function addPage($getpageName,$getpageTitle,$getdescription,$getcontents,$getfile_name){
            $pageName = ucfirst($getpageName);
            $pageTitle = ucfirst($getpageTitle);
            $description = ucfirst($getdescription);
            $contents = ucfirst($getcontents);
            $file_name = $getfile_name;
            $viewing = 1;
            $clearPageName = mb_strtolower($this->replace_tr($pageName));
            
            $sql = $this->DbCon->prepare("INSERT INTO pages values (?,?,?,?,?,?,?,?,?,?)"); 
            $add = $sql->execute(array(NULL,"$pageName","$pageTitle","$description","$contents","$file_name",$this->date(),$viewing,1,$clearPageName));

            if ($add) {
            

                echo "
                    <div class='col-sm-11'>
                    <br>
                        <div style='margin-left: 30px;' class='alert alert-success alert-dismissible' role='alert'>
                                Sayfa oluşturuldu!
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
            ";
            }
            else {
                echo "
                <div class='col-sm-11'>
                <br>
                    <div style='margin-left: 30px;' class='alert alert-danger alert-dismissible' role='alert'>
                            Sayfa oluşturulamadı!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                </div>";
            }

        }

        public function delete($id){
                $id= $_GET["id"];
                $sqlDelete = $this->DbCon->prepare("DELETE from pages where id=?");
                $sqlDelete->execute(array($id));
                header("Location:pages.php");

        }

        public function update($id){
            $id = $_GET["id"];
            $sql = $this->DbCon->query("select * from pages where id=$id" ,PDO::FETCH_ASSOC);
            
        }

        public function list(){
            //Bitmiş Fonksiyon
            $sql = $this->DbCon->query("SELECT * FROM pages" ,PDO::FETCH_ASSOC);
            $state = "";
           $activeState = 0;
            foreach ($sql as $value) {
                if ($value["state"] == 1) {
                    $activeState = $activeState + 1;
                    $state = "<td><div class='dropdown'>
                        <span class='badge bg-label-primary me-1'>AKTİF</span> 
                        
                            <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                                <i class='bx bx-cog'></i>
                            </button>
                        <div class='dropdown-menu'>  
                            <a class='dropdown-item' href='stateUpdate.php?id=$value[id]'>
                            <i class='bx bx-run''></i> Pasif</a>
                        </div>
                    </td>";
                }
                else {
                    $state = "
                    <td><div class='dropdown'>
                        <span class='badge bg-label-warning me-1'>PASİF</span>
                        
                            <button type='button' class='btn p-0 dropdown-toggle hide-arrow' data-bs-toggle='dropdown'>
                                <i class='bx bx-cog'></i>
                            </button>
                        <div class='dropdown-menu'>  
                            <a class='dropdown-item' href='stateUpdate.php?id=$value[id]'>
                            <i class='bx bx-run''></i> Aktif</a>
                        </div>
                    </td>";
                    
                }
                echo   "<tr>
                            
                            <i class='fab fa-angular fa-lg text-danger me-3'></i> <strong><td class='managetable'> ". $value['page_name'] ."</td></strong>
                            <td class=''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ". $value['viewing'] ." defa.</td>
                            <td class=''> ". $value['date'] ."</td>
                            ".$state."
                            
                            <td class='managetabşe'> <a href='update.php?id=$value[id]' class='btn btn-info'>Düzenle</a>
                            <a href='delete.php?id=$value[id]' class='btn btn-danger'>Sil</a></td>
                           
                        </tr>";
                        "<tr>
                            echo 'kimse bulunamadı';
                        </tr>";
            } 
            echo "<td colspan='5' class='' >Sistemde Toplam <b>".$sql->rowCount()."</b> Kayıt Var. Toplam <b>".$activeState."</b> kayıt aktif.</td>";
            
        }

    }


?>