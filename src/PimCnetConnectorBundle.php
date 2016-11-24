<?php

namespace Pim\Bundle\CnetConnectorBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * CNET Connector
 *
 * @author Romain Monceau <romain@akeneo.com>
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
