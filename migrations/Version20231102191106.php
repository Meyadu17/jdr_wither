<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231102191106 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE arme_arm ADD arm_description LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE armure_apr ADD apr_description LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE equipement_general_eqg ADD eqg_description LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE ingredient_ing CHANGE ing_description ing_description LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE arme_arm DROP arm_description');
        $this->addSql('ALTER TABLE ingredient_ing CHANGE ing_description ing_description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE armure_apr DROP apr_description');
        $this->addSql('ALTER TABLE equipement_general_eqg DROP eqg_description');
    }
}
