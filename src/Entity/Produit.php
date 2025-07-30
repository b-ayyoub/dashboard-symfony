<?php

namespace App\Entity;

use App\Entity\Categorie;
use App\Repository\ProduitRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\Length(min: 3, max: 255)]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reference = null;

    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 255)]
    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[Assert\NotBlank]
    #[Assert\Length(min: 10)]
    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[Assert\NotNull]
    #[Assert\PositiveOrZero]
    #[ORM\Column]
    private ?int $stock = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[Assert\NotNull]
    #[ORM\ManyToOne(inversedBy: 'produits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $categorie = null;

    #[Assert\Positive]
    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2, nullable: true)]
    private ?string $prix = null;

    // Getters & Setters...

    public function getId(): ?int { return $this->id; }

    public function getReference(): ?string { return $this->reference; }

    public function setReference(?string $reference): static {
        $this->reference = $reference;
        return $this;
    }

    public function getLibelle(): ?string { return $this->libelle; }

    public function setLibelle(string $libelle): static {
        $this->libelle = $libelle;
        return $this;
    }

    public function getDescription(): ?string { return $this->description; }

    public function setDescription(string $description): static {
        $this->description = $description;
        return $this;
    }

    public function getStock(): ?int { return $this->stock; }

    public function setStock(int $stock): static {
        $this->stock = $stock;
        return $this;
    }

    public function getPhoto(): ?string { return $this->photo; }

    public function setPhoto(?string $photo): static {
        $this->photo = $photo;
        return $this;
    }

    public function getCategorie(): ?Categorie { return $this->categorie; }

    public function setCategorie(?Categorie $categorie): static {
        $this->categorie = $categorie;
        return $this;
    }

    public function getPrix(): ?string { return $this->prix; }

    public function setPrix(?string $prix): static {
        $this->prix = $prix;
        return $this;
    }
}
