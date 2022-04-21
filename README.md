## Task

### Generators
Create generators services which would:
- Generate a random string from a-z0-9, e.g.: fh4r5cf1s23s
- Generate an array of random strings from a-z0-9, e.g.: ['vbk5g6', 'i5r8b1', '6mb8us']
You should be able to set a length of the string and amount of elements in the array (for second generator only)

### Converters
Create converters that would:
- Convert strings to numeric equivalents based on characters position in the alphabet, e.g.: 6a8bcd -> 618234
- Convert strings using ROT13 converter (https://en.wikipedia.org/wiki/ROT13)



When user visits `/` path in browser, we should have a loop of 10 iterations that would create random generators with random string lengths. Each generator should use random converter and output generated -> converted string pair.

E.g. The first out of 10 iteration could have the following random combination: 2nd generator generates array of 3 strings that are 4 characters length each and converts it using 1st converter. So the output should be something like this:
```
abcd -> 1234
8a55 -> 8155
fa12 -> 6112
```

Please branch out of `master` and create a PR when you are done.

## Requirements
- At least PHP 7.4 syntax is required (PHP 8 is preferred)
- PSR standards
- Use Dependency Injection if possible
- Unit tests is a plus
