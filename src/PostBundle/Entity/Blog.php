<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/31/2016
 * Time: 12:32 PM
 */

namespace PostBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="blog")
 * @ORM\AttributeOverrides({
 *      @ORM\AttributeOverride(name="post_id",
 *          column=@ORM\Column(
 *              name     = "blog_id",
 *              type     = "integer"
 *          )
 *      )
 * })
 */
class Blog extends Post
{

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="Blogs")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="category_id")
     */
    private $Category;

    public function __construct() {
    }


    /**
     * Set name
     *
     * @param string $name
     * @return Blog
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
     * Set value
     *
     * @param string $value
     * @return Blog
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
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
     * Set Category
     *
     * @param \PostBundle\Entity\Category $category
     * @return Blog
     */
    public function setCategory(\PostBundle\Entity\Category $category = null)
    {
        $this->Category = $category;

        return $this;
    }

    /**
     * Get Category
     *
     * @return \PostBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->Category;
    }
}
