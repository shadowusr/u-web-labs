<?php


namespace App\Console;

use App\Database\Database;
use App\Database\Task7CreateTables;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InstallTablesForTask7Command extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'task-7-setup-tables';

    protected function configure()
    {
        // ...
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        Task7CreateTables::create();

        return 0;
    }
}