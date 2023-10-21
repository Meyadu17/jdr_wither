<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231021113559 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE arme_arm (arm_id INT AUTO_INCREMENT NOT NULL, arm_nom VARCHAR(255) NOT NULL, arm_degat VARCHAR(255) DEFAULT NULL, arm_mains INT DEFAULT NULL, arm_portee INT DEFAULT NULL, arm_effet VARCHAR(255) NOT NULL, arm_poids DOUBLE PRECISION NOT NULL, arm_prix INT NOT NULL, arm_taille VARCHAR(255) NOT NULL, arm_type VARCHAR(255) NOT NULL, PRIMARY KEY(arm_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE armure_apr (apr_id INT AUTO_INCREMENT NOT NULL, apr_nom VARCHAR(255) NOT NULL, apr_protection INT NOT NULL, apr_effet VARCHAR(255) NOT NULL, apr_encombrement INT NOT NULL, apr_poids DOUBLE PRECISION NOT NULL, apr_prix INT NOT NULL, PRIMARY KEY(apr_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement_general_eqg (eqg_id INT AUTO_INCREMENT NOT NULL, eqg_nom VARCHAR(255) NOT NULL, eqg_poids DOUBLE PRECISION NOT NULL, eqg_prix INT NOT NULL, PRIMARY KEY(eqg_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient_ing (ing_id INT AUTO_INCREMENT NOT NULL, ing_nom VARCHAR(255) NOT NULL, ing_description VARCHAR(255) NOT NULL, ing_effet VARCHAR(255) NOT NULL, ing_prix INT NOT NULL, PRIMARY KEY(ing_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE outil (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, effet VARCHAR(255) NOT NULL, poids DOUBLE PRECISION NOT NULL, prix INT NOT NULL, taille VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE arme_arm');
        $this->addSql('DROP TABLE armure_apr');
        $this->addSql('DROP TABLE equipement_general_eqg');
        $this->addSql('DROP TABLE ingredient_ing');
        $this->addSql('DROP TABLE outil');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
