<?php

//$timeo_start = microtime(true);
//ini_set("memory_limit","4096M");

require_once("includes/Config.class.php");  # Cargar datos conexion y otras variables.
require_once('includes/DB.class.php');
require_once('includes/ConsultaDB.class.php');
require_once('mpdf/mpdf.php');


$Obras = new ConsultaDB;
$today = date("d-m-Y");



$Result32 = $Obras->ConsultaDatosInsitucionConEstados();
    if ($Result32) {
        $row333 = mysql_fetch_assoc($Result32);

        $nombreInstitucion =strtoupper( $row333['nombreInstitucion']);
        $apodoInstitucion = $row333['apodoInstitucion'];
        $clave = $row333['clave'];
        $direccion = $row333['direccion'];
        $telefono = $row333['telefono'];
        $fechaIncorporacionsecretaria = $row333['fechaIncorporacionSrecetaria'];
        $numerooficio = $row333['noOficio'];
        $registro = $row333['registro'];
        $regimen = $row333['regimen'];
        $paginainternet = $row333['paginaInternet'];
        $lemaescuela = $row333['lemaEscuela'];
    }
	
	

    $html1 = '<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo1 {font-size: 11px}
-->
</style>
</head>

<body>

<table width="785" border="0" align="center">
<tr>
    <td colspan="2" rowspan="6"><img src="assets/img/IESCH.png" width="117" height="121" /></td>
    <td colspan="8"><center><div align="center"><strong>' . $nombreInstitucion . '</strong></div></center></td>
    <td colspan="2" rowspan="6"><div align="center"><img src="assets/img/fimpes.png" width="107" height="109" /></div></td>
  </tr>
  <tr>
    <td colspan="8"><center><div align="center"><strong> </strong></div></center></td>
  </tr>
  <tr>
    <td colspan="8"><center><div align="center"><strong>INCORPORADO A LA  SECRETARIA DE EDUCACIÓN</strong></div>
    </center></td>
  </tr>
  <tr>
    <td colspan="8"><center><div align="center"><strong>OFICIO No. ' . $numerooficio . ' DE FECHA ' . $fechaIncorporacionsecretaria . '</strong></div>
    </center></td>
  </tr>
  <tr>
    <td colspan="8"><center><div align="center"><strong>RÉGIMEN: ' . $regimen . '    CLAVE: </strong><strong>' . $clave . '</strong></div>
    </center></td>
  </tr>
  <tr>
    <td colspan="8"><center><div align="center"><strong>EXCELENCIA ACADÉMICA: REG. ' . $registro . '  </strong></div>
    </center></td>
  </tr>
  <tr>
    <td width="105">&nbsp;</td>
    <td width="39">&nbsp;</td>
    <td width="73">&nbsp;</td>
    <td width="44">&nbsp;</td>
    <td width="47">&nbsp;</td>
    <td width="68">&nbsp;</td>
    <td width="33">&nbsp;</td>
    <td width="103">&nbsp;</td>
    <td width="36">&nbsp;</td>
    <td width="55">&nbsp;</td>
    <td width="53">&nbsp;</td>
    <td width="79">&nbsp;</td>
  </tr>
  <tr>
    <td width="105">&nbsp;</td>
    <td width="39">&nbsp;</td>
    <td width="73">&nbsp;</td>
    <td width="44">&nbsp;</td>
    <td width="47">&nbsp;</td>
    <td width="68">&nbsp;</td>
    <td width="33">&nbsp;</td>
    <td width="103">&nbsp;</td>
    <td width="36">&nbsp;</td>
    <td width="55">&nbsp;</td>
    <td width="53">&nbsp;</td>
    <td width="79">&nbsp;</td>
  </tr>
 
</table>

