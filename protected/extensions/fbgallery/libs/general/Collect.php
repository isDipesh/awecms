<?php
/**
* @author Ovidiu Pop <matricks@webspider.ro>
* @link http://www.webspider.ro/
* @copyright Copyright &copy; 2011 Ovidiu Pop
* Dual licensed under the MIT and GPL licenses:
* http://www.opensource.org/licenses/mit-license.php
* http://www.gnu.org/licenses/gpl.html
*/
class Collect extends fbgallery
{
	//render collection
	protected function renderCollection()
	{
		//show albums which are included in this collection
		$albumsOfCollection = self::albumsOfCollection();

		//if user is editor or admin, we will show all albums
		//to permit to include in collection
		if($this->levelAccess)
		{
			//get all albums which aren't already in this collection
			$albumsNotInCollection = self::albumsNotInCollection();

			//there are some albums not in collection and some in collection
			if($albumsOfCollection && $albumsNotInCollection)
				$arrAllAlbums = array_merge($albumsOfCollection, $albumsNotInCollection);

			if($albumsOfCollection && !$albumsNotInCollection)
				$arrAllAlbums = $albumsOfCollection;
			
			if(!$albumsOfCollection && $albumsNotInCollection)
				$arrAllAlbums = $albumsNotInCollection;

			if(!$albumsOfCollection && !$albumsNotInCollection)
				$arrAllAlbums = array();

			if($arrAllAlbums)
			{
				$arrItems = array();
				foreach($arrAllAlbums as $item)
					$arrItems[] = $this->render('editor/itemCollection', array('item'=>$item), true);
				$this->render('editor/viewSortableCollection', array('arrItems'=>$arrItems));
			}
			else
				echo $this->tr('noAlbumExists');
		}
		else
			$this->render('_viewCollection', array('items'=>$albumsOfCollection));
	}

	//return an array with all information of every album from collection
	public function albumsOfCollection()
	{
		$albumsOfCollection = array();
		$albums = $this->collection->albums;
		if($albums)
		{
			$pidsAlbums = explode(',', $albums);
				foreach($pidsAlbums as $pid)
					$albumsOfCollection[] = self::getItemCollection($pid);
		}
		return $albumsOfCollection;
	}

	//return an array with all information of every album which isn't in collection, 
	//but will be displayed in collection when we are in editor mode, to permit to be included
	public function albumsNotInCollection()
	{
		$arrNotInCollection = array();
		$arrAlbums = array();
		$user = Yii::app()->user->name;
		$albums = ($this->conf->editorSeeAllAlbums || $this->levelAccess === 2) ? Album::model()->findAll() : Album::model()->findAll(array('condition'=>"author='$user'"));
		if($albums)
		{
			$arrAllAlbums =explode(',', $this->collection->albums);
			foreach($albums as $album)
				if(!in_array($album->pid, $arrAllAlbums))
					$arrNotInCollection[] = $album->pid;
		}

		if(isset($arrNotInCollection[0])!=='')
		{
			$arrAlbums = array();
			foreach($arrNotInCollection as $pid)
				$arrAlbums[] = self::getItemCollection($pid);
		}
		return $arrAlbums;
	}

	//return all information about an album with pid = $pid
	private function getItemCollection($pid)
	{
		$album = Album::model()->find(array('condition'=>"pid='$pid'"));
		//if there are some pictures in album
		if(count(unserialize($album->imgsOrder)))
		{
			$item=array(
				'pid' => $album->pid,
				'name'=> self::getInfo('album', $album->pid, 'name'),
				'description'=> self::getInfo('album', $album->pid, 'description'),
				'url'=>self::getUrlToAlbum($album),
				'cover' => self::getUrlCoverOfAlbum($album),
				'checked' => self::getIsChecked($album),
				'showName'=>true,//will be according with setting in cp
				'showDescription'=>true,//will be according with setting in cp
				'tags' => $album->tags,
				'itemInfoShop'=>$album->itemInfoShop,//for shop
			);
			return $item;
		}
		return;
	}

	//return url of an album, to be used in collection when click on cover to be redirected to album's page
	protected function getUrlToAlbum($album)
	{
		$url = unserialize($album->url);
		$route = $url['controller'].'/'.$url['action'];
		$params = $this->staticPage ? array('view'=>$url['view']):array('id'=>$url['id'], 'title'=>$url['title']);
		return Yii::app()->createAbsoluteUrl($route, $params);
	}

	//return specific information of an album or a collection in active language
	//$from = album or collection
	protected function getInfo($from, $pid, $infoType)
	{
		$model = ($from === 'album') ? Album::model()->find(array('condition'=>"pid='$pid'")) : Collection::model()->find(array('condition'=>"pid='$pid'"));
		$trs = unserialize($model->translations);
		$info = $trs[$infoType][$this->lang->active];
		if(!$info)
			$info = $trs[$infoType][$this->lang->default];
		return $info;
	}

	//return if an album is included or not in a collection true/false
	private function getIsChecked($album)
	{
		return in_array($album->pid, explode(',', $this->collection->albums));
	}

	//return full url to cover of an album to be used in collection
	private function getUrlCoverOfAlbum($album)
	{
		//is set a cover
		if($album->cover)
			$cover = $album->cover;
		else
		{
			//there is not set a cover, try to set first image from album as cover
			$imgs = unserialize($album->imgsOrder);
			if($imgs)
				$cover = $imgs[0];
			else //there is't any imgage in album, we will set our default cover
				return $this->url->asset.'themes/'.$this->conf->cssTheme.'/noAlbumCover.png';
		}
		return  Yii::app()->request->hostInfo.Yii::app()->baseUrl.'/'.$this->conf->gFolder.'/'.$album->pid.'/'.$this->dirs['thumbsDir'].'/'.$cover;
	}

	//return unique, sorted, combined tags of actual collection and albums of this collection
	public function combineAlbumsTagOfCollection()
	{
		$tags = explode(', ', $this->collection->tags);
		$albums = explode(',', $this->collection->albums);
		foreach($albums as $pid)
			$tags=array_merge($tags, array_map('trim', explode(',', Album::model()->find(array('condition'=>"pid='$pid'"))->tags)));
		array_unique($tags);
		sort($tags);
		return implode(', ', $tags);
	}
}

?>