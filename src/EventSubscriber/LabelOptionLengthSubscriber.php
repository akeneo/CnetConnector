<?php

namespace Pim\Bundle\CnetConnectorBundle\EventSubscriber;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Pim\Component\Catalog\Model\AttributeOptionValueInterface;

/**
 *
 * @author    Romain Monceau <romain@akeneo.com>
 * @copyright 2017 Akeneo SAS (http://www.akeneo.com)
 */
class LabelOptionLengthSubscriber implements EventSubscriber
{


    public function getSubscribedEvents()
    {
        return [
            'loadClassMetadata' => 'loadClassMetadata'
        ];
    }

    /**
     * Extends
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
