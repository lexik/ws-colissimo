<?php

use WSColissimo\WSColiPosteLetterService\ClientBuilder;
use WSColissimo\WSColiPosteLetterService\Request\ValueObject\DestEnv;
use WSColissimo\WSColiPosteLetterService\Request\ValueObject\ExpEnv;
use WSColissimo\WSColiPosteLetterService\Request\ValueObject\Address;
use WSColissimo\WSColiPosteLetterService\Request\ValueObject\AddressDest;
use WSColissimo\WSColiPosteLetterService\Request\ValueObject\Parcel;
use WSColissimo\WSColiPosteLetterService\Request\ValueObject\ServiceCallContext;
use WSColissimo\WSColiPosteLetterService\Request\ValueObject\Letter;
use WSColissimo\WSColiPosteLetterService\Request\LetterColissimoRequest;
use WSColissimo\WSColiPosteLetterService\Util\ServiceAvailability;

use Symfony\Component\Validator\Validation;

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/parameters.php';

// build the sender address

$expAddress = new Address();
$expAddress->setCompanyName('Acme and Co');
$expAddress->setLine2('Place de la Comedie');
$expAddress->setPostalCode('34000');
$expAddress->setCity('Montpellier');

// build the recipient address

$destAddress = new AddressDest();
$destAddress->setCivility('M');
$destAddress->setName('Prenom');
$destAddress->setSurname('Nom');
$destAddress->setLine2('Place de la Comedie');
$destAddress->setPostalCode('34000');
$destAddress->setCity('Montpellier');
$destAddress->setPhone('0606060606');
$destAddress->setEmail('email@client.fr');

// build the main letter object

$letter = new Letter();
$letter->setContractNumber($parameters['account']);
$letter->setPassword($parameters['password']);

$letter->setService(new ServiceCallContext('Acme and Co'));
$letter->setParcel(new Parcel(0.720));
$letter->setExp(new ExpEnv($expAddress));
$letter->setDest(new DestEnv($destAddress));

// test service availability // optionnal

$checker = new ServiceAvailability();
$checker->check();

// test letter object validity // optionnal

$validator = Validation::createValidatorBuilder()->addMethodMapping('loadValidatorMetadata')->getValidator();
$violations = $validator->validate($letter);

if (count($violations) === 0) {

    // create the webservice client

    $clientBuilder = new ClientBuilder();
    $client = $clientBuilder->build();

    try {

        // call the webservice with the letter object

        $response = $client->getLetterColissimo(new LetterColissimoRequest($letter));

        var_dump($response);

        if ($response->isSuccess()) {

            $infos = $response->getReturnLetter();

            // do what you want with the return infos

            // $number = $infos->parcelNumber;
            // $pdf    = $infos->PdfUrl;

            var_dump($infos);

        } else {

            var_dump($response->getErrorMessage());

        }

    } catch (SoapFault $f) {

        // log the error

    }

} else {

    // iterate over violations

    var_dump($violations);

}
