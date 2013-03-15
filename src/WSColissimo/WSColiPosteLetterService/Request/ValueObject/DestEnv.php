<?php

namespace WSColissimo\WSColiPosteLetterService\Request\ValueObject;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * DestEnvVO
 *
 * @author Nicolas Cabot <n.cabot@lexik.fr>
 */
class DestEnv
{
    /**
     * @var string
     */
    protected $ref;

    /**
     * @var string
     */
    protected $alert;

    /**
     * @var DestAddress
     */
    protected $addressVO;

    /**
     * @var boolean
     */
    protected $codeBarForreference;

    /**
     * @var boolean
     */
    protected $deliveryError;

    /**
     * @var string
     */
    protected $deliveryInfoLine1;

    /**
     * @var string
     */
    protected $deliveryInfoLine2;

    /**
     * @var string
     */
    protected $serviceInfo;

    /**
     * @var string
     */
    protected $promotionCode;

    /**
     * Constructor
     *
     * @param Address $address
     */
    public function __construct(AddressDest $address = null)
    {
        $this->addressVO           = $address;
        $this->alert               = Choice\AlertType::NONE;
        $this->codeBarForreference = false;
    }

    /**
     * @return string
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param string $ref
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
    }

    /**
     * @return string
     */
    public function getAlert()
    {
        return $this->alert;
    }

    /**
     * @param string $alert
     */
    public function setAlert($alert)
    {
        $this->alert = $alert;
    }

    /**
     * @return the DestAddress
     */
    public function getAddressVO()
    {
        return $this->addressVO;
    }

    /**
     * @param string $addressVO
     */
    public function setAddressVO($addressVO)
    {
        $this->addressVO = $addressVO;
    }

    /**
     * @return the boolean
     */
    public function getCodeBarForreference()
    {
        return $this->codeBarForreference;
    }

    /**
     * @param string $codeBarForreference
     */
    public function setCodeBarForreference($codeBarForreference)
    {
        $this->codeBarForreference = $codeBarForreference;
    }

    /**
     * @return the boolean
     */
    public function getDeliveryError()
    {
        return $this->deliveryError;
    }

    /**
     * @param string $deliveryError
     */
    public function setDeliveryError($deliveryError)
    {
        $this->deliveryError = $deliveryError;
    }

    /**
     * @return string
     */
    public function getDeliveryInfoLine1()
    {
        return $this->deliveryInfoLine1;
    }

    /**
     * @param string $deliveryInfoLine1
     */
    public function setDeliveryInfoLine1($deliveryInfoLine1)
    {
        $this->deliveryInfoLine1 = $deliveryInfoLine1;
    }

    /**
     * @return string
     */
    public function getDeliveryInfoLine2()
    {
        return $this->deliveryInfoLine2;
    }

    /**
     * @param string $deliveryInfoLine2
     */
    public function setDeliveryInfoLine2($deliveryInfoLine2)
    {
        $this->deliveryInfoLine2 = $deliveryInfoLine2;
    }

    /**
     * @return string
     */
    public function getServiceInfo()
    {
        return $this->serviceInfo;
    }

    /**
     * @param string $serviceInfo
     */
    public function setServiceInfo($serviceInfo)
    {
        $this->serviceInfo = $serviceInfo;
    }

    /**
     * @return string
     */
    public function getPromotionCode()
    {
        return $this->promotionCode;
    }

    /**
     * @param string $promotionCode
     */
    public function setPromotionCode($promotionCode)
    {
        $this->promotionCode = $promotionCode;
    }

    /**
     * Add validation rules
     *
     * @param ClassMetadata $metadata
     */
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('ref', new Assert\Blank());

        $metadata->addPropertyConstraint('alert', new Assert\NotBlank());
        $metadata->addPropertyConstraint('alert', new Assert\Choice(array(
                'callback' => array('\WSColissimo\WSColiPosteLetterService\Request\ValueObject\Choice\AlertType', 'getChoices')
        )));

        $metadata->addPropertyConstraint('addressVO', new Assert\NotBlank());
        $metadata->addPropertyConstraint('addressVO', new Assert\Valid());

        $metadata->addPropertyConstraint('codeBarForreference', new Assert\Type(array('type' => 'boolean')));
        $metadata->addPropertyConstraint('deliveryError', new Assert\Type(array('type' => 'boolean')));

        $metadata->addPropertyConstraint('deliveryInfoLine1', new Assert\Blank());
        $metadata->addPropertyConstraint('deliveryInfoLine2', new Assert\Blank());
        $metadata->addPropertyConstraint('serviceInfo', new Assert\Blank());
        $metadata->addPropertyConstraint('promotionCode', new Assert\Blank());
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
    }
}
