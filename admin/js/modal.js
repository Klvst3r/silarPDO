$(document).ready(function(){
	$(document).on('click', '.detail', function(){

		var id = $(this).val();

		var ID = $('#ID'+id).text();
		var nombre = $('#Nombre'+id).text();
		

		
		$('#detalle').modal('show');

		$('#eid').val(ID);
		$('#enombre').val(nombre);
		

	});
});




