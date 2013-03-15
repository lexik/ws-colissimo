<?php

namespace WSColissimo\WSColiPosteLetterService\Response\ValueObject;
/**
 * ReturnLetter
 *
 * @author Nicolas Cabot <n.cabot@lexik.fr>
 */
class ReturnLetter
{
    /**
     * @var string
     */
    protected $file;

    /**
     * @var string
     */
    protected $parcelNumber;

    /**
     * @var string
     */
    protected $PdfUrl;

    /**
     * @var integer
     */
    protected $errorID;

    /**
     * @var string
     */
    protected $error;

    /**
     * @var string
     */
    protected $signature;

    /**
     * @var string
     */
    protected $dateCreation;

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param string $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return string
     */
    public function getParcelNumber()
    {
        return $this->parcelNumber;
    }

    /**
     * @param string $parcelNumber
     */
    public function setParcelNumber($parcelNumber)
    {
        $this->parcelNumber = $parcelNumber;
    }

    /**
     * @return string
     */
    public function getPdfUrl()
    {
        return $this->PdfUrl;
    }

    /**
     * @param string $PdfUrl
     */
    public function setPdfUrl($PdfUrl)
    {
        $this->PdfUrl = $PdfUrl;
    }

    /**
     * @return integer
     */
    public function getErrorID()
    {
        return $this->errorID;
    }

    /**
     * @param string $errorID
     */
    public function setErrorID($errorID)
    {
        $this->errorID = $errorID;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param string $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }

    /**
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param string $signature
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
    }

    /**
     * @return string
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @param string $dateCreation
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }

    /**
     * Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        $method = 'get' . ucfirst($name);

        if (method_exists($this, $method)) {
            return $this->$method();
        }

        return false;
    }

    /**
     * Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        $method = 'set' . ucfirst($name);

        if (method_exists($this, $method)) {
            return $this->$method($value);
        }
    }
}
