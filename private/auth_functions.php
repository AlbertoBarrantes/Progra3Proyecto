<?php

  // Realiza todas las acciones necesarias para iniciar sesión como administrador
  function log_in_admin($admin) {
  // La regeneración de la identificación protege al administrador de la fijación de la sesión.
    session_regenerate_id();
    $_SESSION['admin_id'] = $admin['id'];
    $_SESSION['last_login'] = time();
    $_SESSION['username'] = $admin['username'];
    return true;
  }

  // Realiza todas las acciones necesarias para cerrar la sesión de un administrador.
  function log_out_admin() {
    unset($_SESSION['admin_id']);
    unset($_SESSION['last_login']);
    unset($_SESSION['username']);
    // session_destroy (); // opcional: destruye toda la sesión
    return true;
  }


// is_logged_in () contiene toda la lógica para determinar si un
   // La solicitud debe considerarse una solicitud "iniciada" o no.
   // Es el núcleo de require_login () pero también se puede llamar
   // por sí solo en otros contextos (por ejemplo, mostrar un enlace si un administrador
   // está conectado y muestra otro enlace si no lo está)
  function is_logged_in() {
// Tener un admin_id en la sesión tiene un doble propósito:
     // - Su presencia indica que el administrador está conectado.
     // - Su valor indica qué administrador debe buscar su registro.
    return isset($_SESSION['admin_id']);
  }

// Llame a require_login () en la parte superior de cualquier página que necesite
   // requiere un inicio de sesión válido antes de otorgar acceso a la página.
  function require_login() {
    if(!is_logged_in()) {
      redirect_to(url_for('/staff/login.php'));
    } else {
      // No hagas nada, deja que el resto de la página continúe
    }
  }

?>
