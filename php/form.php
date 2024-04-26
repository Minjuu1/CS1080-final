<?php
include 'top.php';

$dataIsGood = false;
$errorMessage = '';
$message = '';

$name = '';
$email = '';
$year = '';
$item1 = 0;
$item2 = 0;
$item3 = 0;
$item4 = 0;
$item5 = 0;
$item6 = 0;
$item7 = 0;
$item8 = 0;
$item9 = 0;
$donation = '';
$payment = '';
$cardName = '';
$cardNum = '';
$expDate = '';
$cvv = '';
$deliverMethod = '';
$address = '';
$futureContact = '';
$comment = '';


function getData($field) {
    if (!isset($_POST[$field])) {
        $data = "";
    } else {
        $data = trim($_POST[$field]);
        $data = htmlspecialchars($data);
    }
    return $data;
}

function verifyAlphaNum($testString) {
    return (preg_match("/^([[:alnum:]]|-|\.| |\'|&|;|#)+$/", $testString));
}


function verifyNum($testString) {
    return (preg_match("/^(0|[1-9]\d*)$/", $testString));
}


if($_SERVER["REQUEST_METHOD"] == 'POST'){

    print PHP_EOL . '<!-- Starting Sanitization -->' . PHP_EOL;


    $name = getData('txtName');
    $email = getData('txtEmail');
    $year = getData('radYear');
    $item1 = (int) getData('chkItem1');
    $item2 = (int) getData('chkItem2');
    $item3 = (int) getData('chkItem3');
    $item4 = (int) getData('chkItem4');
    $item5 = (int) getData('chkItem5');
    $item6 = (int) getData('chkItem6');
    $item7 = (int) getData('chkItem7');
    $item8 = (int) getData('chkItem8');
    $item9 = (int) getData('chkItem9');
    $donation = getData('numDonation');
    $payment = getData('radPayment');
    $cardName = getData('txtCardName');
    $cardNum = getData('txtCardNum');
    $expDate = getData('dateExp');
    $cvv = getData('numCVV');
    $deliverMethod = getData('radDeliverMethod');
    $address = getData('txtAddress');
    $futureContact = getData('radFutureContact');
    $comment = getData('txtComment');

    print PHP_EOL . '<!-- Starting Validation -->' . PHP_EOL;
        
        $dataIsGood = true;

        if($name == ''){
            $errorMessage .= '<p class="mistake">Please type in your name.</p>';
            $dataIsGood = false;
        } elseif(!verifyAlphaNum($name)){
            $errorMessage .= '<p class="mistake">Your name contains invalid characters, please just use letters.</p>';
            $dataIsGood = false;
        }

        if($email == ''){
            $errorMessage .= '<p class="mistake">Please type in your email address.</p>';
            $dataIsGood = false;
        } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errorMessage .= '<p class="mistake">Your email address contains invalid characters.</p>';
            $dataIsGood = false;
        }
        
        if($year != "Freshman" AND $year != "Sophomore" AND $year != "Junior" AND $year != "Senior" AND $year != "Graduated" AND $year != "Faculty" AND $year != "Etc"){
            $errorMessage .= '<p class="mistake">Please check your year.</p>';
            $dataIsGood = false;
        }
    

        $totalChecked = 0;

        if($item1 != 1) $item1 = 0;
        $totalChecked += $item1;
        if($item2 != 1) $item2 = 0;
        $totalChecked += $item2;
        if($item3 != 1) $item3 = 0;
        $totalChecked += $item3;
        if($item4 != 1) $item4 = 0;
        $totalChecked += $item4;
        if($item5 != 1) $item5 = 0;
        $totalChecked += $item5;
        if($item6 != 1) $item6 = 0;
        $totalChecked += $item6;
        if($item7 != 1) $item7 = 0;
        $totalChecked += $item7;
        if($item8 != 1) $item8 = 0;
        $totalChecked += $item8;
        if($item9 != 1) $item9 = 0;
        $totalChecked += $item9;
        
        
        if($totalChecked == 0){
            $errorMessage .= '<p class="mistake">Please choose at least one item that you want to buy.';
            $dataIsGood = false;
        } elseif($totalChecked > 3){
            $errorMessage .= '<p class="mistake">You can choose up to 3 items. Please choose 3 or less.';
            $dataIsGood = false;
        }

        if($donation == ''){
            $errorMessage .= '<p class="mistake">Please enter the amount of donation.</p>';
            $dataIsGood = false;
        }
        
        if($donation < 2){
                $errorMessage .= '<p class="mistake">Minimum price for donation is $2. Please enter an amount of at least $2.)</p>';
                $dataIsGood = false;
        }
    
        
        if($payment != "Cash" AND $payment != "Card"){
            $errorMessage .= '<p class="mistake">Please check your payment method.</p>';
            $dataIsGood = false;
        }
        

        if($payment == "Card"){
            if($cardName == ''){
                $errorMessage .= '<p class="mistake">Please enter the name of card holder.</p>';
                $dataIsGood = false;
            }
            elseif(!verifyAlphaNum($cardName)){
                $errorMessage .= '<p class="mistake">Your name contains invalid characters, please just use letters.</p>';
                $dataIsGood = false;
            }
        }
        
        if($payment == "Card"){
            if($cardNum == ''){
                $errorMessage .= '<p class="mistake">Please enter the card number.</p>';
                $dataIsGood = false;
            }
            elseif(!verifyNum($cardNum)){
                $errorMessage .= '<p class="mistake">Your card number contains invalid characters, please just use numbers.</p>';
                $dataIsGood = false;
            }
        }
        
        if($payment == "Card"){
            if($expDate == ''){
                $errorMessage .= '<p class="mistake">Please enter the expiration date.</p>';
                $dataIsGood = false;
            }
        }
       
        if($payment == "Card"){
            if($cvv == ''){
                $errorMessage .= '<p class="mistake">Please enter CVV numberon the back of your card.</p>';
                $dataIsGood = false;
            }
            elseif(!verifyNum($cvv)){
                $errorMessage .= '<p class="mistake">Your CVV number contains invalid characters, please just use numbers.</p>';
                $dataIsGood = false;
            }
        }

        if($deliverMethod != "Pickup" AND $deliverMethod != "Shipped" AND $deliverMethod != "Dorm"){
            $errorMessage .= '<p class="mistake">Please check a delivery method.</p>';
            $dataIsGood = false;
        }

        if($deliverMethod == "Shipped" OR $deliverMethod == "Dorm"){
            if($address == ''){
                $errorMessage .= '<p class="mistake">Please type in your address.</p>';
                $dataIsGood = false;
            }
        }
        if ($address != '') {
            if(!verifyAlphaNum($address)){
                $errorMessage .= '<p class="mistake">Your address contains invalid characters, please just use letters.</p>';
                $dataIsGood = false;
            }
        }
        

        if($futureContact != "Yes" AND $futureContact != "No"){
            $errorMessage .= '<p class="mistake">If you want to know about our progress, please check "Yes".</p>';
            $dataIsGood = false;
        }
        if ($comment != '') {
            if(!verifyAlphaNum($comment)){
                $errorMessage .= '<p class="mistake">Your comment contains invalid characters, please just use letters.</p>';
                $dataIsGood = false;
            }
        }
        
    
    print PHP_EOL . '<!-- Starting Saving -->' . PHP_EOL;
        if($dataIsGood) {
            $sql = 'INSERT INTO tblShop 
            (fldName, fldEmail, fldYear, fldItem1, fldItem2, fldItem3, fldItem4,fldItem5, fldItem6, fldItem7, fldItem8, fldItem9, fldDonation, fldPayment, fldCardName, fldCardNum, fldExpDate, fldCVV, fldDeliverMethod,
            fldAddress, fldFutureContact, fldComment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
            $data = array($name, $email, $year, $item1, $item2, $item3, $item4, $item5, $item6, $item7, $item8, $item9, $donation, $payment, $cardName, $cardNum, $expDate, $cvv, $deliverMethod, $address, $futureContact, $comment);
    
            try {
                $statement = $pdo->prepare($sql);
                if ($statement->execute($data)){
                    $message = '<h3>Thank You!</h3>';
                    $message .= '<p>Your order was successfully placed.</p>';

                    $to = $email;
                    $from = 'College Curios <collegecurios@gmail.com>';
                    $subject = 'Your order was confirmed. Thank you for shopping!';

                    $headers = "MIME-Version: 1.0\r\n";
                    $headers .= "Content-type: text/html; charset=utf-8\r\n";
                    $headers .= "From: " . $from . "\r\n";
                    
                    $mailMessage = '<h1>Hello Customer!</h1>';
                    $mailMessage .= '<p>Thank you for taking the time ';
                    $mailMessage .= 'to shop with us and help your ';
                    $mailMessage .= 'community!</p>';
                    $mailMessage .= '<p><em>Team College Curios</em></p>';

                    $mailSent = mail($to, $subject, $mailMessage, $headers);

                    if($mailSent) {
                        print "<p>Your order confirmation has been emailed to you for your records.</p>";
                    }

                } else {
                    $message .= '<p>Record was NOT successfully saved.</p>';
                }
            } catch(PDOException $e) {
                $message .= '<p>Your order could not be confirmed, please try again later.</p>';
            }
        } 
}
  
