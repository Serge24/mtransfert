<?php


// dd(truncateTextToSize("AYAWA REWU ESSENAM NEME", 40), strlen("AYAWA REWU ESSENAM NEME"));
// return truncateTextToSize("AYAWA REWU ESSENAM NEME", 40);
// return truncateTextToSize("KLOMEGA NEME AYAWA CLARISSA ESSENAM MAWUL", 30);
// return json_encode(explode(",", "È,É,Ê,Ë,Ē,Ĕ,Ė,Ę,Ě"));
// return array_mult(charToNumber("X0000340"), sequence(strlen("X0000340")));
// return nameToMRZ("TALAKI ESSOYODOU SERGE", "");
// return controlChar("22/11/2014", CONTROL_CHAR_DATE);
// return array_mult([9, 3, 0, 4, 1, 3], sequence(6));
// return htmlspecialchars(nameToMRZ("ALI, BRANDON"));
// return htmlspecialchars(nameToMRZ("al-’Abbās ‘Abdu’llāh ibn Muhammad as-Saffāh", ''));
// return htmlspecialchars(nameToMRZ("AYAWA CLAIRE ELOM - SIKA", ''));
// return getImageMetaData('file:///var/www/html/evisa_thumbnail/app/Http/Controllers/files/photo_passeport.png');

function str_replace_multiple(string $text, array $data)
{
    foreach ($data as $key => $value) {
        $text = str_replace($value, [$key], $text);
    }

    return $text;
}

function writeMRZLine1_(Fpdi $pdf, float $x, float $y, VisaRequest $visa_request)
{
    $pdf->SetFont(DOCUMENT_FONT_2, '', 13.4, '', true);
    $name_line =  nameToMRZ($visa_request->owner_surname, '') . "<<" . nameToMRZ($visa_request->owner_given_name, '');

    $line1_length = strlen($name_line);

    if ($line1_length > 34) {
        //D'abord combien de lettres y'a t-il de trop pour la ZLA?
        //La place réservée pour afficher les nom et prénoms est de 34 (39 - VCTGO)
        $overflow = $line1_length - 39;

        //On remplace les tirets (-) par espace(SPACE) dans le nom
        $surname = str_replace("-", " ", $visa_request->owner_surname);
        $given_name = str_replace("-", " ", $visa_request->owner_given_name);

        //Combien de décomposition avons-nous dans le nom?
        $primary_names = explode(" ", $surname);

        //Combien de décomposition avons-nous dans les prénoms?
        $secondary_names = explode(" ", $given_name);

        //On doit tronquer le nom pour que le nombre de caratères puisse tenir sur la ZLA

        if (count($primary_names) === 1) { // Le nom n'est pas un ensemble composé de noms
            // Il se peut que le nom seul dépasse ou équivaut à la taille réservée pour la ZLA
            if (strlen($surname) >= 32) {
                if (strlen($given_name) > 0) {
                    $surname = substr($surname, 0, 20);
                    $given_name = substr($given_name, 0, 12);
                    $name_line =  nameToMRZ($surname, '') . "<<" . nameToMRZ($given_name, '');
                } else {
                    $surname = substr($surname, 0, 34);
                    $given_name = "";
                    $name_line =  nameToMRZ($surname, '') . "<<" . nameToMRZ($given_name, '');
                }
            } else {
                $given_name = substr($given_name, 0, 12);
            }
            //On va s'attaquer aux prénoms
            if (count($secondary_names) === 1) {
                //Le bénéficiaire du visa n'a qu'un seul prénom
                $given_name = substr($given_name, 0, strlen($given_name) - $overflow);
                $name_line =  nameToMRZ($surname, '') . "<<" . nameToMRZ($given_name, '');
            } else {
                //Ici le bénéficiaire a plusieurs prénoms

                // On va vérfier pour si le la taille du dernier prénom
                // est supérieure ou au nombre de lettres de débordement
                $last_given_name = $secondary_names[count($secondary_names) - 1];
                $last_given_name_count = strlen($last_given_name);

                if ($last_given_name_count >= $overflow) {
                    // dd("ici $last_given_name_count >= $overflow ");
                    // Si c'est strictement supérieur
                    // On tronque alors le dernier prénom
                    if ($last_given_name_count > $overflow) {
                        $secondary_names[count($secondary_names) - 1] = substr($last_given_name, 0, ($last_given_name_count - $overflow) - 1);
                        $name_line =  nameToMRZ($surname, '') . "<<" . nameToMRZ(join(" ", $secondary_names), '');
                    } else {
                        $name_line = str_pad("VCTGOTAL", 39, "<");
                    }
                } else {
                    $name_line = str_pad("VCTGOTAL2 $last_given_name_count >= $overflow", 39, "<");
                    $name_line =  nameToMRZ($surname, '') . "<<" . nameToMRZ($given_name, '');

                    // Ici, la longueur du dernier prénom est égale au débordement
                    // on ne peut pas enlever tout le dernnier prénom car l'ommission
                    // du dernier prénom va automatiquement ajouter
                    // le caratère de délimitation (<) comme si les prénoms sont finis

                    // Donc nous va tronquer chaque composante du prénom
                    // jusqu'à obtenir la place

                    // Mais il faudra tenir compte de la fin de la zone MRZ
                    // aui doit être un caratère alphabétique
                    // pour indiquer qu'il y'a des données qui ont été tronquées
                    // ex VIZ (TALAKI, ESSOYODOU SERGE BIDENAM ALBERTIN)
                    // => VCTGOTALAKI<<ESSOYODOU<SERGE<BIDENAM<ALBERTI

                }
            }
        }
    }
    // $pdf->AddFont('roc_b', 'I', 'roc_b.php');
    $pdf->SetFont('roc_b', '', 10.5);

    // $pdf->AddFont('Helvetica','I','Helvetica.php');

    $visa_type = (strtoupper($visa_request->type) === "COURTOISIE" ? "C" : "<");

    $output = sprintf("%s", str_pad("V{$visa_type}TGO{$name_line}", 44, "<", STR_PAD_RIGHT));

    $pdf->Text($x, $y, ($output));
}




