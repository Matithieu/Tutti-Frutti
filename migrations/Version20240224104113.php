<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240224104113 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE discogs_master_discogs_artist (discogs_master_id INT NOT NULL, discogs_artist_id INT NOT NULL, PRIMARY KEY(discogs_master_id, discogs_artist_id))');
        $this->addSql('CREATE INDEX IDX_6A0FDC276589B466 ON discogs_master_discogs_artist (discogs_master_id)');
        $this->addSql('CREATE INDEX IDX_6A0FDC27C1AD638F ON discogs_master_discogs_artist (discogs_artist_id)');
        $this->addSql('CREATE TABLE discogs_master_discogs_track (discogs_master_id INT NOT NULL, discogs_track_id INT NOT NULL, PRIMARY KEY(discogs_master_id, discogs_track_id))');
        $this->addSql('CREATE INDEX IDX_EBF8ACF66589B466 ON discogs_master_discogs_track (discogs_master_id)');
        $this->addSql('CREATE INDEX IDX_EBF8ACF6B8FCDB03 ON discogs_master_discogs_track (discogs_track_id)');
        $this->addSql('CREATE TABLE discogs_master_discogs_video (discogs_master_id INT NOT NULL, discogs_video_id INT NOT NULL, PRIMARY KEY(discogs_master_id, discogs_video_id))');
        $this->addSql('CREATE INDEX IDX_41DC8E7C6589B466 ON discogs_master_discogs_video (discogs_master_id)');
        $this->addSql('CREATE INDEX IDX_41DC8E7CCFEFE70E ON discogs_master_discogs_video (discogs_video_id)');
        $this->addSql('ALTER TABLE discogs_master_discogs_artist ADD CONSTRAINT FK_6A0FDC276589B466 FOREIGN KEY (discogs_master_id) REFERENCES discogs_master (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE discogs_master_discogs_artist ADD CONSTRAINT FK_6A0FDC27C1AD638F FOREIGN KEY (discogs_artist_id) REFERENCES discogs_artist (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE discogs_master_discogs_track ADD CONSTRAINT FK_EBF8ACF66589B466 FOREIGN KEY (discogs_master_id) REFERENCES discogs_master (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE discogs_master_discogs_track ADD CONSTRAINT FK_EBF8ACF6B8FCDB03 FOREIGN KEY (discogs_track_id) REFERENCES discogs_track (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE discogs_master_discogs_video ADD CONSTRAINT FK_41DC8E7C6589B466 FOREIGN KEY (discogs_master_id) REFERENCES discogs_master (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE discogs_master_discogs_video ADD CONSTRAINT FK_41DC8E7CCFEFE70E FOREIGN KEY (discogs_video_id) REFERENCES discogs_video (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE discogs_master_discogs_artist DROP CONSTRAINT FK_6A0FDC276589B466');
        $this->addSql('ALTER TABLE discogs_master_discogs_artist DROP CONSTRAINT FK_6A0FDC27C1AD638F');
        $this->addSql('ALTER TABLE discogs_master_discogs_track DROP CONSTRAINT FK_EBF8ACF66589B466');
        $this->addSql('ALTER TABLE discogs_master_discogs_track DROP CONSTRAINT FK_EBF8ACF6B8FCDB03');
        $this->addSql('ALTER TABLE discogs_master_discogs_video DROP CONSTRAINT FK_41DC8E7C6589B466');
        $this->addSql('ALTER TABLE discogs_master_discogs_video DROP CONSTRAINT FK_41DC8E7CCFEFE70E');
        $this->addSql('DROP TABLE discogs_master_discogs_artist');
        $this->addSql('DROP TABLE discogs_master_discogs_track');
        $this->addSql('DROP TABLE discogs_master_discogs_video');
    }
}
