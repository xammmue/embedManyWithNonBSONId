<?php
declare(strict_types=1);

namespace App\Repository;

use App\Document\Tree;
use Doctrine\Bundle\MongoDBBundle\Repository\ServiceDocumentRepository;
use Doctrine\Bundle\MongoDBBundle\ManagerRegistry;

class TreeRepository extends ServiceDocumentRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tree::class);
    }

    public function findByFruitId(string $fruitId): ?Tree
    {
        return $this->createQueryBuilder()
            ->field('branches.fruits.id')->equals($fruitId)
            ->getQuery()
            ->getSingleResult();
    }
}