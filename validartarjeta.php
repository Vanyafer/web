public static function validateFormatCreditCard($cc)
{
    $pattern_1 ='/^((4[0-9]{12})|(4[0-9]{15})|(5[1-5][0-9]{14})|(3[47][0-9]{13})|(6011[0-9]{12}))$/';
    $pattern_2 = '/^((30[0-5][0-9]{11})|(3[68][0-9]{12})|(3[0-9]{15})|(2123[0-9]{12})|(1800[0-9]{12}))$/';
 
    if (preg_match($pattern_1, $cc)) {
            return true;
        } else if (preg_match($pattern_2, $cc)) {
            return true;
        } else {
            return false;
        }
}

public static function sumDigits($digit)
{
        $total = 0;
        for ($x = 0; $x < strlen($digit); $x++) { $total += $digit[$x]; }
        return (int) $total;
}

public static function checkDigit($sum_digit)
{
    return ($sum_digit % 10 == 0) ? 0 : 10 - ($sum_digit % 10);
}

public static function calculateLuhn($credit_card)
{
    // largo del string
    $length = strlen($credit_card);
    // tarjeta de credito sin el digito de chequeo
    $credit_card_user = substr($credit_card, 0, $length - 1);
 
    $values = []; // array temporal
 
    // duplico los numeros en indices pares
    for ($i=$length - 2; $i >= 0; $i--) {
        if ($i % 2 == 0) {
            // sumo cada uno de los digitos devueltos al duplicar
            array_push($values, self::sumDigits((string) ($credit_card_user[$i] * 2)));
        } else {
            array_push($values, (int) $credit_card_user[$i]);
        }
    }
 
    return (self::checkDigit(array_sum($values)) == $credit_card[$length - 1]);
}
 


<?php  
                $credit_card_user = $('#CC').val();
                $formatovalido = ValidateCreditCard::validateFormatCreditCard($credit_card_user);
                $validezLuhn = ValidateCreditCard::calculateLuhn($credit_card_user);
                ?>


                if <?php  
                    if ($validezLuhn || $formatovalido == false){
                        
                        return false;
                    }
                    ?>
                    { alert("Tarjeta de crédito inválida"); 
                }