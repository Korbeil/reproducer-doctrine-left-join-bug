<?php

/** @var \Doctrine\ORM\EntityManager $entityManager */
$entityManager = require_once __DIR__.'/bootstrap.php';

use App\Entity\Product;

$toto = new Product();
var_dump($toto);
