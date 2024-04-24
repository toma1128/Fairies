-- ログインユーザー名とパスワード
CREATE USER 'fairies'@'%' IDENTIFIED BY 'daimonia';
CREATE DATABASE feya;
GRANT ALL PRIVILEGES ON feya.* TO 'fairies'@'localhost';

USE feya;

CREATE TABLE EMPLOYEES (
    DEPARTMENT_ID INT(2) NOT NULL,
    NUMBER CHAR(5) PRIMARY KEY,
    NAME VARCHAR(20) NOT NULL,
    PASSWORD VARCHAR(20),
    HIREDATE DATE 
);

CREATE TABLE DEPARTMENTS(
    ID TINYINT PRIMARY KEY,
    NAME VARCHAR(30) NOT NULL
);

CREATE TABLE CUSTOMERS(
    CUSTOMERNUMBER CHAR(5) PRIMARY KEY,
    NAME VARCHAR(20) NOT NULL,
    PASSWORD VARCHAR(20)
);

CREATE TABLE EMPLOYEE_FORMS(
    ID INT NOT NULL PRIMARY KEY,
    NUMBER CHAR(5) NOT NULL,
    POSSIBLE INT NOT NULL,
    PERIOD INT NOT NULL,
    REASON INT NOT NULL,
    MESSAGE VARCHAR(500) NOT NULL
);

CREATE TABLE CUSTOMER_FORMS(
    ID INT NOT NULL PRIMARY KEY,
    NUMBER CHAR(5) NOT NULL,
    STATE INT NOT NULL,
    PART INT NOT NULL,
    PHOTO1 VARCHAR(255),
    PHOTO2 VARCHAR(255),
    PHOTO3 VARCHAR(255),
    INFORMATION VARCHAR(500) NOT NULL
);

CREATE TABLE GENERIC_MASTER(
    GENERIC_CODE INT,
    SEGMENT_ID INT NOT NULL,
    OPTIONS VARCHAR(20) 
);
-- 質問：変数名
-- ラジオボタンで送られてくるデータがVALUEなのかINTなのか（PHPと相談
-- HTMLCSS側と直書きか正規化したデータをデータベースで管理するか（HTML側と相談
-- 仮名のスペースはアンダーバーに置き換える