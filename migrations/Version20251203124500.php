<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20251203124500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add therapy type and status to patients';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE patients ADD therapy_type VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE patients ADD status VARCHAR(20) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE patients DROP therapy_type');
        $this->addSql('ALTER TABLE patients DROP status');
    }
}
