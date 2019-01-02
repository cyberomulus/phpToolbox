# Git branch strategy

## Graphique

```
                      *  initial comminit
                      |
                      *  differents commit for prepare 1.1
                      |
          |<----------*  tag 1.1
          *           |
          |           |
          |           |
          *---------->*
      branches for    |         
   bugfix or feature  |
                      * one or more commit for prepare 1.2
                      |
                      |
                      * tag 1.2
                      |          
                      \/
                    master
```

* The `master` branch contain all releases.  
* Differents temporarys branches is createds for develop bugfix or features for merging (and squash) into `master` by pull request.  
* Work on `master` only for prepare the futur release (in doc by example).

## Why like that?

* Since for each enhancement a release is created, you always have them up to date with `composer require composer require cyberomulus/php-toolbox:1.*`
* Your project can set`"minimum-stability" : "dev"` in `composer.json`

## And for 2.* ?

There are no plans for version 2. * in the project lifecycle.