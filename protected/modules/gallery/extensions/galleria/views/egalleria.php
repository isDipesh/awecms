<?php 
    if(isset($bind)) {
        $images = $data->getData();
        foreach($images as $image)
        {
            $htmlOptions = array();
            $alt = "";
            if(isset($bind["description"]))
                $alt = $image->$bind["description"];
            if(isset($bind["title"]))             
                $htmlOptions["title"] = $image->$bind["title"];
            
                
            $src = (isset($prefix)) ? $prefix.$image->$bind["image"] : $image->$bind["image"];    
            echo CHtml::image($src, $alt, $htmlOptions);
        }
    }
?>
