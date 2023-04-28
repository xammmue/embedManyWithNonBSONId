<?php
declare(strict_types=1);

namespace App\Tests\Repository;

use App\Document\Tree;
use App\Repository\TreeRepository;
use App\Tests\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class TreeRepositoryTest extends KernelTestCase
{
    use FixturesTrait;
    private TreeRepository $repository;

    protected function setUp(): void
    {
        $this->repository = static::getContainer()->get(TreeRepository::class);
    }

    protected function tearDown(): void
    {
        $this->tearDownMongoDB();
        parent::tearDown();
    }

    public function test_findByFruitId_returnsCorrectTree(): void
    {
        /** @var Tree[] $trees */
        $trees = $this->loadODMFixtureFiles([__DIR__ . '/fixtures/trees.yaml']);

        $expectedTree = $trees['tree_1'];

        $fruitId = $expectedTree->getBranches()[0]->getFruits()[0]->getId();
        $foundTree = $this->repository->findByFruitId($fruitId);

        self::assertSame($expectedTree, $foundTree);
    }
}