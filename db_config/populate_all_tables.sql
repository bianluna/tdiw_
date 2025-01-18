
-- Populate the tables with data

-- Insert data into the users table
INSERT INTO users (user_id, name, email, password, address, city, postal_code, phone_number)
VALUES
    (1, 'bianca', 'bian@test.com', '$2y$10$DMKTEinmyO3a91', 'direccion 1234', 'city', '22222', 22222222),
    (2, 'veronica', 'veronica@test.com', '$2y$10$OthThvkdQ7TMU', 'direccion 1233', 'poblacion', '08227', 62232323),
    (3, 'xavi', 'xavi@gamil.com', '$2y$10$sIqNw/Juxca.aZ7S.', 'direccion 1234', 'xavi', '03012', 644328978);
SELECT setval('users_user_id_seq', (SELECT MAX(user_id) FROM users));

-- Insert data into the categories table
INSERT INTO categories (category_id, type)
VALUES
    ('3', 'manga'),
    ('4', 'juvenil'),
    ('5', 'ciencia ficción'),
    ('2', 'fantasía'),
    ('1', 'contemporáneo');

-- Insert data into the books tableINSERT INTO books (book_id, category_id, price, editorial, volume, isbn, language, title, description, image, popular, recommended, author)
DELETE FROM books WHERE book_id > 0;

