<?php declare(strict_types=1);

namespace Hoggerty\StatisticsApp\App\DomainLayer\Visit;

use Hoggerty\StatisticsApp\App\DomainLayer\Location\ValueObject\Location;

interface IVisitEntity
{
    public function getLocation(): Location;
}