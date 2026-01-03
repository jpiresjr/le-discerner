<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251203010532 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE patients (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, gender VARCHAR(20) DEFAULT NULL, language VARCHAR(20) DEFAULT NULL, UNIQUE INDEX UNIQ_2CCC2E2CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professionals (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, payment_completed TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_2DBE308EA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, full_name VARCHAR(255) NOT NULL, username VARCHAR(100) NOT NULL, country VARCHAR(100) NOT NULL, contact VARCHAR(50) NOT NULL, whatsapp TINYINT(1) NOT NULL, telegram TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), UNIQUE INDEX UNIQ_1483A5E9F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE patients ADD CONSTRAINT FK_2CCC2E2CA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE professionals ADD CONSTRAINT FK_2DBE308EA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patients DROP FOREIGN KEY FK_2CCC2E2CA76ED395');
        $this->addSql('ALTER TABLE professionals DROP FOREIGN KEY FK_2DBE308EA76ED395');
        $this->addSql('DROP TABLE patients');
        $this->addSql('DROP TABLE professionals');
        $this->addSql('DROP TABLE users');
    }
}
