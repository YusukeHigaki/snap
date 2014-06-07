<?php

namespace Yusuke\SnapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Model
 *
 * @ORM\Entity(repositoryClass="Yusuke\SnapBundle\Entity\Repository\ModelRepository")
 * @ORM\Table(name="model")
 */
class Model
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer", nullable=true)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="tops", type="string", length=100, nullable=true)
     */
    private $tops;

    /**
     * @var string
     *
     * @ORM\Column(name="inner", type="string", length=100, nullable=true)
     */
    private $inner;

    /**
     * @var string
     *
     * @ORM\Column(name="bottom", type="string", length=100, nullable=true)
     */
    private $bottom;

    /**
     * @var string
     *
     * @ORM\Column(name="bag", type="string", length=100, nullable=true)
     */
    private $bag;

    /**
     * @var string
     *
     * @ORM\Column(name="shoes", type="string", length=100, nullable=true)
     */
    private $shoes;

    /**
     * @var string
     *
     * @ORM\Column(name="watch", type="string", length=100, nullable=true)
     */
    private $watch;

    /**
     * @var string
     *
     * @ORM\Column(name="glasses", type="string", length=100, nullable=true)
     */
    private $glasses;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=100, nullable=true)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="career", type="string", length=100, nullable=true)
     */
    private $career;

    /**
     * @var string
     *
     * @ORM\Column(name="pic1", type="string", length=100, nullable=true)
     */
    private $pic1;

    /**
     * @var string
     *
     * @ORM\Column(name="pic2", type="string", length=100, nullable=true)
     */
    private $pic2;

    /**
     * @var string
     *
     * @ORM\Column(name="pic3", type="string", length=100, nullable=true)
     */
    private $pic3;

    /**
     * @var boolean
     *
     * @ORM\Column(name="delete_flag", type="boolean", nullable=false)
     */
    private $deleteFlag;

    /**
     * @var boolean
     *
     * @ORM\Column(name="show_flag", type="boolean", nullable=false)
     */
    private $showFlag;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;



    /**
     * @var string
     */
    private $url;

    /**
     * Set name
     *
     * @param string $name
     * @return Model
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
     * Set age
     *
     * @param integer $age
     * @return Model
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set tops
     *
     * @param string $tops
     * @return Model
     */
    public function setTops($tops)
    {
        $this->tops = $tops;

        return $this;
    }

    /**
     * Get tops
     *
     * @return string 
     */
    public function getTops()
    {
        return $this->tops;
    }

    /**
     * Set inner
     *
     * @param string $inner
     * @return Model
     */
    public function setInner($inner)
    {
        $this->inner = $inner;

        return $this;
    }

    /**
     * Get inner
     *
     * @return string 
     */
    public function getInner()
    {
        return $this->inner;
    }

    /**
     * Set bottom
     *
     * @param string $bottom
     * @return Model
     */
    public function setBottom($bottom)
    {
        $this->bottom = $bottom;

        return $this;
    }

    /**
     * Get bottom
     *
     * @return string 
     */
    public function getBottom()
    {
        return $this->bottom;
    }

    /**
     * Set bag
     *
     * @param string $bag
     * @return Model
     */
    public function setBag($bag)
    {
        $this->bag = $bag;

        return $this;
    }

    /**
     * Get bag
     *
     * @return string 
     */
    public function getBag()
    {
        return $this->bag;
    }

    /**
     * Set shoes
     *
     * @param string $shoes
     * @return Model
     */
    public function setShoes($shoes)
    {
        $this->shoes = $shoes;

        return $this;
    }

    /**
     * Get shoes
     *
     * @return string 
     */
    public function getShoes()
    {
        return $this->shoes;
    }

    /**
     * Set watch
     *
     * @param string $watch
     * @return Model
     */
    public function setWatch($watch)
    {
        $this->watch = $watch;

        return $this;
    }

    /**
     * Get watch
     *
     * @return string 
     */
    public function getWatch()
    {
        return $this->watch;
    }

    /**
     * Set glasses
     *
     * @param string $glasses
     * @return Model
     */
    public function setGlasses($glasses)
    {
        $this->glasses = $glasses;

        return $this;
    }

    /**
     * Get glasses
     *
     * @return string 
     */
    public function getGlasses()
    {
        return $this->glasses;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return Model
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set career
     *
     * @param string $career
     * @return Model
     */
    public function setCareer($career)
    {
        $this->career = $career;

        return $this;
    }

    /**
     * Get career
     *
     * @return string 
     */
    public function getCareer()
    {
        return $this->career;
    }

    /**
     * Set pic1
     *
     * @param string $pic1
     * @return Model
     */
    public function setPic1($pic1)
    {
        $this->pic1 = $pic1;

        return $this;
    }

    /**
     * Get pic1
     *
     * @return string 
     */
    public function getPic1()
    {
        return $this->pic1;
    }

    /**
     * Set pic2
     *
     * @param string $pic2
     * @return Model
     */
    public function setPic2($pic2)
    {
        $this->pic2 = $pic2;

        return $this;
    }

    /**
     * Get pic2
     *
     * @return string 
     */
    public function getPic2()
    {
        return $this->pic2;
    }

    /**
     * Set pic3
     *
     * @param string $pic3
     * @return Model
     */
    public function setPic3($pic3)
    {
        $this->pic3 = $pic3;

        return $this;
    }

    /**
     * Get pic3
     *
     * @return string 
     */
    public function getPic3()
    {
        return $this->pic3;
    }

    /**
     * Set deleteFlag
     *
     * @param boolean $deleteFlag
     * @return Model
     */
    public function setDeleteFlag($deleteFlag)
    {
        $this->deleteFlag = $deleteFlag;

        return $this;
    }

    /**
     * Get deleteFlag
     *
     * @return boolean 
     */
    public function getDeleteFlag()
    {
        return $this->deleteFlag;
    }

    /**
     * Set showFlag
     *
     * @param boolean $showFlag
     * @return Model
     */
    public function setShowFlag($showFlag)
    {
        $this->showFlag = $showFlag;

        return $this;
    }

    /**
     * Get showFlag
     *
     * @return boolean 
     */
    public function getShowFlag()
    {
        return $this->showFlag;
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Model
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Model
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set url
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
}
