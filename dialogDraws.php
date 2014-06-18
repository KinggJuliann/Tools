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
   <p class="validateTips">All form fields are required.</p>
  <form method="post" action="DatabasePosts.php" > <!-- MAIN FORM ----------------------------------->
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
   <td>Picture 1: </td>
   <td> <input type="text" size="50" name="pictureLink1" id="PictureLink1" value="" class="text ui-widget-content ui-corner-all"> </td>
   <td>  <button type="button" id="delete"> Delete </button> </td>
   </tr>
      <tr>
   <td>Picture 2: </td>
   <td> <input type="text" size="50" name="pictureLink2" id="PictureLink2" value="" class="text ui-widget-content ui-corner-all"> </td>
   <td>  <button type="button" id="delete"> Delete </button> </td>
   </tr>
   
      <tr>
   <td>Picture 3: </td>
   <td> <input type="text" size="50" name="pictureLink3" id="PictureLink3" value="" class="text ui-widget-content ui-corner-all"> </td>
   <td>  <button type="button" id="delete"> Delete </button> </td>
   </tr>
   
      <tr>
   <td>Picture 4: </td>
   <td> <input type="text" size="50" name="pictureLink4" id="PictureLink4" value="" class="text ui-widget-content ui-corner-all"> </td>
   <td>  <button type="button" id="delete"> Delete </button> </td>
   </tr>
   
      <tr>
   <td>Picture 5: </td>
   <td> <input type="text" size="50" name="pictureLink5" id="PictureLink5" value="" class="text ui-widget-content ui-corner-all"> </td>
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
   <p class="validateTips">All form fields are required.</p>
  <form method="post" action="DatabasePosts.php" > <!-- MAIN FORM ----------------------------------->
  <fieldset>
	<table>
	<tr>
	<td> <label for="title"> Title: <label> </th>
    <td >
    <input type="text" size="45" name="title" id="edit-customerTitle" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
		<tr>
	<td> <label for="FName"> First Name: <label> </th>
    <td >
    <input type="text" size="45" name="edit-customerFName" id="edit-customerFName" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	
		<tr>
	<td> <label for="LName"> Last Name: <label> </th>
    <td >
    <input type="text" size="45" name="edit-customerLName" id="edit-customerLName" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
		<tr>
	<td> <label for="Email"> Email : <label> </th>
    <td >
    <input type="text" size="45" name="edit-customerEmail" id="edit-customerEmail" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
		<tr>
	<td> <label for="Number"> Phone Number: <label> </th>
    <td >
    <input type="text" size="45" name="edit-customerNumber" id="edit-customerNumber" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
		<tr>
	<td> <label for="AddressL1"> Address Line 1: <label> </th>
    <td >
    <input type="text" size="45" name="edit-customerAddressLine1" id="edit-customerAddressL1" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	<tr>
	<td> <label for="AddressL2"> Address Line 2: <label> </th>
    <td >
    <input type="text" size="45" name="edit-customerAddressLine2" id="edit-customerAddressL2" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	<tr>
	<td> <label for="AddressCity"> Address City/Town: <label> </th>
    <td >
    <input type="text" size="45" name="edit-customerAddressCity" id="edit-customerAddressCity" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
	<tr>
	<td> <label for="AddressPostal"> Address Postal Code: <label> </th>
    <td >
    <input type="text" size="45" name="edit-customerAddressPostal" id="edit-customerAddressPostal" class="text ui-widget-content ui-corner-all">
	</td>
	</tr>
   </table>
  </fieldset>
  
   <input  type="hidden" name="productID" id="edit-customerID" /> 
  
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
   <p class="validateTips">All form fields are required.</p>
  <form method="post" action="DatabasePosts.php" > <!-- MAIN FORM ----------------------------------->
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

function showOrderViewDialog() {

}


function showOrderStatusDialog() {

}


function showCustomerViewDialog() {

}

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
































