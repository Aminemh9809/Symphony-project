<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241202132257 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE auctions DROP FOREIGN KEY fk_auction_seller');
        $this->addSql('ALTER TABLE bids DROP FOREIGN KEY fk_bid_auction');
        $this->addSql('ALTER TABLE bids DROP FOREIGN KEY fk_bid_user');
        $this->addSql('ALTER TABLE blog_posts DROP FOREIGN KEY fk_blog_author');
        $this->addSql('ALTER TABLE favorites DROP FOREIGN KEY fk_favorite_user');
        $this->addSql('ALTER TABLE favorites DROP FOREIGN KEY fk_favorite_auction');
        $this->addSql('ALTER TABLE transactions DROP FOREIGN KEY fk_transaction_auction');
        $this->addSql('ALTER TABLE transactions DROP FOREIGN KEY fk_transaction_user');
        $this->addSql('ALTER TABLE winners DROP FOREIGN KEY fk_winner_auction');
        $this->addSql('ALTER TABLE winners DROP FOREIGN KEY fk_winner_user');
        $this->addSql('DROP TABLE auctions');
        $this->addSql('DROP TABLE bids');
        $this->addSql('DROP TABLE blog_posts');
        $this->addSql('DROP TABLE favorites');
        $this->addSql('DROP TABLE transactions');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE winners');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE auctions (id INT AUTO_INCREMENT NOT NULL, seller_id INT DEFAULT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, description TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, starting_price NUMERIC(10, 2) NOT NULL, current_price NUMERIC(10, 2) DEFAULT NULL, status INT DEFAULT NULL, INDEX fk_auction_seller (seller_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE bids (id INT AUTO_INCREMENT NOT NULL, auction_id INT NOT NULL, user_id INT NOT NULL, bid_amount NUMERIC(10, 2) NOT NULL, bid_time DATETIME DEFAULT NULL, INDEX fk_bid_auction (auction_id), INDEX fk_bid_user (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE blog_posts (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, content TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, publication_date DATETIME DEFAULT NULL, INDEX fk_blog_author (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE favorites (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, auction_id INT NOT NULL, added_date DATETIME DEFAULT NULL, INDEX fk_favorite_auction (auction_id), INDEX fk_favorite_user (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE transactions (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, auction_id INT NOT NULL, amount NUMERIC(10, 2) NOT NULL, transaction_type VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, transaction_date DATETIME DEFAULT NULL, INDEX fk_transaction_user (user_id), INDEX fk_transaction_auction (auction_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, email VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, first_name VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, last_name VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, country VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, preferred_currency VARCHAR(10) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, preferred_language VARCHAR(10) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, registration_date DATETIME DEFAULT NULL, last_login DATETIME DEFAULT NULL, is_active TINYINT(1) DEFAULT 1, UNIQUE INDEX username (username), UNIQUE INDEX email (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE winners (id INT AUTO_INCREMENT NOT NULL, auction_id INT NOT NULL, winner_id INT DEFAULT NULL, winning_bid_id INT DEFAULT NULL, winning_price NUMERIC(10, 2) DEFAULT NULL, winner_confirmed TINYINT(1) DEFAULT 0, payment_status VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, INDEX fk_winner_user (winner_id), UNIQUE INDEX auction_id (auction_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE auctions ADD CONSTRAINT fk_auction_seller FOREIGN KEY (seller_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE bids ADD CONSTRAINT fk_bid_auction FOREIGN KEY (auction_id) REFERENCES auctions (id)');
        $this->addSql('ALTER TABLE bids ADD CONSTRAINT fk_bid_user FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE blog_posts ADD CONSTRAINT fk_blog_author FOREIGN KEY (author_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE favorites ADD CONSTRAINT fk_favorite_user FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE favorites ADD CONSTRAINT fk_favorite_auction FOREIGN KEY (auction_id) REFERENCES auctions (id)');
        $this->addSql('ALTER TABLE transactions ADD CONSTRAINT fk_transaction_auction FOREIGN KEY (auction_id) REFERENCES auctions (id)');
        $this->addSql('ALTER TABLE transactions ADD CONSTRAINT fk_transaction_user FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE winners ADD CONSTRAINT fk_winner_auction FOREIGN KEY (auction_id) REFERENCES auctions (id)');
        $this->addSql('ALTER TABLE winners ADD CONSTRAINT fk_winner_user FOREIGN KEY (winner_id) REFERENCES users (id)');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
