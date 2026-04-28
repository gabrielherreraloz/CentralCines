<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pelicula;

class PeliculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelicula::create([
            'titulo' => 'Charge',
            'descripcion' => 'En una distopía de escasez de energía, un hombre indigente irrumpe en una fábrica de baterías, pero pronto se encuentra confrontado por un droide de seguridad.',
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/db/Charge-movie_poster.png/960px-Charge-movie_poster.png',
            'duracion' => 4
        ]);

        Pelicula::create([
            'titulo' => 'Spiderman: The Rise of Spiderverse',
            'descripcion' => 'Tras reencontrarse con Gwen Stacy, el amigable vecindario de Spider-Man de Brooklyn al completo es catapultado a través del Multiverso, donde se encuentra con un equipo de Spidermans encargados de proteger su propia existencia. Pero cuando los héroes se enfrentan sobre cómo manejar una nueva amenaza, Miles se encuentra enfrentado a las otras Arañas y debe redefinir lo que significa ser un héroe para poder salvar a la gente que más quiere.',
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2d/Spider-Man_The_Rise_of_Spider_Verse_poster.png/960px-Spider-Man_The_Rise_of_Spider_Verse_poster.png',
            'duracion' => 140
        ]);

        Pelicula::create([
            'titulo' => 'Big Buck Bunny',
            'descripcion' => 'El conejo que vive en un paraíso bucólico de bonitas praderas, árboles fruteros, pájaros y mariposas, es llevado al límite por la destrucción y crueldad de tres pequeños roedores.',
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/Big_buck_bunny_poster_big.jpg/960px-Big_buck_bunny_poster_big.jpg',
            'duracion' => 10
        ]);

        Pelicula::create([
            'titulo' => '2050',
            'descripcion' => 'El duro, majestuoso e impredecible desierto de hielo antártico ha atraído a aventureros profesionales y científicos apasionados durante más de un siglo. El director Eric Goens, siguiendo los pasos del legendario explorador belga Adrien de Gerlache, se embarca en una fascinante expedición a una de las regiones más remotas de la Antártida. Allí se encuentra la Estación de Investigación Princesa Isabel, donde viven y trabajan decenas de científicos que han dedicado su vida a medir la salud del planeta. Comparten sus arriesgadas actividades diarias, sus reflexiones científicas y su firme creencia de que tenemos todas las herramientas que necesitamos para abordar los desafíos urgentes del cambio climático.',
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3a/POSTER_2050_-_English.jpg/960px-POSTER_2050_-_English.jpg',
            'duracion' => 120
        ]);

        Pelicula::create([
            'titulo' => 'El sueño de los elefantes',
            'descripcion' => 'Es una pequeña historia de dos personajes: un chico joven llamado Emo y Proog, dos personas que comparten un mundo surrealista o fantástico en el que están inmersos y que varía según van moldeando sus propios pensamientos. Proog, que comprende lo que está sucediendo, está fascinado por este y sus misterios, sin embargo Emo pasa del desconocimiento a cansarse de lo que le rodea.',
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/Elephants_Dream_-_Final_Poster_Source.png/960px-Elephants_Dream_-_Final_Poster_Source.png',
            'duracion' => 10
        ]);

        Pelicula::create([
            'titulo' => 'La escarcha',
            'descripcion' => 'A raíz de la muerte en un accidente de su único hijo, Rita y Alfred viven dominados por los remordimientos. Su sentimiento de culpa los lleva a reconocer que han vivido tan obsesionados con sus pequeñas y egoístas necesidades que olvidaron amar a su hijo. Esa dolorosa verdad los persigue y tortura sin tregua. Rita y Alfred deben encontrar el modo de perdonarse a sí mismos para no destruirse mutuamente.',
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/00/The_Frost_Movie_Poster.png/960px-The_Frost_Movie_Poster.png',
            'duracion' => 100
        ]);

        Pelicula::create([
            'titulo' => 'Spring',
            'descripcion' => 'Cuenta la historia de una chica pastora y de su perro. Ambos se enfrentan a espíritus para poder continuar con el ciclo de la vida. ',
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/25/Spring2019AlphaPosterBlender.jpg/960px-Spring2019AlphaPosterBlender.jpg',
            'duracion' => 7
        ]);

        Pelicula::create([
            'titulo' => 'No me olvides',
            'descripcion' => '"No me olvides" sigue el emotivo viaje de Baran, una periodista kurdo-estadounidense capturada por ISIS que escapa a la libertad junto a otras prisioneras.',
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b4/DONT_FORGET_ME_2026_FILM_POSTER_%D9%BE%DB%86%D8%B3%D8%AA%DB%95%D8%B1%DB%8C_%D9%84%DB%95%D8%A8%DB%8C%D8%B1%D9%85_%D9%85%DB%95%DA%A9%DB%95.jpg/960px-DONT_FORGET_ME_2026_FILM_POSTER_%D9%BE%DB%86%D8%B3%D8%AA%DB%95%D8%B1%DB%8C_%D9%84%DB%95%D8%A8%DB%8C%D8%B1%D9%85_%D9%85%DB%95%DA%A9%DB%95.jpg',
            'duracion' => 70
        ]);

        Pelicula::create([
            'titulo' => 'Nobel Peace',
            'descripcion' => '«Nobel Peace» es un largometraje que explora las peligrosas tensiones sociales que surgen de las diferencias religiosas y las simples diferencias de opinión, que conducen a una violencia y una opresión crueles y sin sentido, lo que a su vez conduce a más injusticias y crea un ciclo interminable de explotación tanto por parte de las autoridades legales como de los grupos ilegales. Ambientado en un pequeño pueblo turístico de la India, seguimos la historia de Hayan Mir y su amigo Aasif Alam junto con el profesor Shlok Manhas. Hayan es un joven que desea hacer vídeos para atraer turistas a su pueblo y promover la paz. Sus acciones están siendo malinterpretadas cuando visita un campamento terrorista.',
            'imagen_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Film_Poster_of_Nobel_Peace.jpg/960px-Film_Poster_of_Nobel_Peace.jpg',
            'duracion' => 121
        ]);
    }
}
