<?php

declare(strict_types=1);

namespace App\Common\Infrastructure;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Facile\DoctrineMySQLComeBack\Doctrine\DBAL\Connection as FacileConnection;
use Facile\DoctrineMySQLComeBack\Doctrine\DBAL\Driver\PDOMySql\Driver as FacileDriver;

class MySqlAdapterFactory
{
    public static function create(
        string $dbName,
        string $user,
        string $password,
        string $host,
        int $port
    ): Connection {
        return DriverManager::getConnection(
            [
                'dbname' => $dbName,
                'user' => $user,
                'password' => $password,
                'host' => $host,
                'port' => (int)$port,
                'driver' => 'pdo_mysql',
                'charset' => 'utf8mb4',
                'wrapperClass' => FacileConnection::class,
                'driverClass' => FacileDriver::class,
                'driverOptions' => [
                    'x_reconnect_attempts' => 3,
                ]
            ]
        );
    }
}
