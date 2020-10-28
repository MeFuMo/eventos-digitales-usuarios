<?php
/**
* Plantilla para registro de profesionales
*
**/

// cosas de WP, para hacer posible la edición antes del formulario

boldthemes_set_override();

get_header();

the_post();

the_content();

// la URL que contendrá la acción es la propia página que contiene el formulario
$action_slug = $wp_query->query_vars['name'];


/**
*           ----------- ATENCIÓN - ATTENTION - ACHTUNG --------------
*
* Se recomienda encarecidamente al que vaya a contemplar el código que sigue
* el uso de material de protección, por ejemplo unas gafas de soldador, a partir de este punto.
**/



// preparando la validación de errores en recio castellano
if ( isset($_POST['signup-submit']) ) {
    // un error genérico para campos vacíos
    $generic_error = "Debe completar este campo del formulario";
    // un array para ir guardando mensajes de error, luego haremos la envolvente
    $errors = [];
    if ( $_POST['signup-mail'] == '' ) {
            // correo vacío
            $mail_val = "";
            $errors['mail'] = '<span class="error"><strong>' . $generic_error . '</strong></span>';
            $form_mail_class = " error";
        // mail exists es una esperanza de que haya una función de WP para esto
        /*} elseif ( isset($mail_exist) ) {
            // el correo ya existe
            $mail_val = $_POST['signup-mail'];
            $errors['mail'] = '<span class="error"><strong>La dirección de correo ya existe.</strong></span>';
            $form_mail_class = " error";*/
        } else {
                $mail_val = $_POST['signup-mail'];
                $form_mail_class = "";
        }
    }

    if ( $_POST['signup-pass2'] == "" )  {
        $pass_val = "";
        $errors['pass'] = '<span class="error"><strong>' . $generic_error . '</strong></span>';
        $form_pass_class = " error";
   } elseif ( $_POST['signup-pass'] != $_POST['signup-pass2'] ) {
        // las password no coinciden
        $pass_val = "";
        $errors['pass'] = '<span class="error"><strong>Las contraseñas introducidas no coinciden.</strong></span>';
        $form_pass_class = " error";
    } else {
        $pass_val = "";
        $form_pass_class = "";
    }


    // ------------------ ESTA VALIDACION ES TEMPORAL - DBERIA SER EL CAPTCHA ---------------------------------------
    if ( $_POST['signup-human'] != '13' ) {
            // sueñan los androides con bots rusos?
            $human_val = $_POST['signup-human'];
            $errors['human'] = '<span class="error"><strong>La validación de seguridad es incorrecta.</span>';
            $form_human_class = " error";
    } else {
            $human_val = $_POST['signup-human'];
            $form_human_class = "";
    }
    if ( $_POST['signup-conditions'] != 'accept' ) {
    // check de condiciones legales o lo que sea
            $conditions_val = "";
             $errors['conditions'] = '<span class="error"><strong>Debe aceptar la política de privacidad.</strong></span>';
            $form_conditions_class = " error";
    } else {
            //$conditions_val = "accept";
            $conditions_val = "";
            $form_conditions_class = "";
    }
    // ya me canso
    $first_val = $_POST['signup-firstname'];
    $last_val = $_POST['signup-lastname'];
    $document_val = $_POST['signup-document'];
    $institution_val = $_POST['signup-institution'];
    $cif_val = $_POST['signup-cif'];
    $country_val = $_POST['signup-country'];
    $region_val = $_POST['signup-region'];
    $city_val = $_POST['signup-city'];
    $address_val = $_POST['signup-address'];
    $postcode_val = $_POST['signup-postcode'];
    $phone_val = $_POST['signup-phone'];
    $website_val = $_POST['signup-website'];
    $facebook_val = $_POST['signup-facebook'];
    $twitter_val = $_POST['signup-twitter'];
    $instagram_val = $_POST['signup-instagram'];
    $linkedin_val = $_POST['signup-linkedin'];
    $socialnet2_val = $_POST['signup-socialnet2'];
    $position_val = $_POST['signup-position'];
    $position2_val = $_POST['signup-position2'];
    $activity_val = $_POST['signup-activity'];
    $interests_val = $_POST['signup-interests'];
    $interests2_val = $_POST['signup-interests2'];
    $interests2_val = $_POST['signup-interests2'];
    $profile_val = $_POST['signup-profile'];
    $prointerests_val = $_POST['signup-prointerests'];

}

