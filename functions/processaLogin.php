<?php
    include_once('../dbfun/conexao.php');
    
    // Recupera dados
    $login = $_POST['login'];
    $senha = md5($_POST['senha']);
    
    // Inicia sessão 
    session_start();
    
    if (isset($_SESSION['session_id']))
        unset($_SESSION['session_id']);
    
    $sql  = "select * from usuario ";
    $sql .= "where login = '$login'";
    echo $sql;
    $query = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($query) > 0){
        $usuario = mysqli_fetch_assoc($query);
        
        if ($usuario['senha'] == $senha){
            $_SESSION['session_id'] = $usuario['session_id'];
            
            
            switch ($usuario['nivel']) {
                case 'M':
                    header('location: ../master_home.php');
                    break;
                case 'P':
                    header('location: ../prof_home.php');
                    break;
                case 'A':
                    header('location: ../aluno_home.php');
                    break;
            }

        }else{
           header('location: ../login.php?erro_login=Senha Inválida');
        }
        
    }else{
       header('location: ../login.php?erro_login=Usuário não encontrado');
    }

?>