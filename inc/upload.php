<?php
$con = mysqli_connect("localhost", "root", "", "lab");


if(isset($_POST['submit'])){
    
    date_default_timezone_set("Asia/Karachi");
    $addProductName = $_POST['addProductName'];
    $productCode = $_POST['productCode'];
    $ProductUserName =  $_SESSION["Id"];
    $file = $_FILES['addProductImage'];
    $updateProductDate = date('Y-m-d h:ia');
    $addTestProductCategory = $_POST['addTestProductCategory'];
    $addTestProductDescription = $_POST['addTestProductDescription'];

    $insertquery = "insert into product values(NULL,'$addProductName','$productCode',$ProductUserName,'$addTestProductDescription',$addTestProductCategory,'$updateProductDate')" or die("Fail");
    $query = mysqli_query($con,$insertquery);
      
             if($query)
             {
              echo "Inserted";
             }
         else
         {
              echo "Not Inserted";  
         }

    for($i = 0; $i < count($_FILES['addProductImage']['name']); $i++)
    {
      
    //echo $addProductName.' '.$productCode.' ' .$file.' ' .$updateProductDate.' ' .$addTestProductCategory.' ' .$addTestProductDescription;    
    $filename = $file['name'][$i];
    $filepath = $file['tmp_name'][$i];
    $fileerror = $file['error'][$i];
    $image_size = $file['size'];
      
    if($image_size > 1000000)
    {
        //echo "Testing";
        if($fileerror == 0){

            //echo "error";
            $destfile = 'C:\xampp\htdocs\aptechProject\lab\pimage\ '.$filename;
            move_uploaded_file($filepath,$destfile);
      
            //echo $filename;
      
             
      
      
          }
          else{
              echo "Insert testing";
          }

    }


  
    //Finding Error During Upload File
    
    else
    {
        //print_r($file);
    }
    }
}
else
{
    echo "No Button Has Been Click";
}




?>