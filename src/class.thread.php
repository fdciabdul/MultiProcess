<?php
/**
 * User: fdciabdul
 * Date: 04/02/2021
 * Time: 18:57
 */
    class Task
    {
        protected $generator;
    
        protected $run = false;
    
        public function __construct(Generator $generator)
        {
            $this->generator = $generator;
        }
    
        public function run()
        {
            if ($this->run) {
                $this->generator->next();
            } else {
                $this->generator->current();
            }
    
            $this->run = true;
        }
    
        public function finished()
        {
            return !$this->generator->valid();
        }
    }
    class MultiThread
    {
        protected $queue;
    
        public function __construct()
        {
            $this->queue = new SplQueue();
        }
    
        public function enqueue(Task $task)
        {
            $this->queue->enqueue($task);
        }
    
        public function run()
        {
            while (!$this->queue->isEmpty()) {
                $task = $this->queue->dequeue();
                $task->run();
            
                if (!$task->finished()) {
                    $this->enqueue($task);
                }
            }
        }
    }
