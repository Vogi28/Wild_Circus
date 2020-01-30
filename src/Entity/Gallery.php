<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GalleryRepository")
 */
class Gallery
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
    private $photos;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Shows", inversedBy="photo")
     */
    private $shows;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhotos(): ?string
    {
        return $this->photos;
    }

    public function setPhotos(string $photos): self
    {
        $this->photos = $photos;

        return $this;
    }

    public function getShows(): ?Shows
    {
        return $this->shows;
    }

    public function setShows(?Shows $shows): self
    {
        $this->shows = $shows;

        return $this;
    }
}
