<?php declare(strict_types=1);

namespace Hoggerty\StatisticsApp\App\ApplicationLayer\Location\DTO;

final readonly class AppLocationDTO
{
    public function __construct(
        private AppCountryCode $country_code,
    )
    {
    }

    public function getCountryCode(): AppCountryCode
    {
        return $this->country_code;
    }
}