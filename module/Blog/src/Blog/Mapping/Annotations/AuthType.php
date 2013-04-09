<?php

namespace Blog\Mapping;

use Doctrine\ORM\Mapping as ORM;
use Root\Behavior\MagicEntity;

/**
 * Auth Type
 *
 * @ORM\Table(name="auth_type")
 * @ORM\Entity
 */
class AuthType
{
    use MagicEntity;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(name="auth_type", type="int", precision=0, scale=0, nullable=false, unique=false)
     */
    private $auth_type;

}
