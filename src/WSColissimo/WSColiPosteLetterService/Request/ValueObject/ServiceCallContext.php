<?php

namespace WSColissimo\WSColiPosteLetterService\Request\ValueObject;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * ServiceCallContext
 *
 * @author Nicolas Cabot <n.cabot@lexik.fr>
 */
class ServiceCallContext
{
    /**
     * @var \DateTime
     */
    protected $dateDeposite;

    /**
     * @var \DateTime
     */
    protected $dateValidation;

    /**
     * @var string
     */
    protected $returnType;

    /**
     * @var string
     */
    protected $serviceType;

    /**
     * @var boolean
     */
    protected $crbt;

    /**
     * @var string
     */
    protected $crbtAmount;

    /**
     * @var integer
     */
    protected $VATCode;

    /**
     * @var integer
     */
    protected $VATPercentage;

    /**
     * @var integer
     */
    protected $VATAmount;

    /**
     * @var integer
     */
    protected $transportationAmount;

    /**
     * @var integer
     */
    protected $totalAmount;

    /**
     * @var boolean
     */
    protected $portPaye;

    /**
     * @var string
     */
    protected $FTD;

    /**
     * @var string
     */
    protected $FTDAmount;

    /**
     * @var string
     */
    protected $returnOption;

    /**
     * @var string
     */
    protected $returnOptionAmmount;

    /**
     * @var string
     */
    protected $commandNumber;

    /**
     * @var string
     */
    protected $motiveBack;

    /**
     * @var string
     */
    protected $logocobrande;

    /**
     * @var string
     */
    protected $commercialName;

    /**
     * Constructor
     *
     * @param string $commercialName
     */
    public function __construct($commercialName = null)
    {
        $this->commercialName = $commercialName;

        $this->returnType     = Choice\RequestType::CREATE_PDF_FILE;
        $this->serviceType    = 'SO';
        $this->crbt           = false;
        $this->portPaye       = false;

        $this->dateDeposite   = new \DateTime();
    }

    /**
     * @return \DateTime
     */
    public function getDateDeposite()
    {
        return $this->dateDeposite;
    }

    /**
     * @param \DateTime $dateDeposite
     */
    public function setDateDeposite(\DateTime $dateDeposite = null)
    {
        $this->dateDeposite = $dateDeposite;
    }

    /**
     * @return \DateTime
     */
    public function getDateValidation()
    {
        return $this->dateValidation;
    }

    /**
     * @param \DateTime $dateValidation
     */
    public function setDateValidation(\DateTime $dateValidation = null)
    {
        $this->dateValidation = $dateValidation;
    }

    /**
     * @return string
     */
    public function getReturnType()
    {
        return $this->returnType;
    }

    /**
     * @param string $returnType
     */
    public function setReturnType($returnType)
    {
        $this->returnType = $returnType;
    }

    /**
     * @return string
     */
    public function getServiceType()
    {
        return $this->serviceType;
    }

    /**
     * @param string $serviceType
     */
    public function setServiceType($serviceType)
    {
        $this->serviceType = $serviceType;
    }

    /**
     * @return boolean
     */
    public function getCrbt()
    {
        return $this->crbt;
    }

    /**
     * @param boolean $crbt
     */
    public function setCrbt($crbt)
    {
        $this->crbt = $crbt;
    }

    /**
     * @return string
     */
    public function getCrbtAmount()
    {
        return $this->crbtAmount;
    }

    /**
     * @param string $crbtAmount
     */
    public function setCrbtAmount($crbtAmount)
    {
        $this->crbtAmount = $crbtAmount;
    }

    /**
     * @return integer
     */
    public function getVATCode()
    {
        return $this->VATCode;
    }

    /**
     * @param integer $VATCode
     */
    public function setVATCode($VATCode)
    {
        $this->VATCode = $VATCode;
    }

    /**
     * @return integer
     */
    public function getVATPercentage()
    {
        return $this->VATPercentage;
    }

    /**
     * @param integer $VATPercentage
     */
    public function setVATPercentage($VATPercentage)
    {
        $this->VATPercentage = $VATPercentage;
    }

    /**
     * @return integer
     */
    public function getVATAmount()
    {
        return $this->VATAmount;
    }

    /**
     * @param integer $VATAmount
     */
    public function setVATAmount($VATAmount)
    {
        $this->VATAmount = $VATAmount;
    }

    /**
     * @return integer
     */
    public function getTransportationAmount()
    {
        return $this->transportationAmount;
    }

    /**
     * @param integer $transportationAmount
     */
    public function setTransportationAmount($transportationAmount)
    {
        $this->transportationAmount = $transportationAmount;
    }

