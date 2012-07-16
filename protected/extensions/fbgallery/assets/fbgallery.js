function startGallery(theme){
	setPositionCPEditor();
	displayToolsOnThumbnail();
	setCheckboxes(theme);
	setAvailUploads();
	newAlbum();
	removeAlbumOrCollection();
	setCover();
	toggleDescriptionOnShopCollection();
	limitTagsInput();

	$('.hide').removeClass('hide');
	$('.fbttip').bttooltip({design : 'fbtooltip', hide:false});
	$('.cpanelToggle').hover(function(){ $('.cpanelFB').show(); },function(){ $('.cpanelFB').hide();});
	$('.cpanelFB').hover(function(){ $('.cpanelFB').show(); },function(){ $('.cpanelFB').hide(); });
	$('#loadFile').click(function(){ $('.fbguploader').show(); $('#dialogUploader').dialog('open');});
}

function limitTagsInput(){
	$('.newAlbumTags').keyup(function(){
		var max = 256;
		var avail = max-$(this).val().length;
		$('.leftCharsTag').html(avail);
		if(avail < 0)
		{	$(this).val( $(this).val().substr(0, max) );
			return false;
		}
	});
	
}

function toggleDescriptionOnShopCollection(){
	$('.shopCollection').click(function(){
		$('.descriptionNewAlbum').each(function(){
			var info = $(this).data('info');
			info ? $(this).data('info', '').val(info) : $(this).data('info', $(this).val()).val('');
		});
	});
}

function setPositionCPEditor(){
	if($.cookie('topCP') && $.cookie('leftCP')){
		var top = $.cookie('topCP') > 250 ? 250 : $.cookie('topCP'),
		    left = $.cookie('leftCP') > 150 ? 150 : $.cookie('leftCP');

		$('#containerCPFB').css({
			'position':'fixed', 
			'top' : top + 'px', 
			'left': left + 'px'
		}); 
	}

	$('#containerCPFB').bind( "dragstop", function(event, ui) {
		$.cookie('topCP', ui.offset.top); 
		$.cookie('leftCP', ui.offset.left);
	}); 
}

function setCheckboxes(theme){
	$('.checked_img').checkbox({
		callback:markForRemove, 
		backgroundUrl:theme+"checkbox.gif"
	});
	$('.populateCollection').checkbox({
		callback:addToCollection, 
		backgroundUrl:theme+"checkbox.gif"
	});
	$('.isCollection').checkbox({
		backgroundUrl:theme+"checkbox.gif"
	});
	
}

function displayToolsOnThumbnail(){
	$('div[class^="imageItem"]').hover( function(){
		var fbitem_tools = $(this).prev();
		$('.fbitem_tools').hide();
		fbitem_tools.css('display', 'block'); 
		fbitem_tools.hover( function(){ 
			$(this).show();
		}, 
		function(){ 
			if($(this).find('.jneditor'))
				return false;
			else
				$(this).hide();
		} ); 
	}, 
	function(){ 
		if($(this).find('.jneditor').length) return false;
		else $(this).prev().hide(); 
	});
	
	$('div[class^="itemCollection"]').hover(
		function(){$(this).find('.selectorAlbum').show();},
		function(){$(this).find('.selectorAlbum').hide();}
	);
}

function addToCollection(thid, checked){
	checked ? $(thid).closest('div[class^="itemCollection"]').removeClass('notInCollection'):$(thid).closest('div[class^="itemCollection"]').addClass('notInCollection');

	var forCollection = $('div[class^="itemCollection"]').not('.notInCollection'),
	    pids = [];
	
	$(forCollection).each(function(){
		pids.push($(this).data('pid'));
	});
	$.ajax({ type: 'POST', 
		url: location.href,
		data: 'function=newAlbumsOrder&order='+pids.join(',')
	});
}

function removeAlbumOrCollection(){
	$('#removeCollection, #removeAlbum').click(function(){
		$('#dialogRemoveAlbumOrCollection').dialog('open');
	});
}

function newAlbum(){
	$('#createAlbum').click(function(){
		$('#dialogNewAlbum').dialog('open');
	});
}

function setCover(){
	$('.coverIcon').click(function(){
		$('.coverSelected').removeClass('coverSelected ');
		$(this).addClass('coverSelected ');

		$.ajax({ 
			type: 'POST', 
			url: location.href,
			data: 'function=setAlbumCover&cover='+$(this).next().data("file"),
		});
	});
}

function editThumbnailInfo(lang){
	$('.inform').bteditinplace({
		'doajax':true,
		'mod_debug':false,
		'ajax_page' : location.href,
		'doubleclick':false,
		'useTag':'data-info',
		'data_to_post':'data-pid',//to be used as first argument
		'reload':'',
		'language': lang,
		'callback':putPageInfo,
		'ajax_function':'function=updatePageInfo&arg1=xxxxxx&arg2=yyyyyy',
		'wysiwyg':{
			controls:"bold italic underline strikethrough | font size | removeformat | undo redo | link unlink | cut copy paste pastetext | print source",
			width:420, 
			height:100, 
			useCSS:false
		},
	});
	$('.edonplace').bteditinplace({
		'doajax':true,
		'ajax_page' : location.href,
		'doubleclick':false,
		'useTag':'data-info',
		'data_to_post':'data-file',
		'reload':'',
		'language': lang,
		'callback':putInfo,
		'ajax_function':'function=updatePictureInfo&arg1=xxxxxx&arg2=yyyyyy',
	});
	$('.tagsEdit').bteditinplace({
		'doajax':true,
		'ajax_page' : location.href,
		'doubleclick':false,
		'useTag':'data-info',
		'data_to_post':'data-file',
		'reload':'',
		'language': lang,
		'callback':putPageInfo,
		'ajax_function':'function=updateTagsInfo&arg1=xxxxxx&arg2=yyyyyy',
	});
}

