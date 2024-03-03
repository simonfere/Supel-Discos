<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240303231845 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE producto ADD nombre VARCHAR(255) NOT NULL, ADD ano_salida VARCHAR(255) NOT NULL, ADD precio NUMERIC(5, 2) NOT NULL, ADD pais VARCHAR(255) DEFAULT NULL, ADD artista_id INT NOT NULL');
        $this->addSql('ALTER TABLE producto ADD CONSTRAINT FK_A7BB0615AEB0CF13 FOREIGN KEY (artista_id) REFERENCES artista (id)');
        $this->addSql('CREATE INDEX IDX_A7BB0615AEB0CF13 ON producto (artista_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE producto DROP FOREIGN KEY FK_A7BB0615AEB0CF13');
        $this->addSql('DROP INDEX IDX_A7BB0615AEB0CF13 ON producto');
        $this->addSql('ALTER TABLE producto DROP nombre, DROP ano_salida, DROP precio, DROP pais, DROP artista_id');
    }
}
