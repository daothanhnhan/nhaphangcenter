<meta charset="utf-8">
<?php

if(isset($_POST['submit'])) {
     if(isset($_FILES['uploadFile']['name']) && $_FILES['uploadFile']['name'] != "") {
        $allowedExtensions = array("xls","xlsx");
        $ext = pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION);
        if(in_array($ext, $allowedExtensions)) {
           $file_size = $_FILES['uploadFile']['size'] / 1024;
           if($file_size < 50 || true) {
               // $file = "uploads/".$_FILES['uploadFile']['name'];
                $file = dirname(__FILE__)."/uploads/".$_FILES['uploadFile']['name'];
               $isUploaded = copy($_FILES['uploadFile']['tmp_name'], $file);
               if($isUploaded) {
                    // include("db.php");
                    include_once dirname(__FILE__) . "/../functions/database.php";
                    // include("Classes/PHPExcel/IOFactory.php");
                    // include("PHPExcel/IOFactory.php");
                    // require('PHPExcel/Autoloader.php');
                    include_once dirname(__FILE__) . "/PHPExcel/IOFactory.php";
                    try {
                        //Load the excel(.xls/.xlsx) file
                        // echo $file;
                        // echo 'tuan';
                        $objPHPExcel = PHPExcel_IOFactory::load($file);
                        // echo 'tuan1';
                    } catch (Exception $e) {
                         die('Error loading file "' . pathinfo($file, PATHINFO_BASENAME). '": ' . $e->getMessage());
                        // die ('loi.');
                    }
                    
                    //An excel file may contains many sheets, so you have to specify which one you need to read or work with.
                    $sheet = $objPHPExcel->getSheet(0);
                    //It returns the highest number of rows
                    $total_rows = $sheet->getHighestRow();
                    //It returns the highest number of columns
                    $total_columns = $sheet->getHighestColumn();//echo $total_columns;
                          
                    echo '<h4>Data from excel file</h4>';
                    echo '<table cellpadding="5" cellspacing="1" border="1" class="responsive">';
                  
                    // $query = "insert into `user_details` (`id`, `name`, `mobile`, `country`) VALUES ";
                    $query = "insert into `cartdetail` (`product_name`, `price_product`, `qyt_product`, `totalprice_product`, `id_cart`) VALUES ";
                    //Loop through each row of the worksheet
                    $amount = 0;
                    for($row =2; $row <= $total_rows; $row++) {
                        //Read a single row of data and store it as a array.
                        //This line of code selects range of the cells like A1:D1
                        $single_row = $sheet->rangeToArray('A' . $row . ':' . $total_columns . $row, NULL, TRUE, FALSE);
                        // echo "<tr>";
                        //Creating a dynamic query based on the rows from the excel file
                        // $query .= "(";
                        //Print each cell of the current row
                        $d = 0;
                        $quantity = 0;
                        $price = 0;
                        $total = 0;
                        foreach($single_row[0] as $key=>$value) {
                            $d++;
                            if ($d==2) {
                                $price = $value;
                            }
                            if ($d==3) {
                                $quantity = $value;
                            }
                            // echo "<td>".$value."</td>";
                            // $query .= "'".mysqli_real_escape_string($conn_vn, $value)."',";
                        }
                        $total = (int)$price * (int)$quantity;
                        $amount += $total;
                        // $query .= "'".$total."',";
                        // $query = substr($query, 0, -1);
                        // $query .= "),";
                        // echo "</tr>";
                    }
                    // $query = substr($query, 0, -1);
                    // echo '</table>';
                  	// echo $query;echo '<br>';
                    $time = time();
                    $sql = "INSERT INTO cart (total_price, total_cart) VALUES ($amount, $time)";
                    $result = mysqli_query($conn_vn, $sql);
                    $sql = "SELECT * FROM cart WHERE total_cart = $time";
                    $result = mysqli_query($conn_vn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $cart_id = $row['id_cart'];

                    for($row =2; $row <= $total_rows; $row++) {
                        //Read a single row of data and store it as a array.
                        //This line of code selects range of the cells like A1:D1
                        $single_row = $sheet->rangeToArray('A' . $row . ':' . $total_columns . $row, NULL, TRUE, FALSE);
                        echo "<tr>";
                        //Creating a dynamic query based on the rows from the excel file
                        $query .= "(";
                        //Print each cell of the current row
                        $d = 0;
                        $quantity = 0;
                        $price = 0;
                        $total = 0;
                        foreach($single_row[0] as $key=>$value) {
                            $d++;
                            if ($d==2) {
                                $price = $value;
                            }
                            if ($d==3) {
                                $quantity = $value;
                            }
                            echo "<td>".$value."</td>";
                            $query .= "'".mysqli_real_escape_string($conn_vn, $value)."',";
                        }
                        $total = (int)$price * (int)$quantity;
                        $amount += $total;
                        $query .= "'".$total."',";
                        $query .= "'".$cart_id."',";
                        $query = substr($query, 0, -1);
                        $query .= "),";
                        echo "</tr>";
                    }
                    $query = substr($query, 0, -1);
                    echo '</table>';
                    // echo $query;echo '<br>';
                    // At last we will execute the dynamically created query an save it into the database
                    mysqli_query($conn_vn, $query) or die('loi: ' . mysqli_error($conn_vn));
                    if(mysqli_affected_rows($conn_vn) > 0) {    
                        echo '<span class="msg">Database table updated!</span>';
                    } else {
                        echo '<span class="msg">Can\'t update database table! try again.</span>';
                    } 
                    // Finally we will remove the file from the uploads folder (optional) 
                    unlink($file);
                } else {
                    echo '<span class="msg">File not uploaded!</span>';
                }
            } else {
                echo '<span class="msg">Maximum file size should not cross 50 KB on size!</span>';	
            }
        } else {
            echo '<span class="msg">This type of file not allowed!</span>';
        }
    } else {
        echo '<span class="msg">Select an excel file first!</span>';
    }
}
?>
<!-- <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data"> -->
<form action="" method="post" enctype="multipart/form-data">
    Upload excel file : 
    <input type="file" name="uploadFile" value="" />
    <input type="submit" name="submit" value="Upload" />
</form>