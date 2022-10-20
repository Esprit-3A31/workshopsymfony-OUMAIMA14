<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $nce = null;

    #[ORM\Column(length: 10)]
    private ?string $Username = null;

    #[ORM\ManyToOne(inversedBy: 'students')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Classroom $classroom = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Classroom $classroometranger = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNce(): ?string
    {
        return $this->nce;
    }

    public function setNce(string $nce): self
    {
        $this->nce = $nce;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->Username;
    }

    public function setUsername(string $Username): self
    {
        $this->Username = $Username;

        return $this;
    }

    public function getClassroom(): ?Classroom
    {
        return $this->classroom;
    }

    public function setClassroom(?Classroom $classroom): self
    {
        $this->classroom = $classroom;

        return $this;
    }

    public function getClassroometranger(): ?Classroom
    {
        return $this->classroometranger;
    }

    public function setClassroometranger(?Classroom $classroometranger): self
    {
        $this->classroometranger = $classroometranger;

        return $this;
    }
}
