<?php

// Conexión a la base de datos


use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

// Conexión a la base de datos
$di->set('pagos', function () {
    return new DbAdapter([
        'host'     => 'localhost',
        'username' => 'itsz',
        'password' => 'hf[_lmZ79(01ruDF',
        'dbname'   => 'tienda_online',
    ]);
});



use Phalcon\Mvc\Controller;

class FormController extends Controller
{
    public function saveAction()
    {
        // Obtener los datos del formulario
        $name = $this->request->getPost('name');
        $phone = $this->request->getPost('phone');
        $calle = $this->request->getPost('calle');
        $numext = $this->request->getPost('numext');
        $country = $this->request->getPost('country');
        $city = $this->request->getPost('city');

        $card = $this->request->getPost('card');
        $cvv = $this->request->getPost('cvv');
        $mvencimiento = $this->request->getPost('mvencimiento');
        $avencimiento = $this->request->getPost('avencimiento');
        $monto = $this->request->getPost('monto');

        // Guardar los datos en la base de datos
        $db = $this->getDI()->get('pagos');

        $sql = "INSERT INTO pagos (name, phone, calle, numext, country, city, card, cvv, mvencimiento, avencimiento, monto) 
                VALUES (:name, :phone, :calle, :numext, :country, :city :card :cvv :mvencimiento :avencimiento :monto)";

        $result = $db->execute($sql, [
            'name' => $name,
            'phone' => $phone,
            'calle' => $calle,
            'numext' => $numext,
            'country' => $country,
            'city' => $city,

            'card' => $card,
            'cvv' => $cvvy,
            'mvencimiento' =>  $mvencimiento,
            'avencimiento' => $avencimiento,
            'monto' =>  $monto,


        ]);

        if ($result) {
            echo "Datos guardados correctamente.";
        } else {
            echo "Error al guardar los datos.";
        }
    }
}

 