<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/AdminLTE.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script data-cfasync="false" nonce="203c278a-49fa-4f35-aec7-45b95289b089">
        try {
            (function(w, d) {
                ! function(a, b, c, d) {
                    if (a.zaraz) console.error("zaraz is loaded twice");
                    else {
                        a[c] = a[c] || {};
                        a[c].executed = [];
                        a.zaraz = {
                            deferred: [],
                            listeners: []
                        };
                        a.zaraz._v = "5848";
                        a.zaraz._n = "203c278a-49fa-4f35-aec7-45b95289b089";
                        a.zaraz.q = [];
                        a.zaraz._f = function(e) {
                            return async function() {
                                var f = Array.prototype.slice.call(arguments);
                                a.zaraz.q.push({
                                    m: e,
                                    a: f
                                })
                            }
                        };
                        for (const g of ["track", "set", "debug"]) a.zaraz[g] = a.zaraz._f(g);
                        a.zaraz.init = () => {
                            var h = b.getElementsByTagName(d)[0],
                                i = b.createElement(d),
                                j = b.getElementsByTagName("title")[0];
                            j && (a[c].t = b.getElementsByTagName("title")[0].text);
                            a[c].x = Math.random();
                            a[c].w = a.screen.width;
                            a[c].h = a.screen.height;
                            a[c].j = a.innerHeight;
                            a[c].e = a.innerWidth;
                            a[c].l = a.location.href;
                            a[c].r = b.referrer;
                            a[c].k = a.screen.colorDepth;
                            a[c].n = b.characterSet;
                            a[c].o = (new Date).getTimezoneOffset();
                            if (a.dataLayer)
                                for (const k of Object.entries(Object.entries(dataLayer).reduce(((l, m) => ({
                                        ...l[1],
                                        ...m[1]
                                    })), {}))) zaraz.set(k[0], k[1], {
                                    scope: "page"
                                });
                            a[c].q = [];
                            for (; a.zaraz.q.length;) {
                                const n = a.zaraz.q.shift();
                                a[c].q.push(n)
                            }
                            i.defer = !0;
                            for (const o of [localStorage, sessionStorage]) Object.keys(o || {}).filter((q => q
                                .startsWith("_zaraz_"))).forEach((p => {
                                try {
                                    a[c]["z_" + p.slice(7)] = JSON.parse(o.getItem(p))
                                } catch {
                                    a[c]["z_" + p.slice(7)] = o.getItem(p)
                                }
                            }));
                            i.referrerPolicy = "origin";
                            i.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a[c])));
                            h.parentNode.insertBefore(i, h)
                        };
                        ["complete", "interactive"].includes(b.readyState) ? zaraz.init() : a.addEventListener(
                            "DOMContentLoaded", zaraz.init)
                    }
                }(w, d, "zarazData", "script");
                window.zaraz._p = async bs => new Promise((bt => {
                    if (bs) {
                        bs.e && bs.e.forEach((bu => {
                            try {
                                const bv = d.querySelector("script[nonce]"),
                                    bw = bv?.nonce || bv?.getAttribute("nonce"),
                                    bx = d.createElement("script");
                                bw && (bx.nonce = bw);
                                bx.innerHTML = bu;
                                bx.onload = () => {
                                    d.head.removeChild(bx)
                                };
                                d.head.appendChild(bx)
                            } catch (by) {
                                console.error(`Error executing script: ${bu}\n`, by)
                            }
                        }));
                        Promise.allSettled((bs.f || []).map((bz => fetch(bz[0], bz[1]))))
                    }
                    bt()
                }));
                zaraz._p({
                    "e": ["(function(w,d){})(window,document)"]
                });
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{ route('admin.logon') }}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i>
                    Sign in using
                    Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i>
                    Sign in using
                    Google+</a>
            </div>
            <!-- /.social-auth-links -->

            <a href="#">I forgot my password</a><br>
            <a href="register.html" class="text-center">Register a new membership</a>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>

</html>
