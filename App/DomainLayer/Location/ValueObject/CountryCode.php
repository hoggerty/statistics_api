<?php declare(strict_types=1);

namespace Hoggerty\StatisticsApp\App\DomainLayer\Location\ValueObject;

enum CountryCode: string
{
    case Russia = 'ru';
    case USA = 'us';
    case China = 'ch';
    case Italy = 'it';
}
