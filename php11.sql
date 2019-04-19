show databases;
CREATE DATABASE sitename;
USE sitename;

CREATE TABLE users (
	user_id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT
	, first_name VARCHAR(20) NOT NULL
	, last_name VARCHAR(40) NOT NULL
	, email VARCHAR(60) NOT NULL
	, pass CHAR(128) NOT NULL
	, registration_date DATETIME NOT NULL
	, PRIMARY KEY (user_id)
	);
	
SHOW tables;
SHOW COLUMNS FROM users;
SELECT * FROM users;

INSERT INTO users
(first_name, last_name, email, pass, registration_date)
VALUES
('Larry', 'Ullman', 'email@example.com', SHA2('mypass', 512), NOW());

INSERT INTO users VALUES
(NULL, 'Zoe', 'Isabella', 'email2@example.com', SHA2('mojito', 512), NOW());

-- insert several values at once. supported in mysql but not in standard sql

INSERT INTO users
	(first_name, last_name, email, pass, registration_date)
	VALUES
	('Paul', 'McCartney', 'paul@beatles.com', SHA2('letITbe', 512), NOW()),
	('john', 'Lennon', 'john@beatles.com', SHA2('Happin3ss', 512), NOW()),
	('George', 'Harrison', 'george@beatles.com', SHA2('something', 512), NOW()),
	('Ringo', 'Starr', 'ringo@beatles.com', SHA2('thisboy', 512), NOW());

INSERT INTO users (first_name, last_name, email, pass, registration_date) VALUES
('David', 'Jones', 'davey@monkees.com', SHA2('fasfd', 512), NOW()),
('Peter', 'Tork', 'peter@monkees.com', SHA2('warw', 512), NOW()),
('Micky', 'Dolenz', 'micky@monkees.com ', SHA2('afsa', 512), NOW()),
('Mike', 'Nesmith', 'mike@monkees.com', SHA2('abdfadf', 512), NOW()),
('David', 'Sedaris', 'david@authors.com', SHA2('adfwrq', 512), NOW()),
('Nick', 'Hornby', 'nick@authors.com', SHA2('jk78', 512), NOW()),
('Melissa', 'Bank', 'melissa@authors.com', SHA2('jhk,h', 512), NOW()),
('Toni', 'Morrison', 'toni@authors.com', SHA2('hdhd', 512), NOW()),
('Jonathan', 'Franzen', 'jonathan@authors.com', SHA2('64654', 512), NOW()),
('Don', 'DeLillo', 'don@authors.com', SHA2('asf8', 512), NOW()),
('Graham', 'Greene', 'graham@authors.com', SHA2('5684eq', 512), NOW()),
('Michael', 'Chabon', 'michael@authors.com', SHA2('srw6', 512), NOW()),
('Richard', 'Brautigan', 'richard@authors.com', SHA2('zfs654', 512), NOW()),
('Russell', 'Banks', 'russell@authors.com', SHA2('wwr321', 512), NOW()),
('Homer', 'Simpson', 'homer@simpson.com', SHA2('5srw651', 512), NOW()),
('Marge', 'Simpson', 'marge@simpson.com', SHA2('ljsa', 512), NOW()),
('Bart', 'Simpson', 'bart@simpson.com', SHA2('pwqojz', 512), NOW()),
('Lisa', 'Simpson', 'lisa@simpson.com', SHA2('uh6', 512), NOW()),
('Maggie', 'Simpson', 'maggie@simpson.com', SHA2('plda664', 512), NOW()),
('Abe', 'Simpson', 'abe@simpson.com', SHA2('qopkrokr65', 512), NOW());

SELECT  last_name, last_name 
FROM sitename.users;

SELECT first_name 
FROM sitename.users
WHERE first_name = 'larry'

SELECT *
FROM sitename.users
WHERE email IS NULL;

SELECT user_id, first_name, last_name
FROM sitename.users
WHERE pass = SHA2('mypass', 512);

SELECT first_name, last_name, user_id
FROM sitename.users
WHERE user_id NOT BETWEEN 10 AND 20;

SELECT *
FROM sitename.users
WHERE last_name LIKE '%bank%';

SELECT first_name, last_name, email
FROM sitename.users
WHERE email NOT LIKE '%@authors.com';

SELECT first_name, last_name, user_id
FROM sitename.users
ORDER BY last_name DESC, first_name DESC;

SELECT user_id, first_name, last_name, registration_date
FROM sitename.users
WHERE last_name NOT LIKE 'Simpson'
ORDER BY registration_date DESC
LIMIT 16;

SELECT first_name, last_name, user_id, registration_date
FROM sitename.users
ORDER BY registration_date DESC;
-- important to note here. the results are going in upside down when 
-- inserting a bunch of records  
SELECT user_id, first_name, last_name, email
FROM sitename.users
WHERE first_name = 'Michael' AND last_name = 'Chabon';

UPDATE sitename.users
SET email='mike@authors.com'
WHERE user_id = 18;

SELECT *
FROM sitename.users
WHERE user_id = 18;

UPDATE sitename.users SET first_name = 'Mike' WHERE user_id = 0;
UPDATE sitename.users SET email = 'mike@authors.com' WHERE user_id = 18
LIMIT 1;
-- why is this showing as 'updated rows 1' when no changes have been made?

SELECT user_id
from sitename.users
WHERE first_name = 'Peter'
AND last_name = 'Tork';

SELECT * 
FROM sitename.users
WHERE user_id = 8;

DELETE FROM sitename.users
WHERE user_id = 8 LIMIT 1;

SELECT *, UPPER(first_name) AS 'first Caps'
from sitename.users;

SELECT UPPER('this string');

SELECT CONCAT(first_name, ' ', last_name) AS Name
FROM sitename.users;

SELECT CONCAT(last_name, ', ', first_name) AS Name
FROM sitename.users
ORDER BY Name DESC;

-- longest last name
SELECT LENGTH(last_name) AS L, last_name, user_id
from sitename.users
ORDER BY L DESC;





