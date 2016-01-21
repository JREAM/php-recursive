# Recursive PHP
<img src="https://travis-ci.org/JREAM/php-recursion.svg?branch=master">

A PHP Library that makes recursive methods easy to work with.

- Usage
    - Build
    - Dom
    - Find
    - Flatten
    - Modify
    - Replace
- Testing

## Usage
See the Examples

### \Jream\Recursive\Build
```
use \Jream\Recursive\Build;
```

### \Jream\Recursive\Dom
```
use \Jream\Recursive\Dom;
```

### \Jream\Recursive\Find
```
use \Jream\Recursive\Find;

$find = new Find;
$find->byKey($data, 'name')->get();
$find->byValue($data, 'Benjamin')->get();

$search = $find->byValue($data, 'time_days');
$search->result;

```

### \Jream\Recursive\Flatten
```
use \Jream\Recursive\Flatten;
```

### \Jream\Recursive\Modify
```
use \Jream\Recursive\Modify;
```

### \Jream\Recursive\Replace
```
use \Jream\Recursive\Replace;
```

# Testing

Test with composer:

    ./vendor/bin/phpunit tests
