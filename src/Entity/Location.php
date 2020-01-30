<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LocationRepository")
 */
class Location
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Shows", mappedBy="location", cascade={"persist"})
     */
    private $shows;

    public function __construct()
    {
        $this->shows = new ArrayCollection();
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
     * @return Collection|Shows[]
     */
    public function getShows(): Collection
    {
        return $this->shows;
    }

    public function addShow(Shows $show): self
    {
        if (!$this->shows->contains($show)) {
            $this->shows[] = $show;
            $show->addLocation($this);
        }

        return $this;
    }

    public function removeShow(Shows $show): self
    {
        if ($this->shows->contains($show)) {
            $this->shows->removeElement($show);
            $show->removeLocation($this);
        }

        return $this;
    }
}
