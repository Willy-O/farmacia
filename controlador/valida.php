<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

    require_once '../modelo/usuario.php'; 
    //***************************************** LLAMA LA CONEXION ************************************* */
    require_once '../modelo/conexion.php';
 //************************************ INICIA SECCION *********************************** */
	session_start();
  //******************** * consusta si el usuario o el password son valido para el inicio de sesion******************** *
    if(isset($_POST['ingresar']))
    {
        $nom_user=$_POST['usuario'];
        $passwords=$_POST['password'];
        $perfil=$_POST['perfil'];
        $aceptar=$_POST['ingresar'];

//****************************** Pide al usuario ingresar el nombre en caso de no hacerlo *********************************************************/
    if(empty($_POST['usuario'])){
    ?>
        <script type="text/javascript">
            alert('Debe ingresar el nombre de usuario');
            window.location="../index.php";
        </script>
    <?php
    }
//****************************** Pide al usuario ingresar la contrasenna en caso de no hacerlo *********************************************************/
    if(empty($_POST['password'])){
        ?>
            <script type="text/javascript">
                alert('Debe ingresar la contraseña');
                window.location="../index.php";
            </script>
        <?php
    }
//****************************** Pide al usuario seleccionar el perfil en caso de no hacerlo *********************************************************/

    if( isset($_POST['usuario']) && !empty($_POST['usuario']) &&
        isset($_POST['password']) && !empty($_POST['password']) &&
        isset($_POST['perfil']) && !empty($_POST['perfil']))
    {
            $nuevo = new Usuario();
            $result = $nuevo->consultarUsuarioLogin($db, $nom_user);
//**************************** VERIFICA USUARIO  *********************************/
            if($result['nom_user'] !== $_POST['usuario']){
                ?>
                <script type="text/javascript">
                alert('El usuario no está registrado');
                window.location="../index.php";
                </script>
                <?php
            }
//**************************** VERIFICA CONTRASENNA  *********************************/
            if($result['contrasenna'] !== $_POST['password']){
                ?>
                <script type="text/javascript">
                alert('La contraseña no es correcta');
                window.location="../index.php";
                </script>
                <?php
            }
            if (!$result) 
            {
                echo "\nPDO::errorInfo():\n";
            exit;
            }
            
            if($result['nom_user'] == $_POST['usuario'] && 
            $result['contrasenna'] == $_POST['password'] &&
            $result['cargo'] == $_POST['perfil'])
        {
            $_SESSION['usuario'] = $result['nom_user'];
            $_SESSION['cargo'] = $result['cargo'];
            $_SESSION['id'] = $result['id'];
                    //********************* REGISTRA AL USUARIO EN LAS COCKIES ******************** *


                    //******************** */VERIFICA EL TIPO DE USUARIO******************** *

                if($result['cargo'] == 'administrador')
                {
                        //******************** *TRAE LA VISTA A MOSTRAR (administrador, en este caso)******************** *
?>
                        <script type="text/javascript">
                            window.location="../vista/Inicios/inicio_administrador.php";
                        </script>
                    <?php
                    //******************** *CIERRA LA SESION DE ADMINISTRADOR******************** *
                exit();
                }
                    //******************** */VERIFICA EL TIPO DE USUARIO******************** *
                else if ($result['cargo'] == 'farmaceuta')
                {
                    //******************** *TRAE LA VISTA A MOSTRAR (coordinador, en este caso)******************** *
                    ?>
                        <script type="text/javascript">
                            window.location="../vista/Inicios/inicio_farmaceuta.php";
                        </script>
                    <?php
                    //******************** *CIERRA LA SESION DE COORDINADOR******************** *
                exit();
                }  
                    //******************** *VERIFICA EL TIPO DE USUARIO******************** *
                else if($result['cargo'] == 'auxiliar')
                {
                    //******************** *TRAE LA VISTA A MOSTRAR (farmaceuta, en este caso)******************** *
                    ?>
                        <script type="text/javascript">
                            window.location="../vista/Inicios/inicio_auxiliar.php";
                        </script>
                    <?php
                    //******************** *CIERRA LA SESION DE FARMACEUTA******************** *
                exit();
                }
                //******************** *ALTERNATIVA EN CASO DE NO ASIGNAR TIPO DE USUARIO******************** *
                else
                {
                    ?>
                        <script type="text/javascript">
                            alert('No se ha podido validar el perfil de usuario, vuelva a iniciar sesion!');
                        </script>
                        <script type="text/javascript">
                            window.location="../index.php";
                        </script>
                    <?php
            }
        }   
        //******************** *ERROR EN CONTRASEÑA Y USUARIO******************** *
            else 
            {
                ?>
                    <script type="text/javascript">
                        alert('Ususario o contraseña incorrecto!');
                    </script>
                    <script type="text/javascript">
                        window.location="../index.php";
                    </script>
                <?php
            }
    }   
            else
            {
                ?>
                    <script type="text/javascript">
                        alert('Lo sentimos, debe llenar todos los campos para poder iniciar sesion.');
                        window.location="../index.php";
                    </script>
                <?php
            }


}
            else
            {
                echo("HUBO UN ERROR, REINICIE EL NAVEGADOR");
                

                $_SESSION = array();
                 session_unset();
                    ?>
                        <script type="text/javascript">
                            window.location="../index.php";
                        </script>
<?php 
                exit(); 
                exit;	
            }
?>

	