@extends('layouts.app')
@section('content')
<style>
.input {
  max-width: 190px;
  height: 44px;
  background-color: #05060f0a;
  border-radius: .5rem;
  padding: 0 1rem;
  border: 2px solid transparent;
  font-size: 1rem;
  transition: border-color .3s cubic-bezier(.25,.01,.25,1) 0s, color .3s cubic-bezier(.25,.01,.25,1) 0s,background .2s cubic-bezier(.25,.01,.25,1) 0s;
}

.label {
  display: block;
  margin-bottom: .3rem;
  font-size: .9rem;
  font-weight: bold;
  color: #05060f99;
  transition: color .3s cubic-bezier(.25,.01,.25,1) 0s;
}

.input:hover, .input:focus, .input-group:hover .input {
  outline: none;
  border-color: #05060f;
}

.input-group:hover .label, .input:focus {
  color: #05060fc2;
}



  .card{
    width: 15em;
    height: 10em;
    background-color: #088395;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    border-radius: 2em;
  }
  
  .card input,.card label {
  position: absolute; /* set the position property to absolute */
  opacity: 0; /* set the opacity to 0 */
  pointer-events: auto; /* set the pointer-events property to auto */
  top: 0; /* set the top position */
  left: 0; /* set the left position */
  width: 100%; /* set the width to cover the card element */
  height: 100%; /* set the height to cover the card element */
}

  .btn{
    width: 10em;
  }
  
  .resume_cv{
    display: flex !important;
  }
  .group {
 position: relative;
 padding-bottom: 2em;
}


.main_c{

  background-color: #fff;
  border-radius:1em;
  padding: 2em;
  margin-bottom: 2em;

}

.text_top{
  margin-bottom: 1em;
}

.sub{
  display: flex!important;
    align-content: center;
    justify-content: center;
    align-items: center;
}
</style>
{{-- HTML --}}


<div class="container mt-2 pt-1">
  <div class="container text_top">
  <div><h1>Apply to Our Job Offer</h1></div>
  Thank you for your interest in joining our team! We're excited to learn more about you and how you can contribute to our company. Please fill out the form below with your personal and professional information, along with any additional materials you'd like to submit.
  </div>

<div class="container main_c">
<form action="/candidate" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="d-flex flex-row ">  
          
          <div class="d-flex flex-column" style="margin-left: 5em;" > 
<div class="group">
<input type="hidden" name="offre_id" value="{{ $offre->id }}">


  <label class="label">Last Name</label>
  <input autocomplete="off" name="nom" class="input" type="text">
  
</div>

<div class="group">
  <label class="label">First Name</label>
  <input autocomplete="off" name="prenom" class="input" type="text">
 


  
</div>
<div class="group">
  <label class="label">Email</label>
  <input autocomplete="off" name="email" class="input" type="email">
  


  
</div>
<div class="group">
  <label class="label">Phone number</label>
  <input autocomplete="off" name="phone" class="input" type="text">
  

  
</div>
<div class="group">
  <label class="label">Birthday</label>
  <input autocomplete="off" name="date_naissance" class="input" type="date" placeholder="">



  
</div>



</div>

<div class="d-flex flex-column" style="margin-left: auto ; margin-right:5em "> 

  <div class="card">
    <div class="gfx">
      <i class="fas fa-upload" style="color: #ffffff;font-size:3em"></i>
    </div>
    <div class="text_label" style="color:#ffff; margin-top:1em;">
      Upload Your resume <i class="fas fa-file-pdf"></i>
    </div>
    <label class="form-label" for="resume-file">Choose a file:</label>
    <input type="file" class="form-control" id="resume-file" name="resume"/>
    <div id="resume-file-name" style="display:flex; padding:1em;color:#fff; font-size:0.6em"></div>
  </div>
  
  <div class="card">
    <div class="gfx">
      <i class="fas fa-upload" style="color: #ffffff;font-size:3em"></i>
    </div>
    <div class="text_label" style="color:#ffff; margin-top:1em;">
      Upload Your cover letter <i class="fas fa-file-pdf"></i>
    </div>
    <label class="form-label" for="cover-letter-file">Choose a file:</label>
    <input type="file" class="form-control" id="cover-letter-file" name="cover_letter"/>
    <div id="cover-letter-file-name" style="display:flex; padding:1em;color:#fff; font-size:0.6em"></div>
  </div>
  
  <div class="card">
    <div class="gfx">
      <i class="fas fa-upload" style="color: #ffffff;font-size:3em"></i>
    </div>
    <div class="text_label" style="color:#ffff; margin-top:1em;">
      Upload Your profile picture <i class="fas fa-file-image"></i>
    </div>
    <label class="form-label" for="image-file">Choose a file:</label>
    <input type="file" class="form-control" id="image-file" name="image"/>
    <div id="image-file-name" style="display:flex; padding:1em;color:#fff; font-size:0.6em"></div>
  </div>
  



</div>
</div>
<div class="sub d-flex mx-auto"style="margin-top: 2em;">
  <button class="btn btn-success " type="submit">
      <span>Apply</span>
  </button></div>
</div>



</div>


</form>

<script>
  const resumeFileInput = document.getElementById('resume-file');
  const resumeFileNameDiv = document.getElementById('resume-file-name');

  resumeFileInput.addEventListener('change', (event) => {
    const file = event.target.files[0];
    if (file) {
      resumeFileNameDiv.textContent = file.name;
    }
  });

  const coverLetterFileInput = document.getElementById('cover-letter-file');
  const coverLetterFileNameDiv = document.getElementById('cover-letter-file-name');

  coverLetterFileInput.addEventListener('change', (event) => {
    const file = event.target.files[0];
    if (file) {
      coverLetterFileNameDiv.textContent = file.name;
    }
  });

  const imageFileInput = document.getElementById('image-file');
  const imageFileNameDiv = document.getElementById('image-file-name');

  imageFileInput.addEventListener('change', (event) => {
    const file = event.target.files[0];
    if (file) {
      imageFileNameDiv.textContent = file.name;
    }
  });

</script>

@endsection