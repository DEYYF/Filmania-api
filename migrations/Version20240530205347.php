<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240530205347 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Detalle_Pelicula DROP FOREIGN KEY detalle_pelicula_ibfk_1');
        $this->addSql('ALTER TABLE Detalle_Pelicula ADD CONSTRAINT FK_45B09C8A23679C00 FOREIGN KEY (id_pelicula) REFERENCES Media (id)');
        $this->addSql('ALTER TABLE Detalle_Serie DROP FOREIGN KEY detalle_serie_ibfk_1');
        $this->addSql('ALTER TABLE Detalle_Serie ADD CONSTRAINT FK_6F3BD9144BFD204 FOREIGN KEY (id_serie) REFERENCES Media (id)');
        $this->addSql('ALTER TABLE Genero_Media DROP FOREIGN KEY genero_media_ibfk_1');
        $this->addSql('ALTER TABLE Genero_Media DROP FOREIGN KEY genero_media_ibfk_2');
        $this->addSql('ALTER TABLE Genero_Media ADD CONSTRAINT FK_C4EB3B9484A9E03C FOREIGN KEY (id_media) REFERENCES Media (id)');
        $this->addSql('ALTER TABLE Genero_Media ADD CONSTRAINT FK_C4EB3B9486373DD7 FOREIGN KEY (id_genero) REFERENCES Genero (id)');
        $this->addSql('ALTER TABLE Libreria DROP FOREIGN KEY libreria_ibfk_1');
        $this->addSql('ALTER TABLE Libreria ADD CONSTRAINT FK_1617262CFCF8192D FOREIGN KEY (id_usuario) REFERENCES Usuario (id)');
        $this->addSql('ALTER TABLE Libreria_Media DROP FOREIGN KEY libreria_media_ibfk_1');
        $this->addSql('ALTER TABLE Libreria_Media DROP FOREIGN KEY libreria_media_ibfk_2');
        $this->addSql('ALTER TABLE Libreria_Media ADD CONSTRAINT FK_CA5FCD9984A9E03C FOREIGN KEY (id_media) REFERENCES Media (id)');
        $this->addSql('ALTER TABLE Libreria_Media ADD CONSTRAINT FK_CA5FCD99BFBAA8EF FOREIGN KEY (id_libreria) REFERENCES Libreria (id)');
        $this->addSql('ALTER TABLE Media DROP FOREIGN KEY media_ibfk_1');
        $this->addSql('ALTER TABLE Media ADD CONSTRAINT FK_ABED8E08D01FB279 FOREIGN KEY (Tipo) REFERENCES Tipo (id)');
        $this->addSql('DROP INDEX Usuarios ON Usuario');
        $this->addSql('ALTER TABLE Visto_Anteriormente DROP FOREIGN KEY visto_anteriormente_ibfk_1');
        $this->addSql('ALTER TABLE Visto_Anteriormente DROP FOREIGN KEY visto_anteriormente_ibfk_2');
        $this->addSql('ALTER TABLE Visto_Anteriormente ADD CONSTRAINT FK_F636F42584A9E03C FOREIGN KEY (id_media) REFERENCES Media (id)');
        $this->addSql('ALTER TABLE Visto_Anteriormente ADD CONSTRAINT FK_F636F4256B3CA4B FOREIGN KEY (id_user) REFERENCES Usuario (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Detalle_Pelicula DROP FOREIGN KEY FK_45B09C8A23679C00');
        $this->addSql('ALTER TABLE Detalle_Pelicula ADD CONSTRAINT detalle_pelicula_ibfk_1 FOREIGN KEY (id_pelicula) REFERENCES Media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Detalle_Serie DROP FOREIGN KEY FK_6F3BD9144BFD204');
        $this->addSql('ALTER TABLE Detalle_Serie ADD CONSTRAINT detalle_serie_ibfk_1 FOREIGN KEY (id_serie) REFERENCES Media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Genero_Media DROP FOREIGN KEY FK_C4EB3B9484A9E03C');
        $this->addSql('ALTER TABLE Genero_Media DROP FOREIGN KEY FK_C4EB3B9486373DD7');
        $this->addSql('ALTER TABLE Genero_Media ADD CONSTRAINT genero_media_ibfk_1 FOREIGN KEY (id_media) REFERENCES Media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Genero_Media ADD CONSTRAINT genero_media_ibfk_2 FOREIGN KEY (id_genero) REFERENCES Genero (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Libreria DROP FOREIGN KEY FK_1617262CFCF8192D');
        $this->addSql('ALTER TABLE Libreria ADD CONSTRAINT libreria_ibfk_1 FOREIGN KEY (id_usuario) REFERENCES Usuario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Libreria_Media DROP FOREIGN KEY FK_CA5FCD9984A9E03C');
        $this->addSql('ALTER TABLE Libreria_Media DROP FOREIGN KEY FK_CA5FCD99BFBAA8EF');
        $this->addSql('ALTER TABLE Libreria_Media ADD CONSTRAINT libreria_media_ibfk_1 FOREIGN KEY (id_media) REFERENCES Media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Libreria_Media ADD CONSTRAINT libreria_media_ibfk_2 FOREIGN KEY (id_libreria) REFERENCES Libreria (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Media DROP FOREIGN KEY FK_ABED8E08D01FB279');
        $this->addSql('ALTER TABLE Media ADD CONSTRAINT media_ibfk_1 FOREIGN KEY (Tipo) REFERENCES Tipo (id) ON DELETE CASCADE');
        $this->addSql('CREATE UNIQUE INDEX Usuarios ON Usuario (Usuarios)');
        $this->addSql('ALTER TABLE Visto_Anteriormente DROP FOREIGN KEY FK_F636F42584A9E03C');
        $this->addSql('ALTER TABLE Visto_Anteriormente DROP FOREIGN KEY FK_F636F4256B3CA4B');
        $this->addSql('ALTER TABLE Visto_Anteriormente ADD CONSTRAINT visto_anteriormente_ibfk_1 FOREIGN KEY (id_media) REFERENCES Media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Visto_Anteriormente ADD CONSTRAINT visto_anteriormente_ibfk_2 FOREIGN KEY (id_user) REFERENCES Usuario (id) ON DELETE CASCADE');
    }
}
