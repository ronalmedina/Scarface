<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/Exception.php';
require '../../PHPMailer/PHPMailer.php';
require '../../PHPMailer/SMTP.php';

class GenerarCodigo {
    public function enviarCodigoUnico($email, $codigo) {
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP y credenciales
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // Servidor SMTP de Gmail
            $mail->SMTPAuth = true;
            $mail->Username = 'soportescarface@gmail.com'; // Tu dirección de correo electrónico
            $mail->Password = 'fwiuhjbgocqspqkq'; // Contraseña de tu cuenta de correo
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Habilitar encriptación TLS o SSL
            $mail->Port = 465; // Puerto SMTP seguro para Gmail

            // Configuración del correo
            $mail->setFrom('soportescarface@gmail.com', 'Soporte Scarface'); // Dirección y nombre del remitente
            $mail->addAddress($email); // Agregar el destinatario
            $mail->isHTML(true);
            $mail->Subject = 'Codigo de Consulta -Scarface-';
            $mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="es" style="padding:0;Margin:0">
                <head>
                <meta charset="UTF-8">
                <meta content="width=device-width, initial-scale=1" name="viewport">
                <meta name="x-apple-disable-message-reformatting">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta content="telephone=no" name="format-detection">
                <title>Nueva plantilla 2</title><!--[if (mso 16)]>
                    <style type="text/css">
                    a {text-decoration: none;}
                    </style>
                    <![endif]--><!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--><!--[if gte mso 9]>
                <xml>
                    <o:OfficeDocumentSettings>
                    <o:AllowPNG></o:AllowPNG>
                    <o:PixelsPerInch>96</o:PixelsPerInch>
                    </o:OfficeDocumentSettings>
                </xml>
                <![endif]--><!--[if !mso]><!-- -->
                <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet"><!--<![endif]-->
                <style type="text/css">
                #outlook a {
                    padding:0;
                }
                .ExternalClass {
                    width:100%;
                }
                .ExternalClass,
                .ExternalClass p,
                .ExternalClass span,
                .ExternalClass font,
                .ExternalClass td,
                .ExternalClass div {
                    line-height:100%;
                }
                .es-button {
                    mso-style-priority:100!important;
                    text-decoration:none!important;
                }
                a[x-apple-data-detectors] {
                    color:inherit!important;
                    text-decoration:none!important;
                    font-size:inherit!important;
                    font-family:inherit!important;
                    font-weight:inherit!important;
                    line-height:inherit!important;
                }
                .es-desk-hidden {
                    display:none;
                    float:left;
                    overflow:hidden;
                    width:0;
                    max-height:0;
                    line-height:0;
                    mso-hide:all;
                }
                .es-button-border:hover a.es-button, .es-button-border:hover button.es-button {
                    background:#e5e5e5!important;
                    color:#007d63!important;
                }
                .es-button-border:hover {
                    background:#e5e5e5!important;
                    border-style:solid solid solid solid!important;
                    border-color:#fe4c70 #fe4c70 #fe4c70 #fe4c70!important;
                }
                @media only screen and (max-width:600px) {p, ul li, ol li, a { line-height:150%!important } h1, h2, h3, h1 a, h2 a, h3 a { line-height:120%!important } h1 { font-size:30px!important; text-align:center } h2 { font-size:26px!important; text-align:center } h3 { font-size:20px!important; text-align:center } .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:30px!important } .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:26px!important } .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px!important } .es-menu td a { font-size:12px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:12px!important } .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:16px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:12px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } a.es-button, button.es-button { font-size:16px!important; display:block!important; border-left-width:0px!important; border-right-width:0px!important } .es-btn-fw { border-width:10px 0px!important; text-align:center!important } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } .es-m-p0l { padding-left:0px!important } .es-m-p0t { padding-top:0px!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } .es-menu td { width:1%!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } .es-desk-hidden { display:table-row!important; width:auto!important; overflow:visible!important; max-height:inherit!important } }
                @media screen and (max-width:384px) {.mail-message-content { width:414px!important } }
                </style>
                </head>
                <body style="width:100%;font-family:arial, helvetica neue, helvetica, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
                <div dir="ltr" class="es-wrapper-color" lang="es" style="background-color:#F6F6F6"><!--[if gte mso 9]>
                            <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
                                <v:fill type="tile" color="#f6f6f6"></v:fill>
                            </v:background>
                        <![endif]-->
                <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#F6F6F6">
                    <tr style="border-collapse:collapse">
                    <td valign="top" style="padding:0;Margin:0">
                    <table cellpadding="0" cellspacing="0" class="es-header" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                        <tr style="border-collapse:collapse">
                        <td align="center" bgcolor="#ffffff" style="padding:0;Margin:0;background-color:#ffffff">
                        <table bgcolor="#FFFFFF" class="es-header-body" align="center" cellpadding="0" cellspacing="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                            <tr style="border-collapse:collapse">
                            <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;background-position:center top">
                            <table cellpadding="0" cellspacing="0" width="100%" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                <tr style="border-collapse:collapse">
                                <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                                <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                    <tr style="border-collapse:collapse">
                                    <td align="center" style="padding:0;Margin:0;font-size:0px"><a target="_blank" href="https://viewstripo.email/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;color:#1376C8;font-size:14px"><img class="adapt-img" src="https://fhgbglf.stripocdn.email/content/guids/CABINET_1225434073b5c40cc247fd30a4370e7f2eaf4c37e0a0be2415ff2152211f2e37/images/logo.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" height="65"></a></td>
                                    </tr>
                                </table></td>
                                </tr>
                            </table></td>
                            </tr>
                        </table></td>
                        </tr>
                    </table>
                    <table cellpadding="0" cellspacing="0" class="es-content" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                        <tr style="border-collapse:collapse">
                        <td align="center" style="padding:0;Margin:0;background-image:url(https://fhgbglf.stripocdn.email/content/guids/CABINET_2186a850c3b1616469e9a89f9c4c388a/images/53941556614239491.png);background-position:center top;background-repeat:no-repeat;background-color:#ffffff" bgcolor="#ffffff" background="https://fhgbglf.stripocdn.email/content/guids/CABINET_2186a850c3b1616469e9a89f9c4c388a/images/53941556614239491.png">
                        <table class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" role="none">
                            <tr style="border-collapse:collapse">
                            <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;background-color:#f5eddf" bgcolor="#f5eddf">
                            <table cellpadding="0" cellspacing="0" width="100%" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                <tr style="border-collapse:collapse">
                                <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                                <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:center bottom" role="presentation">
                                    <tr style="border-collapse:collapse">
                                    <td align="center" style="padding:0;Margin:0"><h1 style="Margin:0;line-height:43px;mso-line-height-rule:exactly;font-family:playfair display, georgia, times new roman, serif;font-size:36px;font-style:normal;font-weight:normal;color:#0c4125"><b>Soporte Scarface</b></h1></td>
                                    </tr>
                                </table></td>
                                </tr>
                            </table></td>
                            </tr>
                            <tr style="border-collapse:collapse">
                            <td align="left" style="padding:0;Margin:0;padding-left:20px;padding-right:20px;padding-top:30px;background-color:#f5eddf" bgcolor="#f5eddf">
                            <table cellpadding="0" cellspacing="0" width="100%" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                <tr style="border-collapse:collapse">
                                <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                                <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-position:center top" role="presentation">
                                    <tr style="border-collapse:collapse">
                                    <td align="center" style="padding:0;Margin:0;font-size:0"><a target="_blank" href="https://viewstripo.email/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;color:#CCCCCC;font-size:14px"><img class="adapt-img" src="https://fhgbglf.stripocdn.email/content/guids/CABINET_2186a850c3b1616469e9a89f9c4c388a/images/8521556613965406.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="500"></a></td>
                                    </tr>
                                </table></td>
                                </tr>
                            </table></td>
                            </tr>
                        </table></td>
                        </tr>
                    </table>
                    <table cellpadding="0" cellspacing="0" class="es-content" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                        <tr style="border-collapse:collapse">
                        <td align="center" bgcolor="#ffffff" style="padding:0;Margin:0;background-color:#ffffff">
                        <table class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" role="none">
                            <tr style="border-collapse:collapse">
                            <td align="left" bgcolor="#f5eddf" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;background-color:#f5eddf">
                            <table cellpadding="0" cellspacing="0" width="100%" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                <tr style="border-collapse:collapse">
                                <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                                <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                    <tr style="border-collapse:collapse">
                                    <td align="center" style="padding:0;Margin:0"><h2 style="Margin:0;line-height:22px;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;font-size:18px;font-style:normal;font-weight:bold;color:#0c4125"><b>AL PARECER HAS TENIDO ALGUNOS PROBLEMAS</b></h2></td>
                                    </tr>
                                </table></td>
                                </tr>
                            </table></td>
                            </tr>
                            <tr style="border-collapse:collapse">
                            <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;background-color:#f5eddf" bgcolor="#f5eddf">
                            <table cellpadding="0" cellspacing="0" width="100%" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                <tr style="border-collapse:collapse">
                                <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                                <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                    <tr style="border-collapse:collapse">
                                    <td align="center" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px"><b>Desde Scarface buscamos la calidad en todo instante hacia nuestros referentes, siendo ustedes clientes, sin embargo, apenados nos encontramos referente a los daños o problemas sufridos con tus pedidos</b></p></td>
                                    </tr>
                                    <tr style="border-collapse:collapse">
                                    <td align="center" height="40" style="padding:0;Margin:0"></td>
                                    </tr>
                                    <tr style="border-collapse:collapse">
                                    <td align="center" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px"><b>Usa este codigo para consultar tu PQR</b></p></td>
                                    </tr>
                                    <tr style="border-collapse:collapse">
                                    <td align="center" style="padding:0;Margin:0"><h1 style="Margin:0;line-height:43px;mso-line-height-rule:exactly;font-family:arial, helvetica neue, helvetica, sans-serif;font-size:36px;font-style:normal;font-weight:normal;color:#0c4125"><b>'.$codigo.'</b></h1></td>
                                    </tr>
                                </table></td>
                                </tr>
                            </table></td>
                            </tr>
                        </table></td>
                        </tr>
                    </table>
                    <table cellpadding="0" cellspacing="0" class="es-footer" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                        <tr style="border-collapse:collapse">
                        <td align="center" bgcolor="#ffffff" style="padding:0;Margin:0;background-color:#ffffff">
                        <table bgcolor="#ffffff" class="es-footer-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#ffffff;width:600px" role="none">
                            <tr style="border-collapse:collapse">
                            <td align="left" style="padding:0;Margin:0">
                            <table cellpadding="0" cellspacing="0" width="100%" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                <tr style="border-collapse:collapse">
                                <td align="left" style="padding:0;Margin:0;padding-top:15px;padding-left:20px;padding-right:20px;background-color:#f5eddf" bgcolor="#f5eddf">
                                <table cellpadding="0" cellspacing="0" width="100%" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                    <tr style="border-collapse:collapse">
                                    <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                                    <table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-image:url(https://fhgbglf.stripocdn.email/content/guids/CABINET_2186a850c3b1616469e9a89f9c4c388a/images/18471556615499706.png);background-position:center top;background-repeat:no-repeat" role="presentation" background="https://fhgbglf.stripocdn.email/content/guids/CABINET_2186a850c3b1616469e9a89f9c4c388a/images/18471556615499706.png">
                                        <tr style="border-collapse:collapse">
                                        <td align="center" style="padding:0;Margin:0;padding-top:20px;padding-bottom:20px"><h1 style="Margin:0;line-height:43px;mso-line-height-rule:exactly;font-family:playfair display, georgia, times new roman, serif;font-size:36px;font-style:normal;font-weight:normal;color:#0c4125"><b>REGRESA</b></h1></td>
                                        </tr>
                                    </table></td>
                                    </tr>
                                </table></td>
                                </tr>
                            </table></td>
                            </tr>
                            <tr style="border-collapse:collapse">
                            <td align="left" style="padding:0;Margin:0;padding-bottom:10px;padding-left:20px;padding-right:20px;background-color:#f5eddf" bgcolor="#f5eddf">
                            <table cellpadding="0" cellspacing="0" width="100%" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                <tr style="border-collapse:collapse">
                                <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
                                <table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                    <tr style="border-collapse:collapse">
                                    <td align="center" bgcolor="#f5eddf" style="padding:0;Margin:0;padding-top:5px;padding-bottom:15px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial,helvetica neue, helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px"><b>Somos humanos y aun con errores lo volvemos a intentar</b></p></td>
                                    </tr>
                                </table></td>
                                </tr>
                            </table></td>
                            </tr>
                        </table></td>
                        </tr>
                    </table></td>
                    </tr>
                </table>
                </div>
                </body>
                </html>';

            // Envío del correo
            $mail->send();
            return true; // Éxito en el envío del correo
        } catch (Exception $e) {
            throw new Exception("Error al enviar correo electrónico: {$mail->ErrorInfo}");
        }
    }
}
?>
