<div class="navbar-area">
            <!-- Menu For Mobile Device -->
            <div class="mobile-nav">
                <a href="index.html" class="logo">
                    <img src="{{asset('front/assets/img/logos/logo-1.png')}}" class="logo-one" alt="Logo">
                    <img src="{{asset('front/assets/img/logos/footer-logo1.png')}}" class="logo-two" alt="Logo">
                </a>
            </div>

            <!-- Menu For Desktop Device -->
            <div class="main-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light ">
                        <a class="navbar-brand" href="index.html">
                            <img src="{{asset('front/assets/img/logos/logo-1.png')}}" class="logo-one" alt="Logo">
                            <img src="{{asset('front/assets/img/logos/footer-logo1.png')}}" class="logo-two" alt="Logo">
                        </a>

                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a href="{{url('/')}}" class="nav-link active">
                                        Home 
                                    </a>
                                  
                                </li>
                                <li class="nav-item">
                                    <a href="about.html" class="nav-link">
                                        About
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        
                                        <i class='bx bx-chevron-down'></i>
                                        hotel
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="book.html" class="nav-link">
                                                Booking
                                            </a>
                                        </li>
                                        
                                    

                                        <li class="nav-item">
                                            <a href="terms-condition.html" class="nav-link">
                                                Terms & Conditions
                                            </a>
                                        </li>

                                     
                                        
                                        <li class="nav-item">
                                            <a href="coming-soon.html" class="nav-link">
                                                Coming Soon
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        
                                        <i class='bx bx-chevron-down'></i>
                                        login
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="{{ route('login') }}" class="nav-link">
                                                login
                                            </a>
                                        </li>
                                        
                                    

                                        <li class="nav-item">
                                            <a href="{{ route('register') }}" class="nav-link">
Register as admin                                         </a>
                                        </li>

                                      
                                        <li class="nav-item">
                                            <a href="{{ route('employee.create') }}" class="nav-link">
Register as employee                                         </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                             
            




                      
                        </div>
                    </nav>
                </div>
            </div>
        </div>