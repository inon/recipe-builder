<?php

namespace Inon\Test;

use Inon\Console\RecipeBuilder;
use Inon\Utilities\CsvParser;
use Inon\Utilities\JsonParser;

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

        $this->recipeBuilder = new RecipeBuilder(
            (new CsvParser(__DIR__ . '/stubs/fridge-stub.csv'))->parse(),
            (new JsonParser(__DIR__ . '/stubs/recipes.json'))->parse()
        );
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
}