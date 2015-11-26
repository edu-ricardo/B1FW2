<?php
function is_session_started()
{
    if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}

function converteDiaSemana($value)
{
	switch ($value) {
		case 1:
			return "Segunda-Feira";
			break;
		case 2:
			return "Terça-Feira";
			break;
		case 3:
			return "Quarta-Feira";
			break;
		case 4:
			return "Quinta-Feira";
			break;
		case 5:
			return "Sexta-Feira";
			break;
		case 6:
			return "Sabado";
			break;				
	}
}
?>