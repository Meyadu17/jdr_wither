<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231103205105 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE signe_sig CHANGE sig_description sig_description LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE sort_sor CHANGE sor_cout sor_cout VARCHAR(255) NOT NULL, CHANGE sor_effet sor_effet LONGTEXT NOT NULL, CHANGE sor_portee sor_portee VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sort_sor CHANGE sor_cout sor_cout INT NOT NULL, CHANGE sor_effet sor_effet VARCHAR(255) NOT NULL, CHANGE sor_portee sor_portee INT NOT NULL');
        $this->addSql('ALTER TABLE signe_sig CHANGE sig_description sig_description VARCHAR(255) NOT NULL');
    }
}
