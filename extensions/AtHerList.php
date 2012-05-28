<?php
class AtHerList extends CWidget
{
	public $model;
	public $actid=2;
	public $id = "at-her-list-1";
	public $css = true;
//	public $titleRow = "title";
    public function init()
    {
	    if($this->css){
	        $css = "
	        #".$this->id.", #".$this->id." ol{
				margin: 0 0 0 25px;
				padding: 0;
				list-style-type: none;    	
	        }
	        #".$this->id." {
				margin: 0;        	
	        }
	        #".$this->id." li{
				/*list-style-type: none;*/
				margin-right:0;
				margin-top:2px
	        }
	        #".$this->id." .item-wraper{
	       		background-color:#F5F5F5;
	       		border:1px solid #DDDDDD;
	       		padding:5px;
	       		margin-bottom:0px;
	        }
	        #".$this->id." .sp{
	        	padding-left:15px;
	        	padding-right:5px;
				width:50px;
				background-repeat:no-repeat;
				background-position:0 1px;
	        }
	        #".$this->id." .item-wraper:hover span.sp{
				background-position:0 -19px;
			}
			#".$this->id." .item-wraper:hover{
				background-color:#c6c6ff;
				cursor:move;
			}
			#".$this->id." .item-wraper.active{
				background-color:#DDDDDD;
			}
			#".$this->id." .item-wraper:hover.active{
				background-color:#c6c6ff;
			}
			#".$this->id." .right{
				float:right;
				width:60px;
				text-align:center;
				border-left:2px solid #FFFFFF;
				
			}
			.placeholder {
				background-color: #cfcfcf;
			}
	        ";
			
    		Yii::app()->clientScript->registerCss('AtHerList',$css);
    	}
    }
    
    public function run()
    {
    	echo '<div class="header-wraper" style="height:20px">';
    	echo '<span style="padding-left:40px"></span><b>Title</b>';
    	echo '<div style="float:right;width:130px;text-align:center;"><b><= Actions =></b></div>';
    	echo '<div style="float:right;width:60px;text-align:center;"><b>Colapsed</b></div>';
    	echo '<div style="float:right;width:60px;text-align:center;"><b>Active</b></div>';
    	echo "</div>";
    	echo '<ol id="'.$this->id.'" class="sortable ui-sortable">';
	    foreach($this->model As $row):
    		if($row->level==0){
    			echo '<li id="list_'.$row->id.'">';
    				$this->getRender($row);
    			
    			if($row->childs())
				{
	    			echo "<ol>";
	    				$this->getChilds($row->childs());
	    	    	echo "</ol>";
				}
    			echo "</li>";
   		 	}
   		endforeach;
    	echo '</ol>';
    }
    
    public function getChilds($model)
    {
    	foreach($model As $row):
			echo '<li>';
			
				$this->getRender($row);
				
				if($row->childs())
				{
					echo "<ol>";
						$this->getChilds($row->childs());
					echo "</ol>";
				}
			//echo "</li>";
		endforeach;
		
    }
    public function getRender($row)
    {
    ?>
		<div class="item-wraper <?php echo ($this->actid==$row->id)?'active':'';?>">
			<span class="sp"></span>
			<b><label><?php echo $row->title;?></label></b>
			<div class="right"><a href="<?php echo $row->id;?>">Remove</a></div>
			<div class="right"><a href="/menu/items/edit/id/<?php echo $row->id;?>">Edit</a></div>
			<div class="right"><input type="checkbox" disabled="disabled" <?php echo($row->expanded)?"checked":"";?>/></div>
			<div class="right"><input type="checkbox" disabled="disabled" <?php echo($row->enabled)?"checked":"";?>/></div>
		</div>
	<?php 
    }
    

    
    
}
