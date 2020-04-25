<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200425090449 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_D9A601809B6B5FBA');
        $this->addSql('DROP INDEX IDX_D9A60180A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__trn_expenses AS SELECT id, user_id, account_id, reporting_date, price, qty, settled_date, note, registrate_date FROM trn_expenses');
        $this->addSql('DROP TABLE trn_expenses');
        $this->addSql('CREATE TABLE trn_expenses (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, account_id INTEGER NOT NULL, reporting_date DATETIME NOT NULL, price NUMERIC(12, 2) NOT NULL, qty NUMERIC(10, 2) NOT NULL, settled_date DATETIME DEFAULT NULL, note VARCHAR(255) DEFAULT NULL COLLATE BINARY, registrate_date DATETIME DEFAULT NULL, CONSTRAINT FK_D9A601809B6B5FBA FOREIGN KEY (account_id) REFERENCES mst_account (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_D9A60180A76ED395 FOREIGN KEY (user_id) REFERENCES mst_users (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO trn_expenses (id, user_id, account_id, reporting_date, price, qty, settled_date, note, registrate_date) SELECT id, user_id, account_id, reporting_date, price, qty, settled_date, note, registrate_date FROM __temp__trn_expenses');
        $this->addSql('DROP TABLE __temp__trn_expenses');
        $this->addSql('CREATE INDEX IDX_D9A601809B6B5FBA ON trn_expenses (account_id)');
        $this->addSql('CREATE INDEX IDX_D9A60180A76ED395 ON trn_expenses (user_id)');
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

        $this->addSql('DROP INDEX IDX_B6BD307F217BBB47');
        $this->addSql('CREATE TEMPORARY TABLE __temp__message AS SELECT id, person_id, content, posted FROM message');
        $this->addSql('DROP TABLE message');
        $this->addSql('CREATE TABLE message (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, person_id INTEGER DEFAULT NULL, content VARCHAR(255) NOT NULL, posted DATETIME NOT NULL)');
        $this->addSql('INSERT INTO message (id, person_id, content, posted) SELECT id, person_id, content, posted FROM __temp__message');
        $this->addSql('DROP TABLE __temp__message');
        $this->addSql('CREATE INDEX IDX_B6BD307F217BBB47 ON message (person_id)');
        $this->addSql('DROP INDEX IDX_D9A601809B6B5FBA');
        $this->addSql('DROP INDEX IDX_D9A60180A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__trn_expenses AS SELECT id, account_id, user_id, reporting_date, price, qty, registrate_date, settled_date, note FROM trn_expenses');
        $this->addSql('DROP TABLE trn_expenses');
        $this->addSql('CREATE TABLE trn_expenses (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, account_id INTEGER NOT NULL, user_id INTEGER NOT NULL, reporting_date DATETIME NOT NULL, price NUMERIC(12, 2) NOT NULL, qty NUMERIC(10, 2) NOT NULL, registrate_date DATETIME DEFAULT NULL, settled_date DATETIME DEFAULT NULL, note VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO trn_expenses (id, account_id, user_id, reporting_date, price, qty, registrate_date, settled_date, note) SELECT id, account_id, user_id, reporting_date, price, qty, registrate_date, settled_date, note FROM __temp__trn_expenses');
        $this->addSql('DROP TABLE __temp__trn_expenses');
        $this->addSql('CREATE INDEX IDX_D9A601809B6B5FBA ON trn_expenses (account_id)');
        $this->addSql('CREATE INDEX IDX_D9A60180A76ED395 ON trn_expenses (user_id)');
    }
}
