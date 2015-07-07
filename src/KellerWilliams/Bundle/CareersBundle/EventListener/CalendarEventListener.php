<?php
/**
 * User: joshteam
 * Date: 6/30/15
 * Time: 10:58 AM
 */

namespace KellerWilliams\Bundle\CareersBundle\EventListener;


use ADesigns\CalendarBundle\Event\CalendarEvent;
use ADesigns\CalendarBundle\Entity\EventEntity;
use Doctrine\ORM\EntityManager;

class CalendarEventListener
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function loadEvents(CalendarEvent $calendarEvent)
    {
        $startDate = $calendarEvent->getStartDatetime();
        $endDate = $calendarEvent->getEndDatetime();

        // The original request so you can get filters from the calendar
        // Use the filter in your query for example

        $request = $calendarEvent->getRequest();
//        $filter = $request->get('filter');

        $event = new EventEntity('Title Event', new \DateTime('+1 day'), new \DateTime('+3 day'), true);
        $calendarEvent->addEvent($event);

        $event2 = new EventEntity('Second Event', new \DateTime('+1 day 2 hours'), new \DateTime('+1 day 5 hours'));
        $calendarEvent->addEvent($event2);

        $event2 = new EventEntity('Third Event', new \DateTime('+7 day 4 hours'), new \DateTime('+7 day 5 hours'));
        $calendarEvent->addEvent($event2);





//            //optional calendar event settings
//            $eventEntity->setAllDay(true); // default is false, set to true if this is an all day event
//            $eventEntity->setBgColor('#FF0000'); //set the background color of the event's label
//            $eventEntity->setFgColor('#FFFFFF'); //set the foreground color of the event's label
//            $eventEntity->setUrl('http://www.google.com'); // url to send user to when event label is clicked
//            $eventEntity->setCssClass('my-custom-class'); // a custom class you may want to apply to event labels

            //finally, add the event to the CalendarEvent for displaying on the calendar

    }
}