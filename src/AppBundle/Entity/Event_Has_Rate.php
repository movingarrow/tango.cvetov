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
class Event_Has_Rate
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Event")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $event_id;

    /**
     * @ORM\ManyToOne(targetEntity="Rating")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $rate_id;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $user_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getEventId()
    {
        return $this->event_id;
    }

    /**
     * @param mixed $event_id
     */
    public function setEventId($event_id)
    {
        $this->event_id = $event_id;
    }

    /**
     * @return mixed
     */
    public function getRateId()
    {
        return $this->rate_id;
    }

    /**
     * @param mixed $rate_id
     */
    public function setRateId($rate_id)
    {
        $this->rate_id = $rate_id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

}