function truncateTextToSize(string $text, int $final_size = 0)
{
    if ($final_size <= 0) {
        $final_size = strlen($text);
    } elseif ($final_size > strlen($text)) {
        $final_size = 0;
    }

    $size_to_free = strlen($text) - $final_size;
    $text_splitted = explode(" ", $text);
    $text_splitted = array_reverse($text_splitted);

    $dictionary = [];
    $resume = [];

    $total_free = 0;

    for ($i = 0; $i < count($text_splitted); $i++) {
        $old_size = strlen($text_splitted[$i]);
        $resume[] = [$i, $text_splitted[$i], strlen($text_splitted[$i]), $size_to_free];
        if ($size_to_free >= 0) {
            if (strlen($text_splitted[$i]) > $size_to_free) {
                $dictionary[$i] = [$size_to_free, $text_splitted[$i], "oo"];
                // echo "H1:>=0 ".$text_splitted[$i]."<br/>";
                // $text_splitted[$i] = substr($text_splitted[$i], 0, $size_to_free);
                // $total_free = $size_to_free;
                // // dd($total_free, $text_splitted[$i], $i, $size_to_free);
                // echo ">0 :: "  . str_pad($size_to_free, 2, "0", STR_PAD_LEFT) . " -> " . str_pad(strlen($text_splitted[$i]), 2, "0", STR_PAD_LEFT) . " -- " . $text_splitted[$i] . " <br/>";
            } else {
                if (strlen($text_splitted[$i]) < 2) {
                    // $total_to_free = 0;
                    $dictionary[$i] = [0, $text_splitted[$i]];
                } else {
                    $total_to_free = $size_to_free -  $old_size;
                    $dictionary[$i] = [$total_to_free, $text_splitted[$i]];
                }
                // echo "H2:<=0 ".$text_splitted[$i]."<br/>";

                // $text_splitted[$i] = substr($text_splitted[$i], 0, $total_to_free);
                // $total_free = $old_size - strlen($text_splitted[$i]);
                // echo "<0 :: "  . str_pad($size_to_free, 2, "0", STR_PAD_LEFT) . " -> " . str_pad(strlen($text_splitted[$i]), 2, "0", STR_PAD_LEFT) . " -- " . $text_splitted[$i] . " <br/>";
            }
            $size_to_free -= $dictionary[$i][0];
        } else {
            echo "ICI $size_to_free" . " <br/>";
        }
    }

    dd($dictionary, $text, $text_splitted, $resume);
    // dd("jjj");

    /* for ($i = 0; $i < count($text_splitted); $i++) {
        // dd("ici", $text_splitted[$i], $size_to_free, $total_free);
        if ($size_to_free >= 0) {
            $old_size = strlen($text_splitted[$i]);
            if (strlen($text_splitted[$i]) > $size_to_free) {
                $text_splitted[$i] = substr($text_splitted[$i], 0, $size_to_free);
                $total_free = $size_to_free;
                dd($total_free, $text_splitted[$i], $i, $size_to_free);
                echo ">0 :: "  . str_pad($size_to_free, 2, "0", STR_PAD_LEFT) . " -> " . str_pad(strlen($text_splitted[$i]), 2, "0", STR_PAD_LEFT) . " -- " . $text_splitted[$i] . " <br/>";
            } else {
                $text_splitted[$i] = substr($text_splitted[$i], 0, $old_size - 1);
                $total_free = $old_size - strlen($text_splitted[$i]);
                echo "<0 :: "  . str_pad($size_to_free, 2, "0", STR_PAD_LEFT) . " -> " . str_pad(strlen($text_splitted[$i]), 2, "0", STR_PAD_LEFT) . " -- " . $text_splitted[$i] . " <br/>";
            }
            $size_to_free -= $total_free;
        } else {
            echo "ICI $size_to_free" . " <br/>";
        }

        // if ($total_free < $space) {
        //     if (strlen($text_splitted[$i]) > $current_free) {
        //         $text_splitted[$i] = substr($text_splitted[$i], 0, $current_free);
        //         $current_free = $trunc_per_word;
        //         $total_free += $current_free;
        //     } else {
        //         $text_splitted[$i] = substr($text_splitted[$i], 0, strlen($text_splitted[$i]) - 2);
        //         $current_free = $trunc_per_word + ($current_free - strlen($text_splitted[$i]));
        //         $total_free += strlen($text_splitted[$i]);
        //     }
        // }
    } */

    $text_splitted = array_reverse($text_splitted);

    dd($text, implode(" ", $text_splitted), strlen($text), $final_size);


    return join(" ", $text_splitted);
}








