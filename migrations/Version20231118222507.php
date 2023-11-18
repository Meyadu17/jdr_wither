<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231118222507 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job_caracteristique_jc DROP FOREIGN KEY FK_6F9E28849F94AFEB');
        $this->addSql('ALTER TABLE job_caracteristique_jc DROP FOREIGN KEY FK_6F9E2884FDBBDF56');
        $this->addSql('ALTER TABLE talent_job_tc DROP FOREIGN KEY FK_19C2F18B1F0AF8C');
        $this->addSql('ALTER TABLE talent_job_tc DROP FOREIGN KEY FK_19C2F18B67C30535');
        $this->addSql('DROP TABLE job_caracteristique_jc');
        $this->addSql('DROP TABLE talent_job_tc');
        $this->addSql('ALTER TABLE job_job ADD bonus_caracteristiques JSON NOT NULL, ADD bonus_talent JSON NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE job_caracteristique_jc (jc_id INT AUTO_INCREMENT NOT NULL, jc_kf_job_id INT NOT NULL, jc_kf_cap_id INT NOT NULL, INDEX IDX_6F9E28849F94AFEB (jc_kf_job_id), INDEX IDX_6F9E2884FDBBDF56 (jc_kf_cap_id), PRIMARY KEY(jc_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE talent_job_tc (tj_id INT AUTO_INCREMENT NOT NULL, tj_kf_tal_id INT NOT NULL, tj_kf_job_id INT NOT NULL, INDEX IDX_19C2F18B67C30535 (tj_kf_tal_id), INDEX IDX_19C2F18B1F0AF8C (tj_kf_job_id), PRIMARY KEY(tj_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE job_caracteristique_jc ADD CONSTRAINT FK_6F9E28849F94AFEB FOREIGN KEY (jc_kf_job_id) REFERENCES job_job (job_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE job_caracteristique_jc ADD CONSTRAINT FK_6F9E2884FDBBDF56 FOREIGN KEY (jc_kf_cap_id) REFERENCES caracteristique_cap (cap_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE talent_job_tc ADD CONSTRAINT FK_19C2F18B1F0AF8C FOREIGN KEY (tj_kf_job_id) REFERENCES job_job (job_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE talent_job_tc ADD CONSTRAINT FK_19C2F18B67C30535 FOREIGN KEY (tj_kf_tal_id) REFERENCES talent_tal (tal_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE job_job DROP bonus_caracteristiques, DROP bonus_talent');
    }
}
