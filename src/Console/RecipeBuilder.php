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
    private $recipes;

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
        echo __FILE__ . '= line ' . __LINE__; echo '<pre>'; print_r($this->checkFoundRecipes()); echo '</pre><br/>';exit();
    }

    /**
     * @return array
     */
    private function checkFoundRecipes() : array
    {
        $validRecipe = [];

        foreach($this->recipes as $recipe) {
            $foundIngredients = [];

            foreach ($recipe['ingredients'] as $ingredient) {
                if (isset($this->fridgeItems[$ingredient['item']])) {

                    $fridgeItem = $this->fridgeItems[$ingredient['item']];

                    if (
                        (int) $ingredient['amount'] <= (int) $fridgeItem['amount']
                    ) {
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
    function sortFunction(array $current, array $next) {
        return strtotime($current["useby"]) - strtotime($next["useby"]);
    }
}