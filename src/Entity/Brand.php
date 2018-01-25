<?php

namespace Pim\Bundle\CnetConnectorBundle\Entity;

use Pim\Bundle\CustomEntityBundle\Entity\AbstractCustomEntity;

/**
 * Brand reference data
 *
 * @author    Romain Monceau <romain@akeneo.com>
 * @copyright 2016 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
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
    public function getCustomEntityName(): string
    {
        return 'brand';
    }

    /**
     * {@inheritdoc}
     */
    public static function getLabelProperty(): string
    {
        return 'label';
    }
}
