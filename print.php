
<?php

require __DIR__ . '/vendor/autoload.php';
/*use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
$connector = new FilePrintConnector("php://stdout");
$printer = new Printer($connector);
$printer -> text("Hello World!\n");
$printer -> cut();
$printer -> close();*/
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\Printer;
$connector = new NetworkPrintConnector("192.168.2.26", 9100);
$printer = new Printer($connector);
try {
    // ... Print stuff
} finally {
    $printer -> close();
}
?>
