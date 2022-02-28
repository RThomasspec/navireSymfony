<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220228141504 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE escale DROP FOREIGN KEY FK_C39FEDD3158E975');
        $this->addSql('ALTER TABLE escale DROP FOREIGN KEY FK_C39FEDD359265CEB');
        $this->addSql('DROP INDEX IDX_C39FEDD359265CEB ON escale');
        $this->addSql('DROP INDEX IDX_C39FEDD3158E975 ON escale');
        $this->addSql('ALTER TABLE escale ADD idnavire INT NOT NULL, ADD idPort INT NOT NULL, DROP le_navire_id, DROP le_port_id');
        $this->addSql('ALTER TABLE escale ADD CONSTRAINT FK_C39FEDD36A50BD94 FOREIGN KEY (idnavire) REFERENCES navire (id)');
        $this->addSql('ALTER TABLE escale ADD CONSTRAINT FK_C39FEDD3306C0352 FOREIGN KEY (idPort) REFERENCES port (id)');
        $this->addSql('CREATE INDEX IDX_C39FEDD36A50BD94 ON escale (idnavire)');
        $this->addSql('CREATE INDEX IDX_C39FEDD3306C0352 ON escale (idPort)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aisshiptype CHANGE libelle libelle VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE escale DROP FOREIGN KEY FK_C39FEDD36A50BD94');
        $this->addSql('ALTER TABLE escale DROP FOREIGN KEY FK_C39FEDD3306C0352');
        $this->addSql('DROP INDEX IDX_C39FEDD36A50BD94 ON escale');
        $this->addSql('DROP INDEX IDX_C39FEDD3306C0352 ON escale');
        $this->addSql('ALTER TABLE escale ADD le_navire_id INT NOT NULL, ADD le_port_id INT NOT NULL, DROP idnavire, DROP idPort');
        $this->addSql('ALTER TABLE escale ADD CONSTRAINT FK_C39FEDD3158E975 FOREIGN KEY (le_navire_id) REFERENCES navire (id)');
        $this->addSql('ALTER TABLE escale ADD CONSTRAINT FK_C39FEDD359265CEB FOREIGN KEY (le_port_id) REFERENCES port (id)');
        $this->addSql('CREATE INDEX IDX_C39FEDD359265CEB ON escale (le_port_id)');
        $this->addSql('CREATE INDEX IDX_C39FEDD3158E975 ON escale (le_navire_id)');
        $this->addSql('ALTER TABLE message CHANGE nom nom VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mail mail VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE message message LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE navire CHANGE imo imo VARCHAR(7) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mmsi mmsi VARCHAR(9) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE indicatifappel indicatifappel VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE pays CHANGE nom nom VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE indicatif indicatif VARCHAR(3) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE port CHANGE nom nom VARCHAR(60) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE indicatif indicatif VARCHAR(5) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
