<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200927163606 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql("ALTER TABLE product_attribute_int MODIFY COLUMN marketplace_id INT");
        $this->addSql("ALTER TABLE product_attribute_varchar MODIFY COLUMN marketplace_id INT");
        $this->addSql("ALTER TABLE product_attribute_text MODIFY COLUMN marketplace_id INT");
        $this->addSql("ALTER TABLE product_attribute_datetime MODIFY COLUMN marketplace_id INT");
    }

    public function down(Schema $schema) : void
    {
        $this->addSql("ALTER TABLE product_attribute_int MODIFY COLUMN marketplace_id INT NOT NULL");
        $this->addSql("ALTER TABLE product_attribute_varchar MODIFY COLUMN marketplace_id INT NOT NULL");
        $this->addSql("ALTER TABLE product_attribute_text MODIFY COLUMN marketplace_id INT NOT NULL");
        $this->addSql("ALTER TABLE product_attribute_datetime MODIFY COLUMN marketplace_id INT NOT NULL");
    }
}
