<?php 
include ('../../ctrl_restrito_logado.php');
include '../../conexao.php';
include('../cabecalho.php');

$id = $_POST["id"];
$login = $_POST["login"];
$senha1 = $_POST["senha1"];
$senha2 = $_POST["senha2"];

if($senha1 === $senha2){
	
	$query = mysql_query("SELECT * FROM tbusuarios where idtbusuarios = '".$id."';");
	if($query > 0){
		
		$queryInsert = mysql_query('update tbusuarios set tbusuarioslogin = "'.$login.'", tbusuariossenha = "'.sha1($senha1).'" where idtbusuarios = '.$id.';');
	
		if($queryInsert){
			
			$mensagem = "<div class='alert alert-success' role='alert'><b>Tudo certo!</b> O registro foi alterado com sucesso.</div>";
			$voltar = '<a type="button" href="../principal/index.php" class="btn btn-primary">Voltar</a>';
			
			}else{
				
				$mensagem = "<div class='alert alert-danger' role='alert'><b>Não foi possível alterar o registro. Por favor, verifique!</div>";
				$voltar = '<input type="button" class="btn btn-primary" onClick="JavaScript: window.history.back();" value="Voltar"/>';
			}
				
	}

	
}else{
	
	$mensagem = "<div class='alert alert-danger' role='alert'><b>As senhas não coicidem, por favor, tente novamente!</div>";
	$voltar = '<input type="button" class="btn btn-primary" onClick="JavaScript: window.history.back();" value="Voltar"/>';
	
	}




?>  
    
    <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Mensagem</h1>
                        <p><?php echo $mensagem;?></p>
         				<?php echo $voltar;?>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

<?php

include("../rodape.php");

?>