// aquí el formulario en sí, en todo su esplendor geométrico
$signup_form = '
<form id="signup" action="' . $action_slug . '" method="post" name="signup" enctype="multipart/form-data">
<fieldset class="required' . $form_mail_class . '"><span class="req">*</span>
 <input id="signup-mail" type="text" name="signup-mail" value="' . $mail_val . '" />
 <label>E-mail</label>
 <div class="mini-faq"><strong>' . array_key_exists('mail', $errors) ? echo $errors['mail'] : '' . '</strong>.</div></fieldset>
</fieldset>
<fieldset><input id="signup-pass" type="password" name="signup-pass" value="" />
 <label>Contraseña</label>
<div class="mini-faq">Combine letras minúsculas, mayúsculas, números y signos para crear una contraseña segura.</div></fieldset>
<fieldset class="required' . $form_pass_class . '"><input id="signup-pass2" type="password" name="signup-pass2" value="" />
 <label>Password confirmation</label></fieldset>
<fieldset><input id="signup-firstname" type="text" name="signup-firstname" value="' . $first_val . '" />
 <label>Nombre</label>
<fieldset><input id="signup-lastname" type="text" name="signup-lastname" value="' . $last_val . '" />
 <label>Apellidos</label></fieldset>
 <fieldset><input id="signup-document" type="text" name="signup-document" value="' . $document_val . '" />
 <label>Número de documento</label></fieldset>
<fieldset><input id="signup-institution" type="text" name="signup-institution" value="' . $institution_val . '" />
 <label>Empresa o institución</label></fieldset>
<fieldset><input id="signup-cif" type="text" name="signup-cif" value="' . $cif_val . '" />
 <label>CIF</label></fieldset>
<fieldset><input id="signup-country" type="text" name="signup-country" value="' . $country_val . '" />
 <label>País</label></fieldset>
<fieldset><input id="signup-region" type="text" name="signup-region" value="' . $region_val . '" />
 <label>Provincia</label></fieldset>
<fieldset><input id="signup-city" type="text" name="signup-city" value="' . $city_val . '" />
 <label>Localidad</label></fieldset>
<fieldset><input id="signup-address" type="text" name="signup-address" value="'  . $address_val . '" />
 <label>Localidad</label></fieldset>
<fieldset><input id="signup-postcode" type="text" name="signup-postcode" value="'  . $postcode_val . '" />
 <label>Código postal</label></fieldset>
<fieldset><input id="signup-phone" type="text" name="signup-phone" value="'  . $phone_val . '" />
 <label>Teléfono</label></fieldset>
<fieldset><input id="signup-website" type="text" name="signup-website" value="' . $website_val . '" />
 <label>Sitio web</label></fieldset>
<fieldset><input id="signup-facebook" type="text" name="signup-facebook" value="'  . $facebook_val . '" />
 <label>Facebook</label></fieldset>
<fieldset><input id="signup-twitter" type="text" name="signup-twitter" value="' .$twitter_val. '" />
 <label>Twitter</label>
<div class="mini-faq"><strong>Usuario de Twitter</strong>.</div></fieldset>
<fieldset><input id="signup-instagram" type="text" name="signup-instagram" value="'  . $instagram_val . '" />
 <label>Instagram</label></fieldset>
<fieldset><input id="signup-linkedin" type="text" name="signup-linkedin" value="'  . $linkedin_val . '" />
  <label>Linkedin</label></fieldset>
<fieldset><input id="signup-socialnet2" type="text" name="signup-socialnet2" value="'  . $socialnet2_val . '" />
  <label>Otra red</label></fieldset>
<fieldset><input id="signup-position" type="text" name="signup-position" value="'  . $position_val . '" />
  <label>Cargo</label></fieldset>
<fieldset><input id="signup-position2" type="text" name="signup-position2" value="'  . $position2_val . '" />
  <label>Otro cargo</label></fieldset>
