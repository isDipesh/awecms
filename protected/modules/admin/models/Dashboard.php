<?php

Yii::import('application.modules.admin.models._base.BaseDashboard');

class Dashboard extends BaseDashboard {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getMenuItems() {
        $menuItems = array();
        $dashboardRecords = $this->findAll();
        foreach ($dashboardRecords as $dashboardRecord) {
            $menuItems[$dashboardRecord->category][] = array($dashboardRecord->name, array($dashboardRecord->path));
        }
        return $menuItems;
    }

}