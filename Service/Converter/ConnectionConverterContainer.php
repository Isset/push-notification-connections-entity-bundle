<?php

declare(strict_types=1);

namespace IssetBV\PushNotificationConnectionsEntityBundle\Service\Converter;

use IssetBV\PushNotification\Core\Connection\Connection;
use IssetBV\PushNotificationConnectionsEntityBundle\Entity\PushNotificationConnection;

/**
 * Class ConnectionConverterContainer.
 */
class ConnectionConverterContainer
{
    /**
     * @var ConnectionConverter[]
     */
    private $converters = [];

    /**
     * ConnectionConverterContainer constructor.
     */
    public function __construct()
    {
        $this->add(new AndroidConnectionConverter());
        $this->add(new AppleConnectionConverter());
        $this->add(new WindowsConnectionConverter());
    }

    /**
     * @param PushNotificationConnection $connection
     *
     * @return Connection
     */
    public function convert(PushNotificationConnection $connection): Connection
    {
        foreach ($this->converters as $converter) {
            if ($converter->handles($connection)) {
                return $converter->convert($connection);
            }
        }

        throw new \LogicException('Couldn\'t convert');
    }

    /**
     * @param ConnectionConverter $connectionConverter
     */
    public function add(ConnectionConverter $connectionConverter)
    {
        $this->converters[] = $connectionConverter;
    }
}
