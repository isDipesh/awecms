(function(jQuery){
 	jQuery.fn.extend({checkbox: function(options) {
		var defaults = {
			callback:false,//return object and if is checked
			backgroundUrl:false,
		
			prepare:function(obj)
			{
				var id= $(obj).attr('id');
				var checked = $(obj).is(':checked');
				$(obj).wrap('<span id="'+id+'Wrap" style="'+options.style(checked)+'"></span>');
			
				$(obj).click(function(){
					var id = $(this).attr('id')+'Wrap';
					var checked = $(obj).is(':checked');
					$('#'+id).attr('style', options.style(checked));
					if(typeof options.callback == 'function'){
						options.callback(this, $(this).is(':checked'));
					}
				});
			},
		   
			style:function(mode)
			{
				switch(mode)
				{
					case true:
						var background = options.backgroundUrl ? 'background:url('+options.backgroundUrl+') no-repeat scroll 0px -13px;' : 'background:none no-repeat top left #000000; border:1px solid #dddddd;border-radius: 8px 8px 8px 8px;';
						return 'position:relative; float:left; width:13px; height:13px; margin:3px;'+background;
					break;
					case false:
						var background = options.backgroundUrl ? 'background:url('+options.backgroundUrl+') no-repeat scroll 0px 0px;' : 'background:none no-repeat top left #ffffff; border:1px solid #dddddd;border-radius: 8px 8px 8px 8px;';
						return 'position:relative; float:left; width:13px; height:13px; margin:3px;'+background;
					break;
				}
			}
		}

		var options = jQuery.extend(defaults, options);
	
		return this.each(function() {
			var obj = this;
			$(obj).attr('style', 'height:13px; width:13px; filter:alpha(opacity=0.0); opacity:0.0; outline:0');
			options.prepare(obj);
		});
	}
});
})(jQuery);

