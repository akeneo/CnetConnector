<?php

namespace Pim\Bundle\CnetConnectorBundle\Form\Type;

use Pim\Bundle\CustomEntityBundle\Form\Type\CustomEntityType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Form type for brand reference data
 *
 * @author    Romain Monceau <romain@akeneo.com>
 * @copyright 2016 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class BrandType extends CustomEntityType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('label')
            ->add('logoUrl');
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'pim_cnet_enrich_brand';
    }
}
