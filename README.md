# recipe-builder

Clone
-------

```
composer install
```

How to use
----------

1). CD into the working directory <br/>
2). Execute `./recipe` to prompt the command options


Sample command to execute
---------------

This assumes you have a valid `fridge.csv` file

```
./recipe build fridge.csv '[{"name":"grilledcheeseontoast","ingredients":[{"item":"bread","amount":2,"unit":"slices"},{"item":"cheese","amount":2,"unit":"slices"}]},{"name":"saladsandwich","ingredients":[{"item":"bread","amount":2,"unit":"slices"},{"item":"mixed salad","amount":2,"unit":"grams"}]}]'

```



Troubleshooting
----------
1). For some instances, you might need to give `recipe` file some permissions. Just execute `sudo chmod +x ./recipe`
2). I have included `test/stubs/fridge-stub.csv` for a sample `fridge.csv` file that you guys can use
