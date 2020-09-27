<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200927073805 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('CREATE TABLE product_attribute_int (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, attribute_id INT NOT NULL, value INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_attribute_int ADD INDEX idxProductAttributeValue (product_id, attribute_id, value)');
        $this->addSql('ALTER TABLE product_attribute_int ADD CONSTRAINT FK_product_int_attribute_id FOREIGN KEY (attribute_id) REFERENCES attribute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_attribute_int ADD CONSTRAINT FK_product_int_product_id FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');

        $this->addSql('CREATE TABLE product_attribute_varchar (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, attribute_id INT NOT NULL, value VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_attribute_varchar ADD INDEX idxProductAttributeValue (product_id, attribute_id, value)');
        $this->addSql('ALTER TABLE product_attribute_varchar ADD CONSTRAINT FK_product_varchar_attribute_id FOREIGN KEY (attribute_id) REFERENCES attribute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_attribute_varchar ADD CONSTRAINT FK_product_product_id FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');

        $this->addSql('CREATE TABLE product_attribute_text (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, attribute_id INT NOT NULL, value TEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_attribute_text ADD INDEX idxProductAttribute (product_id, attribute_id)');
        $this->addSql('ALTER TABLE product_attribute_text ADD CONSTRAINT FK_product_text_attribute_id FOREIGN KEY (attribute_id) REFERENCES attribute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_attribute_text ADD CONSTRAINT FK_product_text_product_id FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');

        $this->addSql('CREATE TABLE product_attribute_datetime (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, attribute_id INT NOT NULL, value datetime NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_attribute_datetime ADD INDEX idxProductAttributeValue (product_id, attribute_id, value)');
        $this->addSql('ALTER TABLE product_attribute_datetime ADD CONSTRAINT FK_product_datetime_attribute_id FOREIGN KEY (attribute_id) REFERENCES attribute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_attribute_datetime ADD CONSTRAINT FK_product_datetime_product_id FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP TABLE product_attribute_int');
        $this->addSql('DROP TABLE product_attribute_varchar');
        $this->addSql('DROP TABLE product_attribute_text');
        $this->addSql('DROP TABLE product_attribute_datetime');
    }
}
