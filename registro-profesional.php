<?php
// la URL que contendrá la acción es la propia página que contiene el formulario
$action_slug = $wp_query->query_vars['name'];
// un error genérico para campos vacíos
$generic_error = "Debe completar este campo del formulario";
// preparando la validación de errores en recio castellano
if ( isset($_POST['signup-submit']) ) {
        // usuario vacio
        if ( $_POST['signup-username'] == '' || $_POST['signup-username'] == ' ' ) {
                $name_val = '';
                $name_msg = "<span class="error"><strong>" . $generic_error . "</strong></span>";
                $form_username_class = " error";
        } elseif ( isset($user_exist) ) {
        // el usuario ya existe
                $name_val = $_POST['signup-username'];
                $name_msg = "<span class="error"><strong>El nombre de usuario ya existe.</strong></span>";
                $form_username_class = " error";
        } else {
        // todo correcto, de momento
                $name_val = $_POST['signup-username'];
                $name_msg = "";
                $form_username_class = "";
        }

        if ( $_POST['signup-pass'] != $_POST['signup-pass2'] ) {
        // las password no coinciden
                $pass_val = "";
                $pass_msg = "<span class="error"><strong>Las contraseñas introducidas no coinciden.</strong></span>
";
                $form_pass_class = " error";
       } else {
                $pass_val = "";
                $pass_msg = "";
                $form_pass_class = "";
        }

        if ( $_POST['signup-mail'] == '' ) {
        // correo vacío
                $mail_val = "";
                $mail_msg = "<span class="error"><strong>" . $generic_error . "</strong></span>";
                $form_mail_class = " error";
        } elseif ( isset($mail_exist) ) {
        // el correo ya existe
                $mail_val = $_POST['signup-mail'];
                $mail_msg = "<span class="error"><strong>La dirección de correo ya existe.</strong></span>";
                $form_mail_class = " error";
        } else {
                $mail_val = $_POST['signup-mail'];
                $mail_msg = "";
                $form_mail_class = "";
        }
        // ------------------ ESTA VALIDACION ES TEMPORAL - DBERIA SER EL CAPTCHA ---------------------------------------
        if ( $_POST['signup-human'] != '13' ) {
        // sueñan los androides con bots rusos?
                $human_val = $_POST['signup-human'];
                $human_msg = "<span class="error"><strong>La validación de seguridad es incorrecta.</span>";
                $form_human_class = " error";
        } else {
                $human_val = $_POST['signup-human'];
                $human_msg = "";
                $form_human_class = "";
        }
        if ( $_POST['signup-conditions'] != 'accept' ) {
        // check de condiciones legales o lo que sea
                $conditions_val = "accept";
                $conditions_msg = "<span class="error"><strong>Debe aceptar la política de privacidad.</strong></span>
";
                $form_conditions_class = " error";
        } else {
                $conditions_val = "accept";
                $conditions_msg = "";
                $form_conditions_class = "";
        }
        // catching all $_POST data
        $first_val = $_POST['signup-firstname'];
        $last_val = $_POST['signup-lastname'];
        $bio_val = $_POST['signup-bio'];
        $twitter_val = $_POST['signup-twitter'];
        $web_val = $_POST['signup-website'];
        $feed_val = $_POST['signup-feed'];
        $institution_val = $_POST['signup-institution'];

}

// aquí el formulario en sí, en todo su esplendor geométrico
$signup_form = '
<form id="signup" action="' .$action_slug. '" method="post" name="signup" enctype="multipart/form-data">
<fieldset class="required' .$form_username_class. '"><span class="req">*</span>
 <input id="signup-username" type="text" name="signup-username" value="' .$name_val. '" />
 <label>Username</label>
<div class="mini-faq">" .$name_msg. "</div></fieldset>
<fieldset><input id="signup-pass" type="password" name="signup-pass" value="" />
 <label>Password</label>
<div class="mini-faq">Combine letras minúsculas, mayúsculas, números y signos para crear una contraseña segura.</div></fieldset>
<fieldset class="required' .$form_pass_class. '"><input id="signup-pass2" type="password" name="signup-pass2" value="" />
 <label>Password confirmation</label></fieldset>
<fieldset class="required' .$form_mail_class. '"><span class="req">*</span>
 <input id="signup-mail" type="text" name="signup-mail" value="&quot; .$mail_val. &quot;" />
 <label>E-mail</label>
</fieldset>
<fieldset><input id="signup-firstname" type="text" name="signup-firstname" value="' .$first_val. '" />
 <label>Nombre</label>
<fieldset><input id="signup-lastname" type="text" name="signup-lastname" value="' .$last_val. '" />
 <label>Apellido</label></fieldset>
<fieldset><textarea id="signup-bio" name="signup-bio" rows="10" cols="45">' .$bio_val. '</textarea>
 <label>Otros datos</label></fieldset>
<fieldset><input id="signup-institution" type="text" name="signup-institution" value="' .$institution_val. '" />
 <label>Institución</label>
<fieldset><input id="signup-twitter" type="text" name="signup-twitter" value="' .$twitter_val. '" />
 <label>Cuenta de Twitter</label>
<div class="mini-faq"><strong>Usuario de Twitter</strong>.</div></fieldset>
<fieldset><input id="signup-website" type="text" name="signup-website" value="' .$web_val. '" />
 <label>Sitio web</label></fieldset>
<fieldset><input id="signup-feed" type="text" name="signup-feed" value="' .$feed_val. '" />
 <label>Web Feed</label>
<fieldset class="rem' .$form_conditions_class. '"><input id="signup-conditions" type="checkbox" name="signup-conditions" value="' .$conditions_val. '" />
 <label>Acepto la política de privacidad, blao blao.</label>
<div class="mini-faq">' .$conditions_msg. '</div></fieldset>
<fieldset class="required' .$form_human_class. '"><input id="signup-human" type="text" name="signup-human" value="' .$human_val. '" />
 <label>¿cuatro más nueve?</label>
<div class="mini-faq">' .$human_msg. '<strong>Esto vendría a ser un captcha</strong></div></fieldset>
<fieldset><input id="sigup-ref" type="hidden" name="signup-ref" value="' .$ref. '" />
 <input id="signup-submit" type="submit" name="signup-submit" value="Registrarse como profesional" /></fieldset>
</form>
<!-- #signup -->';
