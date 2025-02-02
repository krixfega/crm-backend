@extends('user.layouts.app')


@section('content')
    <main class="main-content">

        <section class="page-header-area" data-bg-color="#F1FAEE">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="page-header-content">
                            <!-- <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Bespoke</li>
                            </ol> -->
                            <h2 class="page-header-title"> Book {{ $bispock->name }}</h2>
                        </div>
                    </div>
                    <div class="col-sm-4 d-sm-flex justify-content-end align-items-end">
                        <h5 class="showing-pagination-results">Showing 01 Results</h5>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Page Header Area Wrapper ==-->


        <!--== Start Product Categories Area Wrapper ==-->
        <section class="product-categories-area section-top-space">






            <div class="row container">
                <div class="mx-0  col-md-12 col-lg-5 ">
                    <img class="" src="{{ asset('images/fibrics/' . $bispock->FibricImages->first()->name) }}"
                        width="100%" height="" alt="Image-HasTech">
                </div>





                <div class=" col-sm-12 col-md-12 col-lg-7 multiform  mx-0">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

                    <form id="regForm" method="post" action="{{route('product.booking.create')}}" class="mx-0" enctype="multipart/form-data">
                        @csrf
                        <h1>Custom Outfit Form</h1>
                        <input type="hidden" name="fabrics_id" value="{{ $bispock->id }}">

                        <div class="tab">
                            <p class="">Kindly Enter Your Personal Details</p>
                            <div class="form-group">
                                <label for="fullName">Full Name (*required)</label>
                                <input type="text" required class="form-control @error('fullName') is-invalid @enderror"
                                    id="fullName" name="fullName" required>
                                @error('fullName')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phoneNumber">Phone Number(*required)</label>
                                <input type="text" required
                                    class="form-control @error('phoneNumber') is-invalid @enderror" id="phoneNumber"
                                    name="phoneNumber" required>
                                @error('phoneNumber')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">Address(*required)</label>
                                <input type="text" required class="form-control @error('address') is-invalid @enderror"
                                    id="address" name="address" required>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email (*required)</label>
                                <input type="email" required class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="qty">Quantity (*required)</label>
                                <input type="number" required class="form-control @error('qty') is-invalid @enderror"
                                    id="qty" name="qty" required>
                                @error('qty')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pickupDate">Pickup Date (*required)</label>
                                <input type="date" required
                                    class="form-control @error('pickupDate') is-invalid @enderror" id="pickupDate"
                                    name="pickupDate" required>
                                @error('pickupDate')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group d-none">
                                <label for="gender">Pickup Date (*required)</label>
                                <input type="hidden" required
                                    class="form-control @error('gender') is-invalid @enderror" id="gender"
                                    name="gender" required value="{{ $bispock->category }} ">
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>
                        <div class="tab">
                            General Mesurement:
                            <div class="form-group">
                                <label for="shoulder">Shoulder</label>
                                <input type="text" class="form-control @error('shoulder') is-invalid @enderror"
                                    id="shoulder" name="shoulder">
                                @error('shoulder')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="frontArc">Front Arc</label>
                                <input type="text" class="form-control @error('frontArc') is-invalid @enderror"
                                    name="frontArc" value="{{ old('frontArc') }}" required>
                                @error('frontArc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="waist">Waist</label>
                                <input type="text" class="form-control @error('waist') is-invalid @enderror"
                                    id="waist" name="waist">
                                @error('waist')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="hip">Hip</label>
                                <input type="text" class="form-control @error('hip') is-invalid @enderror" id="hip"
                                    name="hip">
                                @error('hip')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="topLength">Top Length</label>
                                <input type="text" class="form-control @error('topLength') is-invalid @enderror"
                                    name="topLength" value="{{ old('topLength') }}" required>
                                @error('topLength')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="trouserLength">Trouser Length</label>
                                <input type="text" class="form-control @error('trouserLength') is-invalid @enderror"
                                    name="trouserLength" value="{{ old('trouserLength') }}" required>
                                @error('trouserLength')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="tab">
                            General Mesurement:
                            <div class="form-group">
                                <label for="armHole">Arm Hole</label>
                                <input type="text" class="form-control @error('armHole') is-invalid @enderror"
                                    name="armHole" value="{{ old('armHole') }}" required>
                                @error('armHole')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="roundSleeve">Round Sleeve</label>
                                <input type="text" class="form-control @error('roundSleeve') is-invalid @enderror"
                                    name="roundSleeve" value="{{ old('roundSleeve') }}" required>
                                @error('roundSleeve')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="thigh">Thigh</label>
                                <input type="text" class="form-control @error('thigh') is-invalid @enderror"
                                    id="thigh" name="thigh">
                                @error('thigh')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="knee">Knee</label>
                                <input type="text" class="form-control @error('knee') is-invalid @enderror"
                                    id="knee" name="knee">
                                @error('knee')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="crotch">Crotch</label>
                                <input type="text" class="form-control @error('crotch') is-invalid @enderror"
                                    id="crotch" name="crotch">
                                @error('crotch')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                                <div class="form-group">
                                    <label for="images">Style images:</label>
                                    <input type="file" required name="images[]"
                                        class="form-control @error('images') is-invalid @enderror" multiple>
                                    @error('images')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>



                        @if ($bispock->category == 'female')
                            <div class="tab">

                                <p>Female mesurement</p>
                                <div id="female-form">



                                    <div class="form-group">
                                        <label for="offShoulder">Off Shoulder</label>
                                        <input type="text"
                                            class="form-control @error('offShoulder') is-invalid @enderror"
                                            id="offShoulder" name="offShoulder">
                                        @error('offShoulder')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="upperBust">Upper Bust</label>
                                        <input type="text"
                                            class="form-control @error('upperBust') is-invalid @enderror" id="upperBust"
                                            name="upperBust">
                                        @error('upperBust')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="bust">Bust</label>
                                        <input type="text" class="form-control @error('bust') is-invalid @enderror"
                                            id="bust" name="bust">
                                        @error('bust')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="N_N">N-N</label>
                                        <input type="text" class="form-control @error('N_N') is-invalid @enderror"
                                            id="N_N" name="N_N">
                                        @error('N_N')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="underBust">Under Bust</label>
                                        <input type="text"
                                            class="form-control @error('underBust') is-invalid @enderror" id="underBust"
                                            name="underBust">
                                        @error('underBust')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="bustPoint">Bust Point</label>
                                        <input type="text"
                                            class="form-control @error('bustPoint') is-invalid @enderror" id="bustPoint"
                                            name="bustPoint">
                                        @error('bustPoint')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="dressLength">Dress Length</label>
                                        <input type="text"
                                            class="form-control @error('dressLength') is-invalid @enderror"
                                            id="dressLength" name="dressLength">
                                        @error('dressLength')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="sleeveLength"> Sleeve Length</label>
                                        <input type="text"
                                            class="form-control @error('sleeveLength') is-invalid @enderror"
                                            id="sleeveLength" name="sleeveLength">
                                        @error('sleeveLength')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="calf">Calf</label>
                                        <input type="text" class="form-control @error('calf') is-invalid @enderror"
                                            id="calf" name="calf">
                                        @error('calf')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>

                            </div>
                        @endif

                        @if ($bispock->category == 'female')
                            <div class="tab">
                                <p>Female mesurement</p>
                                <div class="form-group">
                                    <label for="halfLength">Half Length </label>
                                    <input type="text" class="form-control @error('halfLength') is-invalid @enderror"
                                        id="halfLength" name="halfLength">
                                    @error('halfLength')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="halfLengthBack">Half Length Back </label>
                                    <input type="text"
                                        class="form-control @error('halfLengthBack') is-invalid @enderror"
                                        id="halfLengthBack" name="halfLengthBack">
                                    @error('halfLengthBack')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="highWaist">HighWaist</label>
                                    <input type="text" class="form-control @error('highWaist') is-invalid @enderror"
                                        id="highWaist" name="highWaist">
                                    @error('highWaist')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="shoulderToKnee">Shoulder To Knee</label>
                                    <input type="text"
                                        class="form-control @error('shoulderToknee') is-invalid @enderror"
                                        id="shoulderToKnee" name="shoulderToKnee">
                                    @error('shoulderToKnee')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="shoulderToHip">Shoulder To Hip</label>
                                    <input type="text"
                                        class="form-control @error('shoulderToHip') is-invalid @enderror"
                                        id="shoulderToHip" name="shoulderToHip">
                                    @error('shoulderToHip')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="fullLength">Full Length</label>
                                    <input type="text" class="form-control @error('fullLength') is-invalid @enderror"
                                        id="fullLength" name="fullLength">
                                    @error('fullLength')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endif


                        @if ($bispock->category == 'male')
                            <div class="tab">
                                <div id="male-form">
                                    {{-- male measurement fields --}}



                                    <div class="form-group">
                                        <label for="chest">Chest</label>
                                        <input type="text" class="form-control @error('chest') is-invalid @enderror"
                                            name="chest" value="{{ old('chest') }}" required>
                                        @error('chest')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="stomach">Stomach</label>
                                        <input type="text" class="form-control @error('stomach') is-invalid @enderror"
                                            name="stomach" value="{{ old('stomach') }}" required>
                                        @error('stomach')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="topHip">Top Hip</label>
                                        <input type="text" class="form-control @error('topHip') is-invalid @enderror"
                                            name="topHip" value="{{ old('topHip') }}" required>
                                        @error('topHip')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="biceps">Biceps</label>
                                        <input type="text" class="form-control @error('biceps') is-invalid @enderror"
                                            name="biceps" value="{{ old('biceps') }}" required>
                                        @error('biceps')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="sleeve">Sleeve</label>
                                        <input type="text" class="form-control @error('sleeve')is-invalid @enderror"
                                            name="sleeve" value="{{ old('sleeve') }}" required>
                                        @error('sleeve')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="waistToKnee">Waist to Knee</label>
                                        <input type="text"
                                            class="form-control @error('waistToKnee') is-invalid @enderror"
                                            name="waistToKnee" value="{{ old('waistToKnee') }}" required>
                                        @error('waistToKnee')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        @endif










                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <a type="button" id="prevBtn" class="btn btn-primary"
                                    onclick="nextPrev(-1)">Previous</a>
                                <a type="button" class="btn btn-secondary" id="nextBtn"
                                    onclick="nextPrev(1)">Next</a>
                            </div>
                        </div>

                        <!-- Circles which indicates the steps of the form: -->

                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            @if ($bispock->category == 'female')
                                <span class="step"></span>
                            @endif
                        </div>

                    </form>
                </div>


                @if ($bispock->category == 'male')
                    @php
                        $formNum = 4;
                    @endphp
                @elseif($bispock->category == 'female')
                    @php
                        $formNum = 5;
                    @endphp
                @endif


            </div>
        </section>
    </main>
@endsection


@section('scripts')
    <script>
       var currentTab = 0; // Current tab is set to be the first tab (0)

showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var lng = {{ $formNum }};
  var x = $(".tab");
  x.eq(n).css("display", "block");
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    $("#prevBtn").css("display", "none");
  } else {
    $("#prevBtn").css("display", "inline");
  }
  if (n == lng - 1) {
    $("#nextBtn").html("Submit");
  } else {
    $("#nextBtn").html("Next");
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n);
}

function nextPrev(n) {
  var lng = {{ $formNum }};
  // This function will figure out which tab to display
  var x = $(".tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x.eq(currentTab).css("display", "none");
  // Increase or decrease the current tab by 1:
  currentTab += n;
  // if you have reached the end of the form... :
  if (currentTab >= lng) {
    $('#regForm').submit();

    // alert(currentTab);
    //...and the form is valid, submit it:
    // $.ajax({

    //   type: "POST",
    //   url: bispock_route,
    //   data: $("#regForm").serialize(),
    //   success: function (response) {
    //     // handle success response
    //   },
    //   error: function (xhr, status, error) {
    //     // handle error response
    //   }
    // });
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = $(".tab");
  y = x.eq(currentTab).find("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y.eq(i).val() == "") {
      // add an "invalid" class to the field:
      y.eq(i).addClass("invalid");
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    $(".step").eq(currentTab).addClass("finish");
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  var lng = {{ $formNum }};
  // This function removes the "active" class of all steps...
  var x = $(".step");
  x.removeClass("active");
  //... and adds the "active" class to the current step:
  x.eq(n).addClass("active");
}

    </script>
@endsection
