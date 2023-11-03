<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231103201825 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE signe_sig DROP FOREIGN KEY FK_6F8E59BA588F019C');
        $this->addSql('DROP INDEX IDX_6F8E59BA588F019C ON signe_sig');
        $this->addSql('ALTER TABLE signe_sig CHANGE sigr_fk_nsi_id sig_fk_nsi_id INT NOT NULL');
        $this->addSql('ALTER TABLE signe_sig ADD CONSTRAINT FK_6F8E59BAA886D32C FOREIGN KEY (sig_fk_nsi_id) REFERENCES niveau_signe_nsi (nsi_id)');
        $this->addSql('CREATE INDEX IDX_6F8E59BAA886D32C ON signe_sig (sig_fk_nsi_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE signe_sig DROP FOREIGN KEY FK_6F8E59BAA886D32C');
        $this->addSql('DROP INDEX IDX_6F8E59BAA886D32C ON signe_sig');
        $this->addSql('ALTER TABLE signe_sig CHANGE sig_fk_nsi_id sigr_fk_nsi_id INT NOT NULL');
        $this->addSql('ALTER TABLE signe_sig ADD CONSTRAINT FK_6F8E59BA588F019C FOREIGN KEY (sigr_fk_nsi_id) REFERENCES niveau_signe_nsi (nsi_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_6F8E59BA588F019C ON signe_sig (sigr_fk_nsi_id)');
    }
}
