<!DOCTYPE html>
<html>
    <head>
    </head>

    <body>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Roman Number: <input type="text" name="roman" required>
            <br><br>
            <input type="submit" name="submit" value="Submit">
        </form>
        
        <?php
        function value($r)
        {
            if ($r == 'I')
                return 1;
            if ($r == 'V')
                return 5;
            if ($r == 'X')
                return 10;
            if ($r == 'L')
                return 50;
            if ($r == 'C')
                return 100;
            if ($r == 'D')
                return 500;
            if ($r == 'M')
                return 1000;

            return -1;
        }

        function romanToDecimal(&$str)
        {
            $res = 0;

            for ($i = 0; $i < strlen($str); $i++)
            {
                $s1 = value($str[$i]);

                if ($i+1 < strlen($str))
                {
                    $s2 = value($str[$i + 1]);

                    if ($s1 >= $s2)
                    {
                        $res = $res + $s1;
                    }
                    else
                    {
                        $res = $res + $s2 - $s1;

                        $i++;
                    }
                }
                else
                {
                    $res = $res + $s1;
                    $i++;
                }
            }
            return $res;
        }

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $rom = $_POST["roman"];
            $romup = strtoupper($rom);
            echo romanToDecimal($romup);
        }
        
        ?>

    </body>
</html>