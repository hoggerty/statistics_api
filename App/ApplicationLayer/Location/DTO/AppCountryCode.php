<?php declare(strict_types=1);

namespace Hoggerty\StatisticsApp\App\ApplicationLayer\Location\DTO;

use Hoggerty\StatisticsApp\App\DomainLayer\Location\ValueObject\CountryCode as DomainCountryCode;

enum AppCountryCode: string
{
    case Russia = DomainCountryCode::Russia->value;
    case USA = DomainCountryCode::USA->value;
    case China = DomainCountryCode::China->value;
    case Italy = DomainCountryCode::Italy->value;
}
