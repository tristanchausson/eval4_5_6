<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181007164715 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Mouvements CHANGE article_id article_id INT DEFAULT NULL, CHANGE type_mouvement_id type_mouvement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Sens CHANGE sens sens VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE Type_mouvement CHANGE sens_id sens_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Achats CHANGE fournisseur_id fournisseur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Articles CHANGE categorie_id categorie_id INT DEFAULT NULL, CHANGE unite_id unite_id INT DEFAULT NULL, CHANGE prix_vente prix_vente NUMERIC(10, 0) NOT NULL');
        $this->addSql('ALTER TABLE Articles_fournisseurs DROP prix_achat');
        $this->addSql('ALTER TABLE Articles_fournisseurs RENAME INDEX fk_fournisseur_id_idx TO IDX_7E364160670C757F');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Achats CHANGE fournisseur_id fournisseur_id INT NOT NULL');
        $this->addSql('ALTER TABLE Articles CHANGE categorie_id categorie_id INT NOT NULL, CHANGE unite_id unite_id INT NOT NULL, CHANGE prix_vente prix_vente NUMERIC(5, 2) NOT NULL');
        $this->addSql('ALTER TABLE Articles_fournisseurs ADD prix_achat NUMERIC(5, 2) NOT NULL');
        $this->addSql('ALTER TABLE Articles_fournisseurs RENAME INDEX idx_7e364160670c757f TO fk_fournisseur_id_idx');
        $this->addSql('ALTER TABLE Mouvements CHANGE article_id article_id INT NOT NULL, CHANGE type_mouvement_id type_mouvement_id INT NOT NULL');
        $this->addSql('ALTER TABLE Sens CHANGE sens sens VARCHAR(45) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE Type_mouvement CHANGE sens_id sens_id INT NOT NULL');
    }
}
