<?

ini_set('memory_limit', '64M');
set_time_limit(0);
$total=0;
?>
<table border="1">
<tr>
<th>Ingredientes</th>
<th>Recetas</th>
</tr>

<?
	$cont=0;
	permute('CCCDDDFFF',0,9);
?>
	<tr>
		<td>3 Confites, 3 Dulces y 3 Frutas</td>
		<td><?=$cont?></td>
	</tr>
<?
	$total+=$cont;
	$cont=0;
	permute('CCCDDDFFM',0,9);
?>
	<tr>
		<td>3 Confites, 3 Dulces, 2 Frutas y 1 Masita</td>
		<td><?=$cont?></td>
	</tr>
<?
	$total+=$cont;
?>
	<tr>
		<td>3 Confites, 2 Dulces, 3 Frutas y 1 Masita</td>
		<td><?=$cont?></td>
	</tr>
<?
	$total+=$cont;
	?>
	<tr>
		<td>2 Confites, 3 Dulces, 3 Frutas y 1 Masita</td>
		<td><?=$cont?></td>
	</tr>
<?
	$total+=$cont;
?>
	<tr>
		<td>TOTAL</td>
		<td><?=$total?></td>
	</tr>
</table>
<?

// función recursiva que calcula las combinaciones de un string determinado.
function permute($str,$i,$n) {
	global $recetas;
	global $cont;
	if ($i == $n){ //hay receta pero todavía no se si me sirve
		if( //a ver si esa receta me sirve:
			//FILAS con 3 ingredientes iguales o con 2 ingredientes iguales y un tercer ingrediente = Masita
			((substr($str, 0,1)==substr($str, 1,1))&&(substr($str, 1,1)==substr($str, 2,1))) || //Primera fila: los 3 son iguales
			((substr($str, 0,1)==substr($str, 1,1))&&(substr($str, 2,1)=="M")) || 				//Primera fila: los dos primeros son iguales y el 3ro es Masita
			((substr($str, 0,1)==substr($str, 3,1))&&(substr($str, 1,1)=="M")) ||				//Primera fila: el 1ro y el 3ro son iguales y el 2do es Masita
			((substr($str, 1,1)==substr($str, 3,1))&&(substr($str, 0,1)=="M")) ||				//Primera fila: el 2do y el 3ro son iguales y el 1ro es Masita
			((substr($str, 3,1)==substr($str, 4,1))&&(substr($str, 4,1)==substr($str, 5,1))) || //Segunda fila: los 3 son iguales
			((substr($str, 3,1)==substr($str, 4,1))&&(substr($str, 5,1)=="M")) ||				//Segunda fila: los dos primeros son iguales y el 3ro es Masita
			((substr($str, 3,1)==substr($str, 5,1))&&(substr($str, 4,1)=="M")) ||				//Segunda fila: el 1ro y el 3ro son iguales y el 2do es Masita
			((substr($str, 4,1)==substr($str, 5,1))&&(substr($str, 3,1)=="M")) ||				//Segunda fila: el 2do y el 3ro son iguales y el 1ro es Masita
			((substr($str, 6,1)==substr($str, 7,1))&&(substr($str, 7,1)==substr($str, 8,1))) ||	//Tercera fila: los 3 son iguales
			((substr($str, 6,1)==substr($str, 7,1))&&(substr($str, 8,1)=="M")) ||				//Tercera fila: los dos primeros son iguales y el 3ro es Masita
			((substr($str, 6,1)==substr($str, 8,1))&&(substr($str, 7,1)=="M")) ||				//Tercera fila: el 1ro y el 3ro son iguales y el 2do es Masita
			((substr($str, 7,1)==substr($str, 8,1))&&(substr($str, 6,1)=="M")) ||				//Tercera fila: el 2do y el 3ro son iguales y el 1ro es Masita
			
			//COLUMNAS con 3 ingredientes iguales o con 2 ingredientes iguales y un tercer ingrediente = Masita
			((substr($str, 0,1)==substr($str, 3,1))&&(substr($str, 3,1)==substr($str, 6,1))) || //Primera columna: los 3 son iguales
			((substr($str, 0,1)==substr($str, 3,1))&&(substr($str, 6,1)=="M")) || 				//Primera columna: los dos primeros son iguales y el 3ro es Masita
			((substr($str, 0,1)==substr($str, 6,1))&&(substr($str, 3,1)=="M")) || 				//Primera columna: el 1ro y el 3ro son iguales y el 2do es Masita
			((substr($str, 3,1)==substr($str, 6,1))&&(substr($str, 0,1)=="M")) || 				//Primera columna: el 2do y el 3ro son iguales y el 1ro es Masita
			((substr($str, 1,1)==substr($str, 4,1))&&(substr($str, 4,1)==substr($str, 7,1))) || //Segunda columna: los 3 son iguales
			((substr($str, 1,1)==substr($str, 4,1))&&(substr($str, 7,1)=="M")) || 				//Segunda columna: los dos primeros son iguales y el 3ro es Masita
			((substr($str, 1,1)==substr($str, 7,1))&&(substr($str, 4,1)=="M")) || 				//Segunda columna: el 1ro y el 3ro son iguales y el 2do es Masita
			((substr($str, 4,1)==substr($str, 7,1))&&(substr($str, 1,1)=="M")) || 				//Segunda columna: el 2do y el 3ro son iguales y el 1ro es Masita
			((substr($str, 2,1)==substr($str, 5,1))&&(substr($str, 5,1)==substr($str, 8,1))) || //Tercera columna: los 3 son iguales
			((substr($str, 2,1)==substr($str, 5,1))&&(substr($str, 8,1)=="M")) || 				//Tercera columna: los dos primeros son iguales y el 3ro es Masita
			((substr($str, 2,1)==substr($str, 8,1))&&(substr($str, 5,1)=="M")) || 				//Tercera columna: el 1ro y el 3ro son iguales y el 2do es Masita
			((substr($str, 5,1)==substr($str, 8,1))&&(substr($str, 2,1)=="M"))  				//Tercera columna: el 2do y el 3ro son iguales y el 1ro es Masita
		
		/*Estas posiciones en el vector son los espacios en el molde:
				0 - 1 - 2 
				3 - 4 - 5  
				6 - 7 - 8 
		*/
		
			&& !buscar($str, $recetas) //y además busco que no esté repetido
		){ 
				$recetas[$cont]=$str; //si es una combinación válida y no está repetida, la guardo.
				$cont++;
		}
	}else{
		for ($j = $i; $j < $n; $j++){
			swap($str,$i,$j);
			permute($str, $i+1, $n);
			swap($str,$i,$j);
		}
	} 
}
//Función que intercambia los ingredientes para generar las combinaciones
function swap(&$str,$i,$j) {
    $temp = $str[$i];
    $str[$i] = $str[$j];
    $str[$j] = $temp;
}  

//Función que busca una receta repetida.
function buscar($recetaposible, $recetas){
	foreach ($recetas as $receta){
		if($receta==$recetaposible)
			return true;
		else return false;
	}
}
 
?>
