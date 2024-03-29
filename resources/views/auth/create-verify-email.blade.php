<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Password</title>
    <style type="text/css">
        body {
            Margin: 0;
            padding: 0;
            background-color: #f6f9fc;
        }

        table {
            border-spacing: 0;
        }

        td {
            padding: 0;
        }

        img {
            border: 0;
        }

        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #f6f9fc;
            padding-bottom: 40px;
        }

        .webkit {
            max-width: 600px;
            background-color: #FFFFFF;
        }

        .outer {
            Margin: 0 auto;
            width: 100%;
            max-width: 600px;
            border-spacing: 0;
            font-family: sans-serif;
            color: #4a4a4a;
        }

        @media screen and (max-width: 600px) {}

        @media screen and (max-width: 400px) {}
    </style>
</head>

<body>
    <center class="wrapper">
        <div class="webkit">
            <table class="outer" align="center">
                <tr>
                    <td>
                        <table width="100%" style="border-spacing: 0;">
                            <tr>
                                <td style="
                                    background-image: url('https://media.istockphoto.com/photos/empty-warehouse-showroom-picture-id500328404?k=20&m=500328404&s=612x612&w=0&h=cNI-G9SUYTSiwBdy3RbmVujjEF12lCZRGKmmKxH3qB0=');
                                    padding:10px;text-align:center;
                                ">
                                    <a href="http://127.0.0.1:8000/"><img
                                            src="https://www.octalsoft.com/wp-content/uploads/2015/09/wms_logo.png"
                                            width="180" alt="Logo" title="Logo"></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" style="border-spacing: 0;">
                            <tr style="background-color: #72FFFF;padding:10px;text-align:center;">
                                <td>
                                    <h1>Verify your email address</h1>
                                    <p>The Administrator entered <strong>{{ $email }}</strong> as the email address
                                        for your account.</p>
                                    <p>Please verify this email address by clicking button below.</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" style="border-spacing: 0;">
                            <tr style="background-color: #72FFFF;padding:10px;text-align:center;height:100px;">
                                <td>
                                    <a href="{{ url('/create-password/'.$token) }}"
                                        style="text-decoration:none;background-color:#5800FF;color:#FFFFFF;padding:10px;">
                                        Verify your email
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width="100%" style="border-spacing: 0;">
                            <tr style="background-color: #FFFFFF;padding:10px;text-align:center;height:100px;">
                                <td>
                                    <p style="font-size: 13px !important; margin-bottom: 1rem !important">
                                        Copyright © 2022 CGA Warehouse, All Rights Reserved
                                    </p>
                                    <p style="font-size: 13px !important; margin-bottom: 1rem !important">
                                        Visit us at
                                        <a href="http://127.0.0.1:8000/" target="_blank"
                                            style="color: blue !important; text-decoration: none !important">CGA
                                            Warehouse Website</a>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </center>
</body>

</html>