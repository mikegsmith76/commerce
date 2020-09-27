<?php

namespace App\Command;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ImportCleanCommand extends Command
{
    protected static $defaultName = 'import:clean';

    protected $connection;

    public function __construct(\Doctrine\DBAL\Connection $connection)
    {
        parent::__construct();
        $this->connection = $connection;
    }

    protected function configure()
    {
        $this->setDescription('Clean all attribute and product related tables');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->connection->executeStatement("DELETE FROM product_attribute_int");
        $this->connection->executeStatement("DELETE FROM product_attribute_datetime");
        $this->connection->executeStatement("DELETE FROM product_attribute_text");
        $this->connection->executeStatement("DELETE FROM product_attribute_varchar");
        $this->connection->executeStatement("DELETE FROM product");
        $this->connection->executeStatement("DELETE FROM attribute_option");
        $this->connection->executeStatement("DELETE FROM attribute_attribute_group");
        $this->connection->executeStatement("DELETE FROM attribute");
        $this->connection->executeStatement("DELETE FROM attribute_group");
        $this->connection->executeStatement("DELETE FROM attribute_set");

        return Command::SUCCESS;
    }
}
