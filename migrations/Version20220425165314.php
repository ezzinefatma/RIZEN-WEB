<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220425165314 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCAF3C6779 FOREIGN KEY (publication) REFERENCES publication (id_pub)');
        $this->addSql('CREATE INDEX IDX_67F068BCAF3C6779 ON commentaire (publication)');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C67796B3CA4B');
        $this->addSql('DROP INDEX fk_publication_user ON publication');
        $this->addSql('CREATE INDEX IDX_AF3C67796B3CA4B ON publication (id_user)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C67796B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCAF3C6779');
        $this->addSql('DROP INDEX IDX_67F068BCAF3C6779 ON commentaire');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C67796B3CA4B');
        $this->addSql('DROP INDEX idx_af3c67796b3ca4b ON publication');
        $this->addSql('CREATE INDEX fk_publication_user ON publication (id_user)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C67796B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
    }
}
