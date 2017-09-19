<?php

namespace Inon\Console;

use Inon\Utilities\CsvParser;
use Inon\Console\RecipeBuilder;
use Inon\Utilities\FileParser;
use Inon\Utilities\JsonParser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * The RecipeBuilder class.
 *
 * @package Inon\Console\FinderCommand
 * @author  Inon Baguio <inon.baguio@yahoo.com>
 */
class FinderCommand extends Command
{
    #----------------------------------------------------------------------------------------------
    # Class Methods
    #----------------------------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function configure()
    {
        $this->setName('build')
            ->setDescription('Builds Recipe based on fridge.csv and ingredients.json')
            ->addArgument('fridge', InputArgument::REQUIRED, 'Relative path of the fridge.csv')
            ->addArgument('recipes', InputArgument::REQUIRED, 'JSON string of recipes');
    }

    /**
     * {@inheritdoc}
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $fridgeItems = (new CsvParser($input->getArgument('fridge')))->parse();
        $recipes = (new JsonParser($input->getArgument('recipes')))->parse();

        $recipe = (new RecipeBuilder($fridgeItems, $recipes))->getRecipe();

        $output->writeln('------ OUTPUT ------');
        $output->writeln($recipe);
    }
}