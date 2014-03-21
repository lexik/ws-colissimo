WSColiPosteLetterService Client Library
=======================================

![Project Status](http://stillmaintained.com/lexik/ws-colissimo.png)

## Introduction

This library provides a client for the SOAP 
[WSColiPosteLetterService](https://www.coliposte.fr/pro/docs/docutheque/divers/socolissimo/integrationwsshipping.pdf).

Access to the WSColiPosteLetterService must be contracted with "La Poste" beforehand or 
it will simply not work. Also, note that currently only the production mode is working.

Nb: The structure of this library is based on 
[PHPForce Soap Client](https://github.com/phpforce/soap-client).

## Installation - using composer

Add the library to your `composer.json` :

```
{
    "require": {
        "lexik/ws-colissimo": "dev-master"
    }
}
```
Install it by running the command :

```
php composer.phar update lexik/ws-colissimo
```

## Usage

### Standalone

```
# see example in sample/index.php
```

### Symfony2

Install the [LexikColissimoBundle](https://github.com/lexik/LexikColissimoBundle).
