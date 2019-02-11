<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\Common\Collections\Collection;

/**
 * @Entity
 * @Table(name="product")
 */
class Product
{
    /**
     * @var int
     * @Id
     * @GeneratedValue()
     * @Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @Column(type="string")
     */
    private $name;

    /**
     * @var Collection|Image[]
     * @ManyToMany(targetEntity="App\Entity\Image")
     */
    private $images;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Image[]|Collection
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    /**
     * @param Image[]|Collection $images
     */
    public function setImage(Collection $images): void
    {
        $this->images = $images;
    }
}
