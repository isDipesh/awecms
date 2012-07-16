/* jQuery jnplace 1.6
 * http://www.webspider.ro/jquery-plugins/jquery.jnplace/
 *
 * Copyright (c) 2010 Ovidiu Pop
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 *
 *	Suggestion!
 *	To update in DB, set id of element this way:
 *	<div id="tablename-tablecolumn-id" class="some-class-as-identifier">Some text</div>
 *
 *	On your server-side function do:
 *
 *	$parts = explode('-', $_POST['arg1']);
 *	$mytable = $parts[0];
 *	$myfield = $parts[1];
 *	$myid = $parts[2];
 *	$newValue = fiter_against_xss($_POST['arg2']);
 *
 *	To convert your div into a textarea, selector must have a class named area
 *	ex: <div id="tablename-tablecolumn-id" class="some-class-as-identifier area">Some text</div>
 * 
 *	'data_to_post':'data-file', //its attr will be used as first argument $(this).attr('data-file')
 * 
 * 
 * To reload page after update, set as result on succes to return same string as 'reload' option.
 * If you wish to avoid reload, set reload option to null string - ''.
 */


(function (jQuery) {
	jQuery.fn.extend({bteditinplace: function(options) {
		var defaults = {
			originalText:'../editor/textOriginal',
			ajax_page : 'functions.php',
			ajax_function:'function=myfunction&arg1=xxxxxx&arg2=yyyyyy',
			doubleclick:true,
			doajax:false,
			mod_debug:false,
			with_tooltip:false,
			reload:'reload',
		  	language:false,
		        useTag:false,
			data_to_post:false,//its attr will be used as first argument for post
			callback:false,//return object and new value as arguments
			wysiwyg:{
				width:300, 
				height:180
			},
		  
	 
			textfieldeditor:function(obj){
				var actual = options.useTag ? jQuery.trim(obj.attr(options.useTag)) : jQuery.trim(obj.html());
				var actualID = obj.attr("id");
				var newBox = '<input type="text" class="editor_rename" value="'+actual+'" />';
				obj.hide().after(newBox);
				jQuery('.editor_rename').focus();
				jQuery('.editor_rename').blur(function(){
					jQuery(this).remove();
					obj.show();
				})

				jQuery('.editor_rename').bind("keyup", function(event){
					if(event.keyCode == 27){//escape
						jQuery(this).remove();
						obj.show();
					}
					
					if(event.keyCode == 13){//enter
						var new_val = jQuery(this).val();
						jQuery(this).remove();
						
						if(options.useTag)
							obj.show().attr(options.useTag, new_val);
						else
							obj.html(new_val).show();
						
						options.saveme(actualID, new_val, obj);
					}
				})
			 },
		  
			textareaeditor:function(obj)
			{
				//if there is an opened editor, close it before create a the new one
				if(jQuery('#bteditinplace').length) options.removeEditor();

				var actualID = obj.attr("id");
				var isWysiwyg = obj.hasClass('wysiwyg');
				
				if(options.useTag){
					var original = jQuery.trim(obj.attr(options.useTag));
				}else{
					//this is possible not to work, because original is get throw jQuery.get and next code need to be included between {} of function
					jQuery.get(options.originalText, 'id='+actualID, function(result){var original = result;});
				}

				var language = options.language ? '<div class="jnlanguage">'+options.language+'</div>':'';

				var newBox = '<div id="bteditinplace" class="bteditinplace">'+language+'<br /><textarea id="new_'+actualID+'" class="editor_rename">'+original+'</textarea>';
				newBox += '<br /><input type="button" class="editor_rename_cancel" value="Cancel">';
				newBox += '<input type="button" class="editor_rename_save" value="Save"></div>';
				obj.hide().after(newBox);

				var editor = jQuery('#bteditinplace').find('textarea');
				var cancelButton = jQuery('#bteditinplace').find('input:button').eq(0);
				var saveButton = jQuery('#bteditinplace').find('input:button').eq(1);

				editor.focus();
				
				if(isWysiwyg)
				{
					editor.cleditor(options.wysiwyg)[0].focus();
				}
				editor.bind("keyup", function(event){
					if(event.keyCode == 27) 
						options.removeEditor();
				});
				
				cancelButton.click(function(){
					options.removeEditor();
				});
				
				saveButton.click(function(){
					var new_val = editor.val();
					options.removeEditor();
					options.useTag ? obj.attr(options.useTag, new_val) : obj.html(new_val);
					options.saveme(actualID, new_val, obj);
				});
			},
		
			removeEditor:function(){
				jQuery('#bteditinplace').prev().show().end().remove();
				jQuery('.fbitem_tools').hide();
			},
		   
			combo:function(obj)
			{
				var actualID = obj.attr("id");
				var new_val = obj.val();
				options.saveme(actualID, new_val);
			},
			 
			checkbox:function(obj)
			{
				var actualID = obj.attr("id");
				var new_val = obj.is(':checked') ? '1' : '0';
				options.saveme(actualID, new_val);
			},

			saveme:function(actualID, new_val, obj)
			{
				if(options.callback)
					options.callback(obj, new_val);

				if(options.doajax)
				{
					if(options.data_to_post)
						actualID = obj.attr(options.data_to_post);
					
					var myfunction = options.ajax_function.replace("xxxxxx", actualID).replace("yyyyyy", new_val);
					$.post(options.ajax_page, myfunction, function(rez){
						if(options.reload != '' && options.reload === rez)
							window.location.href=window.location.href;
						else
							if(options.mod_debug) alert(rez);
					});
				}
				else
					if(options.mod_debug) alert("id="+actualID+"\nvalue="+new_val);
			},
			 
			 puttooltip:function(obj)
			 {
				if(options.doubleclick)
					var myNewTitle = 'Double click to edit!';
				else
					var myNewTitle = 'Click to edit!';
				
				if(obj.attr('title') == '') 
					obj.attr('title', myNewTitle);
					obj.addClass('ttip');
			}
		}

		var options =  $.extend(defaults, options);
    		return this.each(function() {

			if(this.type == 'select-one')
			{
				jQuery(this).bind('keyup, change', function ()
				{
					options.combo(jQuery(this));
				});
			}
			else if(this.type == 'checkbox' || this.type == 'radio' )
			{
				jQuery(this).bind('keyup, click', function ()
				{
					options.checkbox(jQuery(this));
				});
			}
			else
			{
				if(options.with_tooltip) options.puttooltip(jQuery(this));

				var event = options.doubleclick ? "dblclick" : "click" 

				jQuery(this).bind(event, function()
				{
					if(jQuery(this).hasClass('area'))
						options.textareaeditor(jQuery(this));
					else
						options.textfieldeditor(jQuery(this));
					
				});
			}
		});
	}
});
})(jQuery);