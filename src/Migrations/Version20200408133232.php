<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200408133232 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE mika_tb (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, mika_cd INTEGER DEFAULT NULL, mika_name VARCHAR(255) DEFAULT NULL)');
        $this->addSql('DROP INDEX IDX_B6BD307F217BBB47');
        $this->addSql('CREATE TEMPORARY TABLE __temp__message AS SELECT id, person_id, content, posted FROM message');
        $this->addSql('DROP TABLE message');
        $this->addSql('CREATE TABLE message (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, person_id INTEGER DEFAULT NULL, content VARCHAR(255) NOT NULL COLLATE BINARY, posted DATETIME NOT NULL, CONSTRAINT FK_B6BD307F217BBB47 FOREIGN KEY (person_id) REFERENCES person (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO message (id, person_id, content, posted) SELECT id, person_id, content, posted FROM __temp__message');
        $this->addSql('DROP TABLE __temp__message');
        $this->addSql('CREATE INDEX IDX_B6BD307F217BBB47 ON message (person_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE mika_tb');
        $this->addSql('DROP INDEX IDX_B6BD307F217BBB47');
        $this->addSql('CREATE TEMPORARY TABLE __temp__message AS SELECT id, person_id, content, posted FROM message');
        $this->addSql('DROP TABLE message');
        $this->addSql('CREATE TABLE message (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, person_id INTEGER DEFAULT NULL, content VARCHAR(255) NOT NULL, posted DATETIME NOT NULL)');
        $this->addSql('INSERT INTO message (id, person_id, content, posted) SELECT id, person_id, content, posted FROM __temp__message');
        $this->addSql('DROP TABLE __temp__message');
        $this->addSql('CREATE INDEX IDX_B6BD307F217BBB47 ON message (person_id)');
    }
}
