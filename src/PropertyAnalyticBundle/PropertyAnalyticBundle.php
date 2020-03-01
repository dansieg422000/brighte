<?php
namespace App\PropertyAnalyticBundle;

//use Elmo\PerformanceBundle\DependencyInjection\Compiler\AccessControllerServiceTagCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class PropertyAnalyticBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container A ContainerBuilder instance
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new AccessControllerServiceTagCompilerPass());
    }
}
