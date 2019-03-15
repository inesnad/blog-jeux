<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181227010650 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE accessoire (id INT AUTO_INCREMENT NOT NULL, type_accessoire_id INT NOT NULL, nom VARCHAR(255) NOT NULL, marque VARCHAR(255) NOT NULL, couleur VARCHAR(255) NOT NULL, etat VARCHAR(255) NOT NULL, INDEX IDX_8FD026AA2D6D0D8 (type_accessoire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avatar (id INT AUTO_INCREMENT NOT NULL, resultat_id INT NOT NULL, type_avatar VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1677722FD233E95C (resultat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_jeu (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE console (id INT AUTO_INCREMENT NOT NULL, nom_console VARCHAR(255) NOT NULL, marque VARCHAR(255) NOT NULL, couleur VARCHAR(255) NOT NULL, sortie_av VARCHAR(255) DEFAULT NULL, etat VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE console_jeu (console_id INT NOT NULL, jeu_id INT NOT NULL, INDEX IDX_89F2922E72F9DD9F (console_id), INDEX IDX_89F2922E8C9E392E (jeu_id), PRIMARY KEY(console_id, jeu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ecran (id INT AUTO_INCREMENT NOT NULL, marque VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, resolution VARCHAR(255) DEFAULT NULL, taille VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jeu (id INT AUTO_INCREMENT NOT NULL, categorie_jeu_id INT NOT NULL, nom VARCHAR(255) NOT NULL, developpeur VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, annee_parution INT NOT NULL, etat VARCHAR(255) NOT NULL, nb_joueur_max INT DEFAULT NULL, INDEX IDX_82E48DB5AB89317 (categorie_jeu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(255) NOT NULL, photo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resultat (id INT AUTO_INCREMENT NOT NULL, jeu_id INT NOT NULL, joueur_id INT NOT NULL, mode VARCHAR(255) NOT NULL, score VARCHAR(255) NOT NULL, INDEX IDX_E7DB5DE28C9E392E (jeu_id), INDEX IDX_E7DB5DE2A9E2D76C (joueur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_accessoire (id INT AUTO_INCREMENT NOT NULL, nom_accessoire VARCHAR(255) NOT NULL, capacite VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accessoire ADD CONSTRAINT FK_8FD026AA2D6D0D8 FOREIGN KEY (type_accessoire_id) REFERENCES type_accessoire (id)');
        $this->addSql('ALTER TABLE avatar ADD CONSTRAINT FK_1677722FD233E95C FOREIGN KEY (resultat_id) REFERENCES resultat (id)');
        $this->addSql('ALTER TABLE console_jeu ADD CONSTRAINT FK_89F2922E72F9DD9F FOREIGN KEY (console_id) REFERENCES console (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE console_jeu ADD CONSTRAINT FK_89F2922E8C9E392E FOREIGN KEY (jeu_id) REFERENCES jeu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeu ADD CONSTRAINT FK_82E48DB5AB89317 FOREIGN KEY (categorie_jeu_id) REFERENCES categorie_jeu (id)');
        $this->addSql('ALTER TABLE resultat ADD CONSTRAINT FK_E7DB5DE28C9E392E FOREIGN KEY (jeu_id) REFERENCES jeu (id)');
        $this->addSql('ALTER TABLE resultat ADD CONSTRAINT FK_E7DB5DE2A9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE jeu DROP FOREIGN KEY FK_82E48DB5AB89317');
        $this->addSql('ALTER TABLE console_jeu DROP FOREIGN KEY FK_89F2922E72F9DD9F');
        $this->addSql('ALTER TABLE console_jeu DROP FOREIGN KEY FK_89F2922E8C9E392E');
        $this->addSql('ALTER TABLE resultat DROP FOREIGN KEY FK_E7DB5DE28C9E392E');
        $this->addSql('ALTER TABLE resultat DROP FOREIGN KEY FK_E7DB5DE2A9E2D76C');
        $this->addSql('ALTER TABLE avatar DROP FOREIGN KEY FK_1677722FD233E95C');
        $this->addSql('ALTER TABLE accessoire DROP FOREIGN KEY FK_8FD026AA2D6D0D8');
        $this->addSql('DROP TABLE accessoire');
        $this->addSql('DROP TABLE avatar');
        $this->addSql('DROP TABLE categorie_jeu');
        $this->addSql('DROP TABLE console');
        $this->addSql('DROP TABLE console_jeu');
        $this->addSql('DROP TABLE ecran');
        $this->addSql('DROP TABLE jeu');
        $this->addSql('DROP TABLE joueur');
        $this->addSql('DROP TABLE resultat');
        $this->addSql('DROP TABLE type_accessoire');
    }
}
