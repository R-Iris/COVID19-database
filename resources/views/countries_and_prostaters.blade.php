<title>COVID19 Database</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

<body>
<br>

@if  (Session::get('user')['role'] != 'user')
    <a style="background: #395e78"  href="countries/new_country">Add country</a>
    <a style="background: #395e78"  href="proStaTers/new_proStaTer">Add ProStaTer</a>
    <a style="background: #c0de85; color: #1a202c;"  href="records/new_record">Add Report</a>
@endif
<a href="/COVID19-database/public/articles">Go Back</a>

<br>
<br>


    <h2>Countries</h2>
    <br>

    @foreach($countries as $country)
        <article>
            <h3>Country with ID: <span style="color: rgba(0,255,255,0.55)"> <?= $country['countryID']; ?> </span></h3>
            <br>
            <?= $country['name']; ?>
            <br>

            <div>
                <br>
                <br>

                Belongs to the region with ID: <span class="label majorTopic" style="background: rgba(0,255,255,0.55)"><?= $country['regionID']; ?></span>
                <br>
                <br>
                Belongs to the government with ID: <span class="label majorTopic" style="background: rgba(0,255,255,0.55)"><?= $country['govID']; ?></span>
                <br>
                <br>
                <br>

                <h4>Reports</h4>
                @foreach($country->getHistoricalRecordByCountryID($country['countryID']) as $record)
                    <br>
                    Report ID: <?= $record->recordID; ?>
                    <br>
                    Date: <?= $record->date; ?>
                    <br>
                    Update: <?= $record->update; ?>
                    <br>
                    <br>
                    @if  (Session::get('user')['role'] != 'user')
                        <a style="padding: 4px 5px; background: #c0de85; color: #1a202c;" href="records/<?= $record->recordID;?>/edit" class="btn btn-default">Edit</a>
                        <td><a  style="padding: 4px 5px; background: #c0de85; color: #1a202c;" data-method="post" class="button is-outlined" href="{{route('delete_record_controller',['recordID' => $record->recordID])}}" onclick="return confirm('Are you sure to want to delete this report?')">Delete</a></td>
                    @endif
                    <br>
                @endforeach

                <br>
                <br>
                <br>

                @if  (Session::get('user')['role'] != 'user')
                    <a href="countries/<?= $country['countryID'];?>/edit" class="btn btn-default">Edit</a>
                    <td><a data-method="post" class="button is-outlined" href="{{route('delete_country_controller',['countryID' => $country['countryID']])}}" onclick="return confirm('Are you sure to want to delete this country?')">Delete</a></td>
                @endif
            </div>
        </article>
    @endforeach

    <br>
    <br>

    <hr>

    <br>

    <h2>ProStaTers</h2>
    <br>
    @foreach($prostaters as $prostater)
        <article>
            <h3>ProStaTer with ID: <span style="color: rgba(0,255,255,0.55)"> <?= $prostater['proStaTerID']; ?> </span></h3>
            <br>
            <?= $prostater['name']; ?>
            <br>

            <div>
                <br>
                <br>

                Belongs to the country with ID: <span class="label majorTopic" style="background: rgba(0,255,255,0.55)"><?= $prostater['countryID']; ?></span>
                <br>
                <br>
                Has a population of: <span class="label majorTopic" style="background: rgba(0,255,255,0.55)"><?= $prostater['population']; ?></span>

                <br>
                <br>
                <h4>Statistics</h4>

                Number of people infected by COVID-19: <?= $prostater['numInfected']; ?>
                <br>
                Number of people vaccinated against COVID-19: <?= $prostater['numVax']; ?>
                <br>
                Number of people infected and <b>not</b> vaccinated: <?= $prostater['numInfectedUnVax']; ?>
                <br>
                Number of deaths due to COVID-19: <?= $prostater['covidDeaths']; ?>

                <br>
                <br>
                <br>

                @if  (Session::get('user')['role'] != 'user')
                    <a href="proStaTers/<?= $prostater['proStaTerID'];?>/edit" class="btn btn-default">Edit</a>
                    <td><a data-method="post" class="button is-outlined" href="{{route('delete_prostater_controller',['proStaTerID' => $prostater['proStaTerID']])}}" onclick="return confirm('Are you sure to want to delete this ProStaTer?')">Delete</a></td>
                @endif
            </div>
        </article>
    @endforeach
</body>
