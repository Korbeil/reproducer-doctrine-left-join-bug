<?php

/** @var \Doctrine\ORM\EntityManager $entityManager */
require_once __DIR__.'/bootstrap.php';

/** @var \App\Entity\Sale $sale */
$sale = $entityManager->getRepository(\App\Entity\Sale::class)->find(1);
printf("[Sale %d] %s\n", $sale->getId(), $sale->getName());

$queryBuilder = $entityManager->createQueryBuilder();
$results = $queryBuilder
    ->select('p, s, c')
    ->from(\App\Entity\Product::class, 'p')
    ->leftJoin('p.sale', 's')
    ->leftJoin('s.categories', 'c')
    ->getQuery()
    ->getResult();

/** @var \App\Entity\Product $product */
foreach ($results as $product) {
    if ($product->getSale() instanceof \App\Entity\Sale) {
        printf("Query [Product %d] %d categories\n", $product->getId(), $product->getSale()->getCategories()->count());
    }
}
