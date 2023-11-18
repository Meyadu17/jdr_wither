<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231118220122 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE talent_caracteristique_tc DROP FOREIGN KEY FK_2BD02B5F1892E1B4');
        $this->addSql('ALTER TABLE talent_caracteristique_tc DROP FOREIGN KEY FK_2BD02B5F1C8E3BB0');
        $this->addSql('DROP TABLE talent_caracteristique_tc');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE talent_caracteristique_tc (tc_id INT AUTO_INCREMENT NOT NULL, tc_kf_tal_id INT NOT NULL, tc_kf_cap_id INT NOT NULL, INDEX IDX_2BD02B5F1C8E3BB0 (tc_kf_tal_id), INDEX IDX_2BD02B5F1892E1B4 (tc_kf_cap_id), PRIMARY KEY(tc_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE talent_caracteristique_tc ADD CONSTRAINT FK_2BD02B5F1892E1B4 FOREIGN KEY (tc_kf_cap_id) REFERENCES caracteristique_cap (cap_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE talent_caracteristique_tc ADD CONSTRAINT FK_2BD02B5F1C8E3BB0 FOREIGN KEY (tc_kf_tal_id) REFERENCES talent_tal (tal_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
