<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190411125219 extends AbstractMigration {

  public function getDescription(): string {
    return '';
  }

  public function up(Schema $schema): void {
    // this up() migration is auto-generated, please modify it to your needs
    $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

    $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, console_id INT NOT NULL, retro_id INT DEFAULT NULL, forum_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, genre VARCHAR(255) DEFAULT NULL, publisher VARCHAR(255) DEFAULT NULL, developer VARCHAR(255) DEFAULT NULL, icon VARCHAR(255) NOT NULL, box_art VARCHAR(255) NOT NULL, title_screen VARCHAR(255) DEFAULT NULL, game_screen VARCHAR(255) DEFAULT NULL, total_achievements INT NOT NULL, total_players INT DEFAULT NULL, release_date DATE DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_232B318C72F9DD9F (console_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C72F9DD9F FOREIGN KEY (console_id) REFERENCES console (id)');
  }

  public function down(Schema $schema): void {
    // this down() migration is auto-generated, please modify it to your needs
    $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

    $this->addSql('DROP TABLE game');
  }
}
