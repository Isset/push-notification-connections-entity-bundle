<?php

declare(strict_types=1);

namespace IssetBV\PushNotificationConnectionsEntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="issetbv_push_notification_connection_android")
 */
class PushNotificationConnectionAndroid extends PushNotificationConnection
{
    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $apiUrl;
    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $apiKey;
    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    private $timeout;
    /**
     * @var bool
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $dryRun;

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        if ($this->apiUrl === null) {
            return 'https://fcm.googleapis.com/fcm/send';
        }

        return $this->apiUrl;
    }

    /**
     * @param string $apiUrl
     */
    public function setApiUrl(string $apiUrl = null)
    {
        $this->apiUrl = $apiUrl;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return int
     */
    public function getTimeout(): int
    {
        if ($this->timeout === null) {
            return 5;
        }

        return $this->timeout;
    }

    /**
     * @param int $timeout
     */
    public function setTimeout(int $timeout)
    {
        $this->timeout = $timeout;
    }

    /**
     * @return bool
     */
    public function isDryRun(): bool
    {
        return $this->dryRun;
    }

    /**
     * @param bool $dryRun
     */
    public function setDryRun(bool $dryRun)
    {
        $this->dryRun = $dryRun;
    }
}