<table width="1100" border="0" align="center">
  
 <tr>
        <td width="0" bgcolor="#999999" align="center"><span class="Estilo1">No</span></td>
     <td width="0" bgcolor="#999999" align="center"><span class="Estilo1">Matrícula</span></td>
    <td width="0" bgcolor="#999999" align="center"><span class="Estilo1">Nombre</span></td>
    <td width="0" bgcolor="#999999" align="center"><span class="Estilo1">¿En que grado la formacion profesional y social recibida en Ciencias Basicas (1 y 2 año) le ha servido para su desempeño profesional?</span></td>
    <td width="0" bgcolor="#999999" align="center"><span class="Estilo1">¿En que grado la formacion profesional y social recibida en Ciencias Clinicas(3 y 4 año) le ha servido para su desempeño profesional?</span></td>
    <td width="0" bgcolor="#999999" align="center"><span class="Estilo1">En caso de haber contestado nada, poco o regular ¿en que aspecto detecta la debilidad?</span></td>   
    <td width="0" bgcolor="#999999" align="center"><span class="Estilo1">Breve comentario para mejorar el Perfil de Formacion Profesional del Egresado</span></td>
    <td width="0" bgcolor="#999999" align="center"><span class="Estilo1">Expresa alguna sugerencia o comentario para mejorar el Plan de Estudios</span></td>
    <td width="0" colspan="0"  bgcolor="#999999" align="center"><span class="Estilo1">Grado de Satisfaccion(del 1 al 10) que te deja la formacion recibida por la escuela</span></td>

    <td width="0" bgcolor="#999999" align="center"><span class="Estilo1">Si tuvieras que cursar nuevamente tus estudios,¿elegirias la misma Institucion?</span></td>

  </tr>
  
  ';





    $Obras = new ConsultaDB;
