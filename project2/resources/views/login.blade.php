<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="{{url('images/fevicon.png')}}" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}" />
      <!-- site css -->
      <link rel="stylesheet" href="{{url('css/style.css')}}" />
      <!-- responsive css -->
      <link rel="stylesheet" href="{{url('css/responsive.css')}}" />
      <!-- color css -->
      <link rel="stylesheet" href="{{url('css/colors.css')}}" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="{{url('css/bootstrap-select.css')}}" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="{{url('css/perfect-scrollbar.css')}}" />
      <!-- custom css -->
      <link rel="stylesheet" href="{{url('css/custom.css')}}" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>

   @if($errors->any())
   @foreach($errors->all() as $sehv)
      <div class="alert alert-dark" role="alert">
       {{$sehv}}
      </div>
   @endforeach
@endif

@if(session('mesaj'))
   <div class="alert alert-dark" role="alert">
     {{session('mesaj')}}
   </div>
@endif

   <body class="inner_page login">
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="logo_login">
                     <div class="center">
                        <img width="210" src="images/logo/logo.png" alt="#" />
                     </div>
                  </div>
                  <div class="login_form">
                     <form method="post" action="{{route('logindaxilet')}}">
                        @csrf
                        <fieldset>
                           <div class="field">
                              <label class="label_field">Email</label>
                              <input type="email" name="email" placeholder="Email adresinizi daxil edin" />
                           </div>
                           <div class="field">
                              <label class="label_field">Parol</label>
                              <input type="password" name="password" placeholder="Parolunuzu daxil edin" />
                           </div>
                           <div class="field">
                              <label class="label_field hidden">hidden label</label>
                              <label class="form-check-label"><input type="checkbox" class="form-check-input"> Remember Me</label>
                              <a class="forgot" href="{{route('qeydiyyat')}}">Qeydiyyat</a>
                           </div>
                           <div class="field margin_0">
                              <label class="label_field hidden">hidden label</label>
                              <button class="main_bt">Daxil ol</button>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>