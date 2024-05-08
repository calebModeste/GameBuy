<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240506160957 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866FE78CAF7C');
        $this->addSql('DROP INDEX IDX_AF86866FE78CAF7C ON offre');
        $this->addSql('ALTER TABLE offre CHANGE game_offre_id offre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866F4CC8505A FOREIGN KEY (offre_id) REFERENCES game (id)');
        $this->addSql('CREATE INDEX IDX_AF86866F4CC8505A ON offre (offre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866F4CC8505A');
        $this->addSql('DROP INDEX IDX_AF86866F4CC8505A ON offre');
        $this->addSql('ALTER TABLE offre CHANGE offre_id game_offre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866FE78CAF7C FOREIGN KEY (game_offre_id) REFERENCES game (id)');
        $this->addSql('CREATE INDEX IDX_AF86866FE78CAF7C ON offre (game_offre_id)');
    }
}
