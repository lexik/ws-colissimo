<?php

namespace WSColissimo\WSColiPosteLetterService\Soap;

use WSColissimo\WSColiPosteLetterService\Soap\TypeConverter\DateTimeTypeConverter;
use WSColissimo\WSColiPosteLetterService\Soap\TypeConverter\TypeConverterCollection;

/**
 * SoapClientFactory
 *
 * @author Nicolas Cabot <n.cabot@lexik.fr>
 */
class SoapClientFactory
{
    /**
     * Default classmap
     *
     * @var array
     */
    protected $classmap = array(
        'ServiceCallContextV2'       => '\WSColissimo\WSColiPosteLetterService\Request\ValueObject\ServiceCallContext',
        'ArticleVO'                  => '\WSColissimo\WSColiPosteLetterService\Request\ValueObject\Article',
        'ContentsVO'                 => '\WSColissimo\WSColiPosteLetterService\Request\ValueObject\Content',
        'ParcelVO'                   => '\WSColissimo\WSColiPosteLetterService\Request\ValueObject\Parcel',
        'AddressVO'                  => '\WSColissimo\WSColiPosteLetterService\Request\ValueObject\Address',
        'DestEnvVO'                  => '\WSColissimo\WSColiPosteLetterService\Request\ValueObject\DestEnv',
        'ExpEnvVO'                   => '\WSColissimo\WSColiPosteLetterService\Request\ValueObject\ExpEnv',
        'LetterVO'                   => '\WSColissimo\WSColiPosteLetterService\Request\ValueObject\Letter',
        'Letter'                     => '\WSColissimo\WSColiPosteLetterService\Request\ValueObject\Letter',
        'getLetterColissimo'         => '\WSColissimo\WSColiPosteLetterService\Request\LetterColissimoRequest',
        'ReturnLetterVO'             => '\WSColissimo\WSColiPosteLetterService\Response\ValueObject\ReturnLetter',
        'getLetterColissimoResponse' => '\WSColissimo\WSColiPosteLetterService\Response\LetterColissimoResponse',
    );

    /**
     * Type converters collection
     *
     * @var TypeConverterCollection
     */
    protected $typeConverters;

    /**
     * @param string $wsdl Some argument description
     *
     * @return \SoapClient
     */
    public function create($wsdl)
    {
        return new \SoapClient($wsdl, array(
            'trace'     => 1,
            'features'  => SOAP_SINGLE_ELEMENT_ARRAYS,
            'classmap'  => $this->classmap,
            'typemap'   => $this->getTypeConverters()->getTypemap()
        ));
    }

    /**
     * test
     *
     * @param string $soap SOAP class
     * @param string $php  PHP class
     */
    public function setClassmapping($soap, $php)
    {
        $this->classmap[$soap] = $php;
    }

    /**
     * Get type converter collection that will be used for the \SoapClient
     *
     * @return TypeConverterCollection
     */
    public function getTypeConverters()
    {
        if (null === $this->typeConverters) {
            $this->typeConverters = new TypeConverterCollection(
                array(
                    new DateTimeTypeConverter()
                )
            );
        }

        return $this->typeConverters;
    }

    /**
     * Set type converter collection
     *
     * @param type $typeConverters Type converter collection
     *
     * @return SoapClientFactory
     */
    public function setTypeConverters(TypeConverterCollection $typeConverters)
    {
        $this->typeConverters = $typeConverters;

        return $this;
    }
}
