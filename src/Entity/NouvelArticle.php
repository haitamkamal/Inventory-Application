<?php

namespace App\Entity;

use App\Repository\NouvelArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NouvelArticleRepository::class)]
class NouvelArticle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 200)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    // Create ManyToOne relationship with NouvelleCategorie
    #[ORM\ManyToOne(targetEntity: NouvelleCategorie::class, inversedBy: 'articles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?NouvelleCategorie $categorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): static
    {
        $this->date = $date;
        return $this;
    }

    public function getCategorie(): ?NouvelleCategorie
    {
        return $this->categorie;
    }

    public function setCategorie(NouvelleCategorie $categorie): static
    {
        $this->categorie = $categorie;
        return $this;
    }
}
