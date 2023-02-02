<?php

namespace App\Entity;

use App\Repository\PokemonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PokemonRepository::class)]
class Pokemon
{
    #[ORM\Id]
    //#[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $base_experience = null;

    #[ORM\Column]
    private ?int $height = null;

    #[ORM\Column]
    private ?int $weight = null;

    #[ORM\Column]
    private ?int $hp = null;

    #[ORM\Column]
    private ?int $attack = null;

    #[ORM\Column]
    private ?int $defense = null;

    #[ORM\Column]
    private ?int $special_attack = null;

    #[ORM\Column]
    private ?int $special_defense = null;

    #[ORM\Column]
    private ?int $speed = null;

    #[ORM\ManyToMany(targetEntity: Types::class, inversedBy: 'pokemon')]
    private Collection $types;

    #[ORM\ManyToMany(targetEntity: Abilities::class, inversedBy: 'pokemon')]
    private Collection $abilities;

    public function __construct()
    {
        $this->types = new ArrayCollection();
        $this->abilities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function setId(int $id):self
    {
        $this->id = $id;
        
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBaseExperience(): ?int
    {
        return $this->base_experience;
    }

    public function setBaseExperience(int $base_experience): self
    {
        $this->base_experience = $base_experience;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getHp(): ?int
    {
        return $this->hp;
    }

    public function setHp(int $hp): self
    {
        $this->hp = $hp;

        return $this;
    }

    public function getAttack(): ?int
    {
        return $this->attack;
    }

    public function setAttack(int $attack): self
    {
        $this->attack = $attack;

        return $this;
    }

    public function getDefense(): ?int
    {
        return $this->defense;
    }

    public function setDefense(int $defense): self
    {
        $this->defense = $defense;

        return $this;
    }

    public function getSpecialAttack(): ?int
    {
        return $this->special_attack;
    }

    public function setSpecialAttack(int $special_attack): self
    {
        $this->special_attack = $special_attack;

        return $this;
    }

    public function getSpecialDefense(): ?int
    {
        return $this->special_defense;
    }

    public function setSpecialDefense(int $special_defense): self
    {
        $this->special_defense = $special_defense;

        return $this;
    }

    public function getSpeed(): ?int
    {
        return $this->speed;
    }

    public function setSpeed(int $speed): self
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * @return Collection<int, Types>
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(Types $type): self
    {
        if (!$this->types->contains($type)) {
            $this->types->add($type);
        }

        return $this;
    }

    public function removeType(Types $type): self
    {
        $this->types->removeElement($type);

        return $this;
    }

    /**
     * @return Collection<int, Abilities>
     */
    public function getAbilities(): Collection
    {
        return $this->abilities;
    }

    public function addAbility(Abilities $ability): self
    {
        if (!$this->abilities->contains($ability)) {
            $this->abilities->add($ability);
        }

        return $this;
    }

    public function removeAbility(Abilities $ability): self
    {
        $this->abilities->removeElement($ability);

        return $this;
    }
}
