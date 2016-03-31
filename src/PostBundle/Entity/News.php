<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/31/2016
 * Time: 12:33 PM
 */

namespace PostBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="news")
 * @ORM\AttributeOverrides({
 *      @ORM\AttributeOverride(name="post_id",
 *          column=@ORM\Column(
 *              name     = "news_id",
 *              type     = "integer"
 *          )
 *      )
 * })
 */
class News extends Post
{

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $value;

  
    /**
     * Set name
     *
     * @param string $name
     * @return News
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
     * @return News
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
}
