CREATE DATABASE web WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Russian_Russia.1251' LC_CTYPE = 'Russian_Russia.1251';

CREATE TABLE accounts (
    "user" character varying NOT NULL,
    password character varying,
    email character varying,
    role character varying,
    date_added date
);

INSERT INTO accounts ("user", password, email, role, date_added) VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@test.ru', 'admin', '2015-01-01');

ALTER TABLE ONLY accounts
    ADD CONSTRAINT pk_accounts PRIMARY KEY ("user");

