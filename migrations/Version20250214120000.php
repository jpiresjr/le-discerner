<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250214120000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add payment status metadata to professionals';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE professionals ADD payment_status VARCHAR(50) DEFAULT NULL, ADD payment_provider_id VARCHAR(255) DEFAULT NULL, ADD payment_updated_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE professionals DROP payment_status, DROP payment_provider_id, DROP payment_updated_at');
    }
}
