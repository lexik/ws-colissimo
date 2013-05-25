<?php

namespace WSColissimo\WSColiPosteLetterService\Request\ValueObject;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * Address
 *
 * @author Nicolas Cabot <n.cabot@lexik.fr>
 */
class Address
{
    /**
     * @var string
     */
    protected $companyName;

    /**
     * @var string
     */
    protected $civility;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $surname;

    /**
     * @var string
     */
    protected $line0;

    /**
     * @var string
     */
    protected $line1;

    /**
     * @var string
     */
    protected $line2;

    /**
     * @var string
     */
    protected $line3;

    /**
     * @var string
     */
    protected $phone;

    /**
     * @var string
     */
    protected $mobileNumber;

    /**
     * @var string
     */
    protected $doorCode1;

    /**
     * @var string
     */
    protected $doorCode2;

    /**
     * @var string
     */
    protected $interphone;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $countryCode;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $postalCode;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->countryCode = 'FR';
        $this->country     = 'France';
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }

    /**
     * @return string
     */
    public function getCivility()
    {
        return $this->civility;
    }

    /**
     * @param string $civility
     */
    public function setCivility($civility)
    {
        $this->civility = $civility;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getLine0()
    {
        return $this->line0;
    }

    /**
     * @param string $line0
     */
    public function setLine0($line0)
    {
        $this->line0 = $line0;
    }

    /**
     * @return string
     */
    public function getLine1()
    {
        return $this->line1;
    }

    /**
     * @param string $line1
     */
    public function setLine1($line1)
    {
        $this->line1 = $line1;
    }

    /**
     * @return string
     */
    public function getLine2()
    {
        return $this->line2;
    }

    /**
     * @param string $line2
     */
    public function setLine2($line2)
    {
        $this->line2 = $line2;
    }

    /**
     * @return string
     */
    public function getLine3()
    {
        return $this->line3;
    }

    /**
     * @param string $line3
     */
    public function setLine3($line3)
    {
        $this->line3 = $line3;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }

    /**
     * @param string $mobileNumber
     */
    public function setMobileNumber($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;
    }

    /**
     * @return string
     */
    public function getDoorCode1()
    {
        return $this->doorCode1;
    }

    /**
     * @param string $doorCode1
     */
    public function setDoorCode1($doorCode1)
    {
        $this->doorCode1 = $doorCode1;
    }

    /**
     * @return string
     */
    public function getDoorCode2()
    {
        return $this->doorCode2;
    }

    /**
     * @param string $doorCode2
     */
    public function setDoorCode2($doorCode2)
    {
        $this->doorCode2 = $doorCode2;
    }

    /**
     * @return string
     */
    public function getInterphone()
    {
        return $this->interphone;
    }

    /**
     * @param string $interphone
     */
    public function setInterphone($interphone)
    {
        $this->interphone = $interphone;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * Add validation rules
     *
     * @param ClassMetadata $metadata
     */
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('companyName', new Assert\Type(array('type' => 'string')));
        $metadata->addPropertyConstraint('companyName', new Assert\Length(array('max' => 35)));

        $metadata->addPropertyConstraint('civility', new Assert\Type(array('type' => 'string')));
        $metadata->addPropertyConstraint('civility', new Assert\Length(array('max' => 4)));

        $metadata->addPropertyConstraint('name', new Assert\Type(array('type' => 'string')));
        $metadata->addPropertyConstraint('name', new Assert\Length(array('max' => 35)));

        $metadata->addPropertyConstraint('surname', new Assert\Type(array('type' => 'string')));
        $metadata->addPropertyConstraint('surname', new Assert\Length(array('max' => 29)));

        $metadata->addPropertyConstraint('email', new Assert\Type(array('type' => 'string')));
        $metadata->addPropertyConstraint('email', new Assert\Email());

        $metadata->addPropertyConstraint('line0', new Assert\Type(array('type' => 'string')));
        $metadata->addPropertyConstraint('line0', new Assert\Length(array('max' => 35)));

        $metadata->addPropertyConstraint('line1', new Assert\Type(array('type' => 'string')));
        $metadata->addPropertyConstraint('line1', new Assert\Length(array('max' => 35)));

        $metadata->addPropertyConstraint('line2', new Assert\Type(array('type' => 'string')));
        $metadata->addPropertyConstraint('line2', new Assert\NotBlank());
        $metadata->addPropertyConstraint('line2', new Assert\Length(array('max' => 35)));

        $metadata->addPropertyConstraint('line3', new Assert\Type(array('type' => 'string')));
        $metadata->addPropertyConstraint('line3', new Assert\Length(array('max' => 35)));

        $metadata->addPropertyConstraint('phone', new Assert\Regex(array('pattern' => '/^[0-9]{0,15}$/')));
        $metadata->addPropertyConstraint('mobileNumber', new Assert\Regex(array('pattern' => '/^[0-9]{0,10}$/')));
        $metadata->addPropertyConstraint('doorCode1', new Assert\Regex(array('pattern' => '/^[a-zA-Z0-9]{0,8}$/')));
        $metadata->addPropertyConstraint('doorCode2', new Assert\Regex(array('pattern' => '/^[a-zA-Z0-9]{0,8}$/')));
        $metadata->addPropertyConstraint('interphone', new Assert\Regex(array('pattern' => '/^[a-zA-Z0-9]{0,30}$/')));

        $metadata->addPropertyConstraint('countryCode', new Assert\NotBlank());
        $metadata->addPropertyConstraint('countryCode', new Assert\Regex(array('pattern' => '/^[A-Z]{2}$/')));

        $metadata->addPropertyConstraint('city', new Assert\Type(array('type' => 'string')));
        $metadata->addPropertyConstraint('city', new Assert\NotBlank());
        $metadata->addPropertyConstraint('city', new Assert\Length(array('max' => 35)));

        $metadata->addPropertyConstraint('postalCode', new Assert\NotBlank());
        $metadata->addPropertyConstraint('postalCode', new Assert\Regex(array('pattern' => '/^[a-zA-Z0-9]{5}$/')));
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
