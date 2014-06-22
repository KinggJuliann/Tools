<?php

function dialogAddNewProduct() {
  echo '   <div id="dialog-modal" title="Add New Product" style="display: none;">
   <p class="validateTips">All form fields are required.</p>
  <form method="post" action="DatabasePosts.php" > <!-- MAIN FORM ----------------------------------->
  <fieldset>
	<table>
	<tr>
	<td> <label for="name"> Name: <label> </th>
    <td>
    <input size="45" type="text" name="name" id="name" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	<tr>
	<td>
	<label for="manufacturer"> Manufacturer: <label>
	</td>
	    <td>
    <input type="text" name="manufacturer" id="manufacturer" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	<tr>
	<td>
    <label for="description">Description:</label>
	</td>
	<td>
    <textarea rows="4" cols="50" name="description" id="description" class="text ui-widget-content ui-corner-all"> </textarea>
	</td>
	</tr>
	<tr>
	<td>
	<label for="category">Category:</label>
	</td>
	<td>
    <select name="category">
		<option  value="1">Power Tools</option>
		<option value="2">Hand Tools</option>
		<option value="3">Accessories</option>
		<option value="4"> Workwear </option>
		<option value="5"> Misc </option>
	</select>
	</td>
	</tr>
	<tr>
	<td>
	<label for="price">Price:</label>
	</td>
	<td>
    £<input type="text" name="price" id="price" value="" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	<tr>
	<td>
	<label for="specification">Specification:</label> 
	</td>
	<td>
	<textarea rows="4" cols="40" name="specification" id="specification" class="text ui-widget-content ui-corner-all"> </textarea>
	</td>
	</tr>
   </table>
  </fieldset>
  
  <input type="hidden" name="function" value="addNewProduct">
  
    <p align="center">
  <input type="submit" value="Submit">
   </p>
  
  </form>
 
   </div> ';

}

function dialogDeleteProduct(){

	echo ' <div id="dialog-modal-confirm" title="Delete Product Confirmation" style="display: none;">
   <h2> ARE YOU SURE YOU WANT TO DELETE THIS PRODUCT: </h2>
   <p id="deleteConfirmationP"> <p>
   
   <form method="post" action="DatabasePosts.php"> 
   
   <input  type="hidden" name="productID" id="productID" /> 
   <input type="hidden" name="function" value="deleteProduct"/> 
   <button type="submit" > YES, I WANT TO DELETE THIS PRODUCT! </button>
   <button type="button" id="cancel"> NO, CANCEL! </button>
   
   </form>
   </div>';

}

function dialogEditProduct() {

echo '<div id="dialog-modal-edit" title="Edit Product" style="display: none;">
  <form method="post" action="DatabasePosts.php" >
  <fieldset>
	<table>
	<tr>
	<td> <label for="name"> Name: <label> </th>
    <td >
    <input type="text" size="45" name="name" id="edit-productName" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	<tr>
	<td>
	<label for="manufacturer"> Manufacturer: <label>
	</td>
	    <td>
    <input type="text" name="manufacturer" id="edit-productManufacturer" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	<tr>
	<td>
    <label for="description">Description:</label>
	</td>
	<td>
    <textarea rows="4" cols="50" name="description" id="edit-productDesc" class="text ui-widget-content ui-corner-all"> </textarea>
	</td>
	</tr>
	<tr>
	<td>
	<label for="category">Category:</label>
	</td>
	<td>
    <select name="category" id="selectCategory">
		<option  value="1">Power Tools</option>
		<option value="2">Hand Tools</option>
		<option value="3">Accessories</option>
		<option value="4"> Workwear </option>
		<option value="5"> Misc </option>
	</select>
	</td>
	</tr>
	<tr>
	<td>
	<label for="price">Price:</label>
	</td>
	<td>
    £<input type="text" name="price" id="edit-productPrice" value="" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	<tr>
	<td>
	<label for="specification">Specification:</label> 
	</td>
	<td>
	<textarea rows="4" cols="40" name="specification" id="edit-productSpec" class="text ui-widget-content ui-corner-all"> </textarea>
	</td>
	</tr>
   </table>
  </fieldset>
  
   <input  type="hidden" name="productID" id="edit-productID" /> 
  
  <input type="hidden" name="function" value="editProduct">
  
  <div align="center">
  <button type="submit" value="Submit"> SUBMIT CHANGES! </button>
  </div>
  </form>
 
   </div> ';

}

