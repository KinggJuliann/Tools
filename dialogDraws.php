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

?>
































