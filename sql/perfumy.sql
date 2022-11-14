-- 1. Utwórz bazę perfumy i zaimportuj tabele  marki.txt perfumy.txt i skład.txt  (2019)
CREATE DATABASE 4eg_2_perfumy;
USE 4eg_2_perfumy;
CREATE TABLE marki
(
    id_marki VARCHAR(5) PRIMARY KEY,
    nazwa_m VARCHAR(255)
);


CREATE TABLE sklad(
    id_sklad INT PRIMARY KEY AUTO_INCREMENT,
    id_perfum VARCHAR(5),
    nazwa_skladnika VARCHAR(255)
);

CREATE TABLE perfumy
(
    id_perfum VARCHAR(5) PRIMARY KEY,
    nazwa_p VARCHAR(255),
    id_marki VARCHAR(5),
    rodzina_zapachow VARCHAR(255),
    cena INT
);

LOAD DATA INFILE 'C:\\xampp\\htdocs\\4eG_2\\sql\\perfumy.txt'
INTO TABLE perfumy
FIELDS TERMINATED BY '\t'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA INFILE 'C:\\xampp\\htdocs\\4eG_2\\sql\\marki.txt'
INTO TABLE marki
FIELDS TERMINATED BY '\t'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES;

LOAD DATA INFILE 'C:\\xampp\\htdocs\\4eG_2\\sql\\sklad.txt'
INTO TABLE sklad
FIELDS TERMINATED BY '\t'
LINES TERMINATED BY '\r\n'
IGNORE 1 LINES
(id_perfum, nazwa_skladnika);

-- 2. Utwórz użytkownika edytor z prawami do modyfikowania, usuwania i wstawiania danych we wszystkich tabelach bazy danych perfumy.

CREATE USER 'edytor'@'localhost';
GRANT UPDATE, DELETE, INSERT, SELECT ON 4eG_2.* to 'edytor'@'localhost';
-- 3. Utwórz użytkownika selektor z prawami do wyszukiwania danych w tabeli perfumy z hasłem 1234
DROP USER 'selektor'@'localhost';
CREATE USER 'selektor'@'localhost' IDENTIFIED BY '1234';
GRANT SELECT ON 4eG_2.* TO 'selektor'@'localhost';
-- 4. Nadaj hasło użytkownikowi edytor 1234 oraz użytkownikowi selektor 5678
SET PASSWORD FOR 'edytor'@'localhost' =PASSWORD('1234');
SET PASSWORD FOR 'selektor'@'localhost' =PASSWORD('5678');
-- 5. Odbierz użytkownikowi edytor prawo do usuwania danych z wszystkich tabel
REVOKE DELETE ON 4eG_2.* FROM 'edytor'@'localhost';
-- 6. Sprawdź uprawnienia:

-- A. zaloguj się jako edytor i  zmień cenę perfum o id p_1 na 400 (powinno się udać)
UPDATE perfumy
SET cena=400
WHERE id_perfum='p_1';
-- B. z poziomu konta edytor usuń wszystkie składniki perfum o id p_1 (nie powinno się udać)

DELETE
FROM perfumy
WHERE id_perfum='p_1';
-- C. zaloguj się jako selektor i wyszukaj wszystkie perfumy o cenie 400  (powinno się udać)
SELECT * 
FROM perfumy
WHERE cena = 400;
-- D. z poziomu konta selektor wyszukaj wszystkie składniki perfum o id p_1 (nie powinno się udać)

SELECT*
FROM sklad
WHERE id_perfum='p_1';
-- ------------------------------------

-- CREATE ROLE 'app_developer', 'app_read', 'app_write';
-- GRANT ALL ON app_db.* TO 'app_developer';
-- GRANT 'app_developer' TO 'dev1'@'localhost';
-- REVOKE INSERT, UPDATE, DELETE ON app_db.* FROM 'app_write';


-- 7. Dodaj rolę usuwanie

    create role usuwanie_2;

-- 8. Nadaj prawo do usuwania danych z wszystkich tabel dla roli usuwanie
    GRANT DELETE ON 4eG_2.* TO 'usuwanie_2';
-- 9. Dodaj użytkownika selektor oraz edytor do roli usuwanie
    GRANT usuwanie_2 TO 'selektor'@'localhost';
    GRANT usuwanie_2 TO 'edytor'@'localhost';


-- 10. Sprawdź czy selektor oraz edytor mają prawa do usuwania danych z bazy (usuń skład perfum p_2 oraz p_3)
DELETE
FROM sklad
WHERE id_perfum='p_2' OR id_perfum='p_3';
-- 11. Odmów selektorowi praw do usuwania (deny) z tabeli skład i sprawdź ponownie jego prawa do usuwania

REVOKE DELETE ON 4eg_2.sklad FROM 'selektor'@'localhost';