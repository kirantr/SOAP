<?php

class CurlSportClient
{

    private $curl;
    private $cities;
    private $url = 'http://footballpool.dataaccess.eu/data/info.wso?op=Cities';
    private $xml = '<?xml version="1.0" encoding="utf-8"?>
                                <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                                  <soap:Body>
                                    <Cities xmlns="http://footballpool.dataaccess.eu">
                                    </Cities>
                                  </soap:Body>
                                </soap:Envelope>';
    private $headers = array(
        "Host: footballpool.dataaccess.eu",
        "Content-Type: text/xml; charset=utf-8"
    );

    public function __construct()
    {
        $this->curl = curl_init();
    }

    public function getCities()
    {
        curl_setopt($this->curl, CURLOPT_URL, $this->url);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($this->curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($this->curl, CURLOPT_POST, true);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $this->xml);
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->headers);

        $response = curl_exec($this->curl);
        curl_close($this->curl);
        if (!$response)
        {
            throw new Exception(ERR_URL);
        }

        $response1 = str_replace("<soap:Body>", "", $response);
        $response2 = str_replace("</soap:Body>", "", $response1);
        $response3 = str_replace("<m:CitiesResult>", "", $response2);
        $response4 = str_replace("</m:CitiesResult>", "", $response3);
        $response5 = str_replace("m:", "", $response4);
        $cities = new SimpleXMLElement($response5);
        $this->cities = $cities->CitiesResponse->string;
        return $this->cities;
    }

}
