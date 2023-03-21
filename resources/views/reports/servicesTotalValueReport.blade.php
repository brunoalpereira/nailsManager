<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    <style>
      .table{
        font-family: arial,sans-serif;
        border-collapse: collapse;
        width: 100%;
      }
      .td,.th {
        border: 0.5px solid #000;
        text-align: left;
        padding: 8px;
      }
      .th{
        text-align: center !important;
      }

      .tr:nth-child(even){
        background-color: #ddd;
      }
      #header {
        /* position: fixed;
        left: 0;
        right: 0; */
        color: #000;
        font-size: 0.9em;
      }

      #header {
        /* top: 0; */
        border-bottom: 1px solid #000;
      }

      .reportTitle {
        border-top: 1px solid #000;
        text-align: center;
        padding: 5px 0px;
        color: #000;
        margin-bottom: 30px;
        font-size: large;
      }

      #header table {
        width: 100%;
        border-collapse: collapse;
        border: none;
        margin-top: 5px;
      }

      #header td{
        padding: 0;
        width: 33%;
      }

    </style>
      <script src="https://kit.fontawesome.com/ef4e75bc43.js" crossorigin="anonymous"></script>
</head>


<body>
<div id="header" style="width:100%;">
      <table style="margin-bottom: 5px;">
        <tr>
       
        <h2 style=" text-align: center;">Nails Manager</h2></td>
        
        </tr>
      </table>
      
      <div class="reportTitle">Realatório de total de ganhos</div>
    </div>

    <table class="table">
        <tr class="tr">
            <th class="th">
                Serviço
            </th>
            <th class="th">
                Ganhos
            </th>
        </tr>
        @foreach ($services as $service )
        <tr class="tr">
            <td class="td">
                {{$service->name}}
            </td>
            <td class="td">
              R$ {{$service->total}}
            </td>
        </tr>

        @endforeach
    
        <tr class="tr">
            <td class="td" style="font-style: bold;">
               Total
            </td>
            <td class="td" style="font-style: bold;">
           R$ {{$totalGeral}}
            </td>
        </tr>
        @endphp
    </table>

</body>

</html>