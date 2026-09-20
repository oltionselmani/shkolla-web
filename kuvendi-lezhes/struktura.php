-- --------------------------
-- Tabela: users
-- --------------------------
CREATE TABLE users (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    emri VARCHAR(100) NOT NULL,
    mbiemri VARCHAR(100) NOT NULL,
    telefoni VARCHAR(20) DEFAULT NULL,
    email VARCHAR(150) NOT NULL,
    password VARCHAR(255) NOT NULL,
    foto VARCHAR(255) DEFAULT NULL,
    roli ENUM('member', 'prof', 'prind', 'admin', 'publisher') DEFAULT 'prind',
    kujdestar_klasa VARCHAR(10) DEFAULT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- --------------------------
-- Tabela: publikimet
-- --------------------------
CREATE TABLE publikimet (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    user_id INT(11) NOT NULL,
    titulli VARCHAR(255) NOT NULL,
    njohuri TEXT NOT NULL,
    foto_1 VARCHAR(100) DEFAULT NULL,
    foto_2 VARCHAR(100) DEFAULT NULL,
    foto_3 VARCHAR(100) DEFAULT NULL,
    foto_4 VARCHAR(100) DEFAULT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- --------------------------
-- Tabela: nxenesit
-- --------------------------
CREATE TABLE nxenesit (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    emri VARCHAR(100) NOT NULL,
    mbiemri VARCHAR(100) NOT NULL,
    klasa VARCHAR(6) NOT NULL,
    prind_id INT(11) DEFAULT NULL,
    drejtim_id INT(11) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (prind_id) REFERENCES users(id) ON DELETE SET NULL
);

-- --------------------------
-- Tabela: notat
-- --------------------------
CREATE TABLE notat (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nxenesi_id INT(11) NOT NULL,
    lenda_id INT(11) NOT NULL,
    gj1_p1 INT(11) DEFAULT NULL,
    gj1_p2 INT(11) DEFAULT NULL,
    gj2_p1 INT(11) DEFAULT NULL,
    gj2_p2 INT(11) DEFAULT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (nxenesi_id) REFERENCES nxenesit(id) ON DELETE CASCADE
);

-- --------------------------
-- Tabela: mungesat_oret
-- --------------------------
CREATE TABLE mungesat_oret (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    mungesa_id INT(11) NOT NULL,
    ora INT(11) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- --------------------------
-- Tabela: mungesat
-- --------------------------
CREATE TABLE mungesat (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nxenesi_id INT(11) NOT NULL,
    data DATE NOT NULL,
    nr_oreve INT(11) NOT NULL,
    arsyeja_id INT(11) DEFAULT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (nxenesi_id) REFERENCES nxenesit(id) ON DELETE CASCADE
);

-- --------------------------
-- Tabela: lendet
-- --------------------------
CREATE TABLE lendet (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    lenda VARCHAR(100) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- --------------------------
-- Tabela: drejtimet
-- --------------------------
CREATE TABLE drejtimet (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    drejtimi VARCHAR(100) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- --------------------------
-- Tabela: biografite
-- --------------------------
CREATE TABLE biografite (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    emri VARCHAR(100) NOT NULL,
    mbiemri VARCHAR(100) NOT NULL,
    statusi VARCHAR(50) DEFAULT NULL,
    njohuri TEXT NOT NULL,
    foto VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- --------------------------
-- Tabela: arsyeja
-- --------------------------
CREATE TABLE arsyeja (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    arsyeja VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- --------------------------
-- Tabela: aplikimet
-- --------------------------
CREATE TABLE aplikimet (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    emri VARCHAR(100) NOT NULL,
    mbiemri VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    drejtim_id INT(11) NOT NULL,
    status ENUM('ne pritje', 'refuzuar', 'aprovuar') DEFAULT 'ne pritje',
    qertifikata_lindjes VARCHAR(255) NOT NULL,
    deftesa VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (drejtim_id) REFERENCES drejtimet(id) ON DELETE CASCADE
);