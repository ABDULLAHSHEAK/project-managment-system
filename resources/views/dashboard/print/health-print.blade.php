<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('admin') }}/css/bootstrap.css" rel="stylesheet" />
</head>
<body>
  <div class="container-fluid">
        <div class="row">
                <div class="container-fluid">
                      <div class="row mx-auto">
                    <div class="col-md-10 col-10">
                       <h4> Member Info</h4>
                       <li style="list-style: none">Name :{{ $members->name}}</li>
                       <li style="list-style: none">Email : {{ $members->email}}</li>
                       <li style="list-style: none">Phone : {{ $members->phone}}</li>
                       <li style="list-style: none">Join Date :  {{ $members->join_date}}</li>
                       <li style="list-style: none">Package : {{ $members->package->name}}</li>
                    </div>
                    <div class="col-md-2 col-2 float-end">
                        <img src="{{asset('image/member')}}/{{ $members->img}}" alt="" width="100" height="100" class="rounded mb-2">
                        <li style="list-style: none">Age : {{ $members->age}}</li>
                    </div>
                    <hr class="m-2">
                    <div class="health-status mb-3">
                        <h4 class="text-center">Member Health Status</h4>
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>BP</th>
                                        <th>Diabetes</th>
                                        <th>Weight</th>
                                        <th>Height</th>
                                        <th>Blood Group</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($healths as $health)
                                    <tr>
                                        <td>{{$health->date}}</td>
                                        <td>{{$health->bp}}</td>
                                        <td>{{$health->diabetes}}</td>
                                        <td>{{$health->weight}} <span>(kg)</span></td>
                                        <td>{{$health->height}} <span>(inche)</span></td>
                                        <td>{{$health->blood}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                  </div>
                </div>
                </div>
            </div>
            <script>
                window.print();
            </script>
</body>
</html>
