<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191104092430 extends AbstractMigration
{
	public function getDescription(): string
	{
		return '';
	}

	public function up(Schema $schema): void
	{
		// this up() migration is auto-generated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

		$this->addSql('CREATE TABLE settings_values (setting_id INT DEFAULT NULL, school_id INT DEFAULT NULL, value VARCHAR(255) DEFAULT NULL, ID INT AUTO_INCREMENT NOT NULL, INDEX IDX_351F6C94EE35BD72 (setting_id), INDEX IDX_351F6C94C32A47EE (school_id), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
		$this->addSql('ALTER TABLE settings_values ADD CONSTRAINT FK_351F6C94EE35BD72 FOREIGN KEY (setting_id) REFERENCES settings (id)');
		$this->addSql('ALTER TABLE settings_values ADD CONSTRAINT FK_351F6C94C32A47EE FOREIGN KEY (school_id) REFERENCES schools (id)');
		$this->addSql('ALTER TABLE Settings ADD description VARCHAR(255) DEFAULT NULL, DROP value, DROP school');
	}

	public function down(Schema $schema): void
	{
		// this down() migration is auto-generated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

		$this->addSql('DROP TABLE settings_values');
		$this->addSql('ALTER TABLE settings ADD school VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE description value VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`');
	}
}
