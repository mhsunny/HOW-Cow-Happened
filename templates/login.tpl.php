<header id="head" class="secondary"></header>
<!-- container -->
<div class="container">
  <ol class="breadcrumb">
    <li><a href="index.html">Home</a></li>
    <li class="active">Login</li>
  </ol>
  <div class="row">
    <!-- Article main content -->
    <article class="col-xs-12 maincontent">
      <header class="page-header">
        <h1 class="page-title">Login</h1>
      </header>
      <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-default">
          <div class="panel-body">
            <form method="post" action="/friendshipday/login">
              <div class="top-margin">
                <label>Username/Email <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="user">
              </div>
              <div class="top-margin">
                <label>Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="pass">
              </div>
              <hr>
              <div class="row">
                <div class="col-lg-8"></div>
                <div class="col-lg-4 text-right">
                  <button class="btn btn-action" type="submit">Sign in</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </article>
    <!-- /Article -->
  </div>
</div>
