<?php

namespace LBM\ChallengeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use LBM\ExtensionBundle\Entity\LbmExtensionEntity;

/**
 * LbmCompetition
 *
 * @ORM\Table(name="lbm_competition")
 * @ORM\Entity(repositoryClass="LBM\ChallengeBundle\Repository\LbmCompetitionRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class LbmCompetition extends LbmExtensionEntity
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
     * @ORM\ManyToOne(targetEntity="LBM\ChallengeBundle\Entity\LbmChallenge", inversedBy="competition")
     * @ORM\JoinColumn(name="challenge_id", referencedColumnName="id")
     */
    private $challenge;

    /**
     * @ORM\ManyToOne(targetEntity="LBM\ChallengeBundle\Entity\LbmTeam", inversedBy="competition")
     * @ORM\JoinColumn(name="team_id", referencedColumnName="id")
     */
    private $team;


    /**
     * @ORM\ManyToOne(targetEntity="LBM\ChallengeBundle\Entity\LbmCompetitionBonus", inversedBy="competition")
     * @ORM\JoinColumn(name="bonus_id", referencedColumnName="id")
     */
    private $bonus;


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
     * Set team
     *
     * @param LbmTeam $team
     *
     * @return LbmTeam
     */
    public function setTeam($team)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return LbmTeam
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set bonus
     *
     * @param LbmBonus $bonus
     *
     * @return LbmCompetition
     */
    public function setBonus($bonus)
    {
        $this->bonus = $bonus;

        return $this;
    }

    /**
     * Get bonus
     *
     * @return LbmCompetitionBonus
     */
    public function getBonus()
    {
        return $this->bonus;
    }
}

