<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectStudentRepository")
 */
class ProjectStudent
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\HackathonRegistration", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Author;

    /**
     * @ORM\Column(type="datetime")
     */
    private $CreateAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $UpdateAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthor(): ?HackathonRegistration
    {
        return $this->Author;
    }

    public function setAuthor(HackathonRegistration $Author): self
    {
        $this->Author = $Author;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->CreateAt;
    }

    public function setCreateAt(\DateTimeInterface $CreateAt): self
    {
        $this->CreateAt = $CreateAt;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->UpdateAt;
    }

    public function setUpdateAt(\DateTimeInterface $UpdateAt): self
    {
        $this->UpdateAt = $UpdateAt;

        return $this;
    }
}
