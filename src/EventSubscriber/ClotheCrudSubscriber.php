<?php

namespace App\EventSubscriber;

use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ClotheCrudSubscriber implements EventSubscriberInterface
{
    public function onBeforeEntityPersistedEvent(BeforeEntityPersistedEvent $event)
    {
        dump($event);
    }

    public static function getSubscribedEvents()
    {
        return [
            // BeforeEntityPersistedEvent::class => 'onBeforeEntityPersistedEvent',
        ];
    }
}
