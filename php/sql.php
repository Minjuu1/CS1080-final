<?php
include 'top.php';
?>

<main>

    <h1>SQL statements</h1>
    <h2>Creat table for shop</h2>
    <pre>
        CREATE TABLE tblShop(
            pmkShopID INT PRIMARY KEY AUTO_INCREMENT,
            fldName VARCHAR(50),
            fldEmail VARCHAR(50) NOT NULL,
            fldYear VARCHAR(10) NOT NULL,
            fldItem1 TINYINT(1) DEFAULT 0,
            fldItem2 TINYINT(1) DEFAULT 0,
            fldItem3 TINYINT(1) DEFAULT 0,
            fldItem4 TINYINT(1) DEFAULT 0,
            fldItem5 TINYINT(1) DEFAULT 0,
            fldItem6 TINYINT(1) DEFAULT 0,
            fldItem7 TINYINT(1) DEFAULT 0,
            fldItem8 TINYINT(1) DEFAULT 0,
            fldItem9 TINYINT(1) DEFAULT 0,
            fldDonation INT NOT NULL,
            fldPayment VARCHAR(10) DEFAULT NULL,
            fldCardName VARCHAR(50),
            fldCardNum VARCHAR(20)
            fldExpDate DATE,
            fldCVV VARCHAR(5),
            fldDeliverMethod VARCHAR(10) NOT NULL,
            fldAddress VARCHAR(100),
            fldFutureContact VARCHAR(10),
            fldComment TEXT DEFAULT NULL
        );
    </pre>
    <h2>Insert the data into the Shop table</h2>
    <pre>
        INSERT INTO tblShop 
                (fldName, fldEmail, fldYear, fldItem1, fldItem2, fldItem3, fldItem4,fldItem5, fldItem6, fldItem7, fldItem8, fldItem9, fldDonation, fldPayment, fldCardName, fldCardNum, fldExpDate, fldCVV, fldDeliverMethod,
                fldAddress, fldFutureContact, fldComment) VALUES ('Minju Yoo', 'myoo@uvm.edu', 'Senior', 1, 0, 0, 0, 0, 0, 0, 0 ,0, 5, 'Card', 'Minju Yoo', '00000000000', '2023-12-12', '000', 'Dorm', 'Harris 313', 'Yes','');
    </pre>

<h2>Creat table for the data of Waste</h2>
    <pre>
        CREATE TABLE tblWaste (
            pmkWasteId INT AUTO_INCREMENT PRIMARY KEY,
            fldMaterial VARCHAR(40),
            fldProduction VARCHAR(40),
            fldDecomposition VARCHAR(40),
            fldCarbon VARCHAR(40),
            fldCost VARCHAR(40)
        );
    </pre>
<h2>Insert data into the Waste table</h2>
    <pre>
        INSERT INTO tblWaste
            (fldMaterial, fldProduction, fldDecomposition, fldCarbon, fldCost)
        VALUES
            ('Plastic','40 million tons','1,000 years','500 million tons','$370 billion'),
            ('Glass','10 million tons','4,000 years','95 million tons','$31 billion'),
            ('Textiles','16.9 million tons','40 years','1.2 billion tons','$30 billion'),
            ('Aluminum','383 million tons','500 years','1 billion tons','$800 million'),
            ('Vinyl','0.95 million tons','1,000 years','18 million tons','$1.2 billion');
    </pre>

<h2>Display the data of the Waste table</h2>
    <pre>
        SELECT fldMaterial, fldProduction, fldDecomposition, fldCarbon, fldCost FROM tblWaste;
    </pre>

</main>
<?php include 'footer.php'; ?>
</body>
</html>