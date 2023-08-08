<?php declare(strict_types=1);

namespace Hoggerty\StatisticsApp\App\DomainLayer\Location\ValueObject;

use Hoggerty\StatisticsApp\App\DomainLayer\Location\ValueObject\Country;

final readonly class Location
{
    public function __construct(
        private Country $country,
    )
    {
    }

    public function getCountry(): Country
    {
        return $this->country;
    }
}