<?php

namespace LBM\ChallengeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use LBM\ExtensionBundle\Entity\LbmExtensionEntity;

/**
 * LbmEvaluation
 *
 * @ORM\Table(name="lbm_evaluation")
 * @ORM\Entity(repositoryClass="LBM\ChallengeBundle\Repository\LbmEvaluationRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class LbmEvaluation extends LbmExtensionEntity
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
     * @ORM\ManyToOne(targetEntity="LBM\ChallengeBundle\Entity\LbmCompetition", inversedBy="evaluation")
     * @ORM\JoinColumn(name="competiton_id", referencedColumnName="id")
     */
    private $competition;

    /**
     * @var object
     * @ORM\ManyToOne(targetEntity="LBM\ChallengeBundle\Entity\LbmCriteria", inversedBy="evaluation")
     * @ORM\JoinColumn(name="criteria_id", referencedColumnName="id")
     */
    private $criteria;

    /**
     * @var object
     * @ORM\ManyToOne(targetEntity="LBM\ChallengeBundle\Entity\LbmUser", inversedBy="evaluation")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $assessor;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=255)
     */
    private $comment;


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
     * @param object $competition
     *
     * @return LbmCompetition
     */
    public function setCompetition($competition)
    {
        $this->competition = $competition;

        return $this;
    }

    /**
     * Get competition
     *
     * @return object
     */
    public function getCompetition()
    {
        return $this->competition;
    }

    /**
     * Set criteria
     *
     * @param object $criteria
     *
     * @return LbmCriteria
     */
    public function setCriteria($criteria)
    {
        $this->criteria = $criteria;

        return $this;
    }

    /**
     * Get criteria
     *
     * @return object
     */
    public function getCriteria()
    {
        return $this->criteria;
    }

    /**
     * Set assessor
     *
     * @param object $assessor
     *
     * @return LbmUser
     */
    public function setAssessor($assessor)
    {
        $this->assessor = $assessor;

        return $this;
    }

    /**
     * Get $assessor
     *
     * @return object
     */
    public function getAassessor()
    {
        return $this->$assessor;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return LbmEvaluation
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
     * Set comment
     *
     * @param string $comment
     *
     * @return LbmEvaluation
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }


    /**
     * Set maxValue
     *
     * @param string $maxValue
     *
     * @return LbmEvaluation
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

