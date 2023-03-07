<?php

namespace App\EventSubscriber;

use App\Entity\Club;
use App\Entity\Section;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityUpdatedEvent;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PostImageSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            AfterEntityPersistedEvent::class => ['resizeImage'],
            AfterEntityUpdatedEvent::class => ['resizeImage']
        ];
    }

    function resizeImage($event)
    {
        $result = $event->getEntityInstance();

        if (!($result instanceof Section) && !($result instanceof Club)) {
            return;
        }

        $imagePath = 'uploads/' . $result->getImageUrl();

        Image::load($imagePath)->crop(Manipulations::CROP_CENTER, 1600, 500)->save();
    }
}