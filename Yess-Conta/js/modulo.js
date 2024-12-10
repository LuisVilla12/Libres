angular.module("miModulo", ['ngRoute', 'angularUtils.directives.dirPagination'])
	.config(function ($routeProvider, $locationProvider) {
		$routeProvider
			.when('/inicio', {
				templateUrl: 'templates/inicio.html',
				controller: 'inicioController'
			})
			.when('/newEjercicio', {
				templateUrl: 'templates/newEjercicio.html',
				controller: 'newEjercicioController'
			})
			.when('/registro', {
				templateUrl: 'templates/registroCuentas.html',
				controller: 'registroController'
			})
			.when('/polizas', {
				templateUrl: 'templates/polizas.html',
				controller: 'polizaController'
			})
			.when('/reportes', {
				templateUrl: 'templates/reportes.html',
				controller: 'reportesController'
			})
			.when('/EdoResultados', {
				templateUrl: 'templates/estadoResultados.html',
				controller: 'resultadosController'
			})
			.when('/Balance', {
				templateUrl: 'templates/balanceGral.html',
				controller: 'balanceController'
			})
			.otherwise({
				redirectTo: '/inicio'
			});
	})
	///////////////////////////SERVICIOS/////////////////////////////
	.service('servProcediCRUD', function ($http) {
		var urlServidor = "http://192.168.9.238/yess_conta/Yess-Conta/ServiceTREBOL/controller/procedimiento_reg_db_controller.php";
		return {
			obtProcedimientos: function () {
				return $http.get(urlServidor);
			}
		};
	})

	.service('servSesionCRUD', function ($http) {
		var urlServidor = "http://192.168.9.238/yess_conta/Yess-Conta/ServiceTREBOL/controller/inicioSesion_db_controller.php";
		return {
			iniciarSesion: function (sesion) {
				return $http.post(urlServidor, sesion);
			}

		};
	})


	.service('servnewEjerCRUD', function ($http) {
		var urlServidor = "http://192.168.9.238/yess_conta/Yess-Conta/ServiceTREBOL/controller/newEjercicio_db_controller.php";
		return {
			obtEjercicios: function (idEmpresa) {//consulta todos los ejercicios de una empresa
				return $http.get(urlServidor + "?idEmpresa=" + idEmpresa);
			},
			resgistarEjercicio: function (Ejercicio) {
				return $http.post(urlServidor, Ejercicio);
			},
			updateDatos: function(updateInfo){
                return $http.put(urlServidor, updateInfo);
			},
			obtMesEjer: function (id) {//consulta todos los ejercicios de una empresa
				return $http.get(urlServidor + "?id=" + id);
		    },
		    obtStatusEjer: function(idEjercicio){
                return $http.get(urlServidor + "?idEjercicio=" + idEjercicio);
		    },
			deleteEjercicio: function (idEjercicio_Fiscal) {
				return $http.delete(urlServidor+"?idEjercicio_Fiscal="+idEjercicio_Fiscal);			
			}
		};
	})
	.service('servEmpresaCRUD', function ($http) {
		var urlServidor = "http://192.168.9.238/yess_conta/Yess-Conta/ServiceTREBOL/controller/empresa_db_controller.php";
		return {
			obtEmpresas: function (Email) {//consulta todos las empresas
				return $http.get(urlServidor + "?Email=" + Email);
			},
			obtDatosEmpresa: function (idEmpresa) {//consulta una empresa
				return $http.get(urlServidor + "?idEmpresa=" + idEmpresa);
			},
			guardarEmpresa: function (Empresa) {
				return $http.post(urlServidor, Empresa);
			},
			obtNombreEmp: function(id){
				return $http.get(urlServidor + "?id=" + id);
			}
		};
	})
	.service('servUsuaEmpCRUD', function ($http) {
		var urlServidor = "http://192.168.9.238/yess_conta/Yess-Conta/ServiceTREBOL/controller/usuarios_empresa_db_controller.php";
		return {
			guardarUsuaEmpresa: function (array2) {
				return $http.post(urlServidor, array2);
			}
		};
	})
	.service('servRegistCuentasCRUD', function ($http) {
		var urlServidor = "http://192.168.9.238/yess_conta/Yess-Conta/ServiceTREBOL/controller/registro_cuentas_db_controller.php";
		return {
			obtNaturaleza: function () {
				return $http.get(urlServidor);
			},
			obtRegistCuentas: function (idEjercicio) {
				return $http.get(urlServidor + "?idEjercicio=" + idEjercicio);
			},
			obtCuentasInfo: function(RegistroConsul){
                return $http.get(urlServidor + "?RegistroConsul=" + RegistroConsul);
			},
			findCuenta: function (Arreglo) {
				return $http.get(urlServidor + "?Arreglo=" + Arreglo);
			},
			insertRegist: function (Registro) {
				return $http.post(urlServidor, Registro);
			},
			ActualizarRegist: function (Registro) {
				return $http.put(urlServidor, Registro);
			},
			eliminarAsiento: function (idRegistro) {
				return $http.delete(urlServidor+"?idRegistro="+idRegistro);			
			},
			deleteRegistros: function (RegistroId) {
				return $http.delete(urlServidor+"?RegistroId="+RegistroId);			
			},
			obtSaldoCargo: function (datos) {
				return $http.get(urlServidor + "?datos=" + datos);
			},
			obtSaldoAbono: function (Abono) {
				return $http.get(urlServidor + "?Abono=" + Abono);
			},
			obtDatosEdoResult: function(id){
			   return $http.get(urlServidor + "?id=" + id);
			},
			obtDatosEdoResult2: function(id2){
			   return $http.get(urlServidor + "?id2=" + id2);
			},
			obtActivoCBalance: function(valor1){
				return $http.get(urlServidor + "?valor1=" + valor1);
			},
			obtSaldoActivoC: function(valor2){
				return $http.get(urlServidor + "?valor2=" + valor2);
			},
			obtActivoNCBalance: function(valor3){
				return $http.get(urlServidor + "?valor3=" + valor3);
			},
			obtSaldoActivoNC: function(valor4){
				return $http.get(urlServidor + "?valor4=" + valor4);
			},
			obtOtrosActivosBalance: function(valor5){
				return $http.get(urlServidor + "?valor5=" + valor5);
			},
			obtSaldoOtrosActivos: function(valor6){
				return $http.get(urlServidor + "?valor6=" + valor6);
			},
			obtSaldoTotalActivos: function(valorSaldo){
				return $http.get(urlServidor + "?valorSaldo=" + valorSaldo);
			},
			obtPasivoCPBalance: function(valor7){
				return $http.get(urlServidor + "?valor7=" + valor7);
			},
			obtSaldoPasivoCP: function(valor8){
				return $http.get(urlServidor + "?valor8=" + valor8);
			},
			obtPasivoLPBalance: function(valor9){
				return $http.get(urlServidor + "?valor9=" + valor9);
			},
			obtSaldoPasivoLP: function(valor10){
				return $http.get(urlServidor + "?valor10=" + valor10);
			},
			obtOPasivosBalance: function(valor11){
				return $http.get(urlServidor + "?valor11=" + valor11);
			},
			obtSaldoOPasivos: function(valor12){
				return $http.get(urlServidor + "?valor12=" + valor12);
			},
			obtCapitalBalance: function(valor13){
				return $http.get(urlServidor + "?valor13=" + valor13);
			}
		};
	})

	.service('servPolizasCRUD', function ($http) {
		var urlServidor = "http://192.168.9.238/yess_conta/Yess-Conta/ServiceTREBOL/controller/polizas_cuentas_db_controller.php";
		return {
			obtPolizas: function (idEjer) {
				return $http.get(urlServidor + "?idEjer=" + idEjer);
			},
			obtDatosPoliza: function (datosPoliza) {
				return $http.get(urlServidor + "?datosPoliza=" + datosPoliza);
			},
			obtSaldoCargo: function (Saldocargo) {
				return $http.get(urlServidor + "?Saldocargo=" + Saldocargo);
			},
			obtSaldoAbono: function (Saldoabono) {
				return $http.get(urlServidor + "?Saldoabono=" + Saldoabono);
			}
	     }
	})

	.service('servCuentasCRUD', function ($http) {
		var urlServidor = "http://192.168.9.238/yess_conta/Yess-Conta/ServiceTREBOL/controller/polizas_cuentas_db_controller.php";
		return {
			obtCuentas: function (IDEjercicio) {
				return $http.get(urlServidor + "?IDEjercicio=" + IDEjercicio);
			},
			obtDatosCuenta: function (datosCuenta) {
				return $http.get(urlServidor + "?datosCuenta=" + datosCuenta);
			},
			obtSaldoCargo: function (Salcargo) {
				return $http.get(urlServidor + "?Salcargo=" + Salcargo);
			},
			obtSaldoAbono: function (Salabono) {
				return $http.get(urlServidor + "?Salabono=" + Salabono);
			},
			obtSaldoTotal: function (SaldoTotal){
				return $http.get(urlServidor + "?SaldoTotal=" + SaldoTotal);
			},
			obtCodigo: function (NomCuenta){
				return $http.get(urlServidor + "?NomCuenta=" + NomCuenta);
			}
	     }
	})
	.service('servPDFPolizaCRUD', function ($http) {
		var urlServidor = "http://192.168.9.238/yess_conta/Yess-Conta/ServiceTREBOL/controller/PDF_poliza_db_controller.php";
		return {
			generarPolizaPDF: function (polizaPdf) {
				return $http.get(urlServidor + "?polizaPdf=" + polizaPdf);
			}

		};
	})
	//////////////////////SERVICIO DE COMUNICACIÓN////////////////////////
	.service('ServiceUser', function () {
		var loggedin = false;
		var Ocultar= true;
		var esconderse= true;
		var dato;
		var username;
		var Email;
		var Contrasena;
		var Empresa;
		var idEjercicio_Fiscal;
		var Proc_Reg;
		var Empresa_idEmpresa;
		
		this.isUserLoggedIn = function () {
			if (!!localStorage.getItem('login')) {
				loggedin = true;
			}
			return loggedin;
		};
		this.isInside = function () {
			if (!!localStorage.getItem('UsuarioEmp')) {
				Ocultar = false;
			}
			return Ocultar;
		};
		this.isDentro = function () {
			if (!!localStorage.getItem('EjercicioEmp')) {
				esconderse = false;
			}
			return esconderse;
		};

		this.infoSession = function (data) {
			loggedin = data;
			console.log(loggedin)
			if (loggedin == true) {
				toastr.options = {
					"positionClass": "toast-bottom-right",
					"timeOut": "600"
				}
				toastr.info('Conectado', '', {
					"closeButton": true
				});
			} else {
				alert("La sessión Expiró");
			}
		};

		this.saveData = function (data) {
			username = data.Datos[0].Nombre;
			Email = data.Datos[0].Email;
			Contrasena = data.Datos[0].Contrasena;
			localStorage.setItem('login', JSON.stringify({
				username: username,
				Email: Email,
				Contrasena: Contrasena
			}));
		};

		this.savedatosUsuaemp = function (data) {
			Email = data.Correo;
			Empresa = data.idempresa;
			//console.log(valor);
			localStorage.setItem('UsuarioEmp', JSON.stringify({
				Email: Email,
				Empresa: Empresa
			}));
		};

		this.dato = function(data){
             dato=data;
             if (dato !='') {
             	setInterval('document.location.reload()', 200);
             }
		}
		this.Pulsar = function(data){
             dato=data;
             console.log(dato);
             if (dato !='') {
             	setInterval('document.location.reload()', 200);
             }
		}

		this.saveDatosRegistro = function (data) {
			idEjercicio_Fiscal = data.idEjercicio_Fiscal;
			Proc_Reg = data.Proc_Reg;
			Empresa_idEmpresa = data.Empresa_idEmpresa;
			//console.log(idEjercicio_Fiscal);
			localStorage.setItem('EjercicioEmp', JSON.stringify({
				idEjercicio_Fiscal: idEjercicio_Fiscal,
				Proc_Reg: Proc_Reg,
				Empresa_idEmpresa: Empresa_idEmpresa
			}));
		};

		this.clearData = function () {
			localStorage.clear();
			window.location.reload();
		};
	})
	///////////////////////////////////CONTROLADORES///////////////////////////////
   .controller('indexController',function($scope, $location, ServiceUser){
      //$scope.Ocultar=true;
      $scope.Ocultar=ServiceUser.isInside();
      //console.log($scope.Ocultar);
      $scope.Esconder=ServiceUser.isDentro();

      $scope.btnPulsar= function(){
      	$scope.Uno="1";
          ServiceUser.Pulsar($scope.Uno);
      }
      $scope.btnAbrir=function(){
      	//document.location.href= '#!registro';
      	setTimeout("$('#Catalogo').modal('show')", 500);
      }
     
   })

	//CONTROLADOR INICIO.HTML
	.controller('inicioController', function ($scope, $location, servSesionCRUD, servEmpresaCRUD, ServiceUser, servUsuaEmpCRUD) {
		$scope.sesion = {
			Email: "",
			Contrasena: ""
		};

		$scope.Nombreinicio = "";
		$scope.Emailinicio = "";
		$scope.Contrasenainicio = "";

		//VERIFICACIÓN DE LOGEO
		if (ServiceUser.isUserLoggedIn()) {

			var nominicio = JSON.parse(localStorage.getItem('login'));
			$scope.Nombreinicio = nominicio.username;
			$scope.Emailinicio = nominicio.Email;
			$scope.Contrasenainicio = nominicio.Contrasena;

		} else {
			$('#loginModal').modal({
				backdrop: 'static',
				keyboard: false,
				show: true
			});

		}
		//VERIFICA SI HAY SESIÓN DE UN USUARIO
		consSesion();

		function consSesion() {
			var Email = $scope.Emailinicio;
			var Contrasena = $scope.Contrasenainicio;
			var array = JSON.stringify({
				Email: Email
			})
			servSesionCRUD.iniciarSesion(array).then(function (Resp) {
				console.log(Resp.data);
				if (Resp.data == 0) {
					$scope.session = false;
				} else if (Resp.data == 1) {
					$scope.session = false;
					ServiceUser.infoSession($scope.session);
					ServiceUser.clearData();
				} else if (Resp.data == 2) {
					$scope.session = true;
					ServiceUser.infoSession($scope.session);
				}

			});
		}
		//CONSULTA TODAS LAS EMPRESAS DEL USUARIO
		consEmpresas();
		function consEmpresas() {
			if ($scope.Emailinicio != '') {
				var Email = $scope.Emailinicio;
				servEmpresaCRUD.obtEmpresas(Email).then(function (Resp) {
					if (Resp.data.length == 0) {
						alert("No tiene empresas registradas en este momento.");
					} else {
						$scope.Empresas = Resp.data;
					}
				});
			}
		}

		//VALIDACIÓN DE DATOS DE INICIO DE SESIÓN
		function verificar() {

			var regex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

			if ($scope.sesion.Email === '') {
				alert("Debe agregar un email");
			} else if ($scope.sesion.Contrasena === '') {
				alert("Debe agregar una contraseña");
			} else if (!regex.test($scope.sesion.Email)) {
				alert("Formato de Correo inválido");
			}
		}

		$scope.btnEntrar = function (sesion) {
			var regex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
			if ($scope.sesion.Email != '' && $scope.sesion.Contrasena != '' && regex.test($scope.sesion.Email)) {
				servSesionCRUD.iniciarSesion(sesion).then(function (resp) {

					if (resp.data.status == 'loggedin') {
						ServiceUser.saveData(resp.data);
						$('#loginModal').modal('hide');
						document.location.reload();
					} else {
						alert("No fue posible iniciar Sesión");
						$('#loginModal').modal({
							backdrop: 'static',
							keyboard: false,
							show: true
						});

					}
				}, function (Error) {
					console.log(Error.message);
				});
			} else {
				verificar();
			}
		}
//LIMPIA DATOS DEL MODAL DE REGISTRO DE EMPRESA
		function limpiarRegistro() {
			$scope.Empresa = {
				Nombre: "",
				Direccion: "",
				Telefono: "",
				RFC: "",
				Giro: ""
			}
		};

		$scope.Empresa = {
			Nombre: "",
			Direccion: "",
			Telefono: "",
			RFC: "",
			Giro: ""
		};
//FUNCIÓN DE REGISTRO DE EMPRESA
		$scope.btnRegistrarEmp = function (Empresa) {
			if ($scope.Empresa.Nombre!='' && $scope.Empresa.Direccion!='' && $scope.Empresa.Telefono!='' &&
			$scope.Empresa.RFC!='' && $scope.Empresa.Giro!='') {
			servEmpresaCRUD.guardarEmpresa(Empresa).then(function (resp) {
				if(resp.data==0){
					alert('Esta empresa ya se encuentra registrada, Agregue otra.');
				}else{
				if (resp.data.num == 1) {
					var array = resp.data;
					$scope.IdEmp = array['datos'][0].idEmpresa;
					var idEmpresa = $scope.IdEmp;
					var Email = $scope.Emailinicio;
					var array2 = JSON.stringify({
						idEmpresa: idEmpresa,
						Email: Email
					})
					//REGISTRO DE LA RELACIÓN USUARIO-EMPRESA
					servUsuaEmpCRUD.guardarUsuaEmpresa(array2).then(function (resp) {
						if (resp.data == 1) {
							alert("La empresa fue registrada.");
							$('#negocio').modal('hide');
							//setInterval('document.location.reload()', 500);
							consEmpresas();
						} else {
							alert("Error de servidor.");
						}
					})

				} else if (resp.data == 0) {
					alert("La empresa no pudo ser registrada.");
					limpiarRegistro();
				}
			  }
			})
		  }else{
			  alert('Favor de llenar todos los campos.');
		  }
		}
//VALORES DEL EMAIL Y EL ID DE LA EMPRESA
		$scope.Relacion = {
			Correo: $scope.Emailinicio,
			idempresa: ""
		};
		$scope.valor="false";
//GUARDAR DATOS DEL USUARIO Y LA EMPRESA (LOCALSTORAGE) Y DIRECCIONA AL CONTROLADOR newEJERCICIO
		$scope.Iniciar = function (Relacion) {
			if ($scope.Relacion.idempresa != "" && $scope.Relacion.idempresa != undefined) {
				//console.log(Relacion);
				ServiceUser.savedatosUsuaemp(Relacion);
				ServiceUser.dato($scope.valor);
				$location.path('/newEjercicio');
			} else {
				alert("No a seleccionado ninguna Empresa.");
			}
		}

	})
