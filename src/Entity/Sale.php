<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\Common\Collections\Collection;

/**
 * @Entity
 * @Table(name="sale")
 */
class Sale
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
     * @var Collection|Category[]
     * @ManyToMany(targetEntity="App\Entity\Category")
     */
    private $categories;

    /**
     * @var Collection|Product[]
     * @OneToMany(targetEntity="App\Entity\Product", mappedBy="sale")
     */
    private $products;

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
     * @return Category[]|Collection
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    /**
     * @param Category[]|Collection $categories
     */
    public function setCategories(Collection $categories): void
    {
        $this->categories = $categories;
    }

    /**
     * @return Product[]|Collection
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    /**
     * @param Product[]|Collection $products
     */
    public function setProducts(Collection $products): void
    {
        $this->products = $products;
    }
}
