<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250315115613 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE nouvel_article (id SERIAL NOT NULL, categorie_id INT NOT NULL, nom VARCHAR(200) NOT NULL, description TEXT NOT NULL, date DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8BC94FA7BCF5E72D ON nouvel_article (categorie_id)');
        $this->addSql('ALTER TABLE nouvel_article ADD CONSTRAINT FK_8BC94FA7BCF5E72D FOREIGN KEY (categorie_id) REFERENCES nouvelle_categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE nouvel_article DROP CONSTRAINT FK_8BC94FA7BCF5E72D');
        $this->addSql('DROP TABLE nouvel_article');
    }
}
