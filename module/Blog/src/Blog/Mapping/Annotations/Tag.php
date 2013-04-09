<?php

namespace Blog\Mapping;

use Doctrine\ORM\Mapping as ORM;
use Root\Behavior\MagicEntity;

/**
 * Tag
 *
 * @ORM\Table(name="tags")
 * @ORM\Entity
 */
class Tag
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
     * @ORM\Column(name="name", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="descr", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $descr;

    /**
     * @var Iterator
     *
     * @ORM\ManyToMany(targetEntity="Post")
     * @ORM\JoinTable(name="post_tag_relations",
     *      joinColumns={
     *          @ORM\JoinColumn(name="id_tag", referencedColumnName="id")
     *      },
     *      inverseJoinColumns={
     *          @ORM\JoinColumn(name="id_post", referencedColumnName="id")
     *      }
     * )
     */
    private $posts;


    public function __construct()
    {
        $this->posts = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
