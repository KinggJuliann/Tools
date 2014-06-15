<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<title>Admin Control Panel</title>
	<!-- IMPORT JQUERY UI -->
  <meta charset="utf-8">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="//cdn.datatables.net/plug-ins/be7019ee387/integration/jqueryui/dataTables.jqueryui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script src="//cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">

  <!-- IMPORT OF JQUERY FUNCTIONS -->
  <script type="text/javascript" src="JQueryFunctions.js"></script>

 <link rel="stylesheet" type="text/css" href="AdminCP.css">
  
  
</head>
<body>
<?php require "DatabasePosts.php"; 
		require "dialogDraws.php";?> <!-- IMPORT OF DATABASE FUNCTIONS AND DIALOG DRAWS-->

    <div id="logo">
	 <a href="">
 	 <img src="images/logo.png" alt="" border="0" width="182" height="85" />  </a></div>
	 
<div id="tabs" >
  <ul>
    <li><a href="#tabs-Products">Products</a></li>
    <li><a href="#tabs-Customer">Customer</a></li>
    <li><a href="#tabs-Order">Orders</a></li>
  </ul>
  <div id="tabs-Products">
  <!-------------------------------------- PRODUCT TAB CONTENT------------------------------------------------------------------>
  <table id="DBTable" class="display" style="table-layout: fixed; width: 90%">
		<thead>
		<tr class="ui-widget-header ">
			<th width="50px">ID</th>
			<th>Name</th>
			<th width="120px">Manufacturer</th>
			<th>Description</th>
			<th width="150px">Category(ID)</th>
			<th width="75px">Price</th>
			<th>Specification</th>
			</tr>
			</thead>
			
			<!-- PHP CODE TO READ DATABASE -->
<tbody>
			<?php
			
			$sql = "SELECT * FROM products";
			$STH = $GLOBALS["db"]->query($sql);
			$xml = simplexml_load_file("resources.xml");
						
			while ($row = $STH->fetch(PDO::FETCH_ASSOC)) {
			
			$id = $row['id'];
			$name = $row ['name'];
			$manufacturer = $row['manufacturer'];
			$description = $row['description'];
			$categoryID = $row['categoryID'];
			$price = $row['price'];
			$specification = $row['specification'];
			$category = "category".$categoryID;
			
			$category = $xml->categories->$category; 
			
			echo "<tr > <td> $id </td> 
<td> $name </td> <td> $manufacturer </td> <td> $description  </td> <td> $category ($categoryID) </td>
 <td> £$price </td> <td> $specification</td> </tr>";
			
			}
			
			?>
	
</tbody>	
 </table>
 
 <br/>
 
 <p> SELECTED PRODUCT: </p>
 <table style="table-layout: fixed; width: 100%" class="selected">
 		<tr >
			<th width="50px">ID</th>
			<th>Name</th>
			<th width="150px"> Manufacturer </th>
			<th>Description</th>
			<th width="150px">Category(ID)</th>
			<th width="75px">Price</th>
			<th>Specification</th>
		</tr>
 <tr id="selectedResult"> </tr>
 
 </table>
 
  <br/>
 
 <!-- PRODUCT BUTTON FUNCTIONS -->
<a href="javascript:void(null);" onclick="showDialog();"> <button id="new-product">Add New Product</button> </a>
 <a href="javascript:void(null);" onclick="showConfirmationDialog();">  <button id="delete-product">Delete Product</button> </a>
   <a href="javascript:void(null);" onclick="showEditDialog();">  <button id="edit-product">Edit Product</button>  </a>
     <a href="javascript:void(null);" onclick="showPicturesDialog();">  <button id="edit-pictures">Add/Remove Images</button>  </a>

   
   <!-- DELETE PRODUCT DIALOG -------->
  <?php dialogDeleteProduct(); ?>
  <!-- END DIALOG BOX -->
     
   
   <!-- CREATE NEW PRODUCT DIALOG -------------->
<?php dialogAddNewProduct(); ?>
 <!-- END DIALOG BOX -->
 
   <!-- EDIT PRODUCT DIALOG --------->
<?php dialogEditProduct(); ?>
 <!-- END DIALOG BOX -->
 
    <!-- EDIT PICTURES DIALOG --------->
 <?php
			$sql = "SELECT * FROM picturearrays";
			$STH = $GLOBALS["db"]->query($sql);				 
			
			echo '<table style="display: none">';
			
			while ($row = $STH->fetch(PDO::FETCH_ASSOC)) {
			$productID = $row['productID'];
			$pictureLink = $row['pictureLink'];
			
			echo "<tr > <td id='productID-$productID'> $productID </td> 
<td id='productID-$productID-link'> $pictureLink </td> </tr>";		

 }
 
 echo "</table>";
 
 dialogPictures(); 
 
 ?>
 <!-- END DIALOG BOX -->
 
 
  </div>
 <!----------PRODUCT TAB END--------------->
  <div id="tabs-Customer">
    <!--------------------------------------------- CUSTOMER TAB CONTENT----------------------------------------------------->
  </div>
 <!----------CUSTOMER TAB END--------------->
  <div id="tabs-Order">
    <!-- ORDERS TAB CONTENT-->
  </div>
</div>
<!----------ORDERS TAB END--------------->


</body>
</html>


