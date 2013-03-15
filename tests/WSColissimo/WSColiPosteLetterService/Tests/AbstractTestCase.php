<?php

namespace WSColissimo\WSColiPosteLetterService\Tests;

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\ConstraintViolationList;

/**
 * AbstractTestCase
 *
 * @author Laurent Heurtault <l.heurtault@lexik.fr>
 */
abstract class AbstractTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Symfony\Component\Validator\Validator
     */
    protected $validator;

    /**
     * (non-PHPdoc)
     * @see PHPUnit_Framework_TestCase::setUp()
     */
    protected function setUp()
    {
        $this->validator = Validation::createValidatorBuilder()->addMethodMapping('loadValidatorMetadata')->getValidator();
    }

    /**
     * Validate given object and compare it to the given errors, with optional validation groups
     *
     * @param mixed $object
     * @param array $errors
     * @param array $validationGroups
     */
    public function validateObject($object, $errors, array $validationGroups = array())
    {
        $violations = $this->validator->validate($object, $validationGroups);
        $this->assertEquals($this->countErrors($errors), count($violations), (string) $violations);

        $this->checkViolationsCoherence($errors, $violations);
    }

    /**
     * Count number of errors
     *
     * @param  array   $errors
     * @return integer
     */
    protected function countErrors(array $errors)
    {
        $count = 0;
        foreach ($errors as $error) {
            $count += is_array($error) ? count($error) : 1;
        }

        return $count;
    }

    /**
     * Check coherence between given errors and detected errors
     *
     * @param array                   $errors
     * @param ConstraintViolationList $violations
     */
    protected function checkViolationsCoherence(array $errors, ConstraintViolationList $violations)
    {
        foreach ($errors as $property => $message) {
            if (is_array($message)) {
                foreach ($message as $m) {
                    $pattern = sprintf('/(\.%s:)?\s*%s\.?$/m', $property, $m);
                    $this->assertRegExp($pattern, (string) $violations, $violations);
                }
            } else {
                $pattern = sprintf('/(\.%s:)?\s*%s\.?$/m', $property, $message);
                $this->assertRegExp($pattern, (string) $violations, $violations);
            }
        }
    }
}
