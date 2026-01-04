<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20251203132000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add ad details to professionals';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE professionals ADD ad_details LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE professionals DROP ad_details');
    }
}
