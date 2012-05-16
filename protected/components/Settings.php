<?php

class Settings {

    private static $_settingsTable = '{{setting}}';
    public static $categoryField = 'category';
    protected static $_dbComponentId = 'db';

    public static function get($category = 'site', $key = null) {
        $sql = 'SELECT `key`, `value`, `type` FROM ' . self::getSettingsTable() . ' WHERE `' . self::$categoryField . '`=:cat';
        if ($key) {
            $sql .= " AND `key`='" . $key . "'";
        }
        $connection = self::getDbComponent();
        $command = $connection->createCommand($sql);
        $command->bindParam(':cat', $category);
        $resultItems = $command->queryAll();
        $result = array();
        foreach ($resultItems as $item) {
            $resultItem['type'] = $item['type'];
            $resultItem['key'] = $item['key'];
            if ($item['type'] == 'array' || $item['type'] == 'object')
                $resultItem['value'] = @unserialize($item['value']);
            else
                $resultItem['value'] = $item['value'];
            $result[] = $resultItem;
        }

        if ($key) {
            if (count($result))
                return $result[0]['value'];
            else
                return;
        }
        //return Awecms::array_to_object($result);
        return $result;
    }

    public static function set($category, $key, $value = null, $forcedType = null) {
        //calling set without value will nullify the value column
        if (is_array($key)) {
            foreach ($key as $index => $keyItem) {
                self::finalSet($category, $index, $keyItem, $forcedType);
            }
        } else {
            self::finalSet($category, $key, $value, $forcedType);
        }
    }

    public static function finalSet($category, $key, $value, $type) {

        $connection = self::getDbComponent();
        $command = $connection->createCommand('SELECT id FROM ' . self::getSettingsTable() . ' WHERE `' . self::$categoryField . '`=:cat AND `key`=:key LIMIT 1');
        $command->bindParam(':cat', $category);
        $command->bindParam(':key', $key);
        $result = $command->queryRow();
        if (empty($type))
            $type = Awecms::typeOf($value);

        //serialize if it's an array or object
        if (in_array($type, array('array', 'object'))) {
            $value = @serialize($value);
        }

        if (!empty($result))
            $command = $connection->createCommand('UPDATE ' . self::getSettingsTable() . ' SET `value`=:value WHERE `' . self::$categoryField . '`=:cat AND `key`=:key');
        else {
            $command = $connection->createCommand('INSERT INTO ' . self::getSettingsTable() . ' (`' . self::$categoryField . '`,`key`,`value`,`type`) VALUES(:cat,:key,:value,:type)');
            $command->bindParam(':type', $type);
        }
        $command->bindParam(':cat', $category);
        $command->bindParam(':key', $key);
        $command->bindParam(':value', $value);
        $command->execute();
    }

    protected static function getDbComponent() {
        return Yii::app()->getComponent(self::$_dbComponentId);
    }

    public static function delete($category, $keys = null) {
        //if $key is not array, make it one
        if (!is_array($keys))
            $keys = (array) $keys;
        $sql = "DELETE FROM `" . self::getSettingsTable() . "` WHERE `" . self::$categoryField . "`='" . $category . "'";
        if ($keys) {
            $sql.=" AND `key`='";
            $sql.=implode("' OR `key`='", $keys);
            $sql.="'";
        }
        $connection = self::getDbComponent();
        $command = $connection->createCommand($sql);
        $result = $command->execute();
    }

    public static function getSettingsTable() {
        return self::$_settingsTable;
    }

    public static function getCategories() {
        $sql = 'SELECT DISTINCT ' . self::$categoryField . ' from ' . self::getSettingsTable();
        $connection = self::getDbComponent();
        $command = $connection->createCommand($sql);
        $resultItems = $command->queryAll();
        $result = array();
        foreach ($resultItems as $resultItem) {
            $result[] = $resultItem[self::$categoryField];
        }
        return $result;
    }

    public function attributeNames() {
        
    }

}