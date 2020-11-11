<?php

require("./scripts/util.inc.php");
require("./scripts/init.inc.php");

use Models\Brand;
use Models\Model;
use Models\Customer;
use Models\Rent;

$faker = Faker\Factory::create("pt_BR");

//Cria a Marca
$brand = Brand::create([
  "description" => ucfirst($faker->word)
]);
$brand->save();
printf("Marca <b>%s</b> criada com o id <b>%d</b><br>", $brand->description, $brand->brand_id);

//Cria o modelo
$model = $brand->model()->create([
  "description" => ucfirst($faker->word)
]);
printf("Modelo <b>%s</b> criado com o id <b>%d</b><br>", $model->description, $model->model_id);

//Cria o veiculo
$vehicle = $model->vehicle()->create([
  "license_plate" => strtoupper($faker->bothify("???####"))
]);
printf("Veículo <b>%s</b> criado com o id <b>%d</b><br>", $vehicle->license_plate, $vehicle->vehicle_id);

//Cria o cliente
$customer = Customer::create([
  "name" => sprintf("%s %s", $faker->firstName, $faker->lastName)
]);
$customer->save();
printf("Cliente <b>%s</b> criado com o id <b>%d</b><br>", $customer->name, $customer->customer_id);

//Cria o aluguel de veiculo para o cliente
$rent = Rent::create([
  "rent_date" => new \DateTime("now"),
  "vehicle_id" => $vehicle->vehicle_id,
  "customer_id" => $customer->customer_id
]);
printf("Aluguel para o cliente <b>%s</b> e veículo <b>%s</b> efetuado com o id <b>%d</b><br>", $customer->name, $vehicle->license_plate, $rent->rent_id);

//Altera o nome da marca 1
$brand = Brand::find(1);
$oldName = $brand->description;
$newName = ucfirst($faker->word);
$brand->description = $newName;
$brand->save();
printf("Marca <b>%s</b> alterada para <b>%s</b><br>", $oldName, $newName);

//Cria uma marca a remove ela
$brand = Brand::create([
  "description" => ucfirst($faker->word)
]);
$brand->save();
printf("Marca <b>%s</b> criada com o id <b>%d</b><br>", $brand->description, $brand->brand_id);
$brand->delete();
if ($brand->trashed()) {
    printf("Marca <b>%s</b> excluída<br>", $brand->description, $brand->brand_id);
}

//Lista todas as marcas
$brands = Models\Brand::all();
print("<h1>Marcas</h1><ul>");
foreach ($brands as $brand) {
    printf("<li><b>%s</b> com id <b>%d</b></li>", $brand->description, $brand->brand_id);
}
print("</ul>");
