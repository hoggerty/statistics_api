<?php declare(strict_types=1);

namespace Hoggerty\StatisticsApp\App\ApplicationLayer\Location\Mapper;

use Hoggerty\StatisticsApp\App\ApplicationLayer\Location\DTO\AppLocationDTO;
use Hoggerty\StatisticsApp\App\DomainLayer\Location\ValueObject\Location;

interface ILocationMapper
{
    public function mapLocationDTO(AppLocationDTO $app_location): Location;
}