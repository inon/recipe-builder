<?php

namespace Inon\Console;

use Inon\Exceptions\InvalidRecipesException;

/**
 * The RecipeBuilder class.
 *
 * @package Inon\Console\RecipeBuilder
 * @author  Inon Baguio <inon.baguio@yahoo.com>
 */
class RecipeBuilder
{
    #----------------------------------------------------------------------------------------------
    # Constants
    #----------------------------------------------------------------------------------------------

    const RECIPE_NOT_FOUND = 'Order Takeout';

    #----------------------------------------------------------------------------------------------
    # Properties
    #----------------------------------------------------------------------------------------------

    /**
     * @var array
     */
    private $fridgeItems;

    /**
     * @var array
     */
    private $recipes;

    #----------------------------------------------------------------------------------------------
    # Class Methods
    #----------------------------------------------------------------------------------------------

    /**
     * RecipeBuilder constructor.
     *
     * @param array $fridgeItems
     * @param array $recipes
     */
    public function __construct(array $fridgeItems, array $recipes)
    {
        $this->fridgeItems = $fridgeItems;
        $this->recipes = $recipes;
    }

    /**
     * @return string
     */
    public function getRecipe() : string
    {
        if (empty($this->checkFoundRecipes())) {
            return self::RECIPE_NOT_FOUND;
        }

        return $this->checkFoundRecipes()[0]['name'];
    }

    /**
     * @return array
     * @throws InvalidRecipesException
     */
    public function checkFoundRecipes() : array
    {
        $validRecipe = [];

        foreach($this->recipes as $recipe) {
            $foundIngredients = [];

            if (! isset($recipe['ingredients']) || empty($recipe['ingredients'])) {
                throw new InvalidRecipesException;
            }

            foreach ($recipe['ingredients'] as $ingredient) {
                $item = str_replace(' ', '', $ingredient['item']);

                if (isset($this->fridgeItems[$item])) {

                    $fridgeItem = $this->fridgeItems[$item];

                    if ((int) $ingredient['amount'] <= (int) $fridgeItem['amount']) {
                        $foundIngredients[] = $fridgeItem;
                    }
                }
            }

            if (count($foundIngredients) === count($recipe['ingredients'])) {
                usort($foundIngredients, [self::class,'sortFunction']);
                $recipe['useby'] = $foundIngredients[0]['useby'];
                $validRecipe[] = $recipe;
            }
        }

        usort($validRecipe, [self::class,'sortFunction']);

        return $validRecipe;
    }

    /**
     * @param array $current
     * @param array $next
     *
     * @return false|int
     */
    private function sortFunction(array $current, array $next)
    {
        return strtotime($current["useby"]) - strtotime($next["useby"]);
    }
}