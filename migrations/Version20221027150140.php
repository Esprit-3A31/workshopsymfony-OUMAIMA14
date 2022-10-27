<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221027150140 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE class_room CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE name name VARCHAR(14) NOT NULL, CHANGE nbrstudent nbrstudent INT NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE student ADD moyenne DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF339162176F FOREIGN KEY (class_room_id) REFERENCES class_room (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE class_room MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON class_room');
        $this->addSql('ALTER TABLE class_room CHANGE id id INT DEFAULT 1 NOT NULL, CHANGE name name CHAR(14) DEFAULT \'A31\' NOT NULL, CHANGE nbrstudent nbrstudent INT DEFAULT 22 NOT NULL');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF339162176F');
        $this->addSql('ALTER TABLE student DROP moyenne');
    }
}
