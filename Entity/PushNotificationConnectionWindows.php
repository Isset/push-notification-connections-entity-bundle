<?php

declare(strict_types=1);

namespace IssetBV\PushNotificationConnectionsEntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="issetbv_push_notification_connection_windows")
 */
class PushNotificationConnectionWindows extends PushNotificationConnection
{
}
