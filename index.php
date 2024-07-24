!DOCTYPE html
html lang=en
head
    meta charset=UTF-8
    meta name=viewport content=width=device-width, initial-scale=1, shrink-to-fit=no
    titleElectricity Calculatortitle
    link rel=stylesheet href=httpsstackpath.bootstrapcdn.combootstrap4.5.2cssbootstrap.min.css
    link rel=stylesheet href=style.css
head
body
    div class=container mt-5
        h1 class=text-centerElectricity Calculatorh1
        form method=POST action=
            div class=form-group
                label for=voltageVoltage (V)label
                input type=number class=form-control id=voltage name=voltage step=0.01 required
            div
            div class=form-group
                label for=currentCurrent (A)label
                input type=number class=form-control id=current name=current step=0.01 required
            div
            div class=form-group
                label for=rateCurrent Rate (centskWh)label
                input type=number class=form-control id=rate name=rate step=0.01 required
            div
            button type=submit class=btn btn-primaryCalculatebutton
        form

        php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $voltage = $_POST['voltage'];
            $current = $_POST['current'];
            $rate = $_POST['rate'];

            $power = $voltage  $current;  Power in Watts
            $energy_per_hour = $power  1000;  Energy in kWh
            $energy_per_day = $energy_per_hour  24;  Energy in kWh per day
            $total_per_hour = $energy_per_hour  ($rate  100);  Total charge per hour
            $total_per_day = $total_per_hour  24;  Total charge per day

            echo div class='mt-4';
            echo h3Resultsh3;
            echo pstrongPower (W)strong {$power}p;
            echo pstrongEnergy per Hour (kWh)strong {$energy_per_hour}p;
            echo pstrongEnergy per Day (kWh)strong {$energy_per_day}p;
            echo pstrongTotal Charge per Hour ($)strong {$total_per_hour}p;
            echo pstrongTotal Charge per Day ($)strong {$total_per_day}p;
            echo div;
        }
        
    div
body
html
