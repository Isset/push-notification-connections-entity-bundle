<?php

declare(strict_types=1);

namespace IssetBV\PushNotificationConnectionsEntityBundle\Service\Converter;

use IssetBV\PushNotification\Core\Connection\Connection;
use IssetBV\PushNotification\Type\Windows\WindowsConnection;
use IssetBV\PushNotificationConnectionsEntityBundle\Entity\PushNotificationConnection;
use IssetBV\PushNotificationConnectionsEntityBundle\Entity\PushNotificationConnectionWindows;

/**
 * Class WindowsConnectionConverter.
 */
class WindowsConnectionConverter implements ConnectionConverter
{
    /**
     * @param PushNotificationConnection $connection
     *
     * @return Connection
     */
    public function convert(PushNotificationConnection $connection): Connection
    {
        return new WindowsConnection($connection->getType());
    }

    /**
     * @param PushNotificationConnection $connection
     *
     * @return bool
     */
    public function handles(PushNotificationConnection $connection): bool
    {
        return $connection instanceof PushNotificationConnectionWindows;
    }
}
