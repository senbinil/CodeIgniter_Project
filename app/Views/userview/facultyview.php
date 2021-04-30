

    <section>
    <div id="accordion mb-4">
        <div class="card m-2">
            <div class="card-header bg-danger text-white" id="item0">
                <div class="d-flex ">
                    <h5 class=""> <i class="fa fa-cogs"></i> Control Center</h5>
                    <span class=" ml-auto " data-toggle="collapse" data-target="#item0sub" aria-expanded="true" aria-controls="item0sub">
                        <i class="fa fa-window-minimize" title="Minimize"></i>
                    </span>
                </div>
            </div>
            <div id="item0sub">
                <div class="card-body bg-light">
                    <div class="row">
                        <!-- <div class="col-md-3 col-xs-6">
                            <a href="#" class="nav-link">Search</a>
                        </div> -->
                        <div class="col-md-3 col-xs-6">
                            <a href="/common/notification" class="nav-link">Bulletin updates</a>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <a href="/common/resources" class="nav-link">Resources</a>
                        </div> 
                         <div class="col-md-3 col-xs-6">
                            <a href="/common/suggestion-box" class="nav-link">Suggestion Inbox </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class=" mx-1 row">
    <div class="col-md-6">
        <div class="card">
        <div class="card-body bg-danger text-white">
             <h5 class="card-title"><i class="fa fa-rocket"></i>Fast Track</h5><hr class="bg-white">

            <form action="/common/Search/student" class="form mx-4" method="post">
                <div class="row">
                    <label for="adminno" class="col-form-label">Admission </label>
                    <div class="form-group col-sm-4">
                        <input type="text" class="form-control" name="student_id" placeholder="ID">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Search" class="form-control btn btn-dark btn-sm">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
        <div class="card-body bg-danger text-white">
             <h5 class="card-title"><i class="fa fa-rocket"></i>  Fast Track</h5><hr class="bg-white">
            <form action="/common/Search/staff" class="form mx-4" method="post">
                <div class="row">
                    <label for="adminno" class="col-form-label">Employee </label>
                    <div class="form-group col-sm-4">
                        <input type="text" class="form-control" class="emp_id" placeholder="ID">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Search" class="form-control btn btn-dark btn-sm">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>