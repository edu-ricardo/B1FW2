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
    
    $query = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($query) > 0){
        $usuario = mysqli_fetch_assoc($query);
        
        if ($usuario['senha'] == $senha){
            echo $usuario['session_id'];
            $_SESSION['session_id'] = $usuario['session_id'];
            
            if ($usuario['nivel'] == 'M')
                header('location: ../master_home.php');
            else
                header('location: ../index.php');
        }else
            header('location: ../login.php?erro_login=Senha Inválida');
        
    }else{
        header('location: ../login.php?erro_login=Usuário não encontrado');
    }

?>