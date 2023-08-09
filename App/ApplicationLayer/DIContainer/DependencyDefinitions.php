<?php declare(strict_types=1);

namespace Hoggerty\StatisticsApp\App\ApplicationLayer\DIContainer;

use Hoggerty\StatisticsApp\App\ApplicationLayer\Location\Mapper\CountryCodeMapper;
use Hoggerty\StatisticsApp\App\ApplicationLayer\Location\Mapper\ICountryCodeMapper;
use Hoggerty\StatisticsApp\App\ApplicationLayer\Location\Mapper\ILocationMapper;
use Hoggerty\StatisticsApp\App\ApplicationLayer\Location\Mapper\LocationMapper;
use Hoggerty\StatisticsApp\App\ApplicationLayer\Location\Service\AddVisitService;
use Hoggerty\StatisticsApp\App\ApplicationLayer\Location\Service\GetVisitsCountByCountryCodesService;
use Hoggerty\StatisticsApp\App\DomainLayer\Repository\IVisitRepository;
use Hoggerty\StatisticsApp\App\InfrastructureLayer\Location\Repository\VisitRedisRepository;
use DI;

final class DependencyDefinitions
{
    public static function get(): array
    {
        return [
            //<editor-fold desc="Repositories">
            IVisitRepository::class => DI\autowire(VisitRedisRepository::class),
            //</editor-fold>

            //<editor-fold desc="Mappers">
            ICountryCodeMapper::class => DI\autowire(CountryCodeMapper::class),
            ILocationMapper::class => DI\autowire(LocationMapper::class),
            //</editor-fold>

            //<editor-fold desc="APP Services">
            AddVisitService::class => DI\autowire(AddVisitService::class),
            GetVisitsCountByCountryCodesService::class => DI\autowire(GetVisitsCountByCountryCodesService::class),
            //</editor-fold>
        ];
    }
}