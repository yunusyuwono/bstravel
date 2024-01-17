function profile_update(){
	var fep=$('#fep').serialize();
	$.ajax({
		url 	: 'fx.php?profile_update',
		method : 'POST',
		data : fep,
		success : function(data){
			console.log(data);
		}
	})
}