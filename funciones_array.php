<?php

function crearArray(int $size, int $min, int $max): array
{
	for ($i = 0; $i < $size; $i++) {
		$matriz[] = rand($min, $max);
	}
	return $matriz;
}

function mostrarArray(array &$matrizA, array &$matrizB = null)
{
	if ($matrizB == null) 
	{
		foreach ($matrizA as $indice => $valor) {
			print("[<i>$indice</i>] ⇒ <b>$valor</b> <br>");
		}
		print("<br>");
	}
	else
	{
		foreach ($matrizA as $indice => $valor) {
			print("<b>$valor</b> ⇒ $matrizB[$indice] <br>");
		}
		print("<br>");
	}

}


function busqSecuencial($elementoBuscado, array $matriz, bool $ordenado)
{
	if ($ordenado) {
		for ($i = 0; $i < count($matriz) && $elementoBuscado >= $matriz[$i]; $i++) {
			if ($matriz[$i] == $elementoBuscado) {
				print("[Secuencial Ordenado] Se ha encontrado el elemento: $elementoBuscado, en la posicion: [$i]. <br>");
			}
		}
	} else {
		for ($i = 0; $i < count($matriz); $i++) {
			if ($matriz[$i] == $elementoBuscado) {
				print("[Secuencial No Ordenado] Se ha encontrado el elemento: $elementoBuscado, en la posicion: [$i]. <br>");
			}
		}
	}
}

function busqBinaria($elementoBuscado, array $matriz)
{
	$limInf = 0;
	$limSup = count($matriz) - 1;
	
	$existe = 0;
	
	while ($limInf <= $limSup && $existe == 0) {
		$medio = (int)(($limInf + $limSup) / 2);

		if ($elementoBuscado == $matriz[$medio]) 
		{
			$i = $medio;
			print("[Binaria] Se ha encontrado el elemento: $elementoBuscado, en la posicion: [$i]. <br>");
			$existe = 1;
		} 
		else 
		{
			if ($elementoBuscado > $matriz[$medio]) {
				$limInf = $medio + 1;
			} else {
				$limSup = $medio - 1;
			}
		}
	}
}

function ordBurbuja(array &$matrizA, array &$matrizB = null)
{
	for ($i = 0; $i < count($matrizA) - 1; $i++) {
		for ($j = count($matrizA) - 1; $j >= $i + 1; $j--) {
			if ($matrizA[$j] < $matrizA[$j - 1]) {
				$aux = $matrizA[$j];
				$matrizA[$j] = $matrizA[$j - 1];
				$matrizA[$j - 1] = $aux;

				if ($matrizB != null) {
					$aux = $matrizB[$j];
					$matrizB[$j] = $matrizB[$j - 1];
					$matrizB[$j - 1] = $aux;
				}
			}
		}
	}
}

function ordIntercambio(array &$matrizA, array &$matrizB = null) {
	for ($i=0; $i < count($matrizA) - 1; $i++) { 
		for ($j=$i+1; $j < count($matrizA) ; $j++) { 
			if ($matrizA[$i] > $matrizA[$j]) {
				$aux = $matrizA[$i];
				$matrizA[$i] = $matrizA[$j];
				$matrizA[$j] = $aux;

				if ($matrizB != null) {
					$aux = $matrizB[$j];
					$matrizB[$j] = $matrizB[$j - 1];
					$matrizB[$j - 1] = $aux;
				}
			}
		}
	}
}

function mezclarArrays(array $matrizA, array $matrizB): array {
	$indexT1 = $indexT2 = 0;
	$finT1 = $finT2 = "";
	$mueve = "";

	(count($matrizA) == 0) ? $finT1 = 0 : "";


	(count($matrizB) == 0) ? $finT2 = 0 : "";
	while ($finT1 != 0 || $finT2 != 0) {
		if ($finT1 == 0) {
			$mueve = 2;
		} elseif ($finT2 == 0) {
			$mueve = 1;
		} else {
			($matrizA[$indexT1] <= $matrizB[$indexT2]) ? $mueve = 1 : $mueve = 2;
		}

		if ($mueve == 1) {
			$matrizMezclada[] = $matrizA[$indexT1];
			$indexT1++;

			($indexT1 == count($matrizA)) ? $finT1 = 0 : "";
		} else {
			$matrizMezclada[] = $matrizB[$indexT2];
			$indexT2++;

			($indexT2 == count($matrizB)) ? $finT2 = 0 : "";
		}
	}

	return $matrizMezclada;
}

?>