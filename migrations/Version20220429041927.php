<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220429041927 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription_event ADD date_inc DATETIME NOT NULL');
        $this->addSql('ALTER TABLE news CHANGE date_news date_news VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE pinned DROP FOREIGN KEY fk_pub_pinned');
        $this->addSql('ALTER TABLE pinned CHANGE id_pub id_pub INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pinned ADD CONSTRAINT FK_E527E5E7C4E0D4DF FOREIGN KEY (id_pub) REFERENCES publication (id_pub)');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY fk_panier_produit');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY fk_panier_user');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY fk_panier_produit');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY fk_panier_user');
        $this->addSql('ALTER TABLE panier DROP quantite, CHANGE id_prod id_prod INT NOT NULL');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF23E940D95 FOREIGN KEY (id_prod) REFERENCES produit (id_prod)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF262D4C465 FOREIGN KEY (id_user1) REFERENCES user (id_user)');
        $this->addSql('DROP INDEX fk_panier_produit ON panier');
        $this->addSql('CREATE INDEX IDX_24CC0DF23E940D95 ON panier (id_prod)');
        $this->addSql('DROP INDEX fk_panier_user ON panier');
        $this->addSql('CREATE INDEX IDX_24CC0DF262D4C465 ON panier (id_user1)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT fk_panier_produit FOREIGN KEY (id_prod) REFERENCES produit (id_prod) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT fk_panier_user FOREIGN KEY (id_user1) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY fk_promotion_produit');
        $this->addSql('ALTER TABLE promotion CHANGE id_prod id_prod INT DEFAULT NULL');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD13E940D95 FOREIGN KEY (id_prod) REFERENCES produit (id_prod)');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY fk_publication_user');
        $this->addSql('ALTER TABLE publication CHANGE id_user id_user INT DEFAULT NULL, CHANGE like_nbr like_nbr INT NOT NULL');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C67796B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY fk_rec_user');
        $this->addSql('ALTER TABLE reclamation CHANGE id_user id_user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE6064046B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE stream DROP FOREIGN KEY fk_stream_user');
        $this->addSql('ALTER TABLE stream CHANGE id_user id_user INT DEFAULT NULL, CHANGE nbr_like nbr_like INT NOT NULL, CHANGE nbr_report nbr_report INT NOT NULL');
        $this->addSql('ALTER TABLE stream ADD CONSTRAINT FK_F0E9BE1C6B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE user CHANGE statut_user statut_user INT NOT NULL');
        $this->addSql('ALTER TABLE wishlist DROP FOREIGN KEY fk_list_produit');
        $this->addSql('ALTER TABLE wishlist DROP FOREIGN KEY fk_list_user');
        $this->addSql('ALTER TABLE wishlist DROP FOREIGN KEY fk_list_produit');
        $this->addSql('ALTER TABLE wishlist DROP FOREIGN KEY fk_list_user');
        $this->addSql('ALTER TABLE wishlist ADD CONSTRAINT FK_9CE12A31FBDD95DF FOREIGN KEY (id_user2) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE wishlist ADD CONSTRAINT FK_9CE12A31F7384557 FOREIGN KEY (id_produit) REFERENCES produit (id_prod)');
        $this->addSql('DROP INDEX fk_list_user ON wishlist');
        $this->addSql('CREATE INDEX IDX_9CE12A31FBDD95DF ON wishlist (id_user2)');
        $this->addSql('DROP INDEX fk_list_produit ON wishlist');
        $this->addSql('CREATE INDEX IDX_9CE12A31F7384557 ON wishlist (id_produit)');
        $this->addSql('ALTER TABLE wishlist ADD CONSTRAINT fk_list_produit FOREIGN KEY (id_produit) REFERENCES produit (id_prod) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wishlist ADD CONSTRAINT fk_list_user FOREIGN KEY (id_user2) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_stream_history DROP FOREIGN KEY fk_stream_stream_history');
        $this->addSql('ALTER TABLE user_stream_history DROP FOREIGN KEY fk_user_stream_history');
        $this->addSql('ALTER TABLE user_stream_history CHANGE id_user id_user INT DEFAULT NULL, CHANGE stream_id stream_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user_stream_history ADD CONSTRAINT FK_1A5644E1D0ED463E FOREIGN KEY (stream_id) REFERENCES stream (id_stream)');
        $this->addSql('ALTER TABLE user_stream_history ADD CONSTRAINT FK_1A5644E16B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE wallet DROP FOREIGN KEY fk_wallet_user');
        $this->addSql('ALTER TABLE wallet CHANGE id_user id_user INT DEFAULT NULL, CHANGE solde solde INT NOT NULL');
        $this->addSql('ALTER TABLE wallet ADD CONSTRAINT FK_7C68921F6B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription_event DROP date_inc');
        $this->addSql('ALTER TABLE news CHANGE date_news date_news VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF23E940D95');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF262D4C465');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF23E940D95');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF262D4C465');
        $this->addSql('ALTER TABLE panier ADD quantite INT NOT NULL, CHANGE id_prod id_prod INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT fk_panier_produit FOREIGN KEY (id_prod) REFERENCES produit (id_prod) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT fk_panier_user FOREIGN KEY (id_user1) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP INDEX idx_24cc0df23e940d95 ON panier');
        $this->addSql('CREATE INDEX fk_panier_produit ON panier (id_prod)');
        $this->addSql('DROP INDEX idx_24cc0df262d4c465 ON panier');
        $this->addSql('CREATE INDEX fk_panier_user ON panier (id_user1)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF23E940D95 FOREIGN KEY (id_prod) REFERENCES produit (id_prod)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF262D4C465 FOREIGN KEY (id_user1) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE pinned DROP FOREIGN KEY FK_E527E5E7C4E0D4DF');
        $this->addSql('ALTER TABLE pinned CHANGE id_pub id_pub INT NOT NULL');
        $this->addSql('ALTER TABLE pinned ADD CONSTRAINT fk_pub_pinned FOREIGN KEY (id_pub) REFERENCES publication (id_pub) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD13E940D95');
        $this->addSql('ALTER TABLE promotion CHANGE id_prod id_prod INT NOT NULL');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT fk_promotion_produit FOREIGN KEY (id_prod) REFERENCES produit (id_prod) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C67796B3CA4B');
        $this->addSql('ALTER TABLE publication CHANGE id_user id_user INT DEFAULT 1 NOT NULL, CHANGE like_nbr like_nbr INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT fk_publication_user FOREIGN KEY (id_user) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE6064046B3CA4B');
        $this->addSql('ALTER TABLE reclamation CHANGE id_user id_user INT NOT NULL');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT fk_rec_user FOREIGN KEY (id_user) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stream DROP FOREIGN KEY FK_F0E9BE1C6B3CA4B');
        $this->addSql('ALTER TABLE stream CHANGE id_user id_user INT NOT NULL, CHANGE nbr_like nbr_like INT DEFAULT 0 NOT NULL, CHANGE nbr_report nbr_report INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE stream ADD CONSTRAINT fk_stream_user FOREIGN KEY (id_user) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user CHANGE statut_user statut_user INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE user_stream_history DROP FOREIGN KEY FK_1A5644E1D0ED463E');
        $this->addSql('ALTER TABLE user_stream_history DROP FOREIGN KEY FK_1A5644E16B3CA4B');
        $this->addSql('ALTER TABLE user_stream_history CHANGE stream_id stream_id INT NOT NULL, CHANGE id_user id_user INT NOT NULL');
        $this->addSql('ALTER TABLE user_stream_history ADD CONSTRAINT fk_stream_stream_history FOREIGN KEY (stream_id) REFERENCES stream (id_stream) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_stream_history ADD CONSTRAINT fk_user_stream_history FOREIGN KEY (id_user) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wallet DROP FOREIGN KEY FK_7C68921F6B3CA4B');
        $this->addSql('ALTER TABLE wallet CHANGE id_user id_user INT NOT NULL, CHANGE solde solde INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE wallet ADD CONSTRAINT fk_wallet_user FOREIGN KEY (id_user) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wishlist DROP FOREIGN KEY FK_9CE12A31FBDD95DF');
        $this->addSql('ALTER TABLE wishlist DROP FOREIGN KEY FK_9CE12A31F7384557');
        $this->addSql('ALTER TABLE wishlist DROP FOREIGN KEY FK_9CE12A31FBDD95DF');
        $this->addSql('ALTER TABLE wishlist DROP FOREIGN KEY FK_9CE12A31F7384557');
        $this->addSql('ALTER TABLE wishlist ADD CONSTRAINT fk_list_produit FOREIGN KEY (id_produit) REFERENCES produit (id_prod) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wishlist ADD CONSTRAINT fk_list_user FOREIGN KEY (id_user2) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP INDEX idx_9ce12a31fbdd95df ON wishlist');
        $this->addSql('CREATE INDEX fk_list_user ON wishlist (id_user2)');
        $this->addSql('DROP INDEX idx_9ce12a31f7384557 ON wishlist');
        $this->addSql('CREATE INDEX fk_list_produit ON wishlist (id_produit)');
        $this->addSql('ALTER TABLE wishlist ADD CONSTRAINT FK_9CE12A31FBDD95DF FOREIGN KEY (id_user2) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE wishlist ADD CONSTRAINT FK_9CE12A31F7384557 FOREIGN KEY (id_produit) REFERENCES produit (id_prod)');
    }
}
