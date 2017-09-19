# recipe-builder

Build/Install
-------

```
composer install
```

How to use
----------

1). CD into the working directory

2). Execute `./recipe` to prompt the command options


Sample command to execute
---------------

```
./recipe build fridge.csv recipes.json
```



Troubleshooting
----------
1). For some instances, you might need to give `recipe` file some permissions. Just execute `sudo chmod +x ./recipe`

2). I have included `test/stubs/fridge-stub.csv`,`test/stubs/recipes.json` for sample stub files that you can use

3). Execute `./recipe help build` to check arguments needed for the console command
