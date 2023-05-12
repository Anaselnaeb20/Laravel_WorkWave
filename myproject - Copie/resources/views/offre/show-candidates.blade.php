@extends('layouts.app')

@section('content')
    
    <style>
        .profails{
            background-color: #0A4D68;
            margin: 0;
            padding-bottom: 1em;
            padding-top: 1em;
            border-radius: 4px;
            
            padding-left: 1em;
            /* margin-left: 2em;
            margin-right: 2em; */
           
            color:#fff
        }
        .offer_title{
            padding: 1em;
         margin-top: 0.5em;
                  font-size: 21px;
         margin-bottom: 0;

        }
        .description{
            padding-left: 2em;
            margin-top: 0;
            background-color: #fff;
            padding-top: 1em;
            padding-bottom: 2em;
    
        }
        .title_container{
            
    color:black;
    font-weight: 700;
    font-size: 36px;
        }
        
        .JOB {
            background-color: #fff7e1;
            padding: 6px;
            height: 1.5em;
            display: flex;
            align-content: center;
            justify-content: center;
            flex-direction: column;
            margin-left: 1.3em;
            margin-top: 0.3em;
            width: inherit;
            align-items: center;
            color: #ff9b2d;
            font-size: 13px;
            font-weight: 300;

        }

        .fas.fa-envelope {
            color: #31d2f2;
            font-size: 28px;

        }

        .btn.btn-success {
            padding: 5px;
        }

        .btn.btn-info {
            height: 2em;
            width: inherit;
            display: flex;
            align-items: center;
            border-radius: 4px;
        }

        .carte {
            box-sizing: border-box;
            width: 350px;
            height: 285px;
            background: #fff;
            border: 1px solid white;
            box-shadow: 12px 17px 51px rgba(0, 0, 0, 0.22);
            backdrop-filter: blur(6px);
            /* border-radius: 17px; */
            /* text-align: center; */
            cursor: pointer;
            transition: all 0.5s;
            display: flex;
            flex-direction: row;
            /* align-items: center;
                justify-content: center; */
            user-select: none;
            font-weight: bolder;
            color: black;
            margin-left: 2em;
            padding: 1em
        }

        .carte:hover {
            border: 1px solid blueviolet;
            transform: scale(1.05);
        }

        .carte:active {
            transform: scale(0.95) rotateZ(1.7deg);
        }
        @media only screen and (max-width: 768px) {
			.btn {
				position: static;
				display: block;
				margin: 10px auto;
			}}

            .offer_title{
                background-color: #0A4D68;
                color: #fff;
                margin: 0;
            padding-bottom: 1em;
            padding-top: 1em;
            border-radius: 4px;
            
            padding-left: 1em;
            /* margin-left: 2em;
            margin-right: 2em; */
            margin-top: 1em;
            
            }
            .card_holder{
                background-color: #fff;
            }
    </style>

    <!-- HTML -->


    <div class="container mt-3 pt-2">
    <div class="title_container">
        Who applied to my offer
    </div>
    <div class="text_area">
    Welcome to the applicants section for your job offer. Here, you can discover all the talented individuals who have applied to your job posting. Take a closer look at their resumes, cover letters, and any additional materials they have submitted to gain a deeper understanding of their skills and experience. Use this page to manage their applications, communicate with them, and schedule interviews. You have the power to make a difference in someone's life by providing them with the opportunity to join your team. Let's find the best fit for your company together!
    </div>
    <div class="d-flex flex-row offer_title">
       <i class="fas fa-briefcase" style="color: #fff; margin-right: 8px;
       font-size: 29px;"></i><b>Offer</b>  : {{$offre->titre}}
       
       
    </div> 

<div class="description">You have {{$count}} candidates to your offer <i class="fas fa-star"- style="color: #ff9b2d"></i>
    
</div>
<div class="profails">
        <i class="fas fa-user"></i> Candidates Profils:
        </div>
<div class="d-flex flex-row card_holder" >
    @foreach ($candidates as $candidate)
        
            <div class="carte m-3 " style="
            display:flex;
            flex-direction:column;">
                <div class="d-flex">
                    <div class="p-1"> <img src="{{ asset('./public/candidatefiles/' . $candidate->image) }}" width="75px"
                            height="75px" alt="Image" style=" border-radius: 8px;
                object-fit: cover;">
                    </div>

                    <div class="JOB">{{ $candidate->offre->titre }}</div>

                    <div class="p-0" style="margin-left: auto;"><a href="mailto:{{ $candidate->email }}"
                            style="text-decoration: none;  padding:0;margin:0;"> <i class="fas fa-envelope"></i></a></div>
                </div>
                <div class="d-flex" style="margin-top:0.5em;">
                    <div class="p-1">{{ $candidate->nom }} {{ $candidate->prenom }}</div>

                </div>
                <div class="d-flex">
                    <div class="p-1" style="color: darkcyan;font-weight:300;">{{ $candidate->date_naissance }} years old
                    </div>
                </div>
                <div class="d-flex">
                    <div class="p-0 "><a
                            href="{{ route('view-file', ['id' => $candidate->id, 'file' => $candidate->resume]) }}"
                            class="btn btn-info" style="color:#FCFCFD;margin-right:0.5em; margin-top:1em;">View Resume</a>
                    </div>
                    <div class="p-0"><a
                            href="{{ route('view-file', ['id' => $candidate->id, 'file' => $candidate->cover_letter]) }}"
                            class="btn btn-info" style="color:#FCFCFD;margin-top:1em;">View Cover letter</a>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="p-1" style="margin-left: auto;margin-top:1em;">
                        <button class="btn btn-primary copy-phone" data-phone-number="{{ $candidate->phone }}"> Call <i
                                class="fas fa-phone-flip"></i></button>
                    </div>
                </div>




            </div>
        
        
    @endforeach
</div>

</div>
    <script>
        // Get all copy-phone buttons
        var copyPhoneButtons = document.querySelectorAll(".btn.btn-primary.copy-phone");

        // Loop through the buttons and add a click event listener to each one
        copyPhoneButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                // Get the phone number for the current button
                var phoneNumber = this.getAttribute('data-phone-number');

                // Create a temporary input element to hold the phone number
                var tempInput = document.createElement("input");

                // Set the value of the temporary input element to the phone number
                tempInput.setAttribute("value", phoneNumber);

                // Append the temporary input element to the document
                document.body.appendChild(tempInput);

                // Select the contents of the temporary input element
                tempInput.select();

                // Copy the selected contents to the clipboard
                document.execCommand("copy");

                // Remove the temporary input element from the document
                document.body.removeChild(tempInput);

                // Alert the user that the phone number has been copied
                alert("Phone number copied to clipboard: " + phoneNumber);
            });
        });
    </script>
@endsection
    