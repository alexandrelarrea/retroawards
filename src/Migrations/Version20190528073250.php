<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190528073250 extends AbstractMigration {

  public function getDescription(): string {
    return '';
  }

  public function up(Schema $schema): void {
    // this up() migration is auto-generated, please modify it to your needs
    $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

    $this->addSql('
      ALTER TABLE achievement
        ADD badge VARCHAR(255) NOT NULL AFTER points,
        ADD total_awarded INT DEFAULT NULL AFTER badge,
        ADD author VARCHAR(255) DEFAULT NULL AFTER total_awarded,
        ADD title VARCHAR(255) NOT NULL AFTER retro_id,
        ADD description LONGTEXT NOT NULL AFTER title,
        DROP badge_earned,
        DROP badge_locked
    ');
  }

  public function down(Schema $schema): void {
    // this down() migration is auto-generated, please modify it to your needs
    $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

    $this->addSql('
      ALTER TABLE achievement
        ADD badge_earned VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci AFTER points,
        ADD badge_locked VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci AFTER badge_earned,
        DROP badge,
        DROP total_awarded,
        DROP author,
        DROP title,
        DROP description
    ');
  }
}
