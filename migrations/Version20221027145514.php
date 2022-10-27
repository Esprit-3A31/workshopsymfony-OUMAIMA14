<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221027145514 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE class_room CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE name name VARCHAR(14) NOT NULL, CHANGE nbrstudent nbrstudent INT NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE student ADD moyenne DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF339162176F FOREIGN KEY (class_room_id) REFERENCES class_room (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE class_room MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON class_room');
        $this->addSql('ALTER TABLE class_room CHANGE id id INT DEFAULT 1 NOT NULL, CHANGE name name CHAR(14) DEFAULT \'A31\' NOT NULL, CHANGE nbrstudent nbrstudent INT DEFAULT 22 NOT NULL');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF339162176F');
        $this->addSql('ALTER TABLE student DROP moyenne');
    }
}
