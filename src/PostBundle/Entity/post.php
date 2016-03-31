<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/31/2016
 * Time: 12:16 PM
 */

namespace PostBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="post")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"news" = "News", "blog" = "Blog"})
 */
abstract class Post
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $post_id;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $url;

    /**
     * @ORM\Column(type="date")
     */
    private $created_on;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enabled;

    /**
     * @ORM\ManyToOne(targetEntity="Author", inversedBy="Posts")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="author_id")
     */
    private $Author;


    /**
     * @var \Doctrine\Common\Collections\Collection|Tag[]
     *
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="Posts")
     * @ORM\JoinTable(
     *  name="post_tag",
     *  joinColumns={
     *      @ORM\JoinColumn(name="post_id", referencedColumnName="post_id")
     *  },
     *  inverseJoinColumns={
     *      @ORM\JoinColumn(name="tag_id", referencedColumnName="tag_id")
     *  }
     * )
     */
    private $Tags;

    public function __construct() {
        $this->Tags = new ArrayCollection();
    }



    /**
     * Get post_id
     *
     * @return integer 
     */
    public function getPostId()
    {
        return $this->post_id;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Post
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set created_on
     *
     * @param \DateTime $createdOn
     * @return Post
     */
    public function setCreatedOn($createdOn)
    {
        $this->created_on = $createdOn;

        return $this;
    }

    /**
     * Get created_on
     *
     * @return \DateTime 
     */
    public function getCreatedOn()
    {
        return $this->created_on;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Post
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set Author
     *
     * @param \PostBundle\Entity\Author $author
     * @return Post
     */
    public function setAuthor(\PostBundle\Entity\Author $author = null)
    {
        $this->Author = $author;

        return $this;
    }

    /**
     * Get Author
     *
     * @return \PostBundle\Entity\Author 
     */
    public function getAuthor()
    {
        return $this->Author;
    }

    /**
     * Add Tags
     *
     * @param \PostBundle\Entity\Tag $tags
     * @return Post
     */
    public function addTag(\PostBundle\Entity\Tag $tags)
    {
        $this->Tags[] = $tags;

        return $this;
    }

    /**
     * Remove Tags
     *
     * @param \PostBundle\Entity\Tag $tags
     */
    public function removeTag(\PostBundle\Entity\Tag $tags)
    {
        $this->Tags->removeElement($tags);
    }

    /**
     * Get Tags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->Tags;
    }
}
