<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200511225128 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lessons (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', course_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', created_at DATETIME NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(1000) NOT NULL, INDEX IDX_3F4218D9591CC992 (course_id), INDEX IDX_3F4218D98B8E8428 (created_at), INDEX IDX_3F4218D95E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mentors (login VARCHAR(100) NOT NULL, created_at DATETIME NOT NULL, email VARCHAR(100) NOT NULL, name VARCHAR(255) NOT NULL, gender VARCHAR(1) DEFAULT NULL, INDEX IDX_7AE525BA8B8E8428 (created_at), INDEX IDX_7AE525BAE7927C74 (email), INDEX IDX_7AE525BA5E237E06 (name), INDEX IDX_7AE525BAC7470A42 (gender), PRIMARY KEY(login)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lessons ADD CONSTRAINT FK_3F4218D9591CC992 FOREIGN KEY (course_id) REFERENCES courses (id)');
        $this->addSql('ALTER TABLE courses ADD author_login VARCHAR(100) NOT NULL, ADD created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE courses ADD CONSTRAINT FK_A9A55A4CBC80EBDD FOREIGN KEY (author_login) REFERENCES mentors (login)');
        $this->addSql('CREATE INDEX IDX_A9A55A4CBC80EBDD ON courses (author_login)');
        $this->addSql('CREATE INDEX IDX_A9A55A4C8B8E8428 ON courses (created_at)');
        $this->addSql('CREATE INDEX IDX_A9A55A4C8CDE5729 ON courses (type)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE courses DROP FOREIGN KEY FK_A9A55A4CBC80EBDD');
        $this->addSql('DROP TABLE lessons');
        $this->addSql('DROP TABLE mentors');
        $this->addSql('DROP INDEX IDX_A9A55A4CBC80EBDD ON courses');
        $this->addSql('DROP INDEX IDX_A9A55A4C8B8E8428 ON courses');
        $this->addSql('DROP INDEX IDX_A9A55A4C8CDE5729 ON courses');
        $this->addSql('ALTER TABLE courses DROP author_login, DROP created_at');
    }
}
