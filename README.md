BAYARDEV - FixturesLoaderBundle
===============

Fixtures Loader Symfony Bundle

## CLONE & INSTALL

```bash
git clone -b dev git@github.com:bayardev/fixtures-loader-bundle.git

cd fixtures-loader-bundle/
```

```bash
composer install
```

## IMPORT in PROJECT

Add theses lines to your composer.json :

```json
// filename : composer.json
//...
    "repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:bayardev/fixtures-loader-bundle.git"
        }
    ],
    "require": {
        //...
        "bayardev/fixtures-loader-bundle": "dev-master"
    },
//...
```
