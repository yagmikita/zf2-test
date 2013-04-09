<?php

namespace Blog\Mapping;

use Doctrine\ORM\Mapping as ORM;
use Root\Behavior\MagicEntity;

/**
 * Post
 *
 * @ORM\Table(name="posts")
 * @ORM\Entity
 */
class Post
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
     * @ORM\ManyToOne(targetEntity="AuthType")
     * @ORM\JoinColumn(name="id_auth_type", referencedColumnName="id")
     */
    private $auth_type;

    /**
     * @ORM\Column(name="login", type="string", length=127)
     */
    private $login;

    /**
     * @ORM\Column(name="title", type="string", length="127")
     */
    private $password;

    /**
     * @ORM\Column(name="title", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $title;

    /**
     * @ORM\Column(name="text", type="text", precision=0, scale=0, nullable=false, unique=false)
     */
    private $text;

    /**
     * @ORM\Column(name="date_create", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $date_create;

    /**
     * @ORM\ManyToMany(targetEntity="Tag")
     * @ORM\JoinTable(name="post_tag_relations",
     *      joinColumns={
     *          @ORM\JoinColumn(name="id_post", referencedColumnName="id")
     *      },
     *      inverseJoinColumns={
     *          @ORM\JoinColumn(name="id_tag", referencedColumnName="id")
     *      }
     * )
     */
    private $tags;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="author", referencedColumnName="id")
     */
    private $author;

    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
