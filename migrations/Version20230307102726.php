<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230307102726 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE licensee ADD club_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE licensee ADD CONSTRAINT FK_8BE6BA6E61190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
        $this->addSql('CREATE INDEX IDX_8BE6BA6E61190A32 ON licensee (club_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE licensee DROP FOREIGN KEY FK_8BE6BA6E61190A32');
        $this->addSql('DROP INDEX IDX_8BE6BA6E61190A32 ON licensee');
        $this->addSql('ALTER TABLE licensee DROP club_id');
    }
}
