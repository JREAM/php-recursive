# Recursive PHP
<img src="https://travis-ci.org/JREAM/php-recursion.svg?branch=master">
<a href="https://codeclimate.com/github/JREAM/php-recursive"><img src="https://codeclimate.com/github/JREAM/php-recursive/badges/gpa.svg" /></a>

A PHP Library that makes recursive methods easy to work with.

- Usage
    - Build
    - Dom
    - Find
    - Flatten
    - Modify
    - Replace
- Recursive Types
    - One Way Tree
    - Multi-Way Tree
- Testing
- Building Docs

## Usage
See the Examples

### Build
```
use \Jream\Recursive\Build;
$build = new Build();
```

### Dom
```
use \Jream\Recursive\Dom;
$dom = new Dom();
```

### Find
```
use \Jream\Recursive\Find;
$find = new Find();

$find = new Find;
$find->byKey($data, 'name')->get();
$find->byValue($data, 'Benjamin')->get();

$search = $find->byValue($data, 'time_days');
$search->result;

```

### Flatten
```
use \Jream\Recursive\Flatten;
$flatten = new Flatten();
```

### Modify
```
use \Jream\Recursive\Modify;
$modify = new Modify();
```

### Replace
```
use \Jream\Recursive\Replace;
$replace = new Replace();
```

#Recursive Types
There are two recursive types handled here.

### One Way Tree
A one way tree is like a directory structure going one route to it's destination, it's very easy to navigate:

    $tree = [
        'folder_a' =>
            [
                'folder_b' => [
                    'file_1',
                    'file_2',
                ]
            ],
        'folder_c' =>
            [
                'file_x',
                'file_y',
                'file_z'
            ]
    ];

An Example Visually:

    tree
    |
     \ folder_a
      \ folder_b
        | file_1
        | file_2
    \ folder_c
      | file_x
      | file_y
      | file_z

An example all paths would be:

    $tree['folder_a']['folder_b'][0] = 'file_1'
    $tree['folder_a']['folder_b'][1] = 'file_2'
    $tree['folder_c'][0] = 'file_x'
    $tree['folder_c'][0] = 'file_y'
    $tree['folder_c'][0] = 'file_z'


### Multi-Way Tree
A Multi-Way Tree or a binary tree is much more complicated, because it can split in many directions.

    $btree = [
        '1' =>
            '2' => [
                '3' =>
                    'foo',
                    'bar'
                '4' => [
                    [
                        'baz',
                        'qux',
                    ]
                    [
                        'corge',
                        'garply'
                    ]
                ]
            ]
    ];

An example visually would be:

          1
         /
        2
       / \
      3   4
     /\    /\
    0  1  0  1
         /\  /\
        0  1 0 1


So all the paths to `$btree` can get more complex, eg:

    $btree[1][2][3][0] = 'foo';
    $btree[1][2][3][1] = 'bar';
    $btree[1][2][4][0][0] = 'baz';
    $btree[1][2][4][0][1] = 'qux';
    $btree[1][2][4][1][0] = 'corge';
    $btree[1][2][4][1][1] = 'garply';

# Testing

Test with composer:

    ./vendor/bin/phpunit tests

# Building Docs
I used ApiGen for this:

    wget http://apigen.org/apigen.phar
    chmod +x apigen.phar
    mv apigen.phar /usr/local/bin/apigen

To generate docs:

    apigen generate -s src -d docs