<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class DatabaseReloadCommand extends ContainerAwareCommand
{

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName('app:db:reload');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $app = $this->getApplication();

        foreach ($this->getCommands() as $name => $args) {
            $app->find($name)->run(new ArrayInput($args), $output);
        }
    }

    /**
     * @return array
     */
    protected function getCommands()
    {
        return [
            'doctrine:database:drop'      => ['--force' => true],
            'doctrine:database:create'    => [],
            'doctrine:migrations:migrate' => [],
            'doctrine:fixtures:load'      => [],
            'doctrine:mapping:info'       => [],
            'doctrine:migrations:diff'    => []
        ];
    }
}
