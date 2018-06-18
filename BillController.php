<?php

    class BillsController extends DBConnection {

        public $table = "facturas";
        public $result;

        public function __construct() {parent::__construct();}

        public function Add($products) {

            $date = new DateController();
            $total = 0;
            $qty = 0;

            if(!isset($_SESSION["username"])):
                return false;
            endif;

            $stmt = $this->pdo->prepare(
                "SELECT * FROM usuario WHERE username = :username"
            );

            $stmt->execute([
                'username'  =>  $_SESSION["username"]
            ]);

            $data = $stmt->fetch();
            $id_user = $data->id_usuario;
            $stmt = $this->pdo->prepare(
                "INSERT INTO facturas (comprador, cantprod, total, fechapedido, fechaentrega, complete) VALUES (:c, :qty, :tot, :fp, :fe, :com)"
            );

            date_default_timezone_set('UTC');
            date_default_timezone_set("America/Mexico_City");

            $stmt->execute([
                'c'     => $id_user,
                'qty'   => 0,
                'tot'   => 0,
                'fp'    => date("Y-m-d"),
                'fe'    => $date->getDeliverDate(),
                'com'   => 0
            ]);

            $stmt = $this->pdo->prepare(
                "SELECT * FROM facturas WHERE cantprod = 0 AND total = 0 AND complete = 0"
            );
            
            $stmt->execute();
            $data = $stmt->fetch();
            $id_factura = $data->id_factura;

            foreach ($products as $product):

                $calc = new CalculateController();
                $calc->check($product);
                $price = ($product->product->precio * $product->json->qty); 
                $subtotal = $calc->calculateDescount($price);
                $total += $subtotal;
                $qty += $product->json->qty;

                $stmt = $this->pdo->prepare(
                    "INSERT INTO ventas (producto, factura, cantidad, subtotal) VALUES (:producto, :factura, :cantidad, :subtotal)"
                );

                $stmt->execute([
                    'producto'  =>  $product->product->id_producto,
                    'factura'   =>  $id_factura,
                    'cantidad'  =>  $product->json->qty,
                    'subtotal'  =>  $subtotal
                ]);

            endforeach;

            $stmt = $this->pdo->prepare(
                "UPDATE facturas SET cantprod = :cantprod, total = :total WHERE id_factura = :id_factura"
            );
            $stmt->execute([
                'cantprod'  =>  $qty,
                'total'     =>  $total,
                'id_factura'=>  $id_factura 
            ]);

            return true;

        }

        public function Purchases() {

            if(isset($_SESSION["username"])):
                $username = $_SESSION["username"];
                $stmt = $this->pdo->prepare(
                    "SELECT*FROM usuario WHERE username = :username"
                );
                $stmt->execute([
                    'username'  =>  $username
                ]);
                $data = $stmt->fetch();
                $stmt = $this->pdo->prepare(
                    "SELECT*FROM facturas WHERE comprador = :id_user"
                );
                $stmt->execute([
                    'id_user'   =>  $data->id_usuario
                ]);
                $res = [];
                while($element = $stmt->fetch(PDO::FETCH_ASSOC)):
                    $bill = new BillModel();
                    $bill->set(
                        $element["id_factura"],
                        $element["comprador"],
                        $element["cantprod"],
                        $element["total"],
                        $element["fechapedido"],
                        $element["fechaentrega"],
                        $element["complete"]
                    );
                    $res[] = $bill;
                endwhile;
                $this->result = $res;
            else:
                header("Location: index.php");
            endif;

        }

        public function PDF() {

            $id = $_GET["id"];

            $pdf = new PDFController();
            $filename = 'facturaPDF-'.date("Y-m-d-H-i-s").'.pdf';

            $stmt = $this->pdo->prepare(
                "SELECT*FROM facturas WHERE id_factura = :id"
            );
            $stmt->execute([
                'id'    =>  $id
            ]);

            $info = $stmt->fetch();

            $stmt = $this->pdo->prepare(
                "SELECT*FROM usuario WHERE id_usuario = :id"
            );
            $stmt->execute([
                'id'    =>  $info->comprador
            ]);
            $user = $stmt->fetch();

            $pdf->AliasNbPages();
            $pdf->AddPage('L', 'A4', 0);
            $pdf->details(
                $user->nombre,
                $user->apellido_paterno." ".$user->apellido_materno,
                $user->direccion,
                $id,
                $user->codigo_p,
                $info->fechapedido,
                $info->fechaentrega,
                $info->cantprod
            );

            $pdf->headerTable();
            $stmt = $this->pdo->prepare(
                "SELECT*FROM ventas WHERE factura = :factura"
            );
            $stmt->execute([
                'factura'   =>  $id
            ]);

            while($element = $stmt->fetch(PDO::FETCH_ASSOC)):

                $stmtp = $this->pdo->prepare(
                    "SELECT*FROM producto WHERE id_producto = :id"
                );

                $stmtp->execute([
                    'id'    =>  $element["producto"]
                ]);
                $data = $stmtp->fetch();

                $pdf->setContentTable($data->nombre,$data->precio,$data->descripcion,$element["cantidad"],$element["subtotal"]);
                
            endwhile;

            $pdf->setTotal($info->total);
            
            $pdf->Output('./bills/'.$filename, 'F');

            // Redirigimos para descarga
            header("Location: download.php?filename=$filename&path=bills/$filename");
        }
        
        public function XML() {

            $id = $_GET["id"];
            // Crear XML
            $xml = new DomDocument("1.0", "UTF-8");


            $stmt = $this->pdo->prepare(
                "SELECT*FROM facturas WHERE id_factura = :id"
            );
            $stmt->execute([
                'id'    =>  $id
            ]);

            $info = $stmt->fetch();

            $stmt = $this->pdo->prepare(
                "SELECT*FROM usuario WHERE id_usuario = :id"
            );
            $stmt->execute([
                'id'    =>  $info->comprador
            ]);
            $user = $stmt->fetch();

            $stmt = $this->pdo->prepare(
                "SELECT*FROM ventas WHERE factura = :factura"
            );
            $stmt->execute([
                'factura'   =>  $id
            ]);

            $bill = $xml->createElement("factura");
            $bill = $xml->appendChild($bill);

            $products = $xml->createElement("productos");
            $products = $bill->appendChild($products);

            $id = $xml->createElement("numerofactura", $info->id_factura);
            $id = $bill->appendChild($id);
            
            $username = $xml->createElement("nombre", $user->nombre);
            $username = $bill->appendChild($username);

            $lastnames = $xml->createElement("apellidos", $user->apellido_paterno." ".$user->apellido_materno);
            $lastnames = $bill->appendChild($lastnames);

            $address = $xml->createElement("direccion", $user->direccion);
            $address = $bill->appendChild($address);

            $CP = $xml->createElement("codigopostal", $user->codigo_p);
            $CP = $bill->appendChild($CP);

            while($element = $stmt->fetch(PDO::FETCH_ASSOC)):

                $calc = new CalculateController();

                $stmtp = $this->pdo->prepare(
                    "SELECT*FROM producto WHERE id_producto = :id"
                );

                $stmtp->execute([
                    'id'    =>  $element["producto"]
                ]);
                $data = $stmtp->fetch();

                $product = $xml->createElement("producto");
                $product = $products->appendChild($product);

                $name = $xml->createElement("nombre", $data->nombre);
                $name = $product->appendChild($name);

                $qty = $xml->createElement("cantidad", $element["cantidad"]);
                $qty = $product->appendChild($qty);

                $price = $xml->createElement("precio", $data->precio);
                $price = $product->appendChild($price);

                $desc = $xml->createElement("descripcion", $data->descripcion);
                $desc = $product->appendChild($desc);

                $sub = $xml->createElement("subtotal", '$ '.$element["subtotal"]);
                $sub = $product->appendChild($sub);
                
            endwhile;

            $fp = $xml->createElement("fechapedido", $info->fechapedido);
            $fp = $bill->appendChild($fp);

            $fe = $xml->createElement("fechaentrega", $info->fechaentrega);
            $fe = $bill->appendChild($fe);

            $tot = $xml->createElement("total", '$ '.$info->total);
            $tot = $bill->appendChild($tot);

            // Nombre del archivo
            $filename = 'facturaXML-'.date("Y-m-d-H-i-s").'.xml';

            $xml->formatOutput = true;
            $el_xml = $xml->saveXML();
            $xml->save('./bills/'.$filename);

            // Redirigimos para descarga
            header("Location: download.php?filename=$filename&path=bills/$filename");
        }

    }

?>