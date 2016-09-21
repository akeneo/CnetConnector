<?php

namespace Pim\Bundle\CnetConnectorBundle\Entity;

use Pim\Bundle\CnetConnectorBundle\BrandInterface;

/**
 * @author Romain Monceau <romain@akeneo.com>
 */
interface ManufacturerInterface
{
    /**
     * @return string
     */
    public function getLabel();

    /**
     * @param string $label
     *
     * @return ManufacturerInterface
     */
    public function setLabel($label);

    /**
     * @return BrandInterface[]
     */
    public function getBrands();

    /**
     * @param BrandInterface $brand
     *
     * @return ManufacturerInterface
     */
    public function addBrand(BrandInterface $brand);

    /**
     * @param BrandInterface $brand
     *
     * @return ManufacturerInterface
     */
    public function removeBrand(BrandInterface $brand);
}
