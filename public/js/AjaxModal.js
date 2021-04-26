function AjaxModal()
{
	this.execute = function(route, method, params, fn, title)
	{
		$.ajax
		({	        
            url: route,
            method: method, 
            data: params,
            
            beforeSend: function(jqXHR, settings)
            {
            	$('#modalContent').html('<div class="text-center"><i class="fa fa-spinner"></i></div>');
            	$('#modalTitle').html(title);
            },
        
            error: function(jqXHR, textStatus, errorThrown)
            {
            	$('#modalContent').html('');
            	console.log(errorThrown);
            },
            
            success: function(data)
            {
                //console.log(data);
            	$('#modalContent').html(data);
            	
            	if(typeof fn == 'function')
	        	{
		        	fn();
	        	}            	
            }
        });
	}
}