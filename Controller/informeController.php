<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Bigotitos/Model/informeModel.php";

function ObtenerDatosGraficoClientesPremium() {
    return ObtenerClientesPremiumModel();
}

function ObtenerDatosStockProductos() {
    return ObtenerStockProductos();
}

function ObtenerResumenGeneral() {
    return ObtenerResumenGeneralModel();
}
?>