INSERT INTO books (book_id, category_id, price, editorial, volume, isbn, language, title, description, image, popular, recommended, author)
VALUES
    (1, '1', 15.9, 'Taylor&Francis', NULL, '9781035046256', 'inglés', 'Before We Forget Kindness', 
     'In the fifth book in the sensational Before the Coffee Gets Cold series translated from Japanese, the mysterious Tokyo café where customers arrive hoping to travel back in time welcomes four new guests: - The father who could not allow his daughter to get married - A woman who couldn''t give Valentine''s Day chocolates to her loved one - A boy who wants to show his smile to his divorced parents - A wife holding a child with no name... They must follow the café''s strict rules, however, and come back.', 
     NULL, true, false, 'Toshikazu Kawaguchi'),
    (2, '1', 10.92, 'Adn Editorial Group Ana', NULL, '9788417468407', 'castellano', 'La Biblioteca de la Medianoche', 
     '«Entre la vida y la muerte hay una biblioteca. Y los estantes de esa biblioteca son infinitos. Cada libro da la oportunidad de probar otra vida que podrías haber vivido y de comprobar cómo habrían cambiado las cosas si hubieras tomado otras decisiones... ¿Habrías hecho algo de manera diferente si hubieras tenido la oportunidad?».\n\nNora Seed aparece, sin saber cómo, en la Biblioteca de la Medianoche, donde se le ofrece una nueva oportunidad para hacer las cosas bien. Hasta ese momento, su vida ha estado marcada por la infelicidad y el arrepentimiento.\n\nNora siente que ha defraudado a todos, y también a ella misma. Pero esto está a punto de cambiar.\n\nLos libros de la Biblioteca de la Medianoche permitirán a Nora vivir como si hubiera hecho las cosas de otra manera. Con la ayuda de una vieja amiga, tendrá la opción de esquivar todo aquello que se arrepiente de haber hecho (o no haber hecho), en pos de la vida perfecta. Pero las cosas no siempre serán como imaginó que serían, y pronto sus decisiones enfrentarán a la Biblioteca y a ella misma en un peligro extremo. Nora deberá responder una última pregunta antes de que el tiempo se agote: ¿cuál es la mejor manera de vivir?', 
     NULL, false, true, 'Matt Haigh'),
    (3, '1', 17.69, 'Quaderns Crema', NULL, '9788477271057', 'catalán', 'El perquè de tot plegat', 
     'Els trenta relats que integren aquest recull de Quim Monzó es complementen els uns als altres per formar un tot que ens mostra amb precisió l''eterna incertesa humana. En El perquè de tot plegat els recursos sintètics de Monzó arriben al seu màxim de puresa: aparentment simples i esquemàtics, són una exhibició enèrgica de mestria.', 
     NULL, false, true, 'Quim Monzó'),
    (4, '1', 16.5, 'Club Editor', NULL, '9788473292965', 'catalán', 'Permagel', 
     'Permagel és aquella part de la terra que no es desglaça mai i és la membrana que revesteix l''heroïna d''aquest llibre. Una manera de preservar la part tovíssima que amaga la fa viure dins d''una forma en tensió. El text enteréix l''amenaça, cal atrevir-se a sortir de la cel·la familiar, desestabilitzar les lleis de la salut, la germana obsessiva de la felicitat, negar-se a pagar el deute del que han invertit en tu: no hi ha res a esperar d''una lesbiana suïcida. Després, reunir forces: no fer més que follar i llegir. Trobar un lloc on la mentida no sigui necessària, si en cal, al glaç s''esquerdi. I començar.', 
     NULL, false, true, 'Eva Baltasar'),
    (5, '2', 22.95, 'Roca Editorial', NULL, '9788417968983', 'castellano', 'El Priorato del Naranjo', 
     'Un mundo dividido. Un reino sin su heredera. Un antiguo enemigo se despierta...\n\nLa Casa de Berethnet ha gobernado Inys durante mil años. Aún sin casar, la reina Sabran IX debe concebir una hija para proteger a su reino de la destrucción. Pero los asesinos cada vez están más cerca.\n\nEad Duryan es una intrusa en la corte. A pesar de que se ha posicionado como dama de compañía, es leal a una sociedad oculta de magos. Ead vigila a Sabran, protegiéndola en secreto con magia prohibida.\n\nAl otro lado del mar oscuro, Tane ha entrenado toda su vida para ser una jinete de dragón, pero se ve obligada a tomar una decisión que podría romper su vida en añicos.\n\nMientras tanto, el Este y el Oeste siguen divididos. Cada región tiene una religión diferente basada en los sucesos acaecidos mucho tiempo atrás. Los que adoran a los dragones, los que los detestan y quienes adoran al Sin Nombre aparentemente nunca se pondrán de acuerdo.\n\nY las fuerzas del caos se despiertan de su letargo y parecen estar a punto de llegar.', 
     NULL, true, true, 'Samantha Shannon'),
    (6, '2', 17.9, 'Puck', NULL, '9788417854293', 'castellano', 'Siete Grullas', 
     'Una princesa exiliada, un dragón que cambia de forma, seis grullas encantadas, y una maldición indescriptible... Se necesitará algo más que magia para encontrar el camino a casa.\n\nShiori''anma, la única princesa de Kiata, tiene un secreto. La magia prohibida corre por sus venas, y en la mañana de su ceremonia de compromiso Shiori pierde el control. Al principio, su error parece un golpe de suerte, evitando la boda que nunca quiso, pero también atrae la atención de Raikama, su madrastra. Raikama es una poderosa hechicera y destierra a la joven princesa, convirtiendo a sus hermanos en grullas, y advirtiendo a Shiori que no debe hablar de ello con nadie: por cada palabra que salga de sus labios, uno de sus hermanos morirá. Sola y rota, Shiori emprende la búsqueda de sus hermanos y descubre una oscura conspiración para hacerse con el trono.\n\nSolo Shiori puede salvar el reino, pero antes debe confiar en un pájaro de papel, un dragón volátil, y en el mismo chico con el que tanto luchó por no casarse. Y debe abrazar la magia que le han enseñado a suprimir toda su vida, sin importar lo que cueste.', 
     NULL, true, true, 'Elizabeth Lim'),
    (7, '2', 18.95, 'Nova', NULL, '9788417347979', 'castellano', 'Gideon la Novena', 
     'El Emperador necesita nigromantes. La nigromante de la Novena necesita una espadachina. Gideon tiene una espada, unas revistas sucias y ninguna paciencia para tonterías con los muertos vivientes. Después de haber sido criada por profesoras antipáticas y osificadas, sirvientes vetustos y una infinidad de esqueletos, Gideon está lista para abandonar una vida de servidumbre y un más allá como cadáver reanimado. Mete su espada y sus revistas guarras en la maleta y se prepara para su audaz escapada. Pero su némesis de la infancia no piensa dejar que se libere así como así.\n\nHarrowhark Nonagesimus, reverenda hija de la Novena Casa y extraordinaria piloto de los huesos, ha sido convocada. El Emperador ha invitado a los herederos de cada una de sus leales casas a una prueba mortal que someterá a examen su inteligencia y sus habilidades. Si Harrowhark Nonagesimus tiene éxito, se convertirá en una sirviente inmortal y todopoderosa de la Resurrección, pero ningún nigromante puede ascender sin la ayuda de su caballero. Sin la espada de Gideon, Harrow fracasará y la Novena Casa terminará por desaparecer. Y hay cosas que es mejor dejar muertas.', 
     NULL, false, true, 'Tamsyn Muir'),
    (8, '2', 16.99, 'Orion', NULL, '9781780622286', 'inglés', 'Six of Crows', 
     'Ketterdam: a bustling hub of international trade where anything can be had for the right price—and no one knows that better than criminal prodigy Kaz Brekker. Kaz is offered a chance at a deadly heist that could make him rich beyond his wildest dreams. But he can’t pull it off alone...\n\nA convict with a thirst for revenge\nA sharpshooter who can’t walk away from a wager\nA runaway with a privileged past\nA spy known as the Wraith\nA Heartrender using her magic to survive the slums\nA thief with a gift for unlikely escapes\nSix dangerous outcasts. One impossible heist. Kaz’s crew is the only thing that might stand between the world and destruction—if they don’t kill each other first.', 
     NULL, true, true, 'Leigh Bardugo'),
    (9, '3', 7.95, 'Norma Editorial', 14, '9788467939033', 'castellano', 'Guardianes de la Noche 14', 
     'Dejando a un lado el cuerpo original, las emociones escindidas de Hantengu se fusionan en un nuevo demonio que, tras acusar a Tanjiro de "atormentar a los débiles", lo lleva a una cruenta batalla. Por otro lado, en pleno enfrentamiento con Gyokko, Tokitō empieza a recuperar los recuerdos de su pasado...', 
     NULL, true, false, 'Koyoharu Gotouge'),
    (10, '3', 8.95, 'Milky Way Ediciones', 12, '9788416960919', 'castellano', 'Atelier of Witch Hat 12', 
     'La presentación de Coco en el Desfile de la Noche de Plata termina siendo un gran éxito, pero la alegría dura poco al aparecer enormes monstruos que atacan la ciudad de Ezrest.', 
     NULL, false, true, 'Kamome Shirahama'),
    (11, '3', 9.95, 'Arechi Manga', 9, '9788418680495', 'castellano', 'Tragones y mazmorras 9', 
     'Guiados por Kabru, los canarios entran en el nivel 1 con la idea de azuzar la codicia en su interior para así aumentar la presión sobre la mazmorra. Su misión tiene éxito, ya que pronto empiezan a aparecer monstruos que causan el caos y amenazan con salir a la superficie. Además, parece haber alguien muy poderoso controlando sus movimientos...\n\nEn un nivel más profundo, mientras tanto, Laios y sus compañeros han dado caza a un bicornio. ¡Entonces alguien hiere a Laios cuando se queda solo y el resto se ven amenazados por unas astutas criaturas...!', 
     NULL, true, true, 'Ryoko Kui'),
    (12, '3', 8.5, 'Tomodomo', 1, '9788416217952', 'castellano', 'Sombras sobre Shimanami 1', 
     'Tasuku acaba de mudarse a Onomichi, una pintoresca ciudad cercana a Hiroshima. Todo va bien hasta que sus compañeros de clase descubren porno gay en su móvil y empiezan a burlarse de él. Desesperado, decide suicidarse antes de que el acoso le haga la vida imposible. Sin embargo, justo cuando se dispone a arrojarse desde una colina, contempla cómo una misteriosa mujer salta y desaparece en el precipicio. El rastro de aquella presencia fantasmal, que responde al nombre de Nadie, lo conduce a un particular local llamado El Consultorio. Allí conocerá a Haruko Daichi, una joven lesbiana que se ha trasladado a Onomichi para vivir con su pareja, además de otros personajes con los que Tasuku intuye que tiene algo en común. Ellos, junto con la enigmática Nadie, le harán plantearse si no es preferible vivir desafiando los estándares a aceptar una muerte en vida.', 
     NULL, true, true, 'Yuhki Kamatani'),
    (13, '4', 17.05, 'Crossbooks', NULL, '9788408237257', 'castellano', 'Five Survive', 
    'Seis amigos, un viaje y un único objetivo: sobrevivir.
    En las vacaciones de primavera, seis amigos deciden hacen una ruta por carretera. Ellos, una camper y kilómetros por delante. Este será el viaje de su vida. Pero cuando su furgoneta sufra una avería en medio de la nada, en una zona sin cobertura y alejada de cualquier zona habitada, descubrirán que no ha sido un accidente.Alguien les acecha. Alguien que exige saber un secreto que uno de ellos esconde. Y que está dispuesto a matar por él.', 
    NULL, false, false, 'Holly Jackson'),
    (14, '4', 15.67, 'Puck', NULL, '9788417854256', 'castellano', 'Legendary', 
    'Un corazón al que proteger.
    Una deuda que saldar.
    Un juego en el que vencer.
    Tras verse arrastrada al mundo mágico de Caraval,áDonatella Dragna por fin ha escapado de su padre yálibrado a su hermana Scarlett de un funesto matrimonioáconcertado. Las chicas deberían estar celebrándolo,ápero Tella sigue sin poder disfrutar de la libertad.áDesesperada, hizo un trato con un misterioso criminal,áy ahora le debe algo que nadie ha logrado averiguar hastaáel momento: el verdadero nombre del Maestro Legend.
    Su única posibilidad de descubrir la identidad de Legendáes alzarse con la victoria en Caraval, así que Tella seáembarcará una vez más en la competición. Caravalásiempre ha exigido valentía, sacrificio y astucia, peroáahora el juego requiere algo más. Si Tella no lograácumplir su parte del trato y revelar el nombre de Legend,álo perderá todo. Puede que incluso la vida. Pero si gana,áLegend y Caraval serán destruidos para siempre.
    EL JUEGO ACABA DE EMPEZAR.', 
    NULL, false, false, 'Stephanie Garber'),
    (15, '4', 16.1, 'Harper Collins', NULL, '9780007559424', 'inglés', 'Radio Silence', 
    'What if everything you set yourself up to be was wrong?Frances has been a study machine with one goal. Nothing will stand in her way; not friends, not a guilty secret – not even the person she is on the inside. Then Frances meets Aled, and for the first time she''s unafraid to be herself.So when the fragile trust between them is broken, Frances is caught between who she was and who she longs to be. Now Frances knows that she has to confront her past. To confess why Carys disappeared…Frances is going to need every bit of courage she has.Engaging with themes of identity, diversity and the freedom to choose, Radio Silence is a tour de force by the most exciting writer of her generation.', 
    NULL, false, false, 'Alice Oseman'),
    (16, '4', 8.95, 'Planeta', NULL, '9788496836354', 'catalán', 'El Príncipe de la Boira', 
    'La nova llar dels Carver està envoltada de misteri. Encara s’hi respira l’esperit de Jacob, el fill dels antics propietaris, que va morir ofegat. Les estranyes circumstàncies d’aquella mort només es comencen a aclarir amb l’aparició d’un diabòlic personatge: el Príncep de la Boira, capaç de concedir qualsevol desig a una persona a un preu molt alt…', 
    NULL, false, false, 'Carlos Ruiz Zafón'),
    (17, '5', 35, 'Bantam', NULL, '9780553803716', 'inglés', 'Foundation', 
    'For twelve thousand years the Galactic Empire has ruled supreme. Now it is dying. But only Hari Seldon, creator of the revolutionary science of psychohistory, can see into the future--to a dark age of ignorance, barbarism, and warfare that will last thirty thousand years. To preserve knowledge and save humankind, Seldon gathers the best minds in the Empire--both scientists and scholars--and brings them to a bleak planet at the edge of the galaxy to serve as a beacon of hope for future generations. He calls his sanctuary the Foundation.', 
    NULL, false, false, 'Isaac Asimov'),
    (18, '5', 18.5, 'Nocturna', NULL, '9788417834883', 'castellano', 'La flor y la muerte', 
    'Marte, 2628.Olympus es una gran corporación que se extiende por la galaxia y divide a la sociedad en trece Servicios basados en las funciones de los antiguos dioses olímpicos.Asha es una hades y lleva toda la vida rodeada de muerte.Ianthe es una deméter y lleva toda la vida enraizada en la soledad.Cuando ambas entran en la Akademeia, ya saben lo que les espera: tres años de internamiento y la Odisea, la prueba por grupos donde se elige a los mejores candidatos para liderar los Servicios. Pero la competición es dura y hay mucho en juego.El poder lo conseguirá quien esté dispuesto a todo por Olympus.La flor y la muerte da comienzo a la serie de Olympus (de las autoras de Sueños de piedra, Antihéroes y El orgullo del dragón), compuesta por novelas de ciencia ficción independientes e inspiradas en los mitos griegos.', 
    NULL, false, false, 'Selene M. Pascual, Iria G. Parente'),
    (19, '5', 18, 'Nocturna', NULL, '9788418440045', 'castellano', 'El sol y la mentira', 
    'Marte, 2634, Olympus es una gran corporación que se extiende por la galaxia y divide a la sociedad en trece Servicios basados en las funciones de los antiguos dioses olímpicos.
    Armand Cordroy es diseñador en el Servicio de Afrodita. O eso parece. En realidad, es también un espía en las altas esferas de Marte y tiene un plan: llegar hasta la cúpula de Zeus, el Servicio que controla Olympus. Para conseguirlo aspira a engañar y manipular a alguien de dentro… ¿Y qué mejor opción que Enid Dusan, principal candidata a ser la próxima líder?
    Pero lo que Armand no sabe es que Enid es tan retorcida como él y está acostumbrada a utilizar a los demás. Definitivamente, ella también tiene sus propios planes.
    El sol y la mentira forma parte de la serie Olympus (de las autoras de Antihéroes y Sueños de piedra), compuesta por novelas autoconclusivas de ciencia ficción inspiradas en los mitos griegos, en este caso, el mito de Ícaro se combina con el de Eros y Psique.', 
    NULL, false, false, 'Selene M. Pascual, Iria G. Parente'),
    (20, '5', 18, 'Nocturna', NULL, '9788418440281', 'castellano', 'La furia y el laberinto', 
    'Marte, 2635. Olympus debe hacer frente a la amenaza de un grupo rebelde que pretende desestabilizar su sistema. Para ello, la líder del imperio crea HÉROE, una aplicación colaborativa que ofrece una gran recompensa a quienes consigan cazar a los insurrectos y, sobre todo, a su cabecilla, Asha Amartya.Tess necesita la recompensa: es su oportunidad de alzancar algo que siempre ha deseado y sacar a sus amigos de la pobreza.Talía, en cambio, no busca el dinero: sólo quiere saber qué le pasó a su hermano hace años y encontrar a Asha podría darle tosas sus respuestas.Pero lo que parecía sencillo para una profesional de la tecnología y un equipo de mercenarios va a de mostrar ser mucho más desafiante de lo que nadie había imaginado.', 
    NULL, false, false, 'Selene M. Pascual, Iria G. Parente');

