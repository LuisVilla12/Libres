angular.module("miModulo2", [])

//Servicio de Registro de Usuario
  .service('servUsuaCRUD', function ($http) {
    var urlServidor = "https://192.168.7.104/yess_conta/Yess-Conta/ServiceTREBOL/controller/registroUsuario_db_controller.php";
    return {
      obtUsuario: function () {
        return $http.get(urlServidor);
      },
      eliminarUsuario: function (id) {
        return $http.delete(urlServidor + "?ID=" + id);
      },
      registrarUsuario: function (usuario) {
        return $http.post(urlServidor, usuario);
      },
      actualizarUsuario: function (usuario) {
        return $http.put(urlServidor, usuario);
      }
    };
  })
//Controlador del Registro de usuario
  .controller('bienvenidaController', function ($scope, servUsuaCRUD) {
    //$scope.name = "yelo";
    //$scope.wou = "tttt";
    //Inicializacion de variables
    $scope.usuario = {
      Nombre: "",
      APP: "",
      APM: "",
      Tel: "",
      Email: "",
      Contrasena: "",
      Confircontrasena: ""
    };
    $scope.datosUsuario = [];
    //getUsuario();

    /*function getUsuario() {
      servUsuaCRUD.obtUsuario().then(function (Resp) {
        $scope.datosUsuario = Resp.data;
      }, function (error) {
        alert("No fue posible obtener los datos de la dependencia " + error.message);
      });
    }*/

    /*function limpiarForm(){
        $scope.usuario={
        Nombre:"",
        APP:"",
        APM:"",
        Tel:"",
        Email:"",
        Contrasena:"",
        Confircontrasena:""
      };
    }*/
    function limpiarFormulario() {
      document.getElementById("Registro").reset();
    }

    $scope.btnRegistrar = function (usuario) {

      console.log(usuario);
      servUsuaCRUD.registrarUsuario(usuario).then(function (resp) {
        console.log(resp.data);
        if (resp.data == 1) {
          alert("El Email ya se encuentra registrado, agregue uno diferente.");

        } else {
          if (resp.data.success) {
            limpiarFormulario();
            alertify.success("Usuario agregado con exito");
            //limpiarForm();
            setTimeout("window.location='index.html'", 1000);

          } else {
            alert("No fue posible registrar el Usuario");
          }

        }
      }, function (Error) {
        console.log(Error.message);
      });
    }

  });
