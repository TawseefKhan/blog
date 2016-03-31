<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/31/2016
 * Time: 12:34 PM
 */

namespace PostBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="author")
 */
class Author
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $author_id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="Post", mappedBy="Author")
     */
    private $Posts;

    public function __construct() {
        $this->Posts = new ArrayCollection();
    }

    
    /**
     * Get author_id
     *
     * @return integer 
     */
    public function getAuthorId()
    {
        return $this->author_id;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Author
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Author
     */
    public function setPassword($password)
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
     * Add Posts
     *
     * @param \PostBundle\Entity\Post $posts
     * @return Author
     */
    public function addPost(\PostBundle\Entity\Post $posts)
    {
        $this->Posts[] = $posts;

        return $this;
    }

    /**
     * Remove Posts
     *
     * @param \PostBundle\Entity\Post $posts
     */
    public function removePost(\PostBundle\Entity\Post $posts)
    {
        $this->Posts->removeElement($posts);
    }

    /**
     * Get Posts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPosts()
    {
        return $this->Posts;
    }
}
