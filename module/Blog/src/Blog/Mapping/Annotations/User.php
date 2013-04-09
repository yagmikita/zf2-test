<?php

namespace Blog\Mapping;

use Doctrine\ORM\Mapping as ORM;
use Root\Behavior\MagicEntity;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class User
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
     * @var string
     *
     * @ORM\Column(name="name_full", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name_full;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_birth", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $date_birth;

    /**
     * @var integer
     *
     * @ORM\Column(name="male", type="smallint", precision=0, scale=0, nullable=false, unique=false)
     */
    private $male;

    /**
     * @var Iterator
     *
     * @ORM\ManyToMany(targetEntity="Post")
     * @ORM\JoinTable(name="post_tag_relations",
     *      joinColumns={
     *          @ORM\JoinColumn(name="id_post", referencedColumnName="id")
     *      },
     *      inverseJoinColumns={
     *          @ORM\JoinColumn(name="id_tag", referencedColumnName="id")
     *      }
     * )
     */
    private $posts;

    public function __construct()
    {
        $this->posts = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
