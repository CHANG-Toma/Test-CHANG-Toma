<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240530205144 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE estimate (id INT AUTO_INCREMENT NOT NULL, estimatedate DATETIME NOT NULL, client_name VARCHAR(255) NOT NULL, client_email VARCHAR(100) NOT NULL, client_phone INT NOT NULL, client_address VARCHAR(255) NOT NULL, client_city VARCHAR(100) NOT NULL, dresstype VARCHAR(100) NOT NULL, customizations VARCHAR(255) NOT NULL, fabric VARCHAR(100) NOT NULL, fabric_color VARCHAR(100) NOT NULL, size VARCHAR(100) NOT NULL, pricefabric INT NOT NULL, quantity INT NOT NULL, total_ex_tax INT NOT NULL, tva INT NOT NULL, total_inc_tax INT NOT NULL, balande_due VARCHAR(100) NOT NULL, expected_delivery_date DATETIME NOT NULL, delivery_mode VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user CHANGE role role JSON DEFAULT \'ROLE_USER\' NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE estimate');
        $this->addSql('ALTER TABLE `user` CHANGE role role JSON NOT NULL');
    }
}
