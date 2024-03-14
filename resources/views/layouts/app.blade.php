<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
    <title>Creo Auto Test {{@$page}}</title>
    <style>
        .bg-grey {
            background-color: #ccc;
        }

        .div-container-center {
            margin-top: 100px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        * {
            font-family: Inter;
        }

        body {
            font-family: Inter;

        }

        .navbar {
            margin: 5rem;
            text-align: center;
        }

        .navbar-brand {
            font-size: 40px;
            font-weight: 400;
        }

        .btn-primary,
        .btn-primary:hover {
            background-color: #05204A;
        }

        .bg-Customprimary {
            background-color: #05204A;
        }

        .btn-white,
        .btn-white:hover {
            background-color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #05204A;
            border-color: #ffffff;
        }

        .text-customprimary {
            color: #05204A;
        }

        .color-primary {
            color: #05204A;
        }

        .bg-whitegrey {
            background-color: #d1cdcd;
        }

        nav {

            /* background-color: #05204A; */
        }

        .navbar-nav {
            padding: 20px;

        }

        .custom-nav .navbar-nav .nav-link,
        .navbar-brand {
            color: #ffffff;
            margin: 10px;
        }

        .carosel-control {
            max-height: 80vh;
        }

        .home {
            position: relative;
        }

        header {
            background-image: url('{{asset("asset/login_bg.png")}}');
            background-repeat: no-repeat;
        }

        .home::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('https://img.freepik.com/free-photo/still-life-with-scales-justice_23-2149776014.jpg');
            background-size: cover;
            background-attachment: scroll;
            background-position: center;
            background-repeat: no-repeat;
            background-origin: content-box;
            opacity: 0.3;
            z-index: -1;

        }

        section {
            padding: 30px;
            min-height: 100px;

        }

        .mlr-5 {
            margin-left: 10;
            margin-right: 10;
            margin-bottom: 10;
        }

        .subscribe-form {
            display: flex;
            flex-direction: column;
        }

        .subscribe-notice {
            width: 50%;
            padding: 10px;
            background-color: #05204A;
            color: #ffffff;
        }

        .chartfixed {
            position: fixed;
            bottom: 5;
            right: 5;
            margin: 10;
        }

        .descriptiveText {
            margin-top: 50px;
            margin-left: 15px;
            margin-right: 15px;
            margin-bottom: 15px;
        }

        /* Service page */
        .serviceHeader {
            background: linear-gradient(267.06deg, rgba(5, 32, 74, 0.6432) 57.22%, rgba(5, 32, 74, 0) 77.29%);

            min-height: 300px;
            box-sizing: border-box;
            border: 1px solid #000000;
            filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
        }

        .serviceHeader::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('https://img.freepik.com/free-photo/still-life-with-scales-justice_23-2149776014.jpg');
            background-size: cover;
            background-blend-mode: darken;
            background-attachment: scroll;
            background-position: center;
            background-repeat: no-repeat;
            background-origin: content-box;
            z-index: -1;
        }

        .headText {
            position: absolute;
            right: 80;
            top: 60;
            color: #ffffff;
            font-size: 40px;
        }

        .headText::after {
            background-color: #eae8e5;
            bottom: -10px;
            height: 4px;
            /* right:-160px; */
            width: 60px;
            position: relative;
            content: "";
            display: block;
        }

        .customHeader {
            color: #05204A;
            margin-top: 20px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .check {
            margin: 5px;
            color: #061E5C;
            font-size: 12px;
            font-family: Inter;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
        }

        .text-pr {
            color: #061E5C;
            text-decoration: none;
        }

        .btn-danger {
            background-color: #E11D1D;
        }

        .serviceLeft {
            /* position: flex;
    flex-direction: column;
    align-content: center; */
            padding-left: 100px;
            padding-top: 70px;
            padding-right: 100px;
            padding-bottom: 70px;
        }

        .tocent {
            margin: 0 auto;
        }

        .serviceLeft ul {
            list-style-type: none;
        }

        .m-r-5 {
            margin-right: 5px;
        }

        .m-t-10 {
            margin-top: 10px;
        }

        .serviceLeft a {
            color: white;
        }

        .headbox {
            padding: 10px;
            width: 50vh;
            border-radius: 5px;
            font-size: 20px;
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 700;
            color: #05204A;
            text-align: center;

        }

        .bg-rightservice {
            background-image: url('{{asset("asset/svg/rightservice.svg")}}');
            background-repeat: no-repeat;
        }

        .chat-area {
            background-color: #9d9c9c;
            border-radius: 10px;
            min-height: 500px;
        }

        .chat-message {
            background: #05204AB8;
            color: #ffffff;
            border-radius: 5px;
            padding: 10px;
        }

        .chart-right {
            float: right;
        }

        .chart-left {
            float: left;
        }

        .register {
            margin: 0 auto;
            max-width: 50%;
        }

        .form-control {
            border: none;
            background-color: #D9D9D9;
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 0px;
            padding: 10px;
            ;
        }

        .customTopBottom img {
            /* padding-top: 40px; */
            /* padding-bottom: 40px; */
            /* max-height: 200px; */
            /* width: 100%; */
        }

        .top-20 {
            margin-top: 60px;
            margin-bottom: 10px;
        }

        .text-top-10 {
            margin-top: 10px;
        }

        .parent {
            display: flex;
            justify-content: center;
            /* width:100%; */
            margin-top: 50px;
        }

        .toCenter .row .col {
            min-width: 500px;
        }

        .ServicedescriptiveText {
            max-width: 70%;
            ;
        }

        .menuBTN {
            display: none;
        }

        @media only screen and (max-width: 700px) {
            section {
                padding: 5px;
            }

            .subscribe-notice {
                width: 100%;
                padding: 5px;
            }

            .subscribe-form {
                width: 100%;
            }

            .descriptiveText {
                margin: 2px;
            }

            .subscribe-notice {
                width: 100%;
                padding: 10px;
                margin: 5px;
                background-color: #05204A;
                color: #ffffff;
            }

            .toCenter .row .col {
                min-width: 0;
            }

            .serviceLeft {
                /* position: flex;
    flex-direction: column;
    align-content: center; */
                padding-left: 5px;
                padding-top: 5px;
                padding-right: 5px;
                padding-bottom: 5px;
            }

            .headbox {
                padding: 20;
                width: 100%;
                border-radius: 5px;
                font-size: 20px;
                font-family: 'Poppins';
                font-style: normal;
                font-weight: 700;
                color: #05204A;
                text-align: center;

            }

            .register {
                margin: 0 auto;
                max-width: 90%;
            }

            .justify-btncontent-left {
                float: left;
            }

            .menuBTN {
                display: block;
            }
        }
    </style>

    <style>
        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 5px;
        }

        .rich-text-editor {
            width: 100%;
            min-height: 150px;
            padding: 5px;
            border: 1px solid #ccc;
        }

        button {
            padding: 10px 20px;
            background-color: #337ab7;
            padding-left: 50px;
            padding-right: 50px;
            padding-top: 10px;
            padding-bottom: 10px;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .medium-button {
            padding: 10px 20px;
            padding-left: 50px;
            padding-right: 50px;
            padding-top: 10px;
            padding-bottom: 10px;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #23527c;
        }

        .form-container {
            display: flex;
            justify-content: center;
            max-width: 600px;
            margin: 0 auto;
        }

        .form-container-wider {
            display: flex;
            max-width: 600rem;
            justify-content: center;
            margin: 0 auto;
        }

        img {
            max-width: 100%;
        }

        form {
            width: 100%;
            /* Additional form styles */
        }

        .btnblock {
            display: flex;
            flex-direction: column;
            justify-content: space-between;

        }

        .banner-space {
            min-height: 25rem;
            background-image: url('{{asset("asset/login_bg.png")}}');
        }

        .home-space {
            min-height: 22rem;
            background-image: url('{{asset("asset/home_bg.png")}}');
            background-size: cover;
            justify-content: start;
            align-items: center;
            display: flex;

        }

        .banner-text {
            margin-top: 10rem;
            color: #FFF;
            font-size: 34px;
            font-family: Inter;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            width: 20rem;
        }

        .banner-text2 {
            color: #FFF;
            font-size: 34px;
            font-family: Inter;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            width: 20rem;
        }

        .flex-center {
            margin-top: 30%;
            color: #061E5C;
            margin-left: 10px;
            margin-right: 10px;
        }

        .text-right {
            text-align: right;
            margin-top: 2%;
            margin-right: 5%;

        }

        .text-right button {
            margin-right: 2%;
        }
    </style>

    <style>
        .banner-text::after {
            display: inline-block;
            border-bottom: 5px solid #f9f9f9;
            margin-left: 5px;
            width: 10rem;
            vertical-align: bottom;
        }
    </style>
</head>

<body>

    @include('inc.header')


    {{ $slot }}
    @yield('content')
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/655c6d1dd600b968d315617b/1hfogkeui';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>