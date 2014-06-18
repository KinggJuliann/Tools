//DATATABLE SCROLL -->
$(document).ready(function() {
    $("#tabs").tabs( {
        "activate": function(event, ui) {
            $( $.fn.dataTable.tables( true ) ).DataTable().columns.adjust();
        }
    } );
     
	 	////PRODUCT DB TABLE
     var table = $("#DBTable").dataTable( {
        "scrollY": "200px",
        "scrollCollapse": true,
        "paging": false,
        "jQueryUI": true
    });
	
	
	$('#DBTable tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
			table.$('.selectedTD').removeClass('selectedTD');
			$('#selectedResult').html("");
        }
        else {
            table.$('tr.selected').removeClass('selected');
			table.$('.selectedTD').removeClass('selectedTD');
            $(this).addClass('selected');
			$('tr.selected>td').addClass('selectedTD');
			
			
			var elements = document.getElementsByClassName("selectedTD");
			var str = "";
			for (var i = 0; i < elements.length; i++) {
			var str = str + "<td>" + elements[i].innerHTML + "</td>";
							}

			$('#selectedResult').html(str);
        }
    } );
	
	//// CUSTOMER DB TABLE
	
	 var tableCustomer = $("#DBTableCustomer").dataTable( {
        "scrollY": "200px",
        "scrollCollapse": true,
        "paging": false,
        "jQueryUI": true
    });
	
		$('#DBTableCustomer tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selectedCustomer') ) {
            $(this).removeClass('selectedCustomer');
			tableCustomer.$('.selectedTDCustomer').removeClass('selectedTDCustomer');
			$('#selectedResultCustomer').html("");
        }
        else {
            tableCustomer.$('tr.selectedCustomer').removeClass('selectedCustomer');
			tableCustomer.$('.selectedTDCustomer').removeClass('selectedTDCustomer');
            $(this).addClass('selectedCustomer');
			$('tr.selectedCustomer>td').addClass('selectedTDCustomer');
			var elements = document.getElementsByClassName("selectedTDCustomer");
			var str = "";
			for (var i = 0; i < elements.length; i++) {
			var str = str + "<td>" + elements[i].innerHTML + "</td>";
							}

			$('#selectedResultCustomer').html(str);
        }
    } );
	
	//// ORDERS DB TABLE
	
		 var tableOrders = $("#DBTableOrders").dataTable( {
        "scrollY": "200px",
        "scrollCollapse": true,
        "paging": false,
        "jQueryUI": true
    });
	
		$('#DBTableOrders tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selectedOrders') ) {
            $(this).removeClass('selectedOrders');
			tableOrders.$('.selectedTDOrders').removeClass('selectedTDOrders');
			$('#selectedResultOrders').html("");
        }
        else {
            tableOrders.$('tr.selectedOrders').removeClass('selectedOrders');
			tableOrders.$('.selectedTDOrders').removeClass('selectedTDOrders');
            $(this).addClass('selectedOrders');
			$('tr.selectedOrders>td').addClass('selectedTDOrders');
			var elements = document.getElementsByClassName("selectedTDOrders");
			var str = "";
			for (var i = 0; i < elements.length; i++) {
			var str = str + "<td>" + elements[i].innerHTML + "</td>";
							}

			$('#selectedResultOrders').html(str);
        }
    } );
	
	//// TABLE BUTTONS

 
    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );
	
	 
    $('#button').click( function () {
        tableCustomer.row('.selectedCustomer').remove().draw( false );
    } );
	
	   $('#button').click( function () {
        tableOrders.row('.selectedOrders').remove().draw( false );
    } );
        
        
	
} );
  
  
  
  ////////////////////////////////////////////// DIALOG FUNCTIONS! ////////////
  ////////////////////PRODUCT DIALOGS//////////////
  //  CLOSE DIALOG FUNCTION
  $(document).ready(function(){
    $('#cancel').click(function(){
        $(this).closest('.ui-dialog-content').dialog('close'); 
    });

});


// NEW PRODUCT DIALOG
  function showDialog()
{
    $("#dialog-modal").dialog(
    {
        width: 900,
        height: 600,
        open: function(event, ui)
        {
            var textarea = $('<textarea style="height: 300px;">');
            $(textarea).redactor({
                focus: true,
                autoresize: false,
                initCallback: function()
                {
                    this.set('<p>Lorem...</p>');
                }
            });
        }
     });
}

// DELETE PRODUCT DIALOG
  function showConfirmationDialog()
{
if (document.getElementsByClassName("selectedTD").length > 2)
{
    $("#dialog-modal-confirm").dialog(
    {
        width: 900,
        height: 250,
        open: function(event, ui)
        {			
			var elements = document.getElementsByClassName("selectedTD");
			var str = elements[1].firstChild.data;
			var productID = elements[0].firstChild.data;
			$("#productID").val(productID);
			$('#deleteConfirmationP').html(str);	
            
        }
     });
	 } else {
	 alert('You have not selected a product! Click a product on the table first!');
	 }
}