function dialogPictures() {

	echo ' <div id="dialog-modal-pictures" title="Add or Remove Pictures from Product" style="display: none;">
   
   <form method="post" action="DatabasePosts.php">    
   <input  type="hidden" name="productID" id="productID" /> 
   <input type="hidden" name="function" value="editPictures"/> 

   <table>
   <tr>
   <td> Picture 1: </td>
   <td> <input type="text" size="15" name="pictureLink1" id="PictureLink1" value="" class="text ui-widget-content ui-corner-all"> </td>
   <td>
   <input type="file" name"picture1"/>
   </td>
   <td>  <button type="button" id="delete"> Delete </button> </td>
   </tr>
      <tr>
   <td>  Picture 2: </td>
   <td> <input type="text" size="15" name="pictureLink2" id="PictureLink2" value="" class="text ui-widget-content ui-corner-all"> </td>
      <td>
   <input type="file" name"picture2"/>
   </td>
   <td>  <button type="button" id="delete"> Delete </button> </td>
   </tr>
   
      <tr>
   <td> Picture 3: </td>
   <td> <input type="text" size="15" name="pictureLink3" id="PictureLink3" value="" class="text ui-widget-content ui-corner-all"> </td>
      <td>
   <input type="file" name"picture3"/>
   </td>
   <td>  <button type="button" id="delete"> Delete </button> </td>
   </tr>
   
      <tr>
   <td> Picture 4: </td>
   <td> <input type="text" size="15" name="pictureLink4" id="PictureLink4" value="" class="text ui-widget-content ui-corner-all"> </td>
      <td>
   <input type="file" name"picture4"/>
   </td>
   <td>  <button type="button" id="delete"> Delete </button> </td>
   </tr>
   
      <tr>
   <td> Picture 5: </td>
   <td> <input type="text" size="15" name="pictureLink5" id="PictureLink5" value="" class="text ui-widget-content ui-corner-all"> </td>
      <td>
   <input type="file" name"picture5"/>
   </td>
   <td>  <button type="button" id="delete"> Delete </button> </td>
   </tr>
   
   </table>
   <br/>
     <button type="submit" value="Submit"> SUBMIT! </button>
   </form>
   </div>';

}


function dialogEditCustomer() {

echo '<div id="dialog-modal-edit-customer" title="Edit Customer" style="display: none;">
  <form method="post" action="DatabasePosts.php" > 
  <fieldset>
	<table>
	<tr>
	<td> <label for="title"> Title: <label> </th>
    <td >
    <input type="text" size="45" name="customerTitle" id="edit-customerTitle" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
		<tr>
	<td> <label for="FName"> First Name: <label> </th>
    <td >
    <input type="text" size="45" name="customerFName" id="edit-customerFName" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	
		<tr>
	<td> <label for="LName"> Last Name: <label> </th>
    <td >
    <input type="text" size="45" name="customerLName" id="edit-customerLName" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
		<tr>
	<td> <label for="Email"> Email : <label> </th>
    <td >
    <input type="text" size="45" name="customerEmail" id="edit-customerEmail" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
		<tr>
	<td> <label for="Number"> Phone Number: <label> </th>
    <td >
    <input type="text" size="45" name="customerNumber" id="edit-customerNumber" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
		<tr>
	<td> <label for="AddressL1"> Address Line 1: <label> </th>
    <td >
    <input type="text" size="45" name="customerAddressLine1" id="edit-customerAddressL1" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	<tr>
	<td> <label for="AddressL2"> Address Line 2: <label> </th>
    <td >
    <input type="text" size="45" name="customerAddressLine2" id="edit-customerAddressL2" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	<tr>
	<td> <label for="AddressCity"> Address City/Town: <label> </th>
    <td >
    <input type="text" size="45" name="customerAddressCity" id="edit-customerAddressCity" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	<tr>
	<td> <label for="AddressPostal"> Address Postal Code: <label> </th>
    <td >
    <input type="text" size="45" name="customerAddressPostal" id="edit-customerAddressPostal" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
   </table>
  </fieldset>
  
   <input  type="hidden" name="customerID" id="edit-customerID" /> 
  
  <input type="hidden" name="function" value="editCustomer">
  
  <div align="center">
  <button type="submit" value="Submit"> SUBMIT CHANGES! </button>
  </div>
  </form>
 
   </div> ';

}

