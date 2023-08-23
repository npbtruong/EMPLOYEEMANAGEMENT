<!DOCTYPE html>
<html>

<head>
    <title>Danh sách phòng ban</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        * {
            font-family: DejaVu Sans, sans-serif;
        }

        body {
            font-size: 10px;
        }

        table {
            border-collapse: collapse;
        }

        td {
            vertical-align: middle;
        }

        caption {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        .companyInfo {
            font-size: 13px;
            font-weight: bold;
            text-align: center;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <div class="row">
        <table border="0" align="center">
            <tr>
                <td class="companyInfo">
                    ĐỒ ÁN 2 TRƯỜNG KHA<br />
                    http://laravel-app:8002<br />
                    (+84) 877.913.097 # pandademacia@gmail.com<br />
                </td>
            </tr>
        </table>
        <br />
        <br />
        <?php 
        $tongSoTrang = ceil(count($listOfUsers)/10);
         ?>
        <table border="1" align="center" cellpadding="5">
            <caption>Danh sách phòng ban</caption>
            <tr>
                <th colspan="9" align="center">Trang 1 / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>Name<</th>
                <th>Email</th>
               
                <th>Phone Number</th>
                <th>Attendence</th>
                <th>Date Hired</th>
                <th>Basic Salary</th>
                <th>Subsidy</th>
                <th>Salary this Month</th>
                <th>Salary last Month</th>
                
            </tr>
            @foreach ($listOfUsers as $sp)
            <tr>
                {{-- <td align="center">{{ $loop->index + 1 }}</td> --}}
                <td align="center">{{ $sp->name }}</td>
                <td align="center">{{ $sp->email }}</td>
                
                <td align="center">{{ $sp->phone_number }}</td>
                <td align="center">{{ $sp->attendence_record }}</td>
                <td align="center">{{ $sp->date_hired }}</td>
                <td align="center">{{ $sp->basic_salary }}</td>
                <td align="center">{{ $sp->subsidy }}</td>
                <td align="center">{{ $sp->salary }}</td>
                <td align="center">{{ $sp->salary_last_month }}</td>
                
            </tr>
            @if (($loop->index + 1) %9 == 0)
        </table>
        <div class="page-break"></div><br>
        <table border="1" align="center" cellpadding="5">
            <tr>
                <th colspan="9" align="center">Trang {{ 1 + floor(($loop->index + 1) / 10) }} / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>Name<</th>
                <th>Email</th>
               
                <th>Phone Number</th>
                <th>Attendence Record</th>
                <th>Date Hired</th>
                <th>Basic Salary</th>
                <th>Subsidy</th>
                <th>Salary this Month</th>
                <th>Salary last Month</th>
            </tr>
            @endif
            @endforeach
        </table>
    </div>
</body>

</html>