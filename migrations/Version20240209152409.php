<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240209152409 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE direccion ADD calle VARCHAR(255) NOT NULL, ADD numero VARCHAR(255) NOT NULL, ADD piso VARCHAR(255) DEFAULT NULL, ADD codigo_postal VARCHAR(255) NOT NULL, ADD ciudad VARCHAR(255) NOT NULL, ADD provincia VARCHAR(255) NOT NULL, ADD pais VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE usuario ADD nombre VARCHAR(255) NOT NULL, ADD apellidos VARCHAR(255) NOT NULL, ADD id_direccion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE usuario ADD CONSTRAINT FK_2265B05D2ECB0EA5 FOREIGN KEY (id_direccion_id) REFERENCES direccion (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2265B05D2ECB0EA5 ON usuario (id_direccion_id)');
        $this->addSql('ALTER TABLE valoracion ADD puntos VARCHAR(255) NOT NULL, ADD descripcion VARCHAR(255) NOT NULL, ADD id_usuario_id INT DEFAULT NULL, ADD id_producto_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE valoracion ADD CONSTRAINT FK_6D3DE0F47EB2C349 FOREIGN KEY (id_usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE valoracion ADD CONSTRAINT FK_6D3DE0F46E57A479 FOREIGN KEY (id_producto_id) REFERENCES producto (id)');
        $this->addSql('CREATE INDEX IDX_6D3DE0F47EB2C349 ON valoracion (id_usuario_id)');
        $this->addSql('CREATE INDEX IDX_6D3DE0F46E57A479 ON valoracion (id_producto_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE direccion DROP calle, DROP numero, DROP piso, DROP codigo_postal, DROP ciudad, DROP provincia, DROP pais');
        $this->addSql('ALTER TABLE usuario DROP FOREIGN KEY FK_2265B05D2ECB0EA5');
        $this->addSql('DROP INDEX UNIQ_2265B05D2ECB0EA5 ON usuario');
        $this->addSql('ALTER TABLE usuario DROP nombre, DROP apellidos, DROP id_direccion_id');
        $this->addSql('ALTER TABLE valoracion DROP FOREIGN KEY FK_6D3DE0F47EB2C349');
        $this->addSql('ALTER TABLE valoracion DROP FOREIGN KEY FK_6D3DE0F46E57A479');
        $this->addSql('DROP INDEX IDX_6D3DE0F47EB2C349 ON valoracion');
        $this->addSql('DROP INDEX IDX_6D3DE0F46E57A479 ON valoracion');
        $this->addSql('ALTER TABLE valoracion DROP puntos, DROP descripcion, DROP id_usuario_id, DROP id_producto_id');
    }
}
