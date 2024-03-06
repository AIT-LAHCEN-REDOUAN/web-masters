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
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("CREATE TABLE movie (
    id INT AUTO_INCREMENT NOT NULL , 
    Title VARCHAR(255) DEFAULT NULL , 
    releaseYear INT NOT NULL , 
    imagePath VARCHAR(255) NOT NULL , 
    PRIMARY KEY(id) 
)   ");
        
        $this->addSql("CREATE TABLE actor (
    id INT AUTO_INCREMENT NOT NULL  , 
    name VARCHAR(255) DEFAULT NULL , 
    PRIMARY KEY (id)
) 
   
");
        $this->addSql('CREATE TABLE movie_actor (
            movie_id INT NOT NULL,
            actor_id INT NOT NULL,
            INDEX IDX_F19D0EFB12469DE2 (movie_id),
            INDEX IDX_F19D0EFBBAE0B1D6 (actor_id),
            PRIMARY KEY(movie_id, actor_id)
        )');

        $this->addSql(
            "ALTER TABLE movie_actor ADD CONSTRAINT FK_F19D0EFB12469DE2
                 FOREIGN KEY (movie_id)
                 REFERENCES movie (id)
                 ON DELETE CASCADE "
        );
        $this->addSql("ALTER TABLE movie_actor
            ADD CONSTRAINT FK_F19D0EFBBAE0B1D6 
            FOREIGN KEY (actor_id) 
            REFERENCES actor (id) 
            ON DELETE CASCADE");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
