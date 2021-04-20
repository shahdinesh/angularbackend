@extends('layout.app')

@section('content')
<div id="search" class="collapse" style="position: absolute;background-color: white;border: 1px solid;padding: 10px;width: 70%;margin-left: 11%;z-index: 111111;margin-top: 4%;">
    <form class="form-inline" method="GET">
        <div class="row">
            <div class="col-md-4">
                <label for="smstudentid">Entrance No.</label>
                <input type="text" name="smstudentid" class="form-control" id="smstudentid">
            </div>
            <div class="col-md-4">
                <label for="name">Student Name</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="col-md-4">
                <label for="phone">Phone No.</label>
                <input type="text" name="phone" class="form-control" id="phone">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label for="fathername">Father Name</label>
                <input type="text" name="fathername" class="form-control" id="fathername">
            </div>
            <div class="col-md-4">
                <label for="schoolfrom">School Name</label>
                <input type="text" name="schoolfrom" class="form-control" id="schoolfrom">
            </div>
        </div>
        <button style="margin-right: 5%;margin-top: 5px;" class="btn btn-primary pull-right">Search</button>
    </form>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="panel-title">{{ $data }}</h3>
                    </div>
                    <div class="col-sm-4">
                        <button class="btn btn-primary pull-right form-add-btn">Add</button>
                        <a href="#search" class="btn btn-info pull-right form-add-btn" data-toggle="collapse"><i class='fa fa-search'></i></a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>User</th>
                                <th>Plan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td><a href="#" class="btn-link">Scott S. Calabrese</a></td>
                                <td><span class="label label-purple">Bussines</span></td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td><a href="#" class="btn-link">Teresa L. Doe</a></td>
                                <td><span class="label label-info">Personal</span></td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td><a href="#" class="btn-link">Steve N. Horton</a></td>
                                <td><span class="label label-warning">Trial</span></td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td><a href="#" class="btn-link">Charles S Boyle</a></td>
                                <td><span class="label label-purple">Bussines</span></td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td><a href="#" class="btn-link">Lucy Doe</a></td>
                                <td><span class="label label-warning">Trial</span></td>
                            </tr>
                            <tr>
                                <td class="text-center">6</td>
                                <td><a href="#" class="btn-link">Michael Bunr</a></td>
                                <td><span class="label label-info">Personal</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer">
                <ul class="pagination pull-right">
                    <li class="page-item"><a class="page-link" href="#"><</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).click(function(e) {
        var parentEls = $(e.target).parents().filter(function() {
            return $(this).hasClass('collapse');
        }).length == 0;
        if (parentEls)
            $('.collapse').collapse('hide');      
    });
</script>
@endpush