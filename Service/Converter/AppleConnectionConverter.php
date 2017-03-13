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
        $url = $connection->getUrl();
        $type = $connection->getType();
        $pemKeyFile = $connection->getPemKeyFile();
        $pemPasswordPhrase = $connection->getPemPasswordPhrase();

        return new AppleConnection($url, $type, $pemKeyFile, $pemPasswordPhrase);
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
