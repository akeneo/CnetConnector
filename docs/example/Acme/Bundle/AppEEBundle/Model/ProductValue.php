<?php

namespace Acme\Bundle\AppEEBundle\Model;

use Pim\Bundle\CnetConnectorBundle\Entity\BrandValueTrait;
use Pim\Bundle\ExtendedAttributeTypeBundle\Model\TextCollectionValueTrait;
use PimEnterprise\Component\Catalog\Model\ProductValue as PimProductValue;

/**
 * Overrides the product value to take the brand reference data
 * and the text collection attribute type into account.
 *
 * @author Romain Monceau <romain@akeneo.com>
 */
class ProductValue extends PimProductValue
{
    use BrandValueTrait;
    use TextCollectionValueTrait;
}