function truncateTextToSize(string $text, int $final_size = 0)
{

    //Tous les espaces et tirets doivent êtres uniformément remplacés par des espaces
    $text = str_replace("-", " ", $text);
    $text_no_space = str_replace(" ", "", $text);


    if ($final_size <= 0) {
        $final_size = strlen($text_no_space);
    } elseif ($final_size > strlen($text_no_space)) {
        $final_size = 0;
    }



    //On segmente la chaîne pour obtenir un tableau de chaîne
    $text_splitted = explode(" ", $text);

    $to_remove = strlen($text_no_space) - $final_size;

    //On change l'ordre des éléments de la chaîne pour que le traitement commence depuis la fin
    $text_splitted = array_reverse($text_splitted);

    $dictionary = [];
    $removed = 0;
    $remaining = 0;

    echo "<table border='1'>";
    echo "<tr>
        <td>To rem</td>
        <td>Size</td>
        <td>Removed</td>
        <td>Remaining</td>
        <td>Output</td>
    </tr>";

    for ($i = 0; $i < count($text_splitted); $i++) {
        $size = strlen($text_splitted[$i]);
        echo "<tr>";
        $removed = 0;
        if ($to_remove > 0) {
            if ($size >= $to_remove + 2) {
                $removed = $to_remove;
            } else {
                if ($size < 3) {
                    $removed = 0;
                } else {
                    echo "ici $size";
                    $removed = $size - 2;
                }
            }

            $text_splitted[$i] = substr($text_splitted[$i], 0, $size - $removed);
            echo "<td>$to_remove </td>";
            echo "<td>$size </td>";
            echo "<td>$removed </td>";
            echo "<td>$remaining </td>";
            echo "<td>" . substr($text_splitted[$i], 0, $size - $removed) . " </td>";

            $remaining  = $to_remove - $removed;
            $to_remove  = $remaining;
        }
        echo "</tr>";
    }

    echo "</table>";
    //On retourne les éléments du tableau à leur ordre initial
    $text_splitted = array_reverse($text_splitted);

    dd(strlen($text), strlen($text_no_space), $text, join(" ", $text_splitted));
}




function writeMRZLine1(Fpdi $pdf, float $x, float $y, VisaRequest $visa_request)
{
    $pdf->SetFont(DOCUMENT_FONT_2, '', 13.4, '', true);
    $name_line =  nameToMRZ($visa_request->owner_surname, '') . "<<" . nameToMRZ($visa_request->owner_given_name, '');

    $line1_length = strlen($name_line);

    $surname = str_replace("-", " ", trim($visa_request->owner_surname));
    $given_name = str_replace("-", " ", trim($visa_request->owner_given_name));

    // if (strlen($surname) >= 36) {
    //     // dd("ici-");
    //     if (strlen($given_name) > 0) {
    //         if (strlen($given_name) >= 36) {
    //             $surname = truncateTextToSize($surname, 24);
    //             $given_name = truncateTextToSize($given_name, 12);
    //         } else {
    //             $given_name = truncateTextToSize($given_name, 12);
    //             $overflow = 12 - strlen($given_name);
    //             $surname = truncateTextToSize($surname, 24 + $overflow);
    //         }
    //         $name_line =  nameToMRZ($surname, '') . "<<" . nameToMRZ($given_name, '');
    //     } else {
    //         $name_line = nameToMRZ($surname, '');
    //     }
    // }else{
    //     if (strlen($given_name) > 0) {
    //         if (strlen($given_name) >= 36) {
    //             $surname = truncateTextToSize($surname, 12);
    //             $given_name = truncateTextToSize($given_name, 24);
    //         } else {
    //             $given_name = truncateTextToSize($given_name, 24);
    //             $overflow = 12 - strlen($given_name);
    //             $surname = truncateTextToSize($surname, 12 + $overflow);
    //         }
    //         $name_line =  nameToMRZ($surname, '') . "<<" . nameToMRZ($given_name, '');
    //     } else {
    //         $name_line = nameToMRZ($surname, '');
    //     }
    //     // dd("$name_line");
    // }
    // $line = truncateTextToSize($surname, 0);

    // $pdf->AddFont('roc_b', 'I', 'roc_b.php');
    $pdf->SetFont('roc_b', '', 10);

    // $pdf->AddFont('Helvetica','I','Helvetica.php');

    $visa_type = (strtoupper($visa_request->type) === "COURTOISIE" ? "C" : "<");

    $output = sprintf("%s", str_pad("V{$visa_type}TGO{$name_line}", 44, "<", STR_PAD_RIGHT));

    $pdf->Text($x, $y, ($output));
}
