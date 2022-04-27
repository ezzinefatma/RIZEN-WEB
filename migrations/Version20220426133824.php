<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220426133824 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCAF3C6779');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCAF3C6779 FOREIGN KEY (publication) REFERENCES publication (id_pub) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCAF3C6779');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCAF3C6779 FOREIGN KEY (publication) REFERENCES publication (id_pub)');
    }
}
