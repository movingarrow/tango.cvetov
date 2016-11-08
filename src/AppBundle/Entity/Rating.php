<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
* @ORM\Table(name="rating")
*/
class Rating
{
/**
* @ORM\Id
* @ORM\GeneratedValue(strategy="AUTO")
* @ORM\Column(type="integer")
*/
private $id;

/**
* @ORM\Column(type="integer")
*/
private $rate;

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
public function getRate()
{
return $this->rate;
}

/**
* @param mixed $rate
*/
public function setRate($rate)
{
$this->rate = $rate;
}

}