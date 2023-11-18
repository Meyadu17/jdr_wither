<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231118170934 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE arme_arm (arm_id INT AUTO_INCREMENT NOT NULL, arm_fk_car_id INT NOT NULL, arm_fk_tai_id INT NOT NULL, arm_nom VARCHAR(255) NOT NULL, arm_degat VARCHAR(255) DEFAULT NULL, arm_mains INT DEFAULT NULL, arm_portee VARCHAR(255) DEFAULT NULL, arm_effet VARCHAR(255) DEFAULT NULL, arm_poids DOUBLE PRECISION NOT NULL, arm_prix INT NOT NULL, arm_description LONGTEXT NOT NULL, INDEX IDX_135DE285C25ED669 (arm_fk_car_id), INDEX IDX_135DE2855B9534D4 (arm_fk_tai_id), PRIMARY KEY(arm_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE armure_apr (apr_id INT AUTO_INCREMENT NOT NULL, apr_fk_tar_id INT NOT NULL, apr_fk_ear_id INT NOT NULL, apr_nom VARCHAR(255) NOT NULL, apr_protection INT DEFAULT NULL, apr_effet VARCHAR(255) DEFAULT NULL, apr_poids DOUBLE PRECISION NOT NULL, apr_prix INT NOT NULL, apr_description LONGTEXT NOT NULL, INDEX IDX_AA33257FDB84AD8 (apr_fk_tar_id), INDEX IDX_AA33257FC5329BE6 (apr_fk_ear_id), PRIMARY KEY(apr_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE caracteristique_cap (cap_id INT AUTO_INCREMENT NOT NULL, cap_libelle VARCHAR(255) NOT NULL, PRIMARY KEY(cap_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_arme_car (car_id INT AUTO_INCREMENT NOT NULL, car_libelle VARCHAR(255) NOT NULL, PRIMARY KEY(car_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_fourniture_caf (caf_id INT AUTO_INCREMENT NOT NULL, caf_libelle VARCHAR(255) NOT NULL, PRIMARY KEY(caf_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE don_don (don_id INT AUTO_INCREMENT NOT NULL, don_fk_tdo_id INT DEFAULT NULL, don_nom VARCHAR(255) NOT NULL, don_pres_requis VARCHAR(255) DEFAULT NULL, don_initiative INT NOT NULL, don_effet LONGTEXT NOT NULL, INDEX IDX_A9EA8414A064DD78 (don_fk_tdo_id), PRIMARY KEY(don_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element_ele (ele_id INT AUTO_INCREMENT NOT NULL, ele_libelle VARCHAR(255) NOT NULL, PRIMARY KEY(ele_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emplacement_armure_tar (tar_id INT AUTO_INCREMENT NOT NULL, tar_libelle VARCHAR(255) NOT NULL, PRIMARY KEY(tar_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE encombrement_armure_ear (ear_id INT AUTO_INCREMENT NOT NULL, ear_libelle VARCHAR(255) NOT NULL, PRIMARY KEY(ear_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement_general_eqg (eqg_id INT AUTO_INCREMENT NOT NULL, eqg_fk_caf_id INT NOT NULL, eqg_nom VARCHAR(255) NOT NULL, eqg_poids DOUBLE PRECISION NOT NULL, eqg_prix INT NOT NULL, eqg_description LONGTEXT NOT NULL, INDEX IDX_A50205A748ADF643 (eqg_fk_caf_id), PRIMARY KEY(eqg_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE handicap_han (han_id INT AUTO_INCREMENT NOT NULL, han_no_liste TINYINT(1) NOT NULL, han_libelle TINYINT(1) NOT NULL, han_descrition LONGTEXT NOT NULL, han_formation VARCHAR(20) DEFAULT NULL, PRIMARY KEY(han_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient_ing (id INT AUTO_INCREMENT NOT NULL, ing_nom VARCHAR(255) NOT NULL, ing_effet LONGTEXT NOT NULL, ing_prix INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_caracteristique_jc (jc_id INT AUTO_INCREMENT NOT NULL, jc_kf_job_id INT NOT NULL, jc_kf_cap_id INT NOT NULL, INDEX IDX_6F9E28849F94AFEB (jc_kf_job_id), INDEX IDX_6F9E2884FDBBDF56 (jc_kf_cap_id), PRIMARY KEY(jc_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_job (job_id INT AUTO_INCREMENT NOT NULL, job_libelle VARCHAR(50) NOT NULL, job_presrequis VARCHAR(15) NOT NULL, PRIMARY KEY(job_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau_signe_nsi (nsi_id INT AUTO_INCREMENT NOT NULL, nsi_libelle VARCHAR(255) NOT NULL, PRIMARY KEY(nsi_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau_sor_nso (nso_id INT AUTO_INCREMENT NOT NULL, nso_libelle VARCHAR(255) NOT NULL, PRIMARY KEY(nso_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE outil_out (out_id INT AUTO_INCREMENT NOT NULL, out_id_tai_id INT DEFAULT NULL, out_nom VARCHAR(255) NOT NULL, out_effet VARCHAR(255) NOT NULL, out_poids DOUBLE PRECISION NOT NULL, out_prix INT NOT NULL, INDEX IDX_3FB85EB66C9F6D8 (out_id_tai_id), PRIMARY KEY(out_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE signe_sig (sig_id INT AUTO_INCREMENT NOT NULL, sig_fk_ele_id INT DEFAULT NULL, sig_fk_nsi_id INT NOT NULL, sig_nom VARCHAR(255) NOT NULL, sig_description LONGTEXT NOT NULL, sig_cout VARCHAR(255) NOT NULL, sig_portee VARCHAR(255) NOT NULL, sig_contre VARCHAR(255) DEFAULT NULL, sig_duree VARCHAR(255) NOT NULL, INDEX IDX_6F8E59BA6A279C04 (sig_fk_ele_id), INDEX IDX_6F8E59BAA886D32C (sig_fk_nsi_id), PRIMARY KEY(sig_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sort_sor (sor_id INT AUTO_INCREMENT NOT NULL, sor_fk_ele_id INT DEFAULT NULL, sor_fk_nso_id INT DEFAULT NULL, sor_nom VARCHAR(255) NOT NULL, sor_cout VARCHAR(255) NOT NULL, sor_effet LONGTEXT NOT NULL, sor_portee VARCHAR(255) NOT NULL, sor_duree VARCHAR(255) NOT NULL, sor_contre VARCHAR(255) NOT NULL, INDEX IDX_E90C31565ABB516D (sor_fk_ele_id), INDEX IDX_E90C3156BD714199 (sor_fk_nso_id), PRIMARY KEY(sor_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taille_tai (tai_id INT AUTO_INCREMENT NOT NULL, tai_libelle VARCHAR(255) NOT NULL, PRIMARY KEY(tai_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE talent_caracteristique_tc (tc_id INT AUTO_INCREMENT NOT NULL, tc_kf_tal_id INT NOT NULL, tc_kf_cap_id INT NOT NULL, INDEX IDX_2BD02B5F1C8E3BB0 (tc_kf_tal_id), INDEX IDX_2BD02B5F1892E1B4 (tc_kf_cap_id), PRIMARY KEY(tc_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE talent_job_tc (tj_id INT AUTO_INCREMENT NOT NULL, tj_kf_tal_id INT NOT NULL, tj_kf_job_id INT NOT NULL, INDEX IDX_19C2F18B67C30535 (tj_kf_tal_id), INDEX IDX_19C2F18B1F0AF8C (tj_kf_job_id), PRIMARY KEY(tj_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE talent_tal (tal_id INT AUTO_INCREMENT NOT NULL, tal_fk_cap_id INT NOT NULL, tal_libelle VARCHAR(20) NOT NULL, tal_description VARCHAR(255) NOT NULL, INDEX IDX_CF228E0D7B77EBE7 (tal_fk_cap_id), PRIMARY KEY(tal_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_don_tdo (tdo_id INT AUTO_INCREMENT NOT NULL, tdo_libelle VARCHAR(255) NOT NULL, PRIMARY KEY(tdo_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, pseudo VARCHAR(255) NOT NULL, photo VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D64986CC499D (pseudo), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE arme_arm ADD CONSTRAINT FK_135DE285C25ED669 FOREIGN KEY (arm_fk_car_id) REFERENCES categorie_arme_car (car_id)');
        $this->addSql('ALTER TABLE arme_arm ADD CONSTRAINT FK_135DE2855B9534D4 FOREIGN KEY (arm_fk_tai_id) REFERENCES taille_tai (tai_id)');
        $this->addSql('ALTER TABLE armure_apr ADD CONSTRAINT FK_AA33257FDB84AD8 FOREIGN KEY (apr_fk_tar_id) REFERENCES emplacement_armure_tar (tar_id)');
        $this->addSql('ALTER TABLE armure_apr ADD CONSTRAINT FK_AA33257FC5329BE6 FOREIGN KEY (apr_fk_ear_id) REFERENCES encombrement_armure_ear (ear_id)');
        $this->addSql('ALTER TABLE don_don ADD CONSTRAINT FK_A9EA8414A064DD78 FOREIGN KEY (don_fk_tdo_id) REFERENCES type_don_tdo (tdo_id)');
        $this->addSql('ALTER TABLE equipement_general_eqg ADD CONSTRAINT FK_A50205A748ADF643 FOREIGN KEY (eqg_fk_caf_id) REFERENCES categorie_fourniture_caf (caf_id)');
        $this->addSql('ALTER TABLE job_caracteristique_jc ADD CONSTRAINT FK_6F9E28849F94AFEB FOREIGN KEY (jc_kf_job_id) REFERENCES job_job (job_id)');
        $this->addSql('ALTER TABLE job_caracteristique_jc ADD CONSTRAINT FK_6F9E2884FDBBDF56 FOREIGN KEY (jc_kf_cap_id) REFERENCES caracteristique_cap (cap_id)');
        $this->addSql('ALTER TABLE outil_out ADD CONSTRAINT FK_3FB85EB66C9F6D8 FOREIGN KEY (out_id_tai_id) REFERENCES taille_tai (tai_id)');
        $this->addSql('ALTER TABLE signe_sig ADD CONSTRAINT FK_6F8E59BA6A279C04 FOREIGN KEY (sig_fk_ele_id) REFERENCES element_ele (ele_id)');
        $this->addSql('ALTER TABLE signe_sig ADD CONSTRAINT FK_6F8E59BAA886D32C FOREIGN KEY (sig_fk_nsi_id) REFERENCES niveau_signe_nsi (nsi_id)');
        $this->addSql('ALTER TABLE sort_sor ADD CONSTRAINT FK_E90C31565ABB516D FOREIGN KEY (sor_fk_ele_id) REFERENCES element_ele (ele_id)');
        $this->addSql('ALTER TABLE sort_sor ADD CONSTRAINT FK_E90C3156BD714199 FOREIGN KEY (sor_fk_nso_id) REFERENCES niveau_sor_nso (nso_id)');
        $this->addSql('ALTER TABLE talent_caracteristique_tc ADD CONSTRAINT FK_2BD02B5F1C8E3BB0 FOREIGN KEY (tc_kf_tal_id) REFERENCES talent_tal (tal_id)');
        $this->addSql('ALTER TABLE talent_caracteristique_tc ADD CONSTRAINT FK_2BD02B5F1892E1B4 FOREIGN KEY (tc_kf_cap_id) REFERENCES caracteristique_cap (cap_id)');
        $this->addSql('ALTER TABLE talent_job_tc ADD CONSTRAINT FK_19C2F18B67C30535 FOREIGN KEY (tj_kf_tal_id) REFERENCES talent_tal (tal_id)');
        $this->addSql('ALTER TABLE talent_job_tc ADD CONSTRAINT FK_19C2F18B1F0AF8C FOREIGN KEY (tj_kf_job_id) REFERENCES job_job (job_id)');
        $this->addSql('ALTER TABLE talent_tal ADD CONSTRAINT FK_CF228E0D7B77EBE7 FOREIGN KEY (tal_fk_cap_id) REFERENCES caracteristique_cap (cap_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE arme_arm DROP FOREIGN KEY FK_135DE285C25ED669');
        $this->addSql('ALTER TABLE arme_arm DROP FOREIGN KEY FK_135DE2855B9534D4');
        $this->addSql('ALTER TABLE armure_apr DROP FOREIGN KEY FK_AA33257FDB84AD8');
        $this->addSql('ALTER TABLE armure_apr DROP FOREIGN KEY FK_AA33257FC5329BE6');
        $this->addSql('ALTER TABLE don_don DROP FOREIGN KEY FK_A9EA8414A064DD78');
        $this->addSql('ALTER TABLE equipement_general_eqg DROP FOREIGN KEY FK_A50205A748ADF643');
        $this->addSql('ALTER TABLE job_caracteristique_jc DROP FOREIGN KEY FK_6F9E28849F94AFEB');
        $this->addSql('ALTER TABLE job_caracteristique_jc DROP FOREIGN KEY FK_6F9E2884FDBBDF56');
        $this->addSql('ALTER TABLE outil_out DROP FOREIGN KEY FK_3FB85EB66C9F6D8');
        $this->addSql('ALTER TABLE signe_sig DROP FOREIGN KEY FK_6F8E59BA6A279C04');
        $this->addSql('ALTER TABLE signe_sig DROP FOREIGN KEY FK_6F8E59BAA886D32C');
        $this->addSql('ALTER TABLE sort_sor DROP FOREIGN KEY FK_E90C31565ABB516D');
        $this->addSql('ALTER TABLE sort_sor DROP FOREIGN KEY FK_E90C3156BD714199');
        $this->addSql('ALTER TABLE talent_caracteristique_tc DROP FOREIGN KEY FK_2BD02B5F1C8E3BB0');
        $this->addSql('ALTER TABLE talent_caracteristique_tc DROP FOREIGN KEY FK_2BD02B5F1892E1B4');
        $this->addSql('ALTER TABLE talent_job_tc DROP FOREIGN KEY FK_19C2F18B67C30535');
        $this->addSql('ALTER TABLE talent_job_tc DROP FOREIGN KEY FK_19C2F18B1F0AF8C');
        $this->addSql('ALTER TABLE talent_tal DROP FOREIGN KEY FK_CF228E0D7B77EBE7');
        $this->addSql('DROP TABLE arme_arm');
        $this->addSql('DROP TABLE armure_apr');
        $this->addSql('DROP TABLE caracteristique_cap');
        $this->addSql('DROP TABLE categorie_arme_car');
        $this->addSql('DROP TABLE categorie_fourniture_caf');
        $this->addSql('DROP TABLE don_don');
        $this->addSql('DROP TABLE element_ele');
        $this->addSql('DROP TABLE emplacement_armure_tar');
        $this->addSql('DROP TABLE encombrement_armure_ear');
        $this->addSql('DROP TABLE equipement_general_eqg');
        $this->addSql('DROP TABLE handicap_han');
        $this->addSql('DROP TABLE ingredient_ing');
        $this->addSql('DROP TABLE job_caracteristique_jc');
        $this->addSql('DROP TABLE job_job');
        $this->addSql('DROP TABLE niveau_signe_nsi');
        $this->addSql('DROP TABLE niveau_sor_nso');
        $this->addSql('DROP TABLE outil_out');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE signe_sig');
        $this->addSql('DROP TABLE sort_sor');
        $this->addSql('DROP TABLE taille_tai');
        $this->addSql('DROP TABLE talent_caracteristique_tc');
        $this->addSql('DROP TABLE talent_job_tc');
        $this->addSql('DROP TABLE talent_tal');
        $this->addSql('DROP TABLE type_don_tdo');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
