<?php

namespace App\Entity;

use App\Repository\OffreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffreRepository::class)]
class Offre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $price = null;
    #[ORM\Column(length: 255)]
    private ?string $link = null;

    #[ORM\ManyToOne(inversedBy: 'offre')]
    private ?Game $offre = null;

    #[ORM\Column(length: 128, nullable: true)]
    private ?string $plateformeActivation = null;

    #[ORM\Column(length: 64, nullable: true)]
    private ?string $coupons = null;

 
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $lien_offre): static
    {
        $this->link = $lien_offre;

        return $this;
    }

    public function getOffre(): ?Game
    {
        return $this->offre;
    }

    public function setOffre(?Game $offre): static
    {
        $this->offre = $offre;

        return $this;
    }

    public function getPlateformeActivation(): ?string
    {
        return $this->plateformeActivation;
    }

    public function setPlateformeActivation(?string $plateformeActivation): static
    {
        $this->plateformeActivation = $plateformeActivation;

        return $this;
    }

    public function getCoupons(): ?string
    {
        return $this->coupons;
    }

    public function setCoupons(?string $coupons): static
    {
        $this->coupons = $coupons;

        return $this;
    }



}
