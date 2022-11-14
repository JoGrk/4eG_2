-- 1. Utwórz użytkownika u2  z hasłem abcd
create user 'u2'@'localhost' IDENTIFIED BY 'abcd'; 

-- 2. Utwórz bazę danych b2 i wykonaj do niej plik komis.sql (metodą przekierowania) 
create database b2;
use b2;
source C:\xampp\htdocs\4eG_2\sql\komis.sql
-- 3. Użytkownikowi u2 nadaj prawo do efektywnego wstawiania, usuwania i modyfikowania danych dla tabeli samochody.
    GRANT INSERT, DELETE, UPDATE, SELECT ON b2.samochody TO 'u2'@'localhost' ;
-- 4. Użytkownikowi u2 odbierz prawo do usuwania danych w tabeli samochody
REVOKE DELETE ON b2.samochody FROM 'u2'@'localhost';
-- 5. utwórz rolę r2 z prawami do wyświetlania danych z wszystkich tabel bazy b2
    CREATE ROLE r2;
    GRANT SELECT ON b2.* TO r2;
-- 6. Użytkownikowi u2 przypisz prawo do roli r2

   GRANT r2 TO 'u2'@'localhost';

-- 7. zaloguj się jako u2 i sprawdź uprawniania (show grants)
SHOW GRANTS
--        8. Sprawdź, czy możesz wyświetlić dane z tabeli zamowienia

--        9. włącz (ustaw) rolę r2
SET role r2;

--        10. sprawdź, czy możesz wyświetlić dane z tabeli zamowienia
SELECT *
FROM zamowienia;
--         11. sprawdź, czy możesz usunąć zamowienie o id 3
DELETE FROM zamowienia
WHERE id=3;
-- 12. do roli r2 dodaj prawo do usuwania danych z tabeli zamowienia
GRANT DELETE ON b2.zamowienia TO 'r2';
--          13. sprawdź uprawnienia
    SHOW GRANTS;
--          14. usuń zamówienie o id 2

-- 15. usuń rolę r2
    DROP ROLE r2;
-- 16. usuń użytkownika u2
    DROP USER u2;
