<?php declare(strict_types=1);

namespace Hoggerty\StatisticsApp\App\ApplicationLayer\Location\Service;

use Hoggerty\StatisticsApp\App\ApplicationLayer\Base\Exception\InternalException;
use Hoggerty\StatisticsApp\App\DomainLayer\Base\Exception\DataStorageException;
use Hoggerty\StatisticsApp\App\DomainLayer\Repository\IVisitRepository;

final readonly class GetVisitsCountByCountryCodesService
{
    public function __construct(
        private IVisitRepository $visit_repository,
    )
    {
    }

    /**
     * @return array<AppCountryCode::value, int>
     * @throws InternalException
     */
    public function getCount(): array
    {
        try {
            return $this->visit_repository->getCountByCountryCodes();
        } catch (DataStorageException) {
            throw new InternalException();
        }
    }
}