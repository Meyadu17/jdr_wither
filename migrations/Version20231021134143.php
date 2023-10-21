<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231021134143 extends AbstractMigration
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
        $this->addSql('CREATE TABLE don_don (don_id INT AUTO_INCREMENT NOT NULL, don_nom VARCHAR(255) NOT NULL, don_pres_requis VARCHAR(255) DEFAULT NULL, don_initiative INT DEFAULT NULL, don_effet VARCHAR(255) NOT NULL, don_type VARCHAR(255) NOT NULL, PRIMARY KEY(don_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement_general_eqg (eqg_id INT AUTO_INCREMENT NOT NULL, eqg_nom VARCHAR(255) NOT NULL, eqg_poids DOUBLE PRECISION NOT NULL, eqg_prix INT NOT NULL, PRIMARY KEY(eqg_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient_ing (ing_id INT AUTO_INCREMENT NOT NULL, ing_nom VARCHAR(255) NOT NULL, ing_description VARCHAR(255) NOT NULL, ing_effet VARCHAR(255) NOT NULL, ing_prix INT NOT NULL, PRIMARY KEY(ing_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE outil_out (out_ INT AUTO_INCREMENT NOT NULL, out_nom VARCHAR(255) NOT NULL, out_effet VARCHAR(255) NOT NULL, out_poids DOUBLE PRECISION NOT NULL, out_prix INT NOT NULL, out_taille VARCHAR(255) NOT NULL, PRIMARY KEY(out_)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE signe_sig (sig_id INT AUTO_INCREMENT NOT NULL, sig_nom VARCHAR(255) NOT NULL, signiveau_ VARCHAR(255) NOT NULL, sig_element VARCHAR(255) NOT NULL, sig_description VARCHAR(255) NOT NULL, sig_cout VARCHAR(255) NOT NULL, sig_portee INT NOT NULL, sig_contre VARCHAR(255) DEFAULT NULL, sig_duree VARCHAR(255) NOT NULL, PRIMARY KEY(sig_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sort_sor (sor_id INT AUTO_INCREMENT NOT NULL, sor_nom VARCHAR(255) NOT NULL, sor_niveau VARCHAR(255) NOT NULL, sor_element VARCHAR(255) NOT NULL, sor_cout INT NOT NULL, sor_effet VARCHAR(255) NOT NULL, sor_portee INT NOT NULL, sor_duree VARCHAR(255) NOT NULL, sor_contre VARCHAR(255) NOT NULL, PRIMARY KEY(sor_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE arme_arm');
        $this->addSql('DROP TABLE armure_apr');
        $this->addSql('DROP TABLE don_don');
        $this->addSql('DROP TABLE equipement_general_eqg');
        $this->addSql('DROP TABLE ingredient_ing');
        $this->addSql('DROP TABLE outil_out');
        $this->addSql('DROP TABLE signe_sig');
        $this->addSql('DROP TABLE sort_sor');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
