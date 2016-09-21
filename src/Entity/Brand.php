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
    protected $urlLogo75;

    /** @var string */
    protected $urlLogo200;

    /** @var string */
    protected $urlLogo400;

    /** @var ManufacturerInterface */
    protected $manufacturer;

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
    public function getUrlLogo75()
    {
        return $this->urlLogo75;
    }

    /**
     * {@inheritdoc}
     */
    public function setUrlLogo75($urlLogo75)
    {
        $this->urlLogo75 = $urlLogo75;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUrlLogo200()
    {
        return $this->urlLogo200;
    }

    /**
     * {@inheritdoc}
     */
    public function setUrlLogo200($urlLogo200)
    {
        $this->urlLogo200 = $urlLogo200;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUrlLogo400()
    {
        return $this->urlLogo400;
    }

    /**
     * {@inheritdoc}
     */
    public function setUrlLogo400($urlLogo400)
    {
        $this->urlLogo400 = $urlLogo400;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * {@inheritdoc}
     */
    public function setManufacturer(ManufacturerInterface $manufacturer = null)
    {
        $this->manufacturer = $manufacturer;

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
