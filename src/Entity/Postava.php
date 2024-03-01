<?php

namespace App\Entity;

use App\Repository\PostavaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostavaRepository::class)]
class Postava
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $jmeno = null;

    #[ORM\Column(length: 50)]
    private ?string $prijmeni = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $vek = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $zvire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJmeno(): ?string
    {
        return $this->jmeno;
    }

    public function setJmeno(string $jmeno): static
    {
        $this->jmeno = $jmeno;

        return $this;
    }

    public function getPrijmeni(): ?string
    {
        return $this->prijmeni;
    }

    public function setPrijmeni(string $prijmeni): static
    {
        $this->prijmeni = $prijmeni;

        return $this;
    }

    public function getVek(): ?int
    {
        return $this->vek;
    }

    public function setVek(int $vek): static
    {
        $this->vek = $vek;

        return $this;
    }

    public function getZvire(): ?string
    {
        return $this->zvire;
    }

    public function setZvire(?string $zvire): static
    {
        $this->zvire = $zvire;

        return $this;
    }
}