SELECT setval('books_book_id_seq', (SELECT MAX(book_id) FROM books));

UPDATE books SET image = 'https://m.media-amazon.com/images/I/41IQvq6FbML._SY445_SX342_.jpg' WHERE book_id = 1;
UPDATE books SET image = 'https://m.media-amazon.com/images/I/91R4oVybJZL._AC_UY327_FMwebp_QL65_.jpg' WHERE book_id = 5;
UPDATE books SET image = 'https://m.media-amazon.com/images/I/81ZkKkoBlgL._AC_UY327_FMwebp_QL65_.jpg' WHERE book_id = 16;
UPDATE books SET image = 'https://imagessl5.casadellibro.com/a/l/s7/85/9788410223585.webp' WHERE book_id = 10;
UPDATE books SET image = 'https://m.media-amazon.com/images/I/81QvuNSayYL._AC_UY327_FMwebp_QL65_.jpg' WHERE book_id = 15;
UPDATE books SET image = 'https://m.media-amazon.com/images/I/81DUslOiotL._AC_UY327_FMwebp_QL65_.jpg' WHERE book_id = 17;
UPDATE books SET image = 'https://imagessl3.casadellibro.com/a/l/s7/83/9788417834883.webp' WHERE book_id = 18;
UPDATE books SET image = 'https://m.media-amazon.com/images/I/61C1ChncP4L._AC_UY327_FMwebp_QL65_.jpg' WHERE book_id = 9;
UPDATE books SET image = 'https://imagessl0.casadellibro.com/a/l/s7/70/9788417347970.webp' WHERE book_id = 7;
UPDATE books SET image = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbNy7evNtcNX2SLK-kuXDodru0ZCy14klprQ&s' WHERE book_id = 4;
UPDATE books SET image = 'https://m.media-amazon.com/images/I/71xbFWmIOSL._AC_UF894;1000_QL80_.jpg' WHERE book_id = 2;
UPDATE books SET image = 'https://m.media-amazon.com/images/I/71UDOKGMTzS._AC_UY327_FMwebp_QL65_.jpg' WHERE book_id = 11;
UPDATE books SET image = 'https://m.media-amazon.com/images/I/81w5I96jTKL._AC_UY327_FMwebp_QL65_.jpg' WHERE book_id = 19;
UPDATE books SET image = 'https://m.media-amazon.com/images/I/51IJVkUiG2L._SY445_SX342_.jpg' WHERE book_id = 12;
UPDATE books SET image = 'https://imagessl7.casadellibro.com/a/l/s7/57/9788408273257.webp' WHERE book_id = 13;
UPDATE books SET image = 'https://www.editorialhidra.com/media/hidra/images/thumbs/cover-118707-236x376.jpg' WHERE book_id = 8;
UPDATE books SET image = 'https://imagessl6.casadellibro.com/a/l/s7/56/9788417854256.webp' WHERE book_id = 14;
UPDATE books SET image = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPaRRm_LqP3ktOZ6KcdyeOjNZduHj310AylA&s' WHERE book_id = 3;
UPDATE books SET image = 'https://m.media-amazon.com/images/I/81sqMgsHsIL._AC_UY327_FMwebp_QL65_.jpg' WHERE book_id = 20;
UPDATE books SET image = 'https://m.media-amazon.com/images/I/81n2jMIxS9L._SY466_.jpg' WHERE book_id = 6;

