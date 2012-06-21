<?php

if ($tags) {
    $total = count($tags) - 1;
    foreach ($tags as $i => $tag) {
        echo '{';
        echo '"id": "' . $tag->tag . '",';
        echo '"label": "' . $tag->tag . '",';
        echo '"value": "' . $tag->slug . '"';
        echo '}';
        if ($total !== $i) {
            echo ',';
        }
    }
}?>