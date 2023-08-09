<?php declare(strict_types=1);

namespace Hoggerty\StatisticsApp\App\ApplicationLayer\Location\Mapper;

use Hoggerty\StatisticsApp\App\ApplicationLayer\Location\DTO\AppCountryCode;
use Hoggerty\StatisticsApp\App\DomainLayer\Location\ValueObject\CountryCode;

interface ICountryCodeMapper
{
    public function mapAppCountryCode(AppCountryCode $app_country_code): CountryCode;
}