function dialogDeleteCustomer(){

	echo ' <div id="dialog-modal-confirm-customer" title="Delete Customer Confirmation" style="display: none;">
   <h2> ARE YOU SURE YOU WANT TO DELETE THE CUSTOMER: </h2>
   <p id="deleteConfirmationCustomer" style="font-size:30px;"> <p>
   
   <form method="post" action="DatabasePosts.php"> 
   
   <input  type="hidden" name="customerID" id="customerID" /> 
   <input type="hidden" name="function" value="deleteCustomer"/> 
   <button type="submit" > YES, I WANT TO DELETE THIS CUSTOMER! </button>
   <button type="button" id="cancel"> NO, CANCEL! </button>
   
   </form>
   </div>';

}


function dialogEmailCustomer() {

echo '<div id="dialog-modal-email-customer" title="Contact Customer" style="display: none;">

  <form method="post" action="DatabasePosts.php" > 
  <fieldset>
	<table>
	<tr>
	<td> <label for="Customer" > Customer: <label> </th>
    <td >
     <div id="email-label-customerName">
	 </div>
	</td>
	</tr>
	<tr>
	<td> <label for="Email" > Email: <label> </th>
    <td >
     <div id="email-customerID" >
	 </div>
	</td>
	</tr>
	<tr>
	<td> <label for="Subject"> Subject: <label> </th>
    <td >
    <input type="text" size="45" name="subject"  class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	<tr>
	<td style="vertical-align: top;"> <label for="Message"> Message: <label> </th>
    <td >
    <textarea rows="10" cols="70" name="message"  class="text ui-widget-content ui-corner-all"> </textarea>
	</td>
	</tr>
   </table>
  </fieldset>
  
  <input type="hidden" name="customer-email" />
  <input type="hidden" name="function" value="emailCustomer"/>
  
  <div align="center">
  <button type="submit" value="Submit"> Send Email! </button>
  </div>
  </form>
 
   </div> ';

}

function dialogOrdersView() {


echo '<div id="dialog-modal-view-order" title="View Order" style="display: none;">
  <form method="post" >
  <fieldset width="90%">
	<table id="printTable">
	<tr >
	<td style="padding-bottom:20px; width:400px;"> <label for="customer"> Customer Name: </label>
	</td>
	<td style="padding-bottom:20px;"> <div id="view-label-order-customerName">
	 </div> </td>
	</tr>	
	<tr>
	<td style="padding-bottom:20px; width:400px;"> <label for="customerEmail"> Customer Email: </label>
	</td>
	<td style="padding-bottom:20px;"> <div id="view-label-order-customerEmail">
	 </div> </td>
	</tr>	
	<tr>
	<td style="padding-bottom:20px; vertical-align: top; width:400px;"> <label for="customerAddress"> Customer Address: </label>
	</td>
	<td style="padding-bottom:20px;"> <div style="width:750px; white-space: pre-wrap;" id="view-label-order-customerAddress">
	 </div> </td>
	</tr>
	<tr >
	<td style="vertical-align: top; padding-bottom:20px; width:400px;"> <label for="Product" > Products: </label> </td>
    <td style="padding-bottom:20px;">
	
	<div  style="width:750px; white-space: pre-wrap;" id="view-label-orderProducts"> </div>
	
   
	</td>
	</tr>
	<tr >
	<td style="padding-bottom:20px; width:400px;"> <label for="dateTime"> Date and Time: </label> </td>
	<td style="padding-bottom:20px;">
		<div id="view-label-dateTime"> </div>
		</td>
	</tr>
	
	<tr >
	<td style="padding-bottom:20px; width:400px;"> <label for="totalPrice"> Total Payment: </label> </td>
	<td style="padding-bottom:20px;">
		<div id="view-label-orderPayment"> </div>
		</td>
	</tr>
		
   </table>
  </fieldset>
  <br/>
  <hr/>
  <a href="javascript:void(null);" onclick="printData();">  <button id="print-order">Print Order</button>  </a>
  
  </form>
 
   </div> ';

}


