CREATE TABLE admin -- Membuat Tabel Admin.
(
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    PRIMARY KEY (username)
) ENGINE = InnoDB;

INSERT INTO admin(username, password)
VALUES('admin','rahasia');

INSERT INTO admin(username, password)
VALUES('terry','voodooLicious');
