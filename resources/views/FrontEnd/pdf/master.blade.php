<!DOCTYPE html
    PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='https://www.w3.org/1999/xhtml'>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" media="all" />
    <!--     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" media="all"/> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">  -->
    <title>Pdf</title>
    <style>
  
    @page {
        margin: 20px;
    }
   .table td,th{
    border: 1px #000 solid !important;
    padding:5px !important;
   }

    .footer-table td {
        /*  font-size: 12px; */
    }

    .tabledetails th {
        /* height: 5px !important; */
        border-top: 2px #000 solid !important;
        border-bottom: 2px #000 solid !important;
        padding: 2px !important;
        font-size: 14px;
        font-color: #000;
        /*  text-align:center; */
    }

    .tabledetails td {
        /*  height: 5px !important; */
        /* border: 1px #000 solid !important;*/
        /* font-size: 12px; */
        padding: 2px !important;
        font-color: #000;
    }

    .tabledetails tbody {
        border-bottom: 2px #000 solid !important;

        /* font-size: 14px; */
        font-color: #000;
    }

    .tabledetails tfoot {
        border-bottom: 2px #000 solid !important;
        /*  font-size: 14px; */
        font-color: #000;
    }

    .companydes p {
        line-height: .5;
        font-size: 12px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .report-head {
        border-bottom: 2px #000 solid;
        border-top: 2px #000 solid;


    }

    header {
        /*   position: fixed; */
        left: 0px;
        right: 0px;
    }

    main {
        padding: 0px;

    }

    address {
        font-size: 12px;
    }

    .Info-Table td {
        border: none;
        box-shadow: none;
    }



    .header,
    .footer {
        width: 100%;
        text-align: center;
        position: fixed;
    }

    .header {
        top: 0px;
    }

    .footer {
        bottom: 0px;
        margin-right: 0px;
        left: 0px;
        /*  padding-top: 10px;
        padding-bottom: 10px; */
        border-top: 2px #00883A solid;
        padding: 10px;
    }

    .pagenum:before {
        content: counter(page);
    }

    .title {
        padding-top: 10px;
        padding-bottom: 10px;
        border-top: 2px #00883A solid;
        border-bottom: 2px #00883A solid;
        /*  background-color: #DC143C; */
        color: #000;
        text-transform: uppercase;
    }
    </style>
</head>


<body>
    <!-- <h4></h4> -->
    <table width="100%">
        <tr>
            <td>
                <h1 align="center">{{ config('company.company_name') }}</h1>
                <p align="center">
                    {{ config('company.address') }} <br>
                    {{ config('company.phone') }} <br>
                    {{ config('company.email') }}</p>

            </td>
        </tr>
    </table>
    <hr>
    @yield('content')
</body>

</html>