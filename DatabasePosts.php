<?php

//// REMEMBER TO STORE DETAILS IN ROOT DIRECTORY

$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', $_SERVER['DB_USER'], $_SERVER['DB_PASS']);


if(isset($_POST['function'])) {

$function = $_POST['function'];

	switch ($function) {
    case "addNewProduct":
        addNewProduct();
        break;
    case "deleteProduct":
        deleteProduct();
        break;
    case "editProduct":
        editProduct();
		break;
	case "editCustomer":
		editCustomer();
        break;
	case "emailCustomer":
		emailCustomer();
		break;
	case "deleteCustomer":
		deleteCustomer();
		break;
	case "editOrderStatus":
		editOrderStatus();
		break;
	case "imagesUpload":
		imagesUpload();
		break;
}

$function = null;

}

 ///////////////////////////////
/* Product related functions */

function addNewProduct(){
$name = $_POST['name'];
$manufacturer = $_POST['manufacturer'];
$description = $_POST['description'];
$category = $_POST['category'];
$price = $_POST['price'];
$specification = $_POST['specification'];


$sql = "INSERT INTO products (name,manufacturer,description,categoryID,price,specification)
 VALUES (:name,:manufacturer,:description,:category,:price,:specification)";

 try {
    $STH = $GLOBALS["db"]->prepare($sql);  
	$STH->bindParam(":name", $name);
	$STH->bindParam(":manufacturer",$manufacturer);
	$STH->bindParam(":description", $description);
	$STH->bindParam(":category", $category);
	$STH->bindParam(":price", $price);
	$STH->bindParam(":specification", $specification);
	$STH->execute();
	echo '<script language="javascript">';
	echo "window.alert('Product Succesfully Added!'); window.location.href='http://localhost/test/AdminPanel.php';";
	echo '</script>';
	die();
} catch(PDOException $ex) {
    echo "An Error occured!"; 
}
 


}

function deleteProduct(){

$id = $_POST['productID'];

$sql = "DELETE FROM products WHERE id=$id";

try {
    $STH = $GLOBALS["db"]->prepare($sql);  
	$STH->execute();
		echo '<script language="javascript">';
	echo "window.alert('Product Succesfully Deleted!'); window.location.href='http://localhost/test/AdminPanel.php';";
	echo '</script>';
	die();
} catch(PDOException $ex) {
    echo "An Error occured!"; 
}

}

function editProduct(){

$id = $_POST['productID'];
$name = $_POST['name'];
$manufacturer = $_POST['manufacturer'];
$description = $_POST['description'];
$category = $_POST['category'];
$price = $_POST['price'];
$specification = $_POST['specification'];

$price = preg_replace("/[^-0-9\.]/","",$price);


$sql = "UPDATE products SET name = :name,manufacturer = :manufacturer,description = :description,
categoryID = :category,price = :price,specification = :specification WHERE id = :id;";

 try {
    $STH = $GLOBALS["db"]->prepare($sql);  
	$STH->bindParam(":id",$id);
	$STH->bindParam(":name", $name);
	$STH->bindParam(":manufacturer",$manufacturer);
	$STH->bindParam(":description", $description);
	$STH->bindParam(":category", $category);
	$STH->bindParam(":price", $price);
	$STH->bindParam(":specification", $specification);
	$STH->execute();
	echo '<script language="javascript">';
	echo "window.alert('Product Succesfully Updated!'); window.location.href='http://localhost/test/AdminPanel.php';";
	echo '</script>';
	die();
} catch(PDOException $ex) {
    echo "An Error occured!"; 
}


}

function editPictures(){

$id = $_POST['productID'];

for ($x = 1; $x <= 5; $x++) {

if (isset($_POST['pictureLink'.$x]) && !empty($_POST['pictureLink'.$x])) {

$link = $_POST['pictureLink'.$x];

$sql = "INSERT INTO picturearrays (productID,pictureLink,pictureNum) VALUES (:id,:link,:number)";

 try {
    $STH = $GLOBALS["db"]->prepare($sql); 
	$STH->bindParam(":id",$id);
	$STH->bindParam(":link", $link);
	$STH->bindParam(":number",$x);
	$STH->execute();
} catch(PDOException $ex) {
    echo "An Error occured!"; 
} // END CATCH

} // END IF

} // END FOR

	echo '<script language="javascript">';
	echo "window.alert('Picture(s) Succesfully Updated!'); window.location.href='http://localhost/test/AdminPanel.php';";
	echo '</script>';
	die();

}

 ////////////////////////////////
