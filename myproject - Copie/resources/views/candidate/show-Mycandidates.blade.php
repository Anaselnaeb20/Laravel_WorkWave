@extends('layouts.app')
@section('content')
<style>
    /* .bt2{
        margin-right: auto;
    } */
    .bt {
        margin-left: auto;
    }

    .container_cv {
        margin: 1em;
        /* width: 190px;
        height: 254px; */
        padding: 2em;
        ;
        border-radius: 30px;
        background: white;
        filter: drop-shadow(16px 7px 35px #D6D6E7);
        transition: all 0.3s ease;

    }

    .container_cv:hover {
        transform: scale(1.01);
    }

    .button-name {
        align-items: center;
        appearance: none;
        background-color: #FCFCFD;
        border-radius: 4px;
        border-width: 0;
        box-shadow: rgba(45, 35, 66, 0.2) 0 2px 4px, rgba(45, 35, 66, 0.15) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
        box-sizing: border-box;
        color: #36395A;
        cursor: pointer;
        display: inline-flex;
        /* font-family: "JetBrains Mono",monospace; */
        height: 48px;
        justify-content: center;
        line-height: 1;
        list-style: none;
        overflow: hidden;
        padding-left: 16px;
        padding-right: 16px;
        position: relative;
        text-align: left;
        text-decoration: none;
        transition: box-shadow .15s, transform .15s;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        white-space: nowrap;
        will-change: box-shadow, transform;
        font-size: 18px;
    }

    .button-name:focus {
        box-shadow: #D6D6E7 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
    }

    .button-name:hover {
        box-shadow: rgba(45, 35, 66, 0.3) 0 4px 8px, rgba(45, 35, 66, 0.2) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
        transform: translateY(-2px);
    }

    .button-name:active {
        box-shadow: #D6D6E7 0 3px 7px inset;
        transform: translateY(2px);
    }
    .title{
        padding: 1em;
        background-color: #05BFDB;
        border-radius: 0.75rem;
        color:#ffff;
        font-size: 1.2em;
        font-weight: 600;
        margin-top: 1em;
    }
    
</style>


{{-- html --}}
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<div class="container mt-3 pt-2">
<div class="d-flex" 
">

    <h1 style="font-weight: 700;
    ">Manage Your Job Applications</h1>
</div>
<div class="text_area">
    Welcome to your job application management page. Here, you can track the status of your applications, view any updates from the hiring team, and manage your communications with the company. You can also upload additional materials or make edits to your application as needed. We're excited to see your interest in our job opportunities, and we wish you the best of luck in your job search!
</div>
<div class="title">
    <i class="fas fa-check"></i>
   My applications
</div>


<div class="backg">
    @if(count($candidates) > 0)
    @foreach ($candidates as $candidate)

    <div class="container_cv">
        <div class="d-flex flex-row">
            <div class="p-1">
                <div class="image_cont">
                    <img src="{{ asset('./public/candidatefiles/'.$candidate->image) }}" width="75px" height="75px" alt="Image" style=" border-radius: 8px;
                    object-fit: cover;">

                </div>
            </div>
            <div class="p-1 align-self-center" style="font-weight: 700;
            font-size:32px;">{{$candidate->offre->titre}}</div>

        </div>
        <div class="d-flex flex-row">
            <div class="p-1" style="font-weight: 700;">Company : {{$candidate->offre->societe}}</div>
        </div>
        <div class="d-flex flex-row" style="font-weight: 700;">
            <div class="p-1">{{$candidate->offre->ville}}</div>
            <div class="p-1">{{$candidate->offre->pays}}</div>
        </div>
        <div class="d-flex flex-row">
            <div class="p-1"><span class="text-muted d-block"> Salary : {{$candidate->offre->salair}}<i class="fas fa-euro-sign"></i></div>
        </div>
        <form action="/my-candidates/{{$candidate->id}}" method="POST" class="inline-block">
            @csrf
            @method('delete')
            <div class="d-flex ">
                <div class="bt2 p-1"><a href="{{ route('view-file', ['id' => $candidate->id,'file'=>$candidate->resume]) }}" class="btn btn-info" style="color:#FCFCFD">View Resume</a></div>
                <div class="bt2 p-1"><a href="{{ route('view-file', ['id' => $candidate->id,'file'=>$candidate->cover_letter]) }}" class="btn btn-info" style="color:#FCFCFD">View Cover letter</a></div>

                <div class="bt p-1">
                    <button type="submit" role="button" class="btn btn-danger">Delete</button>
                </div>

        </form>



        <div class=" p-1 "><button role="button" class="btn btn-success"><a style="color: #FCFCFD; text-decoration:none" href="{{ route('candidate.edit', ['candidate_id' => $candidate->id,'offer_id'=>$candidate->offre->id]) }}">Edit</a> </button></div>

        <div class=" p-1"><button role="button" class="btn btn-dark"><a href="/offre/{{$candidate->offre->slug}}" style="color: #FCFCFD; text-decoration:none">View Offre</a> </button></div>
    </div>
</div>

       
    


   


    @endforeach
    
</div>
    @else
    <tr>
        <td colspan="8">
            <h1>Nothing</h1>
        </td>
    </tr>
    @endif

    

</div>
    @endsection