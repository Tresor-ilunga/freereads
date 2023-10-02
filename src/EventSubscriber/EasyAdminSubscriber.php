<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use App\Entity\Invitation;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Uid\Uuid;

/**
 * Class EasyAdminSubscriber
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class EasyAdminSubscriber implements EventSubscriberInterface
{
    /**
     * @return array[]
     */
    public static function getSubscribedEvents(): array
    {
        return [
            BeforeEntityPersistedEvent::class => ['setUuid'],
        ];
    }

    /**
     * This method is called before persisting an entity in the database.
     *
     * @param BeforeEntityPersistedEvent $event
     * @return void
     */
    public function setUuid(BeforeEntityPersistedEvent $event): void
    {
        $entity = $event->getEntityInstance();

        if ($entity instanceof Invitation) {
            $entity->setUuid(Uuid::v4());
        }

        return;
    }

}