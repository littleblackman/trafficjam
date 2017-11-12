<?php

namespace LBM\ChallengeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use LBM\ExtensionBundle\Entity\LbmExtensionEntity;

/**
 * LbmMember
 *
 * @ORM\Table(name="lbm_member")
 * @ORM\Entity(repositoryClass="LBM\ChallengeBundle\Repository\LbmMemberRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class LbmMember extends LbmExtensionEntity
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
     * @ORM\ManyToOne(targetEntity="LBM\ChallengeBundle\Entity\LbmTeam", inversedBy="member")
     * @ORM\JoinColumn(name="team_id", referencedColumnName="id")
     */
    private $team;

    /**
     * @var object
     * @ORM\ManyToOne(targetEntity="LBM\ChallengeBundle\Entity\LbmUser", inversedBy="member")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;


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
     * Set team
     *
     * @param \stdClass $team
     *
     * @return LbmMember
     */
    public function setTeam($team)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return \stdClass
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set user2
     *
     * @param \stdClass $user2
     *
     * @return LbmMember
     */
    public function setUser($user)
    {
        $this->user2 = $user;

        return $this;
    }

    /**
     * Get user2
     *
     * @return \stdClass
     */
    public function getUser()
    {
        return $this->user;
    }
}

