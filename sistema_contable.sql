-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2021 a las 20:11:13
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_contable`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion_c`
--

CREATE TABLE `clasificacion_c` (
  `idClasificacion_Cuentas` int(11) NOT NULL,
  `Nombre_Clasificacion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clasificacion_c`
--

INSERT INTO `clasificacion_c` (`idClasificacion_Cuentas`, `Nombre_Clasificacion`) VALUES
(10, 'Activo circulante'),
(11, 'Activo no circulante'),
(12, 'Otros Activos'),
(20, 'Pasivos a Corto Plazo'),
(21, 'Pasivos a Largo Plazo'),
(22, 'Otros Pasivos'),
(30, 'Capital Contable'),
(40, 'Cuentas de Resultados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion_cuentas`
--

CREATE TABLE `clasificacion_cuentas` (
  `Clasificacion_Cuentas` int(11) NOT NULL,
  `Cuentas_Codigo_Cuenta` varchar(45) NOT NULL,
  `ClasifPrincipal_id_Recurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clasificacion_cuentas`
--

INSERT INTO `clasificacion_cuentas` (`Clasificacion_Cuentas`, `Cuentas_Codigo_Cuenta`, `ClasifPrincipal_id_Recurso`) VALUES
(10, '1011', 1),
(10, '1012', 1),
(10, '1013', 1),
(10, '1021', 1),
(10, '1022', 1),
(10, '10222', 1),
(10, '1023', 1),
(10, '1024', 1),
(10, '1025', 1),
(10, '1026', 1),
(10, '1027', 1),
(10, '1028', 1),
(10, '1031', 1),
(10, '1032', 1),
(10, '1033', 1),
(11, '1111', 1),
(11, '1112', 1),
(11, '1113', 1),
(11, '1114', 1),
(11, '1121', 1),
(11, '1122', 1),
(11, '11221', 1),
(11, '1123', 1),
(11, '11231', 1),
(11, '1124', 1),
(11, '11241', 1),
(11, '1125', 1),
(11, '11251', 1),
(11, '1126', 1),
(11, '11261', 1),
(11, '1127', 1),
(11, '11271', 1),
(11, '1128', 1),
(11, '11281', 1),
(12, '1131', 1),
(12, '1132', 1),
(12, '1133', 1),
(12, '1134', 1),
(12, '1141', 1),
(12, '1142', 1),
(12, '1143', 1),
(12, '1144', 1),
(12, '1145', 1),
(12, '1146', 1),
(12, '1151', 1),
(12, '1152', 1),
(12, '1153', 1),
(20, '2010', 2),
(20, '2011', 2),
(20, '20110', 2),
(20, '20111', 2),
(20, '20112', 1),
(20, '2012', 2),
(20, '2013', 2),
(20, '2014', 2),
(20, '2015', 2),
(20, '2016', 2),
(20, '2017', 2),
(20, '2018', 2),
(20, '2019', 2),
(21, '2111', 2),
(21, '2112', 2),
(21, '2113', 2),
(21, '2114', 2),
(22, '2211', 2),
(30, '3011', 2),
(30, '3012', 2),
(30, '3013', 2),
(30, '3014', 2),
(30, '3015', 2),
(40, '4011', 2),
(40, '40111', 1),
(40, '40112', 1),
(40, '40113', 1),
(40, '4012', 2),
(40, '4111', 2),
(40, '4112', 2),
(40, '4113', 2),
(40, '4114', 2),
(40, '5001', 1),
(40, '5011', 1),
(40, '50111', 2),
(40, '50112', 2),
(40, '50113', 2),
(40, '5012', 1),
(40, '6011', 1),
(40, '6012', 1),
(40, '6013', 1),
(40, '6014', 1),
(40, '6015', 1),
(40, '6016', 1),
(40, '6111', 1),
(40, '61110', 1),
(40, '61111', 1),
(40, '61112', 1),
(40, '61113', 1),
(40, '6112', 1),
(40, '6113', 1),
(40, '6114', 1),
(40, '6115', 1),
(40, '6116', 1),
(40, '6117', 1),
(40, '6118', 1),
(40, '6119', 1),
(40, '6211', 1),
(40, '6212', 1),
(40, '6213', 1),
(40, '6214', 1),
(40, '6215', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasifprincipal`
--

CREATE TABLE `clasifprincipal` (
  `id_Recurso` int(11) NOT NULL,
  `Nombre_Recurso` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clasifprincipal`
--

INSERT INTO `clasifprincipal` (`id_Recurso`, `Nombre_Recurso`) VALUES
(1, 'Activos'),
(2, 'Pasivos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `Codigo_Cuenta` varchar(45) NOT NULL,
  `Nombre_Cuenta` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`Codigo_Cuenta`, `Nombre_Cuenta`) VALUES
('1011', 'Caja'),
('1012', 'Banco Nacional '),
('1013', 'Banco Internacional '),
('1021', 'Documentos por Cobrar '),
('1022', 'Clientes'),
('10222', 'Provisiones de Cuentas Incobrables'),
('1023', 'Cuentas por Cobrar Funcionario '),
('1024', 'Cuentas por Cobrar Empleados '),
('1025', 'Deudores '),
('1026', 'IVA Acreditable '),
('1027', 'Papelería y Útiles de oficina '),
('1028', 'Propaganda y Publicidad'),
('1031', 'Almacenes e inventarios '),
('1032', 'Inventario de Mercancías en Transito  '),
('1033', 'Inventarios de Mercancías a Consignación '),
('1111', 'Acciones en otras Compañías  '),
('1112', 'Certificado Financiero '),
('1113', 'Depósito a Plazo Fijo '),
('1114', 'Bonos'),
('1121', 'Terrenos '),
('1122', 'Edificios '),
('11221', 'Depreciación Acumulada Edificios '),
('1123', 'Maquinarias '),
('11231', 'Depreciación Acumulada Maquinarias'),
('1124', 'Equipos de Transporte '),
('11241', 'Depreciación Acumulada Equipo de Transporte '),
('1125', 'Mobiliarios y Equipos de Oficina'),
('11251', 'Depreciación Acumulada Mobiliario y Equipo de'),
('1126', 'Herramientas '),
('11261', 'Depreciación Acumulada de Herramientas'),
('1127', 'Equipo de Cómputo'),
('11271', 'Depreciación acumulada de equipo de computo '),
('1128', 'Equipo eléctrico o electrónico '),
('11281', 'Depreciación acumulada de equipo eléctrico o '),
('1131', 'Primas de Seguros y Fianzas '),
('1132', 'Depósitos y Depósitos en Garantía'),
('1133', 'Derechos de autor y patentes '),
('1134', 'Gastos de constitución e instalación'),
('1141', 'Seguro pagado por adelantado '),
('1142', 'Suministros de oficina '),
('1143', 'Renta pagado por adelantado '),
('1144', 'ITBIS adelantado '),
('1145', 'Intereses pagados por anticipado'),
('1146', 'Anticipo a proveedores'),
('1151', 'Mercadotecnia '),
('1152', 'Organización de compañía '),
('1153', 'Instalación de la compañía '),
('2010', 'Acreedores'),
('2011', 'Documentos por pagar '),
('20110', 'PTU por pagar'),
('20111', 'IVA por pagar'),
('20112', 'Impuestos y derechos por pagar'),
('2012', 'Proveedores '),
('2013', 'Sueldos por pagar '),
('2014', 'Intereses por pagar '),
('2015', 'Comisiones por pagar '),
('2016', 'ITBIS por pagar'),
('2017', 'Bonificaciones por pagar '),
('2018', 'Impuesto sobre la renta por pagar '),
('2019', 'IVA causado '),
('2111', 'Documentos por pagar a largo plazo '),
('2112', 'Hipoteca por pagar a largo plazo '),
('2113', 'Acreedores bancarios '),
('2114', 'Cuentas por pagar a Largo Plazo'),
('2211', 'Anticipos de clientes o ingresos '),
('3011', 'Capital suscrito '),
('3012', 'Retiros '),
('3013', 'Resultados de periodo '),
('3014', 'Utilidades o perdida del ejercicio'),
('3015', 'Reserva legal y contractual'),
('4011', 'Ingresos por ventas '),
('40111', 'Devoluciones en ventas '),
('40112', 'Descuentos en ventas '),
('40113', 'Rebajas en ventas'),
('4012', 'Ingresos por servicios'),
('4111', 'Intereses ganados '),
('4112', 'Ingresos por comisiones '),
('4113', 'Otros ingresos'),
('4114', 'Ganancias en ventas de activos fijos '),
('5001', 'Costo de ventas'),
('5011', 'Compras de mercancías'),
('50111', 'Devoluciones en compras '),
('50112', 'Descuentos en compras '),
('50113', 'Rebajas en compras '),
('5012', 'Gastos en compras '),
('6011', 'Gastos de comisiones sobre ventas '),
('6012', 'Gastos de publicidad '),
('6013', 'Gastos de cuentas incobrables '),
('6014', 'Gastos de mercadotecnia '),
('6015', 'Gastos de transporte '),
('6016', 'Otros gastos de ventas '),
('6111', 'Gastos de sueldos '),
('61110', 'Gastos de organización de la compañía '),
('61111', 'Gastos de instalación de la compañía '),
('61112', 'Gastos de alquiler '),
('61113', 'Otros gastos administrativos '),
('6112', 'Gatos de seguros '),
('6113', 'Gastos de suministros de oficina '),
('6114', 'Gastos de depreciación '),
('6115', 'Gastos de energía eléctrica'),
('6116', 'Gastos de comunicación '),
('6117', 'Gastos de regalía pascual '),
('6118', 'Gastos de combustible '),
('6119', 'Gastos de reparación '),
('6211', 'Gastos de intereses sobre préstamos '),
('6212', 'Gastos de comisiones sobre préstamos'),
('6213', 'Gastos de servicios bancarios '),
('6214', 'Perdida un venta de activos fijos '),
('6215', 'Otros gastos diversos ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas_info`
--

CREATE TABLE `cuentas_info` (
  `Codigo_Cuenta` int(11) NOT NULL,
  `Nombre_Cuenta` varchar(45) NOT NULL,
  `Tipo_Recurso` varchar(25) NOT NULL,
  `Codigo_Proc_Reg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuentas_info`
--

INSERT INTO `cuentas_info` (`Codigo_Cuenta`, `Nombre_Cuenta`, `Tipo_Recurso`, `Codigo_Proc_Reg`) VALUES
(1011, 'Caja', 'Activo circulante ', 1),
(1011, 'Caja', 'Activo circulante ', 2),
(1012, 'Banco Nacional ', 'Activo circulante ', 1),
(1012, 'Banco Nacional ', 'Activo circulante ', 2),
(1013, 'Banco Internacional ', 'Activo circulante ', 1),
(1013, 'Banco Internacional ', 'Activo circulante ', 2),
(1021, 'Documentos por Cobrar ', 'Activo circulante ', 1),
(1021, 'Documentos por Cobrar ', 'Activo circulante ', 2),
(1022, 'Clientes ', 'Activo circulante ', 1),
(1022, 'Cuentas por cobrar clientes', 'Activo circulante ', 2),
(1023, 'Cuentas por Cobrar Funcionario ', 'Activo circulante ', 1),
(1023, 'Cuentas por Cobrar Funcionario', 'Activo circulante ', 2),
(1024, 'Cuentas por Cobrar Empleados ', 'Activo circulante ', 1),
(1024, 'Cuentas por Cobrar Empleados', 'Activo circulante ', 2),
(1025, 'Deudores', 'Activo circulante ', 1),
(1025, 'Deudores', 'Activo circulante ', 2),
(1026, 'IVA acreditable', 'Activo circulante ', 1),
(1026, 'IVA Acreditable', 'Activo circulante ', 2),
(1027, 'Papelería y Útiles de oficina', 'Activo circulante ', 1),
(1027, 'Papelería y Útiles de oficina', 'Activo circulante ', 2),
(1028, 'Propaganda y Publicidad', 'Activo circulante ', 1),
(1028, 'Propaganda y Publicidad', 'Activo circulante ', 2),
(1031, 'Inventarios', 'Activo circulante ', 1),
(1031, 'Almacén', 'Activo circulante ', 2),
(1032, 'Inventarios de Mercancías en Transito', 'Activo circulante ', 1),
(1032, 'Almacén de Mercancías en Transito', 'Activo circulante ', 2),
(1033, 'Inventarios de Mercancías a Consignación', 'Activo circulante ', 1),
(1033, 'Almacén de Mercancías a Consignación', 'Activo circulante ', 2),
(1111, 'Acciones en otras Compañías', 'Activo no circulante', 1),
(1111, 'Acciones en otras Compañías', 'Activo no circulante', 2),
(1112, 'Certificado Financiero', 'Activo no circulante', 1),
(1112, 'Certificado Financiero', 'Activo no circulante', 2),
(1113, 'Depósito a Plazo Fijo', 'Activo no circulante', 1),
(1113, 'Depósito a Plazo Fijo', 'Activo no circulante', 2),
(1114, 'Bonos', 'Activo no circulante', 1),
(1114, 'Bonos', 'Activo no circulante', 2),
(1121, 'Terrenos', 'Activo no circulante', 1),
(1121, 'Terrenos', 'Activo no circulante', 2),
(1122, 'Edificios', 'Activo no circulante', 1),
(1122, 'Edificios', 'Activo no circulante', 2),
(1123, 'Maquinarias', 'Activo no circulante', 1),
(1123, 'Maquinarias', 'Activo no circulante', 2),
(1124, 'Equipos de Transporte', 'Activo no circulante', 1),
(1124, 'Equipos de Transporte', 'Activo no circulante', 2),
(1125, 'Mobiliarios y Equipos de Oficina', 'Activo no circulante', 1),
(1125, 'Mobiliarios y Equipos de Oficina', 'Activo no circulante', 2),
(1126, 'Herramientas', 'Activo no circulante', 1),
(1126, 'Herramientas', 'Activo no circulante', 2),
(1127, 'Equipo de Cómputo', 'Activo no circulante', 1),
(1127, 'Equipo de Cómputo', 'Activo no circulante', 2),
(1128, 'Equipo eléctrico o electrónico', 'Activo no circulante', 1),
(1128, 'Equipo eléctrico o electrónico', 'Activo no circulante', 2),
(1131, 'Primas de Seguros y Finanzas', 'Otros activos', 1),
(1131, 'Primas de Seguros y Finanzas', 'Otros activos', 2),
(1132, 'Depósitos y Depósitos en Garantía', 'Otros activos', 1),
(1132, 'Depósitos y Depósitos en Garantía', 'Otros activos', 2),
(1133, 'Derechos de autor y patentes', 'Otros activos', 1),
(1133, 'Derechos de autor y patentes', 'Otros activos', 2),
(1134, 'Gastos de construcción e instalación', 'Otros activos', 1),
(1134, 'Gastos de construcción e instalación', 'Otros activos', 2),
(1141, 'Seguro pagado por adelantado ', 'Otros activos', 1),
(1141, 'Seguro pagado por adelantado ', 'Otros activos', 2),
(1142, 'Suministros de oficina', 'Otros activos', 1),
(1142, 'Suministros de oficina', 'Otros activos', 2),
(1143, 'Rentas pagadas por adelantado', 'Otros activos', 1),
(1143, 'Rentas pagadas por adelantado', 'Otros activos', 2),
(1144, 'ITBIS adelantado', 'Otros activos', 1),
(1144, 'ITBIS adelantado', 'Otros activos', 2),
(1145, 'Intereses pagados por anticipado', 'Otros activos', 1),
(1145, 'Intereses pagados por anticipado', 'Otros activos', 2),
(1146, 'Anticipo a proveedores', 'Otros activos', 1),
(1146, 'Anticipo a proveedores', 'Otros activos', 2),
(1151, 'Mercadotecnia', 'Otros activos', 1),
(1151, 'Mercadotecnia', 'Otros activos', 2),
(1152, 'Organización de la compañía ', 'Otros activos', 1),
(1152, 'Organización de la compañía ', 'Otros activos', 2),
(1153, 'Instalación de la compañía', 'Otros activos', 1),
(1153, 'Instalación de la compañía', 'Otros activos', 2),
(2010, 'Acreedores', 'Pasivo a corto plazo', 1),
(2010, 'Acreedores', 'Pasivo a corto plazo', 2),
(2011, 'Documentos por pagar', 'Pasivo a corto plazo', 1),
(2011, 'Documentos por pagar', 'Pasivo a corto plazo', 2),
(2012, 'Proveedores', 'Pasivo a corto plazo', 1),
(2012, 'Proveedores', 'Pasivo a corto plazo', 2),
(2013, 'Sueldos por pagar', 'Pasivo a corto plazo', 1),
(2013, 'Sueldos por pagar', 'Pasivo a corto plazo', 2),
(2014, 'Intereses por pagar ', 'Pasivo a corto plazo', 1),
(2014, 'Intereses por pagar', 'Pasivo a corto plazo', 2),
(2015, 'Comisiones por pagar', 'Pasivo a corto plazo', 1),
(2015, 'Comisiones por pagar', 'Pasivo a corto plazo', 2),
(2016, 'ITBIS por pagar', 'Pasivo a corto plazo', 1),
(2016, 'ITBIS por pagar', 'Pasivo a corto plazo', 2),
(2017, 'Bonificaciones por pagar', 'Pasivo a corto plazo', 1),
(2017, 'Bonificaciones por pagar', 'Pasivo a corto plazo', 2),
(2018, 'Impuesto sobre la renta por pagar', 'Pasivo a corto plazo', 1),
(2018, 'Impuesto sobre la renta por pagar', 'Pasivo a corto plazo', 2),
(2019, 'IVA causado', 'Pasivo a corto plazo', 1),
(2019, 'IVA causado', 'Pasivo a corto plazo', 2),
(2111, 'Documentos por pagar a largo plazo', 'Pasivo a largo plazo', 1),
(2111, 'Documentos por pagar a largo plazo', 'Pasivo a largo plazo', 2),
(2112, 'Hipoteca por pagar a largo plazo', 'Pasivo a largo plazo', 1),
(2112, 'Hipoteca por pagar a largo plazo', 'Pasivo a largo plazo', 2),
(2113, 'Acreedores bancarios', 'Pasivo a largo plazo', 1),
(2113, 'Acreedores bancarios', 'Pasivo a largo plazo', 2),
(2114, 'Cuentas por pagar a Largo Plazo', 'Pasivo a largo plazo', 1),
(2114, 'Cuentas por pagar a Largo Plazo', 'Pasivo a largo plazo', 2),
(2211, 'Anticipos de clientes o ingresos', 'Otros pasivos', 1),
(2211, 'Anticipos de clientes o ingresos', 'Otros pasivos', 2),
(3011, 'Capital suscrito', 'Capital', 1),
(3011, 'Capital suscrito', 'Capital', 2),
(3012, 'Retiros', 'Capital', 1),
(3012, 'Retiros', 'Capital', 2),
(3013, 'Resultados de periodo', 'Capital', 1),
(3013, 'Resultados de periodo', 'Capital', 2),
(3014, 'Utilidades o pérdida del ejercicio', 'Capital', 1),
(3014, 'Utilidades o pérdida del ejercicio', 'Capital', 2),
(3015, 'Reserva legal y contractual', 'Capital', 1),
(3015, 'Reserva legal y contractual', 'Capital', 2),
(4011, 'Ingresos por ventas', 'Ingresos ordinarios ', 1),
(4011, 'Ingresos por ventas', 'Ingresos ordinarios ', 2),
(4012, 'Ingresos por servicios ', 'Ingresos ordinarios ', 1),
(4012, 'Ingresos por servicios', 'Ingresos ordinarios ', 2),
(4111, 'Intereses ganados', 'Ingresos extraordinarios', 1),
(4111, 'Intereses ganados', 'Ingresos extraordinarios', 2),
(4112, 'Ingresos por comisiones', 'Ingresos extraordinarios', 1),
(4112, 'Ingresos por comisiones', 'Ingresos extraordinarios', 2),
(4113, 'Otros ingresos', 'Ingresos extraordinarios', 1),
(4113, 'Otros ingresos', 'Ingresos extraordinarios', 2),
(4114, 'Ganancias en ventas de activos fijos', 'Ingresos extraordinarios', 1),
(4114, 'Ganancias en ventas de activos fijos', 'Ingresos extraordinarios', 2),
(5001, 'Costo de ventas', 'Costos de ventas', 2),
(5011, 'Compras de mercancías', 'Costos de ventas', 1),
(5011, 'Compras de mercancías', 'Costos de ventas', 2),
(5012, 'Gastos en compras', 'Costos de ventas', 1),
(5012, 'Gastos en compras', 'Costos de ventas', 2),
(6011, 'Gastos de comisiones sobre ventas', 'Gastos de ventas', 1),
(6011, 'Gastos de comisiones sobre ventas', 'Gastos de ventas', 2),
(6012, 'Gastos de publicidad', 'Gastos de ventas', 1),
(6012, 'Gastos de publicidad', 'Gastos de ventas', 2),
(6013, 'Gastos de cuentas incobrables', 'Gastos de ventas', 1),
(6013, 'Gastos de cuentas incobrables', 'Gastos de ventas', 2),
(6014, 'Gastos de mercadotecnia ', 'Gastos de ventas', 1),
(6014, 'Gastos de mercadotecnia', 'Gastos de ventas', 2),
(6015, 'Gastos de transporte', 'Gastos de ventas', 1),
(6015, 'Gastos de transporte', 'Gastos de ventas', 2),
(6016, 'Otros gastos de ventas', 'Gastos de ventas', 1),
(6016, 'Otros gastos de ventas', 'Gastos de ventas', 2),
(6111, 'Gastos de sueldos', 'Gastos generales y admin.', 1),
(6111, 'Gastos de sueldos', 'Gastos generales y admin.', 2),
(6112, 'Gastos de seguros', 'Gastos generales y admin.', 1),
(6112, 'Gastos de seguros', 'Gastos generales y admin.', 2),
(6113, 'Gastos de suministros de oficina', 'Gastos generales y admin.', 1),
(6113, 'Gastos de suministros de oficina', 'Gastos generales y admin.', 2),
(6114, 'Gastos de depreciación', 'Gastos generales y admin.', 1),
(6114, 'Gastos de depreciación', 'Gastos generales y admin.', 2),
(6115, 'Gastos de energía eléctrica', 'Gastos generales y admin.', 1),
(6115, 'Gastos de energía eléctrica', 'Gastos generales y admin.', 2),
(6116, 'Gastos de comunicación', 'Gastos generales y admin.', 1),
(6116, 'Gastos de comunicación', 'Gastos generales y admin.', 2),
(6117, 'Gastos de regalía pascual', 'Gastos generales y admin.', 1),
(6117, 'Gastos de regalía pascual', 'Gastos generales y admin.', 2),
(6118, 'Gastos de combustible', 'Gastos generales y admin.', 1),
(6118, 'Gastos de combustible', 'Gastos generales y admin.', 2),
(6119, 'Gastos de reparación', 'Gastos generales y admin.', 1),
(6119, 'Gastos de reparación', 'Gastos generales y admin.', 2),
(6211, 'Gastos de intereses sobre préstamos', 'Gastos financieros', 1),
(6211, 'Gastos de intereses sobre préstamos', 'Gastos financieros', 2),
(6212, 'Gastos de comisiones sobre préstamos', 'Gastos financieros', 1),
(6212, 'Gastos de comisiones sobre préstamos', 'Gastos financieros', 2),
(6213, 'Gastos de servicios bancarios', 'Gastos financieros', 1),
(6213, 'Gastos de servicios bancarios', 'Gastos financieros', 2),
(6311, 'Perdida en venta de activos fijos', 'Otros gastos', 1),
(6311, 'Perdida en venta de activos fijos ', 'Otros gastos', 2),
(6312, 'Otros gastos diversos', 'Otros gastos', 1),
(6312, 'Otros gastos diversos', 'Otros gastos', 2),
(10222, 'Provisiones de Cuentas Incobrables ', 'Activo circulante ', 1),
(10222, 'Provisiones de Cuentas Incobrables ', 'Activo circulante ', 2),
(11221, 'Depreciación Acumulada Edificios', 'Activo no circulante', 1),
(11221, 'Depreciación Acumulada Edificios', 'Activo no circulante', 2),
(11231, 'Depreciación Acumulada Maquinarias', 'Activo no circulante', 1),
(11231, 'Depreciación Acumulada Maquinarias', 'Activo no circulante', 2),
(11241, 'Depreciación Acumulada Equipo de Transporte', 'Activo no circulante', 1),
(11241, 'Depreciación Acumulada Equipo de Transporte', 'Activo no circulante', 2),
(11251, 'Depreciación Acumulada Mob. y Eq. de Oficina', 'Activo no circulante', 1),
(11251, 'Depreciación Acumulada Mob. y Eq. de Oficina', 'Activo no circulante', 2),
(11261, 'Depreciación Acumulada de Herramientas', 'Activo no circulante', 1),
(11261, 'Depreciación Acumulada de Herramientas', 'Activo no circulante', 2),
(11271, 'Depreciación Acumulada de equipo de computo', 'Activo no circulante', 1),
(11271, 'Depreciación Acumulada de equipo de computo', 'Activo no circulante', 2),
(11281, 'Depreciación acumulada de Eq. eléctrico', 'Activo no circulante', 1),
(11281, 'Depreciación acumulada de Eq. eléctrico', 'Activo no circulante', 2),
(20110, 'PTU por pagar', 'Pasivo a corto plazo', 1),
(20110, 'PTU por pagar', 'Pasivo a corto plazo', 2),
(40111, 'Devoluciones en ventas', 'Ingresos ordinarios ', 1),
(40111, 'Devoluciones en ventas', 'Ingresos ordinarios ', 2),
(40112, 'Descuentos en ventas', 'Ingresos ordinarios ', 1),
(40112, 'Descuentos en ventas', 'Ingresos ordinarios ', 2),
(40113, 'Rebajas en ventas', 'Ingresos ordinarios ', 1),
(40113, 'Rebajas en ventas', 'Ingresos ordinarios ', 2),
(50111, 'Devoluciones en compras', 'Costos de ventas', 1),
(50111, 'Devoluciones en compras', 'Costos de ventas', 2),
(50112, 'Descuentos en compras', 'Costos de ventas', 1),
(50112, 'Descuentos en compras', 'Costos de ventas', 2),
(50113, 'Rebajas en compras', 'Costos de ventas', 1),
(50113, 'Rebajas en compras', 'Costos de ventas', 2),
(61110, 'Gastos de organizaciones de la compañía', 'Gastos generales y admin.', 1),
(61110, 'Gastos de organización de la compañía', 'Gastos generales y admin.', 2),
(61111, 'Gastos de instalación de la compañía', 'Gastos generales y admin.', 1),
(61111, 'Gastos de instalación de la compañía', 'Gastos generales y admin.', 2),
(61112, 'Gastos de alquiler', 'Gastos generales y admin.', 1),
(61112, 'Gastos de alquiler', 'Gastos generales y admin.', 2),
(61113, 'Otros gastos administrativos', 'Gastos generales y admin.', 1),
(61113, 'Otros gastos administrativos', 'Gastos generales y admin.', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas_proc_reg`
--

CREATE TABLE `cuentas_proc_reg` (
  `Codigo_Proc_Reg` int(11) NOT NULL,
  `Codigo_Cuenta` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuentas_proc_reg`
--

INSERT INTO `cuentas_proc_reg` (`Codigo_Proc_Reg`, `Codigo_Cuenta`) VALUES
(1, '1011'),
(1, '1012'),
(1, '1013'),
(1, '1021'),
(1, '1022'),
(1, '10222'),
(1, '1023'),
(1, '1024'),
(1, '1025'),
(1, '1026'),
(1, '1027'),
(1, '1028'),
(1, '1031'),
(1, '1032'),
(1, '1033'),
(1, '1111'),
(1, '1112'),
(1, '1113'),
(1, '1114'),
(1, '1121'),
(1, '1122'),
(1, '11221'),
(1, '1123'),
(1, '11231'),
(1, '1124'),
(1, '11241'),
(1, '1125'),
(1, '11251'),
(1, '1126'),
(1, '11261'),
(1, '1127'),
(1, '11271'),
(1, '1128'),
(1, '11281'),
(1, '1131'),
(1, '1132'),
(1, '1133'),
(1, '1134'),
(1, '1141'),
(1, '1142'),
(1, '1143'),
(1, '1144'),
(1, '1145'),
(1, '1146'),
(1, '1151'),
(1, '1152'),
(1, '1153'),
(1, '2010'),
(1, '2011'),
(1, '20110'),
(1, '20111'),
(1, '20112'),
(1, '2012'),
(1, '2013'),
(1, '2014'),
(1, '2015'),
(1, '2016'),
(1, '2017'),
(1, '2018'),
(1, '2019'),
(1, '2111'),
(1, '2112'),
(1, '2113'),
(1, '2114'),
(1, '2211'),
(1, '3011'),
(1, '3012'),
(1, '3013'),
(1, '3014'),
(1, '3015'),
(1, '4011'),
(1, '40111'),
(1, '40112'),
(1, '40113'),
(1, '4012'),
(1, '4111'),
(1, '4112'),
(1, '4113'),
(1, '4114'),
(1, '5001'),
(1, '5011'),
(1, '50111'),
(1, '50112'),
(1, '50113'),
(1, '5012'),
(1, '6011'),
(1, '6012'),
(1, '6013'),
(1, '6014'),
(1, '6015'),
(1, '6016'),
(1, '6111'),
(1, '61110'),
(1, '61111'),
(1, '61112'),
(1, '61113'),
(1, '6112'),
(1, '6113'),
(1, '6114'),
(1, '6115'),
(1, '6116'),
(1, '6117'),
(1, '6118'),
(1, '6119'),
(1, '6211'),
(1, '6212'),
(1, '6213'),
(1, '6214'),
(1, '6215'),
(2, '1011'),
(2, '1012'),
(2, '1013'),
(2, '1021'),
(2, '1022'),
(2, '10222'),
(2, '1023'),
(2, '1024'),
(2, '1025'),
(2, '1026'),
(2, '1027'),
(2, '1028'),
(2, '1031'),
(2, '1032'),
(2, '1033'),
(2, '1111'),
(2, '1112'),
(2, '1113'),
(2, '1114'),
(2, '1121'),
(2, '1122'),
(2, '11221'),
(2, '1123'),
(2, '11231'),
(2, '1124'),
(2, '11241'),
(2, '1125'),
(2, '11251'),
(2, '1126'),
(2, '11261'),
(2, '1127'),
(2, '11271'),
(2, '1128'),
(2, '11281'),
(2, '1131'),
(2, '1132'),
(2, '1133'),
(2, '1134'),
(2, '1141'),
(2, '1142'),
(2, '1143'),
(2, '1144'),
(2, '1145'),
(2, '1146'),
(2, '1151'),
(2, '1152'),
(2, '1153'),
(2, '2010'),
(2, '2011'),
(2, '20110'),
(2, '20111'),
(2, '20112'),
(2, '2012'),
(2, '2013'),
(2, '2014'),
(2, '2015'),
(2, '2016'),
(2, '2017'),
(2, '2018'),
(2, '2019'),
(2, '2111'),
(2, '2112'),
(2, '2113'),
(2, '2114'),
(2, '2211'),
(2, '3011'),
(2, '3012'),
(2, '3013'),
(2, '3014'),
(2, '3015'),
(2, '4011'),
(2, '4012'),
(2, '4111'),
(2, '4112'),
(2, '4113'),
(2, '4114'),
(2, '5001'),
(2, '6011'),
(2, '6012'),
(2, '6013'),
(2, '6014'),
(2, '6015'),
(2, '6016'),
(2, '6111'),
(2, '61110'),
(2, '61111'),
(2, '61112'),
(2, '61113'),
(2, '6112'),
(2, '6113'),
(2, '6114'),
(2, '6115'),
(2, '6116'),
(2, '6117'),
(2, '6118'),
(2, '6119'),
(2, '6211'),
(2, '6212'),
(2, '6213'),
(2, '6214'),
(2, '6215');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio_fiscal`
--

CREATE TABLE `ejercicio_fiscal` (
  `idEjercicio_Fiscal` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Mes` varchar(30) NOT NULL,
  `Proc_Reg` int(11) NOT NULL,
  `Estado` varchar(15) NOT NULL,
  `Fecha_Fin` date NOT NULL,
  `Observaciones` varchar(255) NOT NULL,
  `Empresa_idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ejercicio_fiscal`
--

INSERT INTO `ejercicio_fiscal` (`idEjercicio_Fiscal`, `Fecha`, `Mes`, `Proc_Reg`, `Estado`, `Fecha_Fin`, `Observaciones`, `Empresa_idEmpresa`) VALUES
(3, '2021-02-10', 'Febrero', 1, 'Finalizado', '2021-04-22', 'Inicio de operaciones.', 8),
(6, '2021-03-01', 'Marzo', 1, 'Pendiente', '0000-00-00', 'Inicio de operaciones del mes.', 8),
(8, '2021-03-04', 'Enero', 1, 'Finalizado', '2021-03-18', 'Inicio de operaciones del Mes.', 9),
(10, '2021-02-11', 'Enero', 2, 'Pendiente', '0000-00-00', 'Inicio de operaciones del mes.', 8),
(13, '2021-03-12', 'Marzo', 2, 'Pendiente', '0000-00-00', 'Inicio de operaciones del mes.', 9),
(17, '2021-03-19', 'Agosto', 2, 'Pendiente', '0000-00-00', 'Inicio de operaciones del mes', 10),
(18, '2021-03-18', 'Abril', 1, 'Pendiente', '0000-00-00', 'inicio de operaciones', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `Telefono` varchar(45) NOT NULL,
  `Giro` varchar(45) NOT NULL,
  `RFC` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `Nombre`, `Direccion`, `Telefono`, `Giro`, `RFC`) VALUES
(8, 'Compu Libres SA', 'Calle 6 norte, B. Santiago s/n', '2761051234', 'Comercial', 'ROLJ000126HT'),
(9, 'Alpha y Omega S.A', 'Los Angeles, B.C.S, S/N', '276-129-7564', 'Comercial', 'APOTJHQWE123'),
(10, 'Microsoft', 'Los Angeles, B.C.S, S/N', '2761056783', 'Comercial', 'ROLJ000126HT'),
(11, 'MAC', 'calle 8', '2821048145', 'Industrial', 'GAGJNIJOP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `naturaleza`
--

CREATE TABLE `naturaleza` (
  `Codigo_Naturaleza` int(11) NOT NULL,
  `Tipo_Naturaleza` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `naturaleza`
--

INSERT INTO `naturaleza` (`Codigo_Naturaleza`, `Tipo_Naturaleza`) VALUES
(40, 'Debe'),
(50, 'Haber');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimiento_reg`
--

CREATE TABLE `procedimiento_reg` (
  `Codigo_Proc_Reg` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `procedimiento_reg`
--

INSERT INTO `procedimiento_reg` (`Codigo_Proc_Reg`, `Nombre`) VALUES
(1, 'Procedimiento Analítico '),
(2, 'Inventarios Perpetuos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_cuentas`
--

CREATE TABLE `reg_cuentas` (
  `idReg_Cuentas` int(11) NOT NULL,
  `Num_Poliza` int(11) NOT NULL,
  `Fecha_Factura` date NOT NULL,
  `Fecha_Reg` date NOT NULL,
  `cuentas_Codigo_Cuenta` varchar(45) NOT NULL,
  `Nombre_Cuenta` varchar(50) NOT NULL,
  `Concepto` varchar(100) NOT NULL,
  `Monto` double NOT NULL,
  `Codigo_Naturaleza` int(11) NOT NULL,
  `ejer_idEjercicio_Fiscal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reg_cuentas`
--

INSERT INTO `reg_cuentas` (`idReg_Cuentas`, `Num_Poliza`, `Fecha_Factura`, `Fecha_Reg`, `cuentas_Codigo_Cuenta`, `Nombre_Cuenta`, `Concepto`, `Monto`, `Codigo_Naturaleza`, `ejer_idEjercicio_Fiscal`) VALUES
(3, 1, '2021-02-02', '2021-02-10', '1012', 'Banco Nacional ', 'Aportación de los socios.', 1000000, 40, 3),
(4, 1, '2021-02-02', '2021-02-10', '3011', 'Capital suscrito ', 'Aportación de los socios.', 1000000, 50, 3),
(5, 2, '2021-02-03', '2021-02-10', '1121', 'Terrenos ', 'Compra de terreno.', 200000, 40, 3),
(6, 2, '2021-02-03', '2021-02-10', '1122', 'Edificios ', 'Compra de edificio.', 500000, 40, 3),
(7, 2, '2021-02-03', '2021-02-10', '1012', 'Banco Nacional ', 'Pago de las compras 50% al contado.', 350000, 50, 3),
(8, 2, '2021-02-03', '2021-02-10', '2113', 'Acreedores bancarios ', 'Pago de compra 50% a crédito.', 350000, 50, 3),
(12, 3, '2021-02-04', '2021-02-10', '1125', 'Mobiliarios y Equipos de Oficina', 'Compra de mobiliario y equipo.', 50000, 40, 3),
(13, 3, '2021-02-04', '2021-02-10', '1012', 'Banco Nacional ', 'Pago de mobiliario y equipo 40% contado.', 20000, 50, 3),
(14, 3, '2021-02-04', '2021-02-10', '2010', 'Acreedores', 'Compra de mobiliario y equipo 60% a crédito.', 30000, 50, 3),
(15, 4, '2021-02-05', '2021-02-10', '5011', 'Compras de mercancías', 'Compra de 10 computadoras.', 80000, 40, 3),
(16, 4, '2021-02-05', '2021-02-10', '1012', 'Banco Nacional ', 'Pago 60% al contado por las computadoras.', 48000, 50, 3),
(17, 4, '2021-02-05', '2021-02-10', '2012', 'Proveedores ', 'Pago 40% a crédito sobre las compras.', 32000, 50, 3),
(18, 5, '2021-02-06', '2021-02-10', '1022', 'Clientes', 'Venta de 5 computadoras, 50% crédito.', 25000, 40, 3),
(19, 5, '2021-02-06', '2021-02-10', '1012', 'Banco Nacional ', 'Venta de 5 computadoras, 50% contado.', 25000, 40, 3),
(20, 5, '2021-02-06', '2021-02-10', '4011', 'Ingresos por ventas ', 'Venta de 5 computadoras, 50% al contado y 50%', 50000, 50, 3),
(21, 6, '2021-02-06', '2021-02-10', '1027', 'Papelería y Útiles de oficina ', 'Compra de papelería.', 1000, 40, 3),
(22, 6, '2021-02-06', '2021-02-10', '1012', 'Banco Nacional ', 'Pago por compra de papelería.', 1000, 50, 3),
(23, 7, '2021-02-08', '2021-02-10', '40111', 'Devoluciones en ventas ', 'Devolución de una computadora.', 10000, 40, 3),
(24, 7, '2021-02-08', '2021-02-10', '1022', 'Clientes', 'Devolución de una computadora.', 10000, 50, 3),
(25, 8, '2021-02-11', '2021-02-12', '1124', 'Equipos de Transporte ', 'Compra de un vehículo para uso empresarial.', 120000, 40, 3),
(26, 8, '2021-02-11', '2021-02-12', '1012', 'Banco Nacional ', 'Compra de un vehículo para uso empresarial.', 120000, 50, 3),
(27, 9, '2021-02-11', '2021-02-12', '5011', 'Compras de mercancías', 'Compra de 50 computadoras 70% al contado y 30', 425000, 40, 3),
(29, 9, '2021-02-11', '2021-02-12', '1012', 'Banco Nacional ', 'Compra de 50 computadoras 70% al contado y 30', 297500, 50, 3),
(30, 9, '2021-02-11', '2021-02-12', '2011', 'Documentos por pagar ', 'Compra de 50 computadoras 70% al contado 30% ', 127500, 50, 3),
(31, 10, '2021-02-11', '2021-02-12', '1012', 'Banco Nacional ', 'Venta de 20 computadoras', 210000, 40, 3),
(32, 10, '2021-02-11', '2021-02-12', '4011', 'Ingresos por ventas ', 'Venta de 20 computadoras.', 210000, 50, 3),
(33, 11, '2021-02-11', '2021-02-12', '2011', 'Documentos por pagar ', 'Devoluciones sobre compra.', 42500, 40, 3),
(34, 11, '2021-02-11', '2021-02-12', '50111', 'Devoluciones en compras ', 'Devoluciones sobre compra.', 42500, 50, 3),
(35, 12, '2021-02-12', '2021-02-12', '50111', 'Devoluciones en compras ', 'Ajuste 1', 42500, 40, 3),
(36, 12, '2021-02-12', '2021-02-12', '5011', 'Compras de mercancías', 'Ajuste 1', 42500, 50, 3),
(37, 13, '2021-02-12', '2021-02-12', '4011', 'Ingresos por ventas ', 'Ajuste 2', 10000, 40, 3),
(38, 13, '2021-02-12', '2021-02-12', '40111', 'Devoluciones en ventas ', 'Ajuste 2', 10000, 50, 3),
(39, 14, '2021-02-12', '2021-02-12', '1031', 'Almacenes e inventarios ', 'Ajuste 3', 260500, 40, 3),
(40, 14, '2021-02-12', '2021-02-12', '5011', 'Compras de mercancías', 'Ajuste 3', 260500, 50, 3),
(44, 15, '2021-02-17', '2021-03-01', '5001', 'Costo de ventas', 'Ajuste 4', 202000, 40, 3),
(45, 15, '2021-02-17', '2021-03-01', '5011', 'Compras de mercancías', 'Ajuste 4', 202000, 50, 3),
(53, 1, '2021-02-02', '2021-03-02', '1012', 'Banco Nacional ', 'Saldos iniciales.', 150000, 40, 6),
(54, 1, '2021-02-02', '2021-03-02', '1122', 'Edificios ', 'Saldos iniciales.', 200000, 40, 6),
(55, 1, '2021-02-02', '2021-03-02', '1123', 'Maquinarias ', 'Saldos iniciales.', 100000, 40, 6),
(56, 1, '2021-02-02', '2021-03-02', '3011', 'Capital suscrito ', 'Saldos iniciales.', 450000, 50, 6),
(57, 2, '2021-02-03', '2021-03-02', '5011', 'Compras de mercancías', 'Compra de 30 cortadoras 50 contado y 50 crédi', 150000, 40, 6),
(58, 2, '2021-02-03', '2021-03-02', '1012', 'Banco Nacional ', 'Compra de 30 cortadoras 50 contado y 50 crédi', 75000, 50, 6),
(59, 2, '2021-02-03', '2021-03-02', '2012', 'Proveedores ', 'Compra de 30 cortadoras 50 contado y 50 crédi', 75000, 50, 6),
(60, 3, '2021-02-03', '2021-03-02', '2012', 'Proveedores ', 'Devolución del 10% de la mercancía.', 15000, 40, 6),
(61, 3, '2021-02-03', '2021-03-02', '5011', 'Compras de mercancías', 'Devolución del 10% de la mercancía.', 15000, 50, 6),
(62, 4, '2021-02-04', '2021-03-03', '1012', 'Banco Nacional ', 'Venta de 15 cortadoras, 70% contado y 30% cré', 94500, 40, 6),
(63, 4, '2021-02-04', '2021-03-03', '1022', 'Clientes', 'Venta de 15 cortadoras, 70% contado y 30% cré', 40500, 40, 6),
(64, 4, '2021-02-04', '2021-03-03', '4011', 'Ingresos por ventas ', 'Venta de 15 cortadoras, 70% contado y 30% cré', 135000, 50, 6),
(65, 5, '2021-02-05', '2021-03-03', '1127', 'Equipo de Cómputo', 'Adquisición de 5 computadoras 70% crédito, 30', 50000, 40, 6),
(66, 5, '2021-02-05', '2021-03-03', '1012', 'Banco Nacional ', 'Adquisición de 5 computadoras 70% crédito, 30', 15000, 50, 6),
(67, 5, '2021-02-05', '2021-03-03', '2010', 'Acreedores', 'Adquisición de 5 computadoras 70% crédito, 30', 35000, 50, 6),
(68, 6, '2021-02-06', '2021-03-03', '1124', 'Equipos de Transporte ', 'Adquisición de una camioneta, 20% contado, 80', 178000, 40, 6),
(69, 6, '2021-02-06', '2021-03-03', '1012', 'Banco Nacional ', 'Adquisición de una camioneta, 20% contado, 80', 35600, 50, 6),
(70, 6, '2021-02-06', '2021-03-03', '2113', 'Acreedores bancarios ', 'Adquisición de una camioneta, 20% contado, 80', 142400, 50, 6),
(71, 7, '2021-02-07', '2021-03-03', '1125', 'Mobiliarios y Equipos de Oficina', 'Compra de mobiliario, 40% contado, 40% crédit', 32000, 40, 6),
(72, 7, '2021-02-07', '2021-03-03', '1012', 'Banco Nacional ', 'Compra de mobiliario, 40% contado, 40% crédit', 12800, 50, 6),
(73, 7, '2021-02-07', '2021-03-03', '2010', 'Acreedores', 'Compra de mobiliario, 40% contado, 40% crédit', 12800, 50, 6),
(74, 7, '2021-02-07', '2021-03-03', '2011', 'Documentos por pagar ', 'Compra de mobiliario, 40% contado, 40% crédit', 6400, 50, 6),
(75, 8, '2021-02-08', '2021-03-03', '1022', 'Clientes', 'Venta de 10 cortadoras a crédito.', 92000, 40, 6),
(76, 8, '2021-02-08', '2021-03-03', '4011', 'Ingresos por ventas ', 'Venta de 10 cortadoras a crédito.', 92000, 50, 6),
(77, 9, '2021-02-09', '2021-03-03', '4011', 'Ingresos por ventas ', 'Los clientes devuelven 2 cortadoras.', 18400, 40, 6),
(78, 9, '2021-02-09', '2021-03-03', '1022', 'Clientes', 'Los clientes devuelven 2 cortadoras.', 18400, 50, 6),
(79, 10, '2021-02-10', '2021-03-03', '61112', 'Gastos de alquiler ', 'Gastos de administración y de ventas.', 23000, 40, 6),
(80, 10, '2021-02-10', '2021-03-03', '6014', 'Gastos de mercadotecnia ', 'Gastos de administración y de ventas.', 25000, 40, 6),
(81, 10, '2021-02-10', '2021-03-03', '1012', 'Banco Nacional ', 'Gastos de administración y de ventas.', 48000, 50, 6),
(83, 11, '2021-02-11', '2021-03-03', '1012', 'Banco Nacional ', 'Pago de intereses en efectivo.', 2500, 50, 6),
(84, 12, '2021-02-12', '2021-03-03', '1012', 'Banco Nacional ', 'Venta de desecho (Pago en Efectivo).', 3500, 40, 6),
(85, 12, '2021-02-12', '2021-03-03', '4113', 'Otros ingresos', 'Venta de desecho (Pago en Efectivo).', 3500, 50, 6),
(86, 13, '2021-02-12', '2021-03-03', '5001', 'Costo de ventas', 'Ajuste 1', 115000, 40, 6),
(87, 13, '2021-02-12', '2021-03-03', '5011', 'Compras de mercancías', 'Ajuste 1', 115000, 50, 6),
(88, 1, '2021-01-01', '2021-03-04', '1012', 'Banco Nacional ', 'Saldos iniciales', 50000, 40, 8),
(89, 1, '2021-01-01', '2021-03-04', '1031', 'Almacenes e inventarios ', 'Saldos iniciales', 50000, 40, 8),
(90, 1, '2021-01-01', '2021-03-04', '3011', 'Capital suscrito ', 'Saldos iniciales', 100000, 50, 8),
(91, 2, '2021-01-02', '2021-03-04', '5011', 'Compras de mercancías', 'Compra de mercancía 50% contado, 50% crédito.', 75000, 40, 8),
(92, 2, '2021-01-02', '2021-03-04', '1012', 'Banco Nacional ', 'Compra de mercancía 50% contado, 50% crédito.', 37500, 50, 8),
(93, 2, '2021-01-02', '2021-03-04', '2012', 'Proveedores ', 'Compra de mercancía 50% contado, 50% crédito.', 37500, 50, 8),
(94, 3, '2021-01-04', '2021-03-04', '5012', 'Gastos en compras ', 'Gastos de compra por $1,500.00', 1500, 40, 8),
(95, 3, '2021-01-04', '2021-03-04', '1012', 'Banco Nacional ', 'Gastos de compra por $1,500.00', 1500, 50, 8),
(96, 4, '2021-01-05', '2021-03-04', '1012', 'Banco Nacional ', 'Devolución de 500u, a $25.00', 12500, 40, 8),
(97, 4, '2021-01-05', '2021-03-04', '50111', 'Devoluciones en compras ', 'Devolución de 500u, a $25.00', 12500, 50, 8),
(98, 5, '2021-01-06', '2021-03-04', '2012', 'Proveedores ', 'Concesión de una Rebaja de $8,000.00.', 8000, 40, 8),
(99, 5, '2021-01-06', '2021-03-04', '50113', 'Rebajas en compras ', 'Concesión de una Rebaja de $8,000.00.', 8000, 50, 8),
(100, 6, '2021-01-07', '2021-03-04', '1022', 'Clientes', 'Venta de 3500u, a $40.00, 50% contado, 50% crédito.', 70000, 40, 8),
(101, 6, '2021-01-07', '2021-03-04', '1012', 'Banco Nacional ', 'Venta de 3500u, a $40.00, 50% contado, 50% crédito.', 70000, 40, 8),
(102, 6, '2021-01-07', '2021-03-04', '4011', 'Ingresos por ventas ', 'Venta de 3500u, a $40.00, 50% contado, 50% crédito.', 140000, 50, 8),
(103, 7, '2021-01-08', '2021-03-04', '40111', 'Devoluciones en ventas ', 'Devolución de la venta, 250u, a $40.00', 10000, 40, 8),
(104, 7, '2021-01-08', '2021-03-04', '1012', 'Banco Nacional ', 'Devolución de la venta, 250u, a $40.00', 10000, 50, 8),
(105, 8, '2021-01-08', '2021-03-04', '40113', 'Rebajas en ventas', 'Concesión de una rebaja de $15,000.00', 15000, 40, 8),
(106, 8, '2021-01-08', '2021-03-04', '1022', 'Clientes', 'Concesión de una rebaja de $15,000.00', 15000, 50, 8),
(107, 9, '2021-01-09', '2021-03-04', '1031', 'Almacenes e inventarios ', 'Registro del inventario final.', 31250, 40, 8),
(108, 9, '2021-01-09', '2021-03-04', '5011', 'Compras de mercancías', 'Registro del inventario final.', 31250, 50, 8),
(109, 10, '2021-01-11', '2021-03-04', '6113', 'Gastos de suministros de oficina ', 'Compra de papelería por $7,200.00 para el área de Administración.', 7200, 40, 8),
(110, 10, '2021-01-11', '2021-03-04', '2010', 'Acreedores', 'Compra de papelería por $7,200.00 para el área de Administración.', 7200, 50, 8),
(111, 11, '2021-01-12', '2021-03-04', '6012', 'Gastos de publicidad ', '$4,000.00 con cheque a una compañía de publicidad para el área de ventas.', 4000, 40, 8),
(112, 11, '2021-01-12', '2021-03-04', '1012', 'Banco Nacional ', '$4,000.00 con cheque a una compañía de publicidad para el área de ventas.', 4000, 50, 8),
(113, 12, '2021-01-13', '2021-03-04', '6213', 'Gastos de servicios bancarios ', '$1,500.00 por concepto de comisiones bancarias.', 1500, 40, 8),
(114, 12, '2021-01-13', '2021-03-04', '1012', 'Banco Nacional ', '$1,500.00 por concepto de comisiones bancarias.', 1500, 50, 8),
(115, 13, '2021-01-14', '2021-03-04', '61112', 'Gastos de alquiler ', '$10,000.00 en efectivo por concepto de arrendamiento del edificio administrativo.', 10000, 40, 8),
(116, 13, '2021-01-14', '2021-03-04', '1012', 'Banco Nacional ', '$10,000.00 en efectivo por concepto de arrendamiento del edificio administrativo.', 10000, 50, 8),
(117, 14, '2021-01-15', '2021-03-04', '1012', 'Banco Nacional ', 'Desecho mobiliario dado de baja por $5,000.00 nos lo pagan de contado.', 5000, 40, 8),
(118, 14, '2021-01-15', '2021-03-04', '4114', 'Ganancias en ventas de activos fijos ', 'Desecho mobiliario dado de baja por $5,000.00 nos lo pagan de contado.', 5000, 50, 8),
(119, 15, '2021-01-16', '2021-03-04', '6015', 'Gastos de transporte ', 'Se pagan $2,000.00 por concepto de combustibles para el equipo de transporte del área de ventas.', 2000, 40, 8),
(120, 15, '2021-01-16', '2021-03-04', '1012', 'Banco Nacional ', 'Se pagan $2,000.00 por concepto de combustibles para el equipo de transporte del área de ventas.', 2000, 50, 8),
(121, 16, '2021-01-18', '2021-03-04', '1012', 'Banco Nacional ', '$2,500.00 por concepto de intereses ganados.', 2500, 40, 8),
(122, 16, '2021-01-18', '2021-03-04', '4112', 'Ingresos por comisiones ', '$2,500.00 por concepto de intereses ganados.', 2500, 50, 8),
(123, 17, '2021-01-19', '2021-03-04', '20112', 'Impuestos y derechos por pagar', 'Cargo del PTU a la cuenta de Impuestos.', 1705, 40, 8),
(124, 17, '2021-01-19', '2021-03-04', '20110', 'PTU por pagar', 'Cargo del PTU a la cuenta de Impuestos.', 1705, 50, 8),
(125, 18, '2021-01-20', '2021-03-04', '20112', 'Impuestos y derechos por pagar', 'Cargo del ISR al la cuenta de impuestos.', 6403.5, 40, 8),
(126, 18, '2021-01-20', '2021-03-04', '2018', 'Impuesto sobre la renta por pagar ', 'Cargo del ISR al la cuenta de impuestos.', 6403.5, 50, 8),
(127, 19, '2021-01-20', '2021-03-04', '4011', 'Ingresos por ventas ', 'Ajuste 1 para obtener ventas netas.', 25000, 40, 8),
(128, 19, '2021-01-20', '2021-03-04', '40111', 'Devoluciones en ventas ', 'Ajuste 1 para obtener ventas netas.', 10000, 50, 8),
(129, 19, '2021-01-20', '2021-03-04', '40113', 'Rebajas en ventas', 'Ajuste 1 para obtener ventas netas.', 15000, 50, 8),
(130, 20, '2021-01-20', '2021-03-04', '5011', 'Compras de mercancías', 'Ajuste 2, para sumar a las compras el inventario inicial.', 50000, 40, 8),
(131, 20, '2021-01-20', '2021-03-04', '1031', 'Almacenes e inventarios ', 'Ajuste 2, para sumar a las compras el inventario inicial.', 50000, 50, 8),
(132, 21, '2021-01-21', '2021-03-04', '5011', 'Compras de mercancías', 'Ajuste 3, para determinar las compras totales.', 1500, 40, 8),
(133, 21, '2021-01-21', '2021-03-04', '5012', 'Gastos en compras ', 'Ajuste 3, para determinar las compras totales.', 1500, 50, 8),
(134, 22, '2021-01-21', '2021-03-04', '50111', 'Devoluciones en compras ', 'Ajuste 4, para determinar las compras netas.', 12500, 40, 8),
(135, 22, '2021-01-21', '2021-03-04', '50113', 'Rebajas en compras ', 'Ajuste 4, para determinar las compras netas.', 8000, 40, 8),
(136, 22, '2021-01-21', '2021-03-04', '5011', 'Compras de mercancías', 'Ajuste 4, para determinar las compras netas.', 20500, 50, 8),
(137, 22, '2021-01-21', '2021-03-04', '5001', 'Costo de ventas', 'Ajuste 5, para registrar el costo de ventas', 74750, 40, 8),
(138, 22, '2021-01-21', '2021-03-04', '5011', 'Compras de mercancías', 'Ajuste 5, para registrar el costo de ventas', 74750, 50, 8),
(139, 11, '2021-02-11', '2021-03-06', '6211', 'Gastos de intereses sobre préstamos ', 'Pago de intereses.', 2500, 40, 6),
(140, 14, '2021-02-12', '2021-03-06', '20112', 'Impuestos y derechos por pagar', 'ISR por pagar.', 13980, 40, 6),
(141, 14, '2021-02-12', '2021-03-06', '2018', 'Impuesto sobre la renta por pagar ', 'ISR por pagar.', 13980, 50, 6),
(142, 14, '2021-02-15', '2021-03-06', '1031', 'Almacenes e inventarios ', 'Ajuste. Cancelación de compras.', 20000, 40, 6),
(143, 14, '2021-02-15', '2021-03-06', '5011', 'Compras de mercancías', 'Ajuste. Cancelación de compras.', 20000, 50, 6),
(166, 1, '2021-01-01', '2021-03-12', '1012', 'Banco Nacional ', 'Saldos iniciales.', 1000000, 40, 10),
(167, 1, '2021-01-01', '2021-03-12', '3011', 'Capital suscrito ', 'Saldos iniciales.', 1000000, 50, 10),
(172, 2, '2021-01-02', '2021-03-12', '1121', 'Terrenos ', 'Compra de terreno y edificio 50% contado, 50% crédito bancario.', 200000, 40, 10),
(173, 2, '2021-01-02', '2021-03-12', '1122', 'Edificios ', 'Compra de terreno y edificio 50% contado, 50% crédito bancario.', 500000, 40, 10),
(174, 2, '2021-01-02', '2021-03-12', '1012', 'Banco Nacional ', 'Compra de terreno y edificio 50% contado, 50% crédito bancario.', 350000, 50, 10),
(175, 2, '2021-01-02', '2021-03-12', '2113', 'Acreedores bancarios ', 'Compra de terreno y edificio 50% contado, 50% crédito bancario.', 350000, 50, 10),
(182, 3, '2021-01-04', '2021-03-12', '1125', 'Mobiliarios y Equipos de Oficina', 'Compra de muebles, 40% contado, 60% crédito.', 50000, 40, 10),
(183, 3, '2021-01-04', '2021-03-12', '1012', 'Banco Nacional ', 'Compra de muebles, 40% contado, 60% crédito.', 20000, 50, 10),
(184, 3, '2021-01-04', '2021-03-12', '2010', 'Acreedores', 'Compra de muebles, 40% contado, 60% crédito.', 30000, 50, 10),
(186, 4, '2021-01-05', '2021-03-12', '1031', 'Almacenes e inventarios ', 'Compra de 10 computadoras, 60% contado y resto a crédito.', 80000, 40, 10),
(187, 4, '2021-01-05', '2021-03-12', '1012', 'Banco Nacional ', 'Compra de 10 computadoras, 60% contado y resto a crédito.', 48000, 50, 10),
(188, 4, '2021-01-05', '2021-03-12', '2012', 'Proveedores ', 'Compra de 10 computadoras, 60% contado y resto a crédito.', 32000, 50, 10),
(189, 5, '2021-01-06', '2021-03-12', '1022', 'Clientes', 'Venta de 5 computadoras, 50% contado, 50% crédito.', 25000, 40, 10),
(190, 5, '2021-01-06', '2021-03-12', '1012', 'Banco Nacional ', 'Venta de 5 computadoras, 50% contado, 50% crédito.', 25000, 40, 10),
(191, 5, '2021-01-06', '2021-03-12', '4011', 'Ingresos por ventas ', 'Venta de 5 computadoras, 50% contado, 50% crédito.', 50000, 50, 10),
(192, 6, '2021-01-07', '2021-03-12', '5001', 'Costo de ventas', 'Costo de la Venta de la póliza 5.', 40000, 40, 10),
(193, 6, '2021-01-07', '2021-03-12', '1031', 'Almacenes e inventarios ', 'Costo de la venta de la póliza 5.', 40000, 50, 10),
(194, 7, '2021-01-08', '2021-03-12', '1027', 'Papelería y Útiles de oficina ', 'Compra de material de escritorio, se paga al contado.', 1000, 40, 10),
(195, 7, '2021-01-08', '2021-03-12', '1012', 'Banco Nacional ', 'Compra de material de escritorio, se paga al contado.', 1000, 50, 10),
(196, 8, '2021-01-09', '2021-03-12', '4011', 'Ingresos por ventas ', 'Los clientes devuelven una computadora.', 10000, 40, 10),
(197, 8, '2021-01-09', '2021-03-12', '1022', 'Clientes', 'Los clientes devuelven una computadora.', 10000, 50, 10),
(198, 9, '2021-01-11', '2021-03-12', '1031', 'Almacenes e inventarios ', 'Ajuste de costo de ventas de la póliza 7.', 8000, 40, 10),
(199, 9, '2021-01-11', '2021-03-12', '5001', 'Costo de ventas', 'Ajuste de costo de ventas de la póliza 7.', 8000, 50, 10),
(200, 10, '2021-01-12', '2021-03-12', '1124', 'Equipos de Transporte ', 'Compra de un vehículo, se paga al contado.', 120000, 40, 10),
(201, 10, '2021-01-12', '2021-03-12', '1012', 'Banco Nacional ', 'Compra de un vehículo, se paga al contado.', 120000, 50, 10),
(202, 11, '2021-01-13', '2021-03-12', '1031', 'Almacenes e inventarios ', 'Compra de 50 computadoras, se paga 70% contado y 30% Doc x pag.', 425000, 40, 10),
(203, 11, '2021-01-13', '2021-03-12', '1012', 'Banco Nacional ', 'Compra de 50 computadoras, se paga 70% contado y 30% Doc x pag.', 297500, 50, 10),
(204, 11, '2021-01-13', '2021-03-12', '2011', 'Documentos por pagar ', 'Compra de 50 computadoras, se paga 70% contado y 30% Doc x pag.', 127500, 50, 10),
(205, 12, '2021-01-14', '2021-03-12', '1012', 'Banco Nacional ', 'Venta de 20 computadoras que las pagan al contado.', 210000, 40, 10),
(206, 12, '2021-01-14', '2021-03-12', '4011', 'Ingresos por ventas ', 'Venta de 20 computadoras que las pagan al contado.', 210000, 50, 10),
(207, 13, '2021-01-15', '2021-03-12', '5001', 'Costo de ventas', 'Costo de la venta de la póliza 12.', 170000, 40, 10),
(208, 13, '2021-01-15', '2021-03-12', '1031', 'Almacenes e inventarios ', 'Costo de la venta de la póliza 12.', 170000, 50, 10),
(209, 14, '2021-02-15', '2021-03-12', '2011', 'Documentos por pagar ', 'Devolución de 5 computadoras a los proveedores por defectos.', 42500, 40, 10),
(210, 14, '2021-02-15', '2021-03-12', '1031', 'Almacenes e inventarios ', 'Devolución de 5 computadoras a los proveedores por defectos.', 42500, 50, 10),
(211, 1, '2021-03-01', '2021-03-12', '1012', 'Banco Nacional ', 'Saldos iniciales.', 50000, 40, 13),
(212, 1, '2021-03-01', '2021-03-12', '1031', 'Almacenes e inventarios ', 'Saldos iniciales.', 50000, 40, 13),
(213, 1, '2021-03-01', '2021-03-12', '3011', 'Capital suscrito ', 'Saldos iniciales.', 100000, 50, 13),
(214, 2, '2021-03-02', '2021-03-12', '1031', 'Almacenes e inventarios ', 'Compra de mercancías.', 75000, 40, 13),
(215, 2, '2021-03-02', '2021-03-12', '1026', 'IVA Acreditable ', 'Compra de mercancías.', 11250, 40, 13),
(216, 2, '2021-03-02', '2021-03-12', '1012', 'Banco Nacional ', 'Compra de mercancías.', 43125, 50, 13),
(217, 2, '2021-03-02', '2021-03-12', '2012', 'Proveedores ', 'Compra de mercancías.', 43125, 50, 13),
(218, 3, '2021-03-03', '2021-03-12', '1031', 'Almacenes e inventarios ', 'Gastos de las compras de la póliza 2.', 1500, 40, 13),
(219, 3, '2021-03-03', '2021-03-12', '1026', 'IVA Acreditable ', 'Gastos de las compras de la póliza 2.', 225, 40, 13),
(222, 3, '2021-03-03', '2021-03-12', '1012', 'Banco Nacional ', 'Gastos por las compras de la póliza 2.', 1725, 50, 13),
(223, 4, '2021-03-04', '2021-03-12', '1012', 'Banco Nacional ', 'Devolución de mercancías por defecto.', 14375, 40, 13),
(224, 4, '2021-03-04', '2021-03-12', '1031', 'Almacenes e inventarios ', 'Devolución de mercancías por defecto.', 12500, 50, 13),
(225, 4, '2021-03-04', '2021-03-12', '1026', 'IVA Acreditable ', 'Devolución de mercancías por defecto.', 1875, 50, 13),
(226, 5, '2021-03-05', '2021-03-12', '2012', 'Proveedores ', 'Los proveedores conceden rebajas.', 9200, 40, 13),
(227, 5, '2021-03-05', '2021-03-12', '1031', 'Almacenes e inventarios ', 'Los proveedores conceden rebajas.', 8000, 50, 13),
(228, 5, '2021-03-05', '2021-03-12', '1026', 'IVA Acreditable ', 'Los proveedores conceden rebajas.', 1200, 50, 13),
(229, 6, '2021-03-06', '2021-03-12', '1012', 'Banco Nacional ', 'Venta de mercancías, 50% contado, %0% crédito.', 80500, 40, 13),
(230, 6, '2021-03-06', '2021-03-12', '1022', 'Clientes', 'Venta de mercancías, 50% contado, %0% crédito.', 80500, 40, 13),
(231, 6, '2021-03-06', '2021-03-12', '4011', 'Ingresos por ventas ', 'Venta de mercancías, 50% contado, %0% crédito.', 140000, 50, 13),
(232, 6, '2021-03-06', '2021-03-12', '2019', 'IVA causado ', 'Venta de mercancías, 50% contado, %0% crédito.', 21000, 50, 13),
(233, 7, '2021-03-06', '2021-03-12', '5001', 'Costo de ventas', 'Costo de ventas de la póliza 6.', 87500, 40, 13),
(234, 7, '2021-03-06', '2021-03-12', '1031', 'Almacenes e inventarios ', 'Costo de ventas de la póliza 6.', 87500, 50, 13),
(235, 8, '2021-03-08', '2021-03-12', '4011', 'Ingresos por ventas ', 'Devolución de mercancía por parte de los clientes.', 10000, 40, 13),
(236, 8, '2021-03-08', '2021-03-12', '2019', 'IVA causado ', 'Devolución de mercancía por parte de los clientes.', 1500, 40, 13),
(237, 8, '2021-03-08', '2021-03-12', '1012', 'Banco Nacional ', 'Devolución de mercancía por parte de los clientes.', 11500, 50, 13),
(238, 9, '2021-03-08', '2021-03-12', '1031', 'Almacenes e inventarios ', 'Devolución de la venta a precio de costo.', 6250, 40, 13),
(239, 9, '2021-03-08', '2021-03-12', '5001', 'Costo de ventas', 'Devolución de la venta a precio de costo.', 6250, 50, 13),
(240, 10, '2021-03-09', '2021-03-12', '4011', 'Ingresos por ventas ', 'Concesión de rebajas a los clientes.', 15000, 40, 13),
(241, 10, '2021-03-09', '2021-03-12', '2019', 'IVA causado ', 'Concesión de rebajas a los clientes.', 2250, 40, 13),
(242, 10, '2021-03-09', '2021-03-12', '1022', 'Clientes', 'Concesión de rebajas a los clientes.', 17250, 50, 13),
(243, 11, '2021-03-10', '2021-03-12', '6113', 'Gastos de suministros de oficina ', 'Compra de papelería para el área de administración.', 7200, 40, 13),
(244, 11, '2021-03-10', '2021-03-12', '2010', 'Acreedores', 'Compra de papelería para el área de administración.', 7200, 50, 13),
(245, 12, '2021-03-11', '2021-03-12', '6012', 'Gastos de publicidad ', 'Gastos de publicidad para el área de ventas.', 4000, 40, 13),
(246, 12, '2021-03-11', '2021-03-12', '1012', 'Banco Nacional ', 'Gastos de publicidad para el área de ventas.', 4000, 50, 13),
(247, 13, '2021-03-12', '2021-03-12', '6213', 'Gastos de servicios bancarios ', '1,500.00 por concepto de comisiones bancarias.', 1500, 40, 13),
(248, 13, '2021-03-12', '2021-03-12', '1012', 'Banco Nacional ', '1,500.00 por concepto de comisiones bancarias.', 1500, 50, 13),
(249, 14, '2021-03-13', '2021-03-12', '61112', 'Gastos de alquiler ', '10,000 en efectivo por concepto de arrendamiento del edificio administrativo.', 10000, 40, 13),
(250, 14, '2021-03-13', '2021-03-12', '1012', 'Banco Nacional ', '10,000 en efectivo por concepto de arrendamiento del edificio administrativo.', 10000, 50, 13),
(251, 15, '2021-03-14', '2021-03-12', '1012', 'Banco Nacional ', 'Desecho mobiliario dado de baja por 5,000.00 nos lo pagan de contado.', 5000, 40, 13),
(252, 15, '2021-03-14', '2021-03-12', '4114', 'Ganancias en ventas de activos fijos ', 'Desecho mobiliario dado de baja por 5,000.00 nos lo pagan de contado.', 5000, 50, 13),
(253, 16, '2021-03-15', '2021-03-12', '6015', 'Gastos de transporte ', 'Paga 2000 por concepto de combustibles para el equipo de transporte.', 2000, 40, 13),
(254, 16, '2021-03-15', '2021-03-12', '1012', 'Banco Nacional ', 'Paga 2000 por concepto de combustibles para el equipo de transporte.', 2000, 50, 13),
(255, 17, '2021-03-16', '2021-03-12', '1012', 'Banco Nacional ', '2,500 por concepto de intereses ganados.', 2500, 40, 13),
(256, 17, '2021-03-16', '2021-03-12', '4112', 'Ingresos por comisiones ', '2,500 por concepto de intereses ganados.', 2500, 50, 13),
(257, 18, '2021-03-17', '2021-03-12', '20112', 'Impuestos y derechos por pagar', 'Impuestos.', 1055, 40, 13),
(258, 18, '2021-03-17', '2021-03-12', '20110', 'PTU por pagar', 'Impuestos.', 1055, 50, 13),
(259, 19, '2021-03-18', '2021-03-12', '20112', 'Impuestos y derechos por pagar', 'ISR.', 4648.5, 40, 13),
(260, 19, '2021-03-18', '2021-03-12', '2018', 'Impuesto sobre la renta por pagar ', 'ISR.', 4648.5, 50, 13),
(264, 1, '2021-03-01', '2021-03-19', '6015', 'Gastos de transporte ', 'Compra de gasolina', 500, 40, 17),
(265, 1, '2021-03-01', '2021-03-19', '1012', 'Banco Nacional ', 'Compra de gasolina', 500, 50, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Nombre` varchar(45) NOT NULL,
  `APP` varchar(45) NOT NULL,
  `APM` varchar(45) NOT NULL,
  `Tel` varchar(15) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Contrasena` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Nombre`, `APP`, `APM`, `Tel`, `Email`, `Contrasena`) VALUES
('GRACIELA', 'ARROYO', 'GARCÍA', '282-104-4581', 'chelisarrollo@gmail.com', '230200'),
('JORGE', 'ROMERO', 'LOPEZ', '2761051234', 'jorgeromero65932@gmail.com', '1234'),
('RICARDO', 'MARTINEZ', 'HERNANDEZ', '276-127-6329', 'ricardomtnezhdez@gmail.com', '4040');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_empresa`
--

CREATE TABLE `usuarios_empresa` (
  `U_Email` varchar(45) NOT NULL,
  `idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios_empresa`
--

INSERT INTO `usuarios_empresa` (`U_Email`, `idEmpresa`) VALUES
('chelisarrollo@gmail.com', 11),
('jorgeromero65932@gmail.com', 8),
('jorgeromero65932@gmail.com', 10),
('ricardomtnezhdez@gmail.com', 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clasificacion_c`
--
ALTER TABLE `clasificacion_c`
  ADD PRIMARY KEY (`idClasificacion_Cuentas`);

--
-- Indices de la tabla `clasificacion_cuentas`
--
ALTER TABLE `clasificacion_cuentas`
  ADD PRIMARY KEY (`Clasificacion_Cuentas`,`Cuentas_Codigo_Cuenta`,`ClasifPrincipal_id_Recurso`),
  ADD KEY `fk_Clasificacion_Cuentas_has_Cuentas_Cuentas1_idx` (`Cuentas_Codigo_Cuenta`),
  ADD KEY `fk_Clasificacion_Cuentas_has_Cuentas_Clasificacion_Cuentas1_idx` (`Clasificacion_Cuentas`),
  ADD KEY `fk_clasificacion_cuentas_ClasifPrincipal1_idx` (`ClasifPrincipal_id_Recurso`);

--
-- Indices de la tabla `clasifprincipal`
--
ALTER TABLE `clasifprincipal`
  ADD PRIMARY KEY (`id_Recurso`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`Codigo_Cuenta`);

--
-- Indices de la tabla `cuentas_info`
--
ALTER TABLE `cuentas_info`
  ADD PRIMARY KEY (`Codigo_Cuenta`,`Codigo_Proc_Reg`),
  ADD KEY `fk_Cuentas_Info_Procedimiento_Reg1_idx` (`Codigo_Proc_Reg`);

--
-- Indices de la tabla `cuentas_proc_reg`
--
ALTER TABLE `cuentas_proc_reg`
  ADD PRIMARY KEY (`Codigo_Proc_Reg`,`Codigo_Cuenta`),
  ADD KEY `fk_Cuentas_Proc_Reg_Cuentas1_idx` (`Codigo_Cuenta`);

--
-- Indices de la tabla `ejercicio_fiscal`
--
ALTER TABLE `ejercicio_fiscal`
  ADD PRIMARY KEY (`idEjercicio_Fiscal`,`Proc_Reg`,`Empresa_idEmpresa`),
  ADD KEY `fk_Ejercicio_Fiscal_Empresa1_idx` (`Empresa_idEmpresa`),
  ADD KEY `fk_Ejercicio_Fiscal_Procedimiento_Reg1_idx` (`Proc_Reg`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Indices de la tabla `naturaleza`
--
ALTER TABLE `naturaleza`
  ADD PRIMARY KEY (`Codigo_Naturaleza`);

--
-- Indices de la tabla `procedimiento_reg`
--
ALTER TABLE `procedimiento_reg`
  ADD PRIMARY KEY (`Codigo_Proc_Reg`);

--
-- Indices de la tabla `reg_cuentas`
--
ALTER TABLE `reg_cuentas`
  ADD PRIMARY KEY (`idReg_Cuentas`,`cuentas_Codigo_Cuenta`,`Codigo_Naturaleza`,`ejer_idEjercicio_Fiscal`),
  ADD KEY `fk_Reg_Cuentas_Naturaleza1_idx` (`Codigo_Naturaleza`),
  ADD KEY `fk_reg_cuentas_cuentas1_idx` (`cuentas_Codigo_Cuenta`),
  ADD KEY `fk_reg_cuentas_ejercicio_fiscal1_idx` (`ejer_idEjercicio_Fiscal`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Email`);

--
-- Indices de la tabla `usuarios_empresa`
--
ALTER TABLE `usuarios_empresa`
  ADD PRIMARY KEY (`U_Email`,`idEmpresa`),
  ADD KEY `fk_Usuarios_has_Empresa_Empresa1_idx` (`idEmpresa`),
  ADD KEY `fk_Usuarios_has_Empresa_Usuarios1_idx` (`U_Email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ejercicio_fiscal`
--
ALTER TABLE `ejercicio_fiscal`
  MODIFY `idEjercicio_Fiscal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `naturaleza`
--
ALTER TABLE `naturaleza`
  MODIFY `Codigo_Naturaleza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `procedimiento_reg`
--
ALTER TABLE `procedimiento_reg`
  MODIFY `Codigo_Proc_Reg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reg_cuentas`
--
ALTER TABLE `reg_cuentas`
  MODIFY `idReg_Cuentas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clasificacion_cuentas`
--
ALTER TABLE `clasificacion_cuentas`
  ADD CONSTRAINT `fk_Clasificacion_Cuentas_has_Cuentas_Clasificacion_Cuentas1` FOREIGN KEY (`Clasificacion_Cuentas`) REFERENCES `clasificacion_c` (`idClasificacion_Cuentas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Clasificacion_Cuentas_has_Cuentas_Cuentas1` FOREIGN KEY (`Cuentas_Codigo_Cuenta`) REFERENCES `cuentas` (`Codigo_Cuenta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_clasificacion_cuentas_ClasifPrincipal1` FOREIGN KEY (`ClasifPrincipal_id_Recurso`) REFERENCES `clasifprincipal` (`id_Recurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cuentas_info`
--
ALTER TABLE `cuentas_info`
  ADD CONSTRAINT `fk_Cuentas_Info_Procedimiento_Reg1` FOREIGN KEY (`Codigo_Proc_Reg`) REFERENCES `procedimiento_reg` (`Codigo_Proc_Reg`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cuentas_proc_reg`
--
ALTER TABLE `cuentas_proc_reg`
  ADD CONSTRAINT `fk_Cuentas_Proc_Reg_Cuentas1` FOREIGN KEY (`Codigo_Cuenta`) REFERENCES `cuentas` (`Codigo_Cuenta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cuentas_Proc_Reg_Procedimiento_Reg1` FOREIGN KEY (`Codigo_Proc_Reg`) REFERENCES `procedimiento_reg` (`Codigo_Proc_Reg`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ejercicio_fiscal`
--
ALTER TABLE `ejercicio_fiscal`
  ADD CONSTRAINT `fk_Ejercicio_Fiscal_Empresa1` FOREIGN KEY (`Empresa_idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ejercicio_Fiscal_Procedimiento_Reg1` FOREIGN KEY (`Proc_Reg`) REFERENCES `procedimiento_reg` (`Codigo_Proc_Reg`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reg_cuentas`
--
ALTER TABLE `reg_cuentas`
  ADD CONSTRAINT `fk_Reg_Cuentas_Naturaleza1` FOREIGN KEY (`Codigo_Naturaleza`) REFERENCES `naturaleza` (`Codigo_Naturaleza`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reg_cuentas_cuentas1` FOREIGN KEY (`cuentas_Codigo_Cuenta`) REFERENCES `cuentas` (`Codigo_Cuenta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reg_cuentas_ejercicio_fiscal1` FOREIGN KEY (`ejer_idEjercicio_Fiscal`) REFERENCES `ejercicio_fiscal` (`idEjercicio_Fiscal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios_empresa`
--
ALTER TABLE `usuarios_empresa`
  ADD CONSTRAINT `fk_Usuarios_has_Empresa_Empresa1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuarios_has_Empresa_Usuarios1` FOREIGN KEY (`U_Email`) REFERENCES `usuarios` (`Email`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
