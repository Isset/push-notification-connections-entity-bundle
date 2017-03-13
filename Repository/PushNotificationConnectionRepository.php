<?php

declare(strict_types=1);

namespace IssetBV\PushNotificationConnectionsEntityBundle\Repository;

use Doctrine\ORM\EntityRepository;
use PhpOption\Option;

/**
 * Class PushNotificationConnectionRepository.
 */
class PushNotificationConnectionRepository extends EntityRepository
{
    /**
     * @param string $type
     *
     * @return Option<PushNotificationConnection>
     */
    public function fetchByType(string $type): Option
    {
        $qb = $this->createQueryBuilder('pnc');
        $qb->where('pnc.type = :type');
        $qb->setParameter('type', $type);

        return Option::fromValue($qb->getQuery()->getOneOrNullResult());
    }
}