/* Customer related functions */

function editCustomer(){


$id = $_POST['customerID'];
$Title = $_POST['customerTitle'];
$FName = $_POST['customerFName'];
$LName = $_POST['customerLName'];
$Email = $_POST['customerEmail'];
$Number = $_POST['customerNumber'];
$AddressLine1 = $_POST['customerAddressLine1'];
$AddressLine2 = $_POST['customerAddressLine2'];
$AddressCity = $_POST['customerAddressCity'];
$AddressPostal = $_POST['customerAddressPostal'];



$sql = "UPDATE customers SET title = :title,firstName = :FName,lastName = :LName,
email = :Email,phoneNumber = :Number,addressLine1 = :AddressLine1,addressLine2 = :AddressLine2,
addressCity = :AddressCity,addressPostal = :AddressPostal WHERE id = :id;";

 try {
    $STH = $GLOBALS["db"]->prepare($sql);  
	$STH->bindParam(":id",$id);
	$STH->bindParam(":title",$Title);
	$STH->bindParam(":FName", $FName);
	$STH->bindParam(":LName",$LName);
	$STH->bindParam(":Email", $Email);
	$STH->bindParam(":Number", $Number);
	$STH->bindParam(":AddressLine1", $AddressLine1);
	$STH->bindParam(":AddressLine2", $AddressLine2);
	$STH->bindParam(":AddressCity", $AddressCity);
	$STH->bindParam(":AddressPostal", $AddressPostal);
	$STH->execute();
	echo '<script language="javascript">';
	echo "window.alert('Customer Succesfully Updated!'); window.location.href='http://localhost/test/AdminPanel.php';";
	echo '</script>';
	die();
} catch(PDOException $ex) {
    echo "An Error occured!"; 
}

}

function deleteCustomer(){


$id = $_POST['customerID'];

$sql = "DELETE FROM customers WHERE id=:id";

try {
    $STH = $GLOBALS["db"]->prepare($sql);  
	$STH->bindParam(":id",$id);
	$STH->execute();
	echo '<script language="javascript">';
	echo "window.alert('Customer Succesfully Deleted!'); window.location.href='http://localhost/test/AdminPanel.php';";
	echo '</script>';
	die();
} catch(PDOException $ex) {
    echo "An Error occured!"; 
}

}

function emailCustomer(){

$to = $_POST['customer-email'];
$msg = $_POST['message'];
$subject = $_POST['subject'];
$headers = "From: Admin@Dillips.com";

$msg = wordwrap($msg,70);


if (mail($to,$subject,$msg,$headers)){
	echo '<script language="javascript">';
	echo "window.alert('Email Succesfully Sent!'); window.location.href='http://localhost/test/AdminPanel.php';";
	echo '</script>';
	} else {
	echo '<script language="javascript">';
	echo "window.alert('ERROR! Contact Web Administrators'); window.location.href='http://localhost/test/AdminPanel.php';";
	echo '</script>';
	}

}

//// ORDER FUNCTION

function editOrderStatus(){

$id = $_POST['orderID'];
$status = $_POST['status'];

$sql = "UPDATE productorders SET statusID = :status WHERE id = :id;";

 try {
    $STH = $GLOBALS["db"]->prepare($sql);  
	$STH->bindParam(":id",$id);
	$STH->bindParam(":status",$status);
	$STH->execute();
	echo '<script language="javascript">';
	echo "window.alert('Order Status Succesfully Updated!'); window.location.href='http://localhost/test/AdminPanel.php';";
	echo '</script>';
	die();
} catch(PDOException $ex) {
    echo "An Error occured!"; 
}

}

function imagesUpload(){

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 800000) // 800kb file limit
&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  } else {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    if (file_exists("upload/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " already exists. ";
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "images/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
    }
  }
} else {
  echo "Invalid file";
}

}

?>





