function dialogOrderStatus() {


echo '<div id="dialog-modal-edit-status" title="Change Order Status" style="display: none;">
  <form method="post" action="DatabasePosts.php" >
  <fieldset>
	<table>
	
	<tr>
	<td>
	<label for="category"> Order Status:</label>
	</td>
	<td>
    <select  style="width:200px;" name="status" id="selectStatus">
		<option value="1">Processing</option>
		<option value="2">Shipped</option>
		<option value="3">Cancelled</option>
		<option value="4"> Refunded </option>
	</select>
	</td>
	</tr>
	
   </table>
  </fieldset>
  
   <input  type="hidden" name="orderID" id="edit-order" /> 
  
  <input type="hidden" name="function" value="editOrderStatus">
  
  <br/>
  
  <div align="center">
  <button type="submit" value="Submit"> SUBMIT! </button>
  </div>
  </form>
 
   </div> ';

}


function dialogCustomerView() {

echo '<div id="dialog-modal-view-customer" title="View Customer" style="display: none;">
  <form method="post" action="DatabasePosts.php" >
  <fieldset>
	<table>
	<tr>
	<td> <label for="Customer" > Customer: </label> </td>
    <td >
     <div id="view-label-customerName">
	 </div>
	</td>
	</tr>
	<tr>
	<td> <label for="Number"> Phone Number: </label> </td>
	<td>
		<div id="view-label-customerNumber"> </div>
		</td>
	</tr>
		<tr>
	<td> <label for="Address" > Address: <label> </td>
    <td >
     <div id="view-label-customerAddress" >
	 </div>
	</td>
	</tr>
	<tr>
	<td> <label for="Email" > Email: <label> </td>
    <td >
     <div id="view-label-customerEmail" >
	 </div>
	</td>
	</tr>
	
	<tr>
	<td> <label for="Subject"> Subject: </label> </td>
    <td >
    <input type="text" size="45" name="subject"  class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	<tr>
	<td style="vertical-align: top;"> <label for="Message"> Message: </label> </th>
    <td >
    <textarea rows="10" cols="70" name="message"  class="text ui-widget-content ui-corner-all"> </textarea>
	</td>
	</tr>
   </table>
  </fieldset>
  
  <input type="hidden" name="customer-email" />
  <input type="hidden" name="function" value="emailCustomer"/>
  
  <div align="center">
  <button type="submit" value="Submit"> Send Email! </button>
  </div>
  </form>
 
   </div> ';


}

////////////////////////////////////////////////////////////////////

function showLoginForm(){

echo '<div id="dialog-modal-login" title="Login" style="display: none;">
  <form method="post" action="AdminPanel.php" > <!-- MAIN FORM ----------------------------------->
  <fieldset>
	<table>
	<tr>
	<td> <label for="User" > Username: <label> </th>
    <td >
		<input type="text" size="40" name="username" />
	</td>
	</tr>
		<tr>
	<td> <label for="User" > Password: <label> </th>
    <td >
		<input type="password" size="40" name="password" />
	</td>
	</tr>
   </table>
  </fieldset>

  <div align="center">
  <button type="submit" value="Submit"> Login </button>
  </div>
  </form>
 
   </div> ';

}


?>
































