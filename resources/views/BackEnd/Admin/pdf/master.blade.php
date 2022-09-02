<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--  <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <title>Tax Payment</title>
    <style>
    .custom-header-table {
        background-color: rgb(85, 88, 139);
        color: #fff;
        margin-bottom: 10px;

    }

    .custom-header-table th {
        padding: 10px !important;

    }

    .customer-table-boody {
        border-bottom: 1px #ccc solid;

    }

    .custom-table-footer {
        margin-top: 20px !important;
    }

    .border-radius-first {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    .border-radius-last {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    @font-face {
        font-family: "Kalpurush";
        src: url("{{ storage_path('fonts/sagarnormal.ttf')}}");
    
    }
    body {
       /*  font-family: "Nikosh"; */
        font-family: "sagarnormal";
    }
    p {
        font-size: 22px;
    }
    </style>
    <title>Tax Payment</title>
</head>

<body>
    <!-- <h4></h4> -->
    <table width="100%">
        <tr>
            <td>
                <h1 align="center">{{ config('company.company_name') }}</h1>

                <p align="center" style="margin-top:-50px;font-size:25px;padding:0px;">
                    {{ config('company.address') }} <br>
                    {{ config('company.phone') }} <br>
                    {{ config('company.mobile') }}</p>

            </td>
        </tr>
    </table>
    @yield('content')
</body>

</html>