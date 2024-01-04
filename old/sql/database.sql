CREATE DATABASE weblog_db;

CREATE TABLE AccountInfo(
    ID INT NOT NULL,
    Email VARCHAR(255) NOT NULL,
    -- Password field needs to be hashed.
    Pass VARCHAR(255) NOT NULL,
    FirstName VARCHAR(255) NOT NULL,
    MiddleName VARCHAR(255),
    LastName VARCHAR(255),
    Age INT NOT NULL,
    Birthday DATE,
    Country VARCHAR(255),
    JoinDate DATETIME,
    Picture IMAGE
);

-- Shall be linked to AccountInfo
CREATE TABLE Blogs(
    ID INT NOT NULL,
    -- Points to XML file which includes more information
    Author INT NOT NULL,
    Metadata varchar(255),
    Title varchar(255) NOT NULL,
    -- Points to HTML file
    Content varchar(255),
    Category varchar(255),
    Tags varchar(255),
    DateCreated DATETIME
);