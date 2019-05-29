<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190529135704 extends AbstractMigration {

  public function getDescription(): string {
    return 'Delete retrogame mapping for "Superman: New Superman Aventures, The" game (broken achievements got removed)';
  }

  public function up(Schema $schema): void {
    $this->addSql('DELETE FROM retro_game WHERE retro_id = 10310');
  }

  public function down(Schema $schema): void {
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10310, "Superman: New Superman Aventures, The", NOW(), NOW())');
  }
}
