<?php

namespace Pim\Bundle\CnetConnectorBundle\Entity;

use Pim\Bundle\CustomEntityBundle\Entity\AbstractCustomEntity;

/**
 * Manufacturer entity
 *
 * @author Romain Monceau <romain@akeneo.com>
 */
class Manufacturer extends AbstractCustomEntity implements ManufacturerInterface
{
    /** @var string */
    protected $label;

    /** @var BrandInterface */
    protected $brand;

    /**
     * {@inheritdoc}
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * {@inheritdoc}
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getBrands()
    {
        return $this->brands;
    }

    /**
     * {@inheritdoc}
     */
    public function addBrand(BrandInterface $brand)
    {
        $this->brands[] = $brand;
        $brand->setManufacturer($this);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeBrand(BrandInterface $brand)
    {
        $this->brands->removeElement($brand);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomEntityName()
    {
        return 'manufacturer';
    }
}
