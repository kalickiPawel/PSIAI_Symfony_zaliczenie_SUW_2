<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stats
 *
 * @ORM\Table(name="stats")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StatsRepository")
 */
class Stats
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
     * @ORM\Column(name="NameUser", type="string", length=255)
     */
    private $nameUser;

    /**
     * @var string
     *
     * @ORM\Column(name="NameLecture", type="string", length=255)
     */
    private $nameLecture;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateTime", type="datetime")
     */
    private $dateTime;


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
     * Set nameUser
     *
     * @param string $nameUser
     *
     * @return Stats
     */
    public function setNameUser($nameUser)
    {
        $this->nameUser = $nameUser;

        return $this;
    }

    /**
     * Get nameUser
     *
     * @return string
     */
    public function getNameUser()
    {
        return $this->nameUser;
    }

    /**
     * Set nameLecture
     *
     * @param string $nameLecture
     *
     * @return Stats
     */
    public function setNameLecture($nameLecture)
    {
        $this->nameLecture = $nameLecture;

        return $this;
    }

    /**
     * Get nameLecture
     *
     * @return string
     */
    public function getNameLecture()
    {
        return $this->nameLecture;
    }

    /**
     * Set dateTime
     *
     * @param \DateTime $dateTime
     *
     * @return Stats
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * Get dateTime
     *
     * @return \DateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }
}

