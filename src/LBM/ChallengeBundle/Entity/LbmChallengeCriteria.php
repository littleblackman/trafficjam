<?php

namespace LBM\ChallengeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LbmChallengeCriteria
 *
 * @ORM\Table(name="lbm_challenge_criteria")
 * @ORM\Entity(repositoryClass="LBM\ChallengeBundle\Repository\LbmChallengeCriteriaRepository")
 */
class LbmChallengeCriteria
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
     * @ORM\ManyToOne(targetEntity="LBM\ChallengeBundle\Entity\LbmCriteria", inversedBy="challengeCriteria")
     * @ORM\JoinColumn(name="criteria_id", referencedColumnName="id")
     */
    private $criteria;

    /**
     * @ORM\ManyToOne(targetEntity="LBM\ChallengeBundle\Entity\LbmChallenge", inversedBy="challengeCriteria")
     * @ORM\JoinColumn(name="challenge_id", referencedColumnName="id")
     */
    private $challenge;


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
     * @return LbmChallengeCriteria
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
     * Set criteria
     *
     * @param LbmCriteria $criteria
     *
     * @return LbmChallengeCriteria
     */
    public function setCriteria($criteria)
    {
        $this->criteria = $criteria;

        return $this;
    }

    /**
     * Get criteria
     *
     * @return LbmCriteria
     */
    public function getCriteria()
    {
        return $this->criteria;
    }

    /**
     * Get challenge
     *
     * @return LbmChallenge
     */
    public function getChallenge()
    {
        return $this->challenge;
    }

    /**
     * Set challenge
     *
     * @param LbmChallenge $challenge
     *
     * @return LbmChallenge
     */
    public function setChallenge($challenge)
    {
        $this->challenge = $challenge;

        return $this;
    }


}

