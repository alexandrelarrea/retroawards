<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190527094242 extends AbstractMigration {

  public function getDescription(): string {
    return '';
  }

  public function up(Schema $schema): void {
    $this->addSql('INSERT INTO console
      (
        retro_id,
        title,
        description,
        icon,
        logo,
        image,
        slug,
        created_at,
        updated_at
      ) VALUES (
        2,
        "Nintendo 64",
        "La Nintendo 64, également connue sous les noms de code Project Reality et Ultra 64 lors de sa phase de développement, est une console de jeux vidéo de salon, sortie en 1996 (1997 en Europe), du constructeur japonais Nintendo en collaboration avec Silicon Graphics. Elle fut la dernière des consoles de cinquième génération à être sortie.\nLa Nintendo 64 a plusieurs particularités : c\'est une console « 64-bits » contrairement à ses principales concurrentes dites « 32-bits » ; l\'entreprise a préféré le support cartouche, plus rentable pour Nintendo mais plus contraignant pour le développement et plus cher que le support CD proposé par ses concurrents ; elle innove en instaurant un stick analogique sur sa manette qui se révélera indispensable pour les jeux en 3D temps réel ; elle est aussi la première console à disposer de quatre ports manettes pour les jeux multijoueurs (ne nécessitant pas d\'adaptateur).",
        "icon.png",
        "logo.png",
        "n64_control_set.png",
        "nintendo_64",
        NOW(),
        NOW()
      )'
    );
  }

  public function down(Schema $schema): void {
    $this->addSql('DELETE FROM console WHERE retro_id = 2');
  }
}
