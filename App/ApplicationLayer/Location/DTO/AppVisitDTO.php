<?php declare(strict_types=1);

namespace Hoggerty\StatisticsApp\App\ApplicationLayer\Location\DTO;

final readonly class AppVisitDTO
{
    public function __construct(
        private AppLocationDTO $location,
    )
    {
    }

    public function getLocation(): AppLocationDTO
    {
        return $this->location;
    }
}