<?php

class NPatro extends CApplicationComponent {

    private $url;
    private $_info;
    private $data;
    public $time;

    public function __construct() {
        date_default_timezone_set('Asia/Katmandu');
        $this->url = 'http://nepalipatro.com.np/ffdata.php';
        $this->init();
        //$time = mktime(0,0,0,1,1,2012);
        //if($time){
        //    $this->url.='?q='.$time;
        //}
    }

    public function init() {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $this->url);
        $result = curl_exec($curl);
        curl_close($curl);
        
        

        $this->data = explode('~', $result);
        
        if (count($this->data)>1 )
        {
        $this->_info['date']['en'] = $this->data[0];
        $this->_info['date']['np'] = $this->data[1];
        $this->_info['month']['en'] = str_replace('Falghun', 'Falgun', $this->data[2]);
        $this->_info['month']['np'] = $this->data[3];
        $this->_info['year']['en'] = $this->data[4];
        $this->_info['year']['np'] = $this->data[5];
        $this->_info['day']['en'] = $this->data[6];
        $this->_info['day']['np'] = $this->data[7];
        $this->_info['event']['en'] = $this->data[8];
        $this->_info['event']['np'] = $this->data[9];
        $this->_info['tithi']['en'] = $this->data[10];
        $this->_info['tithi']['np'] = $this->data[11];
        $this->_info['eng-date'] = $this->data[12];
        }
    }

    public static function getInfo() {
        $np = new self;
        $np->init();
        return $np->_info;
    }

}