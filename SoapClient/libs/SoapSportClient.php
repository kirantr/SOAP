<?php

class SoapSportClient
{
    private $objSoap;
    private $cities;

    public function __construct($url)
    {
        $this->objSoap = new SoapClient($url);
    }
    
    public function getData()
    {
        return $this->cities = $this->objSoap->Cities()->CitiesResult->string;
    }
}