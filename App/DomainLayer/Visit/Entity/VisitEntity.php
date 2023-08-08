<?php declare(strict_types=1);

namespace Hoggerty\StatisticsApp\App\DomainLayer\Visit;

use Hoggerty\StatisticsApp\App\DomainLayer\Location\ValueObject\Location;

final class VisitEntity implements IVisitEntity
{
    public function __construct(
        private readonly Location $location,
    )
    {
    }

    public function getLocation(): Location
    {
        return $this->location;
    }
}