//CONTROLADOR DE newEjercicio
	.controller('newEjercicioController', function ($scope, $location, servnewEjerCRUD, ServiceUser, servSesionCRUD, servEmpresaCRUD, servProcediCRUD, servRegistCuentasCRUD) {
		$scope.currentPage = 1; //PÁGINAS
		$scope.pageSize = 10; //NÚMERO DE REGISTROS QUE SE VISUALIZARÁN X TABLA
		$scope.Correo = "";
		$scope.IdEmpresa = "";
//CONSULTA DE LOGEO
		if (ServiceUser.isUserLoggedIn()) {
            //DATOS USUARIO
			var nominicio = JSON.parse(localStorage.getItem('login'));
			$scope.nom = nominicio.username;
			$scope.Emailinicio = nominicio.Email;
			$scope.Contrasenainicio = nominicio.Contrasena;
			//DATOS DE EMPRESA
			var empresa = JSON.parse(localStorage.getItem('UsuarioEmp'));
			$scope.Correo = empresa.Email;
			$scope.IdEmpresa = empresa.Empresa;
		} else {
			$location.path('/inicio');
		}
//CONSULTA SI EL USUARIO TIENE SESIÓN
		consSesion();
		function consSesion() {
			var Email = $scope.Emailinicio;
			var Contrasena = $scope.Contrasenainicio;
			var array = JSON.stringify({
				Email: Email
			})
			servSesionCRUD.iniciarSesion(array).then(function (Resp) {
				if (Resp.data == 0) {
					$scope.session = false;
				} else if (Resp.data == 1) {
					$scope.session = false;
					ServiceUser.infoSession($scope.session);
					ServiceUser.clearData();
				} else if (Resp.data == 2) {
					$scope.session = true;
					ServiceUser.infoSession($scope.session);
				}

			});
		}
//CONSULTA DE EMPRESA PARA QUE APAREZCA EN EL MODAL DE NUEVO EJERCICIO.
		consulEmpresa();
		function consulEmpresa() {
			if ($scope.IdEmpresa != '') {
				var idEmpresa = $scope.IdEmpresa;
				servEmpresaCRUD.obtDatosEmpresa(idEmpresa).then(function (Resp) {
					if (Resp.data.length == 0) {
						alert("Error de consulta.");
					} else {
						var arreglo = Resp.data;
						$scope.NombreEmpresa = arreglo[0].Nombre;
					}
				});
			}
		}
//CONSULTA DEL PROCEDIMIENTO DE REGISTRO
		consulProc();
		function consulProc() {
			servProcediCRUD.obtProcedimientos().then(function (Resp) {
				if (Resp.data.length === 0) {
					alert("No existen Procedimientos registrados.");
				} else {
					$scope.Procedimientos = Resp.data;	
				}
			}, function (error) {
				alert("Se produjo un error en la consulta: " + error);
			});
		}

		$scope.Ejercicios = [];
//CONSULTA DE EJERCICIOS DE UNA EMPRESA ESPECIFICA
		consulNewEjer();
		function consulNewEjer() {
			var idEmpresa = $scope.IdEmpresa;
			//console.log(idEmpresa);
			if ($scope.IdEmpresa != '') {
				servnewEjerCRUD.obtEjercicios(idEmpresa).then(function (Resp) {
					//console.log(Resp.data);
					if (Resp.data.length === 0) {
						//alert("No existen Ejercicios.");
					} else {
						$scope.Ejercicios = Resp.data;
						//$scope.TipoProc=$scope.Ejercicios[0].Proc_Reg;
						console.log($scope.Ejercicios);
						for (var i = 0; i < $scope.Ejercicios.length; i++) {
							//console.log(i);
							if($scope.Ejercicios[i].Fecha_Fin=="0000-00-00"){
							//$scope.ejercicio.Fecha_Fin="";
							$scope.Ejercicios[i].Fecha_Fin="---- -- --";
						}else{
							$scope.Ejercicios[i].Fecha_Fin=$scope.Ejercicios[i].Fecha_Fin;
							//$scope.Desabilitado=false;
						}
					  }
                     

					}
				})
			}
		}

		$scope.Ejercicio = {
			Fecha: "",
			Mes: "",
			Estado: "",
			Proc_Reg: "",
			Observaciones: "",
			idEmpresa: $scope.IdEmpresa
		}

		function limpiarform() {
			$scope.Ejercicio = {
				Fecha: "",
				Mes: "",
				Estado: "",
				Proc_Reg: "",
				Observaciones: "",
				idEmpresa: $scope.IdEmpresa
			}
		}
//CREA UN NUEVO EJERCICIO
		$scope.btnAgregar = function (Ejercicio) {
			if ($scope.Ejercicio.Fecha != '' && $scope.Ejercicio.Mes != '' && $scope.Ejercicio.Estado != '' &&
				$scope.Ejercicio.Prog_Reg != '' && $scope.Ejercicio.Observaciones != '') {
				servnewEjerCRUD.resgistarEjercicio(Ejercicio).then(function (Resp) {
					if (Resp.data != 0) {
						alert("El ejercicio fue registrado");
						$('#ejercicio').modal('hide');
                         //document.location.reload();
                         limpiarform();
                         consulNewEjer();
					} else {
						alert("Error al insertar los datos");
						limpiarform();
					}
				})

			} else {
				alert("Debe llenar todos los campos.");

			}

		}
		$scope.valor="false";
//EDITAR EJERCICIO SELECCIONADO
		$scope.irEjercicio = function (ejercicio) {
			//console.log(ejercicio);
			ServiceUser.saveDatosRegistro(ejercicio);
			ServiceUser.dato($scope.valor);
			$location.path('/registro');
		}
		$scope.BorrarEjercicio= function(ejercicio){
			//console.log(ejercicio);
		 var confirmar = confirm("¿Esta seguro de eliminar este producto?");
         if (confirmar == true) {
		 servRegistCuentasCRUD.deleteRegistros(ejercicio.idEjercicio_Fiscal).then(function(resp){
		 	console.log(resp.data);
		 	if(resp.data==true){
		 		servnewEjerCRUD.deleteEjercicio(ejercicio.idEjercicio_Fiscal).then(function(resp){
                   if(resp.data==true){
                     alert("Ejercicio eliminado con éxito.");
                     consulNewEjer();
                   }else{
                   	alert("No se ha podido eliminar el ejercicio, intente nuevamente.");
                   }
		 		})
		 	}else{
		 		alert("Error al intentar eliminar los registros del ejercicio, intenté nuevamente.");
		 	}

		 })
		 } else {
	    alert("Acción cancelada.");
	    }
	}
})
//CONTROLADOR DE REGISTRO DE CUENTAS
	.controller('registroController', function ($scope, $location, ServiceUser, servSesionCRUD,servnewEjerCRUD , servRegistCuentasCRUD) {
		$scope.currentPage = 1; //PÁGINAS
		$scope.pageSize = 5; //REGISTROS POR PÁGINA
		$scope.currentPage2 = 1; //PÁGINAS
		$scope.pageSize2 = 4; //REGISTROS POR PÁGINA
		$scope.Correo = "";
		$scope.IdEmpresa = "";
		$scope.ejer_idEjercicio = "";
		$scope.Procedimiento = "";
		$scope.Desabilitado=false;
		$scope.Oculto=true;
		$scope.Aparecer=true;
//CONSULTA DE LOGEO
		if (ServiceUser.isUserLoggedIn()) {
            //DATOS USUARIO
			var nominicio = JSON.parse(localStorage.getItem('login'));
			$scope.nom = nominicio.username;
			$scope.Emailinicio = nominicio.Email;
			$scope.Contrasenainicio = nominicio.Contrasena;
			//DATOS EMPRESA
			var empresa = JSON.parse(localStorage.getItem('UsuarioEmp'));
			$scope.Correo = empresa.Email;
			$scope.IdEmpresa = empresa.Empresa;
			//DATOS EJERCICIO
			var ejerEmp = JSON.parse(localStorage.getItem('EjercicioEmp'));
			$scope.ejer_idEjercicio = ejerEmp.idEjercicio_Fiscal;
			//console.log($scope.ejer_idEjercicio);
			$scope.Procedimiento = ejerEmp.Proc_Reg;
		} else {
			$location.path('/inicio');
		}
//CONSULTA DE SI UN USUARIO TIENE SESIÓN
		consSesion();
		function consSesion() {
			var Email = $scope.Emailinicio;
			var Contrasena = $scope.Contrasenainicio;
			var array = JSON.stringify({
				Email: Email
			})
			servSesionCRUD.iniciarSesion(array).then(function (Resp) {
				if (Resp.data == 0) {
					$scope.session = false;
				} else if (Resp.data == 1) {
					$scope.session = false;
					ServiceUser.infoSession($scope.session);
					ServiceUser.clearData();
				} else if (Resp.data == 2) {
					$scope.session = true;
					ServiceUser.infoSession($scope.session);
				}
			});
		}

		$scope.CuentasReg = [];
//CONSULTA SI UN EJERCICIO TIENE CUENTAS
		consulCuentas();
		function consulCuentas() {
			var idEjercicio = $scope.ejer_idEjercicio;
			if ($scope.ejer_idEjercicio != '') {
				servRegistCuentasCRUD.obtRegistCuentas(idEjercicio).then(function (Resp) {
					if (Resp.data.length === 0) {
						//alert("No existen Registros.");
					} else {
						$scope.CuentasReg = Resp.data;
						//console.log($scope.CuentasReg);
					}
				})
			}
		}
		$scope.CuentasInfo=[];
		$scope.NombreProcedimiento="";
		consulCuentasInfo();
		function consulCuentasInfo() {
			var idProcedimiento = $scope.Procedimiento;
			if ($scope.Procedimiento != '') {
				servRegistCuentasCRUD.obtCuentasInfo(idProcedimiento).then(function (Resp) {
					//console.log(Resp);
					if (Resp.data.length === 0) {
						alert("Error de servidor.");
					} else {
						$scope.Cuentasinfo = Resp.data;
						$scope.CuentasinfoPoce= Resp.data[0].Codigo_Proc_Reg;
						if($scope.CuentasinfoPoce==1){
							$scope.NombreProcedimiento="Procedimiento Análitico";
						}else{
                            $scope.NombreProcedimiento="Procedimiento de Inventarios Perpetuos";
						}
						//console.log($scope.Cuentasinfo);
					}
				})
			}
		}

//CONSULTA DEL SALDO TOTAL DEL CARGO		
        $scope.TotalCargo="";
        consulSaldoCargo();
        function consulSaldoCargo(){
          var cargo="40";
          var idEjercicio = $scope.ejer_idEjercicio;
          var array = JSON.stringify({
				cargo: cargo,
				idEjercicio: idEjercicio
			})
          if ($scope.ejer_idEjercicio != '') {
          servRegistCuentasCRUD.obtSaldoCargo(array).then(function(resp){
          	//console.log(resp);
          	$scope.TotalCargo=resp.data[0].TotalCargo;
          	//console.log($scope.TotalCargo);
          	if($scope.TotalCargo==null){
          		$scope.TotalCargo="0";
          	}else{
          	  $scope.TotalCargo=resp.data[0].TotalCargo;
          	}
          })
         }
        }

//CONSULTA DEL SALDO TOTAL DEL ABONO		
        $scope.TotalAbono="";
        consulSaldoAbono();
        function consulSaldoAbono(){
          var abono="50";
          var idEjercicio = $scope.ejer_idEjercicio;
          var array1 = JSON.stringify({
				abono: abono,
				idEjercicio: idEjercicio
			})
          if ($scope.ejer_idEjercicio != '') {
          servRegistCuentasCRUD.obtSaldoAbono(array1).then(function(resp){
          	//console.log(resp);
          	$scope.TotalAbono=resp.data[0].TotalAbono;
          	//console.log($scope.TotalAbono);
          	if($scope.TotalAbono==null){
          		$scope.TotalAbono="0";
          	}else{
          	  $scope.TotalAbono=resp.data[0].TotalAbono;
          	}
          })
         }
        }

		$scope.Naturaleza = [];
//COSULTA LA NATURALEZA DE LAS CUENTAS REGISTRADAS
		consulNatu();
		function consulNatu() {
			servRegistCuentasCRUD.obtNaturaleza().then(function (Resp) {
				if (Resp.data.length === 0) {
					alert("No se obtuvo ningún tipo de Naturaleza.");
				} else {
					$scope.Naturaleza = Resp.data;
					//console.log($scope.Naturaleza);	
				}
			})
		}
        $scope.Ejercicio="";
        consultStatusEjer();
        function consultStatusEjer(){
        	var idEjercicio = $scope.ejer_idEjercicio;
        	//console.log(idEjercicio);
        	if(idEjercicio !=''){
        	servnewEjerCRUD.obtStatusEjer(idEjercicio).then(function(resp){
        		console.log(resp);
        		if(resp.data==""){
        			alert("No existe el ejer_idEjercicio");
        		}else{
        			$scope.Ejercicio=resp.data;
        			if($scope.Ejercicio[0].Estado=="Finalizado"){
                       $scope.Desabilitado=true;
        			}else{
        			   $scope.Desabilitado=false;
        			}
        		}

        	})
          }
        }

		$scope.Registro = {
			Num_Poliza: "",
			Fecha_Factura: "",
			Fecha_Reg: new Date(),
			cuentas_Codigo_Cuenta: "",
			Nombre_Cuenta: "",
			Concepto: "",
			Monto: "",
			Codigo_Naturaleza: "",
			ejer_idEjercicio_Fiscal: $scope.ejer_idEjercicio
		}

		$scope.Ocultar=false;
		$scope.Desaparecer=false;

		$scope.btnCerrar= function(){
			$scope.Ocultar=false;
		    $scope.Desaparecer=false;
			limpiarForm();
		}
//AGREGA UN NUEVO ASIENTO
		$scope.btnRegistCuentas = function (Registro) {
			if ($scope.Registro.Num_Poliza != '' && $scope.Registro.Fecha_Factura != '' && $scope.Registro.Fecha_Reg != '' && $scope.Registro.cuentas_Codigo_Cuenta != '' && $scope.Registro.Concepto != '' && $scope.Registro.Monto != '' && $scope.Registro.Codigo_Naturaleza != '') {
				var idProc = $scope.Procedimiento;
				var idCuenta = Registro.cuentas_Codigo_Cuenta;
				var Arreglo = JSON.stringify({
					idProc: idProc,
					idCuenta: idCuenta
				});
				//ESTE SERVICIO BUSCA SI EXISTE LA CUENTA SOLICITADA
				servRegistCuentasCRUD.findCuenta(Arreglo).then(function (Resp) {
					if (Resp.data != 0) {
						$scope.Registro.Nombre_Cuenta = Resp.data[0].Nombre_Cuenta;

				//ESTE SERVICIO AGREGA EL NUEVO ASIENTO
						servRegistCuentasCRUD.insertRegist($scope.Registro).then(function (resp) {
							console.log(resp);
							if (resp.data != 0) {
								alert('Registro exitoso');
								$scope.Registro.cuentas_Codigo_Cuenta="";
			                    $scope.Registro.Monto="";
			                    $scope.Registro.Codigo_Naturaleza="";
							} else {
								alert('Error de servidor, Registre sus datos nuevamente.');
							}
						})

					} else {
						$scope.Oculto=false;
		                $scope.Aparecer=false;
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: '¡Lo sentimos la cuenta que ingreso no se encuentra registrada!',
						}).then(function(resp){
							//console.log(resp);
							if(resp.value==true){
								Swal.fire({
                                title: '<p style="color:#2A67D9;">¿Quieres consultar el catálogo de cuentas?</p>',
                                showDenyButton: true,
                                confirmButtonText: `Si`,
                                denyButtonText: `No`,
                            }).then(function(resp){
                                 //console.log(resp);
                                 if(resp.isConfirmed==true){
                                 	$('#registroCuentas').modal('hide');
                                 	$('#Catalogo').modal('show');
                                 }
                             })
							}
						})
					}
				})

			} else {
				alert('Debe llenar todos los campos');
			}
		}
    function limpiarForm(){
	$scope.Registro={		
		    Num_Poliza: "",
			Fecha_Factura: "",
			Fecha_Reg: new Date(),
			cuentas_Codigo_Cuenta: "",
			Nombre_Cuenta: "",
			Concepto: "",
			Monto: "",
			Codigo_Naturaleza: "",
			ejer_idEjercicio_Fiscal: $scope.ejer_idEjercicio
	};
}
	$scope.btnFinalizar=function(){
		limpiarForm();
        $('#registroCuentas').modal('hide');
		consulCuentas();
		consulSaldoCargo();
		consulSaldoAbono();
	}
    function conviertefecha(fecha)
{	
	try{
		fecha=fecha.replace(/-/g, '\/').replace(/T.+/, '');
	}catch(err){
		console.log("Ocurrio un error: "+err);
	}
        return fecha;
}
	$scope.EditarAsiento=function(cuentas){
		$scope.Ocultar=true;
		$scope.Desaparecer=true;
		console.log(cuentas);
        $scope.Registro = {
        	idReg_Cuentas: cuentas.idReg_Cuentas,
			Num_Poliza: cuentas.Num_Poliza,
			Fecha_Factura:new Date(conviertefecha(cuentas.Fecha_Factura)),
			Fecha_Reg:new Date(conviertefecha(cuentas.Fecha_Reg)),
			cuentas_Codigo_Cuenta: cuentas.cuentas_Codigo_Cuenta,
			Nombre_Cuenta: cuentas.Nombre_Cuenta,
			Concepto: cuentas.Concepto,
			Monto: cuentas.Monto,
			Codigo_Naturaleza: cuentas.Codigo_Naturaleza,
			ejer_idEjercicio_Fiscal: $scope.ejer_idEjercicio
		}
		$('#registroCuentas').modal('show');

	}


	$scope.btnActualizarCuentas=function(Registro){
		//console.log(Registro);
		if ($scope.Registro.Num_Poliza != '' && $scope.Registro.Fecha_Factura != '' && $scope.Registro.Fecha_Reg != '' && $scope.Registro.cuentas_Codigo_Cuenta != '' && $scope.Registro.Concepto != '' && $scope.Registro.Monto != '' && $scope.Registro.Naturaleza != '') {
           var idProc = $scope.Procedimiento;
				var idCuenta = Registro.cuentas_Codigo_Cuenta;
				var Arreglo = JSON.stringify({
					idProc: idProc,
					idCuenta: idCuenta
				});
				//ESTE SERVICIO BUSCA SI EXISTE LA CUENTA SOLICITADA
				servRegistCuentasCRUD.findCuenta(Arreglo).then(function (Resp) {
					if (Resp.data != 0) {
						$scope.Registro.Nombre_Cuenta = Resp.data[0].Nombre_Cuenta;

				//ESTE SERVICIO AGREGA EL NUEVO ASIENTO
						servRegistCuentasCRUD.ActualizarRegist($scope.Registro).then(function (resp) {
							if (resp.data != 0) {
								alert('Registro Actualizado');
								limpiarForm();
								$('#registroCuentas').modal('hide');
								$scope.Ocultar=false;
		                        $scope.Desaparecer=false;
								consulCuentas();
								consulSaldoCargo();
		                        consulSaldoAbono();
							} else {
								alert('Error de servidor, Registre sus datos nuevamente.');
							}
						})

					} else {
						$scope.Oculto=false;
		                $scope.Aparecer=false;
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: '¡Lo sentimos la cuenta que ingreso no se encuentra registrada!',
						}).then(function(resp){
							//console.log(resp);
							if(resp.value==true){
								Swal.fire({
                                title: '<p style="color:#2A67D9;">¿Quieres consultar el catálogo de cuentas?</p>',
                                showDenyButton: true,
                                confirmButtonText: `Si`,
                                denyButtonText: `No`,
                            }).then(function(resp){
                                 //console.log(resp);
                                 if(resp.isConfirmed==true){
                                 	$('#registroCuentas').modal('hide');
                                 	$('#Catalogo').modal('show');
                                 }
                             })
							}
						})
					}
				})
		}else{
			alert('Debe llenar todos los campos');
		}

	}
  $scope.btnCerrarModal=function(){
  	$scope.Oculto=true;
	$scope.Aparecer=true;
  	$('#Catalogo').modal('hide');
  	setTimeout("$('#registroCuentas').modal('show')", 500);
  }
  $scope.btnCerrarPrimario=function(){
  	$('#Catalogo').modal('hide');
  }
  $scope.BorrarAsiento= function(Registro){
		//console.log(Registro.idReg_Cuentas);
		var confirmar = confirm("¿Esta seguro de eliminar este producto?");
    if (confirmar == true) {
        servRegistCuentasCRUD.eliminarAsiento(Registro.idReg_Cuentas).then(function(Resp){
			console.log(Resp);
		 if(Resp.data !=0){
           alert("Registro eliminado correctamente.");
	       document.location.reload();
		 }else{
           alert("Se produjo un error al realizar la eliminación del asiento.");
		 }
	  })
		
	} else {
	    alert("Acción cancelada.");
	}
 }

})

