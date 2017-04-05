<?php

declare(strict_types=1);

namespace IssetBV\PushNotificationConnectionsEntityBundle\Service\Converter;

use IssetBV\PushNotification\Core\Connection\Connection;
use IssetBV\PushNotification\Type\Apple\AppleConnection;
use IssetBV\PushNotificationConnectionsEntityBundle\Entity\PushNotificationConnection;
use IssetBV\PushNotificationConnectionsEntityBundle\Entity\PushNotificationConnectionApple;

/**
 * Class AppleConnectionConverter.
 */
class AppleConnectionConverter implements ConnectionConverter
{
    /**
     * @param PushNotificationConnection|PushNotificationConnectionApple $connection
     *
     * @return Connection
     */
    public function convert(PushNotificationConnection $connection): Connection
    {
        return new AppleConnection(
            $connection->getType(),
            $connection->getUrl(),
            $connection->getPemKeyFile(),
            $connection->getPemPasswordPhrase()
        );
    }

    /**
     * @param PushNotificationConnection $connection
     *
     * @return bool
     */
    public function handles(PushNotificationConnection $connection): bool
    {
        return $connection instanceof PushNotificationConnectionApple;
    }
}
