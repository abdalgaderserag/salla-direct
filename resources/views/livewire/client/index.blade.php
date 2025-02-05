<div id="main-panel">

    <div class="clients-div">
        <div class="card">clients count</div>
        <div class="card">clients group</div>
        <div class="card">divide clients</div>
    </div>
    <div class="card table-filter">
        <input type="search">
    </div>
    <div class="card clients-table">
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Group</th>
                    <th>Type</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Retrieve Time</th>
                    <th>Register Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                <tr>
                    <td><input type="checkbox"></td>
                    <td>{{ $client['username'] }}</td>
                    <td>{{ $client['groups'] }}</td>
                    <td>{{ $client['gender'] }}</td>
                    <td>{{ $client['city'] }}</td>
                    <td>{{ $client['phone'] }}</td>
                    <td>{{ $client['email'] }}</td>
                    <td>{{ $client['update_date'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
