<?php declare(strict_types=1);

namespace Hoggerty\StatisticsApp\App\DomainLayer\Repository;

use Hoggerty\StatisticsApp\App\DomainLayer\Base\Exception\DataStorageException;
use Hoggerty\StatisticsApp\App\DomainLayer\Location\ValueObject\CountryCode;
use Hoggerty\StatisticsApp\App\DomainLayer\Visit\IVisitEntity;

interface IVisitRepository
{
    /**
     * @param IVisitEntity $visit
     * @return void
     *
     * @throws DataStorageException
     */
    public function save(IVisitEntity $visit): void;

    /**
     * @return array<CountryCode, int>
     *
     * @throws DataStorageException
     */
    public function getCountByCountryCodes(): array;
}