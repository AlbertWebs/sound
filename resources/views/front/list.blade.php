
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<div class="container">
    <div class="row">
        <div class="col-12 mb-3 mb-lg-5">
            <div class="overflow-hidden card table-nowrap table-card">

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="small text-uppercase bg-body text-muted">
                            <tr>
                                <th>Product Name</th>
                                {{-- <th>Available</th> --}}
                                <th>Price</th>
                                <th>New Price</th>
                                <th>&nbsp;</th>
                                <th class="text-end">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Product as $Product)
                            <tr class="align-middle">
                                <td>
                                    {{$Product->name}}
                                </td>
                                {{-- <td>&nbsp; </td> --}}
                                <td> <span class="d-inline-block align-middle">{{$Product->price}}/=</span></td>
                                    <td>
                                        <span>
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </span>
                                    </td>
                                <td>

                                </td>
                                <td class="text-end">
                                    <div class="drodown">
                                        <a data-bs-toggle="dropdown" href="#" class="btn p-1" aria-expanded="false">

                                </a>
                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                            <a href="#!" class="dropdown-item">View Details</a>
                                            <a href="#!" class="dropdown-item">Delete user</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
