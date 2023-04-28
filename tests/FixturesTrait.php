<?php

declare(strict_types=1);

namespace App\Tests;


use Fidry\AliceDataFixtures\Persistence\PurgeMode;
use Symfony\Component\DependencyInjection\ContainerInterface;

trait FixturesTrait
{
    /**
     * @param string[] $files
     * @param object[] $objects
     */
    protected function loadFixtureFiles(array $files, array $objects = []): array
    {
        /** @var ContainerInterface $container */
        $container = static::getContainer();

        return $container
            ->get('fidry_alice_data_fixtures.loader.doctrine')
            ->load($files, [], $objects, PurgeMode::createNoPurgeMode());
    }

    /**
     * @param string[] $file
     */
    protected function loadODMFixtureFiles(array $file, array $parameters = [], array $objects = []): array
    {
        return static::getContainer()
            ->get('fidry_alice_data_fixtures.loader.doctrine_mongodb')
            ->load($file, $parameters, $objects, PurgeMode::createTruncateMode());
    }

    protected function tearDownMongoDB(): void
    {
        static::getContainer()->get('fidry_alice_data_fixtures.persistence.doctrine_mongodb.purger.purger_factory')
            ->purge();
    }
}
