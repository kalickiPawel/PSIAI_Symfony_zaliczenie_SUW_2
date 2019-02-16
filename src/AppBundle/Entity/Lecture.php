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
     * @var string
     *
     * @ORM\Column(name="course", type="string", length=255)
     */
    private $course;

    /**
     * @var string
     *
     * @ORM\Column(name="lectureFile", type="string", length=255)
     * @Assert\NotBlank(message="Please, upload the lecture File as a PDF file.")
     * @Assert\File(mimeTypes={ "application/pdf" })
     * @Assert\File(maxSize="6000000")
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
     * Set course
     *
     * @param string $course

     */
    public function setCourse($course)
    {
        $this->course = $course;
    }

    /**
     * Get course
     *
     * @return string
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * Set lectureFile
     *
     * @param string $lectureFile

     */
    public function setLectureFile($lectureFile)
    {
        $this->lectureFile = $lectureFile;
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