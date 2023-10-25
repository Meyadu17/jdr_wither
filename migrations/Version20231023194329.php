<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231023194329 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE type_armure_tar (tar_id INT AUTO_INCREMENT NOT NULL, tar_libelle VARCHAR(255) NOT NULL, PRIMARY KEY(tar_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE armure_apr ADD apr_fk_tar_id INT NOT NULL');
        $this->addSql('ALTER TABLE armure_apr ADD CONSTRAINT FK_AA33257FDB84AD8 FOREIGN KEY (apr_fk_tar_id) REFERENCES type_armure_tar (tar_id)');
        $this->addSql('CREATE INDEX IDX_AA33257FDB84AD8 ON armure_apr (apr_fk_tar_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE armure_apr DROP FOREIGN KEY FK_AA33257FDB84AD8');
        $this->addSql('DROP TABLE type_armure_tar');
        $this->addSql('DROP INDEX IDX_AA33257FDB84AD8 ON armure_apr');
        $this->addSql('ALTER TABLE armure_apr DROP apr_fk_tar_id');
    }
}
