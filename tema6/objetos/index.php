<?php
require("./Empresa.php");
require("./EmpresaM.php");

$empresa = new Empresa("435345345", "Mola tu web", "Zamora");

echo "<pre>";
print_r($empresa);
echo "<br>";
// $empresa->setCif("343894433");
// $empresa->setNombre("Mola tu web S.L.");
print_r($empresa);
// echo $empresa->localidad; // da error por ser privado

$empresaM = new EmpresaM("435345345", "Mola tu web2", "ZamoraSS");
$empresaM = new EmpresaM("435345345", "Mola tu web2", "ZamoraSS");
$empresaM = new EmpresaM("435345345", "Mola tu web2", "ZamoraSS");
$empresaM = new EmpresaM("435345345", "Mola tu web2", "ZamoraSS");
echo "<p>Localidad de la empresa: " . $empresaM->localidad . "</p>"; // lo permite por el metodo __get()
$empresaM->localidad = "Valladolid";
$empresaM->sis = "Valladolid"; // sin validar: crea sis en el objeto
echo "<p>Localidad de la empresa (modificada...): " . $empresaM->localidad . "</p>"; // lo permite por el metodo __get()
print_r($empresaM);
echo "<br>";
echo $empresaM;


echo "<p>" . EmpresaM::saluda() . "</p>"; // llamar metodo estático
echo "<p>" . EmpresaM::$cont . "</p>"; // llamar metodo estático

?>