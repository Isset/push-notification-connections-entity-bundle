<?php

declare(strict_types=1);

namespace IssetBV\PushNotificationConnectionsEntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="issetbv_push_notification_connection_apple")
 */
class PushNotificationConnectionApple extends PushNotificationConnection
{
    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $url;
    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $pemKeyFile;
    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $pemPasswordPhrase;

    /**
     * @return string
     */
    public function getUrl(): string
    {
        if ($this->url === null) {
            return 'ssl://gateway.push.apple.com:2195';
        }

        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getPemKeyFile(): string
    {
        return $this->pemKeyFile;
    }

    /**
     * @param string $pemKeyFile
     */
    public function setPemKeyFile(string $pemKeyFile)
    {
        $this->pemKeyFile = $pemKeyFile;
    }

    /**
     * @return string
     */
    public function getPemPasswordPhrase()
    {
        return $this->pemPasswordPhrase;
    }

    /**
     * @param string $pemPasswordPhrase
     */
    public function setPemPasswordPhrase($pemPasswordPhrase = null)
    {
        $this->pemPasswordPhrase = $pemPasswordPhrase;
    }
}
