<?php declare(strict_types=1);

namespace Hoggerty\StatisticsApp\App\ApplicationLayer\Location\Mapper;

use Hoggerty\StatisticsApp\App\ApplicationLayer\Location\DTO\AppLocationDTO;
use Hoggerty\StatisticsApp\App\DomainLayer\Location\ValueObject\Country;
use Hoggerty\StatisticsApp\App\DomainLayer\Location\ValueObject\Location;

final readonly class LocationMapper implements ILocationMapper
{
    public function __construct(
        private ICountryCodeMapper $country_code_mapper,
    )
    {
    }

    public function mapLocationDTO(AppLocationDTO $app_location): Location
    {
        return new Location(
            new Country(
                $this->country_code_mapper->mapAppCountryCode($app_location->getCountryCode()),
            ),
        );
    }
}