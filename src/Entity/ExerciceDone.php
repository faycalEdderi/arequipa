<?php

namespace App\Entity;

use App\Repository\ExerciceDoneRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExerciceDoneRepository::class)]
class ExerciceDone
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;



    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?int $repetitionNb = null;

    #[ORM\Column]
    private ?int $serie = null;

    #[ORM\Column(nullable: true)]
    private ?float $weight = null;

    #[ORM\ManyToOne(inversedBy: 'user_program')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(length: 255)]
    private ?string $exerciceName = null;



    public function getId(): ?int
    {
        return $this->id;
    }



    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getRepetitionNb(): ?int
    {
        return $this->repetitionNb;
    }

    public function setRepetitionNb(int $repetitionNb): self
    {
        $this->repetitionNb = $repetitionNb;

        return $this;
    }

    public function getSerie(): ?int
    {
        return $this->serie;
    }

    public function setSerie(int $serie): self
    {
        $this->serie = $serie;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(?float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function __toString(): string
    {
        return  $this->weight . ' ' . $this->serie . ' ' . $this->repetitionNb;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getExerciceName(): ?string
    {
        return $this->exerciceName;
    }

    public function setExerciceName(string $exerciceName): self
    {
        $this->exerciceName = $exerciceName;

        return $this;
    }
}
