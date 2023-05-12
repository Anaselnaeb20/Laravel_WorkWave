@extends('layouts.app')
@section('content')
<style>
  .btn{
    margin-left: 0.5em;
    border-radius: 0.75rem;
  }
  .button3 {
    display: inline-block;
    transition: all 0.2s ease-in;
    position: relative;
    overflow: hidden;
    z-index: 1;
    color: #fff;
    padding: 0.7em 1.7em;
    font-size: 18px;
    border-radius: 0.5em;
    background: #77d6f0;
    border: 1px solid #e8e8e8;
    box-shadow: 6px 6px 12px #c5c5c5,
      -6px -6px 12px #ffffff;
  }

  .button3:active {
    color: #666;
    box-shadow: inset 4px 4px 12px #c5c5c5,
      inset -4px -4px 12px #ffffff;
  }

  .button3:before {
    content: "";
    position: absolute;
    left: 50%;
    transform: translateX(-50%) scaleY(1) scaleX(1.25);
    top: 100%;
    width: 140%;
    height: 180%;
    background-color: rgba(0, 0, 0, 0.05);
    border-radius: 50%;
    display: block;
    transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
    z-index: -1;
  }

  .button3:after {
    content: "";
    position: absolute;
    left: 55%;
    transform: translateX(-50%) scaleY(1) scaleX(1.45);
    top: 180%;
    width: 160%;
    height: 190%;
    background-color: red;
    border-radius: 50%;
    display: block;
    transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
    z-index: -1;
  }

  .button3:hover {
    color: #ffffff;
    border: 1px solid red;
  }

  .button3:hover:before {
    top: -35%;
    background-color: red;
    transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
  }

  .button3:hover:after {
    top: -45%;
    background-color: red;
    transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
  }

  .button2 {
    display: inline-block;
    transition: all 0.2s ease-in;
    position: relative;
    overflow: hidden;
    z-index: 1;
    color: #ffffff;
    padding: 0.7em 1.7em;
    font-size: 18px;
    border-radius: 0.5em;
    background: #26caf8;
    border: 1px solid #e8e8e8;
    box-shadow: 6px 6px 12px #c5c5c5,
      -6px -6px 12px #ffffff;
  }

  .button2:active {
    color: #666;
    box-shadow: inset 4px 4px 12px #c5c5c5,
      inset -4px -4px 12px #ffffff;
  }

  .button2:before {
    content: "";
    position: absolute;
    left: 50%;
    transform: translateX(-50%) scaleY(1) scaleX(1.25);
    top: 100%;
    width: 140%;
    height: 180%;
    background-color: rgba(0, 0, 0, 0.05);
    border-radius: 50%;
    display: block;
    transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
    z-index: -1;
  }

  .button2:after {
    content: "";
    position: absolute;
    left: 55%;
    transform: translateX(-50%) scaleY(1) scaleX(1.45);
    top: 180%;
    width: 160%;
    height: 190%;
    background-color: #009087;
    border-radius: 50%;
    display: block;
    transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
    z-index: -1;
  }

  .button2:hover {
    color: #ffffff;
    border: 1px solid #009087;
  }

  .button2:hover:before {
    top: -35%;
    background-color: #009087;
    transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
  }

  .button2:hover:after {
    top: -45%;
    background-color: #009087;
    transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
  }


  .cardi_con1 {
    padding: 1em;

  }

  .cardi1 {
    width: 100%;

    background: rgb(255, 255, 255);
    border-radius: 1em;
    box-shadow: 0.3em 0.3em 0.7em #00000015;
    transition: border 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    
  }



  .c_text {
    padding: 2.5em;
  }

  .text_c {
    width: 100%;

    border-radius: 1em;
    background: #fcf6f6;
    box-shadow: 15px 15px 30px #bebebe,
      -15px -15px 30px #ffffff;
      margin-bottom: 1em;

  }

  .contenu_c {
    padding: 1em;
  }

  .subtitre {
    font-weight: 700;
    font-family: 'Montserrat';



  }

  @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

  .cardi_con {
    margin-top: 8px;
  }

  .cardi {
    width: 100%;

    background: #fff;
    padding: 2px;
    border-radius: 1rem;
    border: .5vmin solid #05060f;
    box-shadow: .4rem .4rem #05060f;
    overflow: hidden;
  }

  .company_info {
    margin-right: 10px;
    font-weight: light;
    color: #05060f
  }

  .titre {

    font-family: 'Montserrat';
    font-weight: bold;
    ;
  }

 

  .btn-1 {
    overflow: hidden;
    color: #fff;
    border-radius: 30px;
    box-shadow: 0 0 0 0 rgba(143, 64, 248, 0.5), 0 0 0 0 rgba(39, 200, 255, 0.5);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .btn-1::after {
    content: "";
    width: 400px;
    height: 400px;
    position: absolute;
    top: -50px;
    left: -100px;
    background-color: #ff3cac;
    background-image: linear-gradient(225deg, #27d86c 0%, #26caf8 50%, #c625d0 100%);
    z-index: -1;
    transition: transform 0.5s ease;
  }

  .btn-1:hover {
    transform: translate(0, -6px);
    box-shadow: 10px -10px 25px 0 rgba(143, 64, 248, 0.5), -10px 10px 25px 0 rgba(39, 200, 255, 0.5);
  }

  .btn-1:hover::after {
    transform: rotate(150deg);
  }
</style>
<div class="container mt-2 pt-1">
<div class="card card-image m-0" style="background-image: url(https://img.freepik.com/premium-vector/header-banner-template-with-company-job-recruitment-design_419341-154.jpg?w=1380);
background-size: cover;
background-repeat: no-repeat;
background-position: center;
position: relative;

height:18em;
margin:0;
">


</div>
<div class="cardi" style="
 

 display:flex;
 flex-direction:column;

 
 ">
  <div class="cardi_con">


    <div class="container" style="display:flex;">
      <div class="titre">{{$offre->titre}}</div>
    </div>
    <div class="container " style="display:flex;">
      <div class="company_info">{{$offre->societe}}</div>
      <div class="company_info">| {{$offre->ville}} |</div>
      <div class="company_info">{{$offre->pays}}</div>
    </div>
    <div class="container">
      <div class="salair"><i class="fas fa-euro-sign" style="color:gray" aria-hidden="true"></i>{{$offre->salair}}/Month</div>
    </div>
  </div>
  <div class="d-flex flex-row-reverse">
  @if(Auth::check() && Auth::user()->role=='candidate' )
    <div class="p-2">
      
      <a href="{{ route('candidate.create', ['offre_id' => $offre->id]) }}">
        <button class="btn btn-primary">Apply Now!</button>
      </a>
    </div>
    @endif
    @if(Auth::check() && Auth::user()->role=='hr' && Auth::user()->id==$offre->user_id)

    <div class="p-2">
    <a href="{{ route('offre.show-candidates', ['offre' => $offre->id]) }}" class="btn btn-primary">
        View Candidates</a>
    </div>
    <div class="p-2">
      <a href="/offre/{{$offre->slug}}/edit">
        <button action='' class="btn btn-primary">Edit Offre</button>
      </a>
    </div>
    <div class="p-2">
      <form action="/offre/{{$offre->slug}}" method="POST" class="inline-block">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-primary">Delete Offre</button>
      </form>

    </div>
    @endif
  </div>

</div>




<div class="contenu_c">
  <div class="subtitre">
    <h1>Job details</h1>
  </div>
  <div class="titre">Contract Type: {{$offre->type_contrat}}</div>



</div>
<div class="text_c" >
  <div s>
  <h5>Offer details:</h5></div>
  <div class="c_text">
    {{$offre->contenu}}
  </div>

</div>
<div class="cardi1" style="
 

 display:flex;
 flex-direction:column;

 
 ">
  <div class="cardi_con1">


    <div class="container" style="display:flex;">
      <div class="titre">Apply to this job</div>
    </div>
    <div class="container" style="display:flex;
    flex-direction:row;">
      <div class="company_info" style="width:100em;">Think you're the perfect candidate?</div>
      @if(Auth::check() && Auth::user()->role=='candidate' )
      <button class="btn btn-primary " style="width:10em;">Apply Now!</button>
      @else
      <a href="{{ route('login') }}" class="btn btn-outline-success">Login</a>
      <a href="{{ route('register') }}" class="btn btn-outline-success ">Registre</a>

     @endif
    </div>

  </div>


</div>


</div>


@endsection