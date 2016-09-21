<?php

namespace Pim\Bundle\CnetConnectorBundle\Entity;

/**
 * @author Romain Monceau <romain@akeneo.com>
 */
interface BrandInterface
{
    /**
     * @return string
     */
    public function getLabel();

    /**
     * @param string $label
     *
     * @return BrandInterface
     */
    public function setLabel($label);

    /**
     * @return string
     */
    public function getUrlLogo75();

    /**
     * @param string $urlLogo75
     *
     * @return BrandInterface
     */
    public function setUrlLogo75($urlLogo75);

    /**
     * @return string
     */
    public function getUrlLogo200();

    /**
     * @param string $urlLogo200
     *
     * @return BrandInterface
     */
    public function setUrlLogo200($urlLogo200);

    /**
     * @return string
     */
    public function getUrlLogo400();

    /**
     * @param string $urlLogo400
     *
     * @return BrandInterface
     */
    public function setUrlLogo400($urlLogo400);

    /**
     * @return ManufacturerInterface
     */
    public function getManufacturer();

    /**
     * @param ManufacturerInterface $manufacturer
     *
     * @return BrandInterface
     */
    public function setManufacturer(ManufacturerInterface $manufacturer);
}
