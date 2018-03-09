<?php

namespace spec\Pim\Bundle\CnetConnectorBundle\Normalizers;

use Pim\Bundle\CnetConnectorBundle\Entity\BrandInterface;
use Pim\Bundle\CnetConnectorBundle\Normalizers\BrandNormalizer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;

class BrandNormalizerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(BrandNormalizer::class);
    }

    function it_is_a_normalizer()
    {
        $this->shouldImplement(NormalizerInterface::class);
    }

    function it_is_serializer_aware()
    {
        $this->shouldImplement(SerializerAwareInterface::class);
    }

    function it_only_normalizes_brands(BrandInterface $brand)
    {
        $this->supportsNormalization($brand, 'standard')->shouldReturn(true);
        $this->supportsNormalization(new \stdClass(), 'standard')->shouldReturn(false);
        $this->supportsNormalization(['anything'], 'standard')->shouldReturn(false);
    }

    function it_only_supports_standard_and_datagrid_formats(BrandInterface $brand)
    {
        $this->supportsNormalization($brand, 'standard')->shouldReturn(true);
        $this->supportsNormalization($brand, 'datagrid')->shouldReturn(true);
        $this->supportsNormalization($brand, 'flat')->shouldReturn(false);
        $this->supportsNormalization($brand, null)->shouldReturn(false);
        $this->supportsNormalization($brand, 'anything_else')->shouldReturn(false);
    }

    function it_normlizes_a_brand(BrandInterface $brand)
    {
        $brand->getId()->willReturn(56);
        $brand->getCode()->willReturn('brand_code');
        $brand->getLabel()->willReturn('brand_label');
        $brand->getLogoUrl()->willReturn('http://foo/bar/baz');

        $expected = [
            'id' => 56,
            'code' => 'brand_code',
            'label' => 'brand_label',
            'logo_url' => 'http://foo/bar/baz',
        ];

        $this->normalize($brand, 'standard')->shouldReturn($expected);
        $this->normalize($brand, 'datagrid')->shouldReturn($expected);
    }
}
