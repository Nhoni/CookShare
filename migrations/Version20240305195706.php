<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240305195706 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recipe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(50) NOT NULL, time INTEGER DEFAULT NULL, nb_people INTEGER DEFAULT NULL, difficulty INTEGER DEFAULT NULL, description CLOB NOT NULL, quantite DOUBLE PRECISION DEFAULT NULL, is_favorite BOOLEAN NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE recipe_ingredient (recipe_id INTEGER NOT NULL, ingredient_id INTEGER NOT NULL, PRIMARY KEY(recipe_id, ingredient_id), CONSTRAINT FK_22D1FE1359D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_22D1FE13933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_22D1FE1359D8A214 ON recipe_ingredient (recipe_id)');
        $this->addSql('CREATE INDEX IDX_22D1FE13933FE08C ON recipe_ingredient (ingredient_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__ingredient AS SELECT id, name, created_at, quantite, unite FROM ingredient');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('CREATE TABLE ingredient (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , quantite DOUBLE PRECISION NOT NULL, unite VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO ingredient (id, name, created_at, quantite, unite) SELECT id, name, created_at, quantite, unite FROM __temp__ingredient');
        $this->addSql('DROP TABLE __temp__ingredient');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE recipe');
        $this->addSql('DROP TABLE recipe_ingredient');
        $this->addSql('CREATE TEMPORARY TABLE __temp__ingredient AS SELECT id, name, created_at, quantite, unite FROM ingredient');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('CREATE TABLE ingredient (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , quantite DOUBLE PRECISION NOT NULL, unite VARCHAR(50) NOT NULL)');
        $this->addSql('INSERT INTO ingredient (id, name, created_at, quantite, unite) SELECT id, name, created_at, quantite, unite FROM __temp__ingredient');
        $this->addSql('DROP TABLE __temp__ingredient');
    }
}
