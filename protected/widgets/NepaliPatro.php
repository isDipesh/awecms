<?php

class NepaliPatro extends AwePortlet {

    public $info;
    public $format = '<u>{date-np} {month-np} {year-np}</u> {event-np}';

    public function init() {
        $this->info = NPatro::getInfo();
        parent::init();
    }

    public function run() {
        
        if (!$this->info) return;
        
        $rep = array(
            'date-np' => $this->info['date']['np'],
            'month-np' => $this->info['month']['np'],
            'year-np' => $this->info['year']['np'],
            'date-en' => $this->info['date']['en'],
            'month-en' => $this->info['month']['en'],
            'year-en' => $this->info['year']['en'],
            'day-np' => $this->info['day']['np'],
            'day-en' => $this->info['day']['en'],
            'event-en' => $this->info['event']['en'],
            'event-np' => $this->info['event']['np'],
            'tithi-en' => $this->info['tithi']['en'],
            'tithi-np' => $this->info['tithi']['np'],
            'eng-date' => $this->info['eng-date'],
        );

        $result = str_replace(array_map('self::maskit', array_keys($rep)), array_values($rep), $this->format);
        echo $result;

        parent::run();
    }

    public static function maskit($val) {
        return '{' . $val . '}';
    }

}