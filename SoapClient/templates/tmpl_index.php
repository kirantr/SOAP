<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/style.css" rel="stylesheet">

        <title>Soap</title>
    </head>
    <body>
        <div class="col-md-offset-5 col-md-7">
            <h2>Soap</h2>
        </div>
        <div class="container center-block">
            <form method="post"  action="index.php">
                <div class="col-md-offset-4 col-md-7">
                    <p><input type="text" name="dateCbr" value="2017-08-08"> </p>
                </div>
                <div class="col-md-offset-2 col-md-8">
                    <p>
                        <input type="radio" name="db" value="mysql" checked>Soap CBR Bank
                        <span class="col-md-offset-1">  <input type="radio" name="db" value="pg">Curl CBR Bank</span>
                        <span class="col-md-offset-1">  <input type="radio" name="db" value="session">Soap Football</span>
                        <span class="col-md-offset-1">  <input type="radio" name="db" value="cookie">Curl Football</span>
                    </p>
                </div>
                <div class="col-md-offset-5 col-md-7"> 
                    <p><input type="submit" value="Send"></p><br>
                </div>
        </div>
    </form>

    <?php
    
    echo
        '<div class="col-md-offset-2 col-md-8 output">'
            . '<table>'
                . '<tr>'
                    . '<th>Currency name</th>'
                    . '<th>Nominal</th><th>Course</th>'
                    . '<th>ISO Digital code</th>'
                    . '<th>ISO Symbolic code</th>'
               . '</tr>';
    foreach ($curs as $value)
    {
        echo
                '<tr>'
                    . '<td>'.$value->Vname.'</td>'
                    . '<td>'.$value->Vnom.'</td>'
                    . '<td>'.$value->Vcurs.'</td>'
                    . '<td>'.$value->Vcode.'</td>'
                    . '<td>'.$value->VchCode.'</td>'
                . '</tr>';
    }
        echo
                '</table>' 
        . '</div>';

    ?>
</div>
</body>
</html>