function putPageInfo(thid, new_val){
	$(thid).html(new_val);
	$(thid).data('file', new_val);
}

function putInfo(thid, new_val){
	$(thid).parent().parent().find('a').attr('title', new_val)
					.attr('data-title', new_val)
			.end().find('img').attr('alt', new_val)
			.end().find('.infoItem').html(new_val)
			.end().find('.gThTitle').html(new_val);
}

function markForRemove(thid, checked){
	var item = $(thid).closest('.fbitem_tools').next(),
    	    img = $(item).find('img'),
    	    w = $(item).width(),
    	    h = $(item).height();
 
	if(checked){
		img.hide().after('<div class="marker"></div>');
		$(img.next()).css({'width': w, 'height': h, 'background':'#aaa'});
	}else
		img.next().remove().end().show();
}

function removeImages(titleDialogRemove, oneimage, moreimages, allimages, okButton, cancelButton, url){
	$('#deleteChecked, #clearGallery, .deleteIcon').click(function(){

		var titles = [];
		
		if($(this).attr('id') == 'deleteChecked')
			var deletable = $('.checked_img:checked');
		if($(this).attr('id') == 'clearGallery')
			var deletable = $('.checked_img');
		if($(this).hasClass('deleteIcon'))
			var deletable = $(this).prev().find('.checked_img');

		if(deletable.length > 0){
			$(deletable).each(function(){
				titles.push('<li>'+$(this).closest('.fbitem_tools').find('.editIcon').attr('data-info')+'</li>');
			});

			if($(this).attr('id') == 'clearGallery')
				dialogMessage = allimages;
			else
				dialogMessage = (deletable.length == 1) ? 
					oneimage.replace('xxxxx', '<ul>'+titles.join('')+'</ul>'):
					moreimages.replace('xxxxx', '<ul>'+titles.join('')+'</ul>');
			
			$('.msg').html(dialogMessage);
			
			var buttons = {};
			buttons[okButton] = function() {
				var files = [];
				$(deletable).each(function(){
					$(this).closest('li').remove();
					files.push($(this).data('filename'));
				});
				$.ajax({ type: 'POST', 
					url: url, 
					data: 'function=deleteImage&gImg='+files,
				});
				
				$(this).dialog('close');

				$('#sortable_container').sortable('refresh');
				
				//if isShop and cover is deleted, remove it
				var cover = $('.imageItemCover').find('.editIcon').attr('data-info');
				if(jQuery.inArray(cover, titles))
					$('.imageItemCover').remove();
				
				//set maximum files available to be uploaded
				setAvailUploads();
			};

			buttons[cancelButton] = function() {
				$(this).dialog('close');
			};

			$('#dialogDeleteConfirmation').dialog({
				buttons: buttons,
				width:400,
				title: titleDialogRemove,
			}).dialog('open');
		return false;
		}
	});
}

function setAvailUploads(queued){
	
	//maximum files permitted to be in gallery
	//count existing items from gallery page 
	//count how man files may be uploader until reach the maximum 
	var avail = parseInt($.cookie('maxUploadable'))-parseInt($('div[class^="imageItem"]').length);

	//if is set a number of queued files, decrease them from avail
	if(queued !== undefined)
		avail -= parseInt(queued);
	
	//if avail is less than 0, set to be equal to 0 
	avail  = avail < 0 ? 0 : avail;
	//show/hide add button of uploader
	avail > 0 ? $('#uploader_browse').show() : $('#uploader_browse').hide();
	//update field with avail files
	$('.moreFiles').html(avail);
}


function putUploader(base, max_file_size, unique_names, extensions, runtimes) {
	$("#uploader").pluploadQueue({
		runtimes : runtimes,
		url:location.href,
		max_file_size : max_file_size+'mb',
		unique_names : unique_names != 0,
		filters : [
			{title : "Image files", extensions : extensions},
// 			{title : "Zip files", extensions : "zip"}
		],
		chunk_size : '1mb',//used to send big images, will chunk original picture in pieces by 1M
		browse_button: 'uploader_browse',
		flash_swf_url : base+'/plupload/plupload.flash.swf',
		silverlight_xap_url : base+'/plupload/plupload.silverlight.xap',

		preinit: (function(Uploader){
			
			//if there is 0 avail, start uploader without add button
			Uploader.bind('PostInit', function(Up) {
				setAvailUploads();
			}),
			
			//reload client page when all files are uploaded
			Uploader.bind('FileUploaded', function(Up, File, Response) {
				if( (Uploader.total.uploaded + 1) == Uploader.files.length)
					window.location.reload();
			}),

			//if there is 0 avail, start uploader without add button
			Uploader.bind('FilesAdded', function(up, files){
				Uploader.bind('QueueChanged', function(up){
					//count existing items from gallery page
					var existsItems = $('.imageItem').length;
					var maxInList = $.cookie('maxUploadable') - existsItems;
					
					if(($.cookie('maxUploadable') - existsItems - files.length) < 0){
						//simulate click to remove excess files
						plupload.each(files, function(file, i){
							if(i >= maxInList) 
								$('.plupload_delete').eq(i).find('a').click();
						});
					}
					//update info about avail files (and show/hide the add button)
					setAvailUploads(Uploader.files.length);
				});
			});
		}),
	});
}



