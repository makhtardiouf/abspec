<?php
/**
 * abspecialist - Makhtar Diouf <makhtar.diouf@gmail.com>
 * $Id: RecentCases.php,v 8e381f350952 2016/04/02 00:30:58 makhtar $
 */
namespace AbleSpec\ExpertBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RecentCases
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class RecentCases
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
     * @var boolean
     *
     * @ORM\Column(name="is_representative_case", type="boolean", options={"default": false})
     */
    private $isRepresentativeCase;
    
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
     * Set title
     *
     * @param string $title
     *
     * @return RecentCases
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
     * @return RecentCases
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
     * @return RecentCases
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
     * @return RecentCases
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

    /**
     * Set isRepresentativeCase
     *
     * @param boolean $isRepresentativeCase
     *
     * @return RecentCases
     */
    public function setIsRepresentativeCase($isRepresentativeCase)
    {
        $this->isRepresentativeCase = $isRepresentativeCase;

        return $this;
    }

    /**
     * Get isRepresentativeCase
     *
     * @return boolean
     */
    public function getIsRepresentativeCase()
    {
        return $this->isRepresentativeCase;
    }
}
