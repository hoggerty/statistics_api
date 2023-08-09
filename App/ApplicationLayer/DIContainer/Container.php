<?php declare(strict_types=1);

namespace Hoggerty\StatisticsApp\App\ApplicationLayer\DIContainer;

use DI\ContainerBuilder;
use DI;
use Exception;
use Hoggerty\StatisticsApp\App\DomainLayer\Repository\IVisitRepository;
use Hoggerty\StatisticsApp\App\InfrastructureLayer\Location\Repository\VisitRedisRepository;

final class Container
{
    private static ?DI\Container $container_instance = null;

    /**
     * @throws Exception
     */
    public static function getInstance(): DI\Container
    {
        if (null !== self::$container_instance) {
            return self::$container_instance;
        }

        $builder = (new ContainerBuilder())
            ->useAutowiring(true)
            ->addDefinitions(
                DependencyDefinitions::get()
            );

        return self::$container_instance = $builder->build();
    }
}