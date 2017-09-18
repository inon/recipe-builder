<?php

namespace Inon\Console;

use Inon\Utilities\CsvParser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * The RecipeBuilder class.
 *
 * @package Inon\Console\FinderCommand
 * @author  Inon Baguio <inon@vroomvroomvroom.com.au>
 */
class FinderCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    public function configure()
    {
        $this->setName('build')
            ->setDescription('Builds Recipe based on fridge.csv and ingredients.json')
            ->addArgument('fridge', InputArgument::REQUIRED, 'Relative path of the fridge.csv')
            ->addArgument('ingredients', InputArgument::REQUIRED, 'JSON string of ingredients');
    }

    /**
     * {@inheritdoc}
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $fridgeFile = $input->getArgument('fridge');
        $ingredients = $input->getArgument('ingredients');

        if (! file_exists($fridgeFile)) {
            throw new \Exception(sprintf('File : %s does not exist', $fridgeFile));
        }

        $fridgeItems = (new CsvParser($fridgeFile))->parse();
        

        // $output->writeln('Fridge: ' . $fridgeFile);
        // $output->writeln('Ingredients: ' . $ingredients);

        $recipe = (new \RecipeBuilder($fridgeItems, $ingredients))->getRecipe();
        $output->writeln('Recipe is : ' . $recipe);



    }

}