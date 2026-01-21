<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20251203140000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Ensure professionals payment metadata columns exist';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE professionals ADD COLUMN IF NOT EXISTS payment_status VARCHAR(50) DEFAULT NULL, ADD COLUMN IF NOT EXISTS payment_provider_id VARCHAR(255) DEFAULT NULL, ADD COLUMN IF NOT EXISTS payment_updated_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE professionals DROP COLUMN IF EXISTS payment_status, DROP COLUMN IF EXISTS payment_provider_id, DROP COLUMN IF EXISTS payment_updated_at');
    }
}
