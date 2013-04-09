<?php

namespace Blog\Validator;

use Root\AbstractFormValidator as AbstractFormValidator;

use Zend\Validator\NotEmpty,
    Zend\Validator\StringLength;

class PostValidator extends AbstractFormValidator
{
    protected function attachValidators()
    {
        $this->_chain['title']
                ->attach(
                    new NotEmpty(),
                    new StringLength(array('min' => 1))
                );
        $this->_chain['text']
                ->attach(
                    new NotEmpty(),
                    new StringLength(array('min' => 1))
                );
    }

}