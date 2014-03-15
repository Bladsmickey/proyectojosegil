<?php
require_once('conexion.php');

$sql = " SELECT * FROM estudiante,representante,grupo_fam,secciones,estu_va,estu_hab,estu_enfer,estu_div,ma_con_es where estudiante.ced_e=representante.ci_e and estudiante.ced_e=grupo_fam.ced_e and estudiante.ced_e=secciones.ce_e and estudiante.ced_e=estu_va.ced_e and estudiante.ced_e=estu_hab.ced_e and estudiante.ced_e=estu_enfer.ced_e and estudiante.ced_e=estu_div.ced_e and estudiante.ced_e=ma_con_es.id_alum";
 
$r = mysql_query( $sql ) or die( mysql_error($conn));
$return = '';
if( mysql_num_rows($r)>0){
    $return .= '<table border=1>';
    $cols = 0;
    while($rs = mysql_fetch_row($r)){
        $return .= '<tr>';
        if($cols==0){
            $cols = sizeof($rs);
            $cols_names = array();
            for($i=0; $i<$cols; $i++){
                $col_name = mysql_field_name($r,$i);
                $return .= '<th>'.htmlspecialchars($col_name).'</th>';
                $cols_names[$i] = $col_name;
            }
            $return .= '</tr><tr>';
        }
        for($i=0; $i<$cols; $i++){
            #En esta iteración podes manejar de manera personalizada datos, por ejemplo:
            if($cols_names[$i] == 'fechaAlta'){ #Fromateo el registro en formato Timestamp
                $return .= '<td>'.htmlspecialchars(date('d/m/Y H:i:s',$rs[$i])).'</td>';
            }else if($cols_names[$i] == 'activo'){ #Estado lógico del registro, en vez de 1 o 0 le muestro Si o No.
                $return .= '<td>'.htmlspecialchars( $rs[$i]==1? 'SI':'NO' ).'</td>';
            }else{
                $return .= '<td>'.htmlspecialchars($rs[$i]).'</td>';
            }
        }
        $return .= '</tr>';
    }
    $return .= '</table>';
    mysql_free_result($r);
}
#Cambiando el content-type más las <table> se pueden exportar formatos como csv
header("Content-type: application/vnd-ms-excel; charset=UTF-8");
header("Content-Disposition: attachment; filename=JGF_".date('d-m-Y').".xls");
echo $return;