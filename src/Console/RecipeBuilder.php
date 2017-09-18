<?php

namespace Inon\Console;

/**
 * The RecipeBuilder class.
 *
 * @package Inon\Console\RecipeBuilder
 * @author  Inon Baguio <inon@vroomvroomvroom.com.au>
 */
class RecipeBuilder
{
    /**
     * @var array
     */
    private $fridgeItems;
    /**
     * @var array
     */
    private $ingredients;

    /**
     * RecipeBuilder constructor.
     *
     * @param array $fridgeItems
     * @param array $ingredients
     */
    public function __construct(array $fridgeItems, array $ingredients)
    {
        $this->fridgeItems = $fridgeItems;
        $this->ingredients = $ingredients;
    }

    /**
     * @return string
     */
    public function getRecipe() : string
    {
        
    }
}