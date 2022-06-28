<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220628083858 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_8D93D6496F7F214C');
        $this->addSql('DROP INDEX UNIQ_8D93D649D62FDF4C');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, email, roles, password, name, photo, about, phone, phone_hidden, username, is_admin, blocked, closed, created_at, updated_at, deleted_at FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_type_id INTEGER DEFAULT NULL, gender_id INTEGER DEFAULT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, name VARCHAR(100) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, about VARCHAR(255) DEFAULT NULL, phone VARCHAR(60) DEFAULT NULL, phone_hidden INTEGER DEFAULT NULL, username VARCHAR(100) DEFAULT NULL, is_admin INTEGER DEFAULT NULL, blocked INTEGER DEFAULT NULL, closed INTEGER DEFAULT NULL, created_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , deleted_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , CONSTRAINT FK_8D93D6499D419299 FOREIGN KEY (user_type_id) REFERENCES user_types (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_8D93D649708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO user (id, email, roles, password, name, photo, about, phone, phone_hidden, username, is_admin, blocked, closed, created_at, updated_at, deleted_at) SELECT id, email, roles, password, name, photo, about, phone, phone_hidden, username, is_admin, blocked, closed, created_at, updated_at, deleted_at FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6499D419299 ON user (user_type_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649708A0E0 ON user (gender_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74');
        $this->addSql('DROP INDEX UNIQ_8D93D6499D419299');
        $this->addSql('DROP INDEX UNIQ_8D93D649708A0E0');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, email, roles, password, name, photo, about, phone, phone_hidden, username, is_admin, blocked, closed, created_at, updated_at, deleted_at FROM "user"');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('CREATE TABLE "user" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, name VARCHAR(100) DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, about VARCHAR(255) DEFAULT NULL, phone VARCHAR(60) DEFAULT NULL, phone_hidden INTEGER DEFAULT NULL, username VARCHAR(100) DEFAULT NULL, is_admin INTEGER DEFAULT NULL, blocked INTEGER DEFAULT NULL, closed INTEGER DEFAULT NULL, created_at DATETIME DEFAULT \'NULL --(DC2Type:datetime_immutable)\' --(DC2Type:datetime_immutable)
        , updated_at DATETIME DEFAULT \'NULL --(DC2Type:datetime_immutable)\' --(DC2Type:datetime_immutable)
        , deleted_at DATETIME DEFAULT \'NULL --(DC2Type:datetime_immutable)\' --(DC2Type:datetime_immutable)
        , user_type_id_id INTEGER DEFAULT NULL, gender_id_id INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO "user" (id, email, roles, password, name, photo, about, phone, phone_hidden, username, is_admin, blocked, closed, created_at, updated_at, deleted_at) SELECT id, email, roles, password, name, photo, about, phone, phone_hidden, username, is_admin, blocked, closed, created_at, updated_at, deleted_at FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6496F7F214C ON "user" (gender_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649D62FDF4C ON "user" (user_type_id_id)');
    }
}
