<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220911140556 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE setting (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(150) NOT NULL, keywords VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, company VARCHAR(100) NOT NULL, adress VARCHAR(255) NOT NULL, phone VARCHAR(15) NOT NULL, fax VARCHAR(15) NOT NULL, email VARCHAR(50) NOT NULL, smtpserver VARCHAR(100) DEFAULT NULL, smtpemail VARCHAR(50) DEFAULT NULL, smtppassword VARCHAR(20) NOT NULL, smtpport INT DEFAULT NULL, aboutus LONGTEXT DEFAULT NULL, contact LONGTEXT DEFAULT NULL, status VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE setting');
    }
}
