<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190521102804 extends AbstractMigration {

  public function getDescription(): string {
    return '';
  }

  public function up(Schema $schema): void {
    // this up() migration is auto-generated, please modify it to your needs
    $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10148, "Army Men: Sarges Heroes", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10210, "Banjo-Kazooie", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10211, "Banjo-Tooie", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10162, "Blast Corps", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10265, "Body Harvest", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10330, "Bomberman 64: The Second Attack", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10285, "Bomberman Hero", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (12815, "California Speed", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10667, "Castlevania 64", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10607, "Chameleon Twist", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10283, "Chameleon Twist 2", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10164, "Conkers Bad Fur Day (E)", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10158, "Destruction Derby 64", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10202, "Diddy Kong Racing", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10075, "Donkey Kong 64", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10080, "Doom 64", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (11200, "Dr. Mario 64", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10462, "F-1 World Grand Prix", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10133, "F-Zero X", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10200, "FIFA - Road to World Cup 98", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10129, "Fighting Force 64", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10223, "Gex 3 - Deep Cover Gecko", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10198, "Goemon\'s Great Adventure", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10073, "GoldenEye 007", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10093, "Hexen", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (30, "Jet Force Gemini", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10246, "Kirby 64 - The Crystal Shards", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10679, "Legend of Zelda, The - Majoras Mask", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10113, "Legend of Zelda, The - Ocarina of Time", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10078, "Mario Kart 64", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10263, "Mario Party", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10264, "Mario Party 2", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10108, "Mario Party 3", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10024, "Mario Tennis", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10115, "Mega Man 64", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10083, "Mischief Makers", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10114, "Mortal Kombat Trilogy", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10394, "Ms. Pac-Man - Maze Madness", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10154, "Paper Mario", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10110, "Perfect Dark", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10277, "Pilotwings 64", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10270, "Pokemon Puzzle League", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10155, "Pokemon Snap", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10258, "Pokemon Stadium 2", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10216, "Quest 64", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10329, "Rampage 2: Universal Tour", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10269, "Rayman 2: The Great Escape (E)", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10077, "Resident Evil 2", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10186, "Ridge Racer 64", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10255, "Shadow Man", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10199, "Snowboard Kids", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10247, "Snowboard Kids 2", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10392, "South Park Rally", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10307, "Space Station Silicon Valley", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10248, "Star Fox 64 v1.0", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10153, "Star Wars - Shadows of the Empire", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10272, "StarCraft 64", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (14337, "Starshot - Space Circus Fever", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10003, "Super Mario 64", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10082, "Super Smash Bros.", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10310, "Superman: New Superman Aventures, The", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10298, "Tarzan", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10182, "Turok - Dinosaur Hunter", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10520, "Turok 2 - Seeds of Evil", NOW(), NOW())');
    $this->addSql('INSERT INTO retro_game (retro_id, name, created_at, updated_at) VALUES (10173, "Yoshis Story", NOW(), NOW())');
  }

  public function down(Schema $schema): void {
    // this down() migration is auto-generated, please modify it to your needs
    $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

    $this->addSql('TRUNCATE TABLE retro_game');
  }
}
