@extends('layouts.main')
@section('content')

<img src="{{ asset('images/b1.jpg') }}" class="responsive" alt="background" >
<div class="pxImage2" id="features">
  

<div class="showcase-content">
            
            <h4>One hub for an international student to get the information about essential 
            <br>things and for interaction. A forum is there to get an answer to the question to make the life 
            <br>easier of a Fanshawe Student as a majority of the students
            <br>are  International and are unaware of so many things going on day to day bases in college</h4>
        </div>  
        
<div class="showcase-images">
            
            <div class="showcase-block">
            <div class="container">
            <a href="https://www.fanshawec.ca/international/applicants/how-apply-fanshawe/visa-work-permits-and-custodianship" target="_blank"> 
                <img src="{{ asset('images/card.svg') }}" class="showcase-image" alt="arrival">
                <div class="showcase-content">
                    <h5>Visa & Permits</h5>
                    </a>
                    <p>Information regarding<br>
                        Visa & Permits services<br>
                        </p>
                </div>
            </div>
            </div>  
            <div class="showcase-block">
            <div class="container">
            <a href="https://www.fanshawec.ca/student-success/student-success/student-wellness-centre/student-wellness-centre-services-and" target="_blank"> 
                <img src="{{ asset('images/doctor.svg') }}" class="showcase-image" alt="doctor">
                <div class="showcase-content">
                    <h5>Wellness Centre</h5>
                    </a>
                    <p>Information regarding<br>
                        Wellness Centre services<br>
                        </p>
                </div>
            </div>
            </div>
            <div class="showcase-block">
            <div class="container">
            <a href="{{url('/forum')}}">    
            <img src="{{ asset('images/partnership.svg') }}" class="showcase-image" alt="Forum">
                <div class="showcase-content">
                    <h5>Student Forum</h5>
                    </a>
                    <p>Forum for student to ask <br>
                        or give answer to student<br> if you have knowledge<br>
                        </p>
                </div>
            </div>
            </div>
            <div class="showcase-block">
            <div class="container">
            <a href="{{url('/forum')}}">  
                <img src="{{ asset('images/clipboard.svg') }}" class="showcase-image" alt="Living Cost">
                <div class="showcase-content">
                    <h5>Living Cost</h5>
                    </a>
                    <p>Information regarding<br>
                        Living Cost can be asked in forum<br>
                        </p>
                </div>
                </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="pxImage2" id="features">
        
        <div class="showcase-images">
            <div class="showcase-block">
            <div class="container">
            <a href="https://www.fanshawec.ca/international/students/fanshawe-cares-student-arrival-services-request" target="_blank"> 
                <img src="{{ asset('images/arrival.svg') }}" class="showcase-image" alt="Wellness Center">
                <div class="showcase-content">
                    <h5>Arrival Service</h5>
                    </a>
                    <p>Information regarding<br>
                        Fanshawe Arrival & Pick up services<br>
                        </p>
                </div>
            </div>
            </div>
            <div class="showcase-block">
            <div class="container">
            <a href="https://www.fanshawec.ca/student-life/campus-services/campus-security-services" target="_blank"> 
                <img src="{{ asset('images/safety.svg') }}" class="showcase-image" alt="Safety">
                <div class="showcase-content">
                    <h5>Safety</h5>
                    </a>
                    <p>Information regarding<br>
                        Safety services<br>
                        </p>
                </div>
            </div>
            </div>
            <div class="showcase-block">
            <div class="container">
            <a href="https://www.fanshawec.ca/student-life/current-student-resources/orientation" target="_blank"> 
                <img src="{{ asset('images/pin.svg') }}" class="showcase-image" alt="Orientation">
                <div class="showcase-content">
                    <h5>Orientation</h5>
                    </a>
                    <p>Information regarding<br>
                        Orientation<br>
                        </p>    
                </div>
            </div>
            </div>
            <div class="showcase-block">
            <div class="container">
            <a href="https://www.kijiji.ca/b-for-rent/london/rental/k0c30349001l1700214?ad=offering" target="_blank">  
                <img src="{{ asset('images/gps.svg') }}" class="showcase-image" alt="Housing">
                <div class="showcase-content">
                    <h5>Housing</h5>
                    </a>
                    <p>Information regarding<br>
                        Housing services<br>
                        </p>
                </div>
            </div>
          </div>
        </div>
    </div>
    <footer>
  <!-- Footer main -->
  <section class="ft-main" id="about">
    <div class="ft-main-item">
      <h2 class="ft-title">Address</h2>
      <ul>
        <li><a>Fanshawe College</a></li>
        <li><a>1001 Fanshawe College Blvd.</a></li>
        <li><a>London, ON N5Y 5R6</a></li>
        <li><a>Canada</a></li>
        
      </ul>
    </div>
    
    <div class="ft-main-item">
      <h2 class="ft-title">Contact</h2>
      <ul>
        <li><a>Tel:519-452-4277</a></li>
        <li><a>Toll-Free:1-800-717-4412</a></li>
        <li><a>info@fanshawec.ca</a></li>
      </ul>
    </div>
    
  </section>

  <!-- Footer social -->
  <section class="ft-social" >
    <ul class="ft-social-list">
      <li><a href="#"><i class="fab fa-facebook"></i></a></li>
      <li><a href="#"><i class="fab fa-twitter"></i></a></li>
      <li><a href="#"><i class="fab fa-instagram"></i></a></li>
      <li><a href="#"><i class="fab fa-github"></i></a></li>
      <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
      <li><a href="#"><i class="fab fa-youtube"></i></a></li>
    </ul>
  </section>

  <!-- Footer legal -->
  <section class="ft-legal">
    <ul class="ft-legal-list">
      <li><a href="#">Terms &amp; Conditions</a></li>
      <li><a href="#">Privacy Policy</a></li>
      <li>&copy; 2020 Copyright Fanshawe International Student.</li>
    </ul>
  </section>
</footer>

@endsection
