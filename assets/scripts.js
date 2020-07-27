$(function() {
    // Side Bar Toggle
    $('.hide-sidebar').click(function() {
	  $('#sidebar').hide('fast', function() {
	  	$('#content').removeClass('span9');
	  	$('#content').addClass('span12');
	  	$('.hide-sidebar').hide();
	  	$('.show-sidebar').show();
	  });
	});

	$('.show-sidebar').click(function() {
		$('#content').removeClass('span12');
	   	$('#content').addClass('span9');
	   	$('.show-sidebar').hide();
	   	$('.hide-sidebar').show();
	  	$('#sidebar').show('fast');
	});
});

// Add Record
function addRecord() {
    // get values
    //var first_name = $("#first_name").val();
    //var last_name = $("#last_name").val();
    //var email = $("#email").val();

	var $item = $("#itemDesc").val();
	var $year = $("#Year").val();
	var $PR = $("#PR").val();
	var $UOM = $("#UOM").val();
	var $STQty = $("#STQty").val();
	var $PriceCat = $("#PriceCat").val();
	var $TAmt = $("#TAmt").val();
	
    // Add record
    $.post("admin/ajax/addRecord.php", {
        //first_name: first_name,
        //last_name: last_name,
        //email: email
		itemDesc:itemDesc,
		Year:Year,
		PR:PR,
		UOM: UOM,
		STQty:STQty,
		PriceCat:PriceCat,
		TAmt:TAmt
    }, function (data, status) {
        // close the popup
        $("#additems").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#itemDesc").val();
        $("#Year").val();
        $("#PR").val();
		$("#UOM").val();
		$("#STQty").val();
		$("#PriceCat").val();
		$("#TAmt").val();
    });
}

// READ records
function readRecords() {
    $.get("admin/ajax/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}