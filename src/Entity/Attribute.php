<?php

namespace App\Entity;

use App\Repository\AttributeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AttributeRepository::class)
 */
class Attribute
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=AttributeGroup::class, inversedBy="attributes")
     */
    private $groups;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $data_type;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $input_type;

    /**
     * @ORM\OneToMany(targetEntity=AttributeOption::class, mappedBy="attribute", orphanRemoval=true, cascade={"persist"})
     */
    private $options;

    public function __construct()
    {
        $this->groups = new ArrayCollection();
        $this->options = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|AttributeGroup[]
     */
    public function getGroups(): Collection
    {
        return $this->groups;
    }

    public function addGroup(AttributeGroup $group): self
    {
        if (!$this->groups->contains($group)) {
            $this->groups[] = $group;
        }

        return $this;
    }

    public function removeGroup(AttributeGroup $group): self
    {
        if ($this->groups->contains($group)) {
            $this->groups->removeElement($group);
        }

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getDataType(): ?string
    {
        return $this->data_type;
    }

    public function setDataType(string $data_type): self
    {
        $this->data_type = $data_type;

        return $this;
    }

    public function getInputType(): ?string
    {
        return $this->input_type;
    }

    public function setInputType(string $input_type): self
    {
        $this->input_type = $input_type;

        return $this;
    }

    /**
     * @return Collection|AttributeOption[]
     */
    public function getOptions(): Collection
    {
        return $this->options;
    }

    public function addOption(AttributeOption $option): self
    {
        if (!$this->options->contains($option)) {
            $this->options[] = $option;
            $option->setAttribute($this);
        }

        return $this;
    }

    public function removeOption(AttributeOption $option): self
    {
        if ($this->options->contains($option)) {
            $this->options->removeElement($option);
            // set the owning side to null (unless already changed)
            if ($option->getAttribute() === $this) {
                $option->setAttribute(null);
            }
        }

        return $this;
    }
}
