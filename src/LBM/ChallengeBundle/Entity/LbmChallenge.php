<?php

namespace LBM\ChallengeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use LBM\ChallengeBundle\LBMChallengeBundle;
use LBM\ExtensionBundle\Entity\LbmExtensionEntity;

/**
 * LbmChallenge
 *
 * @ORM\Table(name="lbm_challenge")
 * @ORM\Entity(repositoryClass="LBM\ChallengeBundle\Repository\LbmChallengeRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class LbmChallenge extends LbmExtensionEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_visible", type="boolean")
     */
    private $isVisible;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_closed", type="boolean")
     */
    private $isClosed;

    /**
     * @var object
     * @ORM\ManyToOne(targetEntity="LBM\ChallengeBundle\Entity\LbmSeason", inversedBy="challenge")
     * @ORM\JoinColumn(name="season_id", referencedColumnName="id")
     */
    private $season;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return LbmChallenge
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
     * Set description
     *
     * @param string $description
     *
     * @return LbmChallenge
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }


    /**
     * Set isVisible
     *
     * @param boolean $isVisible
     *
     * @return LbmChallenge
     */
    public function setIsVisible($isVisible)
    {
        $this->isVisible = $isVisible;

        return $this;
    }

    /**
     * Get isVisible
     *
     * @return bool
     */
    public function getIsVisible()
    {
        return $this->isVisible;
    }

    /**
     * Set isClosed
     *
     * @param boolean $isClosed
     *
     * @return LbmChallenge
     */
    public function setIsClosed($isClosed)
    {
        $this->isClosed = $isClosed;

        return $this;
    }

    /**
     * Get isClosed
     *
     * @return bool
     */
    public function getIsClosed()
    {
        return $this->isClosed;
    }

    /**
     * set season
     *
     * @return LbmChallenge
     */
    public function setSeason(LbmSeason $season)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * Get season
     *
     * @return LbmSeason
     */
    public function getSeason()
    {
        return $this->season;
    }

}

