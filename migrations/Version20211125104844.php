<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211125104844 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE modele (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //$this->addSql('DROP TABLE agent');
        $this->addSql('ALTER TABLE location ADD voiture_loc_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB46F100CB FOREIGN KEY (voiture_loc_id) REFERENCES voiture (id)');
        $this->addSql('CREATE INDEX IDX_5E9E89CB46F100CB ON location (voiture_loc_id)');
        $this->addSql('ALTER TABLE voiture ADD marque_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810F4827B9B2 FOREIGN KEY (marque_id) REFERENCES modele (id)');
        $this->addSql('CREATE INDEX IDX_E9E2810F4827B9B2 ON voiture (marque_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voiture DROP FOREIGN KEY FK_E9E2810F4827B9B2');
        $this->addSql('CREATE TABLE agent (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE modele');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CB46F100CB');
        $this->addSql('DROP INDEX IDX_5E9E89CB46F100CB ON location');
        $this->addSql('ALTER TABLE location DROP voiture_loc_id');
        $this->addSql('DROP INDEX IDX_E9E2810F4827B9B2 ON voiture');
        $this->addSql('ALTER TABLE voiture DROP marque_id');
    }
}
