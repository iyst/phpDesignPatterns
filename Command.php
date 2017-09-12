<?php
/**
 * 命令链模式
 */

interface ICommand {
    function script($msg,$args);
}

class UserCommand implements ICommand
{
    public function script($msg, $args)
    {
        // TODO: Implement script() method.
        echo 'user script';
    }
}

class EmailCommand implements ICommand
{
    public function script($msg, $args)
    {
        // TODO: Implement script() method.
        echo "email script";
    }
}

class RunCommand
{
    private $commands = [];
    public function addCommand($cmd)
    {
        $this->commands[] = $cmd;
    }
    public function run($msg,$args)
    {
        foreach ($this->commands as $cmd)
        {
            $cmd ->script($msg,$args);
        }
    }

}

class Client
{
    public function call()
    {
        $run = new RunCommand();
        $run->addCommand(new EmailCommand());
        $run->addCommand(new UserCommand());
        $run->run('user',null);
        $run->run('email',null);
    }
}
$c = new Client();
$c->call();