$today = date("d-m-Y");    
 $Result = $Obras->ConReporteAlumnosEncuentaMedicina($pk_alumno);
    if ($Result) {
        while($row2 = mysql_fetch_assoc($Result)){
			            $contador2 = $contador2 + 1;

					$matricula=$row2['matricula'];
					$nombre=$row2['NombreCompleto'];
					$fechaNac=$row2['FechaNacimiento'];
			        $edad = $row2['EdadAlumno'];
					$genero=$row2['DescripcionGenero'];
					$teleFijo=$row2['telefonofijo'];
					$teleCelular=$row2['telefonocelular'];
					$correo=$row2['correo'];
					$estado=$row2['DescripcionEstado'];
					$municipio=$row2['DescripcionMunicipio'];
					$colonia=$row2['DescripcionColonia'];
					$direccion=$row2['direccion'];
					$cp=$row2['cod_postal'];
					$institucionlabora=$row2['Descripcion_laboral'];
					$direccionIns=$row2['DireccionInstitucionLabora'];
					$puesto=$row2['descripcion_puestosmedicina'];
					$FuncionDesempena=$row2['FuncionesDesempenaMedicina'];
					$ingresoActual=$row2['descripcion_ingresoactual'];
					$PuestoUno=$row2['PuestoUno'];
					$PuestoDos=$row2['PuestoDos'];
					$PuestoTres=$row2['PuestoTres'];
					$instiUno=$row2['InstitucionEmpresaUno'];
					$instiDos=$row2['InstitucionEmpresaDos'];
					$instiTres=$row2['InstitucionEmpresaTres'];
    				$certificacionFecha=$row2['CertificacionProfesionalFecha'];
					$certificacionFechaOrganismo=$row2['CertificacionProfesionalOrganismo'];
					$capacitacion=$row2['CapacitacionTrabajoActual'];

					$desc_encuesta_calif_basica=$row2['Calif_basica'];
					$desc_encuesta_calif_clinica=$row2['GradoCienciasClinicas'];
					$aspec_debilidad=$row2['fk_aspectodebilidad'];
					
					$mejoraperfil=$row2['ComentarioMejorarPerfil'];
					$mejoraplan=$row2['ComentarioMejorarPlanEstudios'];
					$satisfaccion=$row2['descripcion_gradosatisfaccion'];
					
					$institucionElegir=$row2['ElegirMismaInstitucion'];
					
					if($institucionElegir=='1'){
		$institucionElegir='Si';
		} elseif($institucionElegir=='2'){
			$institucionElegir="No";}
			else{$institucionElegir="";}
					
					
		if($desc_encuesta_calif_clinica=='1'){
		$desc_encuesta_calif_clinica='Nada';
		} elseif($desc_encuesta_calif_clinica=='2'){
			$desc_encuesta_calif_clinica="Poco";
			}elseif($desc_encuesta_calif_clinica=='3'){
			$desc_encuesta_calif_clinica="Regular";
			}elseif($desc_encuesta_calif_clinica=='4'){
			$desc_encuesta_calif_clinica="Mucho";
			}else{$desc_encuesta_calif_clinica;}
						
					
		if($aspec_debilidad=='1'){
		$aspec_debilidad='Directivo';
		} elseif($aspec_debilidad=='2'){
			$aspec_debilidad="Docente";
			}elseif($aspec_debilidad=='3'){
			$aspec_debilidad="Metodologia Enseñanza";
			}elseif($aspec_debilidad=='4'){
			$aspec_debilidad="Programas Academicos";
			}elseif($aspec_debilidad=='5'){
			$aspec_debilidad="Plan de Estudios";
			}elseif($aspec_debilidad=='6'){
			$aspec_debilidad="Metodo de Evaluacion";
			}elseif($aspec_debilidad=='7'){
			$aspec_debilidad="Aulas y Equipo Didactico";
			}elseif($aspec_debilidad=='8'){
			$aspec_debilidad="Otros";
			}elseif($aspec_debilidad=='9'){
			$aspec_debilidad="";
			}else{$aspec_debilidad;}
			
			

					if($edad=="00/00/0000"){
						$edad="";
						}else{
							$edad;
							
							}
							
	if($municipio=='Tuxtla Gutierrez'){
		$municipio="T.G.Z";
		} elseif($municipio=='San Cristobal de las Casas'){
			$municipio="S.C.C";
			}else{$municipio;}
			
			if($row2['PerteneceOrganizacionSocial']=='1'){
				$organizaSocial=$row2['PerteneceOrganizacionSocialSi'];
				}else{$organizaSocial='';
					}
					
			if($row2['CertificacionProfesional']=='1'){
				$certificacionFecha1='Fecha:';
				$certificacionFechaOrganismo1='Organismo:';
				}else{
					$certificacionFecha1='';
					$certificacionFechaOrganismo1='';
    				$certificacionFecha='';

				}
				
				if($row2['CapacitacionTrabajoActual']=='1'){
					$capacitacion='Si';
					}else{$capacitacion='No';}		
					
					
                      $html2.= "<tr>
		<td width='0' style=''><span class='Estilo1'>$contador2</span></td>       
		<td width='0'  style=''><span class='Estilo1'>$matricula</span></td>       
		<td width='0' style=''><span class='Estilo1'>$nombre</span></td>       
		<td width='0' style=''><span class='Estilo1'><center>$desc_encuesta_calif_basica</center></span></td>       
		<td width='0' style=''><span class='Estilo1'><center>$desc_encuesta_calif_clinica</center></span></td>       
		<td width='0' style=''><span class='Estilo1'><center>$aspec_debilidad</center></span></td>       
		<td width='0' style=''><span class='Estilo1'>$mejoraperfil</span></td>       
		<td width='0' style=''><span class='Estilo1'>$mejoraplan</span></td>       
		<td width='0' colspan='0' style=''><span class='Estilo1'><center>$satisfaccion</center></span></td>

		<td width='0' colspan='0' style=''><span class='Estilo1'><center>$institucionElegir</center><span></td>


                                    </tr>";

        }
      mysql_free_result($Result);
         $html3.= "</table></div>
		 </body>
</html>";
    $res = $html1 . $html2 . $html3;

}


    

//echo $res;





$mpdf=new mPDF('','Legal','',''); 
$mpdf->AddPage('L','','','','','','','','','','');
$mpdf->SetFooter(''.$generacionLista.'   | Fuente: Departamento de Egresados | Pagina {PAGENO}');
$mpdf->WriteHTML($res);
$mpdf->Output("ReporteMedicina". $today.'.pdf', 'I');

?> 