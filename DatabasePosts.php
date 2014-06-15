<?php

$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');


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
    $STH = $GLOBALS["db"]->prepare($sql);  //USE PREPARE FOR INSERT QUERIES AND QUERY FOR SELECT QUERIES
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
    $STH = $GLOBALS["db"]->prepare($sql);  //USE PREPARE FOR INSERT QUERIES AND QUERY FOR SELECT QUERIES
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
    $STH = $GLOBALS["db"]->prepare($sql);  //USE PREPARE FOR INSERT QUERIES AND QUERY FOR SELECT QUERIES
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

function newCustomer(){
}

function deleteCustomer($inID=null){
}

?>





















