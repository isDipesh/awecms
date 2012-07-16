function setThumbsWidht(thumbWidth, style, raport){
// 	$('.waitForGallery').show();
	var tW = parseInt(thumbWidth);

	var thumb=$('.gTh, .itemCollection');
	var title = $('.gThTitle');
	var info = $('.infoItem');
	var item = $('.imageItem');
	var image = $('.imageItem .gImg > img, .redirector > img');
	
	var paddingsItem = getPadding(item);
	var itemWidth = tW-getOuterWidth(item);
	var imageWidth = itemWidth-paddingsItem;
	
	thumb.width(tW);
	title.width((tW-getBorder(title))+'px');
	item.width(itemWidth + 'px');
	info.width(tW-getOuterWidth(info) + 'px');

	switch(style) {
		case 'square':
			var itemHeight = itemWidth;
			var imageHeight = imageWidth;
		break;
		case 'landscape':
			var itemHeight = itemWidth*raport;
			var imageHeight = imageWidth*raport;
		break;
		case 'portrait':
			var itemHeight = itemWidth/raport;
			var imageHeight = imageWidth/raport;
		break;
	}

	item.height(itemHeight);
	image.each(function(i,n){
		var img = $(n);
		$("<img/>").attr("src", $(img).attr("src")).load(function() {
			var wImg = this.width;
			var hImg = this.height;
			wImg < imageWidth ? $(n).width(wImg).css('margin-left',(itemWidth+paddingsItem)/2 -(wImg)/2+'px'):$(n).width(imageWidth).css({'marginLeft':paddingsItem/2, 'marginRight':paddingsItem/2});
			hImg < imageHeight ? $(n).height(hImg).css('margin-top',(itemHeight+paddingsItem)/2 - (hImg)/2 +'px') : $(n).height(imageHeight);
		});
	});

	$(window).load(
		function() {
			$('.waitForGallery').hide();
			$('.gTh').show();
			$('.gcontainer').show();
		}
	);
}

function getPadding(el){
	return parseInt(el.css("padding-left"), 10) + parseInt(el.css("padding-right"), 10);
}
function getBorder(el){
	return parseInt(el.css("borderLeftWidth"), 10) + parseInt(el.css("borderRightWidth"), 10);
}
function getMargin(el){
	return parseInt(el.css("margin-left"), 10) + parseInt(el.css("margin-right"), 10); 
}

function getOuterWidth(el){
	return getPadding(el)+getBorder(el)+getMargin(el);
}

