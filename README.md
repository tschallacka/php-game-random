# php-game-random
A Random class that provides predictable randomness by utilising a seed.
Can be used for re-generating mazes with seeds, or make predictable terrain generation.
Anything that needs a consistent output on a given seed.

This class can be initialized several times with different seeds, without affecting the seeds
of the other classes.

DO NOT USE THIS FOR SECURITY! The random provided by this class is cryptographically insecure.

```
    $rand = new Random();
    echo $rand->nextInt() . " was randomly generated using rand1\n";
    echo $rand->nextInt() . " was randomly generated using rand1\n with ";
    echo $rand->getSeed() . " as seed";
    
    $rand2 = new Random();
    echo $rand2->nextInt() . " was randomly generated using rand2\n";
    echo $rand2->nextInt() . " was randomly generated using rand2\n with ";
    echo $rand2->getSeed() . " as seed";
```

will output something like

>    1750658 was randomly generated using rand1  
>    728416 was randomly generated using rand1  
>    with 1782637953 as seed  
>    2670223 was randomly generated using rand2  
>    1029718 was randomly generated using rand2  
>    with 1835590491 as seed  

When the seed is re-used it will generate the same sequence of random numbers as it did
on previous runs.

```
    
    $rand = new Random(1782637953);
    echo $rand->nextInt() . " was randomly generated using rand1\n";
    echo $rand->nextInt() . " was randomly generated using rand1\n with ";
    echo $rand->getSeed() . " as seed";
    
    $rand2 = new Random(1835590491);
    echo $rand2->nextInt() . " was randomly generated using rand2\n";
    echo $rand2->nextInt() . " was randomly generated using rand2\n with ";
    echo $rand2->getSeed() . " as seed";
```

outputs

>    1750658 was randomly generated using rand1  
>    728416 was randomly generated using rand1  
>    with 1782637953 as seed   
>    2670223 was randomly generated using rand2  
>    1029718 was randomly generated using rand2  
>    with 1835590491 as seed  