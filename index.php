
<?php
   include 'guid_request_step_1.php';
   echo $response_body;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>HTML form/post example</title>
    </head>
    <body dir=rtl>

        <form id="numbers-form" action="response_step_2.php" method="post" enctype="multipart/form-data" accept-charset="UTF-8">

            <h1>
                התחברות למערכת של - <br> מיטב דש בית השקעות
            </h1>
            <h1>
                כניסה<br> לחשבון שלי
            </h1>
            <h2>לצפייה בנתונים<br> יש להזין את הפרטים הבאים : </h2>

            <label for="c_id">נא למלא מס ת"ז מלא בעל 9 ספרות</label><br />
            <input type="tel" name="c_id" required="required"/>      
            <br /><br />

            <label for="phone">נא למלא את מספר הנייד</label><br />
            <input type="tel" name="phone" placeholder="*מספר טלפון" required="required"/>  
            
            <input type="hidden" name="guid" value=<?php echo $response_body; ?> />
            
            <br /><br />

            <input type="submit" name="submit" value="המשך" />

        </form>

    </body>
</html>