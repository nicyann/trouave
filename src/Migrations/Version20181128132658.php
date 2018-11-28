<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181128132658 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comment CHANGE user_id user_id BIGINT DEFAULT NULL, CHANGE traobject_id traobject_id BIGINT DEFAULT NULL');
        $this->addSql('ALTER TABLE message CHANGE user_form user_form BIGINT DEFAULT NULL, CHANGE user_to user_to BIGINT DEFAULT NULL');
        $this->addSql('ALTER TABLE traobject CHANGE category_id category_id BIGINT DEFAULT NULL, CHANGE state_id state_id BIGINT DEFAULT NULL, CHANGE user_id user_id BIGINT DEFAULT NULL, CHANGE county_id county_id BIGINT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD roles JSON NOT NULL, CHANGE email email VARCHAR(180) NOT NULL');
        $this->addSql('ALTER TABLE user RENAME INDEX email_unique TO UNIQ_8D93D649E7927C74');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comment CHANGE traobject_id traobject_id BIGINT NOT NULL, CHANGE user_id user_id BIGINT NOT NULL');
        $this->addSql('ALTER TABLE message CHANGE user_form user_form BIGINT NOT NULL, CHANGE user_to user_to BIGINT NOT NULL');
        $this->addSql('ALTER TABLE traobject CHANGE category_id category_id BIGINT NOT NULL, CHANGE county_id county_id BIGINT NOT NULL, CHANGE state_id state_id BIGINT NOT NULL, CHANGE user_id user_id BIGINT NOT NULL');
        $this->addSql('ALTER TABLE user DROP roles, CHANGE email email VARCHAR(255) NOT NULL COLLATE latin1_swedish_ci');
        $this->addSql('ALTER TABLE user RENAME INDEX uniq_8d93d649e7927c74 TO email_UNIQUE');
    }
}
