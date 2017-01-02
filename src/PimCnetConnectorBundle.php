<?php

namespace Pim\Bundle\CnetConnectorBundle;

use Pim\Bundle\ExtendedMeasureBundle\DependencyInjection\MeasuresCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * CNET Connector
 *
 * @author    Romain Monceau <romain@akeneo.com>
 * @copyright 2016 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class PimCnetConnectorBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $measuresConfigDir = __DIR__ . '/Resources/config/measures';
        $container->addCompilerPass(new MeasuresCompilerPass($measuresConfigDir));
    }
}
