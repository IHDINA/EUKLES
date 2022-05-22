<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220522001621 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materiel DROP FOREIGN KEY FK_18D2B09182EA2E54');
        $this->addSql('CREATE TABLE lien (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, materiel_id INT NOT NULL, INDEX IDX_A532B4B519EB6921 (client_id), INDEX IDX_A532B4B516880AAF (materiel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lien ADD CONSTRAINT FK_A532B4B519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE lien ADD CONSTRAINT FK_A532B4B516880AAF FOREIGN KEY (materiel_id) REFERENCES materiel (id)');
        $this->addSql('DROP TABLE commande');
        $this->addSql('ALTER TABLE client CHANGE nom nom_client VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX IDX_18D2B09182EA2E54 ON materiel');
        $this->addSql('ALTER TABLE materiel DROP commande_id, CHANGE nom_materiel nom VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, INDEX IDX_6EEAA67D19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE lien');
        $this->addSql('ALTER TABLE client CHANGE nom_client nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE materiel ADD commande_id INT NOT NULL, CHANGE nom nom_materiel VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE materiel ADD CONSTRAINT FK_18D2B09182EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_18D2B09182EA2E54 ON materiel (commande_id)');
    }
}
