<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201108093409 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE clothe (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, name VARCHAR(255) NOT NULL, bought_at DATETIME DEFAULT NULL, color VARCHAR(255) DEFAULT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_C32115BA7E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clothe_recommendation (clothe_id INT NOT NULL, recommendation_id INT NOT NULL, INDEX IDX_D1A79FB0D554487F (clothe_id), INDEX IDX_D1A79FB0D173940B (recommendation_id), PRIMARY KEY(clothe_id, recommendation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `group` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE group_clothe (group_id INT NOT NULL, clothe_id INT NOT NULL, INDEX IDX_10A7CD6AFE54D947 (group_id), INDEX IDX_10A7CD6AD554487F (clothe_id), PRIMARY KEY(group_id, clothe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE group_user (group_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_A4C98D39FE54D947 (group_id), INDEX IDX_A4C98D39A76ED395 (user_id), PRIMARY KEY(group_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, clothe_id INT NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_16DB4F89D554487F (clothe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recommendation (id INT AUTO_INCREMENT NOT NULL, icon VARCHAR(40) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE clothe ADD CONSTRAINT FK_C32115BA7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE clothe_recommendation ADD CONSTRAINT FK_D1A79FB0D554487F FOREIGN KEY (clothe_id) REFERENCES clothe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE clothe_recommendation ADD CONSTRAINT FK_D1A79FB0D173940B FOREIGN KEY (recommendation_id) REFERENCES recommendation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE group_clothe ADD CONSTRAINT FK_10A7CD6AFE54D947 FOREIGN KEY (group_id) REFERENCES `group` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE group_clothe ADD CONSTRAINT FK_10A7CD6AD554487F FOREIGN KEY (clothe_id) REFERENCES clothe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE group_user ADD CONSTRAINT FK_A4C98D39FE54D947 FOREIGN KEY (group_id) REFERENCES `group` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE group_user ADD CONSTRAINT FK_A4C98D39A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F89D554487F FOREIGN KEY (clothe_id) REFERENCES clothe (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clothe_recommendation DROP FOREIGN KEY FK_D1A79FB0D554487F');
        $this->addSql('ALTER TABLE group_clothe DROP FOREIGN KEY FK_10A7CD6AD554487F');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F89D554487F');
        $this->addSql('ALTER TABLE group_clothe DROP FOREIGN KEY FK_10A7CD6AFE54D947');
        $this->addSql('ALTER TABLE group_user DROP FOREIGN KEY FK_A4C98D39FE54D947');
        $this->addSql('ALTER TABLE clothe_recommendation DROP FOREIGN KEY FK_D1A79FB0D173940B');
        $this->addSql('ALTER TABLE clothe DROP FOREIGN KEY FK_C32115BA7E3C61F9');
        $this->addSql('ALTER TABLE group_user DROP FOREIGN KEY FK_A4C98D39A76ED395');
        $this->addSql('DROP TABLE clothe');
        $this->addSql('DROP TABLE clothe_recommendation');
        $this->addSql('DROP TABLE `group`');
        $this->addSql('DROP TABLE group_clothe');
        $this->addSql('DROP TABLE group_user');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE recommendation');
        $this->addSql('DROP TABLE user');
    }
}
