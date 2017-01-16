<?php

namespace Pim\Bundle\CnetConnectorBundle\Entity;

use Pim\Component\Catalog\Model\ProductValueInterface;

/**
 * Trait to reuse in the overridden ProductValue on the dedicated project
 *
 * @author    Romain Monceau <romain@akeneo.com>
 * @copyright 2016 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
trait BrandValueTrait
{
    /** @var BrandInterface */
    protected $brand;

    /**
     * @return BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param BrandInterface $brand
     *
     * @return ProductValueInterface
     */
    public function setBrand(BrandInterface $brand)
    {
        $this->brand = $brand;

        return $this;
    }
}
