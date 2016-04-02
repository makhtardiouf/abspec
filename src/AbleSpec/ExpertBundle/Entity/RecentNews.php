<?php
/**
 * abspecialist - Makhtar Diouf <makhtar.diouf@gmail.com>
 * $Id: RecentNews.php,v 8e381f350952 2016/04/02 00:30:58 makhtar $
 */
namespace AbleSpec\ExpertBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//use \AbleSpec\AdminBundle\Entity\Expert as Expert;

/**
 * RecentNews
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class RecentNews
{
    
    /**
     * @ORM\ManyToOne(targetEntity="\AbleSpec\AdminBundle\Entity\Expert")
     * @ORM\JoinColumn(name="expert_id", referencedColumnName="id")
     * Should set default id = 0
     * */
    protected $expert;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="field", type="string", length=255)
     */
    private $field;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationdate", type="date")
     */
    private $creationdate;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;


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
     * Set field
     *
     * @param string $field
     *
     * @return RecentNews
     */
    public function setField($field)
    {
        $this->field = $field;

        return $this;
    }

    /**
     * Get field
     *
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return RecentNews
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set creationdate
     *
     * @param \DateTime $creationdate
     *
     * @return RecentNews
     */
    public function setCreationdate($creationdate)
    {
        $this->creationdate = $creationdate;

        return $this;
    }

    /**
     * Get creationdate
     *
     * @return \DateTime
     */
    public function getCreationdate()
    {
        return $this->creationdate;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return RecentNews
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set expert
     *
     * @param \AbleSpec\AdminBundle\Entity\Expert $expert
     *
     * @return RecentNews
     */
    public function setExpert(\AbleSpec\AdminBundle\Entity\Expert $expert = null)
    {
        $this->expert = $expert;

        return $this;
    }

    /**
     * Get expert
     *
     * @return \AbleSpec\ExpertBundle\Entity\Expert
     */
    public function getExpert()
    {
        return $this->expert;
    }
}
