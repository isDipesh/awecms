<?php

class Settings {

    private static $_settingsTable = '{{settings}}';
    protected static $_dbComponentId = 'db';

    public static function get($category = 'system', $key = null) {
        $sql = 'SELECT `key`, `value`, `serialized` FROM ' . Settings::getSettingsTable() . ' WHERE `category`=:cat';
        if ($key) {
            $sql .= " AND `key`='" . $key . "'";
        }
        $connection = Settings::getDbComponent();
        $command = $connection->createCommand($sql);
        $command->bindParam(':cat', $category);
        $resultItems = $command->queryAll();
        //return $resultItems;
        $result = array();
        foreach ($resultItems as $item) {
            //$resultItem
            $resultItem['key'] = $item['key'];
            if ($item['serialized'])
                $resultItem['value'] = @unserialize($item['value']);
            else
                $resultItem['value'] = $item['value'];
            $result[] = $resultItem;
        }
        if ($key) {
            return $result[0]['value'];
        }
        //return Awecms::array_to_object($result);
        return $result;
    }

    public static function set($category = 'system', $key = '', $value = '') {
        if (is_array($key)) {
            foreach ($key as $keyItem) {
                Settings::finalSet($category, $keyItem[0], $keyItem[1]);
            }
        } else {
            Settings::finalSet($category, $key, $value);
        }
    }

    private static function finalSet($category, $key, $value) {
        $serialized = 0;
        $connection = Settings::getDbComponent();
        $command = $connection->createCommand('SELECT id FROM ' . Settings::getSettingsTable() . ' WHERE `category`=:cat AND `key`=:key LIMIT 1');
        $command->bindParam(':cat', $category);
        $command->bindParam(':key', $key);
        $result = $command->queryRow();

        //serialize if it's an array
        if (is_array($value)) {
            $value = @serialize($value);
            $serialized = 1;
        }

        if (!empty($result))
            $command = $connection->createCommand('UPDATE ' . Settings::getSettingsTable() . ' SET `value`=:value, `serialized`=:serialized WHERE `category`=:cat AND `key`=:key');
        else
            $command = $connection->createCommand('INSERT INTO ' . Settings::getSettingsTable() . ' (`category`,`key`,`value`,`serialized`) VALUES(:cat,:key,:value,:serialized)');

        $command->bindParam(':cat', $category);
        $command->bindParam(':key', $key);
        $command->bindParam(':value', $value);
        $command->bindParam(':serialized', $serialized);
        $command->execute();
    }

    protected static function getDbComponent() {
        return Yii::app()->getComponent(Settings::$_dbComponentId);
    }

    public static function getSettingsTable() {
        return Settings::$_settingsTable;
    }

    public static function getCategories() {
        return array('system','admin','themes');
    }

    public function attributeNames() {
        
    }

}