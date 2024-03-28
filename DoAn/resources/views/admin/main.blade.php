<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
    @include('admin.sidebar')

    <section class="content">
            
        <div class="row p-2">

            <div class="col-md-12">
  
                <div class="card card-primary">
    
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    
                    @yield('content')
            
                </div>
              
            </div>

        </div>

    </section>

</div>

    @include('admin.foot')
</body>
</html>