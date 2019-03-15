<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190110093951 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE accessoire_console (accessoire_id INT NOT NULL, console_id INT NOT NULL, INDEX IDX_D83C297D23B67ED (accessoire_id), INDEX IDX_D83C29772F9DD9F (console_id), PRIMARY KEY(accessoire_id, console_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accessoire_console ADD CONSTRAINT FK_D83C297D23B67ED FOREIGN KEY (accessoire_id) REFERENCES accessoire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accessoire_console ADD CONSTRAINT FK_D83C29772F9DD9F FOREIGN KEY (console_id) REFERENCES console (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE accessoire_console');
    }
}
