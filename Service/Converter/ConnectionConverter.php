<?php

declare(strict_types=1);

namespace IssetBV\PushNotificationConnectionsEntityBundle\Service\Converter;

use IssetBV\PushNotification\Core\Connection\Connection;
use IssetBV\PushNotificationConnectionsEntityBundle\Entity\PushNotificationConnection;

/**
 * Interface ConnectionConverter.
 */
interface ConnectionConverter
{
    /**
     * @param PushNotificationConnection $connection
     *
     * @return Connection
     */
    public function convert(PushNotificationConnection $connection): Connection;

    /**
     * @param PushNotificationConnection $connection
     *
     * @return bool
     */
    public function handles(PushNotificationConnection $connection): bool;
}
