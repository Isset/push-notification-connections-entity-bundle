<?php

declare(strict_types=1);

namespace IssetBV\PushNotificationConnectionsEntityBundle\Service;

use IssetBV\PushNotification\Core\Connection\Connection;
use IssetBV\PushNotification\Core\Connection\ConnectionHandlerException;
use IssetBV\PushNotification\Core\Connection\ConnectionHandlerExceptionImpl;
use IssetBV\PushNotification\Core\Connection\ConnectionHandlerImpl;
use IssetBV\PushNotificationConnectionsEntityBundle\Repository\PushNotificationConnectionRepository;
use IssetBV\PushNotificationConnectionsEntityBundle\Service\Converter\ConnectionConverterContainer;

/**
 * Class EntityConnectionHandler.
 */
class EntityConnectionHandler extends ConnectionHandlerImpl
{
    /**
     * @var PushNotificationConnectionRepository
     */
    private $pushNotificationConnectionRepository;
    /**
     * @var ConnectionConverterContainer
     */
    private $converterContainer;

    /**
     * EntityConnectionHandler constructor.
     *
     * @param PushNotificationConnectionRepository $pushNotificationConnectionRepository
     * @param ConnectionConverterContainer $converterContainer
     */
    public function __construct(
        PushNotificationConnectionRepository $pushNotificationConnectionRepository,
        ConnectionConverterContainer $converterContainer
    ) {
        $this->pushNotificationConnectionRepository = $pushNotificationConnectionRepository;
        $this->converterContainer = $converterContainer;
    }

    /**
     * @param string $type
     *
     * @throws ConnectionHandlerException
     *
     * @return Connection
     */
    public function getConnection(string $type = null): Connection
    {
        if (!parent::hasConnectionType($type)) {
            $connectionData = $this->pushNotificationConnectionRepository->fetchByType($type)->getOrThrow(new ConnectionHandlerExceptionImpl('connection not found for type: ' . $type));
            $this->addConnection($this->converterContainer->convert($connectionData));
        }

        return parent::getConnection($type);
    }
}
