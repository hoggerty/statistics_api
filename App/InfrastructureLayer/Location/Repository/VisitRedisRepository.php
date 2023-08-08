<?php declare(strict_types=1);

namespace Hoggerty\StatisticsApp\App\InfrastructureLayer\Location\Repository;

use Hoggerty\StatisticsApp\App\DomainLayer\Base\Exception\DataStorageException;
use Hoggerty\StatisticsApp\App\DomainLayer\Location\ValueObject\CountryCode;
use Hoggerty\StatisticsApp\App\DomainLayer\Repository\IVisitRepository;
use Hoggerty\StatisticsApp\App\DomainLayer\Visit\IVisitEntity;
use Hoggerty\StatisticsApp\App\InfrastructureLayer\Base\Repository\AbstractRedisRepository;
use Hoggerty\StatisticsApp\App\InfrastructureLayer\Location\Repository\Mapper\CountryCodeToRedisKeyMapper;
use RedisException;

final class VisitRedisRepository extends AbstractRedisRepository implements IVisitRepository
{
    private const COUNT_BY_COUNTRY_CODE_HASH_TABLE_NAME = 'count_by_country';

    public function save(IVisitEntity $visit): void
    {
        try {
            $this->getConnection()->hIncrBy(
                self::COUNT_BY_COUNTRY_CODE_HASH_TABLE_NAME,
                CountryCodeToRedisKeyMapper::mapCodeToKey($visit->getLocation()->getCountry()->getCode()),
                1
            );
        } catch (RedisException) {
            throw new DataStorageException();
        }
    }

    /**
     * @inheritDoc
     */
    public function getCountByCountryCodes(): array
    {
        $keys = array_map(
            fn(CountryCode $country_code) => CountryCodeToRedisKeyMapper::mapCodeToKey($country_code),
            CountryCode::cases()
        );
        try {
            $count_by_keys = $this->getConnection()->hMGet(
                self::COUNT_BY_COUNTRY_CODE_HASH_TABLE_NAME,
                $keys
            );
        } catch (RedisException) {
            throw new DataStorageException();
        }
        $count_by_country_codes = [];
        foreach ($count_by_keys as $key => $count) {
            $code = CountryCodeToRedisKeyMapper::mapKeyToCode($key)->value;
            $count_by_country_codes[$code] = $count;
        }
        return $count_by_country_codes;
    }
}