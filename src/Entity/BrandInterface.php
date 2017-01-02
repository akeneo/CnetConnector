<?php

namespace Pim\Bundle\CnetConnectorBundle\Entity;

/**
 * Interface for brand entity
 *
 * @author    Romain Monceau <romain@akeneo.com>
 * @copyright 2016 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
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