    /**
     * @return integer
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * @param integer $totalAmount
     */
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;
    }

    /**
     * @return boolean
     */
    public function getPortPaye()
    {
        return $this->portPaye;
    }

    /**
     * @param boolean $portPaye
     */
    public function setPortPaye($portPaye)
    {
        $this->portPaye = $portPaye;
    }

    /**
     * @return string
     */
    public function getFTD()
    {
        return $this->FTD;
    }

    /**
     * @param string $FTD
     */
    public function setFTD($FTD)
    {
        $this->FTD = $FTD;
    }

    /**
     * @return string
     */
    public function getFTDAmount()
    {
        return $this->FTDAmount;
    }

    /**
     * @param string $FTDAmount
     */
    public function setFTDAmount($FTDAmount)
    {
        $this->FTDAmount = $FTDAmount;
    }

    /**
     * @return string
     */
    public function getReturnOption()
    {
        return $this->returnOption;
    }

    /**
     * @param string $returnOption
     */
    public function setReturnOption($returnOption)
    {
        $this->returnOption = $returnOption;
    }

    /**
     * @return string
     */
    public function getReturnOptionAmmount()
    {
        return $this->returnOptionAmmount;
    }

    /**
     * @param string $returnOptionAmmount
     */
    public function setReturnOptionAmmount($returnOptionAmmount)
    {
        $this->returnOptionAmmount = $returnOptionAmmount;
    }

    /**
     * @return string
     */
    public function getCommandNumber()
    {
        return $this->commandNumber;
    }

    /**
     * @param string $commandNumber
     */
    public function setCommandNumber($commandNumber)
    {
        $this->commandNumber = $commandNumber;
    }

    /**
     * @return string
     */
    public function getMotiveBack()
    {
        return $this->motiveBack;
    }

    /**
     * @param string $motiveBack
     */
    public function setMotiveBack($motiveBack)
    {
        $this->motiveBack = $motiveBack;
    }

    /**
     * @return string
     */
    public function getLogocobrande()
    {
        return $this->logocobrande;
    }

    /**
     * @param string $logocobrande
     */
    public function setLogocobrande($logocobrande)
    {
        $this->logocobrande = $logocobrande;
    }

    /**
     * @return string
     */
    public function getCommercialName()
    {
        return $this->commercialName;
    }

    /**
     * @param string $commercialName
     */
    public function setCommercialName($commercialName)
    {
        $this->commercialName = $commercialName;
    }

    /**
     * Add validation rules
     *
     * @param ClassMetadata $metadata
     */
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('dateDeposite', new Assert\NotBlank());
        $metadata->addPropertyConstraint('dateDeposite', new Assert\DateTime());

        $metadata->addPropertyConstraint('dateValidation', new Assert\DateTime());

        $metadata->addPropertyConstraint('returnType', new Assert\NotBlank());
        $metadata->addPropertyConstraint('returnType', new Assert\Choice(array(
            'callback' => array('\WSColissimo\WSColiPosteLetterService\Request\ValueObject\Choice\RequestType', 'getChoices')
        )));

        $metadata->addPropertyConstraint('serviceType', new Assert\NotBlank());
        $metadata->addPropertyConstraint('serviceType', new Assert\Regex(array('pattern' => '/^[a-zA-Z0-9]{1,20}$/')));

        $metadata->addPropertyConstraint('crbt', new Assert\False());

        $metadata->addPropertyConstraint('VATCode', new Assert\Type(array('type' => 'integer')));
        $metadata->addPropertyConstraint('VATCode', new Assert\Range(array('min' => 0, 'max' => 2)));

        $metadata->addPropertyConstraint('VATPercentage', new Assert\Type(array('type' => 'integer')));
        $metadata->addPropertyConstraint('VATAmount', new Assert\Type(array('type' => 'integer')));
        $metadata->addPropertyConstraint('transportationAmount', new Assert\Type(array('type' => 'integer')));
        $metadata->addPropertyConstraint('totalAmount', new Assert\Type(array('type' => 'integer')));

        $metadata->addPropertyConstraint('portPaye', new Assert\False());
        $metadata->addPropertyConstraint('motiveBack', new Assert\Null());
        $metadata->addPropertyConstraint('logocobrande', new Assert\Null());

        $metadata->addPropertyConstraint('commercialName', new Assert\NotBlank());
        $metadata->addPropertyConstraint('commercialName', new Assert\Type(array('type' => 'string')));
        $metadata->addPropertyConstraint('commercialName', new Assert\Length(array('max' => 38)));
    }

    /**
     * @param string $name
     *
     * @return boolean
     */
    public function __get($name)
    {
        if ($name === 'logo-co-brande') {
            return $this->logocobrande;
        }

        $method = 'get' . ucfirst($name);

        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }
}
