<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/31/2016
 * Time: 12:36 PM
 */

namespace PostBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tag")
 */
class Tag
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $tag_id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;


    /**
     * @ORM\ManyToMany(targetEntity="Post", mappedBy="Tags")
     */
    private $Posts;

    public function __construct() {
        $this->Posts = new ArrayCollection();
    }


    /**
     * Get tag_id
     *
     * @return integer 
     */
    public function getTagId()
    {
        return $this->tag_id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Tag
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add Posts
     *
     * @param \PostBundle\Entity\Post $posts
     * @return Tag
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
