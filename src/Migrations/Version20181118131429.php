<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181118131429 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE student CHANGE student_no student_no VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE auth_user CHANGE user_no user_no VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE staff CHANGE staff_no staff_no VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE auth_user CHANGE user_no user_no INT NOT NULL');
        $this->addSql('ALTER TABLE staff CHANGE staff_no staff_no INT NOT NULL');
        $this->addSql('ALTER TABLE student CHANGE student_no student_no INT NOT NULL');
    }
}
