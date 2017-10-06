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
                        <input type="radio" name="in" value="soap_cbr" checked>Soap CBR Bank
                        <span class="col-md-offset-1">  <input type="radio" name="in" value="curl_cbr">Curl CBR Bank</span>
                        <span class="col-md-offset-1">  <input type="radio" name="in" value="soap_sport">Soap Football</span>
                        <span class="col-md-offset-1">  <input type="radio" name="in" value="curl_sport">Curl Football</span>
                    </p>
                </div>
                <div class="col-md-offset-5 col-md-7"> 
                    <p><input type="submit" value="Send"></p><br>
                </div>
        </div>
    </form>

<?php
    $in = $_POST['in'];
    if($in == 'curl_sport' || $in == 'soap_sport')
    {
        echo '<div class="col-md-offset-2 col-md-8 output">' .
                '<ul>';
            foreach ($sport as $value)
            {
                 echo '<li>' . $value . '</li>';
            }
        echo    '</ul>' 
            .'</div>';
    }
    
    $dateCbr = $_POST['dateCbr'];
    if(isset($dateCbr) &&  $dateCbr!== '')
    {
        
        if($in == 'curl_cbr' || $in == 'soap_cbr')
         {
             echo
                '<div class="col-md-offset-2 col-md-8 output">'
                . '<table>'
                    . '<tr>'
                        . '<th>Currency name</th>'
                        . '<th>Nominal</th>'
                        . '<th>Course</th>'
                        . '<th>ISO Dig code</th>'
                        . '<th>ISO Symb code</th>'
                    . '</tr>';
         foreach ($curs as $value)
                {
                    echo
                '<tr>'
                    . '<td>' . $value->Vname . '</td>'
                    . '<td>' . $value->Vnom . '</td>'
                    . '<td>' . $value->Vcurs . '</td>'
                    . '<td>' . $value->Vcode . '</td>'
                    . '<td>' . $value->VchCode . '</td>'
                . '</tr>';
                 }
                echo
            '</table>'
         . '</div>';
         }
    }
    elseif($dateCbr == '')
    {
    echo '<div class="col-md-offset-4 col-md-4 output">'
        . 'Enter data YY-MM-DD'
        . '</div>';
    }
    ?>
</div>
</body>
</html>
