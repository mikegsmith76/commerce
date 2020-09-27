<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200927075937 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE marketplace (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql('ALTER TABLE product_attribute_int ADD COLUMN marketplace_id INT NOT NULL AFTER id');
        $this->addSql('ALTER TABLE product_attribute_int DROP FOREIGN KEY FK_product_int_attribute_id');
        $this->addSql('ALTER TABLE product_attribute_int DROP FOREIGN KEY FK_product_int_product_id');
        $this->addSql('ALTER TABLE product_attribute_int DROP INDEX idxProductAttributeValue');
        $this->addSql('ALTER TABLE product_attribute_int ADD INDEX idxMarketplaceProductAttributeValue (marketplace_id, product_id, attribute_id, value)');
        $this->addSql('ALTER TABLE product_attribute_int ADD CONSTRAINT FK_product_int_attribute_id FOREIGN KEY (attribute_id) REFERENCES attribute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_attribute_int ADD CONSTRAINT FK_product_int_product_id FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_attribute_int ADD CONSTRAINT FK_product_int_marketplace_id FOREIGN KEY (marketplace_id) REFERENCES marketplace (id)');

        $this->addSql('ALTER TABLE product_attribute_varchar ADD COLUMN marketplace_id INT NOT NULL AFTER id');
        $this->addSql('ALTER TABLE product_attribute_varchar DROP FOREIGN KEY FK_product_varchar_attribute_id');
        $this->addSql('ALTER TABLE product_attribute_varchar DROP FOREIGN KEY FK_product_product_id');
        $this->addSql('ALTER TABLE product_attribute_varchar DROP INDEX idxProductAttributeValue');
        $this->addSql('ALTER TABLE product_attribute_varchar ADD INDEX idxMarketplaceProductAttributeValue (marketplace_id, product_id, attribute_id, value)');
        $this->addSql('ALTER TABLE product_attribute_varchar ADD CONSTRAINT FK_product_varchar_marketplace_id FOREIGN KEY (marketplace_id) REFERENCES marketplace (id)');
        $this->addSql('ALTER TABLE product_attribute_varchar ADD CONSTRAINT FK_product_varchar_attribute_id FOREIGN KEY (attribute_id) REFERENCES attribute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_attribute_varchar ADD CONSTRAINT FK_product_varchar_product_id FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');

        $this->addSql('ALTER TABLE product_attribute_text ADD COLUMN marketplace_id INT NOT NULL AFTER id');
        $this->addSql('ALTER TABLE product_attribute_text DROP FOREIGN KEY FK_product_text_attribute_id');
        $this->addSql('ALTER TABLE product_attribute_text DROP FOREIGN KEY FK_product_text_product_id');
        $this->addSql('ALTER TABLE product_attribute_text DROP INDEX idxProductAttribute');
        $this->addSql('ALTER TABLE product_attribute_text ADD INDEX idxMarketplaceProductAttribute (marketplace_id, product_id, attribute_id)');
        $this->addSql('ALTER TABLE product_attribute_text ADD CONSTRAINT FK_product_text_marketplace_id FOREIGN KEY (marketplace_id) REFERENCES marketplace (id)');
        $this->addSql('ALTER TABLE product_attribute_text ADD CONSTRAINT FK_product_text_attribute_id FOREIGN KEY (attribute_id) REFERENCES attribute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_attribute_text ADD CONSTRAINT FK_product_text_product_id FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');

        $this->addSql('ALTER TABLE product_attribute_datetime ADD COLUMN marketplace_id INT NOT NULL AFTER id');
        $this->addSql('ALTER TABLE product_attribute_datetime DROP FOREIGN KEY FK_product_datetime_attribute_id');
        $this->addSql('ALTER TABLE product_attribute_datetime DROP FOREIGN KEY FK_product_datetime_product_id');
        $this->addSql('ALTER TABLE product_attribute_datetime DROP INDEX idxProductAttributeValue');
        $this->addSql('ALTER TABLE product_attribute_datetime ADD INDEX idxMarketplaceProductAttributeValue (marketplace_id, product_id, attribute_id, value)');
        $this->addSql('ALTER TABLE product_attribute_datetime ADD CONSTRAINT FK_product_datetime_marketplace_id FOREIGN KEY (marketplace_id) REFERENCES marketplace (id)');
        $this->addSql('ALTER TABLE product_attribute_datetime ADD CONSTRAINT FK_product_datetime_attribute_id FOREIGN KEY (attribute_id) REFERENCES attribute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_attribute_datetime ADD CONSTRAINT FK_product_datetime_product_id FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

        $this->addSql('ALTER TABLE product_attribute_int DROP FOREIGN KEY FK_product_int_marketplace_id');
        $this->addSql('ALTER TABLE product_attribute_int DROP FOREIGN KEY FK_product_int_attribute_id');
        $this->addSql('ALTER TABLE product_attribute_int DROP FOREIGN KEY FK_product_int_product_id');
        $this->addSql('ALTER TABLE product_attribute_int DROP INDEX idxMarketplaceProductAttributeValue');
        $this->addSql('ALTER TABLE product_attribute_int ADD INDEX idxProductAttributeValue (product_id, attribute_id, value)');
        $this->addSql('ALTER TABLE product_attribute_int DROP COLUMN marketplace_id');
        $this->addSql('ALTER TABLE product_attribute_int ADD CONSTRAINT FK_product_int_attribute_id FOREIGN KEY (attribute_id) REFERENCES attribute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_attribute_int ADD CONSTRAINT FK_product_int_product_id FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');

        $this->addSql('ALTER TABLE product_attribute_varchar DROP FOREIGN KEY FK_product_varchar_marketplace_id');
        $this->addSql('ALTER TABLE product_attribute_varchar DROP FOREIGN KEY FK_product_varchar_attribute_id');
        $this->addSql('ALTER TABLE product_attribute_varchar DROP FOREIGN KEY FK_product_varchar_product_id');
        $this->addSql('ALTER TABLE product_attribute_varchar DROP INDEX idxMarketplaceProductAttributeValue');
        $this->addSql('ALTER TABLE product_attribute_varchar ADD INDEX idxProductAttributeValue (product_id, attribute_id, value)');
        $this->addSql('ALTER TABLE product_attribute_varchar DROP COLUMN marketplace_id');
        $this->addSql('ALTER TABLE product_attribute_varchar ADD CONSTRAINT FK_product_varchar_attribute_id FOREIGN KEY (attribute_id) REFERENCES attribute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_attribute_varchar ADD CONSTRAINT FK_product_product_id FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');

        $this->addSql('ALTER TABLE product_attribute_text DROP FOREIGN KEY FK_product_text_marketplace_id');
        $this->addSql('ALTER TABLE product_attribute_text DROP FOREIGN KEY FK_product_text_attribute_id');
        $this->addSql('ALTER TABLE product_attribute_text DROP FOREIGN KEY FK_product_text_product_id');
        $this->addSql('ALTER TABLE product_attribute_text DROP INDEX idxMarketplaceProductAttribute');
        $this->addSql('ALTER TABLE product_attribute_text ADD INDEX idxProductAttribute (product_id, attribute_id)');
        $this->addSql('ALTER TABLE product_attribute_text DROP COLUMN marketplace_id');
        $this->addSql('ALTER TABLE product_attribute_text ADD CONSTRAINT FK_product_text_attribute_id FOREIGN KEY (attribute_id) REFERENCES attribute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_attribute_text ADD CONSTRAINT FK_product_text_product_id FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');

        $this->addSql('ALTER TABLE product_attribute_datetime DROP FOREIGN KEY FK_product_datetime_marketplace_id');
        $this->addSql('ALTER TABLE product_attribute_datetime DROP FOREIGN KEY FK_product_datetime_attribute_id');
        $this->addSql('ALTER TABLE product_attribute_datetime DROP FOREIGN KEY FK_product_datetime_product_id');
        $this->addSql('ALTER TABLE product_attribute_datetime DROP INDEX idxMarketplaceProductAttributeValue');
        $this->addSql('ALTER TABLE product_attribute_datetime ADD INDEX idxProductAttributeValue (product_id, attribute_id, value)');
        $this->addSql('ALTER TABLE product_attribute_datetime DROP COLUMN marketplace_id');
        $this->addSql('ALTER TABLE product_attribute_datetime ADD CONSTRAINT FK_product_datetime_attribute_id FOREIGN KEY (attribute_id) REFERENCES attribute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_attribute_datetime ADD CONSTRAINT FK_product_datetime_product_id FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');

        $this->addSql('DROP TABLE marketplace');
    }
}
