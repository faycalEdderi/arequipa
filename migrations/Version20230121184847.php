<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230121184847 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE exercice_done (id INT AUTO_INCREMENT NOT NULL, exercice_name_id INT NOT NULL, date DATE NOT NULL, repetition_nb INT NOT NULL, serie INT NOT NULL, INDEX IDX_2ED61ED78CACEA7B (exercice_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE exercice_done ADD CONSTRAINT FK_2ED61ED78CACEA7B FOREIGN KEY (exercice_name_id) REFERENCES exercice (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE exercice_done DROP FOREIGN KEY FK_2ED61ED78CACEA7B');
        $this->addSql('DROP TABLE exercice_done');
    }
}
