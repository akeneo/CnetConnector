<?php

namespace Pim\Bundle\CnetConnectorBundle\Form\Type;

use Pim\Bundle\CustomEntityBundle\Form\Type\CustomEntityType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @author Romain Monceau <romain@akeneo.com>
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
