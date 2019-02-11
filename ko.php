<?php

/** @var \Doctrine\ORM\EntityManager $entityManager */
require_once __DIR__.'/bootstrap.php';

/** @var \App\Entity\Product $product */
$product = $entityManager->getRepository(\App\Entity\Product::class)->find(1);
printf("[Product %d] %s\n", $product->getId(), $product->getName());

$queryBuilder = $entityManager->createQueryBuilder();
$results = $queryBuilder
    ->select('p, i')
    ->from(\App\Entity\Product::class, 'p')
    ->leftJoin('p.images', 'i', 'WITH', 'i.visible = :true')
    ->setParameter(':true', true)
    ->getQuery()
    ->getResult();

/** @var \App\Entity\Product $product */
foreach ($results as $product) {
    printf("Query [Product %d] %d images\n", $product->getId(), $product->getImages()->count());
}
