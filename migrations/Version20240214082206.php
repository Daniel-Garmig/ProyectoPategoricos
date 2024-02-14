<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240214082206 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE materia (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pategoria (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tema (id INT AUTO_INCREMENT NOT NULL, materia_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, INDEX IDX_61E3A538B54DBBCB (materia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tema_pategoria (tema_id INT NOT NULL, pategoria_id INT NOT NULL, json JSON NOT NULL COMMENT \'(DC2Type:json)\', INDEX IDX_6348AD38A64A8A17 (tema_id), INDEX IDX_6348AD3848114F76 (pategoria_id), PRIMARY KEY(tema_id, pategoria_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tema ADD CONSTRAINT FK_61E3A538B54DBBCB FOREIGN KEY (materia_id) REFERENCES materia (id)');
        $this->addSql('ALTER TABLE tema_pategoria ADD CONSTRAINT FK_6348AD38A64A8A17 FOREIGN KEY (tema_id) REFERENCES tema (id)');
        $this->addSql('ALTER TABLE tema_pategoria ADD CONSTRAINT FK_6348AD3848114F76 FOREIGN KEY (pategoria_id) REFERENCES pategoria (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tema DROP FOREIGN KEY FK_61E3A538B54DBBCB');
        $this->addSql('ALTER TABLE tema_pategoria DROP FOREIGN KEY FK_6348AD38A64A8A17');
        $this->addSql('ALTER TABLE tema_pategoria DROP FOREIGN KEY FK_6348AD3848114F76');
        $this->addSql('DROP TABLE materia');
        $this->addSql('DROP TABLE pategoria');
        $this->addSql('DROP TABLE tema');
        $this->addSql('DROP TABLE tema_pategoria');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
