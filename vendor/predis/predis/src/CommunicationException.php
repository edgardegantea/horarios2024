<?php

/*
 * This file is part of the Predis package.
 *
 * (c) 2009-2020 Daniele Alessandri
 * (c) 2021-2023 Till Krüss
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Predis;

use Exception;
use Predis\Connection\NodeConnectionInterface;

/**
 * Base exception class for network-related errors.
 */
abstract class CommunicationException extends PredisException
{
    private $connection;

    /**
     * @param NodeConnectionInterface $connection     Connection that generated the exception.
     * @param string                  $message        Error message.
     * @param int                     $code           Error code.
     * @param Exception|null          $innerException Inner exception for wrapping the original error.
     */
    public function __construct(
        NodeConnectionInterface $connection,
        $message = '',
        $code = 0,
        Exception $innerException = null
    ) {
        parent::__construct(
            is_null($message) ? '' : $message,
            is_null($code) ? 0 : $code,
            $innerException
        );

        $this->connection = $connection;
    }

    /**
     * Gets the connection that generated the exception.
     *
     * @return NodeConnectionInterface
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * Indicates if the receiver should reset the underlying connection.
     *
     * @return bool
     */
    public function shouldResetConnection()
    {
        return true;
    }

    /**
     * Helper method to handle exceptions generated by a connection object.
     *
     * @param CommunicationException $exception Exception.
     *
     * @throws CommunicationException
     */
    public static function handle(CommunicationException $exception)
    {
        if ($exception->shouldResetConnection()) {
            $connection = $exception->getConnection();

            if ($connection->isConnected()) {
                $connection->disconnect();
            }
        }

        throw $exception;
    }
}
