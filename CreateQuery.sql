/* Beans and Machines Database SQL Dump Query */
USE beansdb;

/* Products Table Creation */
CREATE TABLE IF NOT EXISTS Product(
    pID INT NOT NULL,
	pName VARCHAR(20) NOT NULL,
    pExp DATE,
    pStock INT NOT NULL,
    PRIMARY KEY (pID)
);

/* Users Table Creation */
CREATE TABLE IF NOT EXISTS Users(
	uID INT NOT NULL,
    uName VARCHAR(20) NOT NULL,
    uEmail VARCHAR(30) NOT NULL
);

/* Customers Table Creation */
CREATE TABLE IF NOT EXISTS Customer(
    cID INT NOT NULL,
	cName VARCHAR(20) NOT NULL,
    cEmail VARCHAR(30) NOT NULL,
    cAddress VARCHAR(50) NOT NULL,
    cPhone VARCHAR(20),
    PRIMARY KEY (cID),
    FOREIGN KEY (cName) REFERENCES Users(uName),
    FOREIGN KEY (cEmail) REFERENCES Users(uEmail)
);

/* Admins Table Creation */
CREATE TABLE IF NOT EXISTS Admins(
	aID INT NOT NULL,
    aName VARCHAR(20) NOT NULL,
    aEmail VARCHAR(30) NOT NULL,
    PRIMARY KEY (aID),
    FOREIGN KEY (aID) REFERENCES Users(uID),
	FOREIGN KEY (aName) REFERENCES Users(uName),
    FOREIGN KEY (aEmail) REFERENCES Users(uEmail)
);

/* Product Orders Table Creation */
CREATE TABLE IF NOT EXISTS ProductOrder(
	oID INT NOT NULL,
    oDeliveryDate DATE NOT NULL,
    cCode INT NOT NULL,
    pCode INT NOT NULL,
    PRIMARY KEY (oID),
    FOREIGN KEY (cID) REFERENCES Customer(cID),
    FOREIGN KEY (pID) REFERENCES Product(pID)
);

/* Login Information Table Creation */
CREATE TABLE IF NOT EXISTS LoginInfo(
	lID INT NOT NULL,
	lEmail VARCHAR(30) NOT NULL,
    lPassword VARCHAR(20) NOT NULL,
    lMember BOOLEAN,
    PRIMARY KEY (lID),
    FOREIGN KEY (lID) REFERENCES Users(uID),
    FOREIGN KEY (lEmail) REFERENCES Users(uEmail)
);

/* Payment Information Table Creation */
CREATE TABLE IF NOT EXISTS PaymentInfo(
	payID INT NOT NULL,
    payCardNum INT NOT NULL,
    payCardExp DATE NOT NULL,
    payCardCode INT NOT NULL,
    PRIMARY KEY (payID),
    FOREIGN KEY (payID) REFERENCES Login(lID)
);

/* Customer's Current Cart Table Creation */
CREATE TABLE IF NOT EXISTS CustomerCart(
	cartID INT NOT NULL,
    cID INT NOT NULL,
    PRIMARY KEY (cartID),
    FOREIGN KEY (cID) REFERENCES Customer(cID)
);

/* Inserting into Products Table */
INSERT INTO Product VALUES(
	75, "Beans", "2024-09-12", 114
);