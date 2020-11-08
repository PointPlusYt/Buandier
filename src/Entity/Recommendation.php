<?php

namespace App\Entity;

use App\Repository\RecommendationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecommendationRepository::class)
 */
class Recommendation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $icon;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Clothe::class, mappedBy="recommendations")
     */
    private $clothes;

    public function __construct()
    {
        $this->clothes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Clothe[]
     */
    public function getClothes(): Collection
    {
        return $this->clothes;
    }

    public function addClothes(Clothe $clothes): self
    {
        if (!$this->clothes->contains($clothes)) {
            $this->clothes[] = $clothes;
            $clothes->addRecommendation($this);
        }

        return $this;
    }

    public function removeClothes(Clothe $clothes): self
    {
        if ($this->clothes->removeElement($clothes)) {
            $clothes->removeRecommendation($this);
        }

        return $this;
    }
}
