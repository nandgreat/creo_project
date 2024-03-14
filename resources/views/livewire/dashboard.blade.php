<div class='m-5'>
    <div class='container' style="">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="row">
                    <div class="col-md-12" style="background-color: green;">
                        @if ($auth->roles == 'admin' || $auth->roles == 'guest-chat' || $auth->roles == 'finance')
                        <a href="/admin/chat" class='btn btn-primary' style="margin-bottom: 15px; padding: 10px">Chat Guest</a>
                        @endif
                    </div>
                    <div class="col-md-12" style="background-color: green;">
                        @if ($auth->roles == 'admin' || $auth->roles == 'guest-chat' )
                        <a href="/admin/resource" class='btn btn-primary' style="margin-bottom: 15px; padding: 10px">View Cases File</a>
                        @endif
                        </a>
                    </div>
                    @if ($auth->roles == 'admin' || $auth->roles == 'finance')
                    <a href="#" class='btn btn-primary' style="margin-bottom: 15px; padding: 10px">View Payment</a>
                    @endif
                    @if ($auth->roles == 'admin' )
                    <a href="/admin/users" class='btn btn-primary' style="margin-bottom: 15px; padding: 10px">Manage User</a>
                    @endif
                    @if ($auth->roles == 'users' )
                    <a href="#" class='btn btn-primary' style="margin-bottom: 15px; padding: 10px">Dashboard </a>
                    <a href="/chat" class='btn btn-primary' style="margin-bottom: 15px; padding: 10px">Analytics</a>
                    <a href="/chat" class='btn btn-primary' style="margin-bottom: 15px; padding: 10px">Financial Report</a>
                    <a href="/change-password" class='btn btn-primary' style="margin-bottom: 150px; padding: 10px">Change Password</a>


                    <a href="auto-alert" class='btn btn-primary' style="margin-bottom: 15px; padding: 10px">Auto-Alert </a>
                    <a href="#" class='btn btn-primary' style="margin-bottom: 15px; padding: 10px">Actions </a>
                    <a href="#" class='btn btn-primary' style="margin-bottom: 15px; padding: 10px">Upload Files</a>
                    <a href="#" class='btn btn-primary' style="margin-bottom: 15px; padding: 10px">Download Files</a>
                    <a href="/share-files" class='btn btn-primary' style="margin-bottom: 15px; padding: 10px">Share Files</a>
                    @endif
                </div>


            </div>
            <div class="col-sm-6 col-md-6 col-lg-8">
                <img src='{{asset("asset/dashboard_analytics.png")}}'>
            </div>
        </div>
    </div>
</div>