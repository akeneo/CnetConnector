<?php

namespace Acme\Bundle\AppBundle\Model;

use Pim\Bundle\CnetConnectorBundle\Entity\BrandValueTrait;
use Pim\Bundle\ExtendedAttributeTypeBundle\Model\TextCollectionValueTrait;
use Pim\Component\Catalog\Model\ProductValue as PimProductValue;

/**
 * Overrides the product value to take the range attribute type into account.
 *
 * @author Romain Monceau <romain@akeneo.com>
 */
class ProductValue extends PimProductValue
{
    use BrandValueTrait;
    use TextCollectionValueTrait;
}
