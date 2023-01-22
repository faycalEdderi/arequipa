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

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Exercice $exerciceName = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?int $repetitionNb = null;

    #[ORM\Column]
    private ?int $serie = null;

    #[ORM\Column(nullable: true)]
    private ?float $weight = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExerciceName(): ?Exercice
    {
        return $this->exerciceName;
    }

    public function setExerciceName(?Exercice $exerciceName): self
    {
        $this->exerciceName = $exerciceName;

        return $this;
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
}
