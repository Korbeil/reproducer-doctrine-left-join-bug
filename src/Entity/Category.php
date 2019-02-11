<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Column;

/**
 * @Entity
 * @Table(name="category")
 */
class Category
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
     * @var bool
     * @Column(type="boolean")
     */
    private $visible = false;

    /**
     * @var Collection|Sale[]
     * @ManyToMany(targetEntity="App\Entity\Sale", inversedBy="categories")
     */
    private $sales;

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

    public function isVisible(): bool
    {
        return $this->visible;
    }

    public function setVisible(bool $visible): void
    {
        $this->visible = $visible;
    }

    /**
     * @return Sale[]|Collection
     */
    public function getSales(): Collection
    {
        return $this->sales;
    }

    /**
     * @param Sale[]|Collection $sales
     */
    public function setSales(Collection $sales): void
    {
        $this->sales = $sales;
    }
}
