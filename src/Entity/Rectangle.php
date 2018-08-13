<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RectangleRepository")
 */
class Rectangle
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $width;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $height;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $background_color;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $border_radius;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $border_width;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $border_color;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $border_style;

    public function getId()
    {
        return $this->id;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(?int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(?int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getBackgroundColor(): ?string
    {
        return $this->background_color;
    }

    public function setBackgroundColor(?string $background_color): self
    {
        $this->background_color = $background_color;

        return $this;
    }

    public function getBorderRadius(): ?int
    {
        return $this->border_radius;
    }

    public function setBorderRadius(?int $border_radius): self
    {
        $this->border_radius = $border_radius;

        return $this;
    }

    public function getBorderWidth(): ?int
    {
        return $this->border_width;
    }

    public function setBorderWidth(?int $border_width): self
    {
        $this->border_width = $border_width;

        return $this;
    }

    public function getBorderColor(): ?string
    {
        return $this->border_color;
    }

    public function setBorderColor(?string $border_color): self
    {
        $this->border_color = $border_color;

        return $this;
    }

    public function getBorderStyle(): ?string
    {
        return $this->border_style;
    }

    public function setBorderStyle(?string $border_style): self
    {
        $this->border_style = $border_style;

        return $this;
    }
}
