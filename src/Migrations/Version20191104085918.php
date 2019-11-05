<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191104085918 extends AbstractMigration
{
	public function getDescription(): string
	{
		return '';
	}

	public function up(Schema $schema): void
	{
		// this up() migration is auto-generated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

		$this->addSql('CREATE TABLE Settings (name VARCHAR(255) DEFAULT NULL, value VARCHAR(255) DEFAULT NULL, school VARCHAR(255) DEFAULT NULL, ID INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
		$this->addSql('CREATE TABLE School (name VARCHAR(255) NOT NULL, moto VARCHAR(255) DEFAULT NULL, mission VARCHAR(255) DEFAULT NULL, vission VARCHAR(255) DEFAULT NULL, urlcomponent VARCHAR(45) NOT NULL, ID INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
	}

	public function down(Schema $schema): void
	{
		// this down() migration is auto-generated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

		$this->addSql('DROP TABLE Settings');
		$this->addSql('DROP TABLE School');
	}
}
