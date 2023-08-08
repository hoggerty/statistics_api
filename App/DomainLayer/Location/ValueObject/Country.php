<?php declare(strict_types=1);

namespace Hoggerty\StatisticsApp\App\DomainLayer\Location\ValueObject;

final readonly class Country
{
    public function __construct(
        private CountryCode $code,
    )
    {
    }

    public function getCode(): CountryCode
    {
        return $this->code;
    }
}