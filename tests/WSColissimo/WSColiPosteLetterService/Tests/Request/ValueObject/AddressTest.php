<?php

namespace WSColissimo\WSColiPosteLetterService\Tests\Request\ValueObject;

use WSColissimo\WSColiPosteLetterService\Tests\AbstractTestCase;
use WSColissimo\WSColiPosteLetterService\Request\ValueObject\Address;

/**
 * Letter Test
 *
 * @author Nicolas Cabot <n.cabot@lexik.fr>
 */
class AddressTest extends AbstractTestCase
{
    /**
     * Test an empty object
     */
    public function testEmptyObject()
    {
        $address = new Address();

        $this->validateObject($address, array(
            'line2'      => 'This value should not be blank.',
            'postalCode' => 'This value should not be blank.',
            'city'       => 'This value should not be blank.',
        ));

        return $address;
    }

    /**
     * Test a valid minimal object
     *
     * @depends testEmptyObject
     */
    public function testMinimalObject(Address $address)
    {
        $address->setLine2('Address Line 2');
        $address->setPostalCode('34000');
        $address->setCity('City');

        $this->validateObject($address, array());

        return $address;
    }

    /**
     * Test a valid full object
     *
     * @depends testMinimalObject
     */
    public function testFullObject(Address $address)
    {
        $address->setCivility('M');
        $address->setName('Name');
        $address->setSurname('Surname');
        $address->setEmail('email@client.fr');
        $address->setCompanyName('Company Name');

        $address->setLine0('Address Line 0');
        $address->setLine1('Address Line 1');
        $address->setLine3('Address Line 3');

        $address->setDoorCode1('123');
        $address->setDoorCode2('123');
        $address->setInterphone('123');

        $address->setCountry('France');
        $address->setCountryCode('FR');

        $address->setPhone('0404040404');
        $address->setMobileNumber('0606060606');

        $this->validateObject($address, array());

        return $address;
    }

    /**
     * Test properties direct access
     *
     * @depends testFullObject
     */
    public function testProperties(Address $address)
    {
        $this->assertEquals('M', $address->civility);
        $this->assertEquals('Name', $address->name);
        $this->assertEquals('Surname', $address->surname);
        $this->assertEquals('email@client.fr', $address->email);
        $this->assertEquals('Company Name', $address->companyName);

        $this->assertEquals('Address Line 0', $address->line0);
        $this->assertEquals('Address Line 1', $address->line1);
        $this->assertEquals('Address Line 2', $address->line2);
        $this->assertEquals('Address Line 3', $address->line3);

        $this->assertEquals('City', $address->city);
        $this->assertEquals('34000', $address->postalCode);

        $this->assertEquals('123', $address->doorCode1);
        $this->assertEquals('123', $address->doorCode2);
        $this->assertEquals('123', $address->interphone);

        $this->assertEquals('0404040404', $address->phone);
        $this->assertEquals('0606060606', $address->mobileNumber);

        $this->assertEquals('France', $address->country);
        $this->assertEquals('FR', $address->countryCode);

        $this->assertNull($address->wrongProperty);
    }
}
