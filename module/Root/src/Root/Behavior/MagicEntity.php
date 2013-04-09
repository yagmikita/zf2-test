<?php

namespace Root\Behavior;

trait MagicEntity
{
    /**
     * @access public
     */
    public function populate(array $fields)
    {
        foreach ($fields as $key => $value) {
            $methodName = 'set'.ucfirst($key);
            if (method_exists($this, $methodName)) {
                $this->$methodName($value);
            }
        }
    }

    public function __set($key, $value)
    {
        if (property_exists($this, $key))
            $this->$key = $value;
        return null;
    }

    public function __get($key)
    {
        return property_exists($this, $key) ? $this->$key : null;
    }

    public function __call($name, $arguments)
    {
        $matches = array();
        $pattern = '/^set([A-Za-z0-9]+)/';
        if (preg_match($pattern, $name, $matches)) {
            return $this->__set($this->getProp($matches[1]), $arguments[0]);
        }
        $pattern = '/^get([A-Za-z0-9]+)/';
		if (preg_match($pattern, $name, $matches)) {
            return $this->__get($this->getProp($matches[1]));
        }
    }

    protected function getProp($matches)
    {
        return strtolower($matches[0]) . substr($matches, 1, strlen($matches)-1);
    }

}