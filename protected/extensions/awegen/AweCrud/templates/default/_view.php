<div class="view">

    <?php
    $possibleIdentifiers = array('name', 'title', 'slug');
    $identificationColumn = $this->getIdentificationColumn();
    if (!in_array($identificationColumn, $possibleIdentifiers)) {
        echo "<h2><?php echo CHtml::encode(\$data->getAttributeLabel('{$identificationColumn}')); ?>:</h2>\n";
    }
    echo "<h2><?php echo CHtml::link(CHtml::encode(\$data->{$identificationColumn}), array('view', '{$this->tableSchema->primaryKey}' => \$data->{$this->tableSchema->primaryKey})); ?></h2>\n";
    foreach ($this->tableSchema->columns as $column) {
        if ($column->name !== $identificationColumn && !in_array($column->dbType, array('timestamp')) && !$column->isPrimaryKey) {
            echo "
    <?php
    if (!empty(\$data->{$column->name})) {
        ?>";
            echo "
        <div class=\"field\">
            <div class=\"field_name\">
                <b><?php echo CHtml::encode(\$data->getAttributeLabel('{$column->name}')); ?>:</b>
            </div>
            <div class=\"field_value\">\n";
            if ($column->name == 'createtime'
                    or $column->name == 'updatetime'
                    or $column->name == 'timestamp'
                    or in_array($column->dbType, array('datetime', 'date', 'time'))) {
                echo "
                <?php
                \$datetime = strtotime(\$data->" . $column->name . ");
                \$mysqldate = date('D, d M y H:i:s', \$datetime);
                echo \$mysqldate;
                ?>

            </div>
        </div>\n";
            } else if (in_array($column->dbType, array('tinyint(1)', 'boolean', 'bool'))) {
                echo "
                <?php
                echo CHtml::encode(\$data->{$column->name} == 1 ? 'True' : 'False');
                ?>

            </div>
        </div>";
            } else if (in_array(strtolower($column->name), array('image', 'picture', 'photo', 'pic', 'profile_pic', 'profile_picture', 'avatar', 'profilepic', 'profilepicture'))) {
                echo "                <a href=\"\<?php echo \$data->{$column->name} ?>\" target=\"_blank\" ><img alt=\"\<?php echo \$data->{$identificationColumn} ?>\" title=\"<?php echo \$data->{$identificationColumn} ?>\" src=\"<?php echo \$data->{$column->name} ?>\" /></a>
            </div>
        </div>";
            } else {
                echo "
                <?php
                echo CHtml::encode(\$data->{$column->name});
                ?>

            </div>
        </div>";
            }
            
            echo "
        <?php
    }
    ?>";
        }
    }
    ?>

</div>