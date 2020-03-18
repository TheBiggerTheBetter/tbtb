<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200318054752 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('ALTER TABLE person ADD COLUMN identifier VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE person ADD COLUMN slug VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__person AS SELECT id, given_name, family_name, name, alternate_name, birth_date, birth_place, image, email, death_date, death_place, homepage, same_as FROM person');
        $this->addSql('DROP TABLE person');
        $this->addSql('CREATE TABLE person (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, given_name VARCHAR(255) DEFAULT NULL, family_name VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, alternate_name VARCHAR(255) DEFAULT NULL, birth_date DATE DEFAULT NULL, birth_place VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, death_date DATE DEFAULT NULL, death_place DATE DEFAULT NULL, homepage VARCHAR(255) DEFAULT NULL, same_as VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO person (id, given_name, family_name, name, alternate_name, birth_date, birth_place, image, email, death_date, death_place, homepage, same_as) SELECT id, given_name, family_name, name, alternate_name, birth_date, birth_place, image, email, death_date, death_place, homepage, same_as FROM __temp__person');
        $this->addSql('DROP TABLE __temp__person');
    }
}
