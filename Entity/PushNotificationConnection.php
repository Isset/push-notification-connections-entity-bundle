<?php

declare(strict_types=1);

namespace IssetBV\PushNotificationConnectionsEntityBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="IssetBV\PushNotificationConnectionsEntityBundle\Repository\PushNotificationConnectionRepository")
 * @ORM\Table(name="issetbv_push_notification_connections")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="connection_type", type="string")
 * @ORM\DiscriminatorMap({
 *      "android" = "PushNotificationConnectionAndroid",
 *      "apple" = "PushNotificationConnectionApple",
 *      "windows" = "PushNotificationConnectionWindows"
 * })
 */
abstract class PushNotificationConnection
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false, unique=true)
     */
    private $type;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $dateCreated;

    /**
     * PushNotificationConnection constructor.
     */
    public function __construct()
    {
        $this->dateCreated = new DateTime();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return DateTime
     */
    public function getDateCreated(): DateTime
    {
        return $this->dateCreated;
    }
}
