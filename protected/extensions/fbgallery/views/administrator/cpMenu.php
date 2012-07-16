	<div class="fbCPanelLeftColumn clearfix">

		<div class="fbCategories clearfix">
			<div class="toggleNext"><?php echo $this->tr('gallery');?></div>
			<div class="categoryList categoryListOpen">
				<div id="toggleGalleryAspect" class="toggleSetting"><?php echo $this->tr('cpAppearance');?></div>
				<div id="toggleShop" class="toggleSetting"><?php echo $this->tr('cpShop');?></div>
				<div id="toggleGalleryImageResize" class="toggleSetting"><?php echo $this->tr('cpImageResize');?></div>
				<div id="toggleGalleryStructure" class="toggleSetting"><?php echo $this->tr('cpStructure');?></div>
				<div id="toggleGalleryOptions" class="toggleSetting"><?php echo $this->tr('cpOptions');?></div>
				<div id="toggleGalleryLanguages" class="toggleSetting"><?php echo $this->tr('cpLanguages');?></div>
<!--				<div id="toggleGalleryAlbum" class="toggleSetting"><?php echo $this->tr('cpAlbum');?></div>-->
			</div>

			<div class="toggleNext"><?php echo $this->tr('album');?></div>
			<div class="categoryList">
				<div id="toggleAlbumAspect" class="toggleSetting"><?php echo $this->tr('cpAppearance');?></div>
			</div>

			<div class="toggleNext"><?php echo $this->tr('collection');?></div>
			<div class="categoryList">
				<div id="toggleCollectionAspect" class="toggleSetting"><?php echo $this->tr('cpAppearance');?></div>
			</div>

			<div class="toggleNext"><?php echo $this->tr('fancybox');?></div>
			<div class="categoryList">
				<div id="toggleFancyBoxOptions" class="toggleSetting"><?php echo $this->tr('cpOptions');?></div>
			</div>

			<div class="toggleNext"><?php echo $this->tr('uploader');?></div>
			<div class="categoryList">
				<div id="toggleUploaderOptions" class="toggleSetting"><?php echo $this->tr('cpOptions');?></div>
			</div>

			<div class="separatorCPMenu"></div>

			<div class="toggleNext"><?php echo $this->tr('loadDefaultFor');?></div>
			<div class="categoryList">
				<div class="loadDefaultFB" data-setting="Gallery"><?php echo $this->tr('gallery');?></div>
				<div class="loadDefaultFB" data-setting="Album"><?php echo $this->tr('album');?></div>
				<div class="loadDefaultFB" data-setting="Collection"><?php echo $this->tr('collection');?></div>
				<div class="loadDefaultFB" data-setting="FancyBox"><?php echo $this->tr('fancybox');?></div>
				<div class="loadDefaultFB" data-setting="Uploader"><?php echo $this->tr('uploader');?></div>
				<div class="loadDefaultFB" data-setting="All"><?php echo $this->tr('all');?></div>
			</div>
		</div>

		<div class="infoMandatory"><?php echo $this->tr('mandatoryFields');?></div>
	</div>
