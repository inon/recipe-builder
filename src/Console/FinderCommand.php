<?php

namespace Inon\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FinderCommand extends Command
{
    public function configure()
    {
        $this->setName('build')
            ->setDescription('Builds Recipe based on fridge.csv and ingredients.json')
            ->addArgument('fridge', InputArgument::REQUIRED, 'Relative path of the fridge.csv')
            ->addArgument('ingredients', InputArgument::REQUIRED, 'JSON string of ingredients');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $fridgeFile = $input->getArgument('fridge');
        $ingredients = $input->getArgument('ingredients');

        $output->writeln('Fridge: ' . $fridgeFile);
        $output->writeln('Ingredients: ' . $ingredients);
    }

}