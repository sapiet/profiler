# Profiler

## Installation

```bash
composer req sapiet/profiler
```

## Usage

```php
require_once __DIR__.'/vendor/autoload.php';

use Sapiet\Profiler\Profiler;

$number = 50000000;

// Starts a test named 'test-1'
Profiler::start('test-1');
foreach (range(1, $number) as $value) {
    // echo $value;
}
// Ends the test named 'test-1'
$test1 = Profiler::end('test-1');

// Starts a test named 'test-2'
Profiler::start('test-2');
function xrange($min, $max) {
    for ($i = $min; $i < $max; $i++) yield $i;
}

foreach (xrange(1, $number) as $value) {
    // echo $value;
}
// Ends the test named 'test-2'
$test2 = Profiler::end('test-2');

// Displaying test results
echo $test1->format();
echo PHP_EOL;
echo $test2->format();
```

Output:
```
1.276 sec / 376 oct
2.318 sec / 0 oct
```
