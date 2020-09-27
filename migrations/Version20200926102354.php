<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200926102354 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE attribute (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE attribute_attribute_group (attribute_id INT NOT NULL, attribute_group_id INT NOT NULL, INDEX IDX_6ACB1561B6E62EFA (attribute_id), INDEX IDX_6ACB156162D643B7 (attribute_group_id), PRIMARY KEY(attribute_id, attribute_group_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE attribute_group (id INT AUTO_INCREMENT NOT NULL, attribute_set_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_8EF8A773321A2342 (attribute_set_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE attribute_set (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE attribute_attribute_group ADD CONSTRAINT FK_6ACB1561B6E62EFA FOREIGN KEY (attribute_id) REFERENCES attribute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE attribute_attribute_group ADD CONSTRAINT FK_6ACB156162D643B7 FOREIGN KEY (attribute_group_id) REFERENCES attribute_group (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE attribute_group ADD CONSTRAINT FK_8EF8A773321A2342 FOREIGN KEY (attribute_set_id) REFERENCES attribute_set (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attribute_attribute_group DROP FOREIGN KEY FK_6ACB1561B6E62EFA');
        $this->addSql('ALTER TABLE attribute_attribute_group DROP FOREIGN KEY FK_6ACB156162D643B7');
        $this->addSql('ALTER TABLE attribute_group DROP FOREIGN KEY FK_8EF8A773321A2342');
        $this->addSql('DROP TABLE attribute');
        $this->addSql('DROP TABLE attribute_attribute_group');
        $this->addSql('DROP TABLE attribute_group');
        $this->addSql('DROP TABLE attribute_set');
    }
}
