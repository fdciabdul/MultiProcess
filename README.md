# MultiProcess
Simple Multi Processing In PHP


Install
`
composer require fdciabdul/multiprocess
`

Example 

```php
 $multi = new MultiThread();
    
    $task1 = new Task(call_user_func(function() {
        for ($i = 0; $i < 3; $i++) {
            print "task 1: " . $i . "\n";
            yield;
        }
        // start by executing this
    }));
    
    $task2 = new Task(call_user_func(function() {
        for ($i = 0; $i < 6; $i++) {
            print "task 2: " . $i . "\n";
            yield;
        }
        // then start this one
    }));
    
    $multi->enqueue($task1);
    $multi->enqueue($task2);
    
    $multi->run();
```
