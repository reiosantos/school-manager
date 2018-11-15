<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181118101700 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE student (student_no INT NOT NULL, class VARCHAR(45) NOT NULL, religion VARCHAR(45) DEFAULT NULL, parent_first_name VARCHAR(45) DEFAULT NULL, parent_last_name VARCHAR(45) DEFAULT NULL, parent_email VARCHAR(45) DEFAULT NULL, parent_contact VARCHAR(45) DEFAULT NULL, ID INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(45) DEFAULT NULL, last_name VARCHAR(45) DEFAULT NULL, address VARCHAR(45) DEFAULT NULL, nationality VARCHAR(45) DEFAULT NULL, join_date DATETIME DEFAULT NULL, image_name VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_B723AF3313070055 (student_no), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE auth_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', user_no INT NOT NULL, UNIQUE INDEX UNIQ_A3B536FD92FC23A8 (username_canonical), UNIQUE INDEX UNIQ_A3B536FDA0D96FBF (email_canonical), UNIQUE INDEX UNIQ_A3B536FDC05FB297 (confirmation_token), UNIQUE INDEX UNIQ_A3B536FD7FFD9CDA (user_no), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE staff (staff_no INT NOT NULL, email VARCHAR(45) DEFAULT NULL, contact VARCHAR(45) DEFAULT NULL, ID INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(45) DEFAULT NULL, last_name VARCHAR(45) DEFAULT NULL, address VARCHAR(45) DEFAULT NULL, nationality VARCHAR(45) DEFAULT NULL, join_date DATETIME DEFAULT NULL, image_name VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_426EF392D5DE1882 (staff_no), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE auth_user');
        $this->addSql('DROP TABLE staff');
    }
}
