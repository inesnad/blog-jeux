<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190109101158 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE jeu_console (jeu_id INT NOT NULL, console_id INT NOT NULL, INDEX IDX_736FC75C8C9E392E (jeu_id), INDEX IDX_736FC75C72F9DD9F (console_id), PRIMARY KEY(jeu_id, console_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jeu_console ADD CONSTRAINT FK_736FC75C8C9E392E FOREIGN KEY (jeu_id) REFERENCES jeu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jeu_console ADD CONSTRAINT FK_736FC75C72F9DD9F FOREIGN KEY (console_id) REFERENCES console (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE console_jeu');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE console_jeu (console_id INT NOT NULL, jeu_id INT NOT NULL, INDEX IDX_89F2922E72F9DD9F (console_id), INDEX IDX_89F2922E8C9E392E (jeu_id), PRIMARY KEY(console_id, jeu_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE console_jeu ADD CONSTRAINT FK_89F2922E72F9DD9F FOREIGN KEY (console_id) REFERENCES console (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE console_jeu ADD CONSTRAINT FK_89F2922E8C9E392E FOREIGN KEY (jeu_id) REFERENCES jeu (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE jeu_console');
    }
}
