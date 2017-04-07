<?php

namespace Pim\Bundle\CnetConnectorBundle\EventSubscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;

/**
 * Changes "value" field length to manage with all option translations
 *
 * @author    Romain Monceau <romain@akeneo.com>
 * @copyright 2017 Akeneo SAS (http://www.akeneo.com)
 */
class LabelOptionLengthSubscriber implements EventSubscriber
{
    /**
     * {@inheritdoc}
     */
    public function getSubscribedEvents()
    {
        return [
            'loadClassMetadata' => 'loadClassMetadata'
        ];
    }

    /**
     * Changes "value" field length to manage with long option translations
     *
     * @param LoadClassMetadataEventArgs $lifecycleEventArgs
     */
    public function loadClassMetadata(LoadClassMetadataEventArgs $lifecycleEventArgs)
    {
        $classMetadata = $lifecycleEventArgs->getClassMetadata();
        if ($classMetadata->getName() === 'Pim\Bundle\CatalogBundle\Entity\AttributeOptionValue') {
            $fieldMapping = $classMetadata->getFieldMapping('value');
            $fieldMapping['length'] = 255;
            $classMetadata->setAttributeOverride('value', $fieldMapping);
        }
    }
}
