<?php

namespace Pim\Bundle\CnetConnectorBundle\Entity;

use Pim\Component\Catalog\Model\ProductValueInterface;

/**
 * Trait to reuse in the overridden ProductValue on the dedicated project
 *
 * @author Romain Monceau <romain@akeneo.com>
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
