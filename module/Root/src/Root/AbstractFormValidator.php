<?php

namespace Root;

use Zend\Validator\ValidatorChain as ValidatorChain;
use Zend\Validator\ValidatorInterface as ValidatorInterface;

abstract class AbstractFormValidator implements ValidatorInterface
{
    protected $_values;
    protected $_chain;
    protected $_messages;

    public function __construct()
    {
        $this->_messages = array();
    }

    public function isValid($value)
    {
        $this->init($value);

        foreach($this->_chain as $key => $chain) {
            if (!$chain->isValid($this->_values[$key])) {
                foreach ($chain->getMessages() as $message) {
                    $this->_messages[$key] = $message;
                }
            }
        }

        return $this->hasValidationErrors() ? false : true;
    }

    public function getMessages()
    {
        return $this->_messages;
    }

    protected function init(array $values)
    {
        $this->_values = $values;
        $this->createChains();
        $this->attachValidators();
    }

    protected function hasValidationErrors()
    {
        return count($this->_messages) ? true : false;
    }

    protected function createChains()
    {
        foreach ($this->_values as $key => $value)
        {
            $this->_chain[$key] = new ValidatorChain();
        }
    }

    abstract protected function attachValidators();

}
