<?php

namespace WSColissimo\WSColiPosteLetterService\Util;

/**
 * ServiceAvailability Checker
 *
 * @author Nicolas Cabot <n.cabot@lexik.fr>
 */
class ServiceAvailability
{
    /**
     * @var string
     */
    protected $endPoint;

    /**
     * Constructor
     *
     * @param string $endPoint
     */
    public function __construct($endPoint = 'http://ws.colissimo.fr/supervisionWSShipping/supervision.jsp')
    {
        $this->endPoint = $endPoint;
    }

    /**
     * Check if service is up
     *
     * @return boolean
     */
    public function check()
    {
        if (extension_loaded('curl')) {
            return $this->curlCheck();
        }

        return $this->fileGetContentsCheck();
    }

    /**
     * Check service availability using curl
     *
     * @return boolean
     */
    protected function curlCheck()
    {
        $ch = curl_init($this->endPoint);

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $data = curl_exec($ch);

        $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $responseBody = $this->cleanUp($data);

        curl_close($ch);

        if ($responseCode === 200 && $responseBody === '[OK]') {
            return true;
        }

        return false;
    }

    /**
     * Check service availability using file_get_contents
     *
     * @return boolean
     */
    protected function fileGetContentsCheck()
    {
        $contents = file_get_contents($this->endPoint);
        $contents = $this->cleanUp($contents);

        if ($contents === '[OK]') {
            return true;
        }

        return false;
    }

    /**
     * Clean up the response body
     *
     * @param string $string
     *
     * @return string
     */
    protected function cleanUp($string)
    {
        return trim(preg_replace('/\s+/', '', $string));
    }
}
