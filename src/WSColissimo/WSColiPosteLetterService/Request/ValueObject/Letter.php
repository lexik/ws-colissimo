<?php

namespace WSColissimo\WSColiPosteLetterService\Request\ValueObject;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * Letter
 *
 * @author Nicolas Cabot <n.cabot@lexik.fr>
 */
class Letter
{
    /**
     * @var integer
     */
    protected $contractNumber;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var ServiceCallContext
     */
    protected $service;

    /**
     * @var Parcel
     */
    protected $parcel;

    /**
     * @var DestEnv
     */
    protected $dest;

    /**
     * @var ExpEnv
     */
    protected $exp;

    /**
     * @var string
     */
    protected $profil;

    /**
     * @return integer
     */
    public function getContractNumber()
    {
        return $this->contractNumber;
    }

    /**
     * @param integer $contractNumber
     */
    public function setContractNumber($contractNumber)
    {
        $this->contractNumber = (int) $contractNumber;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return ServiceCallContext
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param ServiceCallContext $service
     */
    public function setService(ServiceCallContext $service)
    {
        $this->service = $service;
    }

    /**
     * @return Parcel
     */
    public function getParcel()
    {
        return $this->parcel;
    }

    /**
     * @param Parcel $parcel
     */
    public function setParcel(Parcel $parcel)
    {
        $this->parcel = $parcel;
    }

    /**
     * @return DestEnv
     */
    public function getDest()
    {
        return $this->dest;
    }

    /**
     * @param DestEnv $dest
     */
    public function setDest(DestEnv $dest)
    {
        $this->dest = $dest;
    }

    /**
     * @return ExpEnv
     */
    public function getExp()
    {
        return $this->exp;
    }

    /**
     * @param ExpEnv $exp
     */
    public function setExp(ExpEnv $exp)
    {
        $this->exp = $exp;
    }

    /**
     * @return string
     */
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * @param  $profil
     */
    public function setProfil($profil)
    {
        $this->profil = $profil;
    }

    /**
     * Add validation rules
     *
     * @param ClassMetadata $metadata
     */
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('contractNumber', new Assert\NotBlank());
        $metadata->addPropertyConstraint('contractNumber', new Assert\Type(array('type' => 'integer')));
        $metadata->addPropertyConstraint('contractNumber', new Assert\Regex(array('pattern' => '/^[0-9]{6}$/')));

        $metadata->addPropertyConstraint('password', new Assert\NotBlank());
        $metadata->addPropertyConstraint('password', new Assert\Type(array('type' => 'string')));

        $metadata->addPropertyConstraint('service', new Assert\NotBlank());
        $metadata->addPropertyConstraint('service', new Assert\Valid());

        $metadata->addPropertyConstraint('parcel', new Assert\NotBlank());
        $metadata->addPropertyConstraint('parcel', new Assert\Valid());

        $metadata->addPropertyConstraint('dest', new Assert\NotBlank());
        $metadata->addPropertyConstraint('dest', new Assert\Valid());

        $metadata->addPropertyConstraint('exp', new Assert\NotBlank());
        $metadata->addPropertyConstraint('exp', new Assert\Valid());
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