// EDIT PRODUCT DIALOG 

  function showEditDialog()
{
if (document.getElementsByClassName("selectedTD").length > 2)
{
    $("#dialog-modal-edit").dialog(
    {
        width: 900,
        height: 600, 
        open: function(event, ui)
        {		
			var elements = document.getElementsByClassName("selectedTD");
			var price = elements[5].firstChild.data.toString();
			var temp = price.replace(/£/g,'');
					$("#edit-productID").val(elements[0].firstChild.data);
           			$("#edit-productName").val(elements[1].firstChild.data);
					$("#edit-productManufacturer").val(elements[2].firstChild.data);
					$("#edit-productDesc").val(elements[3].firstChild.data);
					var categoryID = elements[4].firstChild.data.replace ( /[^\d.]/g, '' );
					var selectBox = document.getElementById('selectCategory');
					selectBox.value = categoryID;
					$("#edit-productPrice").val(temp);
					$("#edit-productSpec").val(elements[6].firstChild.data);
        }
     });
	 } else {
	 alert('You have not selected a product! Click a product on the table first!');
	 }
}

// ADD REMOVE IMAGES DIALOG

  function showPicturesDialog()
{
if (document.getElementsByClassName("selectedTD").length > 2)
{
    $("#dialog-modal-pictures").dialog(
    {
        width: 700,
        height: 400,
        open: function(event, ui)
        {        

			var elements = document.getElementsByClassName("selectedTD");
			var pID = elements[0].firstChild.data.toString(); //SELECTED PRODUCT's ID
			var productID = document.getElementsById('productID-'+pID); //ID FOR TD of PRODUCT ID FOR LOOP
			var productIDLinks = document.getElementsById('productID-'+pID+'-link'); //ARRAY OF TD LINKS WITH productID-id-link as id
			
			$("#pictureLink1").val(productIDLinks[0].firstChild.data);	
			$("#pictureLink2").val(productIDLinks[1].firstChild.data);
			$("#pictureLink3").val(productIDLinks[2].firstChild.data);
			$("#pictureLink4").val(productIDLinks[3].firstChild.data);
			$("#pictureLink5").val(productIDLinks[4].firstChild.data);   		
			
        }
     });
	 } else {
	 alert('You have not selected a product! Click a product on the table first!');
	 }
	 
}

////////////////////////////// CUSTOMER DIALOGS ///////////////////////////////////

////EDIT CUSTOMER DIALOG
  function showEditDialogCustomer()
{
if (document.getElementsByClassName("selectedTDCustomer").length > 2)
{
    $("#dialog-modal-edit-customer").dialog(
    {
        width: 900,
        height: 500, 
        open: function(event, ui)
        {		
			var elements = document.getElementsByClassName("selectedTDCustomer");
			var price = elements[5].firstChild.data.toString();
			var temp = price.replace(/£/g,'');
					$("#edit-customerTitle").val(elements[1].firstChild.data);
           			$("#edit-customerFName").val(elements[2].firstChild.data);
					$("#edit-customerLName").val(elements[3].firstChild.data);
					$("#edit-customerEmail").val(elements[4].firstChild.data);
					$("#edit-customerNumber").val(elements[5].firstChild.data);
					var address = elements[6].firstChild.data;
					var addressArray = address.split("|");
					$("#edit-customerAddressL1").val(addressArray[0]);
					$("#edit-customerAddressL2").val(addressArray[1]);
					$("#edit-customerAddressCity").val(addressArray[2]);
					$("#edit-customerAddressPostal").val(addressArray[3]);
        }
     });
	 } else {
	 alert('You have not selected a customer! Click a customer on the table first!');
	 }
}


// DELETE CUSTOMER DIALOG
  function showConfirmationDialogCustomer()
{
if (document.getElementsByClassName("selectedTDCustomer").length > 2)
{
    $("#dialog-modal-confirm-customer").dialog(
    {
        width: 900,
        height: 250,
        open: function(event, ui)
        {			
			var elements = document.getElementsByClassName("selectedTDCustomer");
			var str = elements[2].firstChild.data+" "+elements[3].firstChild.data;
			var customerID = elements[0].firstChild.data;
			$("#customerID").val(customerID);
			$('#deleteConfirmationCustomer').html(str);	
            
        }
     });
	 } else {
	 alert('You have not selected a Customer! Click a Customer on the table first!');
	 }
}

//// EMAIL CUSTOMER DIALOG

  function showEmailDialog()
{
if (document.getElementsByClassName("selectedTDCustomer").length > 2)
{
    $("#dialog-modal-email-customer").dialog(
    {
        width: 900,
        height: 500,
        open: function(event, ui)
        {			
			var elements = document.getElementsByClassName("selectedTDCustomer");
			var customerEmail = elements[4].firstChild.data;
			var customerName = elements[2].firstChild.data+" "+elements[3].firstChild.data;
			$("#email-customerID").text(customerEmail);
           $("#email-label-customerName").text(customerName);
        }
     });
	 } else {
	 alert('You have not selected a Customer! Click a Customer on the table first!');
	 }
}

///////////////////////////// ORDERS DIALOGS //////////////////////////////////////////////







































