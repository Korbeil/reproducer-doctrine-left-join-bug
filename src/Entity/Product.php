<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\ManyToOne;
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
     * @var null|Sale
     * @ManyToOne(targetEntity="App\Entity\Sale", inversedBy="products")
     */
    private $sale;

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

    public function getSale(): ?Sale
    {
        return $this->sale;
    }

    public function setSale(Sale $sale): void
    {
        $this->sale = $sale;
    }
}
