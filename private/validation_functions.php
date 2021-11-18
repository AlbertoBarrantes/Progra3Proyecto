<?php

// está_en blanco ('abcd')
   // * validar la presencia de datos
   // * usa trim () para que los espacios vacíos no cuenten
   // * usa === para evitar falsos positivos
   // * mejor que vacío () que considera que "0" está vacío
  function is_blank($value) {
    return !isset($value) || trim($value) === '';
  }

// has_presence ('abcd')
   // * validar la presencia de datos
   // * reverso de is_blank ()
   // * Prefiero los nombres de validación con "has_"
  function has_presence($value) {
    return !is_blank($value);
  }

// has_length_greater_than ('abcd', 3)
   // * validar la longitud de la cadena
   // * los espacios cuentan para la longitud
   // * use trim () si los espacios no deben contar
  function has_length_greater_than($value, $min) {
    $length = strlen($value);
    return $length > $min;
  }

 // has_length_less_than ('abcd', 5)
   // * validar la longitud de la cadena
   // * los espacios cuentan para la longitud
   // * use trim () si los espacios no deben contar
  function has_length_less_than($value, $max) {
    $length = strlen($value);
    return $length < $max;
  }

// has_length_exactly ('abcd', 4)
   // * validar la longitud de la cadena
   // * los espacios cuentan para la longitud
   // * use trim () si los espacios no deben contar
  function has_length_exactly($value, $exact) {
    $length = strlen($value);
    return $length == $exact;
  }

// has_length ('abcd', ['min' => 3, 'max' => 5])
   // * validar la longitud de la cadena
   // * combina funciones_mayor_que, _menos_que, _exactamente
   // * los espacios cuentan para la longitud
   // * use trim () si los espacios no deben contar
  function has_length($value, $options) {
    if(isset($options['min']) && !has_length_greater_than($value, $options['min'] - 1)) {
      return false;
    } elseif(isset($options['max']) && !has_length_less_than($value, $options['max'] + 1)) {
      return false;
    } elseif(isset($options['exact']) && !has_length_exactly($value, $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  // has_inclusion_of( 5, [1,3,5,7,9] )
  // * validar la inclusión en un set
  function has_inclusion_of($value, $set) {
  	return in_array($value, $set);
  }

  // has_exclusion_of( 5, [1,3,5,7,9] )
  // * validar la exclusión de un set
  function has_exclusion_of($value, $set) {
    return !in_array($value, $set);
  }

// has_string ('nadie@nowhere.com', '.com')
   // * validar la inclusión de carácter (s)
   // * strpos devuelve la posición inicial de la cadena o falso
   // * usa! == para evitar que la posición 0 se considere falsa
   // * strpos es más rápido que preg_match ()
  function has_string($value, $required_string) {
    return strpos($value, $required_string) !== false;
  }

// has_valid_email_format ('nadie@nowhere.com')
   // * validar el formato correcto para las direcciones de correo electrónico
   // * formato: [caracteres] @ [caracteres]. [2+ letras]
   // * preg_match es útil, usa una expresión regular
   // devuelve 1 para una coincidencia, 0 para ninguna coincidencia
   // http://php.net/manual/en/function.preg-match.php
  function has_valid_email_format($value) {
    $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    return preg_match($email_regex, $value) === 1;
  }

// has_unique_page_menu_name ('Historial')
   // * Valida la unicidad de pages.menu_name
   // * Para registros nuevos, proporcione solo el nombre_menú.
   // * Para registros existentes, proporcione ID actual como segundo argumento
   // has_unique_page_menu_name ('Historial', 4)
  function has_unique_page_menu_name($menu_name, $current_id="0") {
    global $db;

    $sql = "SELECT * FROM pages ";
    $sql .= "WHERE menu_name='" . db_escape($db, $menu_name) . "' ";
    $sql .= "AND id != '" . db_escape($db, $current_id) . "'";

    $page_set = mysqli_query($db, $sql);
    $page_count = mysqli_num_rows($page_set);
    mysqli_free_result($page_set);

    return $page_count === 0;
  }

// has_unique_username ('johnqpublic')
   // * Valida la unicidad de admins.username
   // * Para registros nuevos, proporcione solo el nombre de usuario.
   // * Para los registros existentes, proporcione la ID actual como segundo argumento
   // has_unique_username ('johnqpublic', 4)
  function has_unique_username($username, $current_id="0") {
    global $db;

    $sql = "SELECT * FROM admins ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
    $sql .= "AND id != '" . db_escape($db, $current_id) . "'";

    $result = mysqli_query($db, $sql);
    $admin_count = mysqli_num_rows($result);
    mysqli_free_result($result);

    return $admin_count === 0;
  }

?>