.controller('polizaController', function($scope, $location, ServiceUser, servSesionCRUD, servPolizasCRUD, servPDFPolizaCRUD){
  $scope.currentPage = 1; //PÁGINAS
  $scope.pageSize = 5; //NÚMERO DE REGISTROS QUE SE VISUALIZARÁN X TABLA

  if (ServiceUser.isUserLoggedIn()) {
            //DATOS USUARIO
			var nominicio = JSON.parse(localStorage.getItem('login'));
			$scope.nom = nominicio.username;
			$scope.Emailinicio = nominicio.Email;
			$scope.Contrasenainicio = nominicio.Contrasena;
			//DATOS EMPRESA
			var empresa = JSON.parse(localStorage.getItem('UsuarioEmp'));
			$scope.Correo = empresa.Email;
			$scope.IdEmpresa = empresa.Empresa;
			//DATOS EJERCICIO
			var ejerEmp = JSON.parse(localStorage.getItem('EjercicioEmp'));
			$scope.ejer_idEjercicio = ejerEmp.idEjercicio_Fiscal;
			$scope.Procedimiento = ejerEmp.Proc_Reg;
		} else {
			$location.path('/inicio');
		}
//CONSULTA DE SI UN USUARIO TIENE SESIÓN
		consSesion();
		function consSesion() {
			var Email = $scope.Emailinicio;
			var Contrasena = $scope.Contrasenainicio;
			var array = JSON.stringify({
				Email: Email
			})
			servSesionCRUD.iniciarSesion(array).then(function (Resp) {
				if (Resp.data == 0) {
					$scope.session = false;
				} else if (Resp.data == 1) {
					$scope.session = false;
					ServiceUser.infoSession($scope.session);
					ServiceUser.clearData();
				} else if (Resp.data == 2) {
					$scope.session = true;
					ServiceUser.infoSession($scope.session);
				}
			});
		}

     $scope.Polizas = [];
//CONSULTA SI UN EJERCICIO TIENE Pólizas
		consulPolizas();
		function consulPolizas() {
			var idEjer = $scope.ejer_idEjercicio;
		   if ($scope.ejer_idEjercicio != '') {
			servPolizasCRUD.obtPolizas(idEjer).then(function (Resp) {
					if (Resp.data.length === 0) {
						//alert("No hay Pólizas disponibles.");
					} else {
						$scope.Polizas = Resp.data;
						 //console.log($scope.Polizas);
					}
				})
			}
		}
 $scope.Poliza={
 	Num_Poliza:""
 }
 $scope.TotalCargo="0";
 $scope.TotalAbono="0";
$scope.tablaPoliza=[];
$scope.tipoPoliza="";
$scope.tipoPoliza2="";
$scope.Polizanum="";
 $scope.Seleccion= function(Poliza){
 	//console.log($scope.Poliza);
if($scope.Poliza.Num_Poliza !=''){
 	var NumPoliza = $scope.Poliza.Num_Poliza;
 	var idEjer= $scope.ejer_idEjercicio;
 	var datosPoliza = JSON.stringify({
				NumPoliza: NumPoliza,
				idEjer: idEjer
			})
    //console.log(NumPoliza);
    servPolizasCRUD.obtDatosPoliza(datosPoliza).then(function(resp){
       //console.log(resp);
       $scope.tablaPoliza=resp.data;
       $scope.Polizanum=$scope.tablaPoliza[0].Num_Poliza;
       $scope.FechaFactura=$scope.tablaPoliza[0].Fecha_Factura;
       $scope.FechaReg=$scope.tablaPoliza[0].Fecha_Reg;
       console.log($scope.tablaPoliza);
       for (var i = 0; i < $scope.tablaPoliza.length; i++) {
       	  if($scope.tablaPoliza[i].Nombre_Cuenta == 'Banco Nacional ' && $scope.tablaPoliza[i].Codigo_Naturaleza == '40'){
       	 	$scope.tipoPoliza= "(Ingresos)";
       	 	$scope.tipoPoliza2= "Ingresos";
            //console.log($scope.tipoPoliza);
            break;
       	 }else if($scope.tablaPoliza[i].Nombre_Cuenta == 'Banco Nacional ' && $scope.tablaPoliza[i].Codigo_Naturaleza == '50'){
       	 	$scope.tipoPoliza= "(Egresos)";
       	 	$scope.tipoPoliza2= "Egresos";
            //console.log($scope.tipoPoliza);
            break;
       	 }else if($scope.tablaPoliza[i].Nombre_Cuenta != 'Banco Nacional'){
       	 	$scope.tipoPoliza= "(Diario)";
       	 	$scope.tipoPoliza2= "Diario";
            //console.log($scope.tipoPoliza);
       	 }
       }
      //CONSULTA DEL SALDO TOTAL DEL CARGO		
        
        consulSaldoCargo();
        function consulSaldoCargo(){
          var cargo="40";
          var NumeroPoliza= $scope.Polizanum;
          var idEjercicio = $scope.ejer_idEjercicio;
          var array = JSON.stringify({
				cargo: cargo,
				NumeroPoliza: NumeroPoliza,
				idEjercicio: idEjercicio
			})
          if ($scope.Polizanum != '') {
          servPolizasCRUD.obtSaldoCargo(array).then(function(resp){
          	//console.log(resp);
          	$scope.TotalCargo=resp.data[0].TotalCargo;
          	//console.log($scope.TotalCargo);
          	if($scope.TotalCargo==null){
          		$scope.TotalCargo="0";
          	}else{
          	  $scope.TotalCargo=resp.data[0].TotalCargo;
          	}
          })
         }
        }
        
        consulSaldoAbono();
        function consulSaldoAbono(){
          var abono="50";
          var NumeroPoliza= $scope.Polizanum;
          var idEjercicio = $scope.ejer_idEjercicio;
          var array1 = JSON.stringify({
				abono: abono,
				NumeroPoliza: NumeroPoliza,
				idEjercicio: idEjercicio
			})
          if ($scope.Polizanum != '') {
          servPolizasCRUD.obtSaldoAbono(array1).then(function(resp){
          	//console.log(resp);
          	$scope.TotalAbono=resp.data[0].TotalAbono;
          	//console.log($scope.TotalCargo);
          	if($scope.TotalAbono==null){
          		$scope.TotalAbono="0";
          	}else{
          	  $scope.TotalAbono=resp.data[0].TotalAbono;
          	}
          })
         }
        }


    })
   }else{
   	$scope.tablaPoliza=[];
   	$scope.tipoPoliza="";
   	$scope.Polizanum="";
   	$scope.FechaFactura="---";
    $scope.FechaReg="---";
    $scope.TotalCargo="0";
    $scope.TotalAbono="0";
   }	  
 }
 
 $scope.generarPDF= function(Poliza){
 	//console.log(Poliza.Num_Poliza);
 	
 	if (Poliza.Num_Poliza !="") {
 		var NumPoliza = Poliza.Num_Poliza;
 	var idEjer= $scope.ejer_idEjercicio;
 	var polizaPdf = JSON.stringify({
				NumPoliza: NumPoliza,
				idEjer: idEjer
			})
 	console.log(polizaPdf);
    servPDFPolizaCRUD.generarPolizaPDF(polizaPdf).then(function(resp){
    	console.log(resp);
    	window.open('http://192.168.9.238/yess_conta/Yess-Conta/ServiceTREBOL/controller/PDF_poliza_db_controller.php');
    })
      
 	}else{
       alert("No ha seleccionado ninguna póliza");
 	}
 	
 }

 $scope.btnExportar=function(){
 	console.log($scope.Polizanum);
 	if($scope.Polizanum !=""){
 	$tabla = document.querySelector("#tabla");
 	let tableExport = new TableExport($tabla, {
        exportButtons: false, // No queremos botones
        filename: "Póliza "+$scope.Polizanum, //Nombre del archivo de Excel
        sheetname: "Póliza "+$scope.Polizanum, //Título de la hoja
    });
    let datos = tableExport.getExportData();
    let preferenciasDocumento = datos.tabla.xlsx;
    tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
   }
 }

})
.controller('reportesController',function($scope, $location, ServiceUser, servSesionCRUD, servCuentasCRUD){
  $scope.currentPage = 1; //PÁGINAS
  $scope.pageSize = 10; //NÚMERO DE REGISTROS QUE SE VISUALIZARÁN X TABLA

  if (ServiceUser.isUserLoggedIn()) {
            //DATOS USUARIO
			var nominicio = JSON.parse(localStorage.getItem('login'));
			$scope.nom = nominicio.username;
			$scope.Emailinicio = nominicio.Email;
			$scope.Contrasenainicio = nominicio.Contrasena;
			//DATOS EMPRESA
			var empresa = JSON.parse(localStorage.getItem('UsuarioEmp'));
			$scope.Correo = empresa.Email;
			$scope.IdEmpresa = empresa.Empresa;
			//DATOS EJERCICIO
			var ejerEmp = JSON.parse(localStorage.getItem('EjercicioEmp'));
			$scope.ejer_idEjercicio = ejerEmp.idEjercicio_Fiscal;
			$scope.Procedimiento = ejerEmp.Proc_Reg;
		} else {
			$location.path('/inicio');
		}
//CONSULTA DE SI UN USUARIO TIENE SESIÓN
		consSesion();
		function consSesion() {
			var Email = $scope.Emailinicio;
			var Contrasena = $scope.Contrasenainicio;
			var array = JSON.stringify({
				Email: Email
			})
			servSesionCRUD.iniciarSesion(array).then(function (Resp) {
				if (Resp.data == 0) {
					$scope.session = false;
				} else if (Resp.data == 1) {
					$scope.session = false;
					ServiceUser.infoSession($scope.session);
					ServiceUser.clearData();
				} else if (Resp.data == 2) {
					$scope.session = true;
					ServiceUser.infoSession($scope.session);
				}
			});
		}

	 $scope.Cuentas = [];
//CONSULTA SI UN EJERCICIO TIENE CUENTAS
		consulCuentas();
		function consulCuentas() {
			var IDEjercicio = $scope.ejer_idEjercicio;
			//console.log(IDEjercicio);
		   if ($scope.ejer_idEjercicio != '') {
			servCuentasCRUD.obtCuentas(IDEjercicio).then(function (Resp) {
				       //console.log(Resp)
					if (Resp.data.length === 0) {
						//alert("No existen Cuentas disponibles.");
					} else {
						$scope.Cuentas = Resp.data;
						 //console.log($scope.Cuentas);
					}
				})
			}
		}

 $scope.Cuenta={
 	Nombre_Cuenta:""
 }

$scope.tablaCuentas=[];
$scope.TotalCargo="0";
$scope.TotalAbono="0";
$scope.SaldoTotal="0";
 $scope.SeleccionCuenta= function(Cuenta){
 	//console.log($scope.Cuenta);
if($scope.Cuenta.Nombre_Cuenta !=''){
 	var NombreCuenta = $scope.Cuenta.Nombre_Cuenta;
 	var idEjer= $scope.ejer_idEjercicio;
 	var datosCuenta = JSON.stringify({
				NombreCuenta: NombreCuenta,
				idEjer: idEjer
			})
    //console.log(NombreCuenta);
    servCuentasCRUD.obtDatosCuenta(datosCuenta).then(function(resp){
       //console.log(resp);
       $scope.tablaCuentas=resp.data;
       $scope.NomCuenta=$scope.tablaCuentas[0].Nombre_Cuenta;
       //console.log($scope.tablaCuentas);

     consulSaldoCargo();
        function consulSaldoCargo(){
          var cargo="40";
          var NomCuenta= $scope.Cuenta.Nombre_Cuenta;
          var idEjercicio = $scope.ejer_idEjercicio;
          var array = JSON.stringify({
				cargo: cargo,
				NomCuenta: NomCuenta,
				idEjercicio: idEjercicio
			})
          servCuentasCRUD.obtSaldoCargo(array).then(function(resp){
          	//console.log(resp);
          	$scope.TotalCargo=resp.data[0].TotalCargo;
          	//console.log($scope.TotalCargo);
          	if($scope.TotalCargo==null){
          		$scope.TotalCargo="0";
          	}else{
          	  $scope.TotalCargo=resp.data[0].TotalCargo;
          	   
          	}
          })
        }
        
        consulSaldoAbono();
        function consulSaldoAbono(){
          var abono="50";
          var NomCuenta= $scope.Cuenta.Nombre_Cuenta;
          var idEjercicio = $scope.ejer_idEjercicio;
          var array1 = JSON.stringify({
				abono: abono,
				NomCuenta: NomCuenta,
				idEjercicio: idEjercicio
			})
          servCuentasCRUD.obtSaldoAbono(array1).then(function(resp){
          	//console.log(resp);
          	$scope.TotalAbono=resp.data[0].TotalAbono;
          	//console.log($scope.TotalAbono);
          	if($scope.TotalAbono==null){
          		$scope.TotalAbono="0";
          	}else{
          	  $scope.TotalAbono=resp.data[0].TotalAbono;
          	}
          })
        }
       
       consultSaldoTotal();
       function consultSaldoTotal(){
          var NomCuenta= $scope.Cuenta.Nombre_Cuenta;
          //console.log(NomCuenta);
      servCuentasCRUD.obtCodigo(NomCuenta).then(function(resp){
          	//console.log(resp);
          	$scope.Codigo= resp.data[0].Codigo_Cuenta;
          	var Codigo= $scope.Codigo;
          	var idEjercicio = $scope.ejer_idEjercicio;
          var array2 = JSON.stringify({
				Codigo: Codigo,
				idEjercicio: idEjercicio
			})
         servCuentasCRUD.obtSaldoTotal(array2).then(function(resp){
          	//console.log(resp);
          	$scope.variable= resp.data[0].ClasifPrincipal_id_Recurso;
          	$scope.saldo= resp.data[0].Diferencia;
          	if($scope.variable==1){
               $scope.SaldoTotal=$scope.saldo;
          	}else{
          		if($scope.saldo>0){
          	   $scope.SaldoTotal= -1*$scope.saldo;
          		}else if($scope.saldo==0){
                 $scope.SaldoTotal= $scope.saldo;
          		}else{
               $scope.SaldoTotal= -1*$scope.saldo;
          		}
          	}
          	
          })	
     })
   }
       

    })
   }else{
   	$scope.tablaCuentas=[];
   	$scope.NomCuenta="---";
   	$scope.TotalCargo="0";
    $scope.TotalAbono="0";
   }	  
 }
 $scope.btnExportar=function(){
 	//console.log($scope.Cuenta.Nombre_Cuenta);
 	if($scope.Cuenta.Nombre_Cuenta !=''){
 	$tabla = document.querySelector("#tabla");
 	let tableExport = new TableExport($tabla, {
        exportButtons: false, // No queremos botones
        filename: "Reporte de "+$scope.Cuenta.Nombre_Cuenta, //Nombre del archivo de Excel
        sheetname: $scope.Cuenta.Nombre_Cuenta, //Título de la hoja
    });
    let datos = tableExport.getExportData();
    let preferenciasDocumento = datos.tabla.xlsx;
    tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
   }
 }
		
})
.controller('resultadosController', function($scope, $location, ServiceUser, servSesionCRUD, servEmpresaCRUD, servnewEjerCRUD, servRegistCuentasCRUD){

  if (ServiceUser.isUserLoggedIn()) {
            //DATOS USUARIO
			var nominicio = JSON.parse(localStorage.getItem('login'));
			$scope.nom = nominicio.username;
			$scope.Emailinicio = nominicio.Email;
			$scope.Contrasenainicio = nominicio.Contrasena;
			//DATOS EMPRESA
			var empresa = JSON.parse(localStorage.getItem('UsuarioEmp'));
			$scope.Correo = empresa.Email;
			$scope.IdEmpresa = empresa.Empresa;
			//DATOS EJERCICIO
			var ejerEmp = JSON.parse(localStorage.getItem('EjercicioEmp'));
			$scope.ejer_idEjercicio = ejerEmp.idEjercicio_Fiscal;
			$scope.Procedimiento = ejerEmp.Proc_Reg;
		} else {
			$location.path('/inicio');
		}
//CONSULTA DE SI UN USUARIO TIENE SESIÓN
		consSesion();
		function consSesion() {
			var Email = $scope.Emailinicio;
			var Contrasena = $scope.Contrasenainicio;
			var array = JSON.stringify({
				Email: Email
			})
			servSesionCRUD.iniciarSesion(array).then(function (Resp) {
				if (Resp.data == 0) {
					$scope.session = false;
				} else if (Resp.data == 1) {
					$scope.session = false;
					ServiceUser.infoSession($scope.session);
					ServiceUser.clearData();
				} else if (Resp.data == 2) {
					$scope.session = true;
					ServiceUser.infoSession($scope.session);
				}
			});
		}
    $scope.Name="";
	consulEmpresa();
	function consulEmpresa(){
		var id= $scope.IdEmpresa;
	servEmpresaCRUD.obtNombreEmp(id).then(function(resp){
         console.log(resp);
         if(resp.data=='undefined'){
         	$scope.Name="";
         }else{
           $scope.Name=resp.data[0].Nombre;
         }

	  })
	}
	$scope.Mes="";
	consulMesEjer();
	function consulMesEjer(){
		var id= $scope.ejer_idEjercicio;
	servnewEjerCRUD.obtMesEjer(id).then(function(resp){
         console.log(resp);
         if(resp.data=='undefined'){
         	$scope.Mes="";
         }else{
           $scope.Mes=resp.data[0].Mes;
         }

	  })
	}
   consulEdoResult();
   function consulEdoResult(){
   	  var Proc = $scope.Procedimiento;
   	  var id= $scope.ejer_idEjercicio;
   	  //console.log(Proc);
   servRegistCuentasCRUD.obtDatosEdoResult(id).then(function(Resp){
   	console.log(Resp);
   	$scope.Ventas= Resp.data[0].Ventas_Netas;
   	//console.log($scope.Ventas);
   	$scope.Servicios=Resp.data[0].Ingreso_servicios;
   	$scope.IngresosTotales=Resp.data[0].Ingresos_Totales;
   	$scope.CostoVentas=Resp.data[0].Costo_ventas;
   	$scope.UtilidadBruta=Resp.data[0].Utilidad_Bruta;
   	$scope.GastosVentas=Resp.data[0].Gastos_Ventas;
   	$scope.GastosAdmin=Resp.data[0].Gastos_administracion;
   	var dato1 = parseFloat($scope.UtilidadBruta);
   	var dato2 = parseFloat($scope.GastosVentas);
   	var dato3 = parseFloat($scope.GastosAdmin);
    $scope.UtilidadOperacion= dato1-(dato2+dato3);
   	//console.log($scope.UtilidadOperacion);
   	if($scope.UtilidadOperacion>=0){
   		$scope.NomUtilidad="Utilidad de Operación";
   	}else{
   		$scope.NomUtilidad="Pérdida de Operación";
   	}
   	$scope.PTU=Resp.data[0].Saldo_PTU;
   	$scope.OtrosGastos=Resp.data[0].OtroGastos;
   	$scope.OtrosIngresos=Resp.data[0].OtrosIngresos;
   	var datoUtilidadOpe= parseFloat($scope.UtilidadOperacion);
   	var dato4 = parseFloat($scope.PTU);
   	var dato5 = parseFloat($scope.OtrosGastos);
   	var dato6 = parseFloat($scope.OtrosIngresos);
    $scope.UtilidadAI= datoUtilidadOpe+dato6-(dato4+dato5);
     //console.log($scope.UtilidadAI);

   if($scope.UtilidadAI>=0){
   		$scope.Nom2Utilidad="Utilidad Antes de Impuestos";
   	}else{
   		$scope.Nom2Utilidad="Pérdida antes de Impuestos";
   	}
   	$scope.Impuestos=Resp.data[0].Impuestos;
   	var datoUtilidadAI = parseFloat($scope.UtilidadAI);
   	var dato7 = parseFloat($scope.Impuestos);

   	$scope.UtilidadNeta= datoUtilidadAI-dato7;
   	if($scope.UtilidadNeta>=0){
   		$scope.Nom3Utilidad="Utilidad Neta";
   	}else{
   		$scope.Nom3Utilidad="Pérdida Neta";
   	}

   })
 }
 
  $scope.btnExportar=function(){
 	console.log($scope.Name);
 	if($scope.Name !=''){
 	$tabla = document.querySelector("#tabla");
 	let tableExport = new TableExport($tabla, {
        exportButtons: false, // No queremos botones
        filename: "Edo Result de "+$scope.Name, //Nombre del archivo de Excel
        sheetname: "Edo Result de "+$scope.Name, //Título de la hoja
    });
    let datos = tableExport.getExportData();
    let preferenciasDocumento = datos.tabla.xlsx;
    tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
   }
 }

})

