<?php

namespace Pim\Bundle\CnetConnectorBundle\Normalizers;

use Pim\Bundle\CnetConnectorBundle\Entity\BrandInterface;
use Pim\Bundle\CustomEntityBundle\Entity\AbstractCustomEntity;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerAwareTrait;

/**
 * @author    Mathias METAYER <mathias.metayer@akeneo.com>
 * @copyright 2018 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class BrandNormalizer implements NormalizerInterface, SerializerAwareInterface
{
    use SerializerAwareTrait;

    /** @var string[] */
    protected $supportedFormats = ['standard', 'datagrid'];

    /**
     * {@inheritdoc}
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [
            'id'       => $object->getId(),
            'code'     => $object->getCode(),
            'label'    => $object->getLabel(),
            'logo_url' => $object->getLogoUrl(),
        ];

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof BrandInterface && in_array($format, $this->supportedFormats);
    }
}
