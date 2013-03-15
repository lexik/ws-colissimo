<?php

namespace WSColissimo\WSColiPosteLetterService\Tests\Request\ValueObject;

use WSColissimo\WSColiPosteLetterService\Tests\AbstractTestCase;
use WSColissimo\WSColiPosteLetterService\Request\ValueObject\AddressDest;

/**
 * Letter Test
 *
 * @author Nicolas Cabot <n.cabot@lexik.fr>
 */
class AddressDestTest extends AbstractTestCase
{
    /**
     * Test an empty object
     */
    public function testEmptyObject()
    {
        $address = new AddressDest();

        $this->validateObject($address, array(
            'line2'      => 'This value should not be blank.',
            'postalCode' => 'This value should not be blank.',
            'city'       => 'This value should not be blank.',
            'name'       => 'This value should not be blank.',
            'surname'    => 'This value should not be blank.',
            'email'      => 'This value should not be blank.',
        ));

        return $address;
    }

    /**
     * Test a valid minimal object
     *
     * @depends testEmptyObject
     */
    public function testMinimalObject(AddressDest $address)
    {
        $address->setLine2('Place de la Comedie');
        $address->setPostalCode('34000');
        $address->setCity('Montpellier');

        $address->setName('Name');
        $address->setSurname('Surname');
        $address->setEmail('client@email.fr');

        $this->validateObject($address, array());
    }
}
