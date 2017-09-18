<?php

namespace Inon\Test;

use Inon\Console\RecipeBuilder;
use Inon\Utilities\CsvParser;

/**
 * The RecipeBuilderTest class.
 *
 * @package Inon\Test\RecipeBuilderTest
 * @author  Inon Baguio <inon.baguio@yahoo.com>
 */
class RecipeBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var RecipeBuilder
     */
    private $recipeBuilder;

    /**
     *
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();
        $fridgeItems = (new CsvParser(__DIR__ . '/stubs/fridge-stub.csv'))->parse();

        $this->recipeBuilder = new RecipeBuilder($fridgeItems, $this->getSampleRecipes());
    }

    public function testGetRecipe()
    {
        $this->assertEquals('saladsandwich', $this->recipeBuilder->getRecipe());
    }

    public function testCheckFoundRecipe()
    {
        $recipes = $this->recipeBuilder->checkFoundRecipes();

        $this->assertCount(2, $recipes);
        $this->assertArrayHasKey('name', $recipes[0]);
    }

    /**
     * @return array
     */
    private function getSampleRecipes() : array
    {
        return [
            [
                'name' => 'grilledcheeseontoast',
                'ingredients' => [
                    [
                        'item' => 'bread',
                        'amount' => 2,
                        'unit' => 'slices'
                    ],
                    [
                        'item' => 'cheese',
                        'amount' => 2,
                        'unit' => 'slices'
                    ],
                ],
            ],
            [
                'name' => 'saladsandwich',
                'ingredients' => [
                    [
                        'item' => 'bread',
                        'amount' => 2,
                        'unit' => 'slices'
                    ],
                    [
                        'item' => 'mixed salad',
                        'amount' => 2,
                        'unit' => 'grams'
                    ],
                ],
            ]
        ];
    }
}