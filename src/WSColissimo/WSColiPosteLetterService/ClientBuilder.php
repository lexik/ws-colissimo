<?php

namespace WSColissimo\WSColiPosteLetterService;

use WSColissimo\WSColiPosteLetterService\Soap\SoapClientFactory;

/**
 * ClientBuilder for the WSColiPosteLetterService
 */
class ClientBuilder
{
    /**
     * Construct client builder with required parameters
     *
     * @param string $wsdl Path to the WSColiPosteLetterService WSDL
     */
    public function __construct($wsdl = 'https://ws.colissimo.fr/soap.shippingclpV2/services/WSColiPosteLetterService?wsdl')
    {
        $this->wsdl = $wsdl;
    }

    /**
     * Build the WSColiPosteLetterService SOAP client
     *
     * @return Client
     */
    public function build()
    {
        $soapClientFactory = new SoapClientFactory();
        $soapClient = $soapClientFactory->create($this->wsdl);

        return new Client($soapClient);
    }
}
