<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240201215135 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE championnat (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE championnat_equipe (championnat_id INT NOT NULL, equipe_id INT NOT NULL, INDEX IDX_1ED7804627A0DA8 (championnat_id), INDEX IDX_1ED78046D861B89 (equipe_id), PRIMARY KEY(championnat_id, equipe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence (id INT AUTO_INCREMENT NOT NULL, carac VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, races_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_2449BA1567B3B43D (users_id), INDEX IDX_2449BA1599AE984C (races_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur (id INT AUTO_INCREMENT NOT NULL, races_id INT DEFAULT NULL, nb_max INT NOT NULL, poste VARCHAR(255) NOT NULL, cout INT NOT NULL, comp_mvmt INT NOT NULL, comp_force INT NOT NULL, comp_agilite VARCHAR(255) NOT NULL, comp_passe VARCHAR(255) NOT NULL, comp_armure VARCHAR(255) NOT NULL, principale VARCHAR(255) NOT NULL, secondaire VARCHAR(255) NOT NULL, comp LONGTEXT NOT NULL, INDEX IDX_FD71A9C599AE984C (races_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, relance INT NOT NULL, apothicaire VARCHAR(255) NOT NULL, tresorerie INT NOT NULL, cheerleader INT NOT NULL, assistant INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE championnat_equipe ADD CONSTRAINT FK_1ED7804627A0DA8 FOREIGN KEY (championnat_id) REFERENCES championnat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE championnat_equipe ADD CONSTRAINT FK_1ED78046D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA1567B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA1599AE984C FOREIGN KEY (races_id) REFERENCES race (id)');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C599AE984C FOREIGN KEY (races_id) REFERENCES race (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE championnat_equipe DROP FOREIGN KEY FK_1ED7804627A0DA8');
        $this->addSql('ALTER TABLE championnat_equipe DROP FOREIGN KEY FK_1ED78046D861B89');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA1567B3B43D');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA1599AE984C');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C599AE984C');
        $this->addSql('DROP TABLE championnat');
        $this->addSql('DROP TABLE championnat_equipe');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE joueur');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
