$(document).ready(function(){   
		
});
var mySplits = [];
function change_label(){
	myString = $("#valut").val();
	$.ajax({
		type:'POST',
		url:'admin_val.php',
		data: ({myString}),
		success:function(data){
			mySplits = data.split(",");
			$("#pro").val(mySplits[0]);
			$("#poc").val(mySplits[1]);
		}
	});
}