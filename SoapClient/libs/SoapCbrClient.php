<?php

class SoapCbrClient
{

    public function __construct($url)
    {
        $this->objSoap = new SoapClient($url);
    }

    public function getCurs($date)
    {
        date_default_timezone_set('Europe/Kiev');
        if (date('Y-m-d', strtotime($date)) == $date)
        {
            $param['On_date'] = date($date);
            $curs = $this->objSoap->GetCursOnDate($param)->GetCursOnDateResult->any;
//            var_dump('$this->curs', $curs);
            $xmlObj = new SimpleXMLElement($curs);
            $xmlCurse = $xmlObj->ValuteData->ValuteCursOnDate;
//            var_dump($this->objCurse);
            return $xmlCurse;
        }
    }
    

}
