<?php
require 'vendor/autoload.php';

use Psr\Log\LoggerInterface;

use Php\Exam\Logger;

class MyApp1
{
    private $logger;
    private $msg;

    public function __construct(LoggerInterface $logger = null, $msg = '')
    {
        $this->logger = $logger;
        $this->msg = $msg;
    }

    public function run1()
    {
        return function () {
            $this->logger->debug($this->msg);
        };
    }

    public function run2($run)
    {
        if (is_callable($run)) {
            $this->logger->info($this->msg);
            call_user_func($run);
        }
        $this->logger->notice($this->msg);
    }
}

class MyApp2
{
    private $logger;
    private $msg;

    public function __construct(LoggerInterface $logger = null, $msg = '')
    {
        $this->logger = $logger;
        $this->msg = $msg;
        $this->logger->critical($this->msg);
    }

    public function __invoke()
    {
        $this->logger->error($this->msg);
        return false;
    }

    static function run1()
    {
        return true;
    }

    static function run2()
    {
        return false;
    }
}

$logger = new Logger;
$msg = $argv[1] ??  '';
$myApp1 = new MyApp1($logger, $msg);
$run1 = $myApp1->run1();
$myApp1->run2(['MyApp2', 'run1']);
$myApp1->run2(['MyApp2']);
$myApp1->run2(new MyApp2($logger, $msg));

