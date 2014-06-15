//DATATABLE SCROLL -->
$(document).ready(function() {
    $("#tabs").tabs( {
        "activate": function(event, ui) {
            $( $.fn.dataTable.tables( true ) ).DataTable().columns.adjust();
        }
    } );
     
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
 
    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );
        
	
} );
  
  
  
  // DIALOG FUNCTIONS! ////////////
  
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
    $("#dialog-modal-edit").dialog(
    {
        width: 900,
        height: 600,
        open: function(event, ui)
        {
           			$("#edit-productName").val(productID);
        }
     });
}

// ADD REMOVE IMAGES DIALOG

  function showImageDialog()
{
    $("#dialog-modal-image").dialog(
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









































