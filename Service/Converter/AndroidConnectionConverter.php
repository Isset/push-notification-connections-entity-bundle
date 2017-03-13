<?php

declare(strict_types=1);

namespace IssetBV\PushNotificationConnectionsEntityBundle\Service\Converter;

use IssetBV\PushNotification\Core\Connection\Connection;
use IssetBV\PushNotification\Type\Android\AndroidConnection;
use IssetBV\PushNotificationConnectionsEntityBundle\Entity\PushNotificationConnection;
use IssetBV\PushNotificationConnectionsEntityBundle\Entity\PushNotificationConnectionAndroid;

/**
 * Class AndroidConnectionConverter.
 */
class AndroidConnectionConverter implements ConnectionConverter
{
    /**
     * @param PushNotificationConnection|PushNotificationConnectionAndroid $connection
     *
     * @return Connection
     */
    public function convert(PushNotificationConnection $connection): Connection
    {
        $type = $connection->getType();
        $apiUrl = $connection->getApiUrl();
        $apiKey = $connection->getApiKey();
        $timeout = $connection->getTimeout();
        $dryRun = $connection->isDryRun();

        return new AndroidConnection($type, $apiUrl, $apiKey, $timeout, $dryRun);
    }

    /**
     * @param PushNotificationConnection $connection
     *
     * @return bool
     */
    public function handles(PushNotificationConnection $connection): bool
    {
        return $connection instanceof PushNotificationConnectionAndroid;
    }
}
