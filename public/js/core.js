$(document).ready(function(){
	// CONFIRM DIALOG BEFORE DELETING
	$(document).on('click','.confirm',function(e) {
		var result=confirm("¿Estás seguro que deseas eliminar el registro?");
		if (!result)
			e.preventDefault();
	});
});