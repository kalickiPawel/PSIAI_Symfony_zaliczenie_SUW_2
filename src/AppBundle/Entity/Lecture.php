<?php

namespace AppBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lecture
 *
 * @ORM\Table(name="lecture")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LectureRepository")
 */
class Lecture
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
     * @var bool
     *
     * @ORM\Column(name="access", type="boolean")
     */
    private $access;

    /**
     * @var string
     *
     * @ORM\Column(name="lectureFile", type="string", length=255)
     * @Assert\NotBlank(message="Please, upload the lecture File as a PDF file.")
     * @Assert\File(mimeTypes={ "application/pdf" })
     */
    private $lectureFile;


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
     * @return Lecture
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
     * Set access
     *
     * @param boolean $access
     *
     * @return Lecture
     */
    public function setAccess($access)
    {
        $this->access = $access;

        return $this;
    }

    /**
     * Get access
     *
     * @return bool
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * Set lectureFile
     *
     * @param string $lectureFile
     *
     * @return Lecture
     */
    public function setLectureFile($lectureFile)
    {
        $this->lectureFile = $lectureFile;

        return $this;
    }

    /**
     * Get lectureFile
     *
     * @return string
     */
    public function getLectureFile()
    {
        return $this->lectureFile;
    }
}

