<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250614083855 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add unique key to slug columns and remove nullable';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE category ALTER slug SET NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_64C19C1989D9B62 ON category (slug)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE note ALTER slug SET NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_CFBDFA14989D9B62 ON note (slug)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE tag ALTER slug SET NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_389B783989D9B62 ON tag (slug)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_389B783989D9B62
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE tag ALTER slug DROP NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_64C19C1989D9B62
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE category ALTER slug DROP NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_CFBDFA14989D9B62
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE note ALTER slug DROP NOT NULL
        SQL);
    }
}
