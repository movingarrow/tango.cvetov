<?php
/**
 * Created by PhpStorm.
 * User: dms
 * Date: 11/8/16
 * Time: 11:16 AM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="event_has_rate")
 */
class EventHasRate
{
    /**
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Event")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $event_id;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Rating")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $rate_id;

    /**
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $user_id;

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
     * Set eventId
     *
     * @param \AppBundle\Entity\Event $eventId
     *
     * @return EventHasRate
     */
    public function setEventId(\AppBundle\Entity\Event $eventId)
    {
        $this->event_id = $eventId;

        return $this;
    }

    /**
     * Get eventId
     *
     * @return \AppBundle\Entity\Event
     */
    public function getEventId()
    {
        return $this->event_id;
    }

    /**
     * Set rateId
     *
     * @param \AppBundle\Entity\Rating $rateId
     *
     * @return EventHasRate
     */
    public function setRateId(\AppBundle\Entity\Rating $rateId)
    {
        $this->rate_id = $rateId;

        return $this;
    }

    /**
     * Get rateId
     *
     * @return \AppBundle\Entity\Rating
     */
    public function getRateId()
    {
        return $this->rate_id;
    }

    /**
     * Set userId
     *
     * @param \AppBundle\Entity\User $userId
     *
     * @return EventHasRate
     */
    public function setUserId(\AppBundle\Entity\User $userId)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return \AppBundle\Entity\User
     */
    public function getUserId()
    {
        return $this->user_id;
    }
}
