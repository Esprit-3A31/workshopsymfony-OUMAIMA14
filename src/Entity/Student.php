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
}
