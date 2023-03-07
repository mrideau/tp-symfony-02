<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230307133202 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE licensee DROP INDEX UNIQ_8BE6BA6EA76ED395, ADD INDEX IDX_8BE6BA6EA76ED395 (user_id)');
        $this->addSql('ALTER TABLE licensee CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE section CHANGE description description LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE licensee DROP INDEX IDX_8BE6BA6EA76ED395, ADD UNIQUE INDEX UNIQ_8BE6BA6EA76ED395 (user_id)');
        $this->addSql('ALTER TABLE licensee CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE section CHANGE description description VARCHAR(255) NOT NULL');
    }
}
