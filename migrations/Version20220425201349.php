<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220425201349 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C67796B3CA4B');
        $this->addSql('DROP INDEX IDX_AF3C67796B3CA4B ON publication');
        $this->addSql('ALTER TABLE publication DROP id_user');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE publication ADD id_user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C67796B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('CREATE INDEX IDX_AF3C67796B3CA4B ON publication (id_user)');
    }
}
