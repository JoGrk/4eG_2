-- 1. Utwórz tabelę countries z polami: country_id, country_name i  region_id. Tabela powinna być utworzona tylko wtedy, gdy nie istnieje.
    CREATE TABLE IF NOT EXISTS countries
    (
        country_id int,
        country_name varchar(255),
        region_id int 
    );

-- 2. Utwórz tabelę dup_countries będącą kopią tabeli countries (struktura i dane)
    CREATE TABLE dup_countries AS 
    SELECT * FROM countries;
-- 3. Z tabeli dup_countries usuń pole region_id
    ALTER TABLE dup_countries
    DROP region_id;
-- 4. Pole country_id powinno być kluczem podstawowym z autoinkrementacją
    ALTER TABLE countries
    MODIFY country_id INT PRIMARY KEY AUTO_INCREMENT;
-- 5. Zmień nazwę pola country_id na id_country
    ALTER TABLE countries
    CHANGE country_id id_country INT AUTO_INCREMENT;
-- 6. Pole country_name nie powinno być puste - dodaj odpowiedni warunek
    ALTER TABLE countries
    MODIFY country_name VARCHAR(255) NOT NULL;
-- 7. Zmodyfikuj tabelę countries tak, aby tylko wybrane cztery kraje (wymyśl jakie) będą mogły byc wpisane do tej tabeli
    alter table countries
    modify country_name varchar(255) check(country_name in ("Niemcy", "Polska", "Belgia", "Litwa"));
-- 8. Usuń tabelę dup_countries
DROP TABLE dup_countries;
-- 9. Utwórz tabelę jobs zawierajacą pola id_job, job_title, min_salary, max_salary, dodaj regułę, która sprawi, że max_salary nie przekroczy limitu 25000
CREATE TABLE jobs
(
    id_job int,
    job_title int,
    min_salary int,
    max_salary int check(max_salary <=25000)
);
-- 10. Do tabeli jobs dodaj warunek pilnującyk, aby wartości w polu job_title się nie powtarzały

ALTER TABLE jobs
MODIFY job_title varchar(255) UNIQUE;

-- 11. Do tabeli jobs dodaj wartość domyślną na polu min_salary 8000 oraz wartość domyślną NULL na polu max_salary

ALTER TABLE jobs
ALTER min_salary set default 8000,
AlTER max_salary set default NULL;

-- 12. Utwórz tabelę job_histry z polami: employee_id, start_date, end_date, job_id  oraz department_id . Określ klucz podstawowy (zakładamy, że pracownik nie pracuje jednocześnie na więcej niż jednym stanowisku) 
CREATE TABLE job_histry
(
    employee_id INT,
    start_date DATE,
    end_date DATE,
    job_id INT,
    departament_id INT,
    PRIMARY KEY (start_date, employee_id)
);
-- 13 zmodyfikuj tabelę job_histry przesuwając pole job_id na początek tabeli
ALTER TABLE job_histry
MODIFY job_id INT FIRST;

-- 14. Do tabeli job_histry dodaj klucz obcy na polu job_id
ALTER TABLE jobs
MODIFY id_job INT PRIMARY KEY;

ALTER TABLE job_histry
ADD CONSTRAINT fk_job FOREIGN KEY(job_id) REFERENCES jobs(id_job);
-- 15. Do tabeli job_histry dodaj regułę, która będzie pilnowała wprowadzania daty w formacie rrrr-mm-dd
ALTER TABLE job_histry
ADD CONSTRAINT ck_date check(start_date like '____-__-__');


