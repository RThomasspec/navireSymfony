<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220210123557 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(60) NOT NULL, indicatif VARCHAR(3) NOT NULL, UNIQUE INDEX indicatif_unique (indicatif), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE port (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(60) NOT NULL, indicatif VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE aisshiptype CHANGE ais_ship_type aisshiptype INT NOT NULL');
        $this->addSql('ALTER TABLE navire DROP ais_shipe_type_id, CHANGE imo imo VARCHAR(7) NOT NULL, CHANGE indicatif_appel indicatifappel VARCHAR(10) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EED1038B519409E ON navire (imo)');
        $this->addSql('CREATE UNIQUE INDEX mmsi_unique ON navire (mmsi)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE port');
        $this->addSql('ALTER TABLE aisshiptype CHANGE libelle libelle VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE aisshiptype ais_ship_type INT NOT NULL');
        $this->addSql('ALTER TABLE message CHANGE nom nom VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mail mail VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE message message LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX UNIQ_EED1038B519409E ON navire');
        $this->addSql('DROP INDEX mmsi_unique ON navire');
        $this->addSql('ALTER TABLE navire ADD ais_shipe_type_id INT NOT NULL, ADD indicatif_appel VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP indicatifappel, CHANGE imo imo VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mmsi mmsi VARCHAR(9) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
