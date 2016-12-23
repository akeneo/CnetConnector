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
    public function getLogoUrl();

    /**
     * @param string $logoUrl
     *
     * @return BrandInterface
     */
    public function setLogoUrl($logoUrl);
}
