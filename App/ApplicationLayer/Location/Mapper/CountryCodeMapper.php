<?php declare(strict_types=1);

namespace Hoggerty\StatisticsApp\App\ApplicationLayer\Location\Mapper;

use Hoggerty\StatisticsApp\App\ApplicationLayer\Location\DTO\AppCountryCode;
use Hoggerty\StatisticsApp\App\DomainLayer\Location\ValueObject\CountryCode;

final class CountryCodeMapper implements ICountryCodeMapper
{
    public function mapAppCountryCode(AppCountryCode $app_country_code): CountryCode
    {
        return CountryCode::from($app_country_code->value);
    }
}