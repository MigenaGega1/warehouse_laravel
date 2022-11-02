<style>
    .cover {
        width: 400px;
        margin: auto;
    }
    .mastfoot {
        padding-top: 0px;
        text-align: center;
        margin: auto;
    }
    </style>

    </head>
    <body>
    <div class="cover-container">
        <div class="masthead clearfix">
            <div class="inner">
                <h3 class="masthead-brand"></h3>
                <ul class="nav masthead-nav">
                    <!--<li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">Contact</a></li>-->
                </ul>
            </div>
        </div>
        <div class="inner cover">
            <div class="panel panel-default">
               >
                <div class="panel-body">
                    <!-- tabs -->
                    <ul id="dTab" class="nav nav-tabs">
                        <li class="active"><a href="#pane1" data-toggle="tab">Login as an admin</a></li>
                        <li><a href="#pane2" data-toggle="tab">Login as an operator</a></li>
                        <!--<li><a href="#pane3" data-toggle="tab"></a></li>-->
                    </ul>
                    <div class="tab-content">
                        <div id="pane1" class="tab-pane fade in active">
                            <!-- Register Username -->
                            <form action="" method="POST">
                                <fieldset>

                                    <div class="form-group">
                                        <!-- E-mail -->
                                        <label class="control-label" for="email">E-mail</label>
                                        <input type="text" id="email" name="email" placeholder="Please provide your E-mail" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <!-- Password-->
                                        <label class="control-label" for="password">Password</label>
                                        <input type="password" id="password" name="password" placeholder="Password should be at least 4 characters" class="form-control" />
                                    </div>
                                    
                                    <!--    <div class="form-group">
    <select class="form-control">
      <option>select</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
    </div>-->

                                    <!-- <div class="form-group">
        <label for="exampleInputFile">File Upload</label>
        <input type="file" id="exampleInputFile">
        <p class="help-block">upto 500KB</p>
      </div>-->
                                    <button class="btn btn-success">Register</button>
                                </fieldset>
                            </form>
                        </div>
                        <div id="pane2" class="tab-pane fade">
                            <!-- login -->
                            <form role="form" action="" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" />
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>

                                <button type="reset" class="btn btn-success" id="forgetBtn">Forget Password</button>
                            </form>
                            <!-- login-ends-->
                        </div>
                        <div id="pane3" class="tab-pane fade">
                            <!-- password forget -->
                            <form role="form" action="" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Request a password reset. Enter your email" />
                                </div>

                                <button type="submit" class="btn btn-success">Reset Password</button>
                                <button type="reset" class="btn btn-success" id="loginBtn">Login</button>
                            </form>
                            <!-- password forget -->
                        </div>
                    </div>
                    <!-- -->
                </div>
            </div>
            <!-- <h1 class="cover-heading"></h1>
                <p class="lead"> Click to Register</p>
                <p class="lead">
                  <a href="#" class="btn btn-lg btn-default">register</a>
                </p>-->
        </div>
    </div><div id="bcl"><a style="font-size:8pt;text-decoration:none;" href="http://www.devanswer.com">Free Frontend</a></div>
    <script>
    $(document).ready(function () {
        $("#forgetBtn").click(function () {
            $("#dTab li:eq(2) a").tab("show");
            $(".tab-content div.active").removeClass("active in");
            $(".tab-content").find("#pane3").addClass("active in");
        });
        $("#loginBtn").click(function () {
            $("#dTab li:eq(1) a").tab("show");
            $(".tab-content div.active").removeClass("active in");
            $(".tab-content").find("#pane2").addClass("active in");
        });
    });
    </script>
