<?php

namespace spec\Pim\Bundle\CnetConnectorBundle\EventSubscriber;

use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Mapping\ClassMetadata;
use PhpSpec\ObjectBehavior;
use Pim\Bundle\CnetConnectorBundle\EventSubscriber\LabelOptionLengthSubscriber;

class LabelOptionLengthSubscriberSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(LabelOptionLengthSubscriber::class);
    }

    function it_is_an_event_subscriber()
    {
        $this->getSubscribedEvents()->shouldReturn(
            [
                'loadClassMetadata' => 'loadClassMetadata',
            ]
        );
    }

    function it_updates_attribute_option_classmetadata(
        LoadClassMetadataEventArgs $event,
        ClassMetadata $metadata
    ) {
        $metadata->getName()->willReturn('Pim\Bundle\CatalogBundle\Entity\AttributeOptionValue');
        $metadata->getFieldMapping('value')->willReturn(
            [
                'foo'    => 'bar',
                'length' => 50,
            ]
        );
        $event->getClassMetadata()->willReturn($metadata);

        $metadata->setAttributeOverride(
            'value',
            [
                'foo'    => 'bar',
                'length' => 255,
            ]
        )->shouldBeCalled();

        $this->loadClassMetadata($event);
    }
}
