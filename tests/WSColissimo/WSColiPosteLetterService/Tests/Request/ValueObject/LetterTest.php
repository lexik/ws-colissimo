<?php

namespace WSColissimo\WSColiPosteLetterService\Tests\Request\ValueObject;

use WSColissimo\WSColiPosteLetterService\Tests\AbstractTestCase;
use WSColissimo\WSColiPosteLetterService\Request\ValueObject\DestEnv;
use WSColissimo\WSColiPosteLetterService\Request\ValueObject\ExpEnv;
use WSColissimo\WSColiPosteLetterService\Request\ValueObject\AddressDest;
use WSColissimo\WSColiPosteLetterService\Request\ValueObject\Address;
use WSColissimo\WSColiPosteLetterService\Request\ValueObject\Parcel;
use WSColissimo\WSColiPosteLetterService\Request\ValueObject\ServiceCallContext;
use WSColissimo\WSColiPosteLetterService\Request\ValueObject\Letter;

/**
 * Letter Test
 *
 * @author Nicolas Cabot <n.cabot@lexik.fr>
 */
class LetterTest extends AbstractTestCase
{
    /**
     * @var Letter
     */
    protected $letter;

    /**
     * (non-PHPdoc)
     * @see PHPUnit_Framework_TestCase::setUp()
     */
    public function setUp()
    {
        parent::setUp();

        $expAddress = new Address();
        $expAddress->setLine2('Address Line 2');
        $expAddress->setPostalCode('34000');
        $expAddress->setCity('City');

        $destAddress = new AddressDest;
        $destAddress->setName('Name');
        $destAddress->setSurname('Surname');
        $destAddress->setEmail('email@client.fr');
        $destAddress->setLine2('Address Line 2');
        $destAddress->setPostalCode('34000');
        $destAddress->setCity('City');

        $this->context = new ServiceCallContext('ACME');
        $this->parcel  = new Parcel(0.720);
        $this->expEnv  = new ExpEnv($expAddress);
        $this->destEnv = new DestEnv($destAddress);

        $this->letter = new Letter();

        $this->letter->setContractNumber('111111');
        $this->letter->setPassword('password');

        $this->letter->setService($this->context);
        $this->letter->setParcel($this->parcel);
        $this->letter->setExp($this->expEnv);
        $this->letter->setDest($this->destEnv);

        $this->letter->setProfil(null);
    }

    /**
     * Test an empty object
     */
    public function testEmptyObject()
    {
        $this->validateObject(new Letter(), array(
            'contractNumber' => 'This value should not be blank.',
            'password'       => 'This value should not be blank.',
            'service'        => 'This value should not be blank.',
            'parcel'         => 'This value should not be blank.',
            'dest'           => 'This value should not be blank.',
            'exp'            => 'This value should not be blank.',
        ));
    }

    /**
     * Test a valid minimal object
     */
    public function testValidObject()
    {
         $this->validateObject($this->letter, array());
    }

    /**
     * Test a valid full object
     */
    public function testProperties()
    {
        $this->assertEquals(111111, $this->letter->contractNumber);
        $this->assertEquals('password', $this->letter->password);

        $this->assertSame($this->context, $this->letter->service);
        $this->assertSame($this->parcel, $this->letter->parcel);
        $this->assertSame($this->expEnv, $this->letter->exp);
        $this->assertSame($this->destEnv, $this->letter->dest);

        $this->assertNull($this->letter->profil);
        $this->assertNull($this->letter->wrongProperty);
    }
}
