<?php

namespace WSColissimo\WSColiPosteLetterService\Request\ValueObject;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * ExpEnv
 *
 * @author Nicolas Cabot <n.cabot@lexik.fr>
 */
class ExpEnv
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
     * @var Address
     */
    protected $addressVO;

    /**
     * Constructor
     *
     * @param Address $address
     */
    public function __construct(Address $address = null)
    {
        $this->addressVO = $address;
        $this->alert     = Choice\AlertType::NONE;
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
     * @return Address
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
