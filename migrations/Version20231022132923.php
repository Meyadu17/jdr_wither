<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231022132923 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE arme_arm (arm_id INT AUTO_INCREMENT NOT NULL, arm_fk_tai_id INT DEFAULT NULL, arm_fk_typ_id INT NOT NULL, arm_nom VARCHAR(255) NOT NULL, arm_degat VARCHAR(255) DEFAULT NULL, arm_mains INT DEFAULT NULL, arm_portee INT DEFAULT NULL, arm_effet VARCHAR(255) DEFAULT NULL, arm_poids DOUBLE PRECISION NOT NULL, arm_prix INT NOT NULL, INDEX IDX_135DE2855B9534D4 (arm_fk_tai_id), INDEX IDX_135DE2852614F082 (arm_fk_typ_id), PRIMARY KEY(arm_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE armure_apr (apr_id INT AUTO_INCREMENT NOT NULL, apr_nom VARCHAR(255) NOT NULL, apr_protection INT NOT NULL, apr_effet VARCHAR(255) NOT NULL, apr_encombrement INT NOT NULL, apr_poids DOUBLE PRECISION NOT NULL, apr_prix INT NOT NULL, PRIMARY KEY(apr_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE don_don (don_id INT AUTO_INCREMENT NOT NULL, don_fk_tdo_id INT DEFAULT NULL, don_nom VARCHAR(255) NOT NULL, don_pres_requis VARCHAR(255) DEFAULT NULL, don_initiative INT DEFAULT NULL, don_effet VARCHAR(255) NOT NULL, INDEX IDX_A9EA8414A064DD78 (don_fk_tdo_id), PRIMARY KEY(don_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element_ele (ele_id INT AUTO_INCREMENT NOT NULL, ele_libelle VARCHAR(255) NOT NULL, PRIMARY KEY(ele_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement_general_eqg (eqg_id INT AUTO_INCREMENT NOT NULL, eqg_nom VARCHAR(255) NOT NULL, eqg_poids DOUBLE PRECISION NOT NULL, eqg_prix INT NOT NULL, PRIMARY KEY(eqg_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient_ing (id INT AUTO_INCREMENT NOT NULL, ing_nom VARCHAR(255) NOT NULL, ing_description VARCHAR(255) NOT NULL, ing_effet VARCHAR(255) NOT NULL, ing_prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau_sor_nis (nis_id INT AUTO_INCREMENT NOT NULL, nis_libelle VARCHAR(255) NOT NULL, PRIMARY KEY(nis_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE outil_out (out_id INT AUTO_INCREMENT NOT NULL, out_id_tai_id INT DEFAULT NULL, out_nom VARCHAR(255) NOT NULL, out_effet VARCHAR(255) NOT NULL, out_poids DOUBLE PRECISION NOT NULL, out_prix INT NOT NULL, INDEX IDX_3FB85EB66C9F6D8 (out_id_tai_id), PRIMARY KEY(out_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE signe_sig (sig_id INT AUTO_INCREMENT NOT NULL, sig_fk_ele_id INT DEFAULT NULL, sig_nom VARCHAR(255) NOT NULL, sig_niveau_ VARCHAR(255) NOT NULL, sig_description VARCHAR(255) NOT NULL, sig_cout VARCHAR(255) NOT NULL, sig_portee INT NOT NULL, sig_contre VARCHAR(255) DEFAULT NULL, sig_duree VARCHAR(255) NOT NULL, INDEX IDX_6F8E59BA6A279C04 (sig_fk_ele_id), PRIMARY KEY(sig_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sort_sor (sor_id INT AUTO_INCREMENT NOT NULL, sor_fk_ele_id INT DEFAULT NULL, sor_fk_nis_id INT DEFAULT NULL, sor_nom VARCHAR(255) NOT NULL, sor_cout INT NOT NULL, sor_effet VARCHAR(255) NOT NULL, sor_portee INT NOT NULL, sor_duree VARCHAR(255) NOT NULL, sor_contre VARCHAR(255) NOT NULL, INDEX IDX_E90C31565ABB516D (sor_fk_ele_id), INDEX IDX_E90C31568DEE269D (sor_fk_nis_id), PRIMARY KEY(sor_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taille_tai (tai_id INT AUTO_INCREMENT NOT NULL, tai_libelle VARCHAR(255) NOT NULL, PRIMARY KEY(tai_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_don_tdo (tdo_id INT AUTO_INCREMENT NOT NULL, tdo_libelle VARCHAR(255) NOT NULL, PRIMARY KEY(tdo_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_typ (typ_id INT AUTO_INCREMENT NOT NULL, typ_libelle VARCHAR(255) NOT NULL, PRIMARY KEY(typ_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE arme_arm ADD CONSTRAINT FK_135DE2855B9534D4 FOREIGN KEY (arm_fk_tai_id) REFERENCES taille_tai (tai_id)');
        $this->addSql('ALTER TABLE arme_arm ADD CONSTRAINT FK_135DE2852614F082 FOREIGN KEY (arm_fk_typ_id) REFERENCES type_typ (typ_id)');
        $this->addSql('ALTER TABLE don_don ADD CONSTRAINT FK_A9EA8414A064DD78 FOREIGN KEY (don_fk_tdo_id) REFERENCES type_don_tdo (tdo_id)');
        $this->addSql('ALTER TABLE outil_out ADD CONSTRAINT FK_3FB85EB66C9F6D8 FOREIGN KEY (out_id_tai_id) REFERENCES taille_tai (tai_id)');
        $this->addSql('ALTER TABLE signe_sig ADD CONSTRAINT FK_6F8E59BA6A279C04 FOREIGN KEY (sig_fk_ele_id) REFERENCES element_ele (ele_id)');
        $this->addSql('ALTER TABLE sort_sor ADD CONSTRAINT FK_E90C31565ABB516D FOREIGN KEY (sor_fk_ele_id) REFERENCES element_ele (ele_id)');
        $this->addSql('ALTER TABLE sort_sor ADD CONSTRAINT FK_E90C31568DEE269D FOREIGN KEY (sor_fk_nis_id) REFERENCES niveau_sor_nis (nis_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE arme_arm DROP FOREIGN KEY FK_135DE2855B9534D4');
        $this->addSql('ALTER TABLE arme_arm DROP FOREIGN KEY FK_135DE2852614F082');
        $this->addSql('ALTER TABLE don_don DROP FOREIGN KEY FK_A9EA8414A064DD78');
        $this->addSql('ALTER TABLE outil_out DROP FOREIGN KEY FK_3FB85EB66C9F6D8');
        $this->addSql('ALTER TABLE signe_sig DROP FOREIGN KEY FK_6F8E59BA6A279C04');
        $this->addSql('ALTER TABLE sort_sor DROP FOREIGN KEY FK_E90C31565ABB516D');
        $this->addSql('ALTER TABLE sort_sor DROP FOREIGN KEY FK_E90C31568DEE269D');
        $this->addSql('DROP TABLE arme_arm');
        $this->addSql('DROP TABLE armure_apr');
        $this->addSql('DROP TABLE don_don');
        $this->addSql('DROP TABLE element_ele');
        $this->addSql('DROP TABLE equipement_general_eqg');
        $this->addSql('DROP TABLE ingredient_ing');
        $this->addSql('DROP TABLE niveau_sor_nis');
        $this->addSql('DROP TABLE outil_out');
        $this->addSql('DROP TABLE signe_sig');
        $this->addSql('DROP TABLE sort_sor');
        $this->addSql('DROP TABLE taille_tai');
        $this->addSql('DROP TABLE type_don_tdo');
        $this->addSql('DROP TABLE type_typ');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
