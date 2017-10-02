<?php

class CurlCbrClient
{

    private $curl;
    private $xmlString;
    private $soapUrl = "http://www.cbr.ru/DailyInfoWebServ/DailyInfo.asmx?op=GetCursOnDate";
    private $headers = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Pragma: no-cache",
        "SOAPAction: http://web.cbr.ru/GetCursOnDate"
    );
    private $curs;

    public function __construct()
    {
        $this->curl = curl_init();
    }

    private function getCurs($date)
    {
        date_default_timezone_set('Europe/Kiev');
        if (date('Y-m-d', strtotime($date)) == $date)
        {
            $this->xmlPostString = '<?xml version="1.0" encoding="utf-8"?>
                <soap:Envelope 
                xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
                xmlns:xsd="http://www.w3.org/2001/XMLSchema" 
                xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                <soap:Body>
                <GetCursOnDate xmlns="http://web.cbr.ru/">
                <On_date>' . $date . '</On_date>
                </GetCursOnDate>
                </soap:Body>
                </soap:Envelope>';

            curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, 1);
            curl_setopt($this->curl, CURLOPT_URL, $this->soapUrl);
            curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($this->curl, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($this->curl, CURLOPT_TIMEOUT, 10);
            curl_setopt($this->curl, CURLOPT_POST, true);
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, $this->xmlPostString);
            curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->headers);

            $response = curl_exec($this->curl);
            curl_close($this->curl);

            $response1 = str_replace("<soap:Body>","",$response);
            $response2 = str_replace("</soap:Body>","",$response1);
            $response3 = str_replace("xs:","",$response2);
            $response4 = str_replace("diffgr:","",$response3);
            $parse = new SimpleXMLElement($response4);
            $curs = $parse->GetCursOnDateResponse->
                    GetCursOnDateResult->
                    diffgram->ValuteData->
                    ValuteCursOnDate;
            return $curs;
        }
    }

}
