@extends('layout.app')

@section('content')
<div class="row">
    <form>
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Add Article</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Title</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Author Name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">शीर्षक</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">लेखकको नाम</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <label class="control-label">Short Description</label>
                            <textarea id="demo-textarea-input" rows="9" class="form-control" placeholder="Your content here.."></textarea>
                        </div>          
                    </div>
                    <br>
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-primary" type="submit">Create New Post</button>
                    <a href="http://localhost/loksewa/public/article/lists" class="btn btn-danger pull-left"><i class="ion-ios-arrow-thin-left"></i> Go Back To List</a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection