<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/31/2016
 * Time: 12:35 PM
 */

namespace PostBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="category")
 */
class Category
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $category_id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $url;

    /**
     * @ORM\OneToMany(targetEntity="Blog", mappedBy="Category")
     */
    private $Blogs;

    public function __construct() {
        $this->Blogs = new ArrayCollection();
    }

  
    /**
     * Get category_id
     *
     * @return integer 
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
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
     * Set url
     *
     * @param string $url
     * @return Category
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
     * Add Blogs
     *
     * @param \PostBundle\Entity\Blog $blogs
     * @return Category
     */
    public function addBlog(\PostBundle\Entity\Blog $blogs)
    {
        $this->Blogs[] = $blogs;

        return $this;
    }

    /**
     * Remove Blogs
     *
     * @param \PostBundle\Entity\Blog $blogs
     */
    public function removeBlog(\PostBundle\Entity\Blog $blogs)
    {
        $this->Blogs->removeElement($blogs);
    }

    /**
     * Get Blogs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBlogs()
    {
        return $this->Blogs;
    }
}
