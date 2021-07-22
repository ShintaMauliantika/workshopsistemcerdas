<?php
include "koneksidb.php";
function search($array, $key, $value)
{
    $results = array();

    if (is_array($array)) {
        if (isset($array[$key]) && $array[$key] == $value) {
            $results[] = $array;
        }

        foreach ($array as $subarray) {
            $results = array_merge($results, search($subarray, $key, $value));
        }
    }

    return $results;
}
function queryFromArray($array = []){
    global $host;
    $where = "";
    if(count($array) > 0){
        $where = " WHERE ";
        for ($i=0; $i < count($array); $i++) { 
            $where.=" td.id_data= $array[$i] ";
            if($i < count($array) - 1){
                $where.=" || ";
            }
        }
    }
    $q = "SELECT AVG(age) age, AVG(anaemia) anaemia, AVG(creatinine_phosphokinase) creatinine_phosphokinase, AVG(diabetes) diabetes, AVG(ejection_fraction) ejection_fraction, AVG(high_blood_pressure) high_blood_pressure,  AVG(platelets) platelets, AVG(serum_creatinine) serum_creatinine, AVG(serum_sodium) serum_sodium, AVG(sex) sex, AVG(smoking)smoking, AVG(time)time FROM tb_data td  $where";
    $query = mysqli_query($host, $q);
    $d = mysqli_fetch_array($query, MYSQLI_ASSOC);
    return $d;
}
function checkSameValue($array){
    // if((count(array_unique($array)) === 1)) {
    if(count($array)>1) {
        if($array[count($array)-1] == $array[count($array)-2]){
            return true;
        }else{
            return false;
        }
      } else {
        return false;
      }
}
function nilai($string){
    $output = number_format($string, 3, '.', '');
    return $output;
}
?>