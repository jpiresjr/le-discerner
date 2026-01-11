<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20251203130000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add admin professional management fields';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE professionals ADD specialty_category VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE professionals ADD credentials LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE professionals ADD certifications LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE professionals ADD rating_average DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE professionals ADD rating_count INT DEFAULT NULL');
        $this->addSql('ALTER TABLE professionals ADD verification_status VARCHAR(30) DEFAULT NULL');
        $this->addSql('ALTER TABLE professionals ADD verification_docs LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE professionals ADD financial_history LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE professionals DROP specialty_category');
        $this->addSql('ALTER TABLE professionals DROP credentials');
        $this->addSql('ALTER TABLE professionals DROP certifications');
        $this->addSql('ALTER TABLE professionals DROP rating_average');
        $this->addSql('ALTER TABLE professionals DROP rating_count');
        $this->addSql('ALTER TABLE professionals DROP verification_status');
        $this->addSql('ALTER TABLE professionals DROP verification_docs');
        $this->addSql('ALTER TABLE professionals DROP financial_history');
    }
}
