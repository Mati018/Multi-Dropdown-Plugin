CREATE TABLE Types (
    TypesID INT AUTO_INCREMENT PRIMARY KEY,
    TypesName VARCHAR(50) NOT NULL
);

INSERT INTO Types (TypesID, TypesName) VALUES
(1, 'Smartphone');

CREATE TABLE Brand (
    BrandID INT AUTO_INCREMENT PRIMARY KEY,
    TypesID INT,
    BrandName VARCHAR(50) NOT NULL,
    FOREIGN KEY (TypesID) REFERENCES Types(TypesID)
);

INSERT INTO Brand (BrandID, TypesID, BrandName) VALUES
(1, 1, 'Apple');

CREATE TABLE Model (
    ModelID INT AUTO_INCREMENT PRIMARY KEY,
    BrandID INT,
    ModelName VARCHAR(50) NOT NULL,
    FOREIGN KEY (BrandID) REFERENCES Brand(BrandID)
);

INSERT INTO Model (ModelID, BrandID, ModelName) VALUES
(1, 1, 'iPhone 7'),
(2, 1, 'iPhone 7 Plus'),
(3, 1, 'iPhone 8');

CREATE TABLE Defect (
    DefectID INT AUTO_INCREMENT PRIMARY KEY,
    ModelID INT,
    DefectName VARCHAR(50) NOT NULL,
    FOREIGN KEY (ModelID) REFERENCES Model(ModelID)
);

INSERT INTO Defect (DefectID, ModelID, DefectName) VALUES
(1, 1, 'No Power'),
(2, 1, 'Battery Problem'),
(3, 1, 'Screen Broken'),
(4, 1, 'Screen Line/Dot/Blank'),
(5, 1, 'Finger/Home Button'),
(6, 1, 'Speaker Issue'),
(7, 1, 'Front Camera Issue'),
(8, 1, 'Back Camera Issue'),
(9, 1, 'NFC Issue'),
(10, 1, 'Bluetooth'),
(11, 1, 'Network Issue'),
(12, 1, 'WIFI Issue'),
(13, 1, 'Charging Issue'),
(14, 1, 'Side/Button Issue'),
(15, 1, 'Vibrator'),
(16, 1, 'Mic Issue'),
(17, 1, 'Other Issue'),
(18, 2, 'No Power'),
(19, 2, 'Battery Problem'),
(21, 2, 'Screen Broken'),
(22, 2, 'Screen Line/Dot/Blank'),
(23, 2, 'Finger/Home Button'),
(24, 2, 'Speaker Issue'),
(25, 2, 'Front Camera Issue'),
(26, 2, 'Back Camera Issue'),
(27, 2, 'NFC Issue'),
(28, 2, 'Bluetooth'),
(29, 2, 'Network Issue'),
(30, 2, 'WIFI Issue'),
(31, 2, 'Charging Issue'),
(32, 2, 'Side/Button Issue'),
(33, 2, 'Vibrator'),
(34, 2, 'Mic Issue'),
(35, 2, 'Other Issue'),
(36, 3, 'No Power'),
(37, 3, 'Battery Problem'),
(38, 3, 'Screen Broken'),
(39, 3, 'Screen Line/Dot/Blank'),
(40, 3, 'Finger/Home Button'),
(41, 3, 'Speaker Issue'),
(42, 3, 'Front Camera Issue'),
(43, 3, 'Back Camera Issue'),
(44, 3, 'NFC Issue'),
(45, 3, 'Bluetooth'),
(46, 3, 'Network Issue'),
(47, 3, 'WIFI Issue'),
(48, 3, 'Charging Issue'),
(49, 3, 'Side/Button Issue'),
(50, 3, 'Vibrator'),
(51, 3, 'Mic Issue'),
(52, 3, 'Other Issue');

CREATE TABLE ServicePrice (
    ServicePriceID INT AUTO_INCREMENT PRIMARY KEY,
    DefectID INT,
    AtCenter VARCHAR(50) NOT NULL,
    AtDoorstep DECIMAL(6, 2) NOT NULL,
    PickupDrop DECIMAL(6, 2) NOT NULL,
    FOREIGN KEY (DefectID) REFERENCES Defect(DefectID)
);

INSERT INTO ServicePrice (ServicePriceID, DefectID, AtCenter, AtDoorstep, PickupDrop) VALUES
(1, 1, 163, 228, 195),
(2, 2, 122, 170, 146),
(3, 3, 130, 181, 155),
(4, 4, 130, 181, 155),
(5, 5, 109, 153, 131),
(6, 6, 134, 188, 161),
(7, 7, 122, 170, 146),
(8, 8, 185, 258, 222),
(9, 9, 185, 258, 222),
(10, 10, 137, 192, 165),
(11, 11, 106, 148, 127),
(12, 12, 98, 137, 118),
(13, 13, 106, 148, 127),
(14, 14, 107, 150, 129),
(15, 15, 107, 150, 129),
(16, 16, 107, 150, 129),
(17, 17, 107, 150, 129),
(18, 18, 196, 274, 235),
(19, 19, 175, 245, 210),
(21, 21, 125, 175, 150),
(22, 22, 137, 192, 165),
(23, 23, 137, 192, 165),
(24, 24, 109, 153, 131),
(25, 25, 136, 190, 163),
(26, 26, 122, 170, 146),
(27, 27, 185, 258, 222),
(28, 28, 148, 208, 178),
(29, 29, 106, 148, 127),
(30, 30, 98, 137, 118),
(31, 31, 106, 148, 127),
(32, 32, 109, 153, 131),
(33, 33, 109, 153, 131),
(34, 34, 109, 153, 131),
(35, 35, 109, 153, 131),
(36, 36, 196, 274, 235),
(37, 37, 163, 228, 195),
(38, 38, 122, 170, 146),
(39, 39, 130, 181, 155),
(40, 40, 130, 181, 155),
(41, 41, 109, 153, 131),
(42, 42, 134, 188, 161),
(43, 43, 122, 170, 146),
(44, 44, 193, 270, 231),
(45, 45, 148, 208, 178),
(46, 46, 106, 148, 127),
(47, 47, 98, 137, 118),
(48, 48, 106, 148, 127),
(49, 49, 107, 150, 129),
(50, 50, 107, 150, 129),
(51, 51, 107, 150, 129),
(52, 52, 107, 150, 129);