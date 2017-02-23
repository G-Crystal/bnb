if ( $.localStorage() && localStorage.getItem('ls_once') == null ) {

	// set dashboard access data
	$.ajax({
		url: 'localstorage_ctrl/get_access',
		type: 'POST',
		dataType: 'json',
		success: function(res){
			if( res != 'false' && typeof res === 'object' ){
				localStorage.setItem('dashboard_access',JSON.stringify(res));
			}
		}
	});


	// enable localstorage to only fire once at every session.
	localStorage.setItem('ls_once',1);
}