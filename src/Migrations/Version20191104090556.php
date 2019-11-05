<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191104090556 extends AbstractMigration
{
	public function getDescription(): string
	{
		return '';
	}

	public function up(Schema $schema): void
	{
		// this up() migration is auto-generated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

		$this->addSql('CREATE TABLE schools (name VARCHAR(255) NOT NULL, moto VARCHAR(255) DEFAULT NULL, mission VARCHAR(255) DEFAULT NULL, vission VARCHAR(255) DEFAULT NULL, urlcomponent VARCHAR(45) NOT NULL, ID INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
		$this->addSql('CREATE TABLE subjects (subject_no VARCHAR(255) NOT NULL, subject_name VARCHAR(255) DEFAULT NULL, ID INT AUTO_INCREMENT NOT NULL, subject_category VARCHAR(255) DEFAULT NULL, UNIQUE INDEX subject_no_UNIQUE (subject_no), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
		$this->addSql('DROP TABLE School');
		$this->addSql('DROP TABLE Subject');
	}

	public function down(Schema $schema): void
	{
		// this down() migration is auto-generated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

		$this->addSql('CREATE TABLE School (name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, moto VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, mission VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, vission VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, urlcomponent VARCHAR(45) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, ID INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
		$this->addSql('CREATE TABLE Subject (subject_no VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, subject_name VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, ID INT AUTO_INCREMENT NOT NULL, subject_category VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, UNIQUE INDEX subject_no_UNIQUE (subject_no), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
		$this->addSql('DROP TABLE schools');
		$this->addSql('DROP TABLE subjects');
	}
}
