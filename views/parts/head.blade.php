@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>山月ペーパーラリー企画『1211通目のラブレター』 | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://ymtk.xyz/loveletter/wp-content/uploads/2020/01/cropped-rogo-32x32.png" sizes="32x32" />
    <link rel="icon" href="https://ymtk.xyz/loveletter/wp-content/uploads/2020/01/cropped-rogo-192x192.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="https://ymtk.xyz/loveletter/wp-content/uploads/2020/01/cropped-rogo-180x180.png" />
    <link rel="stylesheet" href="https://jenil.github.io/bulmaswatch/minty/bulmaswatch.min.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" defer ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/localization/messages_ja.min.js"></script>
    <script>
    $(function(){
        $('a[href^="#"]').click(function() {
        var speed = 800;
        var href= $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top;
        $('body,html').animate({scrollTop:position}, speed, 'swing');
        return false;
        });
    });
    </script>
    <style type="text/css">
    <!--
.modal {
  opacity: 0;
  transform: scale(0);
  transition: opacity 0.5s, transform 0s 0.5s;
}
.modal-content{
  transform: scale(1.2);
  transition: 0.5s;
}
.is-show{
  opacity: 1;
  transform: scale(1);
  transition: opacity 0.5s;
}
.is-show .modal-content{
  transform: scale(1);
}
    -->
    </style>
@endsection