<fieldset><input id="signup-activity" type="text" name="signup-activity" value="'  . $activity_val . '" />
  <label>Sector de actividad</label></fieldset>
<fieldset><input id="signup-interests" type="text" name="signup-interests" value="'  . $interests_val . '" />
  <label>Sectores de interés</label></fieldset>
<fieldset><input id="signup-interests2" type="text" name="signup-interests2" value="'  . $interests2_val . '" />
  <label>Otros intereses</label></fieldset>';

// Aqui empieza el catálogo de profesionales

$signup_form .= '
<fieldset><textarea id="signup-profile" name="signup-profile" rows="10" cols="45">' . $profile_val . '</textarea>
 <label>Breve descripción de su perfil profesional</label></fieldset>
<fieldset><textarea id="signup-prointerests" name="signup-prointerests" rows="10" cols="45">' . $prointerests_val . '</textarea>
 <label>Breve descripción de sus intereses en este evento</label></fieldset>


<fieldset><input id="signup-picture" type="file" name="signup-picture"></fieldset>

<fieldset class="rem' . $form_conditions_class . '"><input id="signup-conditions" type="checkbox" name="signup-conditions" value="' . $conditions_val . '" />
 <label> <p>Acepto Política de privacidad</p>
        <p>&nbsp;</p>
        <p><em>Nota: El aceptar la participación al evento implica que mi Nombre, actividad profesional y descripción sea publicado en un archivo de acceso público, con la finalidad establecer posibles relaciones comerciales con otros profesionales</em></p>
        <p>&nbsp;</p>
        <p><strong>CONSENTIMIENTO PARA EL TRATAMIENTO DE DATOS PERSONALES </strong><strong>SEVENTHE COMUNICACION Y ACCESIBILIDAD SL</strong> es el Responsable del tratamiento de los datos personales del Usuario y le informa de que estos datos se tratarán de conformidad con lo dispuesto en el Reglamento (UE) 2016/679, de 27 de abril (GDPR), y la Ley Orgánica 3/2018, de 5 de diciembre (LOPDGDD), por lo que se le facilita la siguiente información del tratamiento:<br />
        <strong>Fines y legitimación del tratamiento:</strong> mantener una relación comercial (por interés legítimo<br />
        del responsable, art. 6.1.f GDPR) y envío de comunicaciones de productos o servicios (con el consentimiento del interesado, art. 6.1.a GDPR).<br />
        <strong>Criterios de conservación de los datos:</strong> se conservarán durante no más tiempo del necesario para mantener el fin del tratamiento o mientras existan prescripciones legales que dictaminen su custodia y cuando ya no sea necesario para ello, se suprimirán con medidas de seguridad adecuadas para garantizar la anonimización de los datos o la destrucción total de los mismos.<br />
        <strong>Comunicación de los datos:</strong> se podrán comunicar sus datos a la empresa organizadora del evento: Junta de Castilla y León por ser necesarios para lograr la finalidad del tratamiento, o por obligación legal.<br />
        <strong>Derechos que asisten al Usuario:</strong> derecho a retirar el consentimiento en cualquier momento. Derecho de acceso, rectificación, portabilidad y supresión de sus datos, y de limitación u oposición a su tratamiento. Derecho a presentar una reclamación ante la Autoridad de control (www.aepd.es) si considera que el tratamiento no se ajusta a la normativa vigente.<br />
        <strong>Datos de contacto para ejercer sus derechos:</strong> seventhe@seventhe.es.</p>
                </span>
  </label></fieldset>

<fieldset class="required' . $form_human_class . '"><input id="signup-human" type="text" name="signup-human" value="' .$human_val. '" />
 <label>¿cuatro más nueve?</label>
<div class="mini-faq">' . $errors['human'] . '<strong>Esto vendría a ser un captcha</strong></div></fieldset>
<fieldset><input id="sigup-ref" type="hidden" name="signup-ref" value="' .$ref. '" />
 <input id="signup-submit" type="submit" name="signup-submit" value="Registrarse como profesional" /></fieldset>
</form>
<!-- #signup -->';

get_footer(); 
