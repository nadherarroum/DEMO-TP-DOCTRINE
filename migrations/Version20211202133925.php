<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211202133925 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voiture DROP FOREIGN KEY FK_E9E2810F7975B7E7');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE model');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CB181A8BA');
        $this->addSql('DROP INDEX IDX_5E9E89CB181A8BA ON location');
        $this->addSql('ALTER TABLE location DROP voiture_id, CHANGE date_debut date_debut DATE NOT NULL, CHANGE date_retour date_retour VARCHAR(255) NOT NULL, CHANGE prix prix DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE voiture DROP FOREIGN KEY FK_E9E2810F4827B9B2');
        $this->addSql('ALTER TABLE voiture DROP FOREIGN KEY FK_E9E2810F7975B7E7');
        $this->addSql('DROP INDEX IDX_E9E2810F4827B9B2 ON voiture');
        $this->addSql('ALTER TABLE voiture DROP marque_id, DROP modele');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810F7975B7E7 FOREIGN KEY (model_id) REFERENCES modele (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, pays VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE location ADD voiture_id INT DEFAULT NULL, CHANGE date_debut date_debut DATE DEFAULT NULL, CHANGE date_retour date_retour DATE DEFAULT NULL, CHANGE prix prix NUMERIC(6, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB181A8BA FOREIGN KEY (voiture_id) REFERENCES voiture (id)');
        $this->addSql('CREATE INDEX IDX_5E9E89CB181A8BA ON location (voiture_id)');
        $this->addSql('ALTER TABLE voiture DROP FOREIGN KEY FK_E9E2810F7975B7E7');
        $this->addSql('ALTER TABLE voiture ADD marque_id INT DEFAULT NULL, ADD modele VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810F4827B9B2 FOREIGN KEY (marque_id) REFERENCES modele (id)');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810F7975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
        $this->addSql('CREATE INDEX IDX_E9E2810F4827B9B2 ON voiture (marque_id)');
    }
}
