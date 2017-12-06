
function verifyContact(){
	$number = $(".number").val();
	$name = $('.name').val();
	$mail = $('.mail').val();

	if($mail, $name, $number <= 1){
		alert("Please insert some data into the field!");
		return false;
	}
}


$(document).ready(function(){

	//Verification for adding user
	$(".add_job").click(function(){
		if(verifyContact() == false) return false
	});

});
