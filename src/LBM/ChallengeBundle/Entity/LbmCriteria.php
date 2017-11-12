<?php

namespace LBM\ChallengeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LbmCriteriaType
 *
 * @ORM\Table(name="lbm_criteria")
 * @ORM\Entity(repositoryClass="LBM\ChallengeBundle\Repository\LbmCriteriaRepository")
 */
class LbmCriteria
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
     * @ORM\Column(name="min_value", type="string", length=255)
     */
    private $minValue;

    /**
     * @var string
     *
     * @ORM\Column(name="max_value", type="string", length=255)
     */
    private $maxValue;


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
     * @return LbmCriteria
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
     * Set minValue
     *
     * @param string $minValue
     *
     * @return LbmCriteria
     */
    public function setMinValue($minValue)
    {
        $this->minValue = $minValue;

        return $this;
    }

    /**
     * Get minValue
     *
     * @return string
     */
    public function getMinValue()
    {
        return $this->minValue;
    }

    /**
     * Set maxValue
     *
     * @param string $maxValue
     *
     * @return LbmCriteria
     */
    public function setMaxValue($maxValue)
    {
        $this->maxValue = $maxValue;

        return $this;
    }

    /**
     * Get maxValue
     *
     * @return string
     */
    public function getMaxValue()
    {
        return $this->maxValue;
    }
}

