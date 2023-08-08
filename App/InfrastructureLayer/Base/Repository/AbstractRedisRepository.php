<?php declare(strict_types=1);

namespace Hoggerty\StatisticsApp\App\InfrastructureLayer\Base\Repository;

use Hoggerty\StatisticsApp\App\DomainLayer\Base\Exception\DataStorageException;
use Redis;
use RedisException;

abstract class AbstractRedisRepository
{
    public function __construct(
        private readonly Redis $connection,
    )
    {
    }

    /**
     * @throws DataStorageException
     */
    protected function getConnection(): Redis
    {
        try {
            if ($this->connection->isConnected()) {
                return $this->connection;
            }
            if (
                !$this->connection->pconnect(
                    host: $this->connection->getHost(),
                    port: $this->connection->getPort(),
                    timeout: $this->connection->getTimeout(),
                    persistent_id: $this->connection->getPersistentID(),
                    read_timeout: $this->connection->getReadTimeout(),
                )
            ) {
                throw new DataStorageException();
            }
        } catch (RedisException) {
            throw new DataStorageException();
        }

        return $this->connection;
    }
}