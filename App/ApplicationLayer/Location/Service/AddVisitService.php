<?php declare(strict_types=1);

namespace Hoggerty\StatisticsApp\App\ApplicationLayer\Location\Service;

use Hoggerty\StatisticsApp\App\ApplicationLayer\Base\Exception\InternalException;
use Hoggerty\StatisticsApp\App\ApplicationLayer\Location\DTO\AppVisitDTO;
use Hoggerty\StatisticsApp\App\ApplicationLayer\Location\Mapper\ILocationMapper;
use Hoggerty\StatisticsApp\App\DomainLayer\Base\Exception\DataStorageException;
use Hoggerty\StatisticsApp\App\DomainLayer\Repository\IVisitRepository;
use Hoggerty\StatisticsApp\App\DomainLayer\Visit\VisitEntity;

final readonly class AddVisitService
{
    public function __construct(
        private ILocationMapper $location_mapper,
        private IVisitRepository $visit_repository,
    )
    {
    }

    /**
     * @throws InternalException
     */
    public function add(AppVisitDTO $visit): void
    {
        try {
            $this->visit_repository->save(
                new VisitEntity(
                    $this->location_mapper->mapLocationDTO($visit->getLocation()),
                )
            );
        } catch (DataStorageException) {
            throw new InternalException();
        }
    }
}