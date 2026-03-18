<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('meta_section')
    <title>Title</title>

    <link rel="stylesheet" href="{{asset("lib/bootstrap/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">

    <script src="{{asset("lib/jquery/jquery.min.js")}}"></script>
    <script src="{{asset("/lib/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
</head>
<body>
<div class="main-container">
    <header class="w-100">
        @section('navigation_section')
            <nav id="navbar">
                <ul class="navbar-content">
                    @auth
                    <li class="navbar-item">
                        <div class="navbar-toggle">
                            <button class="btn-toggle" aria-label="Раскрыть меню">
                                <svg display="inline" width="24px" height="24px" fill="currentColor" viewbox="0 0 16 16" >
                                    <path d="M1 2.75A.75.75 0 0 1 1.75 2h12.5a.75.75 0 0 1 0 1.5H1.75A.75.75 0 0 1 1 2.75Zm0 5A.75.75 0 0 1 1.75 7h12.5a.75.75 0 0 1 0 1.5H1.75A.75.75 0 0 1 1 7.75ZM1.75 12h12.5a.75.75 0 0 1 0 1.5H1.75a.75.75 0 0 1 0-1.5Z"></path>
                                </svg>
                            </button>
                        </div>
                    </li>
                    @endauth
                    <li class="navbar-item w-100">
                        <div class="d-flex align-items-center">
                            <div class="me-2">
                                <svg class="navbar-menu-logo me-2" width="24px" height="24px" fill="white">
                                    <path xmlns="http://www.w3.org/2000/svg" d="m4.65656,1.55555c1.01269,0 1.83458,0.85075 1.83458,1.89899l0,17.09091c0,1.04824 -0.82189,1.89899 -1.83458,1.89899l-1.82449,0c-1.01361,0 -1.83458,-0.85075 -1.83458,-1.89899l0,-17.09091c0,-1.04824 0.82098,-1.89899 1.83458,-1.89899l1.82449,0zm6.42103,0c1.01269,0 1.83458,0.85075 1.83458,1.89899l0,17.09091c0,1.04824 -0.82189,1.89899 -1.83458,1.89899l-1.82999,0c-1.01361,0 -1.83458,-0.85075 -1.83458,-1.89899l0,-17.09091c0,-1.04824 0.82098,-1.89899 1.83458,-1.89899l1.82999,0zm8.32937,3.36425l3.54074,14.70103c0.24492,1.01691 -0.35407,2.04806 -1.33649,2.30253l-1.80064,0.4643c-0.98242,0.25352 -1.9786,-0.36556 -2.22351,-1.38341l-3.54074,-14.70103c-0.24583,-1.01786 0.35316,-2.04806 1.33558,-2.30253l1.80064,-0.4643c0.98242,-0.25446 1.9786,0.36556 2.22443,1.38341z"></path>
                                </svg>
                            </div>
                            <h3 class="navbar-title">Academic book</h3>
                        </div>
                    </li>
                    <li class="navbar-item d-flex justify-content-end w-100">
                        <div class="d-flex gap-2">
                            @auth
                                <div class="dropdown">
                                    <a class="navbar-link dropdown-toggle" id="account-menu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ asset('/images/AccountIcon.png') }}" width="48px" height="48px" alt="Учётная запись">
                                    </a>

                                    <ul class="dropdown-menu position-fixed" aria-labelledby="account-menu">
                                        <li>
                                            <a class="dropdown-item" role="button" href="{{route("account.profile")}}">Профиль</a>
                                        </li>
                                        <li class="border-top border-light border-1">
                                            <a class="dropdown-item" role="button" href="{{route("logout")}}">Выйти</a>
                                        </li>
                                    </ul>
                                </div>
                            @endauth
                        </div>
                    </li>
                        @auth
                    <li class="navbar-item">
                        <div class="navbar-menu-overlay"></div>
                        <div class="navbar-menu" id="main-menu">
                            <div class="navbar-menu-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <svg class="navbar-menu-logo" width="24px" height="24px" fill="white">
                                        <path xmlns="http://www.w3.org/2000/svg" d="m4.65656,1.55555c1.01269,0 1.83458,0.85075 1.83458,1.89899l0,17.09091c0,1.04824 -0.82189,1.89899 -1.83458,1.89899l-1.82449,0c-1.01361,0 -1.83458,-0.85075 -1.83458,-1.89899l0,-17.09091c0,-1.04824 0.82098,-1.89899 1.83458,-1.89899l1.82449,0zm6.42103,0c1.01269,0 1.83458,0.85075 1.83458,1.89899l0,17.09091c0,1.04824 -0.82189,1.89899 -1.83458,1.89899l-1.82999,0c-1.01361,0 -1.83458,-0.85075 -1.83458,-1.89899l0,-17.09091c0,-1.04824 0.82098,-1.89899 1.83458,-1.89899l1.82999,0zm8.32937,3.36425l3.54074,14.70103c0.24492,1.01691 -0.35407,2.04806 -1.33649,2.30253l-1.80064,0.4643c-0.98242,0.25352 -1.9786,-0.36556 -2.22351,-1.38341l-3.54074,-14.70103c-0.24583,-1.01786 0.35316,-2.04806 1.33558,-2.30253l1.80064,-0.4643c0.98242,-0.25446 1.9786,0.36556 2.22443,1.38341z"></path>
                                    </svg>
                                    <button class="btn-toggle" aria-label="Раскрыть меню">
                                        <svg display="inline" width="24px" height="24px" fill="currentColor" viewbox="0 0 16 16" >
                                            <path d="M3.72 3.72a.75.75 0 0 1 1.06 0L8 6.94l3.22-3.22a.749.749 0 0 1 1.275.326.749.749 0 0 1-.215.734L9.06 8l3.22 3.22a.749.749 0 0 1-.326 1.275.749.749 0 0 1-.734-.215L8 9.06l-3.22 3.22a.751.751 0 0 1-1.042-.018.751.751 0 0 1-.018-1.042L6.94 8 3.72 4.78a.75.75 0 0 1 0-1.06Z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <ul class="navbar-menu-content">
                                <li class="navbar-menu-item">
                                    <a class="navbar-menu-link" href="/">
                                        <span class="navbar-menu-indicator"></span>
                                        <span class="navbar-menu-icon">🏘️</span>
                                        <span class="navbar-menu-label">Главная</span>
                                    </a>
                                </li>
                                @if(Auth()->user()->hasRole(["student", "teacher"]))
                                    <li class="navbar-menu-item">
                                        <a class="navbar-menu-link" href="{{route("timetable")}}">
                                            <span class="navbar-menu-indicator"></span>
                                            <span class="navbar-menu-icon">📅</span>
                                            <span class="navbar-menu-label">Расписание</span>
                                        </a>
                                    </li>
                                @endif
                                @if(Auth()->user()->hasRole(["student"]))
                                    <li class="navbar-menu-item">
                                        <a class="navbar-menu-link">
                                            <span class="navbar-menu-indicator"></span>
                                            <span class="navbar-menu-icon">📁</span>
                                            <span class="navbar-menu-label">Последние события</span>
                                        </a>
                                    </li>
                                    <li class="navbar-menu-item">
                                        <a class="navbar-menu-link">
                                            <span class="navbar-menu-indicator"></span>
                                            <span class="navbar-menu-icon">🎓</span>
                                            <span class="navbar-menu-label">Успеваемость</span>
                                        </a>
                                    </li>
                                    <li class="navbar-menu-item">
                                        <a class="navbar-menu-link">
                                            <span class="navbar-menu-indicator"></span>
                                            <span class="navbar-menu-icon">✅</span>
                                            <span class="navbar-menu-label">Посещаемость</span>
                                        </a>
                                    </li>
                                @endif
                                @if(Auth()->user()->hasRole(["teacher"]))
                                    <li class="navbar-menu-item">
                                        <a class="navbar-menu-link">
                                            <span class="navbar-menu-indicator"></span>
                                            <span class="navbar-menu-icon">📝</span>
                                            <span class="navbar-menu-label">Журнал посещаемости и успеваемости</span>
                                        </a>
                                    </li>
                                    <li class="navbar-menu-item">
                                        <a class="navbar-menu-link">
                                            <span class="navbar-menu-indicator"></span>
                                            <span class="navbar-menu-icon">📂</span>
                                            <span class="navbar-menu-label">Студенты</span>
                                        </a>
                                    </li>
                                @endif
                                @if(Auth()->user()->hasRole(["administrator"]))
                                    <li class="navbar-menu-item">
                                        <a class="navbar-menu-link" href="{{ route('students.index') }}">
                                            <span class="navbar-menu-indicator"></span>
                                            <span class="navbar-menu-icon">📂</span>
                                            <span class="navbar-menu-label">Студенты</span>
                                        </a>
                                    </li>
                                    <li class="navbar-menu-item">
                                        <a class="navbar-menu-link" href="{{route('teachers.index')}}">
                                            <span class="navbar-menu-indicator"></span>
                                            <span class="navbar-menu-icon">📂</span>
                                            <span class="navbar-menu-label">Преподаватели</span>
                                        </a>
                                    </li>
                                    <li class="navbar-menu-item">
                                        <a class="navbar-menu-link">
                                            <span class="navbar-menu-indicator"></span>
                                            <span class="navbar-menu-icon">📂</span>
                                            <span class="navbar-menu-label">Группы</span>
                                        </a>
                                    </li>
                                    <li class="navbar-menu-item">
                                        <a class="navbar-menu-link">
                                            <span class="navbar-menu-indicator"></span>
                                            <span class="navbar-menu-icon">📂</span>
                                            <span class="navbar-menu-label">Пользователи системы</span>
                                        </a>
                                    </li>
                                    <li class="navbar-menu-item">
                                        <a class="navbar-menu-link" href="{{route('users.guests')}}">
                                            <span class="navbar-menu-indicator"></span>
                                            <span class="navbar-menu-icon">📂</span>
                                            <span class="navbar-menu-label">Гости системы</span>
                                        </a>
                                    </li>
                                    <li class="navbar-menu-item">
                                        <a class="navbar-menu-link">
                                            <span class="navbar-menu-indicator"></span>
                                            <span class="navbar-menu-icon">📋</span>
                                            <span class="navbar-menu-label">Отчёт по успеваемости</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                        @endauth
                </ul>
            </nav>
        @show
    </header>

    {{-- main content of pages --}}
    <main>
        @yield('main_section')
    </main>

    @section('footer_section')
        <footer class="main-footer">
            <p>Приложение разработано студентом Пивторак Богданом.</p>
        </footer>
    @show
</div>

@yield('scripts_section')

<script src="{{asset("/js/main.js")}}"></script>
</body>
</html>
