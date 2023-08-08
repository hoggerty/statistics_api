<?php declare(strict_types=1);

namespace Hoggerty\StatisticsApp\App\InfrastructureLayer\Location\Repository\Mapper;

use Hoggerty\StatisticsApp\App\DomainLayer\Location\ValueObject\CountryCode;

final class CountryCodeToRedisKeyMapper
{
    private const KEY_PREFIX = 'Country:';

    public static function mapCodeToKey(CountryCode $code): string
    {
        return self::KEY_PREFIX . $code->value;
    }

    public static function mapKeyToCode(string $key): CountryCode
    {
        $country_code = str_replace(self::KEY_PREFIX, '', $key);
        return CountryCode::from($country_code);
    }
}