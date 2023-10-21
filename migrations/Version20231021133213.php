<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231021133213 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE don_don (don_id INT AUTO_INCREMENT NOT NULL, don_nom VARCHAR(255) NOT NULL, don_pres_requis VARCHAR(255) DEFAULT NULL, don_initiative INT DEFAULT NULL, don_effet VARCHAR(255) NOT NULL, don_type VARCHAR(255) NOT NULL, PRIMARY KEY(don_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE signe (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, niveau VARCHAR(255) NOT NULL, element VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, cout VARCHAR(255) NOT NULL, portee INT NOT NULL, contre VARCHAR(255) DEFAULT NULL, duree VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sort_sor (sor_id INT AUTO_INCREMENT NOT NULL, sor_nom VARCHAR(255) NOT NULL, sor_niveau VARCHAR(255) NOT NULL, sor_element VARCHAR(255) NOT NULL, sor_cout INT NOT NULL, sor_effet VARCHAR(255) NOT NULL, sor_portee INT NOT NULL, sor_duree VARCHAR(255) NOT NULL, sor_contre VARCHAR(255) NOT NULL, PRIMARY KEY(sor_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE don_don');
        $this->addSql('DROP TABLE signe');
        $this->addSql('DROP TABLE sort_sor');
    }
}