.controller('balanceController', function($scope, $location, ServiceUser, servSesionCRUD, servEmpresaCRUD, servnewEjerCRUD, servRegistCuentasCRUD){
  $scope.Desabilitado=false;
 if (ServiceUser.isUserLoggedIn()) {
            //DATOS USUARIO
			var nominicio = JSON.parse(localStorage.getItem('login'));
			$scope.nom = nominicio.username;
			$scope.Emailinicio = nominicio.Email;
			$scope.Contrasenainicio = nominicio.Contrasena;
			//DATOS EMPRESA
			var empresa = JSON.parse(localStorage.getItem('UsuarioEmp'));
			$scope.Correo = empresa.Email;
			$scope.IdEmpresa = empresa.Empresa;
			//DATOS EJERCICIO
			var ejerEmp = JSON.parse(localStorage.getItem('EjercicioEmp'));
			$scope.ejer_idEjercicio = ejerEmp.idEjercicio_Fiscal;
			$scope.Procedimiento = ejerEmp.Proc_Reg;
			$scope.Empresa= ejerEmp.Empresa_idEmpresa;
		} else {
			$location.path('/inicio');
		}
//CONSULTA DE SI UN USUARIO TIENE SESIÓN
		consSesion();
		function consSesion() {
			var Email = $scope.Emailinicio;
			var Contrasena = $scope.Contrasenainicio;
			var array = JSON.stringify({
				Email: Email
			})
			servSesionCRUD.iniciarSesion(array).then(function (Resp) {
				if (Resp.data == 0) {
					$scope.session = false;
				} else if (Resp.data == 1) {
					$scope.session = false;
					ServiceUser.infoSession($scope.session);
					ServiceUser.clearData();
				} else if (Resp.data == 2) {
					$scope.session = true;
					ServiceUser.infoSession($scope.session);
				}
			});
		}
   $scope.Name="";
	consulEmpresa();
	function consulEmpresa(){
		var id= $scope.IdEmpresa;
	servEmpresaCRUD.obtNombreEmp(id).then(function(resp){
         //console.log(resp);
         $scope.Name=resp.data[0].Nombre;

	  })
	}
	$scope.Mes=[];
	consulMesEjer();
	function consulMesEjer(){
		var id= $scope.ejer_idEjercicio;
	servnewEjerCRUD.obtMesEjer(id).then(function(resp){
         //console.log(resp);
         $scope.Mes=resp.data[0].Mes;

	  })
	}
	$scope.ActivoC=[];
	$scope.SaldoActivoC=[];
  consultActivoCBalance();
  function consultActivoCBalance(){
  	var id= $scope.ejer_idEjercicio;
  	servRegistCuentasCRUD.obtActivoCBalance(id).then(function(resp){
  		//console.log(resp);
  		$scope.ActivoC= resp.data;

  	})
  	servRegistCuentasCRUD.obtSaldoActivoC(id).then(function(resp){
  		//console.log(resp);
  		$scope.SaldoActivoC= resp.data[0].Saldo_ActivoC;

  	})
  }
  $scope.ActivoNC=[];
	$scope.SaldoActivoNC=[];
  consultActivoNCBalance();
  function consultActivoNCBalance(){
  	var id= $scope.ejer_idEjercicio;
  	servRegistCuentasCRUD.obtActivoNCBalance(id).then(function(resp){
  		//console.log(resp);
  		$scope.ActivoNC= resp.data;
  		//console.log($scope.ActivoNC);

  	})
  	servRegistCuentasCRUD.obtSaldoActivoNC(id).then(function(resp){
  		//console.log(resp);
  		$scope.SaldoActivoNC= resp.data[0].Saldo_ActivoNC;
  		//console.log($scope.SaldoActivoNC);

  		
  	})
  }
  $scope.OActivos=[];
	$scope.SaldoOActivos=[];
  consultOtrosActivosBalance();
  function consultOtrosActivosBalance(){
  	var id= $scope.ejer_idEjercicio;
  	servRegistCuentasCRUD.obtOtrosActivosBalance(id).then(function(resp){
  		//console.log(resp);
  		$scope.OActivos= resp.data;
  		//console.log($scope.ActivoNC);

  	})
  	servRegistCuentasCRUD.obtSaldoOtrosActivos(id).then(function(resp){
  		//console.log(resp);
  		$scope.SaldoOActivos= resp.data[0].Saldo_OtrosActivos;
  		//console.log($scope.SaldoActivoNC);
  		
  	})
  }
  $scope.SaldoTotalActivos=[];
  consultSaldoTotalActivos();
  function consultSaldoTotalActivos(){
  	var id= $scope.ejer_idEjercicio;
 servRegistCuentasCRUD.obtSaldoTotalActivos(id).then(function(resp){
  		//console.log(resp);
  		$scope.SaldoTotalActivos= resp.data[0].Saldo;
  		//console.log($scope.SaldoActivoNC);
  		
  	})
  }
  $scope.PasivoCP=[];
	$scope.SaldoPasivoCP=[];
  consultPasivoCPBalance();
  function consultPasivoCPBalance(){
  	var id= $scope.ejer_idEjercicio;
  	servRegistCuentasCRUD.obtPasivoCPBalance(id).then(function(resp){
  		//console.log(resp);
  		$scope.PasivoCP= resp.data;
  		//var dato = parseFloat($scope.PasivoCP[1].Saldo);
  		//$scope.PasivoCP[1].Saldo= -1*dato;
  		//console.log($scope.PasivoCP.Saldo);

  	})
  	servRegistCuentasCRUD.obtSaldoPasivoCP(id).then(function(resp){
  		//console.log(resp);
  		$scope.SaldoPasivoCP= resp.data[0].Saldo_PasivoCP;

  	})
  }
  $scope.PasivoLP=[];
	$scope.SaldoPasivoLP=[];
  consultPasivoLPBalance();
  function consultPasivoLPBalance(){
  	var id= $scope.ejer_idEjercicio;
  	servRegistCuentasCRUD.obtPasivoLPBalance(id).then(function(resp){
  		//console.log(resp);
  		$scope.PasivoLP= resp.data;

  	})
  	servRegistCuentasCRUD.obtSaldoPasivoLP(id).then(function(resp){
  		//console.log(resp);
  		$scope.SaldoPasivoLP= resp.data[0].Saldo_PasivoLP;

  	})
  }
  $scope.OPasivos=[];
	$scope.SaldoOPasivos=[];
  consultOPasivosBalance();
  function consultOPasivosBalance(){
  	var id= $scope.ejer_idEjercicio;
  	servRegistCuentasCRUD.obtOPasivosBalance(id).then(function(resp){
  		//console.log(resp);
  		$scope.OPasivos= resp.data;

  	})
  	servRegistCuentasCRUD.obtSaldoOPasivos(id).then(function(resp){
  		//console.log(resp);
  		$scope.SaldoOPasivos= resp.data[0].Saldo_OPasivos;

  	})
  }
  $scope.Capital=[];
	$scope.SaldoCapital=[];
  consultCapitalBalance();
  function consultCapitalBalance(){
  	var id= $scope.ejer_idEjercicio;
  	servRegistCuentasCRUD.obtCapitalBalance(id).then(function(resp){
  		//console.log(resp);
  		$scope.Capital= resp.data;

  	})
  }

  consulEdoResult();
   function consulEdoResult(){
   	  var id= $scope.ejer_idEjercicio;
   servRegistCuentasCRUD.obtDatosEdoResult(id).then(function(Resp){
   	//console.log(Resp);
   	$scope.Ventas= Resp.data[0].Ventas_Netas;
   	//console.log($scope.Ventas);
   	$scope.Servicios=Resp.data[0].Ingreso_servicios;
   	$scope.IngresosTotales=Resp.data[0].Ingresos_Totales;
   	$scope.CostoVentas=Resp.data[0].Costo_ventas;
   	$scope.UtilidadBruta=Resp.data[0].Utilidad_Bruta;
   	$scope.GastosVentas=Resp.data[0].Gastos_Ventas;
   	$scope.GastosAdmin=Resp.data[0].Gastos_administracion;
   	var dato1 = parseFloat($scope.UtilidadBruta);
   	var dato2 = parseFloat($scope.GastosVentas);
   	var dato3 = parseFloat($scope.GastosAdmin);
    $scope.UtilidadOperacion= dato1-(dato2+dato3);
   	//console.log($scope.UtilidadOperacion);
   	if($scope.UtilidadOperacion>=0){
   		$scope.NomUtilidad="Utilidad de Operación";
   	}else{
   		$scope.NomUtilidad="Pérdida de Operación";
   	}
   	$scope.PTU=Resp.data[0].Saldo_PTU;
   	$scope.OtrosGastos=Resp.data[0].OtroGastos;
   	$scope.OtrosIngresos=Resp.data[0].OtrosIngresos;
   	var datoUtilidadOpe= parseFloat($scope.UtilidadOperacion);
   	var dato4 = parseFloat($scope.PTU);
   	var dato5 = parseFloat($scope.OtrosGastos);
   	var dato6 = parseFloat($scope.OtrosIngresos);
    $scope.UtilidadAI= datoUtilidadOpe+dato6-(dato4+dato5);
     //console.log($scope.UtilidadAI);

   if($scope.UtilidadAI>=0){
   		$scope.Nom2Utilidad="Utilidad Antes de Impuestos";
   	}else{
   		$scope.Nom2Utilidad="Pérdida antes de Impuestos";
   	}
   	$scope.Impuestos=Resp.data[0].Impuestos;
   	var datoUtilidadAI = parseFloat($scope.UtilidadAI);
   	var dato7 = parseFloat($scope.Impuestos);

   	$scope.UtilidadNeta= datoUtilidadAI-dato7;
    $scope.SaldoCapital= Resp.data[0].Saldo_Capital;
    var dato8= parseFloat($scope.UtilidadNeta);
    var dato9= parseFloat($scope.SaldoCapital);
    $scope.CapitalContable=[];
     $scope.CapitalContable= dato8+dato9;
     $scope.TotalPasivoCapital=[];
     $scope.SaldoTotalP= Resp.data[0].Saldo_Total;
     var dato10 = parseFloat($scope.SaldoTotalP);
     $scope.TotalPasivoCapital= dato10+dato8;
     //console.log($scope.TotalPasivoCapital);

   	if($scope.UtilidadNeta>=0){
   		$scope.Nom3Utilidad="Utilidad Neta";
   	}else{
   		$scope.Nom3Utilidad="Pérdida Neta";
   	}

   })
  }
        $scope.Ejercicio="";
        consultStatusEjer();
        function consultStatusEjer(){
        	var idEjercicio = $scope.ejer_idEjercicio;
        	//console.log(idEjercicio);
        	if(idEjercicio !=''){
        	servnewEjerCRUD.obtStatusEjer(idEjercicio).then(function(resp){
        		console.log(resp);
        		if(resp.data==""){
        			//alert("No existe el ejercicio");
        		}else{
        			$scope.Ejercicio=resp.data;
        			if($scope.Ejercicio[0].Estado=="Finalizado"){
                       $scope.Desabilitado=true;
        			}else{
        			   $scope.Desabilitado=false;
        			}
        		}

        	})
          }
        }

  $scope.btnGuardar= function(){
  	//alert("Hola");
  	Swal.fire({
  title: '<p style="color:#2A67D9;">¿Estás seguro de guardar los cambios?</p>',
  html: "<strong>Advertencia:</strong> Una vez que guarde los cambios no podrá realizar más modificaciones al ejercicio.",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: `Guardar`,
  denyButtonText: `No Guardar`,
}).then(function(resp){
     //console.log(resp);
     $scope.respuesta=resp;
    if($scope.respuesta.value==true){
         var Estado="Finalizado";
         var Fecha_Fin= new Date();
         var idEjercicio_Fiscal= $scope.ejer_idEjercicio;
         var Empresa= $scope.Empresa;
         console.log(idEjercicio_Fiscal);
         var updateInfo = JSON.stringify({
				Estado: Estado,
				Fecha_Fin: Fecha_Fin,
				idEjercicio_Fiscal: idEjercicio_Fiscal,
				Empresa: Empresa
			})
        servnewEjerCRUD.updateDatos(updateInfo).then(function(resp){
        	//console.log(resp);
        	if(resp.data !=0){
              Swal.fire('¡Cambios Guardados!', '', 'success').then(function(resp){
    		    document.location.href= '#!newEjercicio';
    	      })
        	}else{
        	   Swal.fire('Error al Guardar cambios', '', 'error')
        	}
        })
    }else if($scope.respuesta.isDenied==true){
    	Swal.fire('Cambios no guadados', '', 'info')
    }
  })
}

})
