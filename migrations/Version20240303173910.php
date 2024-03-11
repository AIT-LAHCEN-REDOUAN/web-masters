<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240303173910 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create Movie and Actor Table';
    }

    public function up(Schema $schema): void
    {
        // Create actor table
        $this->addSql('CREATE TABLE actor (
            id INT AUTO_INCREMENT NOT NULL, 
            name VARCHAR(255) DEFAULT NULL, 
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        // Create movie table
        $this->addSql('CREATE TABLE movie (
            id INT AUTO_INCREMENT NOT NULL, 
            title VARCHAR(255) DEFAULT NULL, 
            release_year INT NOT NULL, 
            description VARCHAR(255) DEFAULT NULL, 
            image_path VARCHAR(255) NOT NULL, 
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        // Create movie_actor table for many-to-many relationship
        $this->addSql('CREATE TABLE movie_actor (
            movie_id INT NOT NULL, 
            actor_id INT NOT NULL, 
            INDEX IDX_F19D0EFB12469DE2 (movie_id), 
            INDEX IDX_F19D0EFBBAE0B1D6 (actor_id), 
            PRIMARY KEY(movie_id, actor_id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        // Add foreign key constraints
        $this->addSql('ALTER TABLE movie_actor 
            ADD CONSTRAINT FK_F19D0EFB12469DE2 
            FOREIGN KEY (movie_id) 
            REFERENCES movie(id) 
            ON DELETE CASCADE');

        $this->addSql('ALTER TABLE movie_actor 
            ADD CONSTRAINT FK_F19D0EFBBAE0B1D6 
            FOREIGN KEY (actor_id) 
            REFERENCES actor(id) 
            ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // Drop tables in reverse order
        $this->addSql('DROP TABLE movie_actor');
        $this->addSql('DROP TABLE actor');
        $this->addSql('DROP TABLE movie');
    }
}
