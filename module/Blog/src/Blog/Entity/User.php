<?php

namespace Blog\Entity;

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
     * @ORM\ManyToOne(targetEntity="AuthType")
     * @ORM\JoinColumn(name="id_auth_type", referencedColumnName="id")
     */
    private $auth_type;

    /**
     * @var string login
     *
     * @ORM\Column(name="login", type="string", length=127, precision=0, scale=0, nullable=false, unique=false)
     */
    private $login;

    /**
     * @var string password
     *
     * @ORM\Column(name="password", type="string", length=127, precision=0, scale=0, nullable=false, unique=false)
     */
    private $password;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Blog\Entity\Post")
     * @ORM\JoinTable(name="post_tag_relations",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_post", referencedColumnName="id", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_tag", referencedColumnName="id", nullable=true)
     *   }
     * )
     */
    private $posts;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->posts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name_full
     *
     * @param string $nameFull
     * @return User
     */
    public function setNameFull($nameFull)
    {
        $this->name_full = $nameFull;

        return $this;
    }

    /**
     * Get name_full
     *
     * @return string
     */
    public function getNameFull()
    {
        return $this->name_full;
    }

    /**
     * Set date_birth
     *
     * @param \DateTime $dateBirth
     * @return User
     */
    public function setDateBirth($dateBirth)
    {
        $this->date_birth = $dateBirth;

        return $this;
    }

    /**
     * Get date_birth
     *
     * @return \DateTime
     */
    public function getDateBirth()
    {
        return $this->date_birth;
    }

    /**
     * Set male
     *
     * @param integer $male
     * @return User
     */
    public function setMale($male)
    {
        $this->male = $male;

        return $this;
    }

    /**
     * Get male
     *
     * @return integer
     */
    public function getMale()
    {
        return $this->male;
    }

    /**
     * Set login
     *
     * @param string $login
     * @return Post
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Post
     */
    public function setPaswword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set auth_type
     *
     * @param int $tags
     * @return Post
     */
    public function setAuthType($auth_type)
    {
        $this->auth_type = $auth_type;

        return $this;
    }

    /**
     * Get auth_type
     *
     * @return Post
     */
    public function getAuthType()
    {
        return $this->auth_type;
    }

    /**
     * Add posts
     *
     * @param \Blog\Entity\Post $posts
     * @return User
     */
    public function addPost(\Blog\Entity\Post $posts)
    {
        $this->posts[] = $posts;

        return $this;
    }

    /**
     * Remove posts
     *
     * @param \Blog\Entity\Post $posts
     */
    public function removePost(\Blog\Entity\Post $posts)
    {
        $this->posts->removeElement($posts);
    }

    /**
     * Get posts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPosts()
    {
        return $this->posts;
    }
}
