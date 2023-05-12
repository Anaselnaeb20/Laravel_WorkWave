@extends('layouts.app')
@section('content')
    <style>
      .main{
        background-color: #f9faff !important;
      }
        .hero {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            padding: 0.8rem;
            margin-top:2em;
        }

        .container1 {
            height: 100vh;
            position: relative;
            margin-top: 20em;
            background-color: #18214d;

        }


        /* Set the width of the image to 100% and set the height to auto to maintain aspect ratio */
        .hero img {
            width: 100%;

        }

        .hero .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .row.r2 {
            margin-top: -22em !important;
        }

        .title {
            font-size: 4em;
            font-weight: 700;
            line-height: 1.2em;
            /* padding-bottom: 0.5em; */
            color: #18214d;

        }
        .text2{
          
            font-size: 2em;
            font-weight: 700;
            line-height: 1.2em;
            /* padding-bottom: 0.5em; */
            color: #18214d;

        
        }

        .text {
            margin-bottom: 2em;
            margin-top: 2em;


        }

        .btn-primary {

            font-size: 1.3em;
            border-radius: 1em;
        }

        .main-container {
            margin-top: 50px;
            background-color: #f9faff
        }


    </style>
    <div class="hero">
        <img src="./public/candidatefiles/hero_candidate.png" alt="Hero Image">
        <div class="container">
            <div class="row r2 justify-content-center">
                <div class="zone">
                    <div class="title">Find Your<span class="text-primary"> Dream</span><br><span class="text-primary">
                            Job</span> Here <br> Easy And Fast </div>
                    <div class="text">
                        Start your job search today and take the first step towards building your career!
                    </div>
                    <a href="/offre">
                        <button class="btn btn-primary ">Get Started</button></a>
                </div>
            </div>
        </div>
    </div>


    <div class="container main-container">
        
            <div class="col-md-12">
                <div class="d-flex flex-row">

                    <div class="d-flex flex-column">
                        <div class="text2">
                            Browse Popular <br>Jobs
                        </div>
                        <div class="flex flex-row">
                            <div class="p-2">
                                <i class="fas fa-arrow-right" style="color:#3a81f7;font-size:4em"></i>
                                <i class="fas fa-arrow-right" style="color:#18214d;font-size:4em;padding-left:0.5em;"></i>
                            </div>
                          
                        </div>


                    </div>

                    <div class="d-flex flex-row " style="margin-left:10em;">

                         

                    </div>





                </div>




            </div>
       
    </div>
    
    {{-- <div class="container1">
    <div class="d-flex row">
      <div class="d-flex column cell1">
            <div class="text2">
              Browse Popular <br>Jobs
            </div>
            <div class="flex row">
              <div>
                <i class="fas fa-arrow-right"></i>  
              </div>
              <div>
                  <i class="fas fa-arrow-right"></i>
              </div>




            </div>

            <div class="d-flex row">


                
            </div>





      </div>




    </div>
  </div> --}}
@endsection
