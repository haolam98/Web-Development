<?php
        function check_length($pw)
        {
            //string must has at least 8 char above
            if (strlen($pw)<8)
            {
                return false;
            }
            return true;
        }
        function has_both_Alpha_Num($pw)
        {
            //string must has letters and numbers
            if (preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $pw))
            {
                return true;
            }
            return false;
        }
        function has_specialChar($pw)
        {
            //string must has at least 1 special character
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pw))
            {
                // one or more of the 'special characters' found in $string
                return true;
            }
            return false;
        }
        function has_NoRepeat($pw)
        {
            //string has no repeating 1st,2nd char Ex: 000000, ababababa, aaaa,232323...
            $first = $pw[0];
            $second = $pw[1];
            $len = strlen($pw);

            if ($first == $second)
            { // check possible 1111?
                for ($i =2; $i<$len; $i++)
                {
                    if ($pw[$i] != $first)
                    {return true;}
                } 
            }
            else
            { // check possible 121212?
                for ($i =2; $i<$len; $i++)
                {
                    if ($i%2==0)
                    {// i is even 
                        if ($pw[$i]!= $first)
                        {return true;}
                    }
                    else
                    {// i is odd
                        if ($pw[$i]!= $second)
                        {return true;}
                    }
                }
            }

            return false;
        }

        function is_notBadWord($pw)
        {
            $bad_dic= [
                "0123456789876543210",
                "abcdefghijklmnopqrstxyzABCDEFGHIJKLMOPQRSTWXYZ",
                "zyxtsrqponmlkjihgfedcbaZYXTSRQPONMLKJIHGFEDCBA",
                "passworddrowssap",
                "qwertyuiop[]\][poiuytrewq",
                "asdfghjkl;';lkjhgfdsa",
                "zxcvbnm,./.,mnbvcxz",
                "iloveyou",
            ];
            $check = false;
            for ($i=0; $i<8; $i++)
            {
                $string = $bad_dic[$i];
                $check = strpos($string,$pw);
                if ($check!=false)
                {
                    return false;
                }  
            }
            return true;
        }
?>
