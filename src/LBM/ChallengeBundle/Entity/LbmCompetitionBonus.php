<?php

namespace LBM\ChallengeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use LBM\ExtensionBundle\Entity\LbmExtensionEntity;

/**
 * LbmCompetitionBonus
 *
 * @ORM\Table(name="lbm_competition_bonus")
 * @ORM\Entity(repositoryClass="LBM\ChallengeBundle\Repository\LbmCompetitionBonusRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class LbmCompetitionBonus extends LbmExtensionEntity
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
     * @var object
     * @ORM\ManyToOne(targetEntity="LBM\ChallengeBundle\Entity\LbmCompetition", inversedBy="competitionBonus")
     * @ORM\JoinColumn(name="competition_id", referencedColumnName="id")
     */
    private $competition;

    /**
     * @var object
     * @ORM\ManyToOne(targetEntity="LBM\ChallengeBundle\Entity\LbmBonus", inversedBy="competitionBonus")
     * @ORM\JoinColumn(name="bonus_id", referencedColumnName="id")
     */
    private $bonus;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;


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
     * Set competition
     *
     * @param \stdClass $competition
     *
     * @return LbmCompetitionBonus
     */
    public function setCompetition($competition)
    {
        $this->competition = $competition;

        return $this;
    }

    /**
     * Get competition
     *
     * @return \stdClass
     */
    public function getCompetition()
    {
        return $this->competition;
    }

    /**
     * Set bonus
     *
     * @param \stdClass $bonus
     *
     * @return LbmCompetitionBonus
     */
    public function setBonus($bonus)
    {
        $this->bonus = $bonus;

        return $this;
    }

    /**
     * Get bonus
     *
     * @return \stdClass
     */
    public function getBonus()
    {
        return $this->bonus;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return LbmCompetitionBonus
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
}

