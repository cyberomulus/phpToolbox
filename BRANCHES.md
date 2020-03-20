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

## Version naming

* `1.1` : Use with php version < 7.3
* `1.2` : Use with php version >= 7.3
* `1.2.*` : Use with php version >= 7.3, add functions in library (the new functions in `1.3.*` is not insert here)
* `1.3` : Wil be used for futur major php version with no retro-compatbility 
* `1.3.*` : Wil be used for futur major php version with no retro-compatbility, add functions in library

## Why like that?

* Since for each enhancement a release is created, you always have them up to date with `composer require composer require cyberomulus/php-toolbox:1.2.*`.  
Use sub version `1.*` depending on the version of php
* Your project can set `"minimum-stability" : "dev"` in `composer.json`

## And for 2.* ?

There are no plans for version 2. * in the project lifecycle.