<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221020131732 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(14) NOT NULL, description VARCHAR(14) NOT NULL, adresse VARCHAR(25) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, classroom_id INT NOT NULL, classroometranger_id INT NOT NULL, nce VARCHAR(40) NOT NULL, username VARCHAR(10) NOT NULL, INDEX IDX_B723AF336278D5A8 (classroom_id), INDEX IDX_B723AF33FD60A27F (classroometranger_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF336278D5A8 FOREIGN KEY (classroom_id) REFERENCES classroom (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33FD60A27F FOREIGN KEY (classroometranger_id) REFERENCES classroom (id)');
        $this->addSql('ALTER TABLE classroom DROP nbr_student, CHANGE name name VARCHAR(14) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF336278D5A8');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF33FD60A27F');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE student');
        $this->addSql('ALTER TABLE classroom ADD nbr_student INT NOT NULL, CHANGE name name VARCHAR(100) NOT NULL');
    }
}
