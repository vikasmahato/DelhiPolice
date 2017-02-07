$(document).on('focus','.search_js',function(){
	type = $(this).data('type');
	
	$(this).autocomplete({
		source: function( request, response ) {
			$.ajax({
				url : 'search.php',
				dataType: "json",
				method: 'post',
				data: {
				   name_startsWith: request.term,
				   type: type
				},
				 success: function( data ) {
					 response( $.map( data, function( item ) {
					 	var code = item.split("|");
						return {
							label: code[autoTypeNo],
							value: code[autoTypeNo],
							data : item
						}
					}));
				}
			});
		},
		autoFocus: true,	      	
		minLength: 0,
		select: function( event, ui ) {
			//ajax request to fecth the entered diary no and show details
            
            
		}		      	
	});
});