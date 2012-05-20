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
                    or in_array($column->dbType, $this->dateTypes)) {
                echo "                <?php
                \$datetime = strtotime(\$data->" . $column->name . ");
                \$dbfield = date('D, d M y H:i:s', \$datetime);
                echo \$dbfield;
                ?>

        </div>
        </div>\n";
            } else if (in_array($column->dbType, $this->booleanTypes)) {
                echo "
                <?php
                echo CHtml::encode(\$data->{$column->name} == 1 ? 'True' : 'False');
                ?>

            </div>
        </div>";
            } else if (in_array(strtolower($column->name), $this->emailFields)) {
                echo "
                <?php
                echo CHtml::mailto(\$data->{$column->name});
                ?>

            </div>
        </div>";
            } else if (in_array($column->dbType, array('longtext'))) {
                echo "
                <?php
                echo nl2br(CHtml::encode(\$data->{$column->name}));
                ?>

            </div>
        </div>";
            } else if (in_array(strtolower($column->name), $this->imageFields)) {
                
                /*
                echo "                <a href=\"\<?php echo \$data->{$column->name} ?>\" target=\"_blank\" >"; 
                */
                echo "<img alt=\"<?php echo \$data->{$identificationColumn} ?>\" title=\"<?php echo \$data->{$identificationColumn} ?>\" src=\"<?php echo \$data->{$column->name} ?>\" />";
                /*
                echo 'echo "</a>";
                 */
                echo "</div>";
                echo "</div>";
            } else if (in_array(strtolower($column->name), $this->urlFields)) {
                echo "
                <?php
                echo Awecms::formatUrl(\$data->{$column->name},true);
                ?>

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