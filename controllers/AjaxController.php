<?php

class AjaxController extends Controller {

    public function actionSave() {
        print_r($_POST['list']);
        $i = 0;
        foreach ($_GET['listItem'] as $key => $value) {
            $item_id = $key;
            $parent_id = $value;
            $order = $i;
            $i++;
            if ($parent_id == "root") {
                $parent_id = "0";
            }
            $sql[$item_id] = "UPDATE TABLE_NAME_HERE SET position = $order, parent_id = $parent_id  WHERE id = $item_id";
            mysql_query($sql[$item_id]) or die(mysql_error());
        }
    }

}

?>
