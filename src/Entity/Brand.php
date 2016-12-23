<?php

namespace Pim\Bundle\CnetConnectorBundle\Entity;

use Pim\Bundle\CustomEntityBundle\Entity\AbstractCustomEntity;

/**
 * @author Romain Monceau <romain@akeneo.com>
 */
class Brand extends AbstractCustomEntity implements BrandInterface
{
    /** @var string */
    protected $label;

    /** @var string */
    protected $logoUrl;

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
    public function getLogoUrl()
    {
        return $this->logoUrl;
    }

    /**
     * {@inheritdoc}
     */
    public function setLogoUrl($logoUrl)
    {
        $this->logoUrl = $logoUrl;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomEntityName()
    {
        return 'brand';
    }
}