?>

<main class="form">
    <h1>Place an Order</h1>        
    <section>
        <h2>Records</h2>
        <p>Here are your order records.</p>
        <?php
        print $message;
        print $errorMessage;
        /*
        print '<p>Post Array:</p><pre>';
        print_r($_POST);
        print'</pre>';
        */
        ?>
    </section>
    <section>
        <h2>Details</h2>
        <p>Please enter all information accurately</p>
        <form action="#" method="POST" class="form_shop">
    
            <fieldset class="box1">
                <legend>Personal Information</legend>
                <p>
                    <label for="txtName">Name:</label>
                    <input type="text" value="<?php print($name); ?>"
                    name= "txtName" id="txtName">        
                </p>
                <p>
                    <label for="txtEmail">Email:</label>
                    <input type="email" value="<?php print($email); ?>" name="txtEmail" id="txtEmail" placeholder="ex) name@uvm.edu">
                </p>
                
                <p>Which year are you in?</p>
                <p>
                    <input type="radio" name="radYear" value="Freshman" id="radYearFreshman"
                    <?php if($year == "Freshman") print 'checked'; ?> required>
                    <label for="radYearFreshman">Freshman</label>
                </p>
                <p>
                    <input type="radio" name="radYear" value="Sophomore" id="radYearSophomore"
                    <?php if($year == "Sophomore") print 'checked'; ?> required>
                    <label for="radYearSophomore">Sophomore</label>
                </p>
                <p>
                    <input type="radio" name="radYear" value="Junior" id="radYearJunior"
                    <?php if($year == "Junior") print 'checked'; ?> required>
                    <label for="radYearJunior">Junior</label>
                </p>
                <p>
                    <input type="radio" name="radYear" value="Senior" id="radYearSenior"
                    <?php if($year == "Senior") print 'checked'; ?> required>
                    <label for="radYearSenior">Senior</label>
                </p>
                <p>
                    <input type="radio" name="radYear" value="Graduated" id="radYearGraduated"
                    <?php if($year == "Graduated") print 'checked'; ?> required>
                    <label for="radYearGraduated">Graduated</label>
                </p>
                <p>
                    <input type="radio" name="radYear" value="Faculty" id="radYearFaculty"
                    <?php if($year == "Faculty") print 'checked'; ?> required>
                    <label for="radYearFaculty">Faculty</label>
                </p>
                <p>
                    <input type="radio" name="radYear" value="Etc" id="radYearEtc"
                    <?php if($year == "Etc") print 'checked'; ?> required>
                    <label for="radYearEtc">Etc</label>
                </p>
            </fieldset>
            <fieldset class="box2">
                <legend>Shop</legend>
                <p>
                    <input type="checkbox" id="item1" name="chkItem1" value="1" <?php if($item1) print 'checked'; ?>>
                    <label for="item1">Branded Pens</label>
                </p>
                <p>
                    <input type="checkbox" id="item2" name="chkItem2" value="1" <?php if($item2) print 'checked'; ?>>
                    <label for="item2">Covid Tests</label>
                </p>
                <p>
                    <input type="checkbox" id="item3" name="chkItem3" value="1" <?php if($item3) print 'checked'; ?>>
                    <label for="item3">Honors College Journal</label>
                </p>
                <p>
                    <input type="checkbox" id="item4" name="chkItem4" value="1" <?php if($item4) print 'checked'; ?>>
                    <label for="item4">Symbolic Slate</label>
                </p>
                <p>
                    <input type="checkbox" id="item5" name="chkItem5" value="1" <?php if($item5) print 'checked'; ?>>
                    <label for="item5">Book Festival Shirt</label>
                </p>
                <p>
                    <input type="checkbox" id="item6" name="chkItem6" value="1" <?php if($item6) print 'checked'; ?>>
                    <label for="item6">Vermont Beanie</label>
                </p>
                <p>
                    <input type="checkbox" id="item7" name="chkItem7" value="1" <?php if($item7) print 'checked'; ?>>
                    <label for="item7">UVM Pennant</label>
                </p>
                <p>
                    <input type="checkbox" id="item8" name="chkItem8" value="1" <?php if($item8) print 'checked'; ?>>
                    <label for="item8">Rubber Duck</label>
                </p>
                <p>
                    <input type="checkbox" id="item9" name="chkItem9" value="1" <?php if($item9) print 'checked'; ?>>
                    <label for="item9">Tape Measure</label>
                </p>
            </fieldset>
            <fieldset class="box3">
                <legend>Donation</legend>
                <p>
                    <label for="numDonation">How much would you like to donate for these items?</label> 
                    <input type="number" min="0" step="1" name= "numDonation" id="numDonation" value="<?php print($donation); ?>">        
                </p>
                <p>
                    <input type="radio" name="radPayment" value="Cash" id="radPaymentCash"
                    <?php if($payment == "Cash") print 'checked'; ?> required>
                    <label for="radPaymentCash">Cash</label>
                </p>
                <p>
                    <input type="radio" name="radPayment" value="Card" id="radPaymentCard"
                    <?php if($payment == "Card") print 'checked'; ?> required>
                    <label for="radPaymentCard">Card</label>
                </p>
                <p>If you selected 'Card', please input your card information. </p>
                <p>
                    <label for="txtCardName">Card Holder Name: </label>
                    <input type="text" value="<?php print($cardName); ?>"
                    name= "txtCardName" id="txtCardName">        
                </p>
                <p>
                    <label for="txtCardNum">Card Number: </label>
                    <input type="text" value="<?php print($cardNum); ?>"
                    name= "txtCardNum" id="txtCardNum">        
                </p>
                <p>
                    <label for="dateExp">Expiration Date: </label>
                    <input type="date" value="<?php print($expDate); ?>"
                    name= "dateExp" id="dateExp">        
                </p>
                <p>
                    <label for="numCVV">CVV: </label>
                    <input type="number" value="<?php print($cvv); ?>"
                    name= "numCVV" id="numCVV">        
                </p>
            </fieldset>
            <fieldset class="box4">
                <legend>Deliver Method</legend>
                <p>
                    <input type="radio" name="radDeliverMethod" value="Pickup" id="radDeliverMethodPickup"
                    <?php if($deliverMethod == "Pickup") print 'checked'; ?> required>
                    <label for="radDeliverMethodPickup">Pick up</label>
                </p>
                <p>
                    <input type="radio" name="radDeliverMethod" value="Shipped" id="radDeliverMethodShipped"
                    <?php if($deliverMethod == "Shipped") print 'checked'; ?> required>
                    <label for="radDeliverMethodShipped">Shipped</label>
                </p>
                <p>
                    <input type="radio" name="radDeliverMethod" value="Dorm" id="radDeliverMethodDorm"
                    <?php if($deliverMethod == "Dorm") print 'checked'; ?> required>
                    <label for="radDeliverMethodDorm">Placed on your bed by our elves</label>
                </p>
                <p>
                    <label for="txtAddress">If you select 'Shipped' or 'Placed on your bed by our elves', please write your address </label>
                    <input type="text" value="<?php print($address); ?>"
                    name= "txtAddress" id="txtAddress" placeholder="ex) Harris 000">        
                </p>
            </fieldset>
            <fieldset class="box5">
                <legend>Future Contact</legend>
                <p>
                    <input type="radio" name="radFutureContact" value="Yes" id="radFutureContactYes"
                    <?php if($futureContact == "Yes") print 'checked'; ?> required>
                    <label for="radFutureContactYes">Yes</label>
                </p>
                <p>
                    <input type="radio" name="radFutureContact" value="No" id="radFutureContactNo"
                    <?php if($futureContact == "No") print 'checked'; ?> required>
                    <label for="radFutureContactNo">No</label>
                </p>
                <p>
                    <label>Do you have any other comments for the Team at College Curios to consider?</label>
                    <textarea name="txtComment" rows="3" cols="40"></textarea>
                </p>
            </fieldset>

            <input type="submit" name="btnSubmit" value="Submit">
        </form>
    </section>    
</main>

<?php
include 'footer.php';
?>
        
</body>
</html>