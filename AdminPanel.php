

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
  <link rel="stylesheet" href="css/dataTablesCustomers.css">
    <link rel="stylesheet" href="css/dataTablesOrders.css">

  <!-- IMPORT OF JQUERY FUNCTIONS -->
  <script type="text/javascript" src="JQueryFunctions.js"></script>

 <link rel="stylesheet" type="text/css" href="AdminCP.css">
  
  
</head>
<body>
<?php require "DatabasePosts.php"; 
		require "dialogDraws.php";
		
		if (isset($_POST['username']) && isset($_POST['password'])){
		
		$user = $_POST['username'];
		$pass = hash('whirlpool',$_POST['password']);

		
		if (!($user == $_SERVER['DB_USER'] && $pass == $_SERVER['DB_PASS'])) {
		
		header("index.php");
		die();
		
		}
		
		} else	{
		showLoginForm();
		echo '<script type="text/javascript">
		showLoginDialog(); </script>';
		die(); 
		}
		
		
		?> <!-- IMPORT OF DATABASE FUNCTIONS AND DIALOG DRAWS-->

		
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
<tbody >
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
	
	<table id="DBTableCustomer" class="display" style="table-layout: fixed; width: 90%;">
		<thead>
		<tr class="ui-widget-header ">
			<th width="30px">ID</th>
			<th width="60px">Title</th>
			<th width="120px">First Name</th>
			<th width="120px">Last Name</th>
			<th width="210px">Email</th>
			<th width="150px">Phone No'</th>
			<th width="300px">Address..</th>
			</tr>
			</thead>
			
			<!-- PHP CODE TO READ DATABASE -->
<tbody >
			<?php
			
			$sql = "SELECT * FROM customers";
			$STH = $GLOBALS["db"]->query($sql);
						
			while ($row = $STH->fetch(PDO::FETCH_ASSOC)) {
			
			$id = $row['id'];
			$title = $row ['title'];
			$FName = $row['firstName'];
			$LName = $row['lastName'];
			$Email = $row['email'];
			$Phone = $row['phoneNumber'];
			$Address = $row['addressLine1']."|".$row['addressLine2']."|".$row['addressCity']."|".$row['addressPostal'];
			
			
			echo "<tr > <td> $id </td> 
<td> $title </td> <td> $FName </td> <td> $LName  </td> <td> $Email </td>
 <td> $Phone </td> <td> $Address</td> </tr>";
			
			}
			
			?>
	
</tbody>	
 </table>
 
 <br/>
 
 <p> SELECTED CUSTOMER: </p>
 <table style="table-layout: fixed; width: 100%" class="selectedCustomer">
		<tr >
			<th width="30px">ID</th>
			<th width="60px">Title</th>
			<th width="120px">First Name</th>
			<th width="120px">Last Name</th>
			<th width="200px">Email</th>
			<th width="150px">Phone No'</th>
			<th>Address..</th>
			</tr>
 <tr id="selectedResultCustomer"> </tr>
 
 </table>
 
  <br/>
 
 <!-- Customer BUTTON FUNCTIONS -->
 <a href="javascript:void(null);" onclick="showConfirmationDialogCustomer();">  <button id="delete-customer">Delete Customer</button> </a>
   <a href="javascript:void(null);" onclick="showEditDialogCustomer();">  <button id="edit-customer">Edit Customer</button>  </a>
      <a href="javascript:void(null);" onclick="showEmailDialog();">  <button id="email-customer">Email Customer</button>  </a>

   
   <!-- DELETE Customer DIALOG -------->
  <?php dialogDeleteCustomer(); ?>
  <!-- END DIALOG BOX -->
     
   <!-- EDIT Customer DIALOG --------->
<?php dialogEditCustomer(); ?>
 <!-- END DIALOG BOX -->
 
    <!-- EMAIL Customer DIALOG --------->
<?php dialogEmailCustomer(); ?>
 <!-- EMAIL DIALOG BOX -->
 
 
  </div>
	
 <!----------CUSTOMER TAB END--------------->
  <div id="tabs-Order">
      <!--------------------------------------------- ORDERS TAB CONTENT----------------------------------------------------->
	  
	<table id="DBTableOrders" class="display" style="table-layout: fixed; width: 90%;">
		<thead>
		<tr class="ui-widget-header ">
			<th width="30px">ID</th>
			<th width="60px">Products (IDs)</th>
			<th width="100px">Product Quantities</th>
			<th width="70px">Customer ID</th>
			<th width="80px">Date</th>
			<th width="80px">Time</th>
			<th width="100px">Auth String</th>
			<th width="80px">Total Payment</th>
			<th width="100px">Status(ID)</th>
			</tr>
			</thead>
			
			<!-- PHP CODE TO READ DATABASE -->
<tbody >
			<?php
			
			$sql = "SELECT * FROM productorders";
			$STH = $GLOBALS["db"]->query($sql);
						
			while ($row = $STH->fetch(PDO::FETCH_ASSOC)) {
			
			$id = $row['id'];
			$productID = $row ['productIDArray']; //Needs to be split
			$productQuantity = $row['productQuantityArray']; //Needs to be split
			$CustomerID = $row['customerID'];
			$Date = $row['date'];
			$Time = $row['time'];
			$AuthString = $row['authorisationString'];
			$Payment = $row['totalPrice'];
			$StatusID = $row['statusID']; // 1 is Processing, 2 is Shipped, 3 is Cancelled, 4 is Refunded.
			$Status = 'status'.$StatusID;
			$Status = $xml->status->$Status; 
			
			
			echo "<tr > <td> $id </td> 
<td> $productID </td> <td> $productQuantity </td> <td> $CustomerID  </td> <td> $Date </td>
 <td> $Time </td> <td> $AuthString</td>  <td> £$Payment</td>  <td> $Status ($StatusID)</td></tr>";
			
			}
			
			?>
	
</tbody>	
 </table>
 
 <br/>
 
 <p> SELECTED ORDER: </p>
 <table style="table-layout: fixed; width: 100%" class="selectedOrders">
		<tr >
			<th width="30px">ID</th>
			<th width="60px">Product IDs</th>
			<th width="120px"> Product Quantities </th>
			<th width="120px">Customer ID</th>
			<th width="200px">Date </th>
			<th width="150px"> Time </th>
			<th width="150px"> Auth String </th>
			<th width="150px"> Total Payment </th>
			<th width="150px"> Status (ID) </th>
			</tr>
 <tr id="selectedResultOrders"> </tr>
 
 </table>
 
  <br/>
 
 <!-- Customer BUTTON FUNCTIONS -->
 <a href="javascript:void(null);" onclick="showOrderViewDialog();">  <button id="delete-customer">View Order</button> </a>
   <a href="javascript:void(null);" onclick="showOrderStatusDialog();">  <button id="edit-customer">Change Status</button>  </a>
      <a href="javascript:void(null);" onclick="showCustomerViewDialog();">  <button id="email-customer">View/Contact Customer</button>  </a>

   
   <!-- VIEW ORDERS DIALOG -------->
  <?php dialogDeleteCustomer(); ?>
  <!-- END DIALOG BOX -->
     
   <!-- CHANGE STATUS DIALOG --------->
<?php dialogEditCustomer(); ?>
 <!-- END DIALOG BOX -->
 
    <!-- CONTACT CUSTOMER DIALOG --------->
<?php dialogEmailCustomer(); ?>
 <!-- EMAIL DIALOG BOX -->
 
  </div>
<!----------ORDERS TAB END--------------->
</div> <!-- TABS END -->


</body>
</html>


