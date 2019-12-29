#1) Listar todos los jugadores junto con su equipo, ordenados por el nombre del equipo y el nombre del jugador.
SELECT e.nombre, j.nombre
FROM jugadores j
INNER JOIN equipos e ON j.id_equipo = e.id
GROUP BY e.nombre, j.nombre;

#2) Listar el total de goles marcados por cada equipo, ordenado por el total de goles.
SELECT e.nombre, SUM(jg.goles) as Goles_Totales
FROM jugadores j
INNER JOIN equipos e ON j.id_equipo = e.id
INNER JOIN jugadoresgoles jg ON jg.id_jugador = j.id
GROUP BY e.nombre
ORDER BY SUM(jg.goles) DESC;

#3) Insertar un nuevo jugador.
INSERT INTO jugadores (id, id_equipo, nombre) VALUES (7, 1, 'David');

#4) Borrar el jugador recién creado
DELETE FROM jugadores
WHERE id
IN (SELECT MAX(id)
	FROM jugadores);

#5) Incrementar los goles de un jugador en 5
UPDATE jugadoresgoles jg
SET jg.goles = jg.goles + 5
WHERE jg.id_jugador = 6;

#6) Listar el máximo goleador de cada equipo