<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240506042111 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866FE48FD905');
        $this->addSql('DROP INDEX IDX_AF86866FE48FD905 ON offre');
        $this->addSql('ALTER TABLE offre CHANGE game_id game_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866F4D77E7D8 FOREIGN KEY (game_id_id) REFERENCES game (id)');
        $this->addSql('CREATE INDEX IDX_AF86866F4D77E7D8 ON offre (game_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866F4D77E7D8');
        $this->addSql('DROP INDEX IDX_AF86866F4D77E7D8 ON offre');
        $this->addSql('ALTER TABLE offre CHANGE game_id_id game_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866FE48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('CREATE INDEX IDX_AF86866FE48FD905 ON offre (game_id)');